@extends('layouts.mentor')

@section('title', 'Buku Akademik')

@section('content')
<div class="space-y-6">

    <x-admin.tajuk-halaman title="Buku Akademik" description="Pilih murid untuk melihat rapor historis secara terperinci dari seluruh jadwal yang Anda ajar." />

    <!-- Search Toolbar -->

    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden" x-data="{ search: '{{ $search ?? '' }}' }">
        <!-- Toolbar (Search) -->
        <div class="p-4 border-b border-gray-100 bg-gray-50/50 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="relative w-full md:max-w-md">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input x-model="search" type="text" placeholder="Cari nama murid..." class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-xl leading-5 bg-white placeholder-gray-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-primary-200 focus:border-primary-400 sm:text-sm transition-colors duration-100">
                <button x-cloak x-show="search.length > 0" @click="search = ''" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>

        @if($students->isEmpty())
            <div class="p-6">
                <x-admin.keadaan-kosong
                    title="Tidak Ada Data Murid"
                    message="Belum ada murid di jadwal kelas yang Anda ajar."
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </x-admin.keadaan-kosong>
            </div>
        @else
            <div class="p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 bg-gray-50/30">
                @foreach($students as $student)
                    <a href="{{ route('mentor.riwayat-belajar.show', $student->id) }}"
                       x-show="search === '' || @js(strtolower($student->nama_murid)).includes(search.toLowerCase())"
                       x-transition
                       class="flex flex-col p-4 rounded-xl border border-gray-200 bg-white hover:bg-primary-50 hover:border-primary-300 transition-all shadow-sm transform hover:-translate-y-1 group">
                        <div class="flex items-center mb-3">
                            <div class="mr-3 flex-shrink-0">
                                <x-admin.avatar :name="$student->nama_murid" size="10" textSize="text-sm" />
                            </div>
                            <div class="overflow-hidden">
                                <p class="font-bold text-gray-900 text-sm truncate group-hover:text-primary-700 transition-colors">{{ $student->nama_murid }}</p>
                                <p class="text-xs text-gray-500 mt-0.5">
                                    Orang Tua: {{ $student->parent->name ?? '-' }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-auto pt-3 border-t border-gray-100 space-y-1.5">
                            <p class="text-[10px] font-bold text-gray-500 uppercase tracking-wider">Jadwal Kelas:</p>
                            @foreach($student->mentor_schedules as $sched)
                                <div class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold bg-primary-50 text-primary-700 border border-primary-200 tracking-wide uppercase w-full truncate">
                                    {{ $sched->package->nama_program ?? 'Kelas' }} ({{ $sched->hari }})
                                </div>
                            @endforeach
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>

</div>
@endsection
