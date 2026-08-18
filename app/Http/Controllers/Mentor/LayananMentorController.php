<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\PesanLayanan;
use Illuminate\Support\Facades\DB;

class LayananMentorController extends Controller
{
    public function index()
    {
        $tickets = Layanan::with('replies')->where('user_id', auth()->id())->orderBy('updated_at', 'desc')->get();
        return view('mentor.layanan.daftar', compact('tickets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_layanan' => 'required|string',
            'subject_layanan' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        DB::transaction(function () use ($request) {
            $ticket = Layanan::create([
                'no_ticket' => Layanan::generateTicketNumber(),
                'user_id' => auth()->id(),
                'kategori_layanan' => $request->kategori_layanan,
                'subject_layanan' => $request->subject_layanan,
                'status_layanan' => 'Open',
            ]);

            PesanLayanan::create([
                'layanan_id' => $ticket->id,
                'user_id' => auth()->id(),
                'pesan' => $request->pesan,
            ]);
        });

        return redirect()->route('mentor.layanan.index')->with('success', 'Tiket berhasil dibuat.');
    }

    public function show($id)
    {
        $ticket = Layanan::with(['replies.user'])->where('user_id', auth()->id())->findOrFail($id);

        // Mark as read
        $ticket->replies()->where('dibaca_pengguna', false)->where('user_id', '!=', auth()->id())->update(['dibaca_pengguna' => true]);

        return view('mentor.layanan.detail', compact('ticket'));
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'pesan' => 'required|string',
        ]);

        $ticket = Layanan::where('user_id', auth()->id())->findOrFail($id);

        if ($ticket->status_layanan == 'Closed') {
            return redirect()->back()->with('error', 'Tiket sudah ditutup dan tidak dapat dibalas.');
        }

        PesanLayanan::create([
            'layanan_id' => $ticket->id,
            'user_id' => auth()->id(),
            'pesan' => $request->pesan,
        ]);

        return redirect()->back();
    }
    public function close($id)
    {
        $ticket = Layanan::where('user_id', auth()->id())->findOrFail($id);
        $ticket->update(['status_layanan' => 'Closed']);

        return redirect()->back()->with('success', 'Tiket berhasil ditutup.');
    }
}
