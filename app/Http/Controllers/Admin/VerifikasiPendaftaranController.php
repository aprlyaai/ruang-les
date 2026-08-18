<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Murid;
use App\Models\Transaksi;
use App\Models\OrangTua;
use App\Models\JadwalKelas;
use App\Models\Program;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class VerifikasiPendaftaranController extends Controller
{
    public function index()
    {
        $registrations = Pendaftaran::with(['user', 'package'])->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.verifikasi-pendaftaran.daftar', compact('registrations'));
    }

    public function show($id)
    {
        $registration = Pendaftaran::with(['user.students', 'package', 'schedule1', 'schedule2'])->findOrFail($id);
        return view('admin.verifikasi-pendaftaran.detail', compact('registration'));
    }

    public function approve(Request $request, $id)
    {
        \Illuminate\Support\Facades\Log::info("APPROVE CALLED. payload: " . json_encode($request->all()));

        $pendaftaran = Pendaftaran::findOrFail($id);

        if ($pendaftaran->status_pendaftaran !== 'pending') {
            return back()->with('error', 'Status pendaftaran ini sudah diverifikasi sebelumnya.');
        }

        $request->validate([
            'student_mode' => 'required|in:new,existing',
            'existing_student_id' => 'nullable|required_if:student_mode,existing|exists:murid,murid_id'
        ]);

        try {
            $siswa = null;
            DB::transaction(function () use ($pendaftaran, $request, &$siswa) {
                // 1. Update Profile Orang Tua
                $parentProfile = OrangTua::updateOrCreate(
                    ['user_id' => $pendaftaran->user_id],
                    [
                        'alamat_domisili' => $pendaftaran->alamat_domisili,
                        'no_telepon_orangtua' => $pendaftaran->no_telepon_orangtua,
                        'status_hubungan' => $pendaftaran->status_hubungan,
                    ]
                );

                $paket = Program::find($pendaftaran->program_id);
                $maxCapacity = $paket ? $paket->max_murid : 0;

                // Sensor Kuota Real-time: Cegah Overcapacity akibat Race Condition
                if ($maxCapacity > 0) {
                    if ($pendaftaran->jadwal_1_id) {
                        $jadwal1 = JadwalKelas::find($pendaftaran->jadwal_1_id);
                        if ($jadwal1 && $jadwal1->jumlah_murid >= $maxCapacity) {
                            throw new \Exception("Gagal! Kelas untuk Jadwal Pertemuan 1 baru saja penuh. Silakan tolak pendaftaran ini dan arahkan orang tua untuk memilih jadwal lain.");
                        }
                    }
                    if ($pendaftaran->jadwal_2_id) {
                        $jadwal2 = JadwalKelas::find($pendaftaran->jadwal_2_id);
                        if ($jadwal2 && $jadwal2->jumlah_murid >= $maxCapacity) {
                            throw new \Exception("Gagal! Kelas untuk Jadwal Pertemuan 2 baru saja penuh. Silakan tolak pendaftaran ini dan arahkan orang tua untuk memilih jadwal lain.");
                        }
                    }
                }

                // 2. Tentukan Data Murid (Murid)
                if ($request->student_mode === 'new') {
                    $siswa = Murid::create([
                        'orangtua_id' => $parentProfile->orangtua_id,
                        'nama_murid' => $pendaftaran->nama_murid,
                        'panggilan_murid' => $pendaftaran->panggilan_murid,
                        'tempat_lahir_murid' => $pendaftaran->tempat_lahir_murid,
                        'tanggal_lahir_murid' => $pendaftaran->tanggal_lahir_murid,
                        'jenis_kelamin_murid' => $pendaftaran->jenis_kelamin_murid,
                        'agama' => $pendaftaran->agama,
                        'sekolah' => $pendaftaran->sekolah,
                        'kelas' => preg_replace('/[^1-6]/', '', $pendaftaran->kelas),
                        'nilai_rata_rata' => $pendaftaran->nilai_rata_rata,
                        'mapel_ditingkatkan' => $pendaftaran->mapel_ditingkatkan,
                        'mapel_sulit' => $pendaftaran->mapel_sulit,
                        'karakteristik_anak' => $pendaftaran->karakteristik_anak,
                        'kuota_belajar' => $paket ? $paket->pertemuan : 0,
                        'status_murid' => 'active'
                    ]);
                } else {
                    $siswa = Murid::where('murid_id', $request->existing_student_id)
                                    ->where('orangtua_id', $parentProfile->orangtua_id)
                                    ->firstOrFail();

                    // Opsional: Perbarui kuota dan detail akademik jika menautkan ke siswa lama
                    $siswa->update([
                        'kuota_belajar' => $siswa->kuota_belajar + ($paket ? $paket->pertemuan : 0),
                        'sekolah' => $pendaftaran->sekolah,
                        'kelas' => preg_replace('/[^1-6]/', '', $pendaftaran->kelas),
                        'nilai_rata_rata' => $pendaftaran->nilai_rata_rata,
                        'mapel_ditingkatkan' => $pendaftaran->mapel_ditingkatkan,
                        'mapel_sulit' => $pendaftaran->mapel_sulit,
                        'karakteristik_anak' => $pendaftaran->karakteristik_anak,
                    ]);
                }

                // 3. Buat Transaksi
                Transaksi::create([
                    'no_invoice' => Transaksi::generateInvoiceNumber(),
                    'orangtua_id' => $parentProfile->orangtua_id,
                    'murid_id' => $siswa->murid_id,
                    'program_id' => $pendaftaran->program_id,
                    'jadwal_1_id' => $pendaftaran->jadwal_1_id,
                    'jadwal_2_id' => $pendaftaran->jadwal_2_id,
                    'total_pembayaran' => $paket ? $paket->harga : 0,
                    'bukti_pembayaran' => $pendaftaran->bukti_bayar,
                    'status_transaksi' => 'verified' // Langsung verified karena sudah dicek admin di pendaftaran
                ]);

                // 4. Update Kuota Jadwal Kelas & Relasi class_student
                if ($pendaftaran->jadwal_1_id) {
                    JadwalKelas::where('jadwal_id', $pendaftaran->jadwal_1_id)->increment('jumlah_murid');
                    DB::table('jadwal_murid')->insertOrIgnore([
                        'jadwal_id' => $pendaftaran->jadwal_1_id,
                        'murid_id' => $siswa->murid_id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
                if ($pendaftaran->jadwal_2_id) {
                    JadwalKelas::where('jadwal_id', $pendaftaran->jadwal_2_id)->increment('jumlah_murid');
                    DB::table('jadwal_murid')->insertOrIgnore([
                        'jadwal_id' => $pendaftaran->jadwal_2_id,
                        'murid_id' => $siswa->murid_id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                // 5. Ubah status pendaftaran
                $pendaftaran->status_pendaftaran = 'approved';
                $pendaftaran->save();
            });

            // 6. Kirim Email Aktivasi
            try {
                Mail::to($pendaftaran->email_orangtua)->send(new \App\Mail\AccountActivatedMail($pendaftaran, $siswa));
            } catch (\Exception $mailException) {
                \Illuminate\Support\Facades\Log::error("Gagal mengirim email aktivasi akun: " . $mailException->getMessage());
            }

            return redirect()->route('admin.regist-verifications.index')->with('success', 'Pendaftaran berhasil disetujui. Siswa telah masuk ke kelas.');

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memverifikasi: ' . $e->getMessage());
        }
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'alasan_penolakan' => 'required|string|max:1000'
        ]);

        $pendaftaran = Pendaftaran::findOrFail($id);

        if ($pendaftaran->status_pendaftaran !== 'pending') {
            return back()->with('error', 'Status pendaftaran ini sudah diverifikasi sebelumnya.');
        }

        $pendaftaran->status_pendaftaran = 'rejected';
        $pendaftaran->alasan_penolakan = $request->alasan_penolakan;

        // Hapus bukti bayar untuk menghemat storage karena pendaftaran ditolak (Storage Leak Fix)
        if ($pendaftaran->bukti_bayar && \Illuminate\Support\Facades\Storage::disk('public')->exists($pendaftaran->bukti_bayar)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($pendaftaran->bukti_bayar);
            $pendaftaran->bukti_bayar = null; // Bersihkan dari database juga
        }

        $pendaftaran->save();

        // Mengirim email notifikasi dengan Mailable
        try {
            Mail::to($pendaftaran->email_orangtua)->send(new \App\Mail\PendaftaranDitolakMail($pendaftaran));
        } catch (\Exception $e) {
            // Gunakan catch agar aplikasi tidak crash jika SMTP tidak jalan
            \Illuminate\Support\Facades\Log::error("Gagal mengirim email penolakan: " . $e->getMessage());
        }

        return redirect()->route('admin.regist-verifications.index')->with('success', 'Pendaftaran telah ditolak dan email pemberitahuan telah dikirim.');
    }
}
