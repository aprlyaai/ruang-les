<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use App\Models\OrangTua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrangTuaController extends Controller
{
    public function index()
    {
        $parents = Pengguna::where('role', 'orang_tua')
            ->with(['parentProfile', 'students'])
            ->orderBy('name', 'asc')
            ->get();

        return view('admin.orang-tua.daftar', compact('parents'));
    }

    public function show($id)
    {
        $parent = Pengguna::where('role', 'orang_tua')
            ->with(['parentProfile', 'students'])
            ->findOrFail($id);

        return view('admin.orang-tua.detail', compact('parent'));
    }

    public function create()
    {
        return view('admin.orang-tua.formulir');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'no_telepon_orangtua' => 'required|string|max:20',
            'status_hubungan' => 'required|string|max:50',
            'alamat_domisili' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        DB::transaction(function () use ($request, $avatarPath) {
            $user = Pengguna::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'orang_tua',
                'avatar' => $avatarPath,
            ]);

            OrangTua::create([
                'user_id' => $user->user_id,
                'no_telepon_orangtua' => $request->no_telepon_orangtua,
                'status_hubungan' => $request->status_hubungan,
                'alamat_domisili' => $request->alamat_domisili,
            ]);
        });

        return redirect()->route('admin.parents.index')->with('success', 'Wali Murid berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $parent = Pengguna::where('role', 'orang_tua')->with('parentProfile')->findOrFail($id);
        return view('admin.orang-tua.formulir', compact('parent'));
    }

    public function update(Request $request, $id)
    {
        $parent = Pengguna::where('role', 'orang_tua')->findOrFail($id);

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $parent->user_id . ',user_id',
            'no_telepon_orangtua' => 'required|string|max:20',
            'status_hubungan' => 'required|string|max:50',
            'alamat_domisili' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        $request->validate($rules);

        $avatarPath = $parent->avatar;
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($avatarPath && \Illuminate\Support\Facades\Storage::disk('public')->exists($avatarPath)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($avatarPath);
            }
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        DB::transaction(function () use ($request, $parent, $avatarPath) {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'avatar' => $avatarPath,
            ];

            if ($request->filled('password')) {
                $data['password'] = bcrypt($request->password);
            }

            $parent->update($data);

            $profileData = [
                'no_telepon_orangtua' => $request->no_telepon_orangtua,
                'status_hubungan' => $request->status_hubungan,
                'alamat_domisili' => $request->alamat_domisili,
            ];

            if ($parent->parentProfile) {
                $parent->parentProfile->update($profileData);
            } else {
                $profileData['user_id'] = $parent->user_id;
                OrangTua::create($profileData);
            }
        });

        return redirect()->route('admin.parents.index')->with('success', 'Data Wali Murid berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $parent = Pengguna::where('role', 'orang_tua')->findOrFail($id);

        // Proteksi Finansial & Akademik (Konsistensi dengan PenggunaController)
        // Cegah penghapusan permanen jika memiliki relasi murid
        if ($parent->orangtua_id && \App\Models\Murid::where('orangtua_id', $parent->orangtua_id)->exists()) {
            return redirect()->route('admin.parents.index')->with('error', 'Gagal! Akun ini tidak dapat dihapus permanen karena memiliki data murid dan riwayat finansial. Silakan gunakan fitur Nonaktifkan akun dari menu Pengguna.');
        }

        // Hapus file avatar
        if ($parent->avatar && \Illuminate\Support\Facades\Storage::disk('public')->exists($parent->avatar)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($parent->avatar);
        }

        // Cascade delete ke profil terkait (Mencegah Orphaned Data)
        if ($parent->parentProfile) {
            $parent->parentProfile()->forceDelete();
        }

        $parent->forceDelete();

        return redirect()->route('admin.parents.index')->with('success', 'Data Wali Murid berhasil dihapus permanen.');
    }
}
