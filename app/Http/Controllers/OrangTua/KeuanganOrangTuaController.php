<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
use App\Models\Murid;
use App\Models\StatusBacaNotifikasi;

class KeuanganOrangTuaController extends Controller
{
    /**
     * Get the currently active student based on session, or default to the first one.
     */
    private function getActiveStudent($ortuId)
    {
        $activeSiswaId = session('active_student_id');
        if (!$activeSiswaId) {
            $siswa = Murid::where('orangtua_id', $ortuId)->first();
            if ($siswa) {
                $activeSiswaId = $siswa->murid_id;
            }
        }
        return Murid::find($activeSiswaId);
    }

    public function tagihan()
    {
        $ortuId = Auth::user()->orangtua_id;
        $student = $this->getActiveStudent($ortuId);

        $transactions = collect();
        if ($student) {
            // Tagihan yang membutuhkan aksi orang tua: Belum bayar (pending & no proof) atau Ditolak (rejected)
            $transactions = Transaksi::with(['student', 'package'])
                ->where('orangtua_id', $ortuId)
                ->where('murid_id', $student->murid_id)
                ->where(function($query) {
                    $query->where(function($q) {
                        $q->where('status_transaksi', 'pending')
                          ->whereNull('bukti_pembayaran');
                    })->orWhere('status_transaksi', 'rejected');
                })
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('orang-tua.keuangan.tagihan', compact('transactions', 'student'));
    }

    public function uploadBukti(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transaksi,transaksi_id',
            'bukti_pembayaran' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ], [], [
            'transaction_id' => 'Kode Tagihan',
            'bukti_pembayaran' => 'Bukti Pembayaran'
        ]);

        $transaction = Transaksi::where('transaksi_id', $request->transaction_id)
            ->where('orangtua_id', Auth::user()->orangtua_id)
            ->firstOrFail();

        DB::beginTransaction();
        try {
            // Anti-Storage Leak: Hapus bukti lama jika sudah ada (misal: kasus revisi)
            if ($transaction->bukti_pembayaran && Storage::disk('public')->exists($transaction->bukti_pembayaran)) {
                Storage::disk('public')->delete($transaction->bukti_pembayaran);
            }

            // Simpan bukti baru
            $path = $request->file('bukti_pembayaran')->store('payment_proofs', 'public');

            // Update transaksi jadi menunggu verifikasi
            $transaction->update([
                'bukti_pembayaran' => $path,
                'status_transaksi' => 'pending'
            ]);

            DB::commit();
            return back()->with('success', 'Bukti pembayaran berhasil diunggah dan sedang menunggu verifikasi.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat mengunggah bukti pembayaran.');
        }
    }

    public function riwayat()
    {
        $ortuUserId = Auth::id();
        $ortuId = Auth::user()->orangtua_id;
        $student = $this->getActiveStudent($ortuId);
        $oldLastReadAt = null;

        $record = StatusBacaNotifikasi::where('user_id', $ortuUserId)->where('kunci', 'ortu_riwayat_last_seen')->first();
        if ($record) {
            $oldLastReadAt = $record->terakhir_dibaca;
        }

        // Reset badge untuk Riwayat Transaksi (Transient)
        StatusBacaNotifikasi::updateOrCreate(
            ['user_id' => $ortuUserId, 'kunci' => 'ortu_riwayat_last_seen'],
            ['terakhir_dibaca' => now()]
        );

        $transactions = collect();
        if ($student) {
            // Riwayat yang 'aktif' atau 'lunas' khusus untuk anak ini
            $transactions = Transaksi::with(['student', 'package'])
                ->where('orangtua_id', $ortuId)
                ->where('murid_id', $student->murid_id)
                ->orderBy('updated_at', 'desc')
                ->get();
        }

        return view('orang-tua.keuangan.riwayat', compact('transactions', 'oldLastReadAt', 'student'));
    }
}
