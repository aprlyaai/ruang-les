@extends('layouts.orang-tua')

@section('title', 'Riwayat Transaksi')

@section('content')
<div x-data="{ showImageModal: false, modalImageUrl: '' }">
<div class="mb-6">
    <x-admin.tajuk-halaman title="Riwayat Transaksi" description="Daftar lengkap seluruh pembayaran untuk anak Anda." />
</div>

<div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/50 border-b border-primary-100/50">
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">Kode Transaksi</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">Murid & Paket</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">Nominal</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">Status</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">Bukti Bayar</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">Tanggal Update</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($transactions as $trx)
                @php
                    $isNew = $oldLastReadAt && $trx->updated_at > $oldLastReadAt;
                    $rowClass = $isNew ? 'bg-primary-50 font-bold' : 'hover:bg-gray-50/50';
                @endphp
                <tr class="transition-colors {{ $rowClass }}">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-2">
                            @if($isNew)
                                <span class="w-2 h-2 bg-primary-500 rounded-full flex-shrink-0 animate-pulse"></span>
                            @endif
                            <span class="{{ $isNew ? 'text-base font-bold text-gray-900' : 'text-sm font-bold text-gray-900' }}">{{ $trx->no_invoice }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm font-semibold text-gray-900">{{ $trx->student->nama_murid ?? '-' }}</p>
                        <p class="text-xs text-gray-500 mt-1">{{ $trx->package->nama_program ?? '-' }}</p>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                        Rp {{ number_format($trx->package->harga ?? 0, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($trx->status_transaksi == 'verified')
                            <x-antarmuka.lencana color="primary">Lunas (Verified)</x-antarmuka.lencana>
                        @elseif($trx->status_transaksi == 'pending')
                            <x-antarmuka.lencana color="warning">Menunggu Verifikasi</x-antarmuka.lencana>
                        @elseif($trx->status_transaksi == 'rejected')
                            <x-antarmuka.lencana color="danger">Ditolak</x-antarmuka.lencana>
                        @else
                            <x-antarmuka.lencana color="gray">{{ ucfirst($trx->status_transaksi) }}</x-antarmuka.lencana>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($trx->bukti_pembayaran)
                            <button type="button" @click.prevent="modalImageUrl = '{{ Storage::url($trx->bukti_pembayaran) }}'; showImageModal = true" class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-bold text-gray-600 bg-white border border-gray-200 transition-all duration-100 rounded-lg hover:bg-primary-50 hover:text-primary-600 hover:border-primary-200 shadow-sm focus:outline-none">
                                <svg class="w-3.5 h-3.5 mr-1.5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                Lihat Bukti
                            </button>
                        @else
                            <span class="text-xs text-gray-400 font-normal">-</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                        {{ \Carbon\Carbon::parse($trx->updated_at)->format('d M Y, H:i') }} WIB
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8">
                        <x-admin.keadaan-kosong
                            title="Belum Ada Riwayat Transaksi"
                            message="Hingga saat ini belum ada riwayat transaksi pembayaran untuk murid ini."
                            icon="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Image Viewer Lightbox -->
<x-antarmuka.dialog-gambar />
</div>
@endsection
