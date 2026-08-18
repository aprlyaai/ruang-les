@extends('layouts.admin')

@section('title', 'Detail Jadwal: ' . $schedule->nama_kelas)

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('admin.class-schedules.index') }}" class="hover:text-primary-600 transition-colors">Jadwal Kelas</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Detail Kelas</span>
@endsection

@section('content')
<div class="space-y-4 w-full">

    <div class="mb-6">
        <x-admin.tajuk-halaman
            title="Detail Jadwal Kelas"
            backUrl="javascript:history.back()"
        >
            <x-slot name="rightActions">
                <div class="flex space-x-3">
                    <a href="{{ route('admin.class-schedules.edit', $schedule->id) }}" class="inline-flex items-center justify-center px-4 py-2.5 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-xl hover:bg-primary-50 hover:text-primary-700 hover:border-primary-300 shadow-sm hover:-translate-y-0.5">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        Edit Data
                    </a>
                    <form action="{{ route('admin.class-schedules.destroy', $schedule->id) }}" method="POST" class="delete-form" data-name="Jadwal Kelas {{ $schedule->nama_kelas }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center justify-center px-4 py-2.5 text-sm font-bold text-red-600 transition-all duration-100 bg-white border border-red-200 rounded-xl hover:bg-red-50 hover:border-red-300 shadow-sm hover:-translate-y-0.5">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            Hapus
                        </button>
                    </form>
                </div>
            </x-slot>
        </x-admin.tajuk-halaman>
    </div>

    <!-- Top Banner: Hero Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-6 md:p-8 relative overflow-hidden">
        <!-- Optional Background Decoration -->
        <div class="absolute right-0 top-0 opacity-5 pointer-events-none">
            <svg class="w-48 h-48 -mr-10 -mt-10 text-primary-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"></path></svg>
        </div>

        <div class="flex flex-col md:flex-row items-center md:items-start gap-6 relative z-10">
            <div class="flex-shrink-0">
                <div class="w-20 h-20 md:w-24 md:h-24 rounded-full bg-primary-50 border border-primary-100 flex items-center justify-center text-4xl font-extrabold text-primary-700 shadow-sm">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
            </div>

            <div class="flex-grow text-center md:text-left w-full">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-2xl md:text-3xl font-extrabold text-primary-600">{{ $schedule->nama_kelas }}</h2>
                        <p class="text-gray-900 font-bold text-lg mt-1">{{ $schedule->hari }}, {{ $schedule->formatted_time_range }}</p>
                    </div>

                    <div>
                        @if($schedule->status_jadwal === 'active')
                            <x-antarmuka.lencana color="primary" class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold border w-fit">
                                <span class="w-2 h-2 rounded-full bg-primary-500 mr-2 animate-pulse"></x-antarmuka.lencana> Kelas Aktif
                            </span>
                        @else
                            <x-antarmuka.lencana color="gray" class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold border w-fit">
                                <span class="w-2 h-2 rounded-full bg-gray-500 mr-2"></x-antarmuka.lencana> Nonaktif
                            </span>
                        @endif
                    </div>
                </div>

                <div class="mt-4 flex flex-col justify-center md:justify-start gap-2 border-t border-gray-100 pt-4">
                    <div class="inline-flex items-center text-sm font-medium text-gray-600">
                        <span class="text-sm font-semibold text-gray-600 mr-2">Paket:</span>
                        @if($schedule->package)
                            <div class="flex items-center flex-wrap gap-2">
                                <a href="{{ route('admin.packages.show', $schedule->program_id) }}" class="font-bold text-gray-800 hover:text-primary-600 transition-colors decoration-gray-300 hover:decoration-primary-500 underline-offset-4">
                                    {{ $schedule->package->nama_program }}
                                </a>
                                <x-antarmuka.lencana color="gray" class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-bold border tracking-wide uppercase">
                                    {{ $schedule->package->kelas_program }} &bull; {{ $schedule->package->lokasi_belajar }}
                                </x-antarmuka.lencana>
                            </div>
                        @else
                            <span class="font-bold text-gray-800">Tidak Ada</span>
                        @endif
                    </div>
                    <div class="inline-flex items-center text-sm font-medium text-gray-600">
                        <span class="text-sm font-semibold text-gray-600 mr-2">Mentor:</span>
                        <span class="font-bold text-gray-800 flex items-center">
                            <svg class="w-4 h-4 mr-1 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            @if($schedule->mentor)
                                <a href="{{ route('admin.mentor.show', $schedule->mentor->user_id) }}" class="hover:text-primary-600 transition-colors decoration-primary-300 hover:decoration-primary-500 underline-offset-4">
                                    {{ $schedule->mentor->name }}
                                </a>
                            @else
                                Belum Ditugaskan
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Grid Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

        <!-- Kolom Utama (Kiri): Daftar Murid -->
        <div class="lg:col-span-2 space-y-4">

            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden">
                <div class="p-5 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
                    <div class="flex items-center space-x-3">
                        <h3 class="text-lg font-bold text-primary-800">Daftar Murid </h3>
                        <x-antarmuka.lencana color="primary">{{ $schedule->students->count() }} Murid</x-antarmuka.lencana>
                    </div>

                    @php
                        $maxCapacity = $schedule->package->max_murid ?? 0;
                        $isFull = $maxCapacity > 0 && $schedule->jumlah_murid >= $maxCapacity;
                    @endphp

                    @if(!$isFull)
                        <button type="button" @click="$dispatch('open-modal', 'addStudentModal')" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-white transition-all duration-100 bg-primary-600 border border-transparent rounded-xl hover:bg-primary-700 shadow-sm hover:-translate-y-0.5">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            Tambah Murid
                        </button>
                    @endif
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-white border-b border-gray-100">
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">No</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Murid</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Kelas</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Sekolah</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal Gabung</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($schedule->students as $index => $student)
                            <tr class="hover:bg-primary-50/50 transition-colors">
                                <td class="px-6 py-5 text-sm font-bold text-gray-900 text-center">{{ $index + 1 }}</td>
                                <td class="px-6 py-5">
                                    <a href="{{ route('admin.students.show', $student->id) }}" class="font-semibold text-primary-700 text-base mb-1 hover:text-primary-600 transition-colors block underline decoration-primary-300 hover:decoration-primary-500 underline-offset-4">{{ $student->nama_murid }}</a>
                                    <p class="text-xs text-gray-500 mt-1">Orang Tua: {{ $student->user->name ?? '-' }}</p>
                                </td>
                                <td class="px-6 py-5 text-sm font-semibold text-gray-900 text-center">{{ $student->kelas ?? '-' }} SD</td>
                                <td class="px-6 py-5 text-sm font-semibold text-gray-900">{{ $student->sekolah ?? '-' }}</td>
                                <td class="px-6 py-5 text-sm font-semibold text-gray-900">{{ $student->pivot->created_at ? $student->pivot->created_at->format('d M Y') : '-' }}</td>
                                <td class="px-6 py-5 text-center">
                                    <x-admin.formulir-hapus
                                        :route="route('admin.class-schedules.remove-student', ['id' => $schedule->id, 'murid_id' => $student->id])"
                                        title="Keluarkan Murid?"
                                        text="Apakah Anda yakin ingin mengeluarkan {{ $student->panggilan_murid ?? $student->nama_murid }} dari kelas ini? Murid tidak akan dihapus dari sistem, hanya dikeluarkan dari jadwal ini."
                                        confirm="Ya, Keluarkan Murid"
                                    />
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-0 py-0 text-center">
                                    <x-admin.keadaan-kosong
                                        icon="users"
                                        title="Daftar Murid Kosong"
                                        message="Belum ada murid yang didaftarkan di kelas ini."
                                    />
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Kolom Samping (Kanan): Stats & Info -->
        <div class="lg:col-span-1 space-y-4">

            <!-- Workload Stats (Capacity) -->
            @php
                $maxCapacity = $schedule->package->max_murid ?? 0;
                $percentage = $maxCapacity > 0 ? ($schedule->jumlah_murid / $maxCapacity) * 100 : 0;
                $isFull = $percentage >= 100;
            @endphp
            <div class="bg-gradient-to-br {{ $isFull ? 'from-red-600 to-red-800 border-red-500' : 'from-primary-600 to-primary-800 border-primary-500' }} rounded-2xl shadow-md border p-5 text-white relative overflow-hidden">
                <div class="relative z-10 flex flex-col">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-white/80 font-medium text-sm uppercase tracking-wider">Kapasitas Kelas</div>
                        <div class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center border border-white/30">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                    </div>
                    <div class="text-4xl font-extrabold flex items-baseline gap-1">
                        {{ $schedule->jumlah_murid }} <span class="text-lg font-medium text-white/70">/ {{ $maxCapacity }} Murid</span>
                    </div>

                    <div class="mt-5 w-full bg-black/20 rounded-full h-2 overflow-hidden border border-white/10">
                        <div class="bg-white h-2 rounded-full transition-all duration-500" style="width: {{ $percentage }}%"></div>
                    </div>
                    <div class="mt-2 text-xs font-medium text-white/80 text-right">
                        {{ $isFull ? 'Kelas Penuh' : ($maxCapacity - $schedule->jumlah_murid) . ' Kursi Tersedia' }}
                    </div>
                </div>
            </div>

            <!-- Pintu Tritunggal (Operasional) -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5">
                <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-100 pb-3">Manajemen Kelas</h3>
                <div class="space-y-3">
                    <a href="{{ route('admin.attendances.index', ['jadwal_id' => $schedule->id]) }}" class="flex items-center p-3 rounded-xl border border-gray-200 hover:border-primary-300 hover:bg-primary-50 transition-colors group">
                        <div class="w-10 h-10 rounded-lg bg-green-100 text-green-600 flex items-center justify-center mr-3 group-hover:bg-green-200 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-gray-900 group-hover:text-primary-700">Log Presensi</div>
                            <div class="text-xs text-gray-500">Lihat riwayat kehadiran murid di setiap pertemuan.</div>
                        </div>
                    </a>

                    <a href="{{ route('admin.progress-notes.index', ['jadwal_id' => $schedule->id]) }}" class="flex items-center p-3 rounded-xl border border-gray-200 hover:border-primary-300 hover:bg-primary-50 transition-colors group">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center mr-3 group-hover:bg-blue-200 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-gray-900 group-hover:text-primary-700">Catatan Perkembangan</div>
                            <div class="text-xs text-gray-500">Pantau evaluasi harian dari mentor kelas ini</div>
                        </div>
                    </a>

                    <a href="{{ route('admin.scores.index', ['jadwal_id' => $schedule->id]) }}" class="flex items-center p-3 rounded-xl border border-gray-200 hover:border-primary-300 hover:bg-primary-50 transition-colors group">
                        <div class="w-10 h-10 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center mr-3 group-hover:bg-purple-200 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-gray-900 group-hover:text-primary-700">Nilai</div>
                            <div class="text-xs text-gray-500">Pantau skor belajar khusus untuk kelas ini</div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Detail Tambahan -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5">
                <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-100 pb-3">Ringkasan Sistem</h3>
                <dl class="space-y-4 text-sm">
                    <div>
                        <dt class="block text-xs text-gray-600 font-semibold uppercase tracking-wider mb-1">Dibuat Pada</dt>
                        <dd class="text-sm font-semibold text-gray-900">{{ $schedule->created_at ? $schedule->created_at->format('d M Y, H:i') : '-' }}</dd>
                    </div>
                    <div>
                        <dt class="block text-xs text-gray-600 font-semibold uppercase tracking-wider mb-1">Terakhir Diperbarui</dt>
                        <dd class="text-sm font-semibold text-gray-900">{{ $schedule->updated_at ? $schedule->updated_at->format('d M Y, H:i') : '-' }}</dd>
                    </div>
                </dl>
            </div>

        </div>

    </div>
