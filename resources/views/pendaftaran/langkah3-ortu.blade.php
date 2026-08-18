<!-- Langkah 3: Orang Tua -->
@php
    $parentProfile = auth()->user()?->parentProfile;
    $defaultNama = $draft->draft_data['nama_ortu'] ?? auth()->user()?->name;
    $defaultStatus = $draft->draft_data['status_hubungan'] ?? $parentProfile?->status_hubungan ?? '';
    $defaultTelepon = $draft->draft_data['nomor_telepon'] ?? $parentProfile?->no_telepon_orangtua ?? '';
    $defaultEmail = $draft->draft_data['email'] ?? auth()->user()?->email;
    $defaultAlamat = $draft->draft_data['alamat_domisili'] ?? $parentProfile?->alamat_domisili ?? '';
@endphp
<div class="space-y-6">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Nama Lengkap Orang Tua / Wali <span class="text-red-500">*</span></label>
            <input type="text" name="nama_ortu" value="{{ old('nama_ortu', $defaultNama) }}" placeholder="Masukkan nama lengkap Anda" required class="block w-full rounded-2xl py-3.5 px-4 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm font-medium text-gray-800 placeholder:font-normal placeholder:text-gray-400 @error('nama_ortu') border-red-300 ring-1 ring-red-300 bg-red-50 @enderror">
            <x-antarmuka.galat-sebaris name="nama_ortu" />
        </div>
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Status Hubungan <span class="text-red-500">*</span></label>
            <select name="status_hubungan" required class="block w-full appearance-none rounded-2xl py-3.5 px-4 pr-10 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer @error('status_hubungan') border-red-300 ring-1 ring-red-300 bg-red-50 @enderror">
                <option value="">Pilih Status Hubungan Dengan Anak</option>
                <option value="Ayah Kandung" {{ old('status_hubungan', $defaultStatus) == 'Ayah Kandung' ? 'selected' : '' }}>Ayah Kandung</option>
                <option value="Ibu Kandung" {{ old('status_hubungan', $defaultStatus) == 'Ibu Kandung' ? 'selected' : '' }}>Ibu Kandung</option>
                <option value="Ayah Tiri" {{ old('status_hubungan', $defaultStatus) == 'Ayah Tiri' ? 'selected' : '' }}>Ayah Tiri</option>
                <option value="Ibu Tiri" {{ old('status_hubungan', $defaultStatus) == 'Ibu Tiri' ? 'selected' : '' }}>Ibu Tiri</option>
                <option value="Ayah Angkat" {{ old('status_hubungan', $defaultStatus) == 'Ayah Angkat' ? 'selected' : '' }}>Ayah Angkat</option>
                <option value="Ibu Angkat" {{ old('status_hubungan', $defaultStatus) == 'Ibu Angkat' ? 'selected' : '' }}>Ibu Angkat</option>
                <option value="Kakek" {{ old('status_hubungan', $defaultStatus) == 'Kakek' ? 'selected' : '' }}>Kakek</option>
                <option value="Nenek" {{ old('status_hubungan', $defaultStatus) == 'Nenek' ? 'selected' : '' }}>Nenek</option>
                <option value="Paman" {{ old('status_hubungan', $defaultStatus) == 'Paman' ? 'selected' : '' }}>Paman</option>
                <option value="Bibi" {{ old('status_hubungan', $defaultStatus) == 'Bibi' ? 'selected' : '' }}>Bibi</option>
                <option value="Saudara Kandung" {{ old('status_hubungan', $defaultStatus) == 'Saudara Kandung' ? 'selected' : '' }}>Saudara Kandung</option>
                <option value="Wali (Legal/Ditunjuk)" {{ old('status_hubungan', $defaultStatus) == 'Wali (Legal/Ditunjuk)' ? 'selected' : '' }}>Wali (Legal/Ditunjuk)</option>
                <option value="Pengasuh" {{ old('status_hubungan', $defaultStatus) == 'Pengasuh' ? 'selected' : '' }}>Pengasuh</option>
                <option value="Pengurus Panti Asuhan/Yayasan" {{ old('status_hubungan', $defaultStatus) == 'Pengurus Panti Asuhan/Yayasan' ? 'selected' : '' }}>Pengurus Panti Asuhan/Yayasan</option>
                <option value="Lainnya" {{ old('status_hubungan', $defaultStatus) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
            <x-antarmuka.galat-sebaris name="status_hubungan" />
        </div>
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Nomor Telepon / WhatsApp Aktif <span class="text-red-500">*</span></label>
            <input type="tel" name="nomor_telepon" value="{{ old('nomor_telepon', $defaultTelepon) }}" placeholder="Contoh: 081234567890" required class="block w-full rounded-2xl py-3.5 px-4 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm font-medium text-gray-800 placeholder:font-normal placeholder:text-gray-400 @error('nomor_telepon') border-red-300 ring-1 ring-red-300 bg-red-50 @enderror">
            <x-antarmuka.galat-sebaris name="nomor_telepon" />
        </div>
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Alamat Email <span class="text-red-500">*</span></label>
            <input type="email" name="email" value="{{ old('email', $defaultEmail) }}" placeholder="Contoh: email@gmail.com" required class="block w-full rounded-2xl py-3.5 px-4 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm font-medium text-gray-800 placeholder:font-normal placeholder:text-gray-400 @error('email') border-red-300 ring-1 ring-red-300 bg-red-50 @enderror">
            <x-antarmuka.galat-sebaris name="email" />
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Alamat Lengkap <span class="text-red-500">*</span></label>
            <textarea name="alamat_domisili" rows="3" placeholder="Masukkan alamat lengkap rumah saat ini" required class="block w-full rounded-2xl py-3.5 px-4 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm font-medium text-gray-800 placeholder:font-normal placeholder:text-gray-400 @error('alamat_domisili') border-red-300 ring-1 ring-red-300 bg-red-50 @enderror">{{ old('alamat_domisili', $defaultAlamat) }}</textarea>
            <x-antarmuka.galat-sebaris name="alamat_domisili" />
        </div>
    </div>
</div>
