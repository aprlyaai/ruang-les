@extends('layouts.admin')

@section('title', 'Jadwal Kelas')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Jadwal Kelas</span>
@endsection

@section('content')
<div class="space-y-6">

    <x-admin.tajuk-halaman
        title="Jadwal Kelas"
        description="Susun agenda kelas, tugaskan mentor, dan pastikan kapasitas murid sudah pas."
        actionLabel="Tambah Jadwal"
        actionUrl="{{ route('admin.class-schedules.create') }}" />

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
                <div class="bg-gray-50/50 rounded-2xl border border-dashed border-gray-300 p-8 flex flex-col items-center justify-center text-center">
                    <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-gray-500 font-medium text-sm">Belum ada jadwal kelas di hari {{ $day }}</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($daySchedules as $schedule)
                        <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-sm border {{ $schedule->status_jadwal === 'active' ? 'border-primary-100/50 hover:border-primary-300' : 'border-red-300 opacity-60 grayscale-[30%] hover:opacity-100 hover:grayscale-0' }} overflow-hidden flex flex-col transition-all duration-300 hover:shadow-md hover:-translate-y-1">
                            <div class="{{ $schedule->status_jadwal === 'active' ? 'bg-gray-50/50 border-primary-100/50' : 'bg-red-100/80 border-red-200' }} p-5 border-b flex justify-between items-start">
                                <div>
                                    <h1 class="text-xl font-extrabold {{ $schedule->status_jadwal === 'active' ? 'text-primary-600' : 'text-red-700' }} mb-1">{{ $schedule->nama_kelas }}</h1>
                                    <h3 class="text-lg font-bold text-gray-900">{{ $schedule->formatted_time_range }}</h3>
                                    <p class="text-sm text-gray-500 mt-2">Mentor: <span class="font-semibold text-gray-700">{{ $schedule->mentor->name ?? 'Belum Ditugaskan' }}</span></p>
                                    <div class="mt-2 flex items-center flex-wrap gap-2">
                                        <p class="text-sm font-bold text-primary-600">{{ $schedule->package->nama_program ?? 'Paket Tidak Ditemukan' }}</p>
                                        @if($schedule->package)
                                            <x-antarmuka.lencana color="primary" class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold border tracking-wide uppercase">
                                                {{ $schedule->package->kelas_program }} &bull; {{ $schedule->package->lokasi_belajar }}
                                            </x-antarmuka.lencana>
                                        @endif
                                    </div>
                                </div>
                                @if($schedule->status_jadwal !== 'active')
                                    <x-antarmuka.lencana color="danger" class="px-2 py-1 text-xs font-bold rounded">Nonaktif</x-antarmuka.lencana>
                                @endif
                            </div>

                            <div class="p-5 flex-grow space-y-4">
                                <!-- Progress Bar Kuota -->
                                <div>
                                    @php
                                        $maxCapacity = $schedule->package->max_murid ?? 0;
                                        $percentage = $maxCapacity > 0 ? ($schedule->jumlah_murid / $maxCapacity) * 100 : 0;
                                        $color = $percentage >= 100 ? 'bg-red-500' : 'bg-primary-500';
                                    @endphp
                                    <div class="flex justify-between text-sm mb-1">
                                        <span class="text-sm font-semibold text-gray-900">Murid Terdaftar</span>
                                        <span class="font-bold {{ $schedule->jumlah_murid >= $maxCapacity ? 'text-red-600' : 'text-primary-700' }}">
                                            {{ $schedule->jumlah_murid }} / {{ $maxCapacity }}
                                        </span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="{{ $color }} h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-4 border-t border-gray-100 flex flex-col space-y-3 bg-gray-50">
                                <a href="{{ route('admin.class-schedules.show', $schedule->id) }}" class="flex items-center justify-center w-full py-2.5 text-sm font-bold text-gray-800 bg-primary-50 border border-primary-200 transition-all duration-100 rounded-xl hover:bg-primary-100 hover:text-primary-600 hover:border-primary-400 shadow-sm hover:-translate-y-0.5">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    Lihat Detail Kelas
                                </a>
                                <div class="grid grid-cols-2 gap-3">
                                    <a href="{{ route('admin.class-schedules.edit', $schedule->id) }}" class="inline-flex items-center justify-center py-2.5 text-sm font-bold text-gray-600 bg-white border border-gray-200 transition-all duration-100 rounded-xl hover:bg-primary-100 hover:text-primary-600 hover:border-primary-300 shadow-sm hover:-translate-y-0.5">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.class-schedules.destroy', $schedule->id) }}" method="POST" class="delete-form" data-name="Jadwal {{ $schedule->hari }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center justify-center w-full py-2.5 text-sm font-bold text-red-600 transition-all duration-100 bg-white border border-red-200 rounded-xl hover:bg-red-50 hover:border-red-300 shadow-sm hover:-translate-y-0.5">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
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
