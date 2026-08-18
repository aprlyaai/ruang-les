@extends('layouts.admin')

@section('title', 'Verifikasi Pendaftaran')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Verifikasi Pendaftaran</span>
@endsection

@section('content')
<div class="space-y-6">

    <x-admin.tajuk-halaman
        title="Antrean Verifikasi Pendaftaran"
        description="Kelola dan periksa data calon murid yang baru mendaftar."
    />

    <!-- Table Section -->
    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-primary-100/50">
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal Daftar</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Calon Murid & Orang Tua</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Program yang Dipilih</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($registrations as $p)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3 align-middle">
                                <div class="text-sm font-semibold text-gray-900">{{ $p->created_at->format('d M Y') }}</div>
                                <div class="text-xs text-gray-500 mt-1">{{ $p->created_at->format('H:i') }} WIB</div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="text-sm font-bold text-gray-900">{{ $p->nama_murid }}</div>
                                <div class="text-xs text-gray-500 mt-1">Orang Tua: {{ $p->nama_orangtua }}</div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="text-sm font-semibold text-gray-900">{{ $p->package->nama_program ?? '-' }}</div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                @if($p->status_pendaftaran === 'pending')
                                    <x-antarmuka.lencana color="warning">Menunggu</x-antarmuka.lencana>
                                @elseif($p->status_pendaftaran === 'approved')
                                    <x-antarmuka.lencana color="primary">Diterima</x-antarmuka.lencana>
                                @elseif($p->status_pendaftaran === 'rejected')
                                    <x-antarmuka.lencana color="danger">Ditolak</x-antarmuka.lencana>
                                @endif
                            </td>
                            <td class="px-4 py-3 align-middle text-center">
                                <a href="{{ route('admin.regist-verifications.show', $p->id) }}" class="inline-flex items-center justify-center px-3 py-1.5 min-h-[25px] min-w-[25px] text-xs font-bold text-gray-600 bg-white border border-gray-200 transition-all duration-100 rounded-lg hover:bg-primary-50 hover:text-primary-600 hover:border-primary-200 shadow-sm">
                                    Lihat Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-0 py-0 text-center">
                                <x-admin.keadaan-kosong
                                    icon="users"
                                    title="Antrean Kosong"
                                    message="Belum ada antrean pendaftaran baru saat ini."
                                />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($registrations->hasPages())
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
            {{ $registrations->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
