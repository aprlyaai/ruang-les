@extends('layouts.admin')

@section('title', isset($feature) ? 'Edit Fitur Unggulan' : 'Tambah Fitur Baru')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('admin.settings.index') }}" class="hover:text-primary-600 transition-colors">Kelola Bimbel (CMS)</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('admin.features.index') }}" class="hover:text-primary-600 transition-colors">Fitur</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">@yield('title')</span>
@endsection

@section('content')
<div class="w-full space-y-4">

    <div class="mb-6">
        <x-admin.tajuk-halaman
            title="{{ isset($feature) ? 'Edit Fitur Unggulan' : 'Tambah Fitur Baru' }}"
            backUrl="{{ route('admin.features.index') }}"
        />
    </div>

    <!-- Form -->
    <div>
        <form x-data="{
        nama_keunggulan: @js((string) old('nama_keunggulan', $feature->nama_keunggulan ?? '')),
        deskripsi_keunggulan: @js((string) old('deskripsi_keunggulan', $feature->deskripsi_keunggulan ?? '')),
        touched: {},
        resetForm() {
            this.nama_keunggulan = @js((string) old('nama_keunggulan', $feature->nama_keunggulan ?? ''));
            this.deskripsi_keunggulan = @js((string) old('deskripsi_keunggulan', $feature->deskripsi_keunggulan ?? ''));
            this.touched = {};

            setTimeout(() => {
                let isActive = document.querySelector('input[name=status_keunggulan][type=checkbox]');
                if (isActive) isActive.checked = {{ old('status_keunggulan', $feature->status_keunggulan ?? true) ? 'true' : 'false' }};
            }, 10);
        },
        submitForm(e) {
            this.touched.nama_keunggulan = true;
            this.touched.deskripsi_keunggulan = true;

            if (!this.nama_keunggulan || !this.deskripsi_keunggulan) {
                e.preventDefault();
                setTimeout(() => {
                    const firstError = document.querySelector('.text-red-500');
                    if(firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }, 100);
            } else {
                localStorage.removeItem('features_form_{{ isset($feature) ? $feature->id : 'new' }}');
            }
        },
        init() {
            let cached = localStorage.getItem('features_form_{{ isset($feature) ? $feature->id : 'new' }}');
            if(cached && !this.nama_keunggulan && !this.deskripsi_keunggulan) {
                let data = JSON.parse(cached);
                this.nama_keunggulan = data.nama_keunggulan;
                this.deskripsi_keunggulan = data.deskripsi_keunggulan;

                setTimeout(() => {
                    let isActive = document.querySelector('input[name=status_keunggulan][type=checkbox]');
                    if (isActive && data.isActive !== undefined) isActive.checked = data.isActive;
                }, 10);
            }

            this.$watch('nama_keunggulan', val => this.saveToCache());
            this.$watch('deskripsi_keunggulan', val => this.saveToCache());
        },
        saveToCache() {
            let isActive = document.querySelector('input[name=status_keunggulan][type=checkbox]');
            localStorage.setItem('features_form_{{ isset($feature) ? $feature->id : 'new' }}', JSON.stringify({
                nama_keunggulan: this.nama_keunggulan,
                deskripsi_keunggulan: this.deskripsi_keunggulan,
                isActive: isActive ? isActive.checked : true,
            }));
        }
        }" @submit="submitForm" action="{{ isset($feature) ? route('admin.features.update', $feature->id) : route('admin.features.store') }}" method="POST" novalidate>
            @csrf
            @if(isset($feature))
                @method('PUT')
            @endif

            <input type="hidden" name="urutan" value="{{ old('urutan', $feature->urutan ?? 0) }}">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">

                <!-- Kolom Kiri -->
                <div class="lg:col-span-2 space-y-5">
                    <!-- Section 1: Informasi Dasar -->
                    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
                        <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-200 pb-3">Informasi Dasar</h3>

                        <div class="space-y-4">
                            <x-admin.input-formulir
                                name="nama_keunggulan"
                                label="Judul Fitur"
                                model="nama_keunggulan"
                                placeholder="Contoh: Pendampingan Personal & Hangat"
                                :required="true"
                            />

                            <div>
                                <x-admin.area-teks-formulir
                                    name="deskripsi_keunggulan"
                                    label="Deskripsi"
                                    model="deskripsi_keunggulan"
                                    placeholder="Jelaskan secara singkat tentang fitur ini..."
                                    :required="true"
                                    :rows="3"
                                />
                            </div>
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
                                    <input type="hidden" name="status_keunggulan" value="0">
                                    <input type="checkbox" name="status_keunggulan" value="1" {{ old('status_keunggulan', $feature->status_keunggulan ?? true) ? 'checked' : '' }} @change="saveToCache()" class="w-4 h-4 text-primary-600 bg-white border-gray-300 rounded focus:ring-primary-500 focus:ring-2 cursor-pointer">
                                </div>
                                <div class="ml-3 text-sm">
                                    <span class="font-bold text-gray-700 group-hover:text-primary-700 transition-colors">Fitur Aktif</span>
                                    <p class="text-gray-500 text-xs mt-0.5">Jika dimatikan, fitur tidak akan muncul di halaman publik.</p>
                                </div>
                            </label>
                            <x-antarmuka.galat-sebaris name="status_keunggulan" />
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex flex-col gap-4 mt-8">
                        <button type="submit" class="w-full flex items-center justify-center px-8 py-4 text-base font-extrabold text-white transition-all duration-100 bg-primary-600 rounded-2xl hover:bg-primary-700 shadow-lg shadow-primary-500/30 transform hover:-translate-y-1">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                            {{ isset($feature) ? 'Simpan Perubahan Fitur' : 'Simpan Fitur Baru' }}
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
