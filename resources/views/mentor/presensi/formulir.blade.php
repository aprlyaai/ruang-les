@extends('layouts.mentor')

@section('title', 'Presensi')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('mentor.jadwal') }}" class="hover:text-primary-600 transition-colors">Jadwal Kelas</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Presensi</span>
@endsection

@section('content')
<div class="space-y-6 w-full">

    <div class="mb-6">
        <x-admin.tajuk-halaman
            title="Formulir Presensi Harian"
            backUrl="{{ route('mentor.jadwal') }}"
        />
    </div>


    <x-mentor.profil-murid :siswa="$student" :jadwal="$schedule" />

    <!-- Layout Grid untuk Form dan History -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Kolom Kiri: Form -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Alert Aturan Kuota -->
            <div class="bg-primary-50 border border-primary-200 rounded-xl p-5 shadow-sm text-primary-900 text-sm flex items-start">
                <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div class="text-justify w-full">
                    <p class="font-bold mb-1 text-primary-800">Catatan Presensi & Pemotongan Kuota:</p>
                    <p class="text-primary-700 leading-relaxed">Pastikan mengisi presensi sesuai kehadiran aktual. Sistem akan otomatis menyesuaikan kuota dengan aturan berikut:</p>
                    <ul class="list-disc list-outside ml-4 mt-2 space-y-1 text-primary-700">
                        <li><span class="font-semibold text-primary-800">Hadir:</span> Kuota terpotong 1 sesi. Estimasi Hari-H DL Pembayaran tetap.</li>
                        <li><span class="font-semibold text-primary-800">Tidak Hadir & Libur:</span> Sisa Kuota tetap. Estimasi Hari-H DL Pembayaran akan diundur ke jadwal berikutnya.</li>
                    </ul>
                </div>
            </div>

