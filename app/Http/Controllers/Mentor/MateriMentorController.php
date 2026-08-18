<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MateriBelajar;
use App\Models\StatusBacaNotifikasi;

class MateriMentorController extends Controller
{
    public function index(Request $request)
    {
        $mentor = Auth::user();

        // 1. Reset badge (catat kunjungan terakhir)
        StatusBacaNotifikasi::updateOrCreate(
            ['user_id' => $mentor->user_id, 'kunci' => 'mentor_materi_last_seen'],
            ['terakhir_dibaca' => now()]
        );

        $search = $request->input('search');
        $kelas = $request->input('kelas');
        $mapel = $request->input('mapel');
        $tipe_materi = $request->input('tipe_materi');

        // Ambil daftar mapel unik

        $mapels = MateriBelajar::where('status_materi', true)
                          ->whereNotNull('nama_mapel')
                          ->where('nama_mapel', '!=', '')
                          ->distinct()
                          ->orderBy('nama_mapel')
                          ->pluck('nama_mapel');

        // Ambil semua materi yang aktif (Mentor memiliki akses ke semua jenjang dan hak akses)
        $query = MateriBelajar::where('status_materi', true);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama_materi', 'like', "%{$search}%")
                  ->orWhere('deskripsi_materi', 'like', "%{$search}%");
            });
        }

        if ($kelas) {
            $query->where('kelas_materi', $kelas);
        }

        if ($mapel) {
            $query->where('nama_mapel', $mapel);
        }

        if ($tipe_materi) {
            $query->where('tipe_materi', $tipe_materi);
        }

        $materials = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('mentor.materi.daftar', compact('materials', 'search', 'kelas', 'mapel', 'mapels', 'tipe_materi'));
    }

    public function show($id)
    {
        $material = MateriBelajar::findOrFail($id);

        // Tambah count view jika ingin tracking (opsional)
        if (isset($material->jumlah_klik)) {
            $material->increment('jumlah_klik');
        }

        // Biasanya redirect ke URL Tautan
        if ($material->url_tautan) {
            return redirect()->away($material->url_tautan);
        }

        // Atau jika file lokal
        if ($material->sumber_tautan) {
            return response()->download(storage_path('app/public/' . $material->sumber_tautan));
        }

        return back()->with('error', 'File tidak ditemukan.');
    }
}
