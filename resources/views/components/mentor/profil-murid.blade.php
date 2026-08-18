@props(['siswa', 'jadwal', 'jadwals' => collect()])

<!-- Top Banner: Hero Card -->
<div x-data="{ showProfile: false }" class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-6 md:p-8 relative overflow-hidden">

    <div class="flex flex-col md:flex-row items-center md:items-start gap-6 relative z-10">
        <!-- 1. Avatar -->
        <div class="flex-shrink-0">
            <div class="w-20 h-20 md:w-24 md:h-24 rounded-full bg-primary-50 border border-primary-100 flex items-center justify-center text-4xl font-extrabold text-primary-700 shadow-sm">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </div>
        </div>

        <div class="flex-grow text-center md:text-left w-full">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <!-- 2. Teks -->
                <div>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-primary-600">{{ $siswa->nama_murid }}</h2>
                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3 mt-1">
                        <p class="text-gray-900 font-semibold text-base">{{ $siswa->sekolah ?? 'Sekolah Tidak Diketahui' }}</p>
                        <button @click="showProfile = true" type="button" class="inline-flex justify-center items-center px-2 py-0.5 text-[11px] uppercase tracking-wide font-bold text-primary-700 bg-primary-50 hover:bg-primary-100 border border-primary-200 rounded-md transition-colors focus:outline-none w-max mx-auto sm:mx-0">
                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Profil Belajar
                        </button>
                    </div>
                </div>
            </div>

            <!-- Bottom Section: Metadata & Status Box Grid -->
            <div class="mt-5 border-t border-gray-100 pt-5 grid grid-cols-1 md:grid-cols-12 gap-6 items-start">

                <!-- Left Column: Label Metadata (8 cols) -->
                <div class="md:col-span-7 flex flex-col gap-2.5">
                    <div class="flex items-start text-sm">
                        <div class="w-36 shrink-0 text-gray-500 font-semibold flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            Tingkat Kelas
                        </div>
                        <span class="font-bold text-gray-900">
                            Kelas {{ $siswa->kelas ?? '-' }} SD
                        </span>
                    </div>

                    <div class="flex items-start text-sm">
                        <div class="w-36 shrink-0 text-gray-500 font-semibold flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            Paket Belajar
                        </div>
                        <div class="flex flex-col gap-1">
                            @if(isset($jadwals) && $jadwals->count() > 0)
                                @foreach($jadwals as $j)
                                    <span class="font-bold text-gray-900">{{ $j->package->nama_program ?? '-' }} ({{ $j->hari }})</span>
                                @endforeach
                            @else
                                <span class="font-bold text-gray-900">{{ $jadwal->package->nama_program ?? '-' }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="flex items-start text-sm">
                        <div class="w-36 shrink-0 text-gray-500 font-semibold flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            Kelas Belajar
                        </div>
                        <div class="flex flex-col gap-1">
                            @if(isset($jadwals) && $jadwals->count() > 0)
                                @foreach($jadwals as $j)
                                    <span class="font-bold text-gray-900">{{ $j->nama_kelas }}</span>
                                @endforeach
                            @else
                                <span class="font-bold text-gray-900">{{ $jadwal->nama_kelas }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="flex items-start text-sm">
                        <div class="w-36 shrink-0 text-gray-500 font-semibold flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Jadwal Belajar
                        </div>
                        <div class="flex flex-col gap-1">
                            @if(isset($jadwals) && $jadwals->count() > 0)
                                @foreach($jadwals as $j)
                                    <span class="font-bold text-gray-900">{{ $j->hari }}, {{ $j->formatted_time_range }}</span>
                                @endforeach
                            @else
                                <span class="font-bold text-gray-900">{{ $jadwal->hari }}, {{ $jadwal->formatted_time_range }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Right Column: Status Paket & Kuota Box (5 cols) -->
                <div class="md:col-span-5 flex md:justify-end w-full">
                    <div class="bg-primary-50/20 border border-primary-100/40 rounded-2xl p-4 flex flex-col gap-2 w-full max-w-[280px] text-xs shadow-sm">
                        <div class="flex justify-between items-center gap-6">
                            <span class="text-gray-600 font-bold">Sisa Pertemuan:</span>
                            @if(($siswa->kuota_belajar ?? 0) > 0)
                                <span class="font-extrabold text-primary-700 bg-primary-50 px-2.5 py-0.5 rounded-lg border border-primary-100/30 text-xs">{{ $siswa->kuota_belajar }} Sesi</span>
                            @elseif(($siswa->kuota_belajar ?? 0) == 0)
                                <span class="font-extrabold text-red-700 bg-red-50 px-2.5 py-0.5 rounded-lg border border-red-100/30 text-xs">Habis</span>
                            @else
                                <span class="font-extrabold text-red-700 bg-red-50 px-2.5 py-0.5 rounded-lg border border-red-100/30 text-xs">Habis ( {{ $siswa->kuota_belajar }} Sesi )</span>
                            @endif
                        </div>
                        @if($siswa->estimasi_hari_h)
                        <div class="flex justify-between items-center gap-6 pt-2 border-t border-primary-100/30">
                            <span class="text-gray-600 font-bold">Estimasi Selesai:</span>
                            <span class="font-extrabold text-gray-900">{{ \Carbon\Carbon::parse($siswa->estimasi_hari_h)->translatedFormat('d M Y') }}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Profil Belajar -->
    <template x-teleport="body">
        <div x-show="showProfile" class="fixed inset-0 z-[9999] overflow-y-auto text-left" style="display: none;">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="showProfile" x-transition.opacity class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm z-0"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div x-show="showProfile"
                    @click.away="showProfile = false"
                    x-transition:enter="ease-out duration-100"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full relative z-10">

                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6">
                        <h3 class="text-xl leading-6 font-bold text-gray-900 mb-2 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Profil Belajar Murid
                        </h3>
                        <p class="text-sm text-gray-500 mb-5">Informasi khusus mengenai karakteristik dan gaya belajar siswa.</p>

                        <div class="bg-primary-50/50 p-4 rounded-xl border border-primary-100/50 mb-5">
                            <p class="text-[10px] text-primary-600 font-bold mb-1 uppercase tracking-wider">Data Murid</p>
                            <p class="font-bold text-gray-900">{{ $siswa->nama_murid }}</p>
                            <p class="text-sm text-gray-900 mt-1">Sekolah: <span>{{ $siswa->school_name ?? '-' }}</span></p>
                        </div>

                        <div class="space-y-4">
                            <div class="bg-white border border-gray-200 rounded-xl p-4">
                                <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Mata Pelajaran yang Perlu Ditingkatkan (Sulit)</p>
                                <p class="text-sm font-semibold text-gray-900">{{ $siswa->mapel_sulit ?? 'Belum ada catatan.' }}</p>
                            </div>

                            <div class="bg-white border border-gray-200 rounded-xl p-4">
                                <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Mata Pelajaran yang Disukai</p>
                                <p class="text-sm font-semibold text-gray-900">{{ $siswa->mapel_ditingkatkan ?? 'Belum ada catatan.' }}</p>
                            </div>

                            <div class="bg-white border border-gray-200 rounded-xl p-4">
                                <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Karakteristik & Gaya Belajar Murid</p>
                                <p class="text-sm font-semibold text-gray-900 leading-relaxed">{{ $siswa->karakteristik_anak ?? 'Belum ada catatan.' }}</p>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="button" @click="showProfile = false" class="w-full inline-flex justify-center rounded-xl border border-gray-300 shadow-sm px-4 py-2.5 bg-white text-base font-bold text-gray-700 hover:bg-gray-50 hover:text-gray-900 focus:outline-none sm:text-sm transition-colors">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
