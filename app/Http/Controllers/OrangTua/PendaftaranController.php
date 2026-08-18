<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DraftPendaftaran;
use Illuminate\Support\Facades\Validator;
use App\Models\Program;
use App\Models\JadwalKelas;
use App\Models\Murid;
use App\Models\Transaksi;
use App\Models\Pendaftaran;
use App\Http\Requests\PendaftaranRequest;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
{
    public function showForm()
    {
        $user = Auth::user();

        // === JEBAKAN JALAN BUNTU (Akses Ditolak untuk Admin/Mentor) ===
        if ($user->role !== 'orang_tua') {
            return view('publik.akses-ditolak', ['user' => $user]);
        }
        // ===============================================================

        $draft = DraftPendaftaran::firstOrCreate(
            ['user_id' => $user->id],
            ['current_step' => 1, 'draft_data' => []]
        );

        $pakets = Program::where('status_program', true)->orderByRaw("FIELD(tipe_program, 'Privat', 'Semi Privat', 'Reguler')")->orderBy('created_at', 'asc')->get();
        $selectedPackageId = $draft->draft_data['program_id'] ?? null;
        $schedules = JadwalKelas::with('package')
            ->where('status_jadwal', 'active')
            ->where('program_id', $selectedPackageId)
            ->orderByRaw("FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu')")
            ->orderBy('waktu_belajar', 'asc')
            ->get();

        $sesiList = [
            '15:00' => ['start' => '15:00', 'end' => '16:00'],
            '16:00' => ['start' => '16:00', 'end' => '17:00'],
            '17:00' => ['start' => '17:00', 'end' => '18:00'],
            '18:00' => ['start' => '18:00', 'end' => '19:00'],
            '19:00' => ['start' => '19:00', 'end' => '20:00'],
            '20:00' => ['start' => '20:00', 'end' => '21:00']
        ];

        $mappedSchedules = $schedules->map(function($s) {
            return [
                'id' => $s->jadwal_id,
                'day' => $s->hari,
                'time' => substr($s->waktu_belajar, 0, 5),
                'quota' => $s->available_quota
            ];
        })->values();

        return view('publik.pendaftaran', compact('draft', 'pakets', 'schedules', 'sesiList', 'mappedSchedules'));
    }

    public function saveStep(PendaftaranRequest $request)
    {
        $user = Auth::user();
        $draft = DraftPendaftaran::where('user_id', $user->id)->firstOrFail();

        $action = $request->input('action', 'next');
        $step = clone $request; // Copy to validate

        if ($action === 'back') {
            if ($draft->current_step > 1) {
                $draft->current_step--;
                $draft->save();
            }
            return redirect()->route('pendaftaran.form');
        }

        if (str_starts_with($action, 'jump_')) {
            $targetStep = (int) str_replace('jump_', '', $action);
            if ($targetStep >= 1 && $targetStep < $draft->current_step) {
                $draft->current_step = $targetStep;
                $draft->save();
                return redirect()->route('pendaftaran.form');
            }
        }

        // Validasi otomatis dilakukan oleh PendaftaranRequest
        $validatedData = $request->validated();

        // Save validated data to draft
        $draftData = $draft->draft_data ?? [];
        // Merge new data

        // Merge new data
        if ($draft->current_step == 7) {
            if ($request->hasFile('bukti_bayar')) {
                $path = $request->file('bukti_bayar')->store('bukti_pembayaran', 'public');
                $validatedData['bukti_bayar'] = $path;
            }
        }

        $draftData = array_merge($draftData, $validatedData);
        $draft->draft_data = $draftData;

        if ($draft->current_step == 7) {
            try {
                $registration = null;
                DB::transaction(function () use ($user, $draftData, $draft, &$registration) {
                    // Insert all data into Pendaftarans
                    $registration = Pendaftaran::create([
                        'user_id' => $user->id,
                        'nama_murid' => $draftData['nama_murid'],
                        'panggilan_murid' => $draftData['panggilan_murid'],
                        'tempat_lahir_murid' => $draftData['tempat_lahir_murid'],
                        'tanggal_lahir_murid' => $draftData['tanggal_lahir_murid'],
                        'jenis_kelamin_murid' => $draftData['jenis_kelamin_murid'],
                        'agama' => $draftData['agama'],
                        'sekolah' => $draftData['sekolah'],
                        'kelas' => $draftData['kelas'],
                        'nilai_rata_rata' => $draftData['nilai_rata_rata'] ?? null,
                        'mapel_ditingkatkan' => $draftData['mapel_ditingkatkan'],
                        'mapel_sulit' => $draftData['mapel_sulit'],
                        'karakteristik_anak' => $draftData['karakteristik_anak'],
                        'nama_orangtua' => $draftData['nama_ortu'],
                        'status_hubungan' => $draftData['status_hubungan'],
                        'no_telepon_orangtua' => $draftData['nomor_telepon'],
                        'email_orangtua' => $draftData['email'],
                        'alamat_domisili' => $draftData['alamat_domisili'],
                        'program_id' => $draftData['program_id'],
                        'jadwal_1_id' => $draftData['jadwal_1_id'],
                        'jadwal_2_id' => $draftData['jadwal_2_id'] ?? null,
                        'bukti_bayar' => $draftData['bukti_bayar'],
                        'status_pendaftaran' => 'pending'
                    ]);

                    // Delete Draft
                    $draft->delete();
                });

                // Tembakkan Notifikasi Email (Pendaftaran Success)
                try {
                    \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\RegistrationSuccessMail($registration));
                } catch (\Exception $mailException) {
                    // Log error tapi biarkan pendaftaran tetap sukses
                    \Illuminate\Support\Facades\Log::error("Gagal mengirim email pendaftaran: " . $mailException->getMessage());
                }

                return redirect()->route('pendaftaran.sukses');
            } catch (\Exception $e) {
                return back()->withErrors(['general' => 'Gagal memproses pendaftaran: ' . $e->getMessage()]);
            }
        }

        if ($draft->current_step < 7) {
            $draft->current_step++;
            $draft->save();
        }

        return redirect()->route('pendaftaran.form');
    }

    public function autosave(Request $request)
    {
        $user = Auth::user();
        $draft = DraftPendaftaran::where('user_id', $user->id)->first();

        if ($draft) {
            $draftData = $draft->draft_data ?? [];
            $draftData = array_merge($draftData, $request->except(['_token']));
            $draft->draft_data = $draftData;
            $draft->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }
}
