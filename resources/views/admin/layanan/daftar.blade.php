@extends('layouts.admin')

@section('title', 'Kotak Layanan (Inbox)')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Layanan (Inbox)</span>
@endsection

@section('content')
<div x-data="{ tab: 'Semua' }" class="space-y-0">

    <x-admin.tajuk-halaman
        title="Pusat Layanan (Inbox)"
        description="Pusat komunikasi untuk meninjau dan merespons berbagai pesan dari orang tua."
    />


    <!-- Tab Navigation -->
    <div class="bg-white/80 backdrop-blur-md rounded-t-2xl shadow-sm border border-primary-100/50 border-b-0 overflow-hidden mt-6">
        <nav class="flex flex-nowrap overflow-x-auto border-b border-gray-100 [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]" aria-label="Tabs">
            <button @click="tab = 'Semua'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': tab === 'Semua', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': tab !== 'Semua'}" class="flex-1 shrink-0 whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm text-center transition-all focus:outline-none flex items-center justify-center gap-2">
                Semua
                <x-antarmuka.lencana color="primary" class="tab === 'Semua' ? ' ' : ' '">{{ $tickets->count() }}</x-antarmuka.lencana>
            </button>
            <button @click="tab = 'Open'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': tab === 'Open', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': tab !== 'Open'}" class="flex-1 shrink-0 whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm text-center transition-all focus:outline-none flex items-center justify-center gap-2">
                Baru
                @php $countOpen = $tickets->where('status_layanan', 'Open')->count(); @endphp
                @if($countOpen > 0)
                    <x-antarmuka.lencana color="danger" class="tab === 'Open' ? ' ' : ' '">{{ $countOpen }}</x-antarmuka.lencana>
                @endif
            </button>
            <button @click="tab = 'In Progress'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': tab === 'In Progress', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': tab !== 'In Progress'}" class="flex-1 shrink-0 whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm text-center transition-all focus:outline-none flex items-center justify-center gap-2">
                Dalam Penanganan
                @php $countProgress = $tickets->where('status_layanan', 'In Progress')->count(); @endphp
                @if($countProgress > 0)
                    <x-antarmuka.lencana color="warning" class="tab === 'In Progress' ? ' ' : ' '">{{ $countProgress }}</x-antarmuka.lencana>
                @endif
            </button>
            <button @click="tab = 'Closed'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': tab === 'Closed', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': tab !== 'Closed'}" class="flex-1 shrink-0 whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm text-center transition-all focus:outline-none flex items-center justify-center gap-2">
                Selesai
            </button>
        </nav>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-b-2xl shadow-sm border border-primary-100/50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm min-w-[650px]">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-primary-100/50">
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Tiket & Waktu</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Pengirim</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Subjek & Kategori</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($tickets as $ticket)
                        @php
                            $hasUnread = $ticket->hasUnreadReplies();
                            $rowClass = $hasUnread ? 'bg-primary-50 font-semibold' : ($ticket->status_layanan == 'Open' ? 'bg-red-50/30' : '');
                        @endphp
                        <tr x-show="tab === 'Semua' || tab === '{{ $ticket->status_layanan }}'" x-cloak class="hover:bg-primary-50/50 transition-colors {{ $rowClass }}">
                            <td class="px-4 py-3 align-middle whitespace-nowrap">
                                <div class="flex items-center gap-2">
                                    @if($hasUnread)
                                        <span class="w-2 h-2 bg-red-500 rounded-full flex-shrink-0 animate-pulse"></span>
                                    @endif
                                    <div>
                                        <div class="text-sm font-bold text-gray-900">{{ $ticket->no_ticket }}</div>
                                        <div class="text-xs text-gray-500 mt-1">{{ $ticket->created_at->format('d M Y, H:i') }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="text-sm font-semibold text-gray-900">{{ $ticket->user->name ?? 'Pengguna Dihapus' }}</div>
                                <div class="text-xs text-gray-500 mt-1">{{ $ticket->user->email ?? '-' }}</div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="text-sm font-semibold text-gray-900">{{ $ticket->subject_layanan }}</div>
                                <div class="text-xs mt-1">
                                    <x-antarmuka.lencana color="gray" class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold border w-fit whitespace-nowrap">
                                    {{ $ticket->kategori_layanan }}
                                    </x-antarmuka.lencana>
                                </div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                            @if($ticket->status_layanan == 'Open')
                                <x-antarmuka.lencana color="danger" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit whitespace-nowrap">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full mr-1.5 animate-pulse"></x-antarmuka.lencana>
                                    Baru
                                </span>
                            @elseif($ticket->status_layanan == 'In Progress')
                                <x-antarmuka.lencana color="warning" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit whitespace-nowrap">
                                    <span class="w-1.5 h-1.5 bg-amber-500 rounded-full mr-1.5"></x-antarmuka.lencana>
                                    Dalam Penanganan
                                </span>
                            @else
                                <x-antarmuka.lencana color="gray" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit whitespace-nowrap">
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-1.5"></x-antarmuka.lencana>
                                    Selesai
                                </span>
                            @endif
                        </td>
                            <td class="px-4 py-3 align-middle text-center">
                                <a href="{{ route('admin.helpdesks.show', $ticket->id) }}" class="inline-flex items-center justify-center px-3 py-1.5 min-h-[25px] min-w-[25px] text-xs font-bold text-gray-600 bg-white border border-gray-200 transition-all duration-100 rounded-lg hover:bg-primary-50 hover:text-primary-600 hover:border-primary-200 shadow-sm">
                                    Buka Chat
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 align-middle">
                            <x-admin.keadaan-kosong
                                icon="mail"
                                title="WOW! Kotak masuk kosong."
                                message="Tidak ada pesan atau permintaan layanan yang perlu Anda balas."
                            />
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
