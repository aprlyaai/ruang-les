@extends('layouts.admin')

@section('title', isset($material) ? 'Edit Materi Belajar' : 'Tambah Materi Baru')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('admin.repository.index') }}" class="hover:text-primary-600 transition-colors">Repositori Materi</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">@yield('title')</span>
@endsection

@section('content')
<div class="w-full space-y-6">
    <x-admin.tajuk-halaman
        title="{{ isset($material) ? 'Edit Materi Belajar' : 'Tambah Materi Baru' }}"
        backUrl="{{ route('admin.repository.index') }}"
    />

    <form action="{{ isset($material) ? route('admin.repository.update', $material->id) : route('admin.repository.store') }}" method="POST"
          x-data="{
              nama_materi: @js((string) old('nama_materi', $material->nama_materi ?? '')),
              kelas_materi: @js((string) old('kelas_materi', $material->kelas_materi ?? '')),
              nama_mapel: @js((string) old('nama_mapel', $material->nama_mapel ?? '')),
              topik_bab: @js((string) old('topik_bab', $material->topik_bab ?? '')),
              tipe_materi: @js((string) old('tipe_materi', $material->tipe_materi ?? '')),
              sumber_tautan: @js((string) old('sumber_tautan', $material->sumber_tautan ?? '')),
              url_tautan: @js((string) old('url_tautan', $material->url_tautan ?? '')),
              hak_akses: @js((string) old('hak_akses', $material->hak_akses ?? '')),
              deskripsi_materi: @js((string) old('deskripsi_materi', $material->deskripsi_materi ?? '')),
              isActive: @js((bool) old('status_materi', isset($material) ? $material->status_materi : true)),
              touched: {},
              showBackendErrors: true,

              submitForm(e) {
                  this.touched.nama_materi = true;
                  this.touched.kelas_materi = true;
                  this.touched.nama_mapel = true;
                  this.touched.tipe_materi = true;
                  this.touched.sumber_tautan = true;
                  this.touched.url_tautan = true;
                  this.touched.hak_akses = true;

                  let isValid = true;
                  if (String(this.nama_materi).trim() === '') isValid = false;
                  if (String(this.kelas_materi).trim() === '') isValid = false;
                  if (String(this.nama_mapel).trim() === '') isValid = false;
                  if (String(this.tipe_materi).trim() === '') isValid = false;
                  if (String(this.sumber_tautan).trim() === '') isValid = false;
                  if (String(this.url_tautan).trim() === '') isValid = false;
                  if (String(this.hak_akses).trim() === '') isValid = false;

                  if (!isValid) {
                      e.preventDefault();
                  }
              },
              resetForm() {
                  this.nama_materi = @js((string) ($material->nama_materi ?? ''));
                  this.kelas_materi = @js((string) ($material->kelas_materi ?? ''));
                  this.nama_mapel = @js((string) ($material->nama_mapel ?? ''));
                  this.topik_bab = @js((string) ($material->topik_bab ?? ''));
                  this.tipe_materi = @js((string) ($material->tipe_materi ?? ''));
                  this.sumber_tautan = @js((string) ($material->sumber_tautan ?? ''));
                  this.url_tautan = @js((string) ($material->url_tautan ?? ''));
                  this.hak_akses = @js((string) ($material->hak_akses ?? ''));
                  this.deskripsi_materi = @js((string) ($material->deskripsi_materi ?? ''));
                  this.isActive = @js((bool) (isset($material) ? $material->status_materi : true));
                  this.touched = {};
                  this.showBackendErrors = false;
              }
          }" @submit="submitForm" novalidate>
        @csrf
        @if(isset($material))
            @method('PUT')
        @endif

        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Left Column: Informasi Dasar -->
            <div class="w-full lg:w-2/3 space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
                    <h3 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Informasi Dasar</h3>

                    <div class="space-y-5">
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Judul Materi <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_materi" x-model="nama_materi" placeholder="Contoh: Latihan UTBK Matematika Paket 1" @blur="touched.nama_materi = true" :class="touched.nama_materi && nama_materi.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                            <p x-show="touched.nama_materi && nama_materi.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Judul materi wajib diisi.
                            </p>
                            <x-antarmuka.galat-sebaris name="nama_materi" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Jenjang Kelas <span class="text-red-500">*</span></label>
                                <select name="kelas_materi" x-model="kelas_materi" @blur="touched.kelas_materi = true" :class="touched.kelas_materi && kelas_materi.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer" required>
                                    <option value="" disabled selected>Pilih Kelas</option>
                                    @for($i = 1; $i <= 6; $i++)
                                        <option value="{{ $i }}">Kelas {{ $i }}</option>
                                    @endfor
                                </select>
                                <p x-show="touched.kelas_materi && kelas_materi.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Kelas wajib dipilih.
                                </p>
                                <x-antarmuka.galat-sebaris name="kelas_materi" />
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Mata Pelajaran <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_mapel" x-model="nama_mapel" placeholder="Contoh: Matematika" @blur="touched.nama_mapel = true" :class="touched.nama_mapel && nama_mapel.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                                <p x-show="touched.nama_mapel && nama_mapel.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Mata pelajaran wajib diisi.
                                </p>
                                <x-antarmuka.galat-sebaris name="nama_mapel" />
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Topik / Bab <span class="text-gray-400 font-normal">(Opsional)</span></label>
                            <input type="text" name="topik_bab" x-model="topik_bab" placeholder="Contoh: Pecahan Campuran" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                        </div>

                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Deskripsi / Catatan Tambahan <span class="text-gray-400 font-normal">(Opsional)</span></label>
                            <textarea name="deskripsi_materi" rows="4" x-model="deskripsi_materi" placeholder="Berikan instruksi tambahan jika perlu..." class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="w-full lg:w-1/3 space-y-6">
                <!-- Pengaturan Tautan Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
                    <h3 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Pengaturan Tautan</h3>

                    <div class="space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 lg:grid-cols-1">
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Tipe Materi <span class="text-red-500">*</span></label>
                                <select name="tipe_materi" x-model="tipe_materi" @blur="touched.tipe_materi = true" :class="touched.tipe_materi && tipe_materi.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer" required>
                                    <option value="" disabled selected>Pilih Tipe</option>
                                    <option value="Modul Teori">Modul Teori</option>
                                    <option value="Latihan Soal">Latihan Soal</option>
                                    <option value="Kunci Jawaban">Kunci Jawaban</option>
                                </select>
                                <p x-show="touched.tipe_materi && tipe_materi.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Tipe Materi wajib dipilih.
                                </p>
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Sumber Materi <span class="text-red-500">*</span></label>
                                <select name="sumber_tautan" x-model="sumber_tautan" @blur="touched.sumber_tautan = true" :class="touched.sumber_tautan && sumber_tautan.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer" required>
                                    <option value="" disabled selected>Pilih Sumber Tautan</option>
                                    <option value="Google Drive">Google Drive</option>
                                    <option value="YouTube">YouTube</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <p x-show="touched.sumber_tautan && sumber_tautan.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Tautan wajib dipilih.
                                </p>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">URL / Link <span class="text-red-500">*</span></label>
                            <input type="url" name="url_tautan" x-model="url_tautan" placeholder="https://" @blur="touched.url_tautan = true" :class="touched.url_tautan && url_tautan.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>

                            <div class="mt-3 flex items-start gap-2 p-3 bg-amber-50 border border-amber-200 rounded-xl">
                                <svg class="w-4 h-4 text-amber-600 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                <p class="text-xs font-bold text-amber-600">Pastikan akses URL sudah <br>"Anyone with the link".</p>
                            </div>

                            <p x-show="touched.url_tautan && url_tautan.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                URL Tautan wajib dicantumkan dengan valid.
                            </p>
                            <x-antarmuka.galat-sebaris name="url_tautan" />
                        </div>

                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Hak Akses <span class="text-red-500">*</span></label>
                            <select name="hak_akses" x-model="hak_akses" @blur="touched.hak_akses = true" :class="touched.hak_akses && hak_akses.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer" required>
                                <option value="" disabled selected>Pilih Hak Akses</option>
                                <option value="Publik">Publik</option>
                                <option value="Murid">Khusus Murid</option>
                                <option value="Mentor">Khusus Mentor</option>
                            </select>
                            <p x-show="touched.hak_akses && hak_akses.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Hak Akses wajib dipilih.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Status Publikasi Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
                    <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-200 pb-3">Status Publikasi</h3>
                    <div class="space-y-4">
                        <!-- Menggunakan 'group' dan 'hover:bg-gray-50' ala Kode 1 -->
                        <label class="flex items-start p-3 border border-gray-100 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer group">

                            <div class="flex items-center h-5 mt-0.5">
                                <input type="hidden" name="status_materi" value="0">
                                <input type="checkbox"
                                    name="status_materi"
                                    value="1"
                                    x-model="isActive"
                                    class="w-4 h-4 text-primary-600 bg-white border-gray-300 rounded focus:ring-primary-500 focus:ring-2 cursor-pointer">
                            </div>

                            <div class="ml-3 text-sm">
                                <!-- Menggunakan 'group-hover:text-primary-700' agar teks menyala saat label disentuh kursor -->
                                <span class="font-bold text-gray-700 group-hover:text-primary-700 transition-colors">Tayangkan (Aktif)</span>
                                <p class="text-gray-500 text-xs mt-0.5">Jika dimatikan, materi ini akan disembunyikan dan menjadi Draft.</p>
                            </div>

                        </label>

                            <x-antarmuka.galat-sebaris name="status_materi" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col-reverse md:flex-row gap-4 mt-8 pb-10">
            <button type="button" @click="resetForm()" class="w-full md:w-1/3 flex items-center justify-center px-6 py-4 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-2xl hover:bg-red-50 hover:border-red-200 hover:text-red-600 shadow-sm transform hover:-translate-y-1">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                Bersihkan Data
            </button>
            <button type="submit" class="w-full md:w-2/3 flex items-center justify-center px-8 py-4 text-base font-extrabold text-white transition-all duration-100 bg-primary-600 rounded-2xl hover:bg-primary-700 shadow-lg shadow-primary-500/30 transform hover:-translate-y-1">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                {{ isset($material) ? 'Simpan Perubahan Materi' : 'Simpan Materi Baru' }}
            </button>
        </div>
    </form>
</div>
@endsection
