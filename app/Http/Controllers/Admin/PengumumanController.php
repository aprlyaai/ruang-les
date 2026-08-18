<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $announcements = \App\Models\Pengumuman::orderBy('diprioritaskan', 'desc')
                             ->orderBy('created_at', 'desc')
                             ->get();

        return view('admin.pengumuman.daftar', compact('announcements'));
    }

    public function create()
    {
        return view('admin.pengumuman.formulir');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_pengumuman' => 'required|string|max:255',
            'isi_pengumuman' => 'required|string',
            'target_audience' => 'required|in:Semua,Orang Tua,Mentor',
        ]);

        $validated['diprioritaskan'] = $request->boolean('diprioritaskan');
        $validated['status_pengumuman'] = $request->boolean('status_pengumuman');
        $validated['dibuat_oleh'] = auth()->id();

        \App\Models\Pengumuman::create($validated);

        return redirect()->route('admin.announcements.index')->with('success', 'Pengumuman berhasil dibuat.');
    }

    public function edit($id)
    {
        $announcement = \App\Models\Pengumuman::findOrFail($id);
        return view('admin.pengumuman.formulir', compact('announcement'));
    }

    public function update(Request $request, $id)
    {
        $announcement = \App\Models\Pengumuman::findOrFail($id);

        $validated = $request->validate([
            'judul_pengumuman' => 'required|string|max:255',
            'isi_pengumuman' => 'required|string',
            'target_audience' => 'required|in:Semua,Orang Tua,Mentor',
        ]);

        $validated['diprioritaskan'] = $request->boolean('diprioritaskan');
        $validated['status_pengumuman'] = $request->boolean('status_pengumuman');

        $announcement->update($validated);

        return redirect()->route('admin.announcements.index')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function toggleStatus(Request $request, $id)
    {
        $announcement = \App\Models\Pengumuman::findOrFail($id);

        $field = $request->input('field', 'status_pengumuman');

        if (in_array($field, ['status_pengumuman', 'diprioritaskan'])) {
            $announcement->$field = !$announcement->$field;
            $announcement->save();

            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diperbarui',
                'newValue' => $announcement->$field
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Invalid field'], 400);
    }

    public function destroy($id)
    {
        $announcement = \App\Models\Pengumuman::findOrFail($id);
        $announcement->delete();

        return redirect()->route('admin.announcements.index')->with('success', 'Pengumuman berhasil dihapus.');
    }
}
