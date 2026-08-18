<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Nilai;
use Carbon\Carbon;

class NilaiMentorController extends Controller
{
    public function create($jadwal_id, $murid_id)
    {
        $mentor_id = Auth::user()->mentor_id;
        $jadwal = \App\Models\JadwalKelas::where('jadwal_id', $jadwal_id)
            ->where('mentor_id', $mentor_id)
            ->first();

        if (!$jadwal) {
            abort(403, 'Unauthorized access to this class schedule.');
        }

        $siswa = $jadwal->students()->where('murid.murid_id', $murid_id)->first();
        if (!$siswa) {
            abort(403, 'Murid is not enrolled in this class schedule.');
        }

        $recent_scores = \App\Models\Nilai::where('murid_id', $murid_id)
            ->where('jadwal_id', $jadwal_id)
            ->orderBy('tanggal_penilaian', 'desc')
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();

        return view('mentor.nilai.formulir', compact('jadwal', 'siswa', 'recent_scores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'murid_id' => 'required|exists:murid,murid_id',
            'jadwal_id' => 'required|exists:jadwal_kelas,jadwal_id',
            'tanggal_penilaian' => 'required|date',
            'tipe_nilai' => 'required|string|max:255',
            'assessment_type_custom' => 'nullable|required_if:tipe_nilai,Lainnya...|string|max:255',
            'materi_nilai' => 'required|string',
            'skor_nilai' => 'required|numeric|min:0|max:100',
            'notes_nilai' => 'nullable|string',
        ], [], [
            'tanggal_penilaian' => 'Tanggal penilaian',
            'tipe_nilai' => 'Tipe penilaian',
            'assessment_type_custom' => 'Tipe penilaian (lainnya)',
            'materi_nilai' => 'Materi / Topik',
            'skor_nilai' => 'Nilai',
            'notes_nilai' => 'Catatan',
        ]);

        // Security check: pastikan jadwal_id yang dikirim POST benar-benar milik mentor yang login
        $jadwal = \App\Models\JadwalKelas::where('jadwal_id', $request->jadwal_id)
            ->where('mentor_id', Auth::user()->mentor_id)
            ->first();

        if (!$jadwal) {
            abort(403, 'Unauthorized: Jadwal ini bukan milik Anda.');
        }

        // Security check: pastikan student terdaftar di jadwal ini
        if (!$jadwal->students()->where('murid.murid_id', $request->murid_id)->exists()) {
            abort(403, 'Unauthorized: Murid ini tidak terdaftar di kelas Anda.');
        }

        $final_assessment_type = $request->tipe_nilai === 'Lainnya...'
            ? $request->assessment_type_custom
            : $request->tipe_nilai;

        Nilai::create([
            'murid_id' => $request->murid_id,
            'jadwal_id' => $request->jadwal_id,
            'tanggal_penilaian' => $request->tanggal_penilaian,
            'tipe_nilai' => $final_assessment_type,
            'materi_nilai' => $request->materi_nilai,
            'skor_nilai' => $request->skor_nilai,
            'notes_nilai' => $request->notes_nilai,
        ]);

        return redirect()->route('mentor.jadwal')->with('success', 'Nilai berhasil disimpan.');
    }
    public function edit($id)
    {
        $editMode = Nilai::findOrFail($id);
        $jadwal = \App\Models\JadwalKelas::findOrFail($editMode->jadwal_id);
        $siswa = \App\Models\Murid::findOrFail($editMode->murid_id);

        if ($jadwal->mentor_id !== Auth::user()->mentor_id) {
            abort(403, 'Unauthorized access.');
        }

        $recent_scores = \App\Models\Nilai::where('murid_id', $siswa->murid_id)
            ->where('jadwal_id', $jadwal->jadwal_id)
            ->orderBy('tanggal_penilaian', 'desc')
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();

        return view('mentor.nilai.formulir', compact('jadwal', 'siswa', 'recent_scores', 'editMode'));
    }

    public function update(Request $request, $id)
    {
        $skor_nilai = Nilai::findOrFail($id);
        $jadwal = \App\Models\JadwalKelas::findOrFail($skor_nilai->jadwal_id);

        if ($jadwal->mentor_id !== Auth::user()->mentor_id) {
            abort(403, 'Unauthorized access.');
        }

        $request->validate([
            'tanggal_penilaian' => 'required|date',
            'tipe_nilai' => 'required|string|max:255',
            'assessment_type_custom' => 'nullable|required_if:tipe_nilai,Lainnya...|string|max:255',
            'materi_nilai' => 'required|string',
            'skor_nilai' => 'required|numeric|min:0|max:100',
            'notes_nilai' => 'nullable|string',
        ]);

        $final_assessment_type = $request->tipe_nilai === 'Lainnya...'
            ? $request->assessment_type_custom
            : $request->tipe_nilai;

        $skor_nilai->update([
            'tanggal_penilaian' => $request->tanggal_penilaian,
            'tipe_nilai' => $final_assessment_type,
            'materi_nilai' => $request->materi_nilai,
            'skor_nilai' => $request->skor_nilai,
            'notes_nilai' => $request->notes_nilai,
        ]);

        return redirect()->route('mentor.nilai.create', [$jadwal->jadwal_id, $skor_nilai->murid_id])->with('success', 'Nilai berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $skor_nilai = Nilai::findOrFail($id);
        $jadwal = \App\Models\JadwalKelas::findOrFail($skor_nilai->jadwal_id);
        $murid_id = $skor_nilai->murid_id;

        if ($jadwal->mentor_id !== Auth::user()->mentor_id) {
            abort(403, 'Unauthorized access.');
        }

        $skor_nilai->delete();

        return redirect()->route('mentor.nilai.create', [$jadwal->jadwal_id, $murid_id])->with('success', 'Nilai berhasil dihapus.');
    }
}
