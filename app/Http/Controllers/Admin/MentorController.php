<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\Mentor;
use Illuminate\Support\Facades\DB;

class MentorController extends Controller
{
    public function index()
    {
        $mentors = Pengguna::where('role', 'mentor')
            ->with(['mentorProfile', 'jadwals'])
            ->withCount('jadwals')
            ->orderBy('name', 'asc')
            ->get();
        return view('admin.mentor.daftar', compact('mentors'));
    }

    public function show($id)
    {
        $mentor = Pengguna::where('role', 'mentor')->with(['mentorProfile', 'jadwals.package'])->findOrFail($id);
        return view('admin.mentor.detail', compact('mentor'));
    }

    public function create()
    {
        return view('admin.mentor.formulir');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            // Profile fields
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
                'role' => 'mentor',
                'avatar' => $avatarPath,
            ]);

            Mentor::create([
                'user_id' => $user->user_id,
                'no_telepon_mentor' => $request->no_telepon_mentor,
                'tempat_lahir_mentor' => $request->tempat_lahir_mentor,
                'tanggal_lahir_mentor' => $request->tanggal_lahir_mentor,
                'jenis_kelamin_mentor' => $request->jenis_kelamin_mentor,
                'alamat_mentor' => $request->alamat_mentor,
                'pendidikan_mentor' => $request->pendidikan_mentor,
                'spesialisasi_mentor' => $request->spesialisasi_mentor,
                'nama_bank' => $request->nama_bank,
                'nomor_akun_bank' => $request->nomor_akun_bank,
                'nama_akun_bank' => $request->nama_akun_bank,
                'status_mentor' => $request->boolean('status_mentor'),
            ]);
        });

        return redirect()->route('admin.mentor.index')->with('success', 'Mentor berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mentor = Pengguna::where('role', 'mentor')->with('mentorProfile')->findOrFail($id);
        return view('admin.mentor.formulir', compact('mentor'));
    }

    public function update(Request $request, $id)
    {
        $mentor = Pengguna::where('role', 'mentor')->findOrFail($id);

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $mentor->user_id . ',user_id',
            // Profile fields
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
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        $request->validate($rules);

        $avatarPath = $mentor->avatar;
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($avatarPath && \Illuminate\Support\Facades\Storage::disk('public')->exists($avatarPath)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($avatarPath);
            }
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        DB::transaction(function () use ($request, $mentor, $avatarPath) {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'avatar' => $avatarPath,
            ];

            if ($request->filled('password')) {
                $data['password'] = bcrypt($request->password);
            }

            $mentor->update($data);

            $profileData = [
                'no_telepon_mentor' => $request->no_telepon_mentor,
                'tempat_lahir_mentor' => $request->tempat_lahir_mentor,
                'tanggal_lahir_mentor' => $request->tanggal_lahir_mentor,
                'jenis_kelamin_mentor' => $request->jenis_kelamin_mentor,
                'alamat_mentor' => $request->alamat_mentor,
                'pendidikan_mentor' => $request->pendidikan_mentor,
                'spesialisasi_mentor' => $request->spesialisasi_mentor,
                'nama_bank' => $request->nama_bank,
                'nomor_akun_bank' => $request->nomor_akun_bank,
                'nama_akun_bank' => $request->nama_akun_bank,
                'status_mentor' => $request->boolean('status_mentor'),
            ];

            if ($mentor->mentorProfile) {
                $mentor->mentorProfile->update($profileData);
            } else {
                $profileData['user_id'] = $mentor->user_id;
                Mentor::create($profileData);
            }
        });

        if ($request->from == 'detail') {
            return redirect()->route('admin.mentor.show', $mentor->id)->with('success', 'Mentor berhasil diperbarui.');
        }

        return redirect()->route('admin.mentor.index')->with('success', 'Mentor berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mentor = Pengguna::where('role', 'mentor')->findOrFail($id);

        if ($mentor->jadwals()->exists()) {
            return redirect()->route('admin.mentor.index')->with('error', 'Mentor tidak dapat dihapus karena memiliki riwayat jadwal. Nonaktifkan akun melalui menu Pengguna.');
        }

        // Hapus file avatar
        if ($mentor->avatar && \Illuminate\Support\Facades\Storage::disk('public')->exists($mentor->avatar)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($mentor->avatar);
        }

        // Aturan #3: Wajib menggunakan forceDelete secara cascade (menghapus profil terkait seperti mentorProfile)
        if ($mentor->mentorProfile) {
            $mentor->mentorProfile()->forceDelete();
        }
        $mentor->forceDelete();

        return redirect()->route('admin.mentor.index')->with('success', 'Mentor berhasil dihapus permanen beserta seluruh data terkait.');
    }
}
