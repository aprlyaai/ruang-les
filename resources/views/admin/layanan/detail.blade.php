@extends('layouts.admin')

@section('title', 'Detail Layanan (Inbox)')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('admin.helpdesks.index') }}" class="text-gray-500 hover:text-primary-600 transition-colors font-medium">Layanan (Inbox)</a>
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

<div class="flex flex-col min-h-[calc(100vh-11rem)]" x-data="{
    isTestimoniMode: false,
    selectedMessages: [],
    toggleSelection(msg) {
        if (this.selectedMessages.includes(msg)) {
            this.selectedMessages = this.selectedMessages.filter(m => m !== msg);
        } else {
            this.selectedMessages.push(msg);
        }
    }
}">

    <!-- Header Tiket -->
    <div class="shrink-0 bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col sm:flex-row justify-between items-start gap-4 mb-6">
        <div class="flex-1">
            <x-admin.tajuk-halaman
                title="{{ $ticket->subject_layanan }}"
                description="Tiket {{ $ticket->no_ticket }} dibuat oleh {{ $ticket->user->name ?? 'Pengirim Tidak Dikenal' }} pada {{ $ticket->created_at->format('d M Y, H:i') }}"
            />
            <div class="mt-2 flex gap-2">
                @if($ticket->status_layanan == 'Open')
                    <x-antarmuka.lencana color="danger" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit">
                        <span class="w-1.5 h-1.5 bg-red-500 rounded-full mr-1.5 animate-pulse"></x-antarmuka.lencana>
                        Baru
                    </span>
                @elseif($ticket->status_layanan == 'In Progress')
                    <x-antarmuka.lencana color="warning" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit">
                        <span class="w-1.5 h-1.5 bg-amber-500 rounded-full mr-1.5"></x-antarmuka.lencana>
                        Dalam Penanganan
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

        @php
            $testimonialRole = '';
            if ($ticket->user) {
                if ($ticket->user->role === 'orang_tua' || $ticket->user->students()->count() > 0) {
                    $grades = $ticket->user->students->pluck('kelas')->unique()->sort()->implode('/');
                    $testimonialRole = $grades ? 'Orang Tua Murid Kelas ' . $grades : 'Orang Tua Murid';
                } elseif ($ticket->user->role === 'mentor') {
                    $testimonialRole = 'Mentor';
                } else {
                    $testimonialRole = ucfirst($ticket->user->role ?? '');
                }
            }
        @endphp

        <div class="flex items-center flex-wrap gap-3">
            <template x-if="!isTestimoniMode">
                <button type="button" @click="isTestimoniMode = true; selectedMessages = []" class="inline-flex items-center px-4 py-2 bg-primary-50 border border-primary-200 rounded-xl shadow-sm text-sm font-medium text-gray-700 hover:bg-primary-100 hover:text-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all duration-200" title="Jadikan ulasan ini sebagai testimoni publik">
                    <svg class="w-4 h-4 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg>
                    Jadikan Testimoni
                </button>
            </template>

            <template x-if="isTestimoniMode">
                <div class="flex items-center gap-2 bg-primary-50 border border-primary-200 p-1.5 rounded-xl shadow-sm animate-fade-in-up">
                    <span class="text-xs font-bold text-primary-800 px-2 hidden sm:inline flex items-center">
                        <svg class="w-4 h-4 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Pilih pesan di bawah:
                    </span>
                    <button type="button" @click="isTestimoniMode = false; selectedMessages = []" class="text-gray-500 hover:text-gray-700 hover:bg-gray-200/50 rounded-lg text-sm font-bold px-3 py-1.5 transition-colors">Batal</button>
                    <a :href="`{{ route('admin.testimonials.create') }}?nama_pemberi={{ urlencode($ticket->user->name ?? '') }}&peran_pemberi={{ urlencode($testimonialRole) }}&testimoni=` + encodeURIComponent(selectedMessages.join('\n\n'))"
                       class="inline-flex items-center px-4 py-1.5 bg-primary-600 text-white rounded-lg shadow-sm text-sm font-bold hover:bg-primary-700 transition-colors"
                       :class="selectedMessages.length === 0 ? 'opacity-50 cursor-not-allowed pointer-events-none' : ''">
                        Lanjutkan (<span x-text="selectedMessages.length"></span>)
                    </a>
                </div>
            </template>
            @if($ticket->status_layanan != 'Closed')
            <form action="{{ route('admin.helpdesks.close', $ticket->id) }}" method="POST" class="close-ticket-form">
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
                // Determine if reply is from an Admin or from the user
                $isAdmin = ($reply->user->role ?? '') == 'admin';
            @endphp
            <div x-data="{ msgText: atob('{{ base64_encode($reply->pesan) }}'), isAdmin: {{ $isAdmin ? 'true' : 'false' }} }"
                 class="flex items-start gap-4 transition-all duration-200 {{ $isAdmin ? 'flex-row-reverse' : '' }}"
                 :class="(!isAdmin && isTestimoniMode) ? 'cursor-pointer hover:bg-primary-50/50 p-2 -mx-2 rounded-2xl' : (isAdmin && isTestimoniMode ? 'opacity-40 grayscale pointer-events-none' : '')"
                 @click="if(!isAdmin && isTestimoniMode) toggleSelection(msgText)">

                <div class="flex-shrink-0 relative">
                    <x-admin.avatar :name="$reply->user->name ?? 'Pengguna'" :avatar-url="$reply->user->avatar ?? null" size="10" />
                    <!-- Checkmark Icon Overlay -->
                    <div x-show="!isAdmin && isTestimoniMode && selectedMessages.includes(msgText)" style="display: none;" class="absolute -top-1 -right-1 bg-primary-500 text-white rounded-full p-0.5 border-2 border-white shadow-sm">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                </div>

                <div class="flex-1 p-4 rounded-2xl shadow-sm transition-all duration-200 {{ $isAdmin ? 'bg-primary-600 text-white rounded-tr-none border-transparent' : 'rounded-tl-none border' }}"
                     :class="!isAdmin ? (selectedMessages.includes(msgText) ? 'border-primary-500 ring-2 ring-primary-200 bg-primary-50/50' : 'border-gray-100 bg-white') : ''">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-bold text-sm {{ $isAdmin ? 'text-white' : 'text-gray-900' }}">{{ $reply->user->name ?? 'Pengguna' }} <span class="text-xs {{ $isAdmin ? 'text-primary-100' : 'text-gray-500' }} font-normal ml-2">({{ $isAdmin ? 'Admin' : 'Pengirim' }})</span></span>
                        <span class="text-xs {{ $isAdmin ? 'text-primary-100' : 'text-gray-400' }}">{{ $reply->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <div class="text-sm trix-content prose prose-sm max-w-none {{ $isAdmin ? 'prose-invert' : '' }}">{!! $reply->pesan !!}</div>
                </div>
            </div>
        @endforeach

    </div>

    <!-- Form Balasan -->
    @if($ticket->status_layanan != 'Closed')
    <div class="shrink-0 bg-white rounded-2xl shadow-sm border border-gray-100 p-4 sm:p-6">
        <form action="{{ route('admin.helpdesks.reply', $ticket->id) }}" method="POST" x-data="{ contentError: false }" @submit="if(document.getElementById('pesan').value.replace(/<[^>]*>?/gm, '').trim() === '') { contentError = true; $event.preventDefault(); }">
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
@endsection
