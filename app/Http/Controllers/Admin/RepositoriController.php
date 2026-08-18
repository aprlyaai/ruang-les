<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MateriBelajar;

class RepositoriController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kelas_materi = $request->input('kelas_materi');
        $tipe_materi = $request->input('tipe_materi');
        $mapel = $request->input('nama_mapel');

        $mapels = MateriBelajar::whereNotNull('nama_mapel')
                          ->where('nama_mapel', '!=', '')
                          ->distinct()
                          ->orderBy('nama_mapel')
                          ->pluck('nama_mapel');

        $query = MateriBelajar::with('uploader')->orderBy('created_at', 'desc');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama_materi', 'like', "%{$search}%")
                  ->orWhere('nama_mapel', 'like', "%{$search}%")
                  ->orWhere('topik_bab', 'like', "%{$search}%");
            });
        }

        if ($kelas_materi) {
            $query->where('kelas_materi', $kelas_materi);
        }

        if ($tipe_materi) {
            $query->where('tipe_materi', $tipe_materi);
        }

        if ($mapel) {
            $query->where('nama_mapel', $mapel);
        }

        $materials = $query->paginate(20)->withQueryString();

        return view('admin.repositori.daftar', compact('materials', 'mapels', 'mapel'));
    }

    public function create()
    {
        return view('admin.repositori.formulir');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_materi' => 'required|string|max:150',
            'kelas_materi' => 'required|in:1,2,3,4,5,6',
            'nama_mapel' => 'required|string|max:50',
            'topik_bab' => 'nullable|string|max:100',
            'tipe_materi' => 'required|in:Modul Teori,Latihan Soal,Kunci Jawaban',
            'sumber_tautan' => 'required|in:Google Drive,YouTube,Lainnya',
            'url_tautan' => 'required|url',
            'deskripsi_materi' => 'nullable|string',
            'hak_akses' => 'required|in:Publik,Murid,Mentor',
            'status_materi' => 'boolean'
        ]);

        $validated['diunggah_oleh'] = auth()->id();
        $validated['status_materi'] = $request->has('status_materi');
        $validated['jumlah_klik'] = 0;

        MateriBelajar::create($validated);

        return redirect()->route('admin.repository.index')->with('success', 'Materi berhasil ditambahkan ke Repositori!');
    }

    public function edit($id)
    {
        $material = MateriBelajar::findOrFail($id);
        return view('admin.repositori.formulir', compact('material'));
    }

    public function update(Request $request, $id)
    {
        $material = MateriBelajar::findOrFail($id);

        $validated = $request->validate([
            'nama_materi' => 'required|string|max:150',
            'kelas_materi' => 'required|in:1,2,3,4,5,6',
            'nama_mapel' => 'required|string|max:50',
            'topik_bab' => 'nullable|string|max:100',
            'tipe_materi' => 'required|in:Modul Teori,Latihan Soal,Kunci Jawaban',
            'sumber_tautan' => 'required|in:Google Drive,YouTube,Lainnya',
            'url_tautan' => 'required|url',
            'deskripsi_materi' => 'nullable|string',
            'hak_akses' => 'required|in:Publik,Murid,Mentor'
        ]);

        $validated['status_materi'] = $request->has('status_materi');

        $material->update($validated);

        return redirect()->route('admin.repository.index')->with('success', 'Informasi materi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $material = MateriBelajar::findOrFail($id);
        $material->delete();

        return redirect()->route('admin.repository.index')->with('success', 'Materi berhasil dihapus dari sistem!');
    }
}
