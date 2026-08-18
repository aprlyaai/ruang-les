<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JadwalKelas;
use App\Models\Program;
use App\Models\Murid;
use App\Models\Pengguna;
use Illuminate\Support\Facades\DB;

class JadwalKelasController extends Controller
{
    public function index()
    {
        $groupedSchedules = JadwalKelas::select('jadwal_kelas.*')
            ->join('program', 'jadwal_kelas.program_id', '=', 'program.program_id')
            ->with(['mentor', 'package'])
            ->orderBy('jadwal_kelas.waktu_belajar', 'asc')
            ->orderByRaw("FIELD(program.tipe_program, 'Privat', 'Semi Privat', 'Reguler')")
            ->orderBy('jadwal_kelas.nama_kelas', 'asc')
            ->get()
            ->groupBy('hari');

        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $schedules = collect();
        foreach ($days as $day) {
            $schedules[$day] = $groupedSchedules->get($day, collect());
        }

        return view('admin.jadwal-kelas.daftar', compact('schedules'));
    }

    public function show($id)
    {
        $schedule = JadwalKelas::with(['mentor', 'package', 'students'])->findOrFail($id);

        $existingStudentIds = $schedule->students->pluck('murid_id')->toArray();
        $availableStudents = Murid::whereNotIn('murid_id', $existingStudentIds)
            ->orderBy('nama_murid', 'asc')
            ->get();

        return view('admin.jadwal-kelas.detail', compact('schedule', 'availableStudents'));
    }

    public function addStudent(Request $request, $id)
    {
        $request->validate([
            'murid_id' => 'required|exists:murid,murid_id'
        ], [
            'murid_id.required' => 'Silakan pilih murid terlebih dahulu.'
        ]);

        $schedule = JadwalKelas::with('package', 'students')->findOrFail($id);

        $maxCapacity = $schedule->max_murid ?? $schedule->package->max_murid ?? 0;
        if ($maxCapacity > 0 && $schedule->jumlah_murid >= $maxCapacity) {
            return redirect()->route('admin.class-schedules.show', $id)->with('error', 'Gagal! Kapasitas kelas sudah penuh.');
        }

        if ($schedule->students()->where('murid.murid_id', $request->murid_id)->exists()) {
            return redirect()->route('admin.class-schedules.show', $id)->with('error', 'Gagal! Murid ini sudah terdaftar di kelas.');
        }

        DB::transaction(function () use ($schedule, $request) {
            $schedule->students()->attach($request->murid_id);
            $schedule->increment('jumlah_murid');
        });

        return redirect()->route('admin.class-schedules.show', $id)->with('success', 'Murid berhasil ditambahkan ke kelas.');
    }

    public function removeStudent($id, $murid_id)
    {
        $schedule = JadwalKelas::findOrFail($id);

        if ($schedule->students()->where('murid.murid_id', $murid_id)->exists()) {
            DB::transaction(function () use ($schedule, $murid_id) {
                $schedule->students()->detach($murid_id);
                if ($schedule->jumlah_murid > 0) {
                    $schedule->decrement('jumlah_murid');
                }
            });
            return redirect()->route('admin.class-schedules.show', $id)->with('success', 'Murid berhasil dikeluarkan dari kelas.');
        }

        return redirect()->route('admin.class-schedules.show', $id)->with('error', 'Murid tidak ditemukan di kelas ini.');
    }

    public function create()
    {
        $mentors = Pengguna::where('role', 'mentor')->whereHas('mentorProfile')->with('mentorProfile')->orderBy('name')->get();
        $packages = Program::orderByRaw("FIELD(tipe_program, 'Privat', 'Semi Privat', 'Reguler')")->orderBy('created_at')->get();
        return view('admin.jadwal-kelas.formulir', compact('mentors', 'packages'));
    }

