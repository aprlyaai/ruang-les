@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div x-data="{ mounted: false }" x-init="setTimeout(() => mounted = true, 100)">
    <div x-show="mounted" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="mb-8">
        <x-admin.tajuk-halaman description="Selamat datang di pusat kendali. Berikut adalah ringkasan performa dan aktivitas Ruang Les hari ini.">
            <x-slot name="titleSlot">
                <span class="inline-flex items-center flex-wrap">Halo, {{ Auth::user()->name }}! <span class="ml-2 text-3xl sm:text-4xl inline-block animate-bounce" style="animation-duration: 2s;">👋</span></span>
            </x-slot>
            <x-slot name="rightActions">
                <a href="{{ route('admin.settings.index') }}" class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-xl font-bold text-sm hover:bg-gray-50 transition-colors shadow-sm flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Kelola Halaman Depan (CMS)
                </a>
                <a href="{{ url('/') }}" target="_blank" class="px-4 py-2 bg-primary-600 text-white rounded-xl font-bold text-sm hover:bg-primary-700 transition-colors shadow-sm shadow-primary-500/30 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                    Lihat Website
                </a>
            </x-slot>
        </x-admin.tajuk-halaman>
    </div>

<!-- 1. Top Section: Stat Cards -->
<div x-show="mounted" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Pendapatan Bulan Ini -->
    <x-admin.kartu-statistik
        url="{{ route('admin.transactions.index') }}"
        theme="gradient"
        color="primary"
        badgeText="Bulan Ini"
        title="Pendapatan Masuk"
        value="Rp {{ number_format($totalPendapatan, 0, ',', '.') }}"
    >
        <x-slot name="icon">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </x-slot>
    </x-admin.kartu-statistik>

    <!-- Pendaftaran Menunggu -->
    <x-admin.kartu-statistik
        url="{{ route('admin.regist-verifications.index') }}"
        theme="glass"
        color="yellow"
        badgeText="Menunggu"
        title="Pendaftaran Pending"
        value="{{ $pendingRegistrations }}"
        unit="antrean"
    >
        <x-slot name="icon">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
        </x-slot>
    </x-admin.kartu-statistik>

    <!-- Kuota Kritis -->
    <x-admin.kartu-statistik
        url="{{ route('admin.transactions.kuota') }}"
        theme="glass"
        color="red"
        badgeText="Kritis (≤ 0)"
        title="Kuota Murid Habis"
        value="{{ $criticalQuota }}"
        unit="murid"
    >
        <x-slot name="icon">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
        </x-slot>
    </x-admin.kartu-statistik>

    <!-- Tiket Layanan Baru -->
    <x-admin.kartu-statistik
        url="{{ route('admin.helpdesks.index') }}"
        theme="glass"
        color="blue"
        badgeText="Butuh Balasan"
        title="Tiket Layanan Baru"
        value="{{ $pendingTickets }}"
        unit="tiket"
    >
        <x-slot name="icon">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
        </x-slot>
    </x-admin.kartu-statistik>
</div>

