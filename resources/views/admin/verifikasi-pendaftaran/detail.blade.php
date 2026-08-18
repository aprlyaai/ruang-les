@extends('layouts.admin')

@section('title', 'Detail Verifikasi Pendaftaran')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('admin.regist-verifications.index') }}" class="text-gray-500 hover:text-primary-600 transition-colors font-medium">Verifikasi Pendaftaran</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Detail Pendaftaran</span>
@endsection

@section('content')
<div class="space-y-6 w-full">

    <x-admin.tajuk-halaman
        title="Rincian Data Pendaftaran Ruang Les"
        backUrl="{{ route('admin.regist-verifications.index') }}"
    >
        <x-slot name="rightActions">
            @if($registration->status_pendaftaran === 'pending')
                <x-antarmuka.lencana color="warning" size="lg">Status: Menunggu</x-antarmuka.lencana>
            @elseif($registration->status_pendaftaran === 'approved')
                <x-antarmuka.lencana color="primary" size="lg">Status: Diterima</x-antarmuka.lencana>
            @elseif($registration->status_pendaftaran === 'rejected')
                <x-antarmuka.lencana color="danger" size="lg">Status: Ditolak</x-antarmuka.lencana>
            @endif
        </x-slot>
    </x-admin.tajuk-halaman>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <!-- Kolom Kiri -->
        <div class="lg:col-span-2 space-y-4">
            <!-- Data Anak -->
    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden p-5">
        <h3 class="text-lg font-bold text-primary-800 border-b border-gray-100 pb-3 mb-4">Profil Calon Murid</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8 text-sm">
            <div><span class="block text-sm text-gray-600 font-semibold mb-1">Nama Lengkap</span><span class="font-semibold text-gray-900">{{ $registration->nama_murid }}</span></div>
            <div><span class="block text-sm text-gray-600 font-semibold mb-1">Nama Panggilan</span><span class="font-semibold text-gray-900">{{ $registration->panggilan_murid }}</span></div>
            <div><span class="block text-sm text-gray-600 font-semibold mb-1">Tempat, Tanggal Lahir</span><span class="font-semibold text-gray-900">{{ $registration->tempat_lahir_murid }}, {{ \Carbon\Carbon::parse($registration->tanggal_lahir_murid)->format('d F Y') }}</span></div>
            <div><span class="block text-sm text-gray-600 font-semibold mb-1">Jenis Kelamin / Agama</span><span class="font-semibold text-gray-900">{{ $registration->jenis_kelamin_murid }} / {{ $registration->agama }}</span></div>
        </div>
    </div>

    <!-- Akademik Anak -->
    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden p-5">
        <h3 class="text-lg font-bold text-primary-800 border-b border-gray-100 pb-3 mb-4">Profil Akademik</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8 text-sm">
            <div><span class="block text-sm text-gray-600 font-semibold mb-1">Asal Sekolah</span><span class="font-semibold text-gray-900">{{ $registration->sekolah }}</span></div>
            <div><span class="block text-sm text-gray-600 font-semibold mb-1">Kelas Saat Ini</span><span class="font-semibold text-gray-900">{{ $registration->kelas }}</span></div>
            <div><span class="block text-sm text-gray-600 font-semibold mb-1">Nilai Rata-rata</span><span class="font-semibold text-gray-900">{{ $registration->nilai_rata_rata ?? '-' }}</span></div>
            <div><span class="block text-sm text-gray-600 font-semibold mb-1">Karakteristik Belajar</span><span class="font-semibold text-gray-900">{{ $registration->karakteristik_anak }}</span></div>
            <div class="md:col-span-2">
                <span class="block text-sm text-gray-600 font-semibold mb-1">Mata Pelajaran yang Ingin Ditingkatkan:</span>
                <span class="font-semibold text-gray-900">{{ $registration->mapel_ditingkatkan }}</span>
            </div>
            <div class="md:col-span-2">
                <span class="block text-sm text-gray-600 font-semibold mb-1">Mata Pelajaran yang Dirasa Sulit:</span>
                <span class="font-semibold text-gray-900">{{ $registration->mapel_sulit }}</span>
            </div>
        </div>
    </div>

    <!-- Data Wali -->
    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden p-5">
        <h3 class="text-lg font-bold text-primary-800 border-b border-gray-100 pb-3 mb-4">Data Orang Tua / Wali</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8 text-sm">
            <div><span class="block text-sm text-gray-600 font-semibold mb-1">Nama Orang Tua / Wali</span><span class="font-semibold text-gray-900">{{ $registration->nama_orangtua }}</span></div>
            <div><span class="block text-sm text-gray-600 font-semibold mb-1">Status Hubungan</span><span class="font-semibold text-gray-900">{{ $registration->status_hubungan }}</span></div>
            <div><span class="block text-sm text-gray-600 font-semibold mb-1">No. HP / WhatsApp</span><span class="font-semibold text-gray-900">{{ $registration->no_telepon_orangtua }}</span></div>
            <div><span class="block text-sm text-gray-600 font-semibold mb-1">Email</span><span class="font-semibold text-gray-900">{{ $registration->email_orangtua }}</span></div>
            <div class="md:col-span-2"><span class="block text-sm text-gray-600 font-semibold mb-1">Alamat</span><span class="font-semibold text-gray-900">{{ $registration->alamat_domisili }}</span></div>
        </div>
    </div>

            </div>
        <!-- Kolom Kanan -->
        <div class="space-y-4">
            <!-- Program & Jadwal -->
    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden p-5">
        <h3 class="text-lg font-bold text-primary-800 border-b border-gray-100 pb-3 mb-4">Program yang Dipilih & Jadwal</h3>
        <div class="space-y-4 text-sm">
            <div class="bg-primary-50 p-4 rounded-xl border border-primary-100">
                <span class="block text-sm text-gray-600 font-semibold mb-1">Program yang Dipilih:</span>
                <span class="font-bold text-xl text-primary-700">{{ $registration->package->nama_program ?? 'Paket Tidak Ditemukan' }}</span>
                <span class="block text-sm text-gray-600 font-semibold mt-1">Tagihan: <span class="font-bold text-gray-900">Rp {{ number_format($registration->package->harga ?? 0, 0, ',', '.') }}</span></span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                <div class="border border-gray-200 p-4 rounded-xl">
                    <span class="block text-sm text-gray-600 font-semibold mb-1">Jadwal Pertemuan 1</span>
                    <span class="font-bold text-gray-900">{{ $registration->schedule1->hari ?? '-' }}</span><br>
                    <span class="text-gray-600">{{ $registration->schedule1->formatted_time_range ?? '-' }}</span>
                </div>
                @if($registration->schedule2)
                <div class="border border-gray-200 p-4 rounded-xl">
                    <span class="block text-sm text-gray-600 font-semibold mb-1">Jadwal Pertemuan 2</span>
                    <span class="font-bold text-gray-900">{{ $registration->schedule2->hari }}</span><br>
                    <span class="text-gray-600">{{ $registration->schedule2->formatted_time_range ?? '-' }}</span>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Bukti Pembayaran -->
    <div x-data="{ isImageModalOpen: false }" class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden p-5">
        <h3 class="text-lg font-bold text-primary-800 border-b border-gray-100 pb-3 mb-4">Bukti Pembayaran</h3>
        <div class="mt-2 text-center">
            @if($registration->bukti_bayar)
                <button type="button" @click.prevent="isImageModalOpen = true" class="inline-block p-2 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500">
                    <img src="{{ asset('storage/' . $registration->bukti_bayar) }}" alt="Bukti Transfer" class="max-h-64 object-contain mx-auto border border-gray-300">
                    <span class="block text-sm text-primary-600 mt-2 font-medium">Klik gambar untuk memperbesar</span>
                </button>
            @else
                <div class="p-6 bg-gray-50 rounded-xl text-gray-500">Tidak ada bukti pembayaran yang diunggah.</div>
            @endif
        </div>

        <!-- Lightbox Modal -->
        <template x-teleport="body">
            <div x-show="isImageModalOpen" class="fixed inset-0 z-[9999] overflow-y-auto" style="display: none;">
                <div class="flex items-center justify-center min-h-screen p-4 text-center">
                    <div x-show="isImageModalOpen" x-transition.opacity class="fixed inset-0 bg-gray-900/80  transition-opacity" aria-hidden="true" @click="isImageModalOpen = false"></div>

                    <div x-show="isImageModalOpen"
                        x-transition:enter="ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        class="inline-block relative z-[10000] p-2 max-w-4xl w-full">

                        <button @click="isImageModalOpen = false" type="button" class="absolute -top-12 right-0 p-3 text-white hover:text-gray-300 focus:outline-none min-h-[44px] min-w-[44px]">
                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>

                        <img src="{{ asset('storage/' . $registration->bukti_bayar) }}" alt="Bukti Transfer" class="w-full h-auto max-h-[85vh] object-contain mx-auto border border-gray-500 shadow-2xl" @click.stop>
                    </div>
                </div>
            </div>
        </template>
    </div>

        </div>
    </div>

    @if($registration->status_pendaftaran === 'rejected')
    <!-- Alasan Ditolak -->
    <div class="bg-red-50 rounded-2xl shadow-sm border border-red-200 overflow-hidden p-6">
        <h3 class="text-lg font-bold text-red-800 border-b border-red-200 pb-3 mb-4">Alasan Penolakan</h3>
        <p class="text-red-700 font-medium">{{ $registration->alasan_penolakan }}</p>
    </div>
    @endif

    <!-- Aksi -->
    @if($registration->status_pendaftaran === 'pending')
    <div x-data="{ showRejectModal: false, showApproveModal: false }" class="bg-white/80 backdrop-blur-md rounded-2xl shadow-sm border border-primary-100/50 p-6 flex flex-col md:flex-row md:items-center justify-between gap-4 sticky bottom-4 z-20">
        <div>
            <p class="font-bold text-gray-900">Keputusan Admin</p>
            <p class="text-sm text-gray-500">Pastikan semua data dan bukti transfer sudah valid sebelum mengambil keputusan.</p>
        </div>

        <div class="flex space-x-3 w-full md:w-auto">
            <!-- Tombol Tolak memicu Reject Modal -->
            <button @click="showRejectModal = true" type="button" class="flex-1 md:flex-none px-6 py-3 bg-white border border-red-200 text-red-600 font-bold rounded-xl hover:bg-red-50 focus:ring-4 focus:ring-red-100 transition-all text-center">
                Tolak Pendaftaran
            </button>

            <!-- Tombol Terima memicu Approve Modal -->
            <button @click="showApproveModal = true" type="button" class="flex-1 md:flex-none px-8 py-3 bg-primary-600 text-white font-bold rounded-xl hover:bg-primary-700 shadow-md shadow-primary-500/30 hover:shadow-lg focus:ring-4 focus:ring-primary-200 transition-all text-center">
                Terima Pendaftaran
            </button>
        </div>


        <!-- Approve Modal (Penempatan Murid) -->
        <template x-teleport="body">
            <div x-show="showApproveModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div x-show="showApproveModal" x-transition.opacity class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm z-0"></div>
                    </div>

                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                    <div x-show="showApproveModal"
                        @click.away="showApproveModal = false"
                        x-transition:enter="ease-out duration-100"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl w-full relative z-10">

                        <form x-data="{ studentMode: 'new', existingStudentId: '', touched: false }" x-ref="approveForm" id="approveForm" action="{{ route('admin.regist-verifications.approve', $registration->id) }}" method="POST">
                            @csrf
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-5">
                                <h3 class="text-xl leading-6 font-bold text-gray-900 mb-2 flex items-center">
                                    <svg class="w-6 h-6 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Konfirmasi Penempatan Murid
                                </h3>
                                <p class="text-sm text-gray-500 mb-6">Pendaftaran ini telah disetujui. Sekarang tentukan apakah pendaftaran ini untuk murid baru atau murid lama yang mendaftar ulang kelas.</p>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- Opsi Murid Baru -->
                                    <label class="relative flex cursor-pointer rounded-xl border bg-white p-4 shadow-sm focus-within:ring-2 focus-within:ring-primary-500 hover:bg-gray-50 transition-colors" :class="studentMode === 'new' ? 'border-primary-500 ring-1 ring-primary-500 bg-primary-50/30' : 'border-gray-200'">
                                        <input type="radio" name="student_mode" value="new" x-model="studentMode" class="sr-only">
                                        <span class="flex flex-1">
                                            <span class="flex flex-col">
                                                <span class="block text-sm font-bold text-gray-900">Daftarkan sebagai Murid Baru</span>
                                                <span class="mt-1 flex items-center text-xs text-gray-500">Sistem akan membuat profil murid baru bernama {{ $registration->panggilan_murid }}.</span>
                                            </span>
                                        </span>
                                        <svg class="h-5 w-5 text-primary-600" :class="studentMode === 'new' ? 'opacity-100' : 'opacity-0'" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    </label>

                                    <!-- Opsi Murid Lama -->
                                    <div class="relative flex flex-col rounded-xl border bg-white p-4 shadow-sm focus-within:ring-2 focus-within:ring-primary-500 hover:bg-gray-50 transition-colors" :class="studentMode === 'existing' ? 'border-primary-500 ring-1 ring-primary-500 bg-primary-50/30' : 'border-gray-200'">
                                        <label class="flex cursor-pointer mb-3">
                                            <input type="radio" name="student_mode" value="existing" x-model="studentMode" class="sr-only">
                                            <span class="flex flex-1">
                                                <span class="flex flex-col">
                                                    <span class="block text-sm font-bold text-gray-900">Tautkan ke Murid Lama</span>
                                                    <span class="mt-1 flex items-center text-xs text-gray-500">Gunakan profil murid yang sudah ada.</span>
                                                </span>
                                            </span>
                                            <svg class="h-5 w-5 text-primary-600" :class="studentMode === 'existing' ? 'opacity-100' : 'opacity-0'" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                        </label>

                                        <!-- Dropdown Murid (Muncul jika Existing) -->
                                        <div x-show="studentMode === 'existing'" x-transition class="mt-2">
                                            <div :class="touched && studentMode === 'existing' && !existingStudentId ? 'ring-2 ring-red-500 rounded-lg shadow-sm' : ''">
                                                <select x-init="$nextTick(() => { new TomSelect($el, { create: false, sortField: { field: 'text', direction: 'asc' }, placeholder: '-- Pilih Murid --' }) })" x-model="existingStudentId" @change="touched = true" name="existing_student_id" data-placeholder="-- Pilih Murid --" class="w-full text-sm rounded-lg" :required="studentMode === 'existing'">
                                                    <option value="">-- Pilih Murid --</option>
                                                    @forelse($registration->user->students as $student)
                                                        <option value="{{ $student->id }}">{{ $student->nama_murid }} ({{ $student->panggilan_murid }}) - Kelas {{ $student->kelas }}</option>
                                                    @empty
                                                        <option value="" disabled>Orang tua ini belum memiliki data anak.</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <x-antarmuka.galat-sebaris name="existing_student_id" />
                                            <p x-show="touched && studentMode === 'existing' && !existingStudentId" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                Anda wajib memilih murid lama.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-gray-200">
                                <button type="button" @click="if(studentMode === 'existing' && !existingStudentId) { touched = true; } else { document.getElementById('approveForm').submit(); }" class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-sm px-6 py-2 bg-primary-600 text-base font-bold text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:ml-3 sm:w-auto sm:text-sm transition-colors">
                                    Simpan & Konfirmasi
                                </button>
                                <button type="button" @click="showApproveModal = false" class="mt-3 w-full inline-flex justify-center rounded-xl border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition-colors">
                                    Batal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </template>

            <!-- Reject Modal -->
            <template x-teleport="body">
                <div x-data="{ alasan: $persist(''), touched: false }" x-show="showRejectModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div x-show="showRejectModal" x-transition.opacity class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm z-0"></div>
                        </div>

                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                        <div x-show="showRejectModal"
                            @click.away="showRejectModal = false"
                            x-transition:enter="ease-out duration-100"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full relative z-10">

                            <form action="{{ route('admin.regist-verifications.reject', $registration->id) }}" method="POST">
                                @csrf
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-5">
                                    <div class="sm:flex sm:items-start">
                                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                            </svg>
                                        </div>
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                            <h3 class="text-lg leading-6 font-bold text-gray-900" id="modal-headline">
                                                Tolak Pendaftaran
                                            </h3>
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-500 mb-3">
                                                    Silakan masukkan alasan kenapa pendaftaran ini ditolak. Alasan ini akan dikirim via Email ke Orang Tua Murid.
                                                </p>
                                                <textarea x-model="alasan" @blur="touched = true" name="alasan_penolakan" rows="4" required class="w-full bg-gray-50 text-gray-900 text-sm rounded-xl focus:ring-2 block p-3 transition-colors" :class="touched && alasan.trim() === '' ? 'border-red-500 focus:ring-red-500 focus:border-red-500 bg-red-50/30' : 'border-gray-200 focus:ring-primary-500 focus:border-primary-500'" placeholder="Contoh: Bukti transfer yang diunggah buram, mohon upload ulang..."></textarea>
                                                <p x-show="touched && alasan.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    Alasan penolakan wajib diisi.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-gray-200">
                                    <button type="submit" class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm transition-colors">
                                        Konfirmasi Tolak
                                    </button>
                                    <button type="button" @click="showRejectModal = false" class="mt-3 w-full inline-flex justify-center rounded-xl border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition-colors">
                                        Batal
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </template>

        </div>
    </div>
    @endif



</div>
@endsection
