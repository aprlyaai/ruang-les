@extends('layouts.admin')

@section('title', isset($schedule) ? 'Edit Jadwal' : 'Tambah Jadwal')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('admin.class-schedules.index') }}" class="hover:text-primary-600 transition-colors">Jadwal Kelas</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">@yield('title')</span>
@endsection

@section('content')
<div class="w-full space-y-6">

    <div class="mb-6">
        <x-admin.tajuk-halaman
            title="{{ isset($schedule) ? 'Edit Data Jadwal' : 'Tambah Jadwal Kelas' }}"
            backUrl="{{ route('admin.class-schedules.index') }}"
        />
    </div>

    <!-- Form -->
    <form x-data="{
        className: @js((string) old('nama_kelas', $schedule->nama_kelas ?? '')),
        mentor: @js((string) old('mentor_id', $schedule->mentor_id ?? '')),
        package: @js((string) old('program_id', $schedule->program_id ?? '')),
        day: @js((string) old('hari', $schedule->hari ?? '')),
        session: @js((string) old('waktu_belajar', $schedule->waktu_belajar ?? '')),
        touched: {},
        packageCapacities: {
            @foreach($packages as $p)
            '{{ $p->program_id }}': '{{ $p->max_murid }}',
            @endforeach
        },
        get currentCapacity() {
            if (this.package && this.packageCapacities[this.package]) {
                return this.packageCapacities[this.package] + ' Murid';
            }
            return 'Otomatis terisi setelah memilih paket';
        },
        resetForm() {
            this.className = @js((string) old('nama_kelas', $schedule->nama_kelas ?? ''));
            this.mentor = @js((string) old('mentor_id', $schedule->mentor_id ?? ''));
            this.package = @js((string) old('program_id', $schedule->program_id ?? ''));
            this.day = @js((string) old('hari', $schedule->hari ?? ''));
            this.session = @js((string) old('waktu_belajar', $schedule->waktu_belajar ?? ''));
            this.touched = {};

            setTimeout(() => {
                let statusAktif = document.querySelector('input[name=status_aktif]');
                if (statusAktif) statusAktif.checked = {{ old('status_aktif', isset($schedule) ? ($schedule->status_jadwal == 'active') : true) ? 'true' : 'false' }};
            }, 10);
        },
        submitForm(e) {
            this.touched.className = true;
            this.touched.mentor = true;
            this.touched.package = true;
            this.touched.day = true;
            this.touched.session = true;

            let isValid = true;
            if (String(this.className).trim() === '') isValid = false;
            if (this.mentor === '') isValid = false;
            if (this.package === '') isValid = false;
            if (this.day === '') isValid = false;
            if (this.session === '') isValid = false;

            if (!isValid) {
                e.preventDefault();
            }
        }
    }" @submit="submitForm" novalidate action="{{ isset($schedule) ? route('admin.class-schedules.update', $schedule->jadwal_id) : route('admin.class-schedules.store') }}" method="POST">
        @csrf
        @if(isset($schedule))
            @method('PUT')
        @endif

        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Kolom Kiri: Informasi Dasar -->
            <div class="w-full lg:w-2/3 space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
                    <h3 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Informasi Jadwal Kelas</h3>

                    <div class="space-y-6">
                        <!-- Baris 1: Paket & Kapasitas -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Program -->
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Paket Program Belajar <span class="text-red-500">*</span></label>
                                <select name="program_id" x-model="package" @change="touched.package = true" :class="touched.package && package === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer">
                                    <option value="" disabled {{ old('program_id', $schedule->program_id ?? '') == '' ? 'selected' : '' }}>Pilih Paket Program</option>
                                    @foreach($packages as $packageItem)
                                        <option value="{{ $packageItem->program_id }}" {{ old('program_id', $schedule->program_id ?? '') == $packageItem->program_id ? 'selected' : '' }}>
                                            {{ $packageItem->nama_program }} - {{ $packageItem->kelas_program }} ({{ $packageItem->lokasi_belajar }})
                                        </option>
                                    @endforeach
                                </select>
                                <p x-show="touched.package && package === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Paket wajib dipilih.
                                </p>
                                <x-antarmuka.galat-sebaris name="program_id" />
                            </div>

                            <!-- Kapasitas (Otomatis) -->
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Kapasitas</label>
                                <input type="text" :value="currentCapacity" readonly tabindex="-1" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-100 shadow-inner focus:outline-none transition-colors duration-100 text-sm font-medium text-gray-500 cursor-not-allowed">
                            </div>
                        </div>

                        <!-- Baris 2: Nama Kelas & Mentor -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama Kelas -->
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Kode dan Nama Kelas <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_kelas" x-model="className" @blur="touched.className = true" :class="touched.className && className.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" placeholder="Contoh: Ruang P.123" required>
                                <p x-show="touched.className && className.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Wajib diisi dengan nama atau kode kelas.
                                </p>
                                <x-antarmuka.galat-sebaris name="nama_kelas" />
                            </div>

                            <!-- Mentor -->
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Mentor <span class="text-red-500">*</span></label>
                                <select name="mentor_id" x-model="mentor" @change="touched.mentor = true" :class="touched.mentor && mentor === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer">
                                    <option value="" disabled {{ old('mentor_id', $schedule->mentor_id ?? '') == '' ? 'selected' : '' }}>Pilih Mentor</option>
                                    @foreach($mentors as $mentorItem)
                                        <option value="{{ $mentorItem->mentor_id }}" {{ old('mentor_id', $schedule->mentor_id ?? '') == $mentorItem->mentor_id ? 'selected' : '' }}>
                                            {{ $mentorItem->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <p x-show="touched.mentor && mentor === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Mentor wajib dipilih.
                                </p>
                                <x-antarmuka.galat-sebaris name="mentor_id" />
                            </div>
                        </div>

                        <!-- Baris 3: Hari & Sesi -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Hari -->
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Hari Belajar <span class="text-red-500">*</span></label>
                                <select name="hari" x-model="day" @change="touched.day = true" :class="touched.day && day === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer">
                                    <option value="" disabled {{ old('hari', $schedule->hari ?? '') == '' ? 'selected' : '' }}>Pilih Hari</option>
                                    @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
                                        <option value="{{ $hari }}" {{ old('hari', $schedule->hari ?? '') == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                                    @endforeach
                                </select>
                                <p x-show="touched.day && day === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Hari wajib dipilih.
                                </p>
                                <x-antarmuka.galat-sebaris name="hari" />
                            </div>

                            <!-- Sesi Jam -->
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Waktu Belajar <span class="text-red-500">*</span></label>
                                <select name="waktu_belajar" x-model="session" @change="touched.session = true" :class="touched.session && session === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer">
                                    <option value="" disabled {{ old('waktu_belajar', $schedule->waktu_belajar ?? '') == '' ? 'selected' : '' }}>Pilih Sesi</option>
                                    @php
                                        $sessions = [
                                            '15:00' => 'Sesi 1: 15:00 - 16:00 (WIB)',
                                            '16:00' => 'Sesi 2: 16:00 - 17:00 (WIB)',
                                            '17:00' => 'Sesi 3: 17:00 - 18:00 (WIB)',
                                            '18:00' => 'Sesi 4: 18:00 - 19:00 (WIB)',
                                            '19:00' => 'Sesi 5: 19:00 - 20:00 (WIB)',
                                            '20:00' => 'Sesi 6: 20:00 - 21:00 (WIB)',
                                        ];
                                    @endphp
                                    @foreach($sessions as $val => $label)
                                        <option value="{{ $val }}" {{ old('waktu_belajar', $schedule->waktu_belajar ?? '') == $val ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                <p x-show="touched.session && session === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Waktu belajar wajib dipilih.
                                </p>
                                <x-antarmuka.galat-sebaris name="waktu_belajar" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Status & Aksi -->
            <div class="w-full lg:w-1/3 space-y-6">
                <!-- Status Jadwal -->
                <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
                    <h3 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Status Jadwal</h3>

                    <div class="flex items-start p-3 border border-gray-100 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer group" onclick="document.getElementById('status_aktif').click()">
                        <div class="flex items-center h-5 mt-0.5">
                            <input type="checkbox" id="status_aktif" name="status_aktif" value="1" {{ old('status_aktif', isset($schedule) ? ($schedule->status_jadwal == 'active') : true) ? 'checked' : '' }} class="w-5 h-5 text-primary-600 bg-white border-gray-300 rounded focus:ring-primary-500 cursor-pointer">
                        </div>
                        <div class="ml-3 text-sm">
                            <span class="text-sm font-bold text-gray-700 group-hover:text-primary-700 transition-colors">Kelas Aktif</span>
                            <p class="text-xs text-gray-500 mt-1 leading-relaxed">Hentikan jadwal ini jika kelas sudah selesai, libur, atau ditutup. Kelas akan berstatus Nonaktif.</p>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex flex-col gap-3">
                    <button type="submit" class="w-full flex items-center justify-center px-6 py-3.5 text-sm font-extrabold text-white transition-all duration-100 bg-primary-600 rounded-xl hover:bg-primary-700 shadow-lg shadow-primary-500/30 transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                        {{ isset($schedule) ? 'Simpan Perubahan Jadwal' : 'Simpan Jadwal Baru' }}
                    </button>
                    <button type="button" @click="resetForm()" class="w-full flex items-center justify-center px-6 py-3.5 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-xl hover:bg-red-50 hover:border-red-200 hover:text-red-600 shadow-sm transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Bersihkan Data
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
