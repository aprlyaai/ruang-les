@extends('layouts.orang-tua')

@section('title', 'Dashboard Orang Tua')

@section('content')

@if($state === 'A')
    <!-- STATE A: BELUM TERDAFTAR -->
    <div x-data="{ mounted: false }" x-init="setTimeout(() => mounted = true, 100)" class="max-w-4xl mx-auto mt-10">
        <div x-show="mounted" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0"
             class="bg-white/80 backdrop-blur-md rounded-[2.5rem] shadow-xl border border-white/60 overflow-hidden relative">

            <!-- Decorative Elements -->
            <div class="p-12 md:p-16 text-center relative z-10">
                <div class="inline-flex items-center justify-center w-24 h-24 rounded-3xl bg-gradient-to-br from-primary-400 to-primary-600 shadow-lg shadow-primary-500/30 mb-8 transform rotate-3 hover:rotate-6 transition-transform duration-300">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>

                <h3 class="text-4xl font-extrabold text-gray-900 tracking-tight mb-4 font-outfit">Selamat Datang di Ruang Les!</h3>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-10 leading-relaxed">
                    Kami siap membantu anak Anda mencapai potensi belajar terbaiknya dengan mentor profesional dan modul evaluasi cerdas. Mulailah perjalanan akademik anak Anda sekarang.
                </p>

                <a href="{{ route('pendaftaran.form') }}" class="inline-flex items-center justify-center px-10 py-5 border border-transparent text-xl font-bold rounded-2xl text-white bg-primary-600 hover:bg-primary-700 hover:shadow-xl hover:shadow-primary-600/40 focus:outline-none focus:ring-4 focus:ring-primary-500 focus:ring-offset-2 transition-all transform hover:-translate-y-1">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Isi Formulir Pendaftaran Anak
                </a>
            </div>
        </div>
    </div>
@endif

@if($state === 'B')
    <!-- STATE B: PENDING -->
    <div x-data="{ mounted: false }" x-init="setTimeout(() => mounted = true, 100)" class="max-w-4xl mx-auto mt-10">
        <div x-show="mounted" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0"
             class="bg-white/80 backdrop-blur-md rounded-[2.5rem] shadow-xl border border-white/60 overflow-hidden relative">

            <!-- Decorative Elements -->
            <div class="absolute top-0 left-0 -mt-20 -ml-20 w-64 h-64 bg-amber-200 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>

            <div class="p-12 text-center relative z-10 flex flex-col items-center">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-amber-100 text-amber-600 mb-6 relative shadow-sm">
                    <svg class="w-10 h-10 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <!-- Small spinning circle indicator -->
                    <div class="absolute -top-1 -right-1">
                        <span class="relative flex h-5 w-5">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-5 w-5 bg-amber-500"></span>
                        </span>
                    </div>
                </div>

                <h3 class="text-3xl font-bold text-gray-900 mb-3 font-outfit">Pendaftaran Sedang Diverifikasi</h3>
                <p class="text-gray-600 max-w-xl mx-auto text-lg leading-relaxed">
                    Terima kasih telah melakukan pembayaran! Admin kami sedang meninjau dan memverifikasi pendaftaran <strong>{{ $activeSiswa->panggilan_murid ?? 'Anak Anda' }}</strong>. Fitur Ruang Les akan terbuka secara otomatis setelah proses verifikasi selesai.
                </p>

                <div class="mt-8 bg-amber-50/80 backdrop-blur-sm border border-amber-200 rounded-2xl p-4 inline-flex items-center gap-3 shadow-sm">
                    <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="text-amber-800 font-medium">Status saat ini: Menunggu Konfirmasi Admin</span>
                </div>
            </div>
        </div>
    </div>
@endif

