@extends('layouts.mentor')

@section('title', 'Catatan Perkembangan')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('mentor.jadwal') }}" class="hover:text-primary-600 transition-colors">Jadwal Kelas</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Catatan Perkembangan</span>
@endsection

@section('content')
<div class="space-y-6 w-full">

    <div class="mb-6">
        <x-admin.tajuk-halaman
            title="Formulir Catatan Perkembangan"
            backUrl="{{ route('mentor.jadwal') }}"
        />
    </div>


    <x-mentor.profil-murid :siswa="$siswa" :jadwal="$jadwal" />

    <!-- Layout Grid untuk Form dan History -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Kolom Kiri: Form -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Alert Jurnal -->
            <div class="bg-primary-50 border border-primary-200 rounded-xl p-5 shadow-sm text-primary-900 text-sm flex items-start">
                <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div class="text-justify w-full">
                    <p class="font-bold mb-1 text-primary-800">Panduan Pengisian Jurnal Belajar:</p>
                    <p class="text-primary-700 leading-relaxed">Jurnal ini sangat penting bagi perkembangan murid dan laporan ke orang tua. Pastikan Anda mengisi topik materi yang dibahas, memberikan skor objektif (0-100), dan mencatat hal-hal penting seperti fokus atau kendala selama KBM.</p>
                </div>
            </div>

            <!-- Form -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
                <form action="{{ isset($editMode) ? route('mentor.catatan.update', $editMode->id) : route('mentor.catatan.store') }}" method="POST" novalidate>
                    @csrf
                    @if(isset($editMode))
                        @method('PUT')
                    @endif
                    <input type="hidden" name="murid_id" value="{{ $siswa->id }}">
                    <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">

                    <h3 class="text-lg font-bold text-gray-900 mb-6 uppercase tracking-wider border-b border-gray-100 pb-4">
                        {{ isset($editMode) ? 'Edit Catatan Perkembangan : ' . \Carbon\Carbon::parse($editMode->tanggal_catatan)->format('d F Y') : 'Catatan Perkembangan : ' . date('d F Y') }}
                    </h3>

                    <div class="space-y-4">

                        <!-- Topik Materi -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-600 mb-2">Materi / Topik Pembelajaran <span class="text-red-500">*</span></label>
                            <input type="text" name="materi" value="{{ old('materi', $editMode->materi ?? '') }}" class="block w-full rounded-2xl p-3 border border-gray-200 shadow-sm focus:outline-none focus:ring-2 focus:border-primary-400 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" placeholder="Contoh: Operasi Aljabar, Persamaan Kuadrat...">
                            <x-antarmuka.galat-sebaris name="materi" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Skor Pemahaman -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-2">Skor Pemahaman <span class="text-gray-400 font-normal">(0-100)</span></label>
                                <input type="number" name="skor_pemahaman" min="0" max="100" value="{{ old('skor_pemahaman', $editMode->skor_pemahaman ?? '') }}" class="block w-full rounded-2xl p-3 border border-gray-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800" placeholder="Contoh: 85">
                                <x-antarmuka.galat-sebaris name="skor_pemahaman" />
                            </div>

                            <!-- Status Fokus -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-2">Status Fokus <span class="text-red-500">*</span></label>
                                <select name="status_fokus" class="block w-full appearance-none rounded-2xl p-3 pr-10 border border-gray-200 shadow-sm focus:outline-none focus:border-primary-400 focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer">
                                    <option value="" disabled {{ old('status_fokus', $editMode->status_fokus ?? '') ? '' : 'selected' }}>Pilih tingkat fokus</option>
                                    <option value="sangat_fokus" {{ old('status_fokus', $editMode->status_fokus ?? '') == 'sangat_fokus' ? 'selected' : '' }}>Sangat Fokus</option>
                                    <option value="fokus" {{ old('status_fokus', $editMode->status_fokus ?? '') == 'fokus' ? 'selected' : '' }}>Fokus</option>
                                    <option value="kurang_fokus" {{ old('status_fokus', $editMode->status_fokus ?? '') == 'kurang_fokus' ? 'selected' : '' }}>Kurang Fokus</option>
                                    <option value="tidak_fokus" {{ old('status_fokus', $editMode->status_fokus ?? '') == 'tidak_fokus' ? 'selected' : '' }}>Tidak Fokus</option>
                                </select>
                                <x-antarmuka.galat-sebaris name="status_fokus" />
                            </div>
                        </div>

                        <!-- Catatan Umum / Kendala -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-600 mb-2">Catatan Perkembangan <span class="text-red-500">*</span></label>
                            <textarea name="catatan_perkembangan" rows="4" class="block w-full rounded-2xl p-3 border border-gray-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800" placeholder="Deskripsikan progres, kendala, atau perilaku spesifik anak yang perlu diperhatikan hari ini...">{{ old('catatan_perkembangan', $editMode->catatan_perkembangan ?? '') }}</textarea>
                            <x-antarmuka.galat-sebaris name="catatan_perkembangan" />
                        </div>
                    </div>

                    <div class="flex flex-col-reverse md:flex-row gap-3 mt-8 pt-6 border-t border-gray-100">
                        @if(isset($editMode))
                            <a href="{{ route('mentor.catatan.create', [$jadwal->id, $siswa->id]) }}" class="w-full md:w-1/3 flex items-center justify-center px-4 py-2.5 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 shadow-sm transform hover:-translate-y-1">
                                Batal Edit
                            </a>
                            <button type="submit" class="w-full md:w-2/3 flex items-center justify-center px-6 py-2.5 text-sm font-extrabold text-white transition-all duration-100 bg-amber-500 rounded-xl hover:bg-amber-600 shadow-lg shadow-amber-500/30 transform hover:-translate-y-1">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                Update Catatan Perkembangan
                            </button>
                        @else
                            <button type="button" onclick="window.location.href=window.location.href" class="w-full md:w-1/3 flex items-center justify-center px-4 py-2.5 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-xl hover:bg-red-50 hover:border-red-200 hover:text-red-600 shadow-sm transform hover:-translate-y-1">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Bersihkan Data
                            </button>

                            <button type="submit" class="w-full md:w-2/3 flex items-center justify-center px-6 py-2.5 text-sm font-extrabold text-white transition-all duration-100 bg-primary-600 rounded-xl hover:bg-primary-700 shadow-lg shadow-primary-500/30 transform hover:-translate-y-1">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                                Simpan Catatan Perkembangan
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- Kolom Kanan: History -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden h-full">
                <!-- Header -->
                <div class="p-5 border-b border-gray-100 bg-gray-50/50 flex flex-col gap-1">
                    <h4 class="text-sm font-bold text-gray-900">Riwayat Catatan Perkembangan Terakhir</h4>
                    <p class="text-xs text-gray-500 font-medium">8 pertemuan terakhir di kelas ini</p>
                </div>

                <!-- Content -->
                <div class="p-6">
                    @if($recent_notes && count($recent_notes) > 0)
                        <div class="relative border-l-2 border-gray-100 ml-2 space-y-6">
                            @foreach($recent_notes as $note)
                                <div class="relative pl-6">
                                    <!-- Dot/Marker -->
                                    <div class="absolute -left-[5px] top-1.5 w-2 h-2 rounded-full {{ $note->skor_pemahaman >= 80 ? 'bg-primary-500' : ($note->skor_pemahaman >= 60 ? 'bg-yellow-500' : 'bg-red-500') }} ring-4 ring-white">
                                    </div>

                                    <!-- Content -->
                                    <div class="flex flex-col items-start gap-1">
                                        <div class="flex justify-between items-center w-full">
                                            <p class="text-sm font-bold text-gray-900">{{ \Carbon\Carbon::parse($note->tanggal_catatan)->format('d F Y') }}</p>
                                            <x-antarmuka.lencana color="primary" class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold border {{ $note->skor_pemahaman >= 80 ? ' ' : ($note->skor_pemahaman >= 60 ? ' ' : ' ') }}">
                                                Paham: {{ $note->skor_pemahaman }}%
                                            </x-antarmuka.lencana>
                                        </div>
                                        <p class="text-xs font-semibold text-gray-700 mt-1">{{ $note->materi }}</p>
                                        <p class="text-[10px] text-gray-500 uppercase tracking-wider font-bold mt-2">Status: <span class="text-gray-800">{{ $note->status_fokus }}</span></p>
                                        @if($note->catatan_perkembangan)
                                            <p class="text-xs text-gray-600 italic mt-1 bg-gray-50 p-2 rounded-lg border border-gray-100">"{{ \Illuminate\Support\Str::limit($note->catatan_perkembangan, 60) }}"</p>
                                        @endif
                                        <div class="flex items-center gap-2 mt-2">
                                            <a href="{{ route('mentor.catatan.edit', $note->id) }}" class="inline-flex items-center p-2 text-gray-500 bg-gray-50 rounded-lg hover:bg-primary-50 hover:text-primary-600 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500" title="Edit">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </a>
                                            <x-admin.formulir-hapus
                                                :route="route('mentor.catatan.destroy', $note->id)"
                                                itemName="Catatan Perkembangan"
                                                title="Hapus Catatan?"
                                                text="Catatan ini akan dihapus secara permanen dari sistem."
                                            />
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <x-admin.keadaan-kosong
                            title="Belum Ada Riwayat Perkembangan"
                            message="Murid ini belum memiliki catatan perkembangan di kelas ini."
                            :compact="true"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </x-admin.keadaan-kosong>
                    @endif
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
