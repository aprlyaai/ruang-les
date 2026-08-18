<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProfilController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $user->load('parentProfile');
        return view('orang-tua.profil.utama', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $rules = [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->user_id, 'user_id'),
            ],
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nomor_telepon' => 'nullable|string|max:20',
            'alamat_domisili' => 'nullable|string|max:500',
            'status_hubungan' => 'nullable|string|max:50',
        ];

        // Jika password diisi, tambahkan validasi password
        if ($request->filled('password')) {
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        $validated = $request->validate($rules);

        DB::beginTransaction();
        try {
            // Update data user
            $user->name = $validated['name'];
            $user->email = $validated['email'];

            if ($request->filled('password')) {
                $user->password = Hash::make($validated['password']);
            }

            // Handle Avatar Upload
            if ($request->hasFile('avatar')) {
                if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                    Storage::disk('public')->delete($user->avatar);
                }

                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                $user->avatar = $avatarPath;
            }

            $user->save();

            // Update parent profile
            $parentProfile = $user->parentProfile ?: $user->parentProfile()->create();
            $parentProfile->update([
                'no_telepon_orangtua' => $validated['nomor_telepon'] ?? null,
                'alamat_domisili' => $validated['alamat_domisili'] ?? null,
                'status_hubungan' => $validated['status_hubungan'] ?? null,
            ]);

            DB::commit();

            return redirect()->route('ortu.profile.index')->with('success', 'Profil berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Gagal memperbarui profil: ' . $e->getMessage());
        }
    }
}
