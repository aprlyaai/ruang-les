<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MateriBelajar;
use App\Models\Murid;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class RepositoriOrangTuaController extends Controller
{
    private function getActiveStudent($ortuId)
    {
        $activeSiswaId = session('active_student_id');
        if (!$activeSiswaId) {
            $siswa = Murid::where('orangtua_id', $ortuId)->first();
            if ($siswa) {
                $activeSiswaId = $siswa->murid_id;
            }
        }
        return Murid::find($activeSiswaId);
    }

    public function index(Request $request)
    {
        $ortuId = Auth::user()->orangtua_id;
        $student = $this->getActiveStudent($ortuId);

        $isPaymentPending = false;

        if ($student) {
            // Cek apakah ada tagihan pending untuk student ini
            $isPaymentPending = Transaksi::where('murid_id', $student->murid_id)
                ->where('status_transaksi', 'pending')
                ->exists();
        }

        $query = MateriBelajar::with('uploader')
            ->where('status_materi', 1)
            ->whereIn('hak_akses', ['Publik', 'Murid']);

        // Strict Filter by active student's grade level
        if ($student) {
            // Ekstrak angka saja jika formatnya "Kelas 3" atau "3 SD". Atau asumsikan match string
            $query->where('kelas_materi', $student->kelas);
        } else {
            // Jika tidak ada anak yang aktif, tidak ada materi yang tampil
            $query->where('materi_id', -1);
        }

        // Filter: Kata Kunci
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_materi', 'like', "%{$search}%")
                  ->orWhere('topik_bab', 'like', "%{$search}%")
                  ->orWhere('deskripsi_materi', 'like', "%{$search}%");
            });
        }

        // Filter: Mata Pelajaran
        if ($request->filled('mapel')) {
            $query->where('nama_mapel', $request->mapel);
        }

        // Filter: Tipe Materi
        if ($request->filled('tipe_materi')) {
            $query->where('tipe_materi', $request->tipe_materi);
        }

        $materials = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();

        // Dapatkan mapel untuk dropdown filter
        $mapels = MateriBelajar::where('status_materi', 1)->pluck('nama_mapel')->filter()->unique()->sort()->values();

        return view('orang-tua.repositori.daftar', compact('materials', 'mapels', 'student', 'isPaymentPending'));
    }
}
