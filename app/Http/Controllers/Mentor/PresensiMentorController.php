<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Presensi;
use App\Models\JadwalKelas;
use App\Models\Murid;
use Carbon\Carbon;

class PresensiMentorController extends Controller
{
    public function create($jadwal_id, $murid_id)
    {
        $schedule = JadwalKelas::findOrFail($jadwal_id);
        $student = Murid::findOrFail($murid_id);

        // Security check: ensure mentor owns this schedule
        if ($schedule->mentor_id !== Auth::user()->mentor_id) {
            abort(403, 'Unauthorized access to this class schedule.');
        }

        // Security check: ensure student is in this schedule
        if (!$schedule->students->contains('murid_id', $student->murid_id)) {
            abort(403, 'Murid is not enrolled in this class schedule.');
        }

        // Fetch recent attendances for timeline (limit 5)
        $recent_attendances = Presensi::where('murid_id', $student->murid_id)
            ->where('jadwal_id', $schedule->jadwal_id)
            ->orderBy('tanggal_presensi', 'desc')
            ->limit(8)
            ->get();

        return view('mentor.presensi.formulir', compact('schedule', 'student', 'recent_attendances'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'murid_id' => 'required|exists:murid,murid_id',
            'jadwal_id' => 'required|exists:jadwal_kelas,jadwal_id',
            'status' => 'required|in:hadir,tidak_hadir,libur',
            'notes' => 'nullable|string|max:1000'
        ], [
            'status.required' => 'Status presensi wajib diisi.',
            'status.in' => 'Status presensi yang dipilih tidak valid.'
        ]);

        $tanggal = Carbon::today()->toDateString();
        $mentorUserId = Auth::id();

        $schedule = JadwalKelas::where('jadwal_id', $request->jadwal_id)
            ->where('mentor_id', Auth::user()->mentor_id)
            ->firstOrFail();
        if (! $schedule->students()->where('murid.murid_id', $request->murid_id)->exists()) {
            abort(403, 'Murid ini tidak terdaftar di kelas Anda.');
        }

        // Cek apakah sudah ada presensi hari ini
        $exists = Presensi::where('murid_id', $request->murid_id)
            ->where('jadwal_id', $request->jadwal_id)
            ->whereDate('tanggal_presensi', $tanggal)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Presensi untuk murid ini pada jadwal hari ini sudah diisi.');
        }

        try {
            DB::beginTransaction();

            // Simpan log presensi
            Presensi::create([
                'murid_id' => $request->murid_id,
                'jadwal_id' => $request->jadwal_id,
                'tanggal_presensi' => $tanggal,
                'status_presensi' => $request->status,
                'notes_presensi' => $request->notes,
            ]);

            // Pengurangan Kuota hanya jika "hadir"
            if ($request->status === 'hadir') {
                $student = Murid::with('parent.user')->findOrFail($request->murid_id);
                $student->decrement('kuota_belajar');
                $student->refresh();

                if ($student->kuota_belajar <= 0 && $student->parent && $student->parent->user) {
                    $student->parent->user->notify(new \App\Notifications\TeguranKuotaNotification($student, true));
                }
            }

            DB::commit();
            return redirect()->route('mentor.jadwal')->with('success', 'Presensi berhasil disimpan.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menyimpan presensi: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $editMode = Presensi::findOrFail($id);
        $schedule = JadwalKelas::findOrFail($editMode->jadwal_id);
        $student = Murid::findOrFail($editMode->murid_id);

        if ($schedule->mentor_id !== Auth::user()->mentor_id) {
            abort(403, 'Unauthorized access.');
        }

        $recent_attendances = Presensi::where('murid_id', $student->murid_id)
            ->where('jadwal_id', $schedule->jadwal_id)
            ->orderBy('tanggal_presensi', 'desc')
            ->limit(8)
            ->get();

        return view('mentor.presensi.formulir', compact('schedule', 'student', 'recent_attendances', 'editMode'));
    }

    public function update(Request $request, $id)
    {
        $attendance = Presensi::findOrFail($id);
        $schedule = JadwalKelas::findOrFail($attendance->jadwal_id);

        if ($schedule->mentor_id !== Auth::user()->mentor_id) {
            abort(403, 'Unauthorized access.');
        }

        $request->validate([
            'status' => 'required|in:hadir,tidak_hadir,libur',
            'notes' => 'nullable|string|max:1000'
        ]);

        try {
            DB::beginTransaction();

            $oldStatus = $attendance->status_presensi;
            $newStatus = $request->status;

            $attendance->update([
                'status_presensi' => $newStatus,
                'notes_presensi' => $request->notes,
            ]);

            // Adjust quota
            if ($oldStatus === 'hadir' && $newStatus !== 'hadir') {
                // Refund 1 quota
                $attendance->student->increment('kuota_belajar');
            } elseif ($oldStatus !== 'hadir' && $newStatus === 'hadir') {
                // Deduct 1 quota
                $attendance->student->decrement('kuota_belajar');
            }

            DB::commit();
            return redirect()->route('mentor.presensi.create', [$schedule->jadwal_id, $attendance->murid_id])->with('success', 'Data presensi berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memperbarui presensi: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $attendance = Presensi::findOrFail($id);
        $schedule = JadwalKelas::findOrFail($attendance->jadwal_id);
        $murid_id = $attendance->murid_id;

        if ($schedule->mentor_id !== Auth::user()->mentor_id) {
            abort(403, 'Unauthorized access.');
        }

        try {
            DB::beginTransaction();

            if ($attendance->status_presensi === 'hadir') {
                $attendance->student->increment('kuota_belajar');
            }

            $attendance->delete();

            DB::commit();
            return redirect()->route('mentor.presensi.create', [$schedule->jadwal_id, $murid_id])->with('success', 'Data presensi berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menghapus presensi: ' . $e->getMessage());
        }
    }
}
