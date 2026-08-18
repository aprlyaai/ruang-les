@extends('layouts.admin')

@section('title', isset($faq) ? 'Edit FAQ' : 'Tambah FAQ Baru')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('admin.settings.index') }}" class="hover:text-primary-600 transition-colors">Kelola Bimbel (CMS)</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('admin.faqs.index') }}" class="hover:text-primary-600 transition-colors">Tanya Jawab (FAQ)</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">@yield('title')</span>
@endsection

@section('content')
<div class="w-full space-y-4">

    <div class="mb-6">
        <x-admin.tajuk-halaman
            title="{{ isset($faq) ? 'Edit FAQ' : 'Tambah FAQ Baru' }}"
            backUrl="{{ route('admin.faqs.index') }}"
        />
    </div>

    <!-- Form -->
    <div>
        <form x-data="{
        pertanyaan: @js((string) old('pertanyaan', $faq->pertanyaan ?? '')),
        jawaban: @js((string) old('jawaban', $faq->jawaban ?? '')),
        touched: {},
        resetForm() {
            this.pertanyaan = @js((string) old('pertanyaan', $faq->pertanyaan ?? ''));
            this.jawaban = @js((string) old('jawaban', $faq->jawaban ?? ''));
            this.touched = {};

            setTimeout(() => {
                let isActive = document.querySelector('input[name=status_faq][type=checkbox]');
                if (isActive) isActive.checked = {{ old('status_faq', $faq->status_faq ?? true) ? 'true' : 'false' }};
            }, 10);
        },
        submitForm(e) {
            this.touched.pertanyaan = true;
            this.touched.jawaban = true;

            if (!this.pertanyaan || !this.jawaban) {
                e.preventDefault();
                setTimeout(() => {
                    const firstError = document.querySelector('.text-red-500');
                    if(firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }, 100);
            } else {
                localStorage.removeItem('faqs_form_{{ isset($faq) ? $faq->id : 'new' }}');
            }
        },
        init() {
            let cached = localStorage.getItem('faqs_form_{{ isset($faq) ? $faq->id : 'new' }}');
            if(cached && !this.pertanyaan && !this.jawaban) {
                let data = JSON.parse(cached);
                this.pertanyaan = data.pertanyaan;
                this.jawaban = data.jawaban;

                setTimeout(() => {
                    let isActive = document.querySelector('input[name=status_faq][type=checkbox]');
                    if (isActive && data.isActive !== undefined) isActive.checked = data.isActive;
                }, 10);
            }

            this.$watch('pertanyaan', val => this.saveToCache());
            this.$watch('jawaban', val => this.saveToCache());
        },
        saveToCache() {
            let isActive = document.querySelector('input[name=status_faq][type=checkbox]');
            localStorage.setItem('faqs_form_{{ isset($faq) ? $faq->id : 'new' }}', JSON.stringify({
                pertanyaan: this.pertanyaan,
                jawaban: this.jawaban,
                isActive: isActive ? isActive.checked : true,
            }));
        }
        }" @submit="submitForm" action="{{ isset($faq) ? route('admin.faqs.update', $faq->id) : route('admin.faqs.store') }}" method="POST" novalidate>
            @csrf
            @if(isset($faq))
                @method('PUT')
            @endif

            <input type="hidden" name="urutan" value="{{ old('urutan', $faq->urutan ?? 0) }}">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">

                <!-- Kolom Kiri -->
                <div class="lg:col-span-2 space-y-5">
                    <!-- Section 1: Informasi Dasar -->
                    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
                        <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-200 pb-3">Informasi FAQ</h3>

                        <div class="space-y-4">
                            <x-admin.input-formulir
                                name="pertanyaan"
                                label="Pertanyaan"
                                model="pertanyaan"
                                placeholder="Contoh: Apakah bisa belajar di rumah?"
                                :required="true"
                            />

                            <x-admin.area-teks-formulir
                                name="jawaban"
                                label="Jawaban"
                                model="jawaban"
                                placeholder="Jelaskan jawaban secara detail dan persuasif..."
                                :required="true"
                                :rows="5"
                            />
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="space-y-5">
                    <!-- Section 2: Pengaturan Tampilan -->
                    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
                        <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-200 pb-3">Status Publikasi</h3>
                        <div class="space-y-4">
                            <label class="flex items-start p-3 border border-gray-100 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer group">
                                <div class="flex items-center h-5 mt-0.5">
                                    <input type="hidden" name="status_faq" value="0">
                                    <input type="checkbox" name="status_faq" value="1" {{ old('status_faq', $faq->status_faq ?? true) ? 'checked' : '' }} @change="saveToCache()" class="w-4 h-4 text-primary-600 bg-white border-gray-300 rounded focus:ring-primary-500 focus:ring-2 cursor-pointer">
                                </div>
                                <div class="ml-3 text-sm">
                                    <span class="font-bold text-gray-700 group-hover:text-primary-700 transition-colors">FAQ Aktif</span>
                                    <p class="text-gray-500 text-xs mt-0.5">Jika dimatikan, FAQ ini tidak akan muncul di halaman publik.</p>
                                </div>
                            </label>
                            <x-antarmuka.galat-sebaris name="status_faq" />
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex flex-col gap-4 mt-8">
                        <button type="submit" class="w-full flex items-center justify-center px-8 py-4 text-base font-extrabold text-white transition-all duration-100 bg-primary-600 rounded-2xl hover:bg-primary-700 shadow-lg shadow-primary-500/30 transform hover:-translate-y-1">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                            {{ isset($faq) ? 'Simpan Perubahan FAQ' : 'Simpan FAQ Baru' }}
                        </button>
                        <button type="button" @click="resetForm()" class="w-full flex items-center justify-center px-6 py-4 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-2xl hover:bg-red-50 hover:border-red-200 hover:text-red-600 shadow-sm transform hover:-translate-y-1">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            Bersihkan Data
                        </button>
                    </div>
                </div>

            </div>
        </form>
    </div>

</div>
@endsection