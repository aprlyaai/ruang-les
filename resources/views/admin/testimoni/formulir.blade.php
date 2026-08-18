@extends('layouts.admin')

@section('title', isset($testimonial) ? 'Edit Testimoni' : 'Tambah Testimoni Baru')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('admin.settings.index') }}" class="hover:text-primary-600 transition-colors">Kelola Bimbel (CMS)</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('admin.testimonials.index') }}" class="hover:text-primary-600 transition-colors">Testimoni</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">@yield('title')</span>
@endsection

@section('content')
<div class="w-full space-y-4">

    <div class="mb-6">
        <x-admin.tajuk-halaman
            title="{{ isset($testimonial) ? 'Edit Testimoni' : 'Tambah Testimoni Baru' }}"
            backUrl="{{ route('admin.testimonials.index') }}"
        />
    </div>

    <!-- Form -->
    <div>
        <form x-data="{
        name: @js((string) old('nama_pemberi', $testimonial->nama_pemberi ?? request()->query('nama_pemberi', ''))),
        role: @js((string) old('peran_pemberi', $testimonial->peran_pemberi ?? request()->query('peran_pemberi', ''))),
        content: @js((string) old('testimoni', $testimonial->testimoni ?? request()->query('testimoni', ''))),
        rating: {{ old('rating', $testimonial->rating ?? 5) }},
        touched: {},
        hoverRating: 0,
        resetForm() {
            this.name = @js((string) old('nama_pemberi', $testimonial->nama_pemberi ?? ''));
            this.role = @js((string) old('peran_pemberi', $testimonial->peran_pemberi ?? ''));
            this.content = @js((string) old('testimoni', $testimonial->testimoni ?? ''));
            this.rating = {{ old('rating', $testimonial->rating ?? 5) }};
            this.touched = {};

            setTimeout(() => {
                let isActive = document.querySelector('input[name=status_testimoni][type=checkbox]');
                if (isActive) isActive.checked = {{ old('status_testimoni', $testimonial->status_testimoni ?? true) ? 'true' : 'false' }};
            }, 10);
        },
        submitForm(e) {
            this.touched.name = true;
            this.touched.role = true;
            this.touched.content = true;

            if (!this.name || !this.role || !this.content) {
                e.preventDefault();
                setTimeout(() => {
                    const firstError = document.querySelector('.text-red-500');
                    if(firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }, 100);
            } else {
                localStorage.removeItem('testimonials_form_{{ isset($testimonial) ? $testimonial->id : 'new' }}');
            }
        },
        init() {
            let cached = localStorage.getItem('testimonials_form_{{ isset($testimonial) ? $testimonial->id : 'new' }}');
            if(cached && !this.name && !this.role && !this.content) {
                let data = JSON.parse(cached);
                this.name = data.name;
                this.role = data.role;
                this.content = data.content;
                this.rating = data.rating;

                setTimeout(() => {
                    let isActive = document.querySelector('input[name=status_testimoni][type=checkbox]');
                    if (isActive && data.isActive !== undefined) isActive.checked = data.isActive;
                }, 10);
            }

            this.$watch('name', val => this.saveToCache());
            this.$watch('role', val => this.saveToCache());
            this.$watch('content', val => this.saveToCache());
            this.$watch('rating', val => this.saveToCache());
        },
        saveToCache() {
            let isActive = document.querySelector('input[name=status_testimoni][type=checkbox]');
            localStorage.setItem('testimonials_form_{{ isset($testimonial) ? $testimonial->id : 'new' }}', JSON.stringify({
                name: this.name,
                role: this.role,
                content: this.content,
                rating: this.rating,
                isActive: isActive ? isActive.checked : true,
            }));
        }
        }" @submit="submitForm" action="{{ isset($testimonial) ? route('admin.testimonials.update', $testimonial->id) : route('admin.testimonials.store') }}" method="POST" novalidate>
            @csrf
            @if(isset($testimonial))
                @method('PUT')
            @endif

            <input type="hidden" name="urutan" value="{{ old('urutan', $testimonial->urutan ?? 0) }}">
            <!-- Hidden input for rating since we use Alpine UI -->
            <input type="hidden" name="rating" :value="rating">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">

                <!-- Kolom Kiri -->
                <div class="lg:col-span-2 space-y-5">
                    <!-- Section 1: Informasi Dasar -->
                    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
                        <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-200 pb-3">Profil Pemberi Ulasan</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <x-admin.input-formulir
                                name="nama_pemberi"
                                label="Nama Lengkap"
                                model="name"
                                placeholder="Masukkan nama lengkap pemberi ulasan"
                                :required="true"
                            />

                            <x-admin.input-formulir
                                name="peran_pemberi"
                                label="Status Hubungan"
                                model="role"
                                placeholder="Contoh: Orang Tua Murid Kelas 1"
                                :required="true"
                            />
                        </div>

                        <div class="space-y-4">
                            <x-admin.area-teks-formulir
                                name="testimoni"
                                label="Isi Testimoni"
                                model="content"
                                placeholder="Tuliskan pengalaman atau pujian mereka di sini..."
                                :required="true"
                                :rows="4"
                            />

                            <!-- Rating Stars -->
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Rating Kepuasan</label>
                                <div class="flex items-center space-x-1" @mouseleave="hoverRating = 0">
                                    <template x-for="i in 5" :key="i">
                                        <button type="button" @click="rating = i" @mouseenter="hoverRating = i" class="focus:outline-none p-1 transition-transform transform hover:scale-110">
                                            <svg class="w-8 h-8 transition-colors duration-200" :class="(hoverRating >= i || (!hoverRating && rating >= i)) ? 'text-yellow-400 fill-current' : 'text-gray-300 fill-current'" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        </button>
                                    </template>
                                </div>
                                <x-antarmuka.galat-sebaris name="rating" />
                                <p class="mt-2 text-xs text-gray-500">Pilih jumlah bintang untuk testimoni ini.</p>
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
                                    <input type="hidden" name="status_testimoni" value="0">
                                    <input type="checkbox" name="status_testimoni" value="1" {{ old('status_testimoni', $testimonial->status_testimoni ?? true) ? 'checked' : '' }} @change="saveToCache()" class="w-4 h-4 text-primary-600 bg-white border-gray-300 rounded focus:ring-primary-500 focus:ring-2 cursor-pointer">
                                </div>
                                <div class="ml-3 text-sm">
                                    <span class="font-bold text-gray-700 group-hover:text-primary-700 transition-colors">Testimoni Aktif</span>
                                    <p class="text-gray-500 text-xs mt-0.5">Jika dimatikan, testimoni tidak akan muncul di halaman publik.</p>
                                </div>
                            </label>
                            <x-antarmuka.galat-sebaris name="status_testimoni" />
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex flex-col gap-4 mt-8">
                        <button type="submit" class="w-full flex items-center justify-center px-8 py-4 text-base font-extrabold text-white transition-all duration-100 bg-primary-600 rounded-2xl hover:bg-primary-700 shadow-lg shadow-primary-500/30 transform hover:-translate-y-1">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                            {{ isset($testimonial) ? 'Simpan Perubahan' : 'Simpan Testimoni Baru' }}
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