@if($state === 'C')
    <!-- STATE C: AKTIF -->
    <div x-data="{ mounted: false }" x-init="setTimeout(() => mounted = true, 100)">

        <div x-show="mounted" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="mb-8">
            <x-admin.tajuk-halaman description="Pantau perkembangan dan jadwal belajar {{ $activeSiswa->panggilan_murid }} dengan mudah melalui dashboard ini.">
                <x-slot name="titleSlot">
                    <span class="inline-flex items-center flex-wrap">Halo, {{ Auth::user()->name }}! <span class="ml-2 text-3xl sm:text-4xl inline-block animate-bounce" style="animation-duration: 2s;">👋</span></span>
                </x-slot>
            </x-admin.tajuk-halaman>
        </div>

        <!-- 1. Top Section: Stat Cards -->
        <div x-show="mounted" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

            <!-- Profil Singkat / Identitas Anak -->
            <x-admin.kartu-statistik
                url="{{ route('ortu.jadwal') }}"
                theme="gradient"
                color="primary"
                badgeText="Kelas {{ $activeSiswa->kelas }} SD"
                title="Profil Anak"
                value="{{ $activeSiswa->panggilan_murid }}"
                unit="{{ $activeSiswa->sekolah }}"
            >
                <x-slot name="icon">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </x-slot>
            </x-admin.kartu-statistik>

            <!-- Sisa Kuota -->
            <x-admin.kartu-statistik
                url="{{ route('ortu.tagihan') }}"
                theme="glass"
                color="{{ ($kuota && $kuota->sisa_sesi <= 2) ? 'red' : 'primary' }}"
                title="Sisa Kuota Sesi"
                value="{{ $kuota ? $kuota->sisa_sesi : 0 }}"
                unit="Sesi dari {{ $kuota ? $kuota->total_sesi : 0 }}"
            >
                <x-slot name="icon">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </x-slot>
                @if($kuota)
                    <x-slot name="badgeText">
                        @if($kuota->sisa_sesi < 0)
                            Nunggak
                        @elseif($kuota->sisa_sesi == 0)
                            Habis
                        @elseif($kuota->sisa_sesi <= 2)
                            Hampir Habis
                        @endif
                    </x-slot>
                @endif
                <div class="mt-4">
                    <div class="flex justify-between text-xs mb-1">
                        <span class="text-gray-500 font-medium">Progres Paket</span>
                        <span class="font-bold {{ ($kuota && $kuota->sisa_sesi <= 2) ? 'text-red-600' : 'text-primary-600' }}">{{ $kuota ? round($kuota->progress_persen) : 0 }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-1.5 overflow-hidden">
                        <div class="{{ ($kuota && $kuota->sisa_sesi <= 2) ? 'bg-red-500' : 'bg-primary-500' }} h-1.5 rounded-full transition-all duration-1000 ease-out" style="width: {{ $kuota ? $kuota->progress_persen : 0 }}%"></div>
                    </div>
                </div>
            </x-admin.kartu-statistik>

            <!-- Estimasi Selesai -->
            <x-admin.kartu-statistik
                url="{{ route('ortu.tagihan') }}"
                theme="glass"
                color="{{ ($kuota && $kuota->sisa_sesi <= 0) ? 'red' : 'primary' }}"
                title="Estimasi Pembayaran"
                value="{{ $kuota && $kuota->estimasi_day_of_week_h ? \Carbon\Carbon::parse($kuota->estimasi_day_of_week_h)->translatedFormat('d F Y, ') : '-' }}"
                unit="{{ $kuota && $kuota->estimasi_day_of_week_h ? ' ' . \Carbon\Carbon::parse($kuota->estimasi_day_of_week_h)->translatedFormat('l') : '' }}"
            >
                <x-slot name="icon">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </x-slot>
                @if($kuota && $kuota->estimasi_day_of_week_h)
                    <x-slot name="badgeText">
                        @if($kuota->sisa_sesi < 0)
                            Lakukan Pembayaran
                        @elseif($kuota->sisa_sesi == 0)
                            Jatuh Tempo
                        @else
                            {{ \Carbon\Carbon::parse($kuota->estimasi_day_of_week_h)->diffForHumans() }}
                        @endif
                    </x-slot>
                @endif
            </x-admin.kartu-statistik>

        </div>

        <!-- 2. Middle Section: Content -->
        <div x-show="mounted" x-transition:enter="transition ease-out duration-500 delay-200" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

            <!-- Pengumuman (kiri) -->
            <div class="flex flex-col h-full">
                <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden flex flex-col h-full">
                    <div class="p-6 border-b border-gray-100 flex items-center bg-primary-50/30">
                        <svg class="w-6 h-6 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                        <h3 class="font-bold text-gray-900 text-lg">Pengumuman</h3>
                    </div>

                    @if(isset($pengumumans) && $pengumumans->count() > 0)
                    <div class="divide-y divide-gray-100 overflow-y-auto flex-1 max-h-[400px]">
                        @foreach($pengumumans as $pengumuman)
                        <div class="p-6 {{ $pengumuman->diprioritaskan ? 'bg-amber-50/30' : 'hover:bg-primary-50/10 transition-colors' }}">
                            <div class="flex items-start justify-between mb-2">
                                <div class="flex items-center gap-2">
                                    @if($pengumuman->diprioritaskan)
                                    <x-antarmuka.lencana color="warning" class="text-[10px] py-0 px-2 group-hover:scale-105">
                                        <svg class="w-3 h-3 mr-1 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                                        Pinned
                                    </x-antarmuka.lencana>
                                    @endif
                                    <h4 class="font-bold text-gray-900">{{ $pengumuman->judul_pengumuman }}</h4>
                                </div>
                                <span class="text-xs font-semibold text-gray-500 whitespace-nowrap ml-4">{{ $pengumuman->created_at->format('d M Y') }}</span>
                            </div>
                            <div class="text-sm text-gray-600 prose prose-sm max-w-none text-justify">
                                {!! $pengumuman->isi_pengumuman !!}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="flex-1 flex flex-col items-center justify-center p-8 min-h-[250px]">
                        <x-admin.keadaan-kosong title="Tidak Ada Pengumuman" message="Belum ada informasi terbaru dari admin." />
                    </div>
                    @endif
                </div>
            </div>

            <!-- Kanan: Jadwal Kelas -->
            <div class="flex flex-col h-full space-y-6">
                <!-- Paket Belajar -->
                <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden flex flex-col">
                    <div class="p-6 border-b border-gray-100 bg-primary-50/30 flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-primary-800 font-heading flex items-center">
                                <svg class="w-5 h-5 mr-2 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                Paket Belajar Saat Ini
                            </h3>
                            <p class="text-sm text-gray-700 mt-1">Detail program bimbingan belajar anak</p>
                        </div>
                        <a href="{{ route('ortu.repositori') }}" class="text-sm font-bold text-primary-600 hover:text-primary-700 whitespace-nowrap">Buka Materi</a>
                    </div>

                    <div class="p-5">
                        <div class="bg-primary-50 border border-primary-200 rounded-2xl p-4 hover:border-primary-400 transition-colors shadow-sm group">
                            <div class="flex justify-between items-start mb-2.5">
                                <x-antarmuka.lencana color="primary" class="text-[10px] uppercase tracking-wider group-hover:bg-primary-600 group-hover:text-white transition-colors py-0.5">
                                    {{ str_replace('_', ' ', $activePendaftaran->package->tipe_program) }}
                                </x-antarmuka.lencana>
                            </div>
                            <h4 class="text-base font-bold text-gray-900 mb-3">{{ $activePendaftaran->package->nama_program }}</h4>
                            <div class="space-y-2">
                                <div class="flex justify-between items-center text-xs border-b border-primary-100/50 pb-2">
                                    <span class="text-gray-500 font-semibold">Durasi per Sesi:</span>
                                    <span class="font-bold text-gray-900 bg-white px-2 py-0.5 rounded-lg shadow-sm border border-primary-100 text-xs">{{ $activePendaftaran->package->durasi_belajar }} Menit</span>
                                </div>
                                <div class="flex justify-between items-center text-xs pt-0.5">
                                    <span class="text-gray-500 font-semibold">Lokasi Belajar:</span>
                                    <span class="font-bold text-gray-900 bg-white px-2 py-0.5 rounded-lg shadow-sm border border-primary-100 text-xs">{{ $activePendaftaran->package->lokasi_belajar }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jadwal Kelas Aktif -->
                <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden flex flex-col flex-1">
                    <div class="p-6 border-b border-gray-100 bg-primary-50/30 flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-primary-800 font-heading flex items-center">
                                <svg class="w-5 h-5 mr-2 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                Jadwal Kelas Mingguan
                            </h3>
                        </div>
                        <a href="{{ route('ortu.jadwal') }}" class="text-sm font-bold text-primary-600 hover:text-primary-700">Lihat Kalender</a>
                    </div>

                    <div class="p-6 space-y-4 overflow-y-auto">
                        @php
                            $schedulesList = collect();
                            if ($activePendaftaran->schedule1) {
                                $schedulesList->push((object)[
                                    'hari' => $activePendaftaran->schedule1->hari,
                                    'formatted_time_range' => $activePendaftaran->schedule1->formatted_time_range,
                                    'lokasi_belajar' => $activePendaftaran->package->lokasi_belajar ?? 'Offline',
                                ]);
                            }
                            if ($activePendaftaran->schedule2) {
                                $schedulesList->push((object)[
                                    'hari' => $activePendaftaran->schedule2->hari,
                                    'formatted_time_range' => $activePendaftaran->schedule2->formatted_time_range,
                                    'lokasi_belajar' => $activePendaftaran->package->lokasi_belajar ?? 'Offline',
                                ]);
                            }

                            // Fallback to active classes from pivot class_student
                            if ($schedulesList->isEmpty() && isset($activeSiswa) && $activeSiswa->classes->isNotEmpty()) {
                                foreach ($activeSiswa->classes as $class) {
                                    $schedulesList->push((object)[
                                        'hari' => $class->hari,
                                        'formatted_time_range' => $class->formatted_time_range,
                                        'lokasi_belajar' => $class->package->lokasi_belajar ?? 'Offline',
                                    ]);
                                }
                            }

                            // Urutkan secara kronologis berdasarkan nama hari
                            $dayOrder = ['Senin' => 1, 'Selasa' => 2, 'Rabu' => 3, 'Kamis' => 4, 'Jumat' => 5, 'Sabtu' => 6, 'Minggu' => 7];
                            $schedulesList = $schedulesList->sortBy(function($item) use ($dayOrder) {
                                return $dayOrder[$item->hari] ?? 99;
                            });
                        @endphp

                        @if($schedulesList->isNotEmpty())
                            <div class="divide-y divide-gray-100">
                                @foreach($schedulesList as $sched)
                                <div class="flex items-center justify-between py-3.5 first:pt-0 last:pb-0">
                                    <div>
                                        <span class="font-bold text-gray-900 text-sm block leading-tight">{{ $sched->hari }}</span>
                                        <span class="text-xs text-primary-600 font-bold block mt-1">{{ $sched->formatted_time_range }}</span>
                                    </div>
                                    <span class="text-[10px] font-bold text-gray-500 bg-gray-100 px-2.5 py-0.5 rounded border border-gray-200/50 uppercase tracking-wider shrink-0">
                                        {{ $sched->lokasi_belajar }}
                                    </span>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="flex flex-col items-center justify-center py-8">
                                <x-admin.keadaan-kosong title="Belum Ada Jadwal" message="Jadwal kelas belum ditentukan oleh Admin." />
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>

        <!-- 3. Statistik Akademik & Evaluasi -->
        <div x-show="mounted" x-transition:enter="transition ease-out duration-500 delay-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="mb-8">
            <h2 class="text-xl font-extrabold text-gray-900 mb-6 font-outfit flex items-center">
                <svg class="w-6 h-6 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                Statistik Akademik & Evaluasi
            </h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Grafik Kehadiran -->
                <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-sm border border-primary-100/50 p-6 flex flex-col">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-100 pb-2">Ringkasan Kehadiran</h3>
                    @if(isset($totalAttendance) && $totalAttendance > 0)
                        <div class="space-y-4 mt-4 flex-1 flex flex-col justify-center">
                            @foreach(['Hadir' => ['color' => 'bg-green-500', 'bg' => 'bg-green-100'], 'Tidak Hadir' => ['color' => 'bg-red-500', 'bg' => 'bg-red-100'], 'Libur' => ['color' => 'bg-yellow-500', 'bg' => 'bg-yellow-100']] as $status => $theme)
                                @php
                                    $count = $attendanceSummary[$status] ?? 0;
                                    $percent = $totalAttendance > 0 ? round(($count / $totalAttendance) * 100) : 0;
                                @endphp
                                <div>
                                    <div class="flex justify-between text-sm font-medium mb-1">
                                        <span class="text-gray-700">{{ $status }} <span class="text-gray-400 text-xs ml-1">({{ $count }})</span></span>
                                        <span class="text-gray-900 font-bold">{{ $percent }}%</span>
                                    </div>
                                    <div class="w-full {{ $theme['bg'] }} rounded-full h-2">
                                        <div class="{{ $theme['color'] }} h-2 rounded-full" style="width: {{ $percent }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="flex-1 flex items-center justify-center min-h-[200px]">
                            <x-admin.keadaan-kosong title="Belum Ada Data" message="Data presensi belum dimasukkan oleh mentor." />
                        </div>
                    @endif
                </div>

                <!-- Tren Nilai -->
                <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-sm border border-primary-100/50 p-6 flex flex-col">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-100 pb-2 flex justify-between items-center">
                        Tren Evaluasi Terakhir
                        <a href="{{ route('ortu.buku-akademik') }}" class="text-sm font-bold text-primary-600 hover:text-primary-700">Lihat Rapot</a>
                    </h3>
                    @if(isset($recentScores) && $recentScores->count() > 0)
                        <div class="flex-1 flex items-end justify-between gap-2 mt-4 pt-4 min-h-[200px]">
                            @foreach($recentScores->reverse() as $score)
                                @php
                                    $height = max(10, min(100, $score->score));
                                    $barColor = $score->score >= 80 ? 'bg-primary-500' : ($score->score >= 60 ? 'bg-amber-400' : 'bg-red-500');
                                @endphp
                                <div class="flex flex-col items-center flex-1 group relative">
                                    <!-- Tooltip on hover -->
                                    <div class="opacity-0 group-hover:opacity-100 transition-opacity absolute -top-14 bg-gray-900 text-white text-xs py-1 px-2 rounded pointer-events-none whitespace-nowrap z-10 text-center">
                                        {{ Str::limit($score->materi_nilai, 15) }}<br>{{ $score->skor_nilai }}
                                    </div>
                                    <span class="text-xs font-bold text-gray-700 mb-1">{{ $score->score }}</span>
                                    <div class="w-full md:w-10 {{ $barColor }} rounded-t-sm transition-all duration-700 ease-out hover:opacity-80" style="height: {{ $height }}%;"></div>
                                    <span class="text-[10px] text-gray-500 mt-2 truncate w-full text-center">{{ \Carbon\Carbon::parse($score->tanggal_penilaian)->format('d/m') }}</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="flex-1 flex items-center justify-center min-h-[200px]">
                            <x-admin.keadaan-kosong title="Belum Ada Nilai" message="Evaluasi belum dimasukkan oleh mentor." />
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- 4. Panic Button / Bantuan -->
        <div x-show="mounted" x-transition:enter="transition ease-out duration-500 delay-400" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="mb-8">
            <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl p-5 md:p-6 shadow-xl relative overflow-hidden flex flex-col md:flex-row items-center justify-between">
                <!-- Abstract decorations -->
                <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-white opacity-5 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-40 h-40 bg-primary-500 opacity-20 rounded-full blur-2xl"></div>

                <div class="relative z-10 text-center md:text-left mb-4 md:mb-0">
                    <h3 class="text-lg font-bold text-white mb-1 font-outfit">Butuh Bantuan atau Ingin Reschedule?</h3>
                    <p class="text-gray-400 max-w-xl text-xs sm:text-sm">Jangan ragu untuk menghubungi Admin kami jika ada kendala dengan mentor, jadwal, atau keluhan lainnya.</p>
                </div>

                <div class="relative z-10 shrink-0">
                    <a href="{{ route('ortu.layanan.index') }}" class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-xs font-bold rounded-xl text-gray-900 bg-white hover:bg-primary-50 hover:text-primary-700 shadow-md shadow-black/20 transition-all transform hover:scale-105">
                        Hubungi Layanan Admin
                    </a>
                </div>
            </div>
        </div>

    </div>
@endif

@endsection
