<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MuridController extends Controller
{
    public function index()
    {
        $students = Murid::with('parent')->orderBy('nama_murid', 'asc')->get();
        return view('admin.murid.daftar', compact('students'));
    }

    public function show($id)
    {
        $student = Murid::with(['parent', 'classes'])->findOrFail($id);

        $attendances = \App\Models\Presensi::with('schedule.package')
            ->where('murid_id', $student->id)
            ->orderBy('tanggal_presensi', 'desc')
            ->get();

        $notes = \App\Models\CatatanPerkembangan::with('schedule.package')
            ->where('murid_id', $student->id)
            ->orderBy('tanggal_catatan', 'desc')
            ->get();

        $scores = \App\Models\Nilai::with('schedule.package')
            ->where('murid_id', $student->id)
            ->orderBy('tanggal_penilaian', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.murid.detail', compact('student', 'attendances', 'notes', 'scores'));
    }

    public function create()
    {
        $parents = Pengguna::where('role', 'orang_tua')->whereHas('parentProfile')->with('parentProfile')->orderBy('name')->get();
        return view('admin.murid.formulir', compact('parents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'orangtua_id' => ['required', Rule::exists('orang_tua', 'orangtua_id')],
            'nama_murid' => 'required|string|max:255',
            'panggilan_murid' => 'required|string|max:50',
            'tempat_lahir_murid' => 'required|string|max:100',
            'tanggal_lahir_murid' => 'required|date',
            'jenis_kelamin_murid' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:50',
            'sekolah' => 'required|string|max:255',
            'kelas' => 'required|in:1,2,3,4,5,6',
            'nilai_rata_rata' => 'nullable|numeric|min:0|max:100',
            'mapel_ditingkatkan' => 'required|string',
            'mapel_sulit' => 'nullable|string',
            'karakteristik_anak' => 'required|string',
        ]);

        Murid::create([
            'orangtua_id' => $request->orangtua_id,
            'nama_murid' => $request->nama_murid,
            'panggilan_murid' => $request->panggilan_murid,
            'tempat_lahir_murid' => $request->tempat_lahir_murid,
            'tanggal_lahir_murid' => $request->tanggal_lahir_murid,
            'jenis_kelamin_murid' => $request->jenis_kelamin_murid,
            'agama' => $request->agama,
            'sekolah' => $request->sekolah,
            'kelas' => $request->kelas,
            'nilai_rata_rata' => $request->nilai_rata_rata,
            'mapel_ditingkatkan' => $request->mapel_ditingkatkan,
            'mapel_sulit' => $request->mapel_sulit,
            'karakteristik_anak' => $request->karakteristik_anak,
            'status_murid' => 'active',
            'kuota_belajar' => 0, // Since enrollment is separate, quota is 0 initially
        ]);

        return redirect()->route('admin.students.index')->with('success', 'Data Siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $student = Murid::findOrFail($id);
        $parents = Pengguna::where('role', 'orang_tua')->whereHas('parentProfile')->with('parentProfile')->orderBy('name')->get();
        return view('admin.murid.formulir', compact('student', 'parents'));
    }

    public function update(Request $request, $id)
    {
        $student = Murid::findOrFail($id);

        $request->validate([
            'orangtua_id' => ['required', Rule::exists('orang_tua', 'orangtua_id')],
            'nama_murid' => 'required|string|max:255',
            'panggilan_murid' => 'required|string|max:50',
            'tempat_lahir_murid' => 'required|string|max:100',
            'tanggal_lahir_murid' => 'required|date',
            'jenis_kelamin_murid' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:50',
            'sekolah' => 'required|string|max:255',
            'kelas' => 'required|in:1,2,3,4,5,6',
            'nilai_rata_rata' => 'nullable|numeric|min:0|max:100',
            'mapel_ditingkatkan' => 'required|string',
            'mapel_sulit' => 'nullable|string',
            'karakteristik_anak' => 'required|string',
            'status_murid' => 'required|in:active,inactive',
        ]);

        $student->update([
            'orangtua_id' => $request->orangtua_id,
            'nama_murid' => $request->nama_murid,
            'panggilan_murid' => $request->panggilan_murid,
            'tempat_lahir_murid' => $request->tempat_lahir_murid,
            'tanggal_lahir_murid' => $request->tanggal_lahir_murid,
            'jenis_kelamin_murid' => $request->jenis_kelamin_murid,
            'agama' => $request->agama,
            'sekolah' => $request->sekolah,
            'kelas' => $request->kelas,
            'nilai_rata_rata' => $request->nilai_rata_rata,
            'mapel_ditingkatkan' => $request->mapel_ditingkatkan,
            'mapel_sulit' => $request->mapel_sulit,
            'karakteristik_anak' => $request->karakteristik_anak,
            'status_murid' => $request->status_murid,
        ]);

        if ($request->from == 'detail') {
            return redirect()->route('admin.students.show', $student->id)->with('success', 'Data Siswa berhasil diperbarui.');
        }

        return redirect()->route('admin.students.index')->with('success', 'Data Siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $student = Murid::findOrFail($id);

        // Proteksi Finansial & Akademik: Cegah penghapusan permanen jika memiliki relasi krusial
        if ($student->transactions()->exists() || $student->classes()->exists() || $student->attendances()->exists() || $student->scores()->exists()) {
            return redirect()->route('admin.students.index')->with('error', 'Gagal! Data murid ini tidak dapat dihapus permanen karena memiliki rekam jejak operasional (riwayat transaksi, jadwal kelas, presensi, atau nilai). Silakan ubah status murid menjadi Nonaktif.');
        }

        $student->delete();
        return redirect()->route('admin.students.index')->with('success', 'Data Siswa berhasil dihapus.');
    }
}
