@extends('layouts.orang-tua')

@section('title', 'Profil Saya')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">@yield('title')</span>
@endsection

@section('content')
<div class="w-full space-y-6">

    <x-admin.tajuk-halaman
        title="Profil Saya"
        description="Kelola data pribadi dan kata sandi Anda."
    />

    <!-- Form -->
    <form action="{{ route('ortu.profile.update') }}" method="POST" enctype="multipart/form-data"
          x-data="{
              name: @js((string) old('name', $user->name ?? '')),
              email: @js((string) old('email', $user->email ?? '')),
              phoneNumber: @js((string) old('nomor_telepon', $user->parentProfile->no_telepon_orangtua ?? '')),
              showPassword: false,
              showPasswordConfirm: false,
              password: '',
              statusHubungan: @js((string) old('status_hubungan', $user->parentProfile->status_hubungan ?? '')),
              alamatDomisili: @js((string) old('alamat_domisili', $user->parentProfile->alamat_domisili ?? '')),
              imagePreview: @js($user->avatar ? asset('storage/' . $user->avatar) : ''),
              touched: {},
              handleFileChange(event) {
                  const file = event.target.files[0];
                  if (!file) return;
                  if (!file.type.match('image.*')) {
                      alert('Harap unggah file gambar (JPG, PNG, dll).');
                      return;
                  }
                  const reader = new FileReader();
                  reader.onload = (e) => {
                      this.imagePreview = e.target.result;
                  };
                  reader.readAsDataURL(file);
              },
              resetForm() {
                  this.name = @js((string) old('name', $user->name ?? ''));
                  this.email = @js((string) old('email', $user->email ?? ''));
                  this.phoneNumber = @js((string) old('nomor_telepon', $user->parentProfile->no_telepon_orangtua ?? ''));
                  this.password = '';
                  this.showPassword = false;
                  this.showPasswordConfirm = false;
                  this.statusHubungan = @js((string) old('status_hubungan', $user->parentProfile->status_hubungan ?? ''));
                  this.alamatDomisili = @js((string) old('alamat_domisili', $user->parentProfile->alamat_domisili ?? ''));
                  this.imagePreview = @js($user->avatar ? asset('storage/' . $user->avatar) : '');
                  this.touched = {};

                  setTimeout(() => {
                      let fileInput = document.querySelector('input[type=file]');
                      if (fileInput) fileInput.value = '';
                  }, 10);
              },
              submitForm(e) {
                  this.touched.name = true;
                  this.touched.email = true;
                  this.touched.phoneNumber = true;
                  this.touched.password = true;
                  this.touched.statusHubungan = true;
                  this.touched.alamatDomisili = true;

                  let isValid = true;
                  if (String(this.name).trim() === '') isValid = false;
                  if (String(this.email).trim() === '') isValid = false;
                  if (String(this.phoneNumber).trim() === '') isValid = false;
                  if (String(this.statusHubungan).trim() === '') isValid = false;
                  if (String(this.alamatDomisili).trim() === '') isValid = false;

                  if (!isValid) {
                      e.preventDefault();
                  }
              }
          }" @submit="submitForm" novalidate>
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <!-- 1. Akun & Kredensial (Top Card) -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
                <h3 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Informasi Akun</h3>

                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Kiri: Foto Profil -->
                    <div class="w-full lg:w-1/3 xl:w-1/4">
                        <label class="block text-sm text-gray-600 font-semibold mb-2 text-center lg:text-left">Foto Profil</label>
                        <div class="flex flex-col items-center justify-center space-y-4">
                            <div class="flex-shrink-0">
                                <!-- Existing / Preview Image -->
                                <template x-if="imagePreview">
                                    <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white shadow-md bg-white">
                                        <img :src="imagePreview" alt="Avatar" class="w-full h-full object-cover">
                                    </div>
                                </template>

                                <!-- Empty State -->
                                <template x-if="!imagePreview">
                                    <div class="w-32 h-32 rounded-full bg-gray-50 flex items-center justify-center border-4 border-white shadow-md">
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    </div>
                                </template>
                            </div>
                            <div class="w-full text-center lg:text-left">
                                <input type="file" name="avatar" accept="image/jpeg,image/png,image/webp" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100 transition-colors cursor-pointer border border-gray-200 rounded-xl bg-white" @change="handleFileChange">
                                <p class="mt-2 text-xs text-gray-500 leading-relaxed">
                                    <span class="font-bold text-primary-700">Rasio Foto 1:1</span><br>
                                    Format: JPEG, JPG, PNG, WEBP.<br>
                                    Maksimal berukuran 2MB.
                                </p>
                                <x-antarmuka.galat-sebaris name="avatar" />
                            </div>
                        </div>
                    </div>

                    <!-- Kanan: Data Akun -->
                    <div class="w-full lg:w-2/3 xl:w-3/4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="md:col-span-2">
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="name" x-model="name" placeholder="Masukkan nama lengkap Anda" @blur="touched.name = true" :class="touched.name && name.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                                <p x-show="touched.name && name.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Nama lengkap wajib diisi.
                                </p>
                                <x-antarmuka.galat-sebaris name="name" />
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Alamat Email <span class="text-red-500">*</span></label>
                                <input type="email" name="email" x-model="email" placeholder="Contoh: email@gmail.com" @blur="touched.email = true" :class="touched.email && email.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                                <p x-show="touched.email && email.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Email wajib diisi dengan valid.
                                </p>
                                <x-antarmuka.galat-sebaris name="email" />
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Password <span class="text-xs font-normal text-gray-500 ml-1">(Kosongkan jika tidak diubah)</span></label>
                                <div class="relative">
                                    <input :type="showPassword ? 'text' : 'password'" name="password" x-model="password" placeholder="Masukkan password baru minimal 8 karakter" class="block w-full rounded-2xl p-3 pr-10 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                                    <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-primary-600 focus:text-primary-600 focus:outline-none transition-colors">
                                        <svg x-show="showPassword" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <svg x-show="!showPassword" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                        </svg>
                                    </button>
                                </div>
                                <x-antarmuka.galat-sebaris name="password" />
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Konfirmasi Password</label>
                                <div class="relative">
                                    <input :type="showPasswordConfirm ? 'text' : 'password'" name="password_confirmation" placeholder="Ulangi password baru yang telah dibuat" class="block w-full rounded-2xl p-3 pr-10 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                                    <button type="button" @click="showPasswordConfirm = !showPasswordConfirm" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-primary-600 focus:text-primary-600 focus:outline-none transition-colors">
                                        <svg x-show="showPasswordConfirm" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <svg x-show="!showPasswordConfirm" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Info Kontak -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6 w-full">
                <h3 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Informasi Kontak & Domisili</h3>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Nomor Telepon / WhatsApp Aktif <span class="text-red-500">*</span></label>
                            <input type="text" name="nomor_telepon" x-model="phoneNumber" placeholder="Contoh: 08123456789" @blur="touched.phoneNumber = true" :class="touched.phoneNumber && phoneNumber.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                            <p x-show="touched.phoneNumber && phoneNumber.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Nomor telepon wajib diisi.
                            </p>
                            <x-antarmuka.galat-sebaris name="nomor_telepon" />
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Status Hubungan <span class="text-red-500">*</span></label>
                            <select name="status_hubungan" x-model="statusHubungan" @blur="touched.statusHubungan = true" :class="touched.statusHubungan && statusHubungan.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full appearance-none rounded-xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer" required>
                                <option value="" disabled>Pilih Status Hubungan dengan Anak</option>
                                <option value="Ayah Kandung">Ayah Kandung</option>
                                <option value="Ibu Kandung">Ibu Kandung</option>
                                <option value="Ayah Tiri">Ayah Tiri</option>
                                <option value="Ibu Tiri">Ibu Tiri</option>
                                <option value="Ayah Angkat">Ayah Angkat</option>
                                <option value="Ibu Angkat">Ibu Angkat</option>
                                <option value="Kakek">Kakek</option>
                                <option value="Nenek">Nenek</option>
                                <option value="Paman">Paman</option>
                                <option value="Bibi">Bibi</option>
                                <option value="Saudara Kandung">Saudara Kandung</option>
                                <option value="Wali (Legal/Ditunjuk)">Wali (Legal/Ditunjuk)</option>
                                <option value="Pengasuh">Pengasuh</option>
                                <option value="Pengurus Panti Asuhan/Yayasan">Pengurus Panti Asuhan/Yayasan</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <p x-show="touched.statusHubungan && statusHubungan.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Status hubungan wajib dipilih.
                            </p>
                            <x-antarmuka.galat-sebaris name="status_hubungan" />
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 font-semibold mb-2">Alamat Lengkap <span class="text-red-500">*</span></label>
                        <textarea name="alamat_domisili" rows="3" x-model="alamatDomisili" placeholder="Masukkan alamat lengkap rumah saat ini" @blur="touched.alamatDomisili = true" :class="touched.alamatDomisili && alamatDomisili.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required></textarea>
                        <p x-show="touched.alamatDomisili && alamatDomisili.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Alamat domisili wajib diisi.
                        </p>
                        <x-antarmuka.galat-sebaris name="alamat_domisili" />
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex flex-col-reverse md:flex-row gap-4 mt-8">
                <button type="button" @click="resetForm()" class="w-full md:w-1/3 flex items-center justify-center px-6 py-4 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-2xl hover:bg-red-50 hover:border-red-200 hover:text-red-600 shadow-sm transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Batalkan Perubahan
                </button>
                <button type="submit" class="w-full md:w-2/3 flex items-center justify-center px-8 py-4 text-base font-extrabold text-white transition-all duration-100 bg-primary-600 rounded-2xl hover:bg-primary-700 shadow-lg shadow-primary-500/30 transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>

</div>
@endsection
