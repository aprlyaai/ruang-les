<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Murid;
use App\Models\JadwalKelas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::with(['student', 'package', 'user'])->orderBy('created_at', 'desc');

        // Filter status
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status_transaksi', $request->status);
        }

        // Search text (student name or user name or invoice number)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('no_invoice', 'like', "%{$search}%")
                  ->orWhereHas('student', function($sq) use ($search) {
                      $sq->where('nama_murid', 'like', "%{$search}%");
                  })->orWhereHas('user', function($uq) use ($search) {
                      $uq->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $transactions = $query->paginate(15);

        $students = Murid::where('status_murid', 'active')->orderBy('nama_murid')->get();
        $packages = \App\Models\Program::orderByRaw("FIELD(tipe_program, 'Privat', 'Semi Privat', 'Reguler')")->orderBy('created_at', 'asc')->get();

        return view('admin.transaksi.daftar', compact('transactions', 'students', 'packages'));
    }

    public function show($id)
    {
        $transaction = Transaksi::with([
            'student', 'user', 'package'
        ])->findOrFail($id);

        return view('admin.transaksi.detail', compact('transaction'));
    }

    public function verify($id)
    {
        $transaction = Transaksi::findOrFail($id);

        try {
            DB::beginTransaction();

            // 1. Ubah status transaksi
            $transaction->status_transaksi = 'verified';
            $transaction->diverifikasi_oleh = Auth::id();
            $transaction->diverifikasi_pada = now();
            $transaction->save();

            // 2. Aktifkan siswa dan tambahkan kuota belajar sesuai paket
            $student = Murid::find($transaction->murid_id);
            if ($student) {
                $student->status_murid = 'active';
                $package = \App\Models\Program::find($transaction->program_id);
                if ($package) {
                    $student->kuota_belajar += $package->pertemuan;
                }
                $student->save();
            }

            // Removed legacy class_student insertion (now handled by Modul Pendaftaran)

            DB::commit();

            return redirect()->route('admin.transactions.index')->with('success', 'Pembayaran berhasil diverifikasi dan siswa telah aktif.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat verifikasi: ' . $e->getMessage());
        }
    }

    public function reject($id)
    {
        $transaction = Transaksi::findOrFail($id);

        try {
            DB::beginTransaction();

            // Removed legacy JadwalKelas decrement logic
            $transaction->status_transaksi = 'rejected';

            // Hapus bukti bayar untuk menghemat storage karena transaksi ditolak (Storage Leak Fix)
            if ($transaction->bukti_pembayaran && \Illuminate\Support\Facades\Storage::disk('public')->exists($transaction->bukti_pembayaran)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($transaction->bukti_pembayaran);
                $transaction->bukti_pembayaran = null;
            }

            $transaction->save();

            DB::commit();

            return redirect()->route('admin.transactions.index')->with('success', 'Pendaftaran berhasil ditolak dan kuota dikembalikan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function kuota(Request $request)
    {
        // Hitung statistik global terpisah dari query filter tabel
        $totalActive = Murid::where('status_murid', 'active')->count();
        $totalZeroQuota = Murid::where('status_murid', 'active')->where('kuota_belajar', 0)->count();
        $totalNegativeQuota = Murid::where('status_murid', 'active')->where('kuota_belajar', '<', 0)->count();

        $query = Murid::with('parent.user')->where('status_murid', 'active');

        // Filter status kuota
        if ($request->filled('quota_status') && $request->quota_status !== 'all') {
            if ($request->quota_status === 'aman') {
                $query->where('kuota_belajar', '>', 0);
            } elseif ($request->quota_status === 'kritis') {
                $query->where('kuota_belajar', 0);
            } elseif ($request->quota_status === 'nunggak') {
                $query->where('kuota_belajar', '<', 0);
            }
        }

        // Search name
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('nama_murid', 'like', "%{$search}%");
        }

        // Get all active students, ordered by kuota_belajar ascending (so lowest/negative is at top)
        $students = $query->orderBy('kuota_belajar', 'asc')->paginate(50);

        return view('admin.transaksi.kuota', compact('students', 'totalActive', 'totalZeroQuota', 'totalNegativeQuota'));
    }

    public function sendReminder(Request $request)
    {
        $request->validate([
            'murid_id' => 'required|exists:murid,murid_id',
            'send_email' => 'nullable|boolean'
        ]);

        $student = Murid::with('parent.user')->findOrFail($request->murid_id);
        $user = $student->parent?->user;

        if ($user) {
            $sendEmail = $request->has('send_email') && $request->send_email == 1;
            $user->notify(new \App\Notifications\TeguranKuotaNotification($student, $sendEmail));

            $msg = $sendEmail ? 'Teguran berhasil dikirim via Sistem dan Email!' : 'Teguran berhasil dikirim via Sistem!';
            return back()->with('success', $msg);
        }

        return back()->with('error', 'Gagal mengirim teguran, wali murid tidak ditemukan.');
    }

    public function storeManual(Request $request)
    {
        $request->validate([
            'murid_id' => 'required|exists:murid,murid_id',
            'program_id' => 'required|exists:program,program_id',
            'total_pembayaran' => 'required|numeric|min:0'
        ]);

        try {
            DB::beginTransaction();

            $student = Murid::findOrFail($request->murid_id);
            $package = \App\Models\Program::findOrFail($request->program_id);

            // Create verified transaction
            $transaction = Transaksi::create([
                'no_invoice' => Transaksi::generateInvoiceNumber(),
                'orangtua_id' => $student->orangtua_id,
                'murid_id' => $student->murid_id,
                'program_id' => $package->program_id,
                'total_pembayaran' => $request->total_pembayaran,
                'status_transaksi' => 'verified',
                'diverifikasi_oleh' => Auth::id(),
                'diverifikasi_pada' => now(),
            ]);

            // Add study quota directly
            $student->kuota_belajar += $package->pertemuan;
            $student->save();

            DB::commit();

            return back()->with('success', 'Pembayaran tunai berhasil dicatat. Sisa kuota anak otomatis bertambah +'.$package->pertemuan.' sesi.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
