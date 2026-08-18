<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        // Urutkan berdasarkan tipe (Privat -> Semi Privat -> Reguler), lalu yang terlama di atas, terbaru di bawah dalam kategori yang sama
        $packages = \App\Models\Program::orderByRaw("FIELD(tipe_program, 'Privat', 'Semi Privat', 'Reguler')")->orderBy('created_at', 'asc')->paginate(50);
        return view('admin.program.daftar', compact('packages'));
    }

    public function create()
    {
        return view('admin.program.formulir');
    }

    public function show($id)
    {
        return redirect()->route('admin.packages.edit', $id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe_program' => 'required|in:Privat,Semi Privat,Reguler',
            'nama_program' => 'required|string|max:100',
            'kelas_program' => 'required|string|max:50',
            'lokasi_belajar' => 'required|string|max:50',
            'max_murid' => 'required|integer|min:1',
            'pertemuan' => 'required|integer|min:1',
            'durasi_belajar' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'deskripsi_program' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['status_program'] = $request->has('status_program');
        $data['direkomendasikan'] = $request->has('direkomendasikan');

        // Give it the highest urutan by default
        $data['urutan'] = \App\Models\Program::max('urutan') + 1;

        \App\Models\Program::create($data);

        return redirect()->route('admin.packages.index')->with('success', 'Paket Program Belajar berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $package = \App\Models\Program::findOrFail($id);
        return view('admin.program.formulir', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $package = \App\Models\Program::findOrFail($id);

        $request->validate([
            'tipe_program' => 'required|in:Privat,Semi Privat,Reguler',
            'nama_program' => 'required|string|max:100',
            'kelas_program' => 'required|string|max:50',
            'lokasi_belajar' => 'required|string|max:50',
            'max_murid' => 'required|integer|min:1',
            'pertemuan' => 'required|integer|min:1',
            'durasi_belajar' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'deskripsi_program' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['status_program'] = $request->has('status_program');
        $data['direkomendasikan'] = $request->has('direkomendasikan');

        $package->update($data);

        return redirect()->route('admin.packages.index')->with('success', 'Paket Program Belajar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $package = \App\Models\Program::findOrFail($id);

        // Proteksi Data 1: Cek apakah paket sedang dipakai di Jadwal Kelas
        if (\App\Models\JadwalKelas::where('program_id', $id)->exists()) {
            return redirect()->route('admin.packages.index')->with('error', 'Gagal! Paket ini tidak boleh dihapus karena sedang digunakan di Jadwal Kelas. Silakan nonaktifkan paket jika tidak ingin digunakan lagi.');
        }

        // Proteksi Data 2: Cek apakah paket sedang dipakai di tabel Pendaftaran (Pendaftaran)
        if (\App\Models\Pendaftaran::where('program_id', $id)->exists()) {
            return redirect()->route('admin.packages.index')->with('error', 'Gagal! Paket ini tidak boleh dihapus karena sedang digunakan pada data antrean pendaftaran murid.');
        }

        // Proteksi Data 3: Cek apakah paket memiliki riwayat Transaksi Keuangan
        if (\App\Models\Transaksi::where('program_id', $id)->exists()) {
            return redirect()->route('admin.packages.index')->with('error', 'Gagal! Paket ini tidak boleh dihapus karena sudah memiliki riwayat transaksi/pembayaran. Silakan nonaktifkan paket ini.');
        }

        $package->delete();

        return redirect()->route('admin.packages.index')->with('success', 'Paket Program Belajar berhasil dihapus.');
    }

    public function reorder(Request $request)
    {
        $orders = $request->input('orders', []);
        foreach ($orders as $index => $id) {
            \App\Models\Program::where('program_id', $id)->update(['urutan' => $index + 1]);
        }
        return response()->json(['success' => true]);
    }

    public function toggleStatus(Request $request, $id)
    {
        $package = \App\Models\Program::findOrFail($id);
        $field = $request->input('field'); // 'status_program' or 'direkomendasikan'

        if (in_array($field, ['status_program', 'direkomendasikan'])) {
            $package->update([$field => !$package->$field]);
            return response()->json(['success' => true, 'newValue' => $package->$field]);
        }
        return response()->json(['success' => false], 400);
    }
}
