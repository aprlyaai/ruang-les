@extends('layouts.orang-tua')

@section('title', 'Jadwal Kelas')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Jadwal Kelas</span>
@endsection

@section('content')
<div class="space-y-6">

    <x-admin.tajuk-halaman
        title="Jadwal Kelas Mingguan"
        description="Berikut adalah jadwal belajar rutin anak di Ruang Les setiap minggunya. Perhatikan hari, waktu, beserta mentor yang mengajar." />

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
                <x-admin.keadaan-kosong title="Jadwal Kosong" message="Tidak ada jadwal bimbel di hari {{ $day }}" />
            @else
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    @foreach($daySchedules as $schedule)
                        <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden flex flex-col transition-all duration-300 hover:shadow-md hover:-translate-y-1">

                            <!-- Header Kelas -->
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
                                <x-antarmuka.lencana color="primary" class="px-2 py-1 text-xs font-bold rounded shadow-sm border">Rutinan</x-antarmuka.lencana>
                            </div>

                            <!-- Info Mentor -->
                            <div class="p-5 flex-grow bg-white">
                                <h4 class="text-xs font-bold text-gray-700 uppercase tracking-wider mb-3">Mentor</h4>
                                @if($schedule->mentor)
                                    <div class="flex items-center space-x-4">
                                        <x-admin.avatar :name="$schedule->mentor->name ?? '?'" :avatar-url="$schedule->mentor->avatar ?? null" size="12" textSize="text-sm" />
                                        <div>
                                            <p class="font-bold text-gray-900 text-base">{{ $schedule->mentor->name ?? 'Mentor' }}</p>
                                            <p class="text-xs text-gray-500 mt-0.5 font-medium flex items-center">
                                                {{ $schedule->mentor->mentorProfile?->spesialisasi_mentor ?? 'Spesialisasi Mentor Ruang Les' }}
                                            </p>
                                        </div>
                                    </div>
                                @else
                                    <div class="flex items-center space-x-4">
                                        <div class="w-12 h-12 rounded-full bg-gray-100 border border-gray-200 border-dashed flex items-center justify-center text-gray-400">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-500 text-base italic">Belum Ada Mentor</p>
                                            <p class="text-xs text-gray-400 mt-0.5">Sedang dalam proses penjadwalan</p>
                                        </div>
                                    </div>
                                @endif
                            </div>

                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endforeach

</div>
@endsection
