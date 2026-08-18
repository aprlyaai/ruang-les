<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $tickets = \App\Models\Layanan::with(['user', 'replies'])
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('admin.layanan.daftar', compact('tickets'));
    }

    public function show($id)
    {
        $ticket = \App\Models\Layanan::with(['user', 'replies.user'])->findOrFail($id);

        // Mark all unread replies from non-admin users as read when admin opens the chat
        $ticket->replies()
            ->where('dibaca_admin', false)
            ->whereHas('user', fn($q) => $q->where('role', '!=', 'admin'))
            ->update(['dibaca_admin' => true]);

        return view('admin.layanan.detail', compact('ticket'));
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'pesan' => 'required|string',
        ]);

        $ticket = \App\Models\Layanan::findOrFail($id);

        \App\Models\PesanLayanan::create([
            'layanan_id' => $ticket->id,
            'user_id' => auth()->id(),
            'pesan' => $request->pesan,
        ]);

        // Mark as In Progress if it's currently Open and admin replies
        if ($ticket->status_layanan == 'Open' && auth()->user()->role === 'admin') {
            $ticket->status_layanan = 'In Progress';
            $ticket->save();
        }

        return redirect()->back();
    }

    public function close($id)
    {
        $ticket = \App\Models\Layanan::findOrFail($id);
        $ticket->status_layanan = 'Closed';
        $ticket->save();

        return redirect()->route('admin.helpdesks.index')->with('success', 'Tiket berhasil ditutup.');
    }
}
