@extends('layouts.admin')

@section('title', 'Detail Transaksi')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('admin.transactions.index') }}" class="hover:text-primary-600 transition-colors">Pembayaran</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Detail Transaksi</span>
@endsection

@section('content')
<div class="space-y-6 w-full">
    <x-admin.tajuk-halaman
        title="Detail Transaksi: {{ $transaction->student->nama_murid ?? 'N/A' }}"
        backUrl="{{ route('admin.transactions.index') }}"
    >
        <x-slot name="rightActions">
            @if($transaction->status_transaksi === 'pending')
                <x-antarmuka.lencana color="warning" size="lg">Status: Menunggu Verifikasi</x-antarmuka.lencana>
            @elseif($transaction->status_transaksi === 'verified')
                <x-antarmuka.lencana color="primary" size="lg">Status: Lunas (Verified)</x-antarmuka.lencana>
            @elseif($transaction->status_transaksi === 'rejected')
                <x-antarmuka.lencana color="danger" size="lg">Status: Ditolak</x-antarmuka.lencana>
            @endif
        </x-slot>
    </x-admin.tajuk-halaman>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <!-- Kolom Kiri -->
        <div class="lg:col-span-2 space-y-4">
            <!-- Data Anak -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden p-5">
                <h3 class="text-lg font-bold text-primary-800 border-b border-gray-100 pb-3 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Data Identitas & Akademik Anak
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8 text-sm">
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Nama Lengkap</span><span class="font-semibold text-gray-900">{{ $transaction->student->nama_murid ?? '-' }}</span></div>
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Nama Panggilan</span><span class="font-semibold text-gray-900">{{ $transaction->student->panggilan_murid ?? '-' }}</span></div>
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Tempat, Tanggal Lahir</span><span class="font-semibold text-gray-900">{{ $transaction->student->tempat_lahir_murid ?? '-' }}, {{ $transaction->student->tanggal_lahir_murid ? \Carbon\Carbon::parse($transaction->student->tanggal_lahir_murid)->format('d F Y') : '-' }}</span></div>
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Jenis Kelamin & Agama</span><span class="font-semibold text-gray-900">{{ $transaction->student->jenis_kelamin_murid === 'L' ? 'Laki-laki' : ($transaction->student->jenis_kelamin_murid === 'P' ? 'Perempuan' : ucfirst($transaction->student->jenis_kelamin_murid ?? '-')) }} & {{ ucfirst($transaction->student->agama ?? '-') }}</span></div>
                    <div class="md:col-span-2 pt-2 border-t border-gray-50"></div>
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Asal Sekolah</span><span class="font-semibold text-gray-900">{{ $transaction->student->sekolah ?? '-' }}</span></div>
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Kelas</span><span class="font-semibold text-gray-900">{{ $transaction->student->kelas ?? '-' }} SD</span></div>
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Nilai Rata-rata</span><span class="font-semibold text-gray-900">{{ $transaction->student->nilai_rata_rata ?? '-' }}</span></div>
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Karakteristik</span><span class="font-semibold text-gray-900">{{ $transaction->student->karakteristik_anak ?? '-' }}</span></div>
                </div>
            </div>

            <!-- Data Wali -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden p-5">
                <h3 class="text-lg font-bold text-primary-800 border-b border-gray-100 pb-3 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Data Orang Tua / Wali
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8 text-sm">
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Nama Ortu/Wali</span><span class="font-semibold text-gray-900">{{ $transaction->user->name ?? '-' }}</span></div>
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Hubungan</span><span class="font-semibold text-gray-900">Orang Tua / Wali</span></div>
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Nomor Telepon/WhatsApp</span><span class="font-semibold text-gray-900">{{ $transaction->user->no_telepon_mentor ?? '-' }}</span></div>
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Alamat Email</span><span class="font-semibold text-gray-900">{{ $transaction->user->email ?? '-' }}</span></div>
                    <div class="md:col-span-2"><span class="block text-sm text-gray-600 font-semibold mb-1">Alamat Lengkap</span><span class="font-semibold text-gray-900">{{ $transaction->user->alamat_domisili ?? '-' }}</span></div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan -->
        <div class="space-y-4">
            <!-- Pilihan Paket -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden p-5">
                <h3 class="text-lg font-bold text-primary-800 border-b border-gray-100 pb-3 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    Pilihan Paket
                </h3>
                <div class="space-y-4 text-sm">
                    <div class="bg-primary-50 p-4 rounded-xl border border-primary-100">
                        <span class="block text-sm text-gray-600 font-semibold mb-1">Kode Transaksi (Invoice):</span>
                        <span class="font-bold text-lg text-gray-900 block mb-3">{{ $transaction->no_invoice ?? '-' }}</span>

                        <span class="block text-sm text-gray-600 font-semibold mb-1">Program Belajar:</span>
                        <span class="font-bold text-xl text-primary-700">{{ $transaction->package->nama_program ?? 'Pembayaran Manual' }}</span>
                        <span class="block text-sm text-gray-600 font-semibold mt-3">Total Tagihan: <span class="font-bold text-gray-900 text-lg">Rp {{ number_format($transaction->total_pembayaran ?? 0, 0, ',', '.') }}</span></span>
                    </div>
                </div>
            </div>

            <!-- Bukti Pembayaran -->
            <div x-data="{ showImageModal: false, modalImageUrl: '' }" class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden p-5">
                <h3 class="text-lg font-bold text-primary-800 border-b border-gray-100 pb-3 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    Bukti Pembayaran
                </h3>
                <div class="mt-2 text-center">
                    @if($transaction->bukti_pembayaran)
                        @php
                            $fileExtension = pathinfo($transaction->bukti_pembayaran, PATHINFO_EXTENSION);
                            $isImage = in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png']);
                        @endphp

                        @if($isImage)
                            <button type="button" @click.prevent="modalImageUrl = '{{ asset('storage/' . $transaction->bukti_pembayaran) }}'; showImageModal = true" class="inline-block w-full p-2 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500">
                                <img src="{{ asset('storage/' . $transaction->bukti_pembayaran) }}" alt="Bukti Transfer" class="max-h-64 object-contain mx-auto border border-gray-300 rounded-lg">
                                <span class="block text-sm text-primary-600 mt-2 font-medium">Klik gambar untuk memperbesar</span>
                            </button>
                        @else
                            <div class="p-4 rounded-xl border border-gray-200 bg-gray-50 flex flex-col items-center justify-center">
                                <svg class="w-10 h-10 text-red-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                <p class="text-sm font-medium text-gray-900 mb-2">Dokumen PDF/File</p>
                                <button type="button" @click.prevent="modalImageUrl = '{{ asset('storage/' . $transaction->bukti_pembayaran) }}'; showImageModal = true" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 text-sm font-medium shadow-sm transition-colors">Lihat Bukti</button>
                            </div>
                        @endif
                    @else
                        <div class="p-6 bg-gray-50 rounded-xl text-gray-500 border border-dashed border-gray-300">Tidak ada bukti pembayaran yang diunggah.</div>
                    @endif
                    @if($transaction->status_transaksi !== 'pending' && $transaction->diverifikasi_pada)
                        <span class="block text-xs text-gray-500 mt-2">Diverifikasi pada: {{ \Carbon\Carbon::parse($transaction->diverifikasi_pada)->format('d M Y H:i') }}</span>
                    @endif
                </div>

                @if($transaction->bukti_pembayaran)
                <!-- Lightbox Modal -->
                <x-antarmuka.dialog-gambar />
                @endif
            </div>
        </div>
    </div>

    <!-- Aksi -->
    @if($transaction->status_transaksi === 'pending')
    <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-sm border border-primary-100/50 p-6 flex flex-col md:flex-row md:items-center justify-between gap-4 sticky bottom-4 z-20">
        <div>
            <p class="font-bold text-gray-900">Keputusan Admin</p>
            <p class="text-sm text-gray-500">Pastikan bukti transfer sudah valid sebelum mengambil keputusan.</p>
            <p class="text-xs text-primary-600 font-medium mt-1">Menyetujui transaksi ini akan menambah kuota belajar anak.</p>
        </div>

        <div class="flex space-x-3 w-full md:w-auto">
            <form action="{{ route('admin.transactions.reject', $transaction->id) }}" method="POST" class="flex-1 md:flex-none" onsubmit="return confirm('Tolak transaksi ini? Pastikan Anda sudah menginformasikannya kepada orang tua murid.');">
                @csrf
                <button type="submit" class="w-full px-6 py-3 bg-white border border-red-200 text-red-600 font-bold rounded-xl hover:bg-red-50 focus:ring-4 focus:ring-red-100 transition-all text-center">
                    Tolak Transaksi
                </button>
            </form>

            <form action="{{ route('admin.transactions.verify', $transaction->id) }}" method="POST" class="flex-1 md:flex-none">
                @csrf
                <button type="submit" class="w-full px-8 py-3 bg-primary-600 text-white font-bold rounded-xl hover:bg-primary-700 shadow-md shadow-primary-500/30 hover:shadow-lg focus:ring-4 focus:ring-primary-200 transition-all text-center">
                    Setujui Transaksi Ini
                </button>
            </form>
        </div>
    </div>
    @endif

</div>
@endsection