<!-- 2. Middle Section: Quick Actions -->
<div x-show="mounted" x-transition:enter="transition ease-out duration-500 delay-200" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="flex flex-col space-y-6 mb-8">
    <!-- Quick Action 1: Pembayaran Belum Diverifikasi (Full width) -->
    <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden flex flex-col">
        <div class="p-6 border-b border-gray-100 flex items-center justify-between bg-yellow-50/30">
            <div>
                <h3 class="text-lg font-bold text-yellow-500 font-heading flex items-center">
                    <svg class="w-5 h-5 text-yellow-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Pembayaran Belum Diverifikasi
                </h3>
                <p class="text-sm text-gray-700 mt-1">Daftar transaksi yang menunggu pengecekan Admin</p>
            </div>
            <a href="{{ route('admin.transactions.index') }}" class="text-sm font-bold text-primary-600 hover:text-primary-700">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto flex-1">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th class="px-6 py-4 border-b border-gray-100 text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-50">Pengirim</th>
                        <th class="px-6 py-4 border-b border-gray-100 text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-50 text-center">Jumlah Nominal</th>
                        <th class="px-6 py-4 border-b border-gray-100 text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-50 text-center">Tanggal</th>
                        <th class="px-6 py-4 border-b border-gray-100 text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-50 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($pendingTransactions as $transaction)
                        <tr class="hover:bg-primary-50/40 transition-all duration-300 cursor-default group">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="mr-3">
                                        <x-admin.avatar :name="$transaction->user->name ?? 'Pengguna'" :avatar-url="$transaction->user->avatar ?? null" size="8" textSize="text-xs" />
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900">{{ $transaction->user->name ?? 'Tanpa Nama' }}</p>
                                        <p class="text-xs text-gray-500 mt-1">Murid: {{ $transaction->student->nama_murid ?? '-' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 align-middle text-center">
                                <span class="text-sm font-bold text-gray-900">Rp {{ number_format($transaction->total_pembayaran, 0, ',', '.') }}</span>
                            </td>
                            <td class="px-6 py-4 align-middle text-center">
                                <p class="text-sm font-semibold text-gray-900">{{ $transaction->created_at->diffForHumans() }}</p>
                            </td>
                            <td class="px-4 py-3 align-middle text-center">
                                <a href="{{ route('admin.transactions.show', $transaction->id) }}" class="inline-flex items-center justify-center px-3 py-1.5 min-h-[25px] min-w-[25px] text-xs font-bold text-gray-600 bg-white border border-gray-200 transition-all duration-100 rounded-lg hover:bg-primary-50 hover:text-primary-600 hover:border-primary-200 shadow-sm">
                                    Lihat Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-0">
                                <x-admin.keadaan-kosong title="Antrean Bersih" message="Tidak ada pembayaran yang menunggu verifikasi." />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Container for Tritunggal & Jadwal -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Quick Action 2: Peringatan Tritunggal (Wall of Shame) -->
        <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-sm border border-red-100/50 overflow-hidden flex flex-col">
            <div class="p-6 border-b border-gray-100 bg-red-50/30">
                <h3 class="text-lg font-bold text-red-700 font-heading flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    Peringatan Mentor
                </h3>
                <p class="text-sm text-red-500/80 mt-1">Mentor hari ini yang belum lengkap mengisi data Presensi, Catatan, atau Nilai.</p>
            </div>

            <div class="flex-1 overflow-y-auto">
                <ul class="divide-y divide-gray-100">
                    @forelse($incompleteTritunggal as $schedule)
                        <li class="p-4 hover:bg-red-50/10 transition-colors">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="mr-3">
                                        <x-admin.avatar :name="$schedule->mentor->name ?? 'M'" :avatar-url="$schedule->mentor->avatar ?? null" size="8" textSize="text-xs" />
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900">{{ $schedule->mentor->name ?? 'Belum Ada Mentor' }}</p>
                                        <p class="text-xs text-gray-500 mt-0.5">{{ $schedule->package->nama_program ?? 'Kelas' }} • {{ $schedule->formatted_time_range ?? substr($schedule->waktu_belajar, 0, 5) }}</p>
                                    </div>
                                </div>
                                @if(!empty($schedule->missing_tasks))
                                    <span class="text-[10px] font-bold text-red-500 bg-red-50 px-2.5 py-1 rounded-md border border-red-100 whitespace-nowrap">
                                        Belum Lengkap: {{ implode(', ', $schedule->missing_tasks) }}
                                    </span>
                                @endif
                            </div>
                            <form action="{{ route('admin.class-schedules.remind-mentor', $schedule->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full mt-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 text-xs font-bold rounded-lg transition-colors border border-red-100 flex justify-center items-center">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    Kirim Pengingat
                                </button>
                            </form>
                        </li>
                    @empty
                        <li class="p-0 border-none">
                            <x-admin.keadaan-kosong title="Semua Disiplin" message="Seluruh tugas rutin mentor hari ini sudah tuntas." />
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>

        <!-- Quick Action 3: Jadwal Hari Ini -->
        <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden flex flex-col">
            <div class="p-6 border-b border-gray-100 bg-primary-50/30 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-primary-800 font-heading flex items-center">
                        <svg class="w-5 h-5 text-primary-700 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Jadwal Kelas Hari Ini
                    </h3>
                    <p class="text-sm text-gray-700 mt-1">Daftar kelas yang sedang dan akan berlangsung</p>
                </div>
                <a href="{{ route('admin.class-schedules.index') }}" class="text-sm font-bold text-primary-600 hover:text-primary-700">Lihat</a>
            </div>

            <div class="flex-1 overflow-y-auto">
                <ul class="divide-y divide-gray-100">
                    @forelse($todaySchedules->take(5) as $schedule)
                        <li class="p-4 hover:bg-primary-50/10 transition-colors">
                            <div class="flex items-start justify-between">
                                <div class="flex items-center">
                                    <div class="mr-3">
                                        <x-admin.avatar :name="$schedule->mentor->name ?? 'M'" :avatar-url="$schedule->mentor->avatar ?? null" size="8" textSize="text-xs" />
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900">{{ $schedule->package->nama_program ?? 'Program Terhapus' }}</p>
                                        <p class="text-xs text-gray-500 mt-0.5">Mentor: {{ $schedule->mentor->name ?? 'Belum Ditentukan' }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <x-antarmuka.lencana color="primary" class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold">
                                        {{ $schedule->formatted_time_range ?? substr($schedule->waktu_belajar, 0, 5) }}
                                    </x-antarmuka.lencana>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="p-0 border-none">
                            <x-admin.keadaan-kosong title="Libur" message="Tidak ada jadwal kelas hari ini." />
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- 3. Bottom Section: Executive Analytics (Jalan Tengah) -->
<div x-show="mounted" x-transition:enter="transition ease-out duration-500 delay-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="bg-white/80 backdrop-blur-md p-6 rounded-2xl shadow-sm border border-primary-100/50 w-full mb-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-lg font-bold text-gray-900 font-heading">Tren Pendaftaran</h3>
            <p class="text-sm text-gray-500">Statistik murid baru 6 bulan terakhir</p>
        </div>
    </div>

    <!-- Dynamic Bar Chart -->
    <div class="h-64 flex items-end justify-between space-x-2 pt-4">
        @php $maxCount = max(count($trendData) > 0 ? $trendData : [1]) ?: 1; @endphp
        @foreach($trendData as $index => $count)
            @php
                $heightPercentage = ($count / $maxCount) * 100;
                // Skala minimal 10% agar bar tetap terlihat jika count 0
                $heightPercentage = $heightPercentage < 10 ? 10 : $heightPercentage;
                // Highlight bulan terakhir
                $isLast = $index == count($trendData) - 1;
            @endphp
            <div class="w-full flex flex-col items-center group">
                <div class="w-full {{ $isLast ? 'bg-primary-500 shadow-lg shadow-primary-500/30' : 'bg-primary-100 group-hover:bg-primary-200' }} rounded-t-lg transition-colors relative" style="height: {{ $heightPercentage }}%;">
                    <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs py-1 px-2 rounded {{ $isLast ? 'opacity-100' : 'opacity-0 group-hover:opacity-100' }} transition-opacity">{{ $count }}</div>
                </div>
                <span class="text-xs {{ $isLast ? 'text-primary-600' : 'text-gray-400' }} mt-2 font-bold">{{ $months[$index] }}</span>
            </div>
        @endforeach
    </div>
</div>
</div>
@endsection
