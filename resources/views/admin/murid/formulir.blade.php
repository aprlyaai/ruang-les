@extends('layouts.admin')

@section('title', isset($student) ? 'Edit Murid' : 'Tambah Murid Baru')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('admin.students.index') }}" class="hover:text-primary-600 transition-colors">Data Murid</a>
    @if(isset($student) && request('from') == 'detail')
        <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        <a href="{{ route('admin.students.show', $student->id) }}" class="hover:text-primary-600 transition-colors">Profil Murid</a>
    @endif
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">@yield('title')</span>
@endsection

@section('content')
<div class="w-full space-y-6" x-data="{
    touched: {},
    parentId: @js((string) old('orangtua_id', $student->orangtua_id ?? '')),
    fullName: @js((string) old('nama_murid', $student->nama_murid ?? '')),
    panggilan_murid: @js((string) old('panggilan_murid', $student->panggilan_murid ?? '')),
    agama: @js((string) old('agama', $student->agama ?? '')),
    birthPlace: @js((string) old('tempat_lahir_murid', $student->tempat_lahir_murid ?? '')),
    birthDate: @js((string) old('tanggal_lahir_murid', $student->tanggal_lahir_murid ?? '')),
    jenis_kelamin_murid: @js((string) old('jenis_kelamin_murid', $student->jenis_kelamin_murid ?? '')),
    currentSchool: @js((string) old('sekolah', $student->sekolah ?? '')),
    gradeLevel: @js((string) old('kelas', $student->kelas ?? '')),
    mapelDitingkatkan: @js((string) old('mapel_ditingkatkan', $student->mapel_ditingkatkan ?? '')),
    karakteristik_anak: @js((string) old('karakteristik_anak', $student->karakteristik_anak ?? '')),
    resetForm() {
        this.parentId = '{{ old('orangtua_id', $student->orangtua_id ?? '') }}';
        this.fullName = @js((string) old('nama_murid', $student->nama_murid ?? ''));
        this.panggilan_murid = @js((string) old('panggilan_murid', $student->panggilan_murid ?? ''));
        this.agama = @js((string) old('agama', $student->agama ?? ''));
        this.birthPlace = @js((string) old('tempat_lahir_murid', $student->tempat_lahir_murid ?? ''));
        this.birthDate = '{{ old('tanggal_lahir_murid', $student->tanggal_lahir_murid ?? '') }}';
        this.jenis_kelamin_murid = '{{ old('jenis_kelamin_murid', $student->jenis_kelamin_murid ?? '') }}';
        this.currentSchool = @js((string) old('sekolah', $student->sekolah ?? ''));
        this.gradeLevel = @js((string) old('kelas', $student->kelas ?? ''));
        this.mapelDitingkatkan = @js((string) old('mapel_ditingkatkan', $student->mapel_ditingkatkan ?? ''));
        this.karakteristik_anak = @js((string) old('karakteristik_anak', $student->karakteristik_anak ?? ''));
        this.touched = {};

        setTimeout(() => {
            let rr = document.querySelector('input[name=nilai_rata_rata]');
            if (rr) rr.value = @js((string) old('nilai_rata_rata', $student->nilai_rata_rata ?? ''));

            let md = document.querySelector('input[name=mapel_ditingkatkan]');
            if (md) md.value = @js((string) old('mapel_ditingkatkan', $student->mapel_ditingkatkan ?? ''));

            let ms = document.querySelector('input[name=mapel_sulit]');
            if (ms) ms.value = @js((string) old('mapel_sulit', $student->mapel_sulit ?? ''));

            let ch = document.querySelector('textarea[name=karakteristik_anak]');
            if (ch) ch.value = @js((string) old('karakteristik_anak', $student->karakteristik_anak ?? ''));

            let fileInput = document.querySelector('input[type=file]');
            if (fileInput) fileInput.value = '';
        }, 10);
    },
    submitForm(e) {
        this.touched.parentId = true;
        this.touched.fullName = true;
        this.touched.panggilan_murid = true;
        this.touched.agama = true;
        this.touched.birthPlace = true;
        this.touched.birthDate = true;
        this.touched.jenis_kelamin_murid = true;
        this.touched.currentSchool = true;
        this.touched.gradeLevel = true;
        this.touched.mapelDitingkatkan = true;
        this.touched.karakteristik_anak = true;

        let isValid = true;

        if (this.parentId === '') isValid = false;
        if (this.fullName.trim() === '') isValid = false;
        if (this.panggilan_murid.trim() === '') isValid = false;
        if (this.agama === '') isValid = false;
        if (this.birthPlace.trim() === '') isValid = false;
        if (this.birthDate === '') isValid = false;
        if (this.jenis_kelamin_murid === '') isValid = false;
        if (this.currentSchool.trim() === '') isValid = false;
        if (this.gradeLevel.trim() === '') isValid = false;
        if (this.mapelDitingkatkan.trim() === '') isValid = false;
        if (this.karakteristik_anak.trim() === '') isValid = false;

        if (!isValid) {
            e.preventDefault();
        }
    }
}">

    <x-admin.tajuk-halaman
        title="{{ isset($student) ? 'Edit Data Murid' : 'Tambah Murid Baru' }}"
        backUrl="{{ (isset($student) && request('from') == 'detail') ? route('admin.students.show', $student->id) : route('admin.students.index') }}"
    />

    <!-- Form -->
    <form @submit="submitForm" novalidate action="{{ isset($student) ? route('admin.students.update', $student->id) : route('admin.students.store') }}" method="POST" id="studentForm" class="space-y-6">
        @csrf
        @if(isset($student))
            @method('PUT')
        @endif

        <input type="hidden" name="from" value="{{ request('from') }}">

        <!-- Card 1: Wali Murid -->
        <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
            <h3 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Pilih Akun Orang Tua / Wali Murid</h3>

            <div>
                <label class="block text-sm text-gray-600 font-semibold mb-2">Orang Tua / Wali <span class="text-red-500">*</span></label>
                <select name="orangtua_id" x-model="parentId" @blur="touched.parentId = true" :class="touched.parentId && parentId === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer" required>
                    <option value="" disabled>Pilih Akun Orang Tua / Wali</option>
                    @foreach($parents as $parent)
                        <option value="{{ $parent->orangtua_id }}">
                            {{ $parent->name }} ({{ $parent->email }})
                        </option>
                    @endforeach
                </select>
                <p x-show="touched.parentId && parentId === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Wali murid wajib dipilih.
                </p>
                <p class="mt-3 text-sm text-gray-600 font-medium">Jika wali murid belum ada di daftar, silakan <a href="{{ route('admin.parents.create') }}" class="text-primary-600 font-extrabold hover:underline">Tambahkan Wali Murid Baru</a>.</p>
                <x-antarmuka.galat-sebaris name="orangtua_id" />
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <!-- Kolom Kiri: Biodata -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6 h-fit">
                <h3 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Biodata Diri</h3>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm text-gray-600 font-semibold mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_murid" x-model="fullName" placeholder="Masukkan nama lengkap anak" @blur="touched.fullName = true" :class="touched.fullName && fullName.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                        <p x-show="touched.fullName && fullName.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Nama lengkap wajib diisi.
                        </p>
                        <x-antarmuka.galat-sebaris name="nama_murid" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Nama Panggilan <span class="text-red-500">*</span></label>
                            <input type="text" name="panggilan_murid" x-model="panggilan_murid" placeholder="Masukkan nama akrab anak" @blur="touched.panggilan_murid = true" :class="touched.panggilan_murid && panggilan_murid.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                            <p x-show="touched.panggilan_murid && panggilan_murid.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Nama panggilan wajib diisi.
                            </p>
                            <x-antarmuka.galat-sebaris name="panggilan_murid" />
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Agama <span class="text-red-500">*</span></label>
                            <select name="agama" x-model="agama" @blur="touched.agama = true" :class="touched.agama && agama === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer" required>
                                <option value="" disabled>Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                            <p x-show="touched.agama && agama === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Agama wajib dipilih.
                            </p>
                            <x-antarmuka.galat-sebaris name="agama" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Tempat Lahir <span class="text-red-500">*</span></label>
                            <input type="text" name="tempat_lahir_murid" x-model="birthPlace" placeholder="Contoh: Jakarta" @blur="touched.birthPlace = true" :class="touched.birthPlace && birthPlace.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                            <p x-show="touched.birthPlace && birthPlace.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Tempat lahir wajib diisi.
                            </p>
                            <x-antarmuka.galat-sebaris name="tempat_lahir_murid" />
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Tanggal Lahir <span class="text-red-500">*</span></label>
                            <input type="date" name="tanggal_lahir_murid" max="{{ date('Y-m-d') }}" x-model="birthDate" @blur="touched.birthDate = true" :class="touched.birthDate && birthDate.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                            <p x-show="touched.birthDate && birthDate.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Tanggal lahir wajib diisi.
                            </p>
                            <x-antarmuka.galat-sebaris name="tanggal_lahir_murid" />
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 font-semibold mb-2">Jenis Kelamin <span class="text-red-500">*</span></label>
                        <select name="jenis_kelamin_murid" x-model="jenis_kelamin_murid" @blur="touched.jenis_kelamin_murid = true" :class="touched.jenis_kelamin_murid && jenis_kelamin_murid.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer" required>
                            <option value="" disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <p x-show="touched.jenis_kelamin_murid && jenis_kelamin_murid.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Jenis kelamin wajib dipilih.
                        </p>
                        <x-antarmuka.galat-sebaris name="jenis_kelamin_murid" />
                    </div>

                    @if(isset($student))
                    <div>
                        <label class="block text-sm text-gray-600 font-semibold mb-2">Status Keaktifan <span class="text-red-500">*</span></label>
                        <select name="status_murid" class="block w-full appearance-none rounded-2xl p-3 pr-10 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer" required>
                            <option value="active" {{ old('status_murid', $student->status_murid) == 'active' ? 'selected' : '' }}>Aktif Mengikuti Les</option>
                            <option value="inactive" {{ old('status_murid', $student->status_murid) == 'inactive' ? 'selected' : '' }}>Tidak Aktif / Lulus</option>
                        </select>
                        <x-antarmuka.galat-sebaris name="status_murid" />
                    </div>
                    @endif
                </div>
            </div>

            <!-- Kolom Kanan: Akademik -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6 h-fit">
                <h3 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Catatan Akademik</h3>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm text-gray-600 font-semibold mb-2">Asal Sekolah <span class="text-red-500">*</span></label>
                        <input type="text" name="sekolah" x-model="currentSchool" placeholder="Contoh: Sekolah Dasar Negeri" @blur="touched.currentSchool = true" :class="touched.currentSchool && currentSchool.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                        <p x-show="touched.currentSchool && currentSchool.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Asal sekolah wajib diisi.
                        </p>
                        <x-antarmuka.galat-sebaris name="sekolah" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Kelas <span class="text-red-500">*</span></label>
                            <select name="kelas" x-model="gradeLevel" @blur="touched.gradeLevel = true" :class="touched.gradeLevel && gradeLevel === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer" required>
                                <option value="" disabled>Pilih Kelas</option>
                                @for($i = 1; $i <= 6; $i++)
                                    <option value="{{ $i }}" {{ old('kelas', $student->kelas ?? '') == $i ? 'selected' : '' }}>Kelas {{ $i }}</option>
                                @endfor
                            </select>
                            <p x-show="touched.gradeLevel && gradeLevel === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Kelas wajib dipilih.
                            </p>
                            <x-antarmuka.galat-sebaris name="kelas" />
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Nilai Rata-rata Rapor</label>
                            <input type="number" step="0.01" min="1" max="100" name="nilai_rata_rata" value="{{ old('nilai_rata_rata', $student->nilai_rata_rata ?? '') }}" placeholder="1 - 100" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                            <x-antarmuka.galat-sebaris name="nilai_rata_rata" />
                        </div>
                    </div>

                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Mata Pelajaran yang Ingin Ditingkatkan <span class="text-red-500">*</span></label>
                                <input type="text" name="mapel_ditingkatkan" x-model="mapelDitingkatkan" placeholder="Contoh: Matematika (MTK), Bahasa Indonesia, Bahasa Inggris, IPAS, Pendidikan Pancasila, Tematik, dan PLBJ" @blur="touched.mapelDitingkatkan = true" :class="touched.mapelDitingkatkan && mapelDitingkatkan.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                                <p x-show="touched.mapelDitingkatkan && mapelDitingkatkan.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Mata pelajaran wajib diisi.
                                </p>
                                <x-antarmuka.galat-sebaris name="mapel_ditingkatkan" />
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Mata Pelajaran yang Dirasa Sulit</label>
                                <input type="text" name="mapel_sulit" value="{{ old('mapel_sulit', $student->mapel_sulit ?? '') }}" placeholder="Contoh: Matematika (MTK), Bahasa Indonesia, Bahasa Inggris, IPAS, Pendidikan Pancasila, Tematik, dan PLBJ" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                                <x-antarmuka.galat-sebaris name="mapel_sulit" />
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Karakteristik & Kemampuan Anak <span class="text-red-500">*</span></label>
                                <textarea name="karakteristik_anak" x-model="karakteristik_anak" rows="3" placeholder="Ceritakan sedikit mengenai anak Anda" @blur="touched.karakteristik_anak = true" :class="touched.karakteristik_anak && karakteristik_anak.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required></textarea>
                                <p x-show="touched.karakteristik_anak && karakteristik_anak.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Karakteristik anak wajib diisi.
                                </p>
                                <x-antarmuka.galat-sebaris name="karakteristik_anak" />
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex flex-col-reverse md:flex-row gap-4 mt-8">
            <button type="button" @click="resetForm()" class="w-full md:w-1/3 flex items-center justify-center px-6 py-4 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-2xl hover:bg-red-50 hover:border-red-200 hover:text-red-600 shadow-sm transform hover:-translate-y-1">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                Bersihkan Data
            </button>
            <button type="submit" class="w-full md:w-2/3 flex items-center justify-center px-8 py-4 text-base font-extrabold text-white transition-all duration-100 bg-primary-600 rounded-2xl hover:bg-primary-700 shadow-lg shadow-primary-500/30 transform hover:-translate-y-1">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                {{ isset($student) ? 'Simpan Perubahan Data Murid' : 'Simpan Data Murid Baru' }}
            </button>
        </div>
    </form>

</div>
@endsection
