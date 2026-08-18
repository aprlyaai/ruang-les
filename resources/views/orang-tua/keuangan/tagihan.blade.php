@extends('layouts.orang-tua')

@section('title', 'Tagihan & Pembayaran')

@section('content')
<div x-data="{ showImageModal: false, modalImageUrl: '' }">
<div class="mb-6">
    <x-admin.tajuk-halaman title="Tagihan & Pembayaran" description="Lihat sisa kuota dan lakukan pembayaran tagihan belajar anak Anda." />
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Kolom Kiri: Sisa Kuota & Daftar Tagihan -->
    <div class="lg:col-span-2 space-y-6">

        <!-- Stat Card: Sisa Kuota -->
        @php
            $quota = $student->kuota_belajar ?? 0;
            $isDebt = $quota < 0;
        @endphp

        <div class="bg-white rounded-2xl shadow-sm border {{ $isDebt ? 'border-red-200' : 'border-primary-100/50' }} overflow-hidden relative">
            @if($isDebt)
                <div class="absolute top-0 right-0 p-4">
                    <span class="flex h-3 w-3 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                    </span>
                </div>
            @endif
            <div class="p-6">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 rounded-xl {{ $isDebt ? 'bg-red-100 text-red-600' : 'bg-primary-100 text-primary-600' }} flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-1">Sisa Kuota Belajar</h3>
                        <div class="flex items-end space-x-2">
                            <span class="text-4xl font-extrabold font-heading {{ $isDebt ? 'text-red-600' : 'text-gray-900' }}">{{ $quota }}</span>
                            <span class="text-sm font-medium text-gray-500 mb-1.5">Pertemuan</span>
                        </div>
                    </div>
                </div>

                @if($isDebt)
                    <div class="mt-4 p-3 bg-red-50 border border-red-100 rounded-xl">
                        <div class="flex">
                            <svg class="h-5 w-5 text-red-400 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <p class="text-sm text-red-700">
                                Sisa kuota minus menandakan adanya tunggakan kelas. Silakan lakukan pembayaran tagihan di sebelah kanan untuk mengisi ulang kuota dan melanjutkan pembelajaran di Ruang Les.
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Daftar Tagihan -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900 uppercase tracking-wider">Tagihan Menunggu</h3>
            </div>

            <div class="p-6">
                @forelse($transactions as $trx)
                    <div class="mb-4 last:mb-0 p-5 rounded-xl border {{ $trx->status_transaksi == 'rejected' ? 'border-red-200 bg-red-50/30' : 'border-yellow-200 bg-yellow-50/30' }} flex flex-col sm:flex-row justify-between sm:items-center gap-4 transition-all hover:shadow-md">
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                @if($trx->status_transaksi == 'rejected')
                                    <x-antarmuka.lencana color="danger">Ditolak</x-antarmuka.lencana>
                                @else
                                    <x-antarmuka.lencana color="warning">Menunggu Pembayaran</x-antarmuka.lencana>
                                @endif
                                <span class="text-xs text-gray-500 font-medium">{{ $trx->no_invoice }}</span>
                            </div>
                            <h4 class="font-bold text-gray-900">{{ $trx->package->nama_program ?? 'Paket Bimbel' }}</h4>
                            <p class="text-sm text-gray-600">Siswa: {{ $trx->student->nama_murid ?? '-' }}</p>
                            @if($trx->status_transaksi == 'rejected')
                                <p class="text-xs text-red-500 mt-1 font-medium">Harap unggah ulang bukti pembayaran yang valid.</p>
                            @endif
                        </div>
                        <div class="text-left sm:text-right">
                            <p class="text-sm text-gray-500 mb-1">Total Tagihan</p>
                            <p class="text-xl font-bold text-gray-900">Rp {{ number_format($trx->package->harga ?? 0, 0, ',', '.') }}</p>
                            @if($trx->bukti_pembayaran)
                                <button type="button" @click.prevent="modalImageUrl = '{{ Storage::url($trx->bukti_pembayaran) }}'; showImageModal = true" class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-bold text-gray-600 bg-white border border-gray-200 transition-all duration-100 rounded-lg hover:bg-primary-50 hover:text-primary-600 hover:border-primary-200 shadow-sm focus:outline-none mt-2">
                                    <svg class="w-3.5 h-3.5 mr-1.5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    Lihat Bukti
                                </button>
                            @endif
                        </div>
                    </div>
                @empty
                    <x-admin.keadaan-kosong
                        title="Semua Lunas!"
                        message="Tidak ada tagihan yang tertunggak saat ini."
                        icon="M5 13l4 4L19 7"
                    />
                @endforelse
            </div>
        </div>
    </div>

    <!-- Kolom Kanan: Form Upload Pembayaran -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden sticky top-24">
            <div class="p-6 border-b border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 uppercase tracking-wider">Konfirmasi Pembayaran</h3>
            </div>
            <div class="p-6 bg-gray-50/50">
                <label for="transaction_id" class="block text-sm font-semibold text-gray-600 mb-2">Rekening Tujuan Transfer:</label>
                <!-- Mock Bank Card (Adapted for Sidebar size) -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-5 text-white shadow-lg relative overflow-hidden group mb-6">
                    <!-- Card Accents -->
                    <div class="absolute -right-8 -top-8 w-24 h-24 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700 ease-in-out"></div>
                    <div class="absolute -left-6 -bottom-6 w-20 h-20 bg-primary-500/30 rounded-full blur-xl"></div>

                    <div class="relative z-10">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-lg font-black tracking-widest text-gray-100 italic uppercase">{{ $settings['nama_bank'] ?? 'BCA' }}</span>
                            <svg class="w-6 h-6 text-white/20" fill="currentColor" viewBox="0 0 24 24"><path d="M21.93 10.37A6.47 6.47 0 0019 6c-2.4-.6-4.5 1-4.5 1S12.4 5.4 10 6A6.47 6.47 0 007.07 10.37C6.1 13 8 18 8 18c0 0 2-1 4-1s4 1 4 1c0 0 1.9-5 1.07-7.63z"></path></svg>
                        </div>

                        <div class="mb-4">
                            <span class="block text-[9px] font-bold text-gray-400 uppercase tracking-wider mb-1.5">Nomor Rekening</span>
                            <div class="flex items-center gap-2">
                                <span id="rekening-number" class="font-mono text-xl tracking-[0.12em] font-medium text-white shadow-sm">{{ $settings['nomor_akun_bank'] ?? '7340033447' }}</span>
                                <button type="button" onclick="copyRekening()" class="p-1.5 rounded-lg bg-white/10 hover:bg-white/20 transition-all focus:ring-2 focus:ring-white/50 group/copy relative" title="Salin Nomor Rekening">
                                    <svg class="w-4 h-4 text-gray-300 group-hover/copy:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    <span id="copy-tooltip" class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-900 text-white text-[9px] font-bold px-2 py-1 rounded opacity-0 transition-opacity whitespace-nowrap pointer-events-none">Tersalin!</span>
                                </button>
                            </div>
                        </div>

                        <div>
                            <span class="block text-[9px] font-bold text-gray-400 uppercase tracking-wider mb-1">Atas Nama</span>
                            <span class="font-bold tracking-widest text-xs uppercase text-gray-100">{{ $settings['nama_akun_bank'] ?? 'ISMATURROHMAH' }}</span>
                        </div>
                    </div>
                </div>

                <form action="{{ route('ortu.pembayaran.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4" novalidate
                      x-data="{
                          error_transaction: {{ $errors->has('transaction_id') ? 'true' : 'false' }},
                          error_payment: {{ $errors->has('bukti_pembayaran') ? 'true' : 'false' }}
                      }">
                    @csrf
                    <div>
                        <label for="transaction_id" class="block text-sm font-semibold text-gray-600 mb-2">Kode Tagihan <span class="text-red-500">*</span></label>
                        <select name="transaction_id" id="transaction_id" required {{ $transactions->isEmpty() ? 'disabled' : '' }}
                            @change="error_transaction = false"
                            :class="error_transaction ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 focus:ring-primary-200'"
                            class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:outline-none focus:ring-2 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer">
                            <option value="" disabled selected>Pilih Tagihan</option>
                            @foreach($transactions as $trx)
                                <option value="{{ $trx->id }}">{{ $trx->no_invoice }} - Rp {{ number_format($trx->package->harga ?? 0, 0, ',', '.') }}</option>
                            @endforeach
                        </select>
                        <x-antarmuka.galat-sebaris name="transaction_id" x-show-error="error_transaction" />
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-2">Bukti Pembayaran <span class="text-red-500">*</span></label>

                        <x-antarmuka.unggah-berkas name="bukti_pembayaran" x-show-error="error_payment" accept="image/jpeg,image/jpg,image/png,image/webp,application/pdf" :disabled="$transactions->isEmpty()">
                            <span class="font-bold text-primary-700">Rasio Foto: 4:3</span><br>
                            Format: JPEG, JPG, PNG, WEBP, PDF.<br>
                            Maksimal berukuran 2MB.
                        </x-antarmuka.unggah-berkas>

                        <x-antarmuka.galat-sebaris name="bukti_pembayaran" x-show-error="error_payment" />
                    </div>

                    <div class="pt-2">
                        <button type="submit" {{ $transactions->isEmpty() ? 'disabled' : '' }}
                            class="w-full inline-flex items-center justify-center px-5 py-3 text-sm font-bold text-white transition-all duration-100 border border-transparent rounded-2xl shadow-sm focus:outline-none {{ $transactions->isEmpty() ? 'bg-gray-300 cursor-not-allowed' : 'bg-primary-600 hover:bg-primary-700 hover:-translate-y-0.5' }}">
                            Kirim Bukti Pembayaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Image Viewer Lightbox -->
<x-antarmuka.dialog-gambar />
</div>

@push('scripts')
<script>
function copyRekening() {
    const rekening = '{{ $settings['nomor_akun_bank'] ?? '7340033447' }}';
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(rekening).then(() => {
            showTooltip();
        }).catch(err => {
            fallbackCopy(rekening);
        });
    } else {
        fallbackCopy(rekening);
    }
}

function fallbackCopy(text) {
    const textArea = document.createElement("textarea");
    textArea.value = text;
    textArea.style.position = "fixed";
    textArea.style.left = "-9999px";
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    try {
        document.execCommand('copy');
        showTooltip();
    } catch (err) {
        console.error('Fallback copy failed: ', err);
        alert('Gagal menyalin nomor rekening. Silakan salin manual.');
    }
    document.body.removeChild(textArea);
}

function showTooltip() {
    const tooltip = document.getElementById('copy-tooltip');
    if (tooltip) {
        tooltip.classList.remove('opacity-0');
        tooltip.classList.add('opacity-100');
        setTimeout(() => {
            tooltip.classList.remove('opacity-100');
            tooltip.classList.add('opacity-0');
        }, 2000);
    }
}
</script>
@endpush
@endsection
