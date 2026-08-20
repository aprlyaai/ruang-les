<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('urutan', 'asc')->orderBy('created_at', 'asc')->get();
        return view('admin.faq.daftar', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq.formulir');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string',
            'status_faq' => 'required|boolean',
        ]);

        $data = $request->all();
        if (!isset($data['urutan'])) {
            $data['urutan'] = Faq::max('urutan') + 1;
        }

        Faq::create($data);
        \Illuminate\Support\Facades\Cache::forget('public.faqs');

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faq.formulir', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string',
            'urutan' => 'required|integer',
            'status_faq' => 'required|boolean',
        ]);

        $faq->update($request->all());

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil dihapus.');
    }

    public function reorder(Request $request)
    {
        $orders = $request->input('orders', []);
        foreach ($orders as $index => $id) {
            Faq::where('faq_id', $id)->update(['urutan' => $index + 1]);
        }
        \Illuminate\Support\Facades\Cache::forget('public.faqs');
        return response()->json(['success' => true]);
    }

    public function toggleStatus(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);
        $field = $request->input('field');
        if (!$field || $field === 'is_active') {
            $field = 'status_faq';
        }

        if ($field === 'status_faq') {
            $faq->status_faq = !$faq->status_faq;
            $faq->save();
            \Illuminate\Support\Facades\Cache::forget('public.faqs');
            return response()->json(['success' => true, 'newValue' => $faq->status_faq]);
        }

        return response()->json(['success' => false], 400);
    }
}