    public function store(Request $request)
    {
        $messages = [
            'nama_kelas.required' => 'Nama kelas wajib diisi.',
            'nama_kelas.unique' => 'Nama kelas ini sudah digunakan.',
            'mentor_id.required' => 'Mentor wajib dipilih.',
            'program_id.required' => 'Paket program belajar wajib dipilih.',
            'hari.required' => 'Hari belajar wajib dipilih.',
            'waktu_belajar.required' => 'Waktu belajar wajib dipilih.'
        ];

        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'mentor_id' => 'required|exists:mentor,mentor_id',
            'program_id' => 'required|exists:program,program_id',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'waktu_belajar' => 'required|in:15:00,16:00,17:00,18:00,19:00,20:00',
            'status_aktif' => 'nullable'
        ], $messages);

        // Cek bentrok jadwal mentor
        $isConflict = JadwalKelas::where('mentor_id', $request->mentor_id)
            ->where('hari', $request->hari)
            ->where('waktu_belajar', $request->waktu_belajar)
            ->where('status_jadwal', 'active') // Hanya cek jika jadwal aktif
            ->exists();

        if ($isConflict) {
            return back()->withInput()->withErrors(['mentor_id' => 'Gagal! Mentor ini sudah memiliki kelas lain di hari dan jam yang sama.']);
        }

        $package = Program::findOrFail($request->program_id);
        JadwalKelas::create([
            'nama_kelas' => $request->nama_kelas,
            'mentor_id' => $request->mentor_id,
            'program_id' => $request->program_id,
            'hari' => $request->hari,
            'waktu_belajar' => $request->waktu_belajar,
            'max_murid' => $package->max_murid,
            'jumlah_murid' => 0,
            'status_jadwal' => $request->has('status_aktif') ? 'active' : 'archived',
        ]);

        return redirect()->route('admin.class-schedules.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $schedule = JadwalKelas::findOrFail($id);
        $mentors = Pengguna::where('role', 'mentor')->whereHas('mentorProfile')->with('mentorProfile')->orderBy('name')->get();
        $packages = Program::orderByRaw("FIELD(tipe_program, 'Privat', 'Semi Privat', 'Reguler')")->orderBy('created_at')->get();
        return view('admin.jadwal-kelas.formulir', compact('schedule', 'mentors', 'packages'));
    }

    public function update(Request $request, $id)
    {
        $schedule = JadwalKelas::findOrFail($id);

        $messages = [
            'nama_kelas.required' => 'Nama kelas wajib diisi.',
            'nama_kelas.unique' => 'Nama kelas ini sudah digunakan.',
            'mentor_id.required' => 'Mentor wajib dipilih.',
            'program_id.required' => 'Paket program belajar wajib dipilih.',
            'hari.required' => 'Hari belajar wajib dipilih.',
            'waktu_belajar.required' => 'Waktu belajar wajib dipilih.'
        ];

        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'mentor_id' => 'required|exists:mentor,mentor_id',
            'program_id' => 'required|exists:program,program_id',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'waktu_belajar' => 'required|in:15:00,16:00,17:00,18:00,19:00,20:00',
            'status_aktif' => 'nullable'
        ], $messages);

        // Cek bentrok jadwal mentor (kecualikan jadwal ini sendiri)
        $isConflict = JadwalKelas::where('mentor_id', $request->mentor_id)
            ->where('hari', $request->hari)
            ->where('waktu_belajar', $request->waktu_belajar)
            ->where('status_jadwal', 'active') // Hanya cek jika jadwal aktif
            ->where('jadwal_id', '!=', $id)
            ->exists();

        if ($isConflict) {
            return back()->withInput()->withErrors(['mentor_id' => 'Gagal! Mentor ini sudah memiliki kelas lain di hari dan jam yang sama.']);
        }

        $package = Program::findOrFail($request->program_id);
        $schedule->update([
            'nama_kelas' => $request->nama_kelas,
            'mentor_id' => $request->mentor_id,
            'program_id' => $request->program_id,
            'hari' => $request->hari,
            'waktu_belajar' => $request->waktu_belajar,
            'max_murid' => $package->max_murid,
            'status_jadwal' => $request->has('status_aktif') ? 'active' : 'archived',
        ]);

        return redirect()->route('admin.class-schedules.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $schedule = JadwalKelas::findOrFail($id);

        if ($schedule->students()->count() > 0) {
            return redirect()->route('admin.class-schedules.index')->with('error', 'Gagal! Jadwal tidak bisa dihapus karena masih ada murid yang terdaftar. Keluarkan murid terlebih dahulu.');
        }

        // Mencegah penghapusan sejarah (Rule: Sejarah tidak boleh dihapus, hanya dinonaktifkan)
        $hasHistory = \App\Models\Presensi::where('jadwal_id', $id)->exists();
        if ($hasHistory) {
            return redirect()->route('admin.class-schedules.index')->with('error', 'Gagal! Jadwal ini sudah memiliki rekam jejak presensi. Jadwal dengan riwayat operasional hanya boleh dinonaktifkan (diarsipkan), tidak boleh dihapus.');
        }

        $schedule->delete();
        return redirect()->route('admin.class-schedules.index')->with('success', 'Jadwal berhasil dihapus.');
    }

    public function remindMentor($id)
    {
        $schedule = JadwalKelas::with(['mentor', 'package'])->findOrFail($id);
        $mentor = $schedule->mentor;

        if (!$mentor) {
            return back()->with('error', 'Gagal mengirim pengingat, mentor tidak ditemukan.');
        }

        $todayDate = now()->format('Y-m-d');

        // Check missing items
        $hasAttendance = \App\Models\Presensi::where('jadwal_id', $schedule->jadwal_id)
            ->whereDate('tanggal_presensi', $todayDate)
            ->exists();

        $hasProgressNote = \App\Models\CatatanPerkembangan::where('jadwal_id', $schedule->jadwal_id)
            ->whereDate('tanggal_catatan', $todayDate)
            ->exists();

        $hasScore = \App\Models\Nilai::where('jadwal_id', $schedule->jadwal_id)
            ->whereDate('tanggal_penilaian', $todayDate)
            ->exists();

        $missingTasks = [];
        if (!$hasAttendance) {
            $missingTasks[] = 'Presensi';
        }
        if (!$hasProgressNote) {
            $missingTasks[] = 'Catatan Perkembangan';
        }
        if (!$hasScore) {
            $missingTasks[] = 'Nilai';
        }

        if (empty($missingTasks)) {
            return back()->with('info', 'Data kelas mentor ini sudah lengkap untuk hari ini.');
        }

        // Send notification
        $mentor->user->notify(new \App\Notifications\MentorReminderNotification($schedule, $missingTasks));

        return back()->with('success', 'Pengingat berhasil dikirim ke Mentor via Sistem dan Email!');
    }
}
