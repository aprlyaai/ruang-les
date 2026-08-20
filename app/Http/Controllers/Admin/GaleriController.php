<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Galeri::orderBy('urutan', 'asc')->orderBy('created_at', 'asc')->get();
        return view('admin.galeri.daftar', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galeri.formulir');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_gambar' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'urutan' => 'nullable|integer',
        ], [
            'gambar.required' => 'Foto galeri wajib diunggah.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus berupa: jpg, jpeg, png, webp, atau gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        $data = $request->only(['nama_gambar', 'kategori', 'urutan']);
        $data['status_galeri'] = $request->boolean('status_galeri');
        $data['urutan'] = $data['urutan'] ?? (Galeri::max('urutan') + 1);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('galleries', 'public');
            $data['gambar'] = $imagePath;
        }

        Galeri::create($data);
        \Illuminate\Support\Facades\Cache::forget('public.galleries');

        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $gallery = Galeri::findOrFail($id);
        return view('admin.galeri.formulir', compact('gallery'));
    }

    public function update(Request $request, string $id)
    {
        $gallery = Galeri::findOrFail($id);

        $request->validate([
            'nama_gambar' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'urutan' => 'nullable|integer',
        ], [
            'gambar.image' => 'File yang diunggah harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus berupa: jpg, jpeg, png, webp, atau gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        $data = $request->only(['nama_gambar', 'kategori', 'urutan']);
        $data['status_galeri'] = $request->boolean('status_galeri');
        $data['urutan'] = $data['urutan'] ?? 0;

        if ($request->hasFile('gambar')) {
            // Delete old gambar
            if (!empty($gallery->gambar) && \Illuminate\Support\Facades\Storage::disk('public')->exists($gallery->gambar)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($gallery->gambar);
            }

            $imagePath = $request->file('gambar')->store('galleries', 'public');
            $data['gambar'] = $imagePath;
        }

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $gallery = Galeri::findOrFail($id);
        if (!empty($gallery->gambar) && \Illuminate\Support\Facades\Storage::disk('public')->exists($gallery->gambar)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($gallery->gambar);
        }
        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil dihapus!');
    }

    public function reorder(Request $request)
    {
        $orders = $request->input('orders', []);
        foreach ($orders as $index => $id) {
            Galeri::where('galeri_id', $id)->update(['urutan' => $index + 1]);
        }
        \Illuminate\Support\Facades\Cache::forget('public.galleries');
        return response()->json(['success' => true]);
    }

    public function toggleStatus(Request $request, string $id)
    {
        $gallery = Galeri::findOrFail($id);
        $field = $request->input('field');
        if (!$field || $field === 'is_active') {
            $field = 'status_galeri';
        }

        if ($field === 'status_galeri') {
            $gallery->status_galeri = !$gallery->status_galeri;
            $gallery->save();
            \Illuminate\Support\Facades\Cache::forget('public.galleries');

            return response()->json([
                'success' => true,
                'newValue' => $gallery->status_galeri,
                'message' => 'Status galeri berhasil diubah.'
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Field tidak valid.'], 400);
    }
}
