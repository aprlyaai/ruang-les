@extends('layouts.mentor')

@section('title', 'Detail Layanan & Bantuan')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('mentor.layanan.index') }}" class="text-gray-500 hover:text-primary-600 transition-colors font-medium">Layanan & Bantuan</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">{{ $ticket->no_ticket }}</span>
@endsection

@section('content')
@push('styles')
<!-- Trix Editor CSS -->
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<style>
    trix-toolbar [data-trix-button-group="file-tools"] { display: none; }
    trix-editor {
        min-height: 120px;
        background-color: #f9fafb;
        border-radius: 1rem;
        border: 1px solid #e5e7eb;
        padding: 1rem;
        transition: all 0.1s;
    }
    trix-editor:focus {
        border-color: #93c38b;
        box-shadow: 0 0 0 2px #cee6c8;
        background-color: white;
        outline: none;
    }
    .has-error trix-editor {
        border-color: #ef4444 !important;
        box-shadow: 0 0 0 2px #fecaca !important;
    }
</style>
@endpush

@push('scripts')
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endpush

<div class="flex flex-col min-h-[calc(100vh-11rem)]">

    <!-- Header Tiket -->
    <div class="shrink-0 bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col sm:flex-row justify-between items-start gap-4 mb-6">
        <div class="flex-1">
            <x-admin.tajuk-halaman
                title="{{ $ticket->subject_layanan }}"
                description="Tiket {{ $ticket->no_ticket }} dibuat oleh Anda pada {{ $ticket->created_at->format('d M Y, H:i') }}"
            />
            <div class="mt-2 flex gap-2">
                @if($ticket->status_layanan == 'Open')
                    <x-antarmuka.lencana color="danger" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit">
                        <span class="w-1.5 h-1.5 bg-red-500 rounded-full mr-1.5 animate-pulse"></x-antarmuka.lencana>
                        Menunggu Balasan
                    </span>
                @elseif($ticket->status_layanan == 'In Progress')
                    <x-antarmuka.lencana color="warning" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit">
                        <span class="w-1.5 h-1.5 bg-amber-500 rounded-full mr-1.5"></x-antarmuka.lencana>
                        Sedang Ditangani
                    </span>
                @else
                    <x-antarmuka.lencana color="gray" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit">
                        <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-1.5"></x-antarmuka.lencana>
                        Selesai
                    </span>
                @endif
                <x-antarmuka.lencana color="gray" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit">{{ $ticket->kategori_layanan }}</x-antarmuka.lencana>
            </div>
        </div>

        <div class="flex items-center flex-wrap gap-3">
            @if($ticket->status_layanan != 'Closed')
            <form action="{{ route('mentor.layanan.close', $ticket->id) }}" method="POST" class="close-ticket-form">
                @csrf
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-white border border-gray-200 rounded-xl shadow-sm text-sm font-medium text-gray-700 hover:bg-red-50 hover:text-red-600 hover:border-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200">
                    <svg class="w-4 h-4 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                    Tutup Tiket (Selesai)
                </button>
            </form>
            @endif
        </div>
    </div>

    <!-- Chat Thread -->
    <div class="flex-1 bg-gray-50 rounded-2xl shadow-inner border border-gray-200 p-4 sm:p-6 space-y-6 max-h-[600px] overflow-y-auto mb-6" id="chat-container">

        <!-- Balasan-balasan -->
        @foreach($ticket->replies as $reply)
            @php
                $isMine = $reply->user_id == auth()->id();
            @endphp
            <div class="flex items-start gap-4 transition-all duration-200 {{ $isMine ? 'flex-row-reverse' : '' }}">

                <div class="flex-shrink-0 relative">
                    <x-admin.avatar
                        name="{{ $isMine ? ($reply->user->name ?? 'U') : 'Admin' }}"
                        :avatar-url="$reply->user->avatar ?? null"
                        size="10"
                    />
                </div>

                <div class="flex-1 p-4 rounded-2xl shadow-sm transition-all duration-200 {{ $isMine ? 'bg-primary-600 text-white rounded-tr-none border-transparent' : 'rounded-tl-none border border-gray-100 bg-white' }}">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-bold text-sm {{ $isMine ? 'text-white' : 'text-gray-900' }}">{{ $isMine ? 'Anda' : 'Admin Ruang Les' }} <span class="text-xs {{ $isMine ? 'text-primary-100' : 'text-gray-500' }} font-normal ml-2">({{ $isMine ? 'Pengirim' : 'Admin' }})</span></span>
                        <span class="text-xs {{ $isMine ? 'text-primary-100' : 'text-gray-400' }}">{{ $reply->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <div class="text-sm trix-content prose prose-sm max-w-none {{ $isMine ? 'prose-invert' : '' }}">{!! $reply->pesan !!}</div>
                </div>
            </div>
        @endforeach

    </div>

    <!-- Form Balasan -->
    @if($ticket->status_layanan != 'Closed')
    <div class="shrink-0 bg-white rounded-2xl shadow-sm border border-gray-100 p-4 sm:p-6">
        <form action="{{ route('mentor.layanan.reply', $ticket->id) }}" method="POST" x-data="{ contentError: false }" @submit="if(document.getElementById('pesan').value.replace(/<[^>]*>?/gm, '').trim() === '') { contentError = true; $event.preventDefault(); }">
            @csrf
            <div class="mb-5">
                <label class="block text-sm font-bold text-gray-800 mb-3">Tulis Balasan</label>
                <div :class="contentError ? 'has-error' : ''" @trix-change="if (contentError) contentError = document.getElementById('pesan').value.replace(/<[^>]*>?/gm, '').trim() === ''">
                    <input id="pesan" type="hidden" name="pesan">
                    <div x-ignore>
                        <trix-editor input="pesan" class="trix-content prose max-w-none text-gray-700" placeholder="Ketik pesan balasan secara detail di sini..."></trix-editor>
                    </div>
                    <p x-show="contentError" class="mt-2 text-sm text-red-600 flex items-center" style="display: none;"><svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg> Pesan balasan wajib diisi.</p>
                </div>
                <x-antarmuka.galat-sebaris name="pesan" />
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-5 py-2.5 bg-primary-600 text-white rounded-xl shadow-sm hover:bg-primary-700 font-medium transition-colors inline-flex items-center">
                    <svg class="w-4 h-4 mr-2 transform rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
                    Kirim Balasan
                </button>
            </div>
        </form>
    </div>
    @else
    <div class="shrink-0 bg-gray-100 rounded-2xl border border-gray-200 p-6 text-center">
        <svg class="mx-auto h-12 w-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
        <p class="text-sm text-gray-500 font-medium">Tiket ini telah ditutup. Percakapan diarsipkan dan tidak dapat dibalas lagi.</p>
    </div>
    @endif

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatArea = document.getElementById('chat-container');
        if (chatArea) {
            chatArea.scrollTop = chatArea.scrollHeight;
        }
    });
</script>
@endsection
