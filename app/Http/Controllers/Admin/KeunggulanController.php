<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keunggulan;

class KeunggulanController extends Controller
{
    public function index()
    {
        $features = Keunggulan::orderBy('created_at', 'asc')->get();
        return view('admin.keunggulan.daftar', compact('features'));
    }

    public function create()
    {
        return view('admin.keunggulan.formulir');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_keunggulan' => 'required|string|max:255',
            'deskripsi_keunggulan' => 'required|string',
            'urutan' => 'required|integer',
            'status_keunggulan' => 'required|boolean',
        ]);

        Keunggulan::create($request->all());

        return redirect()->route('admin.features.index')->with('success', 'Fitur unggulan berhasil ditambahkan.');
    }

    public function edit(Keunggulan $feature)
    {
        return view('admin.keunggulan.formulir', compact('feature'));
    }

    public function update(Request $request, Keunggulan $feature)
    {
        $request->validate([
            'nama_keunggulan' => 'required|string|max:255',
            'deskripsi_keunggulan' => 'required|string',
            'urutan' => 'required|integer',
            'status_keunggulan' => 'required|boolean',
        ]);

        $feature->update($request->all());

        return redirect()->route('admin.features.index')->with('success', 'Fitur unggulan berhasil diperbarui.');
    }

    public function destroy(Keunggulan $feature)
    {
        $feature->delete();
        return redirect()->route('admin.features.index')->with('success', 'Fitur unggulan berhasil dihapus.');
    }

    public function reorder(Request $request)
    {
        $orders = $request->input('orders', []);
        foreach ($orders as $index => $id) {
            Keunggulan::where('keunggulan_id', $id)->update(['urutan' => $index + 1]);
        }
        return response()->json(['success' => true]);
    }
    public function toggleStatus(Request $request, $id)
    {
        $feature = Keunggulan::findOrFail($id);
        $field = $request->input('field', 'status_keunggulan');

        if ($field === 'status_keunggulan') {
            $feature->status_keunggulan = !$feature->status_keunggulan;
            $feature->save();
            return response()->json(['success' => true, 'newValue' => $feature->status_keunggulan]);
        }

        return response()->json(['success' => false], 400);
    }
}