</div>

<!-- Add Murid Modal -->
<div x-data="{ open: false }"
     x-show="open"
     @open-modal.window="if ($event.detail === 'addStudentModal') open = true"
     @keydown.escape.window="open = false"
     class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto"
     style="display: none;">

    <!-- Backdrop -->
    <div x-show="open" x-transition.opacity class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm" @click="open = false"></div>

    <!-- Modal Panel -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="relative bg-white rounded-2xl shadow-xl w-full max-w-md mx-auto p-6 border border-gray-100 z-10 m-4">

        <div class="flex items-center justify-between mb-5 border-b border-gray-100 pb-4">
            <h3 class="text-xl font-extrabold text-gray-900 tracking-tight font-heading">Tambah Murid ke Kelas</h3>
            <button @click="open = false" class="text-gray-400 hover:text-gray-600 transition-colors bg-gray-50 hover:bg-gray-100 p-2 rounded-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <form action="{{ route('admin.class-schedules.add-student', $schedule->id) }}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="murid_id" class="block text-sm font-semibold text-gray-600 mb-2">Pilih Murid</label>
                <select name="murid_id" id="murid_id" class="searchable-select w-full" data-placeholder="Cari nama murid..." required>
                    <option value="">Cari Murid</option>
                    @foreach($availableStudents as $student)
                        <option value="{{ $student->id }}">{{ $student->nama_murid }} ({{ $student->kelas ?? '-' }} SD) - {{ $student->sekolah ?? '-' }}</option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-500 mt-2">Hanya menampilkan murid yang belum tergabung dalam kelas ini.</p>
            </div>

            <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 mt-5">
                <button type="button" @click="open = false" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-xl hover:bg-gray-100">
                    Batal
                </button>
                <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-white transition-all duration-100 bg-primary-600 border border-transparent rounded-xl hover:bg-primary-700 shadow-sm">
                    Tambahkan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
