<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Pengguna;
use App\Models\StatusBacaNotifikasi;
use App\Models\Mentor;
use App\Models\OrangTua;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    public function index(Request $request)
    {
        // Reset badge: catat kapan admin terakhir mengunjungi halaman ini
        StatusBacaNotifikasi::updateOrCreate(
            ['user_id' => auth()->id(), 'kunci' => 'users_last_seen'],
            ['terakhir_dibaca' => now()]
        );

        $users = Pengguna::withTrashed()->orderBy('name', 'asc')->get();
        return view('admin.pengguna.daftar', compact('users'));
    }

    public function create()
    {
        return view('admin.pengguna.formulir');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,mentor,orang_tua',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
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
                'role' => $request->role,
                'avatar' => $avatarPath,
            ]);

            if ($user->role === 'mentor') {
                Mentor::create(['user_id' => $user->user_id, 'status_mentor' => true]);
            } elseif ($user->role === 'orang_tua') {
                OrangTua::create(['user_id' => $user->user_id]);
            }
        });

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = Pengguna::withTrashed()->findOrFail($id);
        return view('admin.pengguna.formulir', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = Pengguna::withTrashed()->findOrFail($id);

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->user_id . ',user_id',
            'role' => 'required|in:admin,mentor,orang_tua',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        $request->validate($rules);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('avatar')) {
            // Hapus gambar lama jika ada
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($data);

        if ($user->role === 'mentor') {
            Mentor::firstOrCreate(['user_id' => $user->user_id], ['status_mentor' => true]);
        } elseif ($user->role === 'orang_tua') {
            OrangTua::firstOrCreate(['user_id' => $user->user_id]);
        }

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = Pengguna::withTrashed()->findOrFail($id);
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        // Proteksi Finansial & Akademik: Cegah penghapusan permanen jika memiliki relasi krusial
        if ($user->role === 'orang_tua' && \App\Models\Murid::where('orangtua_id', $user->orangtua_id)->exists()) {
            return redirect()->route('admin.users.index')->with('error', 'Gagal! Akun ini tidak dapat dihapus permanen karena memiliki data murid dan riwayat finansial. Silakan gunakan fitur Nonaktifkan akun.');
        }

        if ($user->role === 'mentor' && \App\Models\JadwalKelas::where('mentor_id', $user->mentor_id)->exists()) {
            return redirect()->route('admin.users.index')->with('error', 'Gagal! Akun ini tidak dapat dihapus permanen karena masih terikat dengan histori Jadwal Kelas. Silakan gunakan fitur Nonaktifkan akun.');
        }

        // Hapus file avatar
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        // Cascade delete ke profil terkait (Mencegah Orphaned Data)
        if ($user->mentorProfile) {
            $user->mentorProfile()->forceDelete();
        }
        if ($user->parentProfile) {
            $user->parentProfile()->forceDelete();
        }

        $user->forceDelete(); // Permanent Delete
        return redirect()->route('admin.users.index')->with('success', 'Akun pengguna beserta profil terkait berhasil dihapus permanen.');
    }

    public function restore($id)
    {
        $user = Pengguna::withTrashed()->findOrFail($id);
        $user->restore(); // Activate
        return redirect()->route('admin.users.index')->with('success', 'Akun berhasil Diaktifkan kembali.');
    }

    public function toggleStatus($id)
    {
        $user = Pengguna::withTrashed()->findOrFail($id);
        if ($user->id === auth()->id()) {
            return response()->json(['success' => false, 'message' => 'Anda tidak dapat menonaktifkan akun Anda sendiri.'], 403);
        }

        if ($user->trashed()) {
            $user->restore();
            return response()->json(['success' => true, 'newValue' => true]);
        } else {
            $user->delete();
            return response()->json(['success' => true, 'newValue' => false]);
        }
    }

    public function resetPassword($id)
    {
        $user = Pengguna::withTrashed()->findOrFail($id);
        $user->password = bcrypt('user12345');
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Password untuk ' . $user->name . ' berhasil direset menjadi: user12345');
    }
}