<!-- Form -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
                <form action="{{ isset($editMode) ? route('mentor.presensi.update', $editMode->id) : route('mentor.presensi.store') }}" method="POST" novalidate>
                    @csrf
                    @if(isset($editMode))
                        @method('PUT')
                    @endif
                    <input type="hidden" name="murid_id" value="{{ $student->id }}">
                    <input type="hidden" name="jadwal_id" value="{{ $schedule->id }}">

                    <h3 class="text-lg font-bold text-gray-900 mb-6 uppercase tracking-wider border-b border-gray-100 pb-4">
                        {{ isset($editMode) ? 'Edit Presensi : ' . \Carbon\Carbon::parse($editMode->tanggal_presensi)->format('d F Y') : 'Status Presensi Hari Ini : ' . date('d F Y') }}
                    </h3>

                    <div class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <!-- Option Hadir -->
                            <label class="relative cursor-pointer">
                                <input type="radio" name="status" value="hadir" class="peer sr-only" {{ old('status', $editMode->status_presensi ?? '') == 'hadir' ? 'checked' : '' }}>
                                <div class="p-5 rounded-xl border-2 border-gray-200 hover:border-primary-200 peer-checked:border-primary-500 peer-checked:bg-primary-50 transition-all text-center">
                                    <div class="w-12 h-12 bg-primary-100 text-primary-600 rounded-full mx-auto mb-3 flex items-center justify-center">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                    <span class="block font-bold text-gray-900 mb-1">Hadir</span>
                                    <span class="block text-xs text-gray-500">Kuota berkurang 1</span>
                                </div>
                            </label>

                            <!-- Option Tidak Hadir -->
                            <label class="relative cursor-pointer">
                                <input type="radio" name="status" value="tidak_hadir" class="peer sr-only" {{ old('status', $editMode->status_presensi ?? '') == 'tidak_hadir' ? 'checked' : '' }}>
                                <div class="p-5 rounded-xl border-2 border-gray-200 hover:border-red-200 peer-checked:border-red-500 peer-checked:bg-red-50 transition-all text-center">
                                    <div class="w-12 h-12 bg-red-100 text-red-600 rounded-full mx-auto mb-3 flex items-center justify-center">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </div>
                                    <span class="block font-bold text-gray-900 mb-1">Tidak Hadir</span>
                                    <span class="block text-xs text-gray-500">Sakit / Izin / Alpha / Lainnya</span>
                                </div>
                            </label>

                            <!-- Option Libur -->
                            <label class="relative cursor-pointer">
                                <input type="radio" name="status" value="libur" class="peer sr-only" {{ old('status', $editMode->status_presensi ?? '') == 'libur' ? 'checked' : '' }}>
                                <div class="p-5 rounded-xl border-2 border-gray-200 hover:border-yellow-200 peer-checked:border-yellow-500 peer-checked:bg-yellow-50 transition-all text-center">
                                    <div class="w-12 h-12 bg-yellow-100 text-yellow-600 rounded-full mx-auto mb-3 flex items-center justify-center">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <span class="block font-bold text-gray-900 mb-1">Libur</span>
                                    <span class="block text-xs text-gray-500">Hari Libur / Diliburkan</span>
                                </div>
                            </label>
                        </div>

                        <x-antarmuka.galat-sebaris name="status" />

                        <div>
                            <label for="notes" class="block text-sm font-semibold text-gray-600 mb-2">Keterangan Tambahan <span class="text-gray-400 font-normal">(Opsional)</span></label>
                            <textarea name="notes" id="notes" rows="3" class="block w-full rounded-2xl p-3 border border-gray-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800" placeholder="Tuliskan keterangan tambahan jika diperlukan (misal: anak sedang sakit demam, izin pergi acara keluarga, dll)">{{ old('notes', $editMode->notes_presensi ?? '') }}</textarea>
                            <x-antarmuka.galat-sebaris name="notes" />
                        </div>
                    </div>

                    <div class="flex flex-col-reverse md:flex-row gap-3 mt-8 pt-6 border-t border-gray-100">
                        @if(isset($editMode))
                            <a href="{{ route('mentor.presensi.create', [$schedule->id, $student->id]) }}" class="w-full md:w-1/3 flex items-center justify-center px-4 py-2.5 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 shadow-sm transform hover:-translate-y-1">
                                Batal Edit
                            </a>
                            <button type="submit" class="w-full md:w-2/3 flex items-center justify-center px-6 py-2.5 text-sm font-extrabold text-white transition-all duration-100 bg-amber-500 rounded-xl hover:bg-amber-600 shadow-lg shadow-amber-500/30 transform hover:-translate-y-1">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                Update Presensi
                            </button>
                        @else
                            <button type="button" onclick="window.location.href=window.location.href" class="w-full md:w-1/3 flex items-center justify-center px-4 py-2.5 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-xl hover:bg-red-50 hover:border-red-200 hover:text-red-600 shadow-sm transform hover:-translate-y-1">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Bersihkan Data
                            </button>

                            <!-- Tombol Simpan Utama -->
                            <button type="submit" class="w-full md:w-2/3 flex items-center justify-center px-6 py-2.5 text-sm font-extrabold text-white transition-all duration-100 bg-primary-600 rounded-xl hover:bg-primary-700 shadow-lg shadow-primary-500/30 transform hover:-translate-y-1">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                                Simpan Presensi
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- Kolom Kanan: Timeline Riwayat Presensi -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden h-full">
                <!-- Header -->
                <div class="p-5 border-b border-gray-100 bg-gray-50/50 flex flex-col gap-1">
                    <h4 class="text-sm font-bold text-gray-900">Riwayat Presensi Terakhir</h4>
                    <p class="text-xs text-gray-500 font-medium">8 pertemuan terakhir di kelas ini</p>
                </div>

                <!-- Timeline -->
                <div class="p-6">
                    @if($recent_attendances->count() > 0)
                        <div class="relative border-l-2 border-gray-100 ml-2 space-y-6">
                            @foreach($recent_attendances as $att)
                                <div class="relative pl-6">
                                    <!-- Timeline Dot -->
                                    <div class="absolute -left-[5px] top-1.5 w-2 h-2 rounded-full ring-4 ring-white
                                        {{ $att->status_presensi === 'hadir' ? 'bg-primary-500' : ($att->status_presensi === 'tidak_hadir' ? 'bg-red-500' : 'bg-yellow-500') }}">
                                    </div>

                                    <!-- Content -->
                                    <div class="flex flex-col items-start gap-1">
                                        <div class="flex items-start justify-between gap-2 w-full">
                                            <div>
                                                <p class="text-sm font-bold text-gray-900">{{ \Carbon\Carbon::parse($att->tanggal_presensi)->format('d F Y') }}</p>
                                                <p class="text-[10px] text-gray-500 mt-0.5 uppercase font-bold">Input: {{ $att->created_at->format('H:i') }} WIB</p>
                                            </div>

                                            <!-- Badge -->
                                            <div>
                                                @if($att->status_presensi === 'hadir')
                                                    <x-antarmuka.lencana color="primary" class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold border">Hadir</x-antarmuka.lencana>
                                                @elseif($att->status_presensi === 'tidak_hadir')
                                                    <x-antarmuka.lencana color="danger" class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold border">Tidak Hadir</x-antarmuka.lencana>
                                                @else
                                                    <x-antarmuka.lencana color="warning" class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold border">Libur</x-antarmuka.lencana>
                                                @endif
                                            </div>
                                        </div>
                                        @if($att->notes_presensi)
                                            <p class="text-xs text-gray-600 italic mt-1 bg-gray-50 p-2 rounded-lg border border-gray-100 w-full">"{{ \Illuminate\Support\Str::limit($att->notes_presensi, 60) }}"</p>
                                        @endif
                                        <div class="flex items-center gap-2 mt-2">
                                            <a href="{{ route('mentor.presensi.edit', $att->id) }}" class="inline-flex items-center p-2 text-gray-500 bg-gray-50 rounded-lg hover:bg-primary-50 hover:text-primary-600 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500" title="Edit">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                            <x-admin.formulir-hapus
                                                :route="route('mentor.presensi.destroy', $att->id)"
                                                itemName="Presensi"
                                                title="Hapus Presensi?"
                                                text="Kuota siswa akan otomatis dikembalikan jika status sebelumnya adalah Hadir."
                                            />
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <x-admin.keadaan-kosong
                            title="Belum Ada Riwayat Presensi"
                            message="Murid ini belum memiliki absensi di kelas ini."
                            :compact="true"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </x-admin.keadaan-kosong>
                    @endif
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
