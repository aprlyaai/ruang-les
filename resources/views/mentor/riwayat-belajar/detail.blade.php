@extends('layouts.mentor')

@section('title', 'Detail Riwayat Belajar')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('mentor.riwayat-belajar') }}" class="hover:text-primary-600 transition-colors">Buku Akademik</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Detail Riwayat</span>
@endsection

@section('content')
<div class="space-y-6 w-full" x-data="{ activeTab: new URLSearchParams(window.location.search).get('tab') || 'presensi' }">

    <div class="mb-6">
        <x-admin.tajuk-halaman
            title="Detail Riwayat Belajar"
            backUrl="{{ route('mentor.riwayat-belajar') }}"
        />
    </div>

    <x-mentor.profil-murid :siswa="$student" :jadwal="$schedules->first()" :jadwals="$schedules" />

    <div class="flex flex-col">
    <!-- Tabs Navigation -->
    <div class="bg-white/80 backdrop-blur-md rounded-t-2xl border border-primary-100/50 border-b-0 overflow-hidden">
        <nav class="flex overflow-x-auto whitespace-nowrap no-scrollbar" style="-ms-overflow-style: none; scrollbar-width: none;" aria-label="Tabs">
            <button @click="activeTab = 'presensi'"
                    :class="{'border-primary-500 text-primary-700 bg-primary-50/50': activeTab === 'presensi', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': activeTab !== 'presensi'}"
                    class="flex-1 min-w-max whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                <div class="flex items-center justify-center gap-1.5">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Presensi
                    <x-antarmuka.lencana color="primary" class="activeTab === 'presensi' ? ' ' : ' '">{{ $attendances->count() }}</x-antarmuka.lencana>
                </div>
            </button>

            <button @click="activeTab = 'catatan'"
                    :class="{'border-primary-500 text-primary-700 bg-primary-50/50': activeTab === 'catatan', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': activeTab !== 'catatan'}"
                    class="flex-1 min-w-max whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                <div class="flex items-center justify-center gap-1.5">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Catatan Perkembangan
                    <x-antarmuka.lencana color="primary" class="activeTab === 'catatan' ? ' ' : ' '">{{ $notes->count() }}</x-antarmuka.lencana>
                </div>
            </button>

            <button @click="activeTab = 'nilai'"
                    :class="{'border-primary-500 text-primary-700 bg-primary-50/50': activeTab === 'nilai', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': activeTab !== 'nilai'}"
                    class="flex-1 min-w-max whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                <div class="flex items-center justify-center gap-1.5">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    Nilai
                    <x-antarmuka.lencana color="primary" class="activeTab === 'nilai' ? ' ' : ' '">{{ $scores->count() }}</x-antarmuka.lencana>
                </div>
            </button>

        </nav>
    </div>

        <!-- Tab Contents -->
        <div class="bg-white/90 backdrop-blur-sm border border-primary-100/50 rounded-b-2xl shadow-sm p-6">

            <!-- PRESENSI TAB -->
            <div x-show="activeTab === 'presensi'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" style="display: none;">
                @if($attendances->isEmpty())
                    <x-admin.keadaan-kosong
                        title="Belum Ada Riwayat Presensi"
                        message="Murid ini belum memiliki absensi di kelas ini."
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </x-admin.keadaan-kosong>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200">
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($attendances as $att)
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <td class="px-6 py-4">
                                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Pertemuan Ke-{{ $loop->count - $loop->index }}</p>
                                            <p class="text-sm font-extrabold text-gray-900 mt-0.5">{{ \Carbon\Carbon::parse($att->tanggal_presensi)->translatedFormat('l, d F Y') }}</p>
                                        </td>
                                        <td class="px-4 py-3 align-middle">
                                            @if($att->status_presensi === 'hadir')
                                                <x-antarmuka.lencana color="primary" class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border w-fit whitespace-nowrap">
                                                    Hadir
                                                </x-antarmuka.lencana>
                                            @elseif($att->status_presensi === 'tidak_hadir')
                                                <x-antarmuka.lencana color="danger" class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border w-fit whitespace-nowrap">
                                                    Tidak Hadir
                                                </x-antarmuka.lencana>
                                            @else
                                                <x-antarmuka.lencana color="warning" class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border w-fit whitespace-nowrap">
                                                    Libur
                                                </x-antarmuka.lencana>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($att->notes_presensi)
                                                <p class="text-sm text-gray-600 italic">"{{ $att->notes_presensi }}"</p>
                                            @else
                                                <span class="text-sm text-gray-600">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <!-- CATATAN TAB -->
            <div x-show="activeTab === 'catatan'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" style="display: none;">
                @if($notes->isEmpty())
                    <x-admin.keadaan-kosong
                        title="Belum Ada Riwayat Perkembangan"
                        message="Murid ini belum memiliki catatan perkembangan di kelas ini."
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </x-admin.keadaan-kosong>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200">
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal & Materi</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Skor Pemahaman</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Fokus & Catatan Perkembangan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($notes as $note)
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <td class="px-6 py-4 align-top w-1/4">
                                            <p class="text-sm font-semibold text-gray-900">{{ \Carbon\Carbon::parse($note->tanggal_catatan)->translatedFormat('l, d F Y') }}</p>
                                            <p class="text-sm font-semibold text-primary-700 mt-1">{{ $note->materi }}</p>
                                        </td>
                                        <td class="px-6 py-4 align-top w-1/6">
                                            <x-antarmuka.lencana color="primary" class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border {{ $note->skor_pemahaman >= 80 ? ' ' : ($note->skor_pemahaman >= 60 ? ' ' : ' ') }}">
                                                Paham: {{ $note->skor_pemahaman ?? 0 }}%
                                            </x-antarmuka.lencana>
                                        </td>
                                        <td class="px-6 py-4 align-top">
                                            <div class="mb-2">
                                                <span class="text-sm font-semibold text-gray-900">Status Fokus:</span>
                                                <span class="text-sm font-bold text-gray-900 ml-1">{{ ucwords(str_replace('_', ' ', $note->status_fokus)) }}</span>
                                            </div>
                                            <div class="bg-gray-50 p-3 rounded-xl border border-gray-100 text-sm text-gray-700 leading-relaxed whitespace-pre-line">{{ $note->catatan_perkembangan }}</div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <!-- NILAI TAB -->
            <div x-show="activeTab === 'nilai'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" style="display: none;">
                @if($scores->isEmpty())
                    <x-admin.keadaan-kosong
                        title="Belum Ada Riwayat Nilai"
                        message="Murid ini belum memiliki nilai di kelas ini."
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </x-admin.keadaan-kosong>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200">
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal & Tipe Penilaian</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Materi / Topik</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Skor Penilaian</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($scores as $score)
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <td class="px-6 py-4 align-top">
                                            <p class="text-sm font-semibold text-gray-900">{{ \Carbon\Carbon::parse($score->tanggal_penilaian)->translatedFormat('l, d F Y') }}</p>
                                            <p class="text-sm font-semibold text-primary-700 mt-1">{{ $score->tipe_nilai }}</p>
                                        </td>
                                        <td class="px-6 py-4 align-top">
                                            <p class="text-sm font-semibold text-gray-900">{{ $score->materi_nilai }}</p>
                                        </td>
                                        <td class="px-4 py-3 align-middle text-center">
                                            <div class="inline-flex items-center justify-center w-10 h-10 rounded-full {{ $score->score >= 80 ? 'bg-primary-50 text-primary-600' : ($score->score >= 60 ? 'bg-yellow-50 text-yellow-600' : 'bg-red-50 text-red-600') }}">
                                                <span class="text-base font-black leading-none">{{ $score->score }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 align-top">
                                            @if($score->notes)
                                                <p class="text-sm text-gray-600 italic">"{{ $score->notes }}"</p>
                                            @else
                                                <span class="text-sm text-gray-600">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>


        </div>
    </div>
    </div>

</div>
@endsection
