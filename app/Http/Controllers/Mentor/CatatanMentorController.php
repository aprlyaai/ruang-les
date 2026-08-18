<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CatatanPerkembangan;
use Carbon\Carbon;

class CatatanMentorController extends Controller
{
    public function create($jadwal_id, $murid_id)
    {
        $jadwal = \App\Models\JadwalKelas::findOrFail($jadwal_id);
        $siswa = \App\Models\Murid::findOrFail($murid_id);

        // Security check: ensure mentor owns this schedule
        if ($jadwal->mentor_id !== Auth::user()->mentor_id) {
            abort(403, 'Unauthorized access to this class schedule.');
        }

        // Security check: ensure student is in this schedule
        if (!$jadwal->students->contains('murid_id', $siswa->murid_id)) {
            abort(403, 'Murid is not enrolled in this class schedule.');
        }

        $recent_notes = CatatanPerkembangan::where('murid_id', $siswa->murid_id)
            ->where('jadwal_id', $jadwal->jadwal_id)
            ->orderBy('tanggal_catatan', 'desc')
            ->limit(8)
            ->get();

        return view('mentor.catatan.formulir', compact('jadwal', 'siswa', 'recent_notes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'murid_id' => 'required|exists:murid,murid_id',
            'jadwal_id' => 'required|exists:jadwal_kelas,jadwal_id',
            'materi' => 'required|string',
            'skor_pemahaman' => 'nullable|integer|min:0|max:100',
            'status_fokus' => 'nullable|in:sangat_fokus,fokus,kurang_fokus,tidak_fokus',
            'catatan_perkembangan' => 'required|string',
        ], [
            'materi.required' => 'Materi / Topik wajib diisi.',
            'catatan_perkembangan.required' => 'Catatan perkembangan wajib diisi.',
            'status_fokus.in' => 'Pilihan status fokus tidak valid.',
            'skor_pemahaman.min' => 'Skor tidak boleh kurang dari 0.',
            'skor_pemahaman.max' => 'Skor tidak boleh lebih dari 100.',
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

        $tanggal = Carbon::today()->toDateString();
        $mentor_id = Auth::user()->mentor_id;

        $exists = CatatanPerkembangan::where('murid_id', $request->murid_id)
            ->where('jadwal_id', $request->jadwal_id)
            ->whereDate('tanggal_catatan', $tanggal)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Catatan perkembangan untuk murid ini pada jadwal hari ini sudah diisi.');
        }

        CatatanPerkembangan::create([
            'murid_id' => $request->murid_id,
            'jadwal_id' => $request->jadwal_id,
            'mentor_id' => $mentor_id,
            'tanggal_catatan' => $tanggal,
            'materi' => $request->materi,
            'skor_pemahaman' => $request->skor_pemahaman,
            'status_fokus' => $request->status_fokus,
            'catatan_perkembangan' => $request->catatan_perkembangan,
        ]);

        return redirect()->route('mentor.jadwal')->with('success', 'Catatan perkembangan berhasil disimpan.');
    }
    public function edit($id)
    {
        $editMode = CatatanPerkembangan::findOrFail($id);
        $jadwal = \App\Models\JadwalKelas::findOrFail($editMode->jadwal_id);
        $siswa = \App\Models\Murid::findOrFail($editMode->murid_id);

        if ($jadwal->mentor_id !== Auth::user()->mentor_id) {
            abort(403, 'Unauthorized access.');
        }

        $recent_notes = CatatanPerkembangan::where('murid_id', $siswa->murid_id)
            ->where('jadwal_id', $jadwal->jadwal_id)
            ->orderBy('tanggal_catatan', 'desc')
            ->limit(8)
            ->get();

        return view('mentor.catatan.formulir', compact('jadwal', 'siswa', 'recent_notes', 'editMode'));
    }

    public function update(Request $request, $id)
    {
        $note = CatatanPerkembangan::findOrFail($id);
        $jadwal = \App\Models\JadwalKelas::findOrFail($note->jadwal_id);

        if ($jadwal->mentor_id !== Auth::user()->mentor_id) {
            abort(403, 'Unauthorized access.');
        }

        $request->validate([
            'materi' => 'required|string',
            'skor_pemahaman' => 'nullable|integer|min:0|max:100',
            'status_fokus' => 'nullable|in:sangat_fokus,fokus,kurang_fokus,tidak_fokus',
            'catatan_perkembangan' => 'required|string',
        ]);

        $note->update([
            'materi' => $request->materi,
            'skor_pemahaman' => $request->skor_pemahaman,
            'status_fokus' => $request->status_fokus,
            'catatan_perkembangan' => $request->catatan_perkembangan,
        ]);

        return redirect()->route('mentor.catatan.create', [$jadwal->jadwal_id, $note->murid_id])->with('success', 'Catatan perkembangan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $note = CatatanPerkembangan::findOrFail($id);
        $jadwal = \App\Models\JadwalKelas::findOrFail($note->jadwal_id);
        $murid_id = $note->murid_id;

        if ($jadwal->mentor_id !== Auth::user()->mentor_id) {
            abort(403, 'Unauthorized access.');
        }

        $note->delete();

        return redirect()->route('mentor.catatan.create', [$jadwal->jadwal_id, $murid_id])->with('success', 'Catatan perkembangan berhasil dihapus.');
    }
}
