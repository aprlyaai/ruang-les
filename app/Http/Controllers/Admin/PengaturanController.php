<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaturan;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    /**
     * Display the settings dashboard.
     */
    public function index()
    {
        $settings = Pengaturan::pluck('value', 'key')->toArray();
        return view('admin.pengaturan.daftar', compact('settings'));
    }

    /**
     * Update the specified settings in storage.
     */
    public function update(Request $request)
    {
        $imageFields = ['hero_image', 'logo_utama', 'favicon', 'founder_image'];
        
        // 1. Validasi SEMUA file TEPAT di awal (Mencegah Partial Update Paradox)
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $request->validate([
                    $field => 'image|mimes:jpeg,png,jpg,gif,svg,ico,webp|max:2048',
                ]);
            }
        }

        // 2. Jika lolos validasi, baru simpan data teks
        $inputs = $request->except(array_merge(['_token', '_method'], $imageFields));

        foreach ($inputs as $key => $value) {
            Pengaturan::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // 3. Simpan file gambar dengan standar Storage Laravel
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                // Hapus gambar lama jika ada
                $oldImage = Pengaturan::where('key', $field)->value('value');
                if ($oldImage && \Illuminate\Support\Facades\Storage::disk('public')->exists($oldImage)) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($oldImage);
                }

                // Gunakan Storage facade, bukan public_path (Storage Anomaly Fix)
                $imagePath = $request->file($field)->store('settings', 'public');
                
                Pengaturan::updateOrCreate(
                    ['key' => $field],
                    ['value' => $imagePath]
                );
            }
        }

        return redirect()->back()->with('success', 'Pengaturan konten web berhasil diperbarui!');
    }
}
