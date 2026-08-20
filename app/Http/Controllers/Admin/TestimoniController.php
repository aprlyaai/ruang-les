<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimoni;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonials = Testimoni::orderBy('urutan', 'asc')->orderBy('created_at', 'asc')->get();
        return view('admin.testimoni.daftar', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimoni.formulir');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemberi' => 'required|string|max:100',
            'peran_pemberi' => 'required|string|max:100',
            'testimoni' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $data = $request->only(['nama_pemberi', 'peran_pemberi', 'testimoni', 'rating']);
        $data['status_testimoni'] = $request->boolean('status_testimoni');
        $data['urutan'] = Testimoni::max('urutan') + 1;

        Testimoni::create($data);
        \Illuminate\Support\Facades\Cache::forget('public.testimonials');

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function edit(Testimoni $testimonial)
    {
        return view('admin.testimoni.formulir', compact('testimonial'));
    }

    public function update(Request $request, Testimoni $testimonial)
    {
        $request->validate([
            'nama_pemberi' => 'required|string|max:100',
            'peran_pemberi' => 'required|string|max:100',
            'testimoni' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $data = $request->only(['nama_pemberi', 'peran_pemberi', 'testimoni', 'rating']);
        $data['status_testimoni'] = $request->boolean('status_testimoni');

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy(Testimoni $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil dihapus.');
    }

    public function reorder(Request $request)
    {
        $orders = $request->input('orders', []);
        foreach ($orders as $index => $id) {
            Testimoni::where('testimoni_id', $id)->update(['urutan' => $index + 1]);
        }
        \Illuminate\Support\Facades\Cache::forget('public.testimonials');
        return response()->json(['success' => true]);
    }

    public function toggleStatus(Request $request, $id)
    {
        $testimonial = Testimoni::findOrFail($id);
        $field = $request->input('field');
        if (!$field || $field === 'is_active') {
            $field = 'status_testimoni';
        }

        if ($field === 'status_testimoni') {
            $testimonial->$field = !$testimonial->$field;
            $testimonial->save();
            \Illuminate\Support\Facades\Cache::forget('public.testimonials');
            return response()->json(['success' => true, 'newValue' => $testimonial->$field]);
        }

        return response()->json(['success' => false], 400);
    }
}
