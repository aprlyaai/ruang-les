<?php

namespace App\Http\Controllers\Mentor;

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
        $user->load('mentorProfile');
        return view('mentor.profil.utama', compact('user'));
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
            'no_telepon_mentor' => 'nullable|string|max:20',
            'tempat_lahir_mentor' => 'nullable|string|max:50',
            'tanggal_lahir_mentor' => 'nullable|date',
            'jenis_kelamin_mentor' => 'nullable|in:Laki-laki,Perempuan',
            'alamat_mentor' => 'nullable|string',
            'pendidikan_mentor' => 'nullable|string|max:255',
            'spesialisasi_mentor' => 'nullable|string|max:255',
            'nama_bank' => 'nullable|string|max:50',
            'nomor_akun_bank' => 'nullable|string|max:50',
            'nama_akun_bank' => 'nullable|string|max:100',
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

            // Update mentor profile
            $mentorProfile = $user->mentorProfile ?: $user->mentorProfile()->create();
            $mentorProfile->update([
                'no_telepon_mentor' => $validated['no_telepon_mentor'] ?? null,
                'tempat_lahir_mentor' => $validated['tempat_lahir_mentor'] ?? null,
                'tanggal_lahir_mentor' => $validated['tanggal_lahir_mentor'] ?? null,
                'jenis_kelamin_mentor' => $validated['jenis_kelamin_mentor'] ?? null,
                'alamat_mentor' => $validated['alamat_mentor'] ?? null,
                'pendidikan_mentor' => $validated['pendidikan_mentor'] ?? null,
                'spesialisasi_mentor' => $validated['spesialisasi_mentor'] ?? null,
                'nama_bank' => $validated['nama_bank'] ?? null,
                'nomor_akun_bank' => $validated['nomor_akun_bank'] ?? null,
                'nama_akun_bank' => $validated['nama_akun_bank'] ?? null,
            ]);

            DB::commit();

            return redirect()->route('mentor.profile.index')->with('success', 'Profil berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Gagal memperbarui profil: ' . $e->getMessage());
        }
    }
}
