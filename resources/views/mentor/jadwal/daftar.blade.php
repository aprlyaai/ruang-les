@extends('layouts.mentor')

@section('title', 'Jadwal Kelas')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Jadwal Kelas</span>
@endsection

@section('content')
<div class="space-y-6">

    <x-admin.tajuk-halaman
        title="Daftar Jadwal Kelas"
        description="Daftar seluruh kelas dan murid yang Anda ampu. Gunakan tombol aksi cepat untuk mengisi Presensi, Catatan Perkembangan, dan Nilai." />

    <!-- Sesi Jadwal Grouped by Day -->
    @foreach($schedules as $day => $daySchedules)
        <div class="mb-8">
            <!-- Header Hari -->
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 rounded-xl bg-primary-100 text-primary-700 flex items-center justify-center mr-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900">{{ $day }}</h3>
                <div class="flex-grow ml-4 h-px bg-gray-200"></div>
            </div>

            @if($daySchedules->isEmpty())
                <x-admin.keadaan-kosong title="Jadwal Kosong" message="Anda tidak memiliki jadwal mengajar di hari {{ $day }}" />
            @else
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    @foreach($daySchedules as $schedule)
                        <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden flex flex-col transition-all duration-300 hover:shadow-md hover:-translate-y-1">
                            <div class="bg-gray-50/50 border-b border-primary-100/50 p-5 flex justify-between items-start">
                                <div>
                                    <h1 class="text-xl font-extrabold text-primary-600 mb-1">{{ $schedule->nama_kelas }}</h1>
                                    <h3 class="text-lg font-bold text-gray-900">{{ $schedule->formatted_time_range }}</h3>
                                    <div class="mt-2 flex items-center flex-wrap gap-2">
                                        <p class="text-sm font-bold text-gray-600">{{ $schedule->package->nama_program ?? 'Paket' }}</p>
                                        @if($schedule->package)
                                            <x-antarmuka.lencana color="primary" class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold border tracking-wide uppercase">
                                                {{ $schedule->package->kelas_program }} &bull; {{ $schedule->package->lokasi_belajar }}
                                            </x-antarmuka.lencana>
                                        @endif
                                    </div>
                                </div>
                                <x-antarmuka.lencana color="primary" class="px-2 py-1 text-xs font-bold rounded">Aktif</x-antarmuka.lencana>
                            </div>

                            <div class="p-0 flex-grow">
                                @if($schedule->students->isEmpty())
                                    <div class="pb-5">
                                        <x-admin.keadaan-kosong title="Daftar Murid Kosong" message="Belum ada murid di kelas ini." />
                                    </div>
                                @else
                                    <table class="w-full text-sm text-left text-gray-500">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                                            <tr>
                                                <th scope="col" class="px-5 py-3 rounded-tl-lg text-center">Murid</th>
                                                <th scope="col" class="px-5 py-3 rounded-tr-lg text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($schedule->students as $student)
                                                <tr class="bg-white border-b border-gray-100 hover:bg-gray-50/50 transition-colors">
                                                    <td class="px-5 py-3 font-medium text-gray-900">
                                                        <div class="flex items-center space-x-3">
                                                            <x-admin.avatar :name="$student->nama_murid" size="8" textSize="text-xs" />
                                                            <div>
                                                                <p class="font-bold text-sm">{{ $student->nama_murid }}</p>
                                                                <p class="text-xs text-gray-500 mt-0.5">
                                                                    {{ $student->school_name ? $student->school_name . ' • ' : '' }}
                                                                    Sisa Kuota: <span class="font-bold {{ $student->kuota_belajar > 0 ? 'text-primary-600' : 'text-red-600' }}">{{ $student->kuota_belajar ?? 0 }}</span> Sesi
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-3 sm:px-5 py-3 text-right align-middle">
                                                         <div class="flex flex-wrap justify-end gap-1.5">
                                                             <!-- Tombol Presensi -->
                                                             <a href="{{ route('mentor.presensi.create', ['jadwal_id' => $schedule->id, 'siswa_id' => $student->id]) }}"
                                                                class="inline-flex items-center px-2 py-1.5 bg-green-50 text-green-700 hover:bg-green-100 hover:text-green-800 rounded-lg text-xs font-bold transition-colors whitespace-nowrap group" title="Isi Presensi">
                                                                 <svg class="w-3.5 h-3.5 mr-1 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                                                                 Presensi
                                                             </a>
                                                             <!-- Tombol Jurnal -->
                                                             <a href="{{ route('mentor.catatan.create', ['jadwal_id' => $schedule->id, 'siswa_id' => $student->id]) }}"
                                                                class="inline-flex items-center px-2 py-1.5 bg-blue-50 text-blue-700 hover:bg-blue-100 hover:text-blue-800 rounded-lg text-xs font-bold transition-colors whitespace-nowrap group" title="Beri Catatan Perkembangan">
                                                                 <svg class="w-3.5 h-3.5 mr-1 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                                 Catatan
                                                             </a>
                                                             <!-- Tombol Nilai -->
                                                             <a href="{{ route('mentor.nilai.create', ['jadwal_id' => $schedule->id, 'siswa_id' => $student->id]) }}"
                                                                class="inline-flex items-center px-2 py-1.5 bg-purple-50 text-purple-700 hover:bg-purple-100 hover:text-purple-800 rounded-lg text-xs font-bold transition-colors whitespace-nowrap group" title="Input Nilai">
                                                                 <svg class="w-3.5 h-3.5 mr-1 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                                                 Nilai
                                                             </a>
                                                         </div>
                                                     </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>

                            <div class="p-3 border-t border-gray-100 bg-gray-50/80 text-xs text-center text-gray-500 font-medium">
                                Total {{ $schedule->students->count() }} Murid
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endforeach
    </div>

</div>
@endsection
