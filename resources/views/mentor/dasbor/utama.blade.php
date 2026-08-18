@extends('layouts.mentor')

@section('title', 'Dashboard Mentor')

@section('content')
<div x-data="{ mounted: false }" x-init="setTimeout(() => mounted = true, 100)">
    @php
        $formattedDate = \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY');
    @endphp

    <div x-show="mounted" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="mb-8">
        <!-- Welcome Section -->
        <x-admin.tajuk-halaman description="Selamat datang di Ruang Les. Mari bantu wujudkan potensi terbaik setiap murid hari ini.">
            <x-slot name="titleSlot">
                <span class="flex items-center">Halo, {{ Auth::user()->name }}! <span class="ml-2 text-4xl inline-block animate-bounce" style="animation-duration: 2s;">👋</span></span>
            </x-slot>
        </x-admin.tajuk-halaman>
    </div>

    <!-- Quick Stats -->
    <div x-show="mounted" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

        <!-- Urut 1: Sesi Terlaksana -->
        <x-admin.kartu-statistik
            url="{{ route('mentor.jadwal') }}"
            theme="gradient"
            color="primary"
            badgeText="Bulan Ini"
            title="Sesi Terlaksana"
            value="{{ $totalSesiBulanIni }}"
            unit="sesi"
        >
            <x-slot name="icon">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </x-slot>
        </x-admin.kartu-statistik>

        <!-- Urut 2: Tugas Tertunda -->
        <x-admin.kartu-statistik
            url="#tugas-tertunda"
            theme="glass"
            color="{{ $tugasTertunda > 0 ? 'red' : 'primary' }}"
            badgeText="Hari Ini"
            title="Tugas Tertunda"
            value="{{ $tugasTertunda }}"
            unit="tugas"
        >
            <x-slot name="icon">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </x-slot>
        </x-admin.kartu-statistik>

        <!-- Urut 3: Total Murid Ajar -->
        <x-admin.kartu-statistik
            url="{{ route('mentor.riwayat-belajar') }}"
            theme="glass"
            color="primary"
            badgeText="Aktif"
            title="Total Murid Ajar"
            value="{{ $totalSiswa }}"
            unit="anak"
        >
            <x-slot name="icon">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </x-slot>
        </x-admin.kartu-statistik>
    </div>

    <!-- Pending Tasks Alert -->
    <div x-show="mounted" x-transition:enter="transition ease-out duration-500 delay-200" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="mb-8">
        @if($tugasTertunda > 0)
    <div id="tugas-tertunda" class="bg-orange-50 border border-orange-200 rounded-2xl p-6 shadow-sm scroll-mt-24">
        <h3 class="text-lg font-bold text-orange-800 mb-4 flex items-center">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            Tugas Administrasi Kelas Hari Ini
        </h3>
        <ul class="space-y-3">
            @foreach($detailTugas as $tugas)
                <li class="flex items-center justify-between bg-white p-4 rounded-xl shadow-sm border border-orange-100">
                    <div>
                        <p class="font-semibold text-gray-900">{{ $tugas['siswa'] }}</p>
                        <p class="text-sm text-gray-600">Jadwal: {{ $tugas['jadwal'] }}</p>
                    </div>
                    <div class="flex gap-2">
                            @if($tugas['belum_presensi'])
                                <x-antarmuka.lencana color="danger" class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold">Belum Presensi</x-antarmuka.lencana>
                            @endif
                            @if($tugas['belum_catatan'])
                                <x-antarmuka.lencana color="danger" class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold">Belum Catatan</x-antarmuka.lencana>
                            @endif
                            @if($tugas['belum_nilai'])
                                <x-antarmuka.lencana color="danger" class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold">Belum Nilai</x-antarmuka.lencana>
                            @endif
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="mt-4">
            <a href="{{ route('mentor.jadwal') }}" class="inline-flex items-center px-4 py-2 bg-orange-600 hover:bg-orange-700 text-white font-medium rounded-xl transition-colors">
                Buka Jadwal Kelas
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </div>
    @else
    <div id="tugas-tertunda" class="bg-primary-50 border border-primary-200 rounded-2xl p-6 shadow-sm text-center scroll-mt-24">
        <div class="w-16 h-16 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        </div>
        <h3 class="text-lg font-bold text-primary-800 mb-2">Semua Tugas Selesai!</h3>
        <p class="text-primary-700">Anda telah menyelesaikan semua pengisian data untuk kelas hari ini.</p>
    </div>
    @endif
    </div>

    <!-- Jadwal Hari Ini Section -->
    <div x-show="mounted" x-transition:enter="transition ease-out duration-500 delay-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-bold text-gray-900 flex items-center">
                <svg class="w-6 h-6 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Jadwal Kelas Hari Ini
            </h2>
            <a href="{{ route('mentor.jadwal') }}" class="text-sm font-bold text-primary-600 hover:text-primary-700">Lihat Semua Jadwal</a>
        </div>

        @if($jadwalHariIni->isEmpty())
            <x-admin.keadaan-kosong title="Yeay! Tidak Ada Jadwal" message="Anda tidak memiliki jadwal mengajar hari ini." />
        @else
            <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-gray-50/50 border-b border-primary-100/50 text-xs font-bold text-gray-500 uppercase tracking-wider">
                                <th class="px-6 py-4">Nama Kelas & Paket</th>
                                <th class="px-6 py-4">Waktu Belajar</th>
                                <th class="px-6 py-4">Daftar Murid</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @foreach($jadwalHariIni as $schedule)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 align-top">
                                        <p class="font-bold text-gray-900 text-sm">{{ $schedule->nama_kelas }}</p>
                                        <p class="text-xs text-gray-500 mt-0.5">{{ $schedule->package->nama_program ?? 'Paket' }}</p>
                                    </td>
                                    <td class="px-6 py-4 align-top">
                                        <div class="font-semibold text-gray-900 text-sm flex items-center mt-1">
                                            <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            {{ $schedule->formatted_time_range }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 align-top">
                                        @if($schedule->students->isEmpty())
                                            <p class="text-xs text-gray-400 italic mt-1">Belum ada murid di kelas ini.</p>
                                        @else
                                            <div class="space-y-2 max-w-xl">
                                                @foreach($schedule->students as $student)
                                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-2 bg-gray-50/50 rounded-xl border border-gray-100/80">
                                                        <div class="flex items-center space-x-2.5">
                                                            <x-admin.avatar :name="$student->nama_murid" size="7" textSize="text-[10px]" />
                                                            <span class="font-bold text-gray-800 text-xs">{{ $student->nama_murid }}</span>
                                                        </div>
                                                        <div class="flex flex-wrap gap-1.5">
                                                            <a href="{{ route('mentor.presensi.create', ['jadwal_id' => $schedule->jadwal_id, 'siswa_id' => $student->murid_id]) }}"
                                                               class="inline-flex items-center px-2.5 py-1 bg-green-50 text-green-700 hover:bg-green-100 hover:text-green-800 rounded-lg text-[10px] font-bold transition-colors" title="Isi Presensi">
                                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                                                                Presensi
                                                            </a>
                                                            <a href="{{ route('mentor.catatan.create', ['jadwal_id' => $schedule->jadwal_id, 'siswa_id' => $student->murid_id]) }}"
                                                               class="inline-flex items-center px-2.5 py-1 bg-blue-50 text-blue-700 hover:bg-blue-100 hover:text-blue-800 rounded-lg text-[10px] font-bold transition-colors" title="Isi Catatan">
                                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                                Catatan
                                                            </a>
                                                            <a href="{{ route('mentor.nilai.create', ['jadwal_id' => $schedule->jadwal_id, 'siswa_id' => $student->murid_id]) }}"
                                                               class="inline-flex items-center px-2.5 py-1 bg-purple-50 text-purple-700 hover:bg-purple-100 hover:text-purple-800 rounded-lg text-[10px] font-bold transition-colors" title="Input Nilai">
                                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                                                Nilai
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

    <!-- Pengumuman Section -->
    <div x-show="mounted" x-transition:enter="transition ease-out duration-500 delay-500" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="mb-8">
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-50 flex items-center bg-primary-50/50">
                <svg class="w-6 h-6 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                <h3 class="font-bold text-gray-900 text-lg">Pengumuman</h3>
            </div>

            @if(isset($pengumumans) && $pengumumans->count() > 0)
            <div class="divide-y divide-gray-100 max-h-96 overflow-y-auto">
                @foreach($pengumumans as $pengumuman)
                <div class="p-6 {{ $pengumuman->diprioritaskan ? 'bg-amber-50/30' : 'hover:bg-gray-50 transition-colors' }}">
                    <div class="flex items-start justify-between mb-2">
                        <div class="flex items-center gap-2">
                            @if($pengumuman->diprioritaskan)
                            <x-antarmuka.lencana color="warning" class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                                Pinned
                            </x-antarmuka.lencana>
                            @endif
                            <h4 class="font-bold text-gray-900">{{ $pengumuman->judul_pengumuman }}</h4>
                        </div>
                        <span class="text-xs text-gray-400 whitespace-nowrap ml-4">{{ $pengumuman->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="text-sm text-gray-600 prose prose-sm max-w-none text-justify">
                        {!! $pengumuman->isi_pengumuman !!}
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="p-8 flex flex-col items-center justify-center min-h-[250px]">
                <x-admin.keadaan-kosong title="Tidak Ada Pengumuman" message="Belum ada informasi terbaru dari admin." />
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
