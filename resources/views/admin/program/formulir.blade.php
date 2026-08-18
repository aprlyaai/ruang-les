@extends('layouts.admin')

@section('title', isset($package) ? 'Edit Paket' : 'Tambah Paket')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('admin.packages.index') }}" class="hover:text-primary-600 transition-colors">Program Belajar</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">@yield('title')</span>
@endsection

@section('content')
<div class="w-full space-y-4">

    <x-admin.tajuk-halaman
        title="{{ isset($package) ? 'Edit Paket Belajar' : 'Tambah Paket Baru' }}"
        backUrl="{{ route('admin.packages.index') }}"
    />

    <!-- Form -->
    <div>
        <form x-data="{
        tipe_program: @js((string) old('tipe_program', $package->tipe_program ?? '')),
        packageName: @js((string) old('nama_program', $package->nama_program ?? '')),
        gradeLevel: @js((string) old('kelas_program', $package->kelas_program ?? '')),
        maxStudents: @js((string) old('max_murid', $package->max_murid ?? '')),
        location: @js((string) old('lokasi_belajar', $package->lokasi_belajar ?? '')),
        harga: @js((string) old('harga', isset($package->harga) ? (int)$package->harga : '')),
        meetingCount: @js((string) old('pertemuan', $package->pertemuan ?? '')),
        durationMins: @js((string) old('durasi_belajar', $package->durasi_belajar ?? '')),
        touched: {},
        resetForm() {
            this.tipe_program = @js((string) old('tipe_program', $package->tipe_program ?? ''));
            this.packageName = @js((string) old('nama_program', $package->nama_program ?? ''));
            this.gradeLevel = @js((string) old('kelas_program', $package->kelas_program ?? ''));
            this.maxStudents = '{{ old('max_murid', $package->max_murid ?? '') }}';
            this.location = @js((string) old('lokasi_belajar', $package->lokasi_belajar ?? ''));
            this.harga = '{{ old('harga', isset($package->harga) ? (int)$package->harga : '') }}';
            this.meetingCount = '{{ old('pertemuan', $package->pertemuan ?? '') }}';
            this.durationMins = '{{ old('durasi_belajar', $package->durasi_belajar ?? '') }}';
            this.touched = {};

            setTimeout(() => {
                let desc = document.querySelector('textarea[name=deskripsi_program]');
                if (desc) desc.value = @js((string) old('deskripsi_program', $package->deskripsi_program ?? ''));

                let isActive = document.querySelector('input[name=status_program]');
                if (isActive) isActive.checked = {{ old('status_program', $package->status_program ?? true) ? 'true' : 'false' }};

                let isRec = document.querySelector('input[name=direkomendasikan]');
                if (isRec) isRec.checked = {{ old('direkomendasikan', $package->direkomendasikan ?? false) ? 'true' : 'false' }};
            }, 10);
        },
        submitForm(e) {
            this.touched.tipe_program = true;
            this.touched.packageName = true;
            this.touched.gradeLevel = true;
            this.touched.maxStudents = true;
            this.touched.location = true;
            this.touched.harga = true;
            this.touched.meetingCount = true;
            this.touched.durationMins = true;

            let isValid = true;
            if (this.tipe_program === '') isValid = false;
            if (String(this.packageName).trim() === '') isValid = false;
            if (String(this.gradeLevel).trim() === '') isValid = false;
            if (this.maxStudents === '' || this.maxStudents < 1) isValid = false;
            if (String(this.location).trim() === '') isValid = false;
            if (this.harga === '' || this.harga === null || this.harga < 0) isValid = false;
            if (this.meetingCount === '' || this.meetingCount < 1) isValid = false;
            if (this.durationMins === '' || this.durationMins < 1) isValid = false;

            if (!isValid) {
                e.preventDefault();
            }
        }
    }" @submit="submitForm" novalidate action="{{ isset($package) ? route('admin.packages.update', $package->id) : route('admin.packages.store') }}" method="POST">
            @csrf
            @if(isset($package))
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
                <!-- Kolom Utama (Kiri) -->
                <div class="lg:col-span-2 space-y-5">
                    <!-- Card: Informasi Dasar -->
                    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
                        <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-200 pb-3">Informasi Dasar</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Kategori Paket <span class="text-red-500">*</span></label>
                                <select name="tipe_program" x-model="tipe_program" @blur="touched.tipe_program = true" :class="touched.tipe_program && tipe_program === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer" required>
                                    <option value="" disabled {{ !isset($package) && !old('tipe_program') ? 'selected' : '' }}>Pilih Kategori</option>
                                    <option value="Privat" {{ old('tipe_program', $package->tipe_program ?? '') == 'Privat' ? 'selected' : '' }}>Privat</option>
                                    <option value="Semi Privat" {{ old('tipe_program', $package->tipe_program ?? '') == 'Semi Privat' ? 'selected' : '' }}>Semi Privat</option>
                                    <option value="Reguler" {{ old('tipe_program', $package->tipe_program ?? '') == 'Reguler' ? 'selected' : '' }}>Reguler</option>
                                </select>
                                <p x-show="touched.tipe_program && tipe_program === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Kategori paket wajib dipilih.
                                </p>
                                <x-antarmuka.galat-sebaris name="tipe_program" />
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Nama Paket <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_program" x-model="packageName" @blur="touched.packageName = true" :class="touched.packageName && packageName.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" placeholder="Contoh: Ruang Privat" required>
                                <p x-show="touched.packageName && packageName.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Nama paket wajib diisi.
                                </p>
                                <x-antarmuka.galat-sebaris name="nama_program" />
                            </div>

                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Deskripsi</label>
                                <textarea name="deskripsi_program" rows="3" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800" placeholder="Masukkan penjelasan singkat mengenai fasilitas atau detail paket di sini...">{{ old('deskripsi_program', $package->deskripsi_program ?? '') }}</textarea>
                                <x-antarmuka.galat-sebaris name="deskripsi_program" />
                            </div>
                        </div>
                    </div>

                    <!-- Card: Spesifikasi Kelas -->
                    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
                        <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-200 pb-3">Spesifikasi Kelas</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Tingkat Kelas <span class="text-red-500">*</span></label>
                                <input type="text" name="kelas_program" x-model="gradeLevel" @blur="touched.gradeLevel = true" :class="touched.gradeLevel && gradeLevel.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" placeholder="Contoh: Kelas 1-6 SD" required>
                                <p x-show="touched.gradeLevel && gradeLevel.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Tingkat kelas wajib diisi.
                                </p>
                                <x-antarmuka.galat-sebaris name="kelas_program" />
                            </div>

                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Maksimal Murid per Kelas <span class="text-red-500">*</span></label>
                                <input type="number" name="max_murid" x-model="maxStudents" @blur="touched.maxStudents = true" :class="touched.maxStudents && (maxStudents === '' || maxStudents < 1) ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" min="1" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" placeholder="Masukkan jumlah murid" required>
                                <p x-show="touched.maxStudents && (maxStudents === '' || maxStudents < 1)" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Maksimal murid tidak valid.
                                </p>
                                <x-antarmuka.galat-sebaris name="max_murid" />
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Lokasi Belajar <span class="text-red-500">*</span></label>
                                <input type="text" name="lokasi_belajar" x-model="location" @blur="touched.location = true" :class="touched.location && location.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" placeholder="Contoh: Ruang Les" required>
                                <p x-show="touched.location && location.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Lokasi belajar wajib diisi.
                                </p>
                                <x-antarmuka.galat-sebaris name="lokasi_belajar" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Samping (Kanan) -->
                <div class="space-y-5">
                    <!-- Card: Harga & Sesi -->
                    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
                        <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-200 pb-3">Harga & Sesi</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Harga Paket (Rp) <span class="text-red-500">*</span></label>
                                <input type="number" name="harga" x-model="harga" @blur="touched.harga = true" :class="touched.harga && (harga === '' || harga === null || harga < 0) ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" min="0" step="1000" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" placeholder="Contoh: 500000" required>
                                <p x-show="touched.harga && (harga === '' || harga === null || harga < 0)" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Harga paket tidak valid.
                                </p>
                                <x-antarmuka.galat-sebaris name="harga" />
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-gray-600 font-semibold mb-2">Sesi <span class="text-red-500">*</span></label>
                                    <input type="number" name="pertemuan" x-model="meetingCount" @blur="touched.meetingCount = true" :class="touched.meetingCount && (meetingCount === '' || meetingCount < 1) ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" min="1" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" placeholder="Contoh: 8" required>
                                    <p x-show="touched.meetingCount && (meetingCount === '' || meetingCount < 1)" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        Sesi tidak valid.
                                    </p>
                                    <x-antarmuka.galat-sebaris name="pertemuan" />
                                </div>

                                <div>
                                    <label class="block text-sm text-gray-600 font-semibold mb-2">Durasi (Menit) <span class="text-red-500">*</span></label>
                                    <input type="number" name="durasi_belajar" x-model="durationMins" @blur="touched.durationMins = true" :class="touched.durationMins && (durationMins === '' || durationMins < 1) ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" min="1" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" placeholder="Contoh: 60" required>
                                    <p x-show="touched.durationMins && (durationMins === '' || durationMins < 1)" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        Durasi tidak valid.
                                    </p>
                                    <x-antarmuka.galat-sebaris name="durasi_belajar" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Pengaturan Tampilan -->
                    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
                        <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-200 pb-3">Status Publikasi</h3>
                        <div class="space-y-4">

                            <label class="flex items-start p-3 border border-gray-100 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer group">
                                <div class="flex items-center h-5 mt-0.5">
                                    <input type="checkbox" name="status_program" value="1" {{ old('status_program', $package->status_program ?? true) ? 'checked' : '' }} class="w-4 h-4 text-primary-600 bg-white border-gray-300 rounded focus:ring-primary-500 focus:ring-2 cursor-pointer">
                                </div>
                                <div class="ml-3 text-sm">
                                    <span class="font-bold text-gray-700 group-hover:text-primary-700 transition-colors">Paket Aktif</span>
                                    <p class="text-gray-500 text-xs mt-0.5">Jika dimatikan, paket tidak akan muncul di form pendaftaran murid baru.</p>
                                </div>
                            </label>

                            <label class="flex items-start p-3 border border-gray-100 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer group">
                                <div class="flex items-center h-5 mt-0.5">
                                    <input type="checkbox" name="direkomendasikan" value="1" {{ old('direkomendasikan', $package->direkomendasikan ?? false) ? 'checked' : '' }} class="w-4 h-4 text-amber-500 bg-white border-gray-300 rounded focus:ring-amber-500 focus:ring-2 cursor-pointer">
                                </div>
                                <div class="ml-3 text-sm">
                                    <span class="font-bold text-gray-700 group-hover:text-amber-600 transition-colors">Jadikan Rekomendasi</span>
                                    <p class="text-gray-500 text-xs mt-0.5">Berikan label sorotan visual di katalog harga untuk memikat pendaftar.</p>
                                </div>
                            </label>

                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex flex-col gap-4 mt-8">
                        <button type="submit" class="w-full flex items-center justify-center px-8 py-4 text-base font-extrabold text-white transition-all duration-100 bg-primary-600 rounded-2xl hover:bg-primary-700 shadow-lg shadow-primary-500/30 transform hover:-translate-y-1">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                            {{ isset($package) ? 'Simpan Perubahan Paket Belajar' : 'Simpan Paket Belajar Baru' }}
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
