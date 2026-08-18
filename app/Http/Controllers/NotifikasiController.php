<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Pendaftaran;
use App\Models\PesanLayanan;
use App\Models\Presensi;

class NotifikasiController extends Controller
{
    public function poll(Request $request)
    {
        $user = auth()->user();
        if (!$user) return response()->json(['notifications' => []]);

        $lastPollTimestamp = $request->query('last_poll');
        if (!$lastPollTimestamp) {
            return response()->json(['timestamp' => now()->timestamp, 'notifications' => []]);
        }

        $lastPoll = Carbon::createFromTimestamp($lastPollTimestamp)->setTimezone(config('app.timezone'));
        $notifications = [];

        if ($user->role === 'admin') {
            $newRegistrations = Pendaftaran::where('created_at', '>', $lastPoll)
                ->where('status_pendaftaran', 'pending')
                ->count();
            if ($newRegistrations > 0) {
                $notifications[] = ['type' => 'info', 'title' => '🔔 Pendaftaran Baru', 'text' => 'Ada pendaftaran murid baru yang perlu diverifikasi.'];
            }

            $newTransactions = \App\Models\Transaksi::where('created_at', '>', $lastPoll)->where('status_transaksi', 'pending')->count();
            if ($newTransactions > 0) {
                $notifications[] = ['type' => 'info', 'title' => '💳 Pembayaran Baru', 'text' => 'Terdapat bukti pembayaran yang baru masuk. Segera verifikasi.'];
            }

            $newReplies = PesanLayanan::where('created_at', '>', $lastPoll)
                ->where('user_id', '!=', $user->id)
                ->where('dibaca_admin', false)
                ->count();
            if ($newReplies > 0) {
                $notifications[] = ['type' => 'info', 'title' => '✉️ Pesan Layanan', 'text' => 'Ada pesan baru dari pengguna.'];
            }
        }
        else if ($user->role === 'orang_tua') {
            $newReplies = PesanLayanan::whereHas('ticket', fn($q) => $q->where('user_id', $user->id))
                ->where('created_at', '>', $lastPoll)
                ->where('user_id', '!=', $user->id)
                ->where('dibaca_pengguna', false)
                ->count();
            if ($newReplies > 0) {
                $notifications[] = ['type' => 'info', 'title' => '✉️ Pesan Layanan', 'text' => 'Ada balasan baru untuk tiket layanan Anda.'];
            }
        }
        else if ($user->role === 'mentor') {
            $newReplies = PesanLayanan::whereHas('ticket', fn($q) => $q->where('user_id', $user->id))
                ->where('created_at', '>', $lastPoll)
                ->where('user_id', '!=', $user->id)
                ->where('dibaca_pengguna', false)
                ->count();
            if ($newReplies > 0) {
                $notifications[] = ['type' => 'info', 'title' => '✉️ Pesan Layanan', 'text' => 'Ada balasan baru untuk tiket layanan Anda.'];
            }
        }

        return response()->json([
            'timestamp' => now()->timestamp,
            'notifications' => $notifications
        ]);
    }
}
