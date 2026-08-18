@extends('layouts.admin')

@section('title', isset($announcement) ? 'Edit Pengumuman' : 'Buat Pengumuman')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('admin.announcements.index') }}" class="hover:text-primary-600 transition-colors">Pengumuman</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">@yield('title')</span>
@endsection

@section('content')
<!-- Trix Editor CSS -->
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<style>
    trix-toolbar [data-trix-button-group="file-tools"] { display: none; }
    trix-editor {
        min-height: 250px;
    }
    .has-error trix-editor {
        border-color: #ef4444 !important;
        box-shadow: 0 0 0 1px #ef4444 !important;
        background-color: rgba(254, 242, 242, 0.5) !important;
    }
</style>
<div class="w-full space-y-6">

    <div class="mb-6">
        <x-admin.tajuk-halaman
            title="{{ isset($announcement) ? 'Edit Pengumuman' : 'Buat Pengumuman Baru' }}"
            backUrl="{{ route('admin.announcements.index') }}"
        />
    </div>

    <!-- Form -->
    <form x-data="{
        judul_pengumuman: @js((string) old('judul_pengumuman', $announcement->judul_pengumuman ?? '')),
        targetAudience: @js((string) old('target_audience', $announcement->target_audience ?? '')),
        touched: {},
        contentError: false,
        resetForm() {
            this.judul_pengumuman = @js((string) old('judul_pengumuman', $announcement->judul_pengumuman ?? ''));
            this.targetAudience = @js((string) old('target_audience', $announcement->target_audience ?? ''));
            this.touched = {};
            this.contentError = false;

            setTimeout(() => {
                let trixEditor = document.querySelector('trix-editor');
                if (trixEditor && trixEditor.editor) {
                    trixEditor.editor.loadHTML(@js((string) old('isi_pengumuman', $announcement->isi_pengumuman ?? '')));
                }

                let isPinned = document.querySelector('input[name=diprioritaskan][type=checkbox]');
                if (isPinned) isPinned.checked = {{ old('diprioritaskan', $announcement->diprioritaskan ?? false) ? 'true' : 'false' }};

                let isActive = document.querySelector('input[name=status_pengumuman][type=checkbox]');
                if (isActive) isActive.checked = {{ old('status_pengumuman', $announcement->status_pengumuman ?? true) ? 'true' : 'false' }};
            }, 10);
        },
        submitForm(e) {
            this.touched.judul_pengumuman = true;
            this.touched.targetAudience = true;

            let isi_pengumuman = document.getElementById('isi_pengumuman').value;
            let isContentEmpty = (isi_pengumuman.replace(/<[^>]*>?/gm, '').trim() === '');
            this.contentError = isContentEmpty;

            let isValid = true;
            if (String(this.judul_pengumuman).trim() === '') isValid = false;
            if (String(this.targetAudience).trim() === '') isValid = false;
            if (isContentEmpty) isValid = false;

            if (!isValid) {
                e.preventDefault();
            }
        }
    }" @submit="submitForm" novalidate action="{{ isset($announcement) ? route('admin.announcements.update', $announcement->id) : route('admin.announcements.store') }}" method="POST" class="space-y-6">
        @csrf
        @if(isset($announcement))
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">

            <!-- Kolom Kiri: Informasi Utama -->
            <div class="lg:col-span-2 space-y-5">
                <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
                    <h3 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Informasi Konten</h3>

                    <div class="space-y-6">
                        <!-- Judul -->
                        <!-- Judul -->
                        <x-admin.input-formulir
                            name="judul_pengumuman"
                            label="Judul Pengumuman"
                            model="judul_pengumuman"
                            placeholder="Contoh: Libur Nasional Idul Fitri 2026"
                            :required="true"
                        />

                        <!-- Editor Trix -->
                        <div :class="contentError ? 'has-error' : ''" @trix-change="if (contentError) contentError = document.getElementById('isi_pengumuman').value.replace(/<[^>]*>?/gm, '').trim() === ''">
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Isi Pengumuman <span class="text-red-500">*</span></label>
                            <input id="isi_pengumuman" type="hidden" name="isi_pengumuman" value="{{ old('isi_pengumuman', $announcement->isi_pengumuman ?? '') }}">
                            <div x-ignore>
                                <trix-editor input="isi_pengumuman" class="trix-isi_pengumuman prose max-w-none bg-gray-50 border border-gray-200 rounded-2xl p-4 transition-all focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 mt-3 shadow-sm text-gray-700" placeholder="Ketik isi pengumuman secara detail di sini..."></trix-editor>
                            </div>
                            <p x-show="contentError" class="mt-2 text-sm text-red-600 flex items-center" style="display: none;"><svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg> Isi pengumuman wajib diisi.</p>
                            <x-antarmuka.galat-sebaris name="isi_pengumuman" />
                        </div>

                        <!-- Target Penerima -->
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-3">Target Penerima <span class="text-red-500">*</span></label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                <label class="flex items-center p-3 border rounded-2xl cursor-pointer transition-all duration-200" :class="targetAudience === 'Semua' ? 'border-primary-500 bg-primary-50 shadow-sm ring-1 ring-primary-500' : (touched.targetAudience && targetAudience === '' ? 'border-red-300 bg-red-50/30' : 'border-gray-200 bg-white hover:bg-primary-50/50 hover:border-primary-300')">
                                    <input type="radio" name="target_audience" x-model="targetAudience" value="Semua" class="text-primary-600 accent-primary-600 focus:ring-primary-500 h-4 w-4">
                                    <span class="ml-3 text-sm font-medium transition-colors duration-200" :class="targetAudience === 'Semua' ? 'text-primary-800' : 'text-gray-700 group-hover:text-primary-700'">Semua Pengguna</span>
                                </label>
                                <label class="flex items-center p-3 border rounded-2xl cursor-pointer transition-all duration-200" :class="targetAudience === 'Orang Tua' ? 'border-primary-500 bg-primary-50 shadow-sm ring-1 ring-primary-500' : (touched.targetAudience && targetAudience === '' ? 'border-red-300 bg-red-50/30' : 'border-gray-200 bg-white hover:bg-primary-50/50 hover:border-primary-300')">
                                    <input type="radio" name="target_audience" x-model="targetAudience" value="Orang Tua" class="text-primary-600 accent-primary-600 focus:ring-primary-500 h-4 w-4">
                                    <span class="ml-3 text-sm font-medium transition-colors duration-200" :class="targetAudience === 'Orang Tua' ? 'text-primary-800' : 'text-gray-700 group-hover:text-primary-700'">Orang Tua/Wali Murid</span>
                                </label>
                                <label class="flex items-center p-3 border rounded-2xl cursor-pointer transition-all duration-200" :class="targetAudience === 'Tutor' ? 'border-primary-500 bg-primary-50 shadow-sm ring-1 ring-primary-500' : (touched.targetAudience && targetAudience === '' ? 'border-red-300 bg-red-50/30' : 'border-gray-200 bg-white hover:bg-primary-50/50 hover:border-primary-300')">
                                    <input type="radio" name="target_audience" x-model="targetAudience" value="Tutor" class="text-primary-600 accent-primary-600 focus:ring-primary-500 h-4 w-4">
                                    <span class="ml-3 text-sm font-medium transition-colors duration-200" :class="targetAudience === 'Tutor' ? 'text-primary-800' : 'text-gray-700 group-hover:text-primary-700'">Mentor</span>
                                </label>
                            </div>
                            <p x-show="touched.targetAudience && targetAudience === ''" class="mt-2 text-sm text-red-600 flex items-center" style="display: none;"><svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg> Target penerima wajib dipilih.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Pengaturan & Aksi -->
            <div class="space-y-5">
                <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
                    <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-200 pb-3">Status Publikasi</h3>

                    <div class="space-y-4">
                        <label class="flex items-start p-3 border border-gray-100 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer group">
                            <div class="flex items-center h-5 mt-0.5">
                                <input type="hidden" name="status_pengumuman" value="0">
                                <input type="checkbox" name="status_pengumuman" value="1" {{ old('status_pengumuman', $announcement->status_pengumuman ?? true) ? 'checked' : '' }} class="w-4 h-4 text-primary-600 bg-white border-gray-300 rounded focus:ring-primary-500 focus:ring-2 cursor-pointer">
                            </div>
                            <div class="ml-3 text-sm">
                                <span class="font-bold text-gray-700 group-hover:text-primary-700 transition-colors">Tayangkan Pengumuman</span>
                                <p class="text-gray-500 text-xs mt-0.5">Jika dimatikan, pengumuman akan disimpan sebagai draft.</p>
                            </div>
                        </label>

                        <label class="flex items-start p-3 border border-gray-100 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer group">
                            <div class="flex items-center h-5 mt-0.5">
                                <input type="hidden" name="diprioritaskan" value="0">
                                <input type="checkbox" name="diprioritaskan" value="1" {{ old('diprioritaskan', $announcement->diprioritaskan ?? false) ? 'checked' : '' }} class="w-4 h-4 text-amber-500 bg-white border-gray-300 rounded focus:ring-amber-500 focus:ring-2 cursor-pointer">
                            </div>
                            <div class="ml-3 text-sm">
                                <span class="font-bold text-gray-700 group-hover:text-amber-600 transition-colors">Sematkan (Pin)</span>
                                <p class="text-gray-500 text-xs mt-0.5">Berikan label sorotan visual dengan menempatkannya di posisi teratas dashboard penerima.</p>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex flex-col gap-4 mt-8">
                    <button type="submit" class="w-full flex items-center justify-center px-8 py-4 text-base font-extrabold text-white transition-all duration-100 bg-primary-600 rounded-2xl hover:bg-primary-700 shadow-lg shadow-primary-500/30 transform hover:-translate-y-1">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                        {{ isset($announcement) ? 'Simpan Perubahan' : 'Terbitkan Pengumuman' }}
                    </button>
                    <button type="button" @click="resetForm()" class="w-full flex items-center justify-center px-6 py-4 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-2xl hover:bg-red-50 hover:border-red-200 hover:text-red-600 shadow-sm transform hover:-translate-y-1">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        {{ isset($announcement) ? 'Reset Perubahan' : 'Bersihkan Data' }}
                    </button>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection

@push('scripts')
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
<script>
    document.addEventListener("trix-file-accept", function(event) {
        event.preventDefault();
        alert("Upload file/gambar dinonaktifkan untuk pengumuman saat ini.");
    });
</script>
@endpush
