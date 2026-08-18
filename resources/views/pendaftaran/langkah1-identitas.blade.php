<!-- Langkah 1: Identitas Anak -->
<div class="space-y-6">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
            <input type="text" name="nama_murid" value="{{ old('nama_murid', $draft->draft_data['nama_murid'] ?? '') }}" placeholder="Masukkan nama lengkap anak" required class="block w-full rounded-2xl py-3.5 px-4 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm font-medium text-gray-800 placeholder:font-normal placeholder:text-gray-400 @error('nama_murid') border-red-300 ring-1 ring-red-300 bg-red-50 @enderror">
            <x-antarmuka.galat-sebaris name="nama_murid" />
        </div>
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Nama Panggilan <span class="text-red-500">*</span></label>
            <input type="text" name="panggilan_murid" value="{{ old('panggilan_murid', $draft->draft_data['panggilan_murid'] ?? '') }}" placeholder="Masukkan nama akrab anak" required class="block w-full rounded-2xl py-3.5 px-4 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm font-medium text-gray-800 placeholder:font-normal placeholder:text-gray-400 @error('panggilan_murid') border-red-300 ring-1 ring-red-300 bg-red-50 @enderror">
            <x-antarmuka.galat-sebaris name="panggilan_murid" />
        </div>
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Tempat Lahir <span class="text-red-500">*</span></label>
            <input type="text" name="tempat_lahir_murid" value="{{ old('tempat_lahir_murid', $draft->draft_data['tempat_lahir_murid'] ?? '') }}" placeholder="Contoh: Jakarta" required class="block w-full rounded-2xl py-3.5 px-4 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm font-medium text-gray-800 placeholder:font-normal placeholder:text-gray-400 @error('tempat_lahir_murid') border-red-300 ring-1 ring-red-300 bg-red-50 @enderror">
            <x-antarmuka.galat-sebaris name="tempat_lahir_murid" />
        </div>
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Tanggal Lahir <span class="text-red-500">*</span></label>
            <input type="date" id="tanggal_lahir_murid" name="tanggal_lahir_murid" max="{{ date('Y-m-d') }}" value="{{ old('tanggal_lahir_murid', $draft->draft_data['tanggal_lahir_murid'] ?? '') }}" required onclick="this.showPicker()" class="block w-full cursor-pointer rounded-2xl py-3.5 px-4 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm font-medium text-gray-800 placeholder:font-normal placeholder:text-gray-400 @error('tanggal_lahir_murid') border-red-300 ring-1 ring-red-300 bg-red-50 @enderror">
            <x-antarmuka.galat-sebaris name="tanggal_lahir_murid" />
        </div>
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Usia Saat Ini <span class="text-red-500">*</span></label>
            <input type="text" id="usia_display" readonly placeholder="Otomatis terisi setelah memilih tanggal lahir" tabindex="-1" class="block w-full rounded-2xl py-3.5 px-4 border border-primary-200 bg-primary-50/40 backdrop-blur-md shadow-inner text-primary-700 cursor-default transition-colors duration-300 text-sm font-medium placeholder:font-normal placeholder:text-gray-400">
        </div>
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Jenis Kelamin <span class="text-red-500">*</span></label>
            <select name="jenis_kelamin_murid" required class="block w-full appearance-none rounded-2xl py-3.5 px-4 pr-10 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer @error('jenis_kelamin_murid') border-red-300 ring-1 ring-red-300 bg-red-50 @enderror">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki" {{ old('jenis_kelamin_murid', $draft->draft_data['jenis_kelamin_murid'] ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin_murid', $draft->draft_data['jenis_kelamin_murid'] ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            <x-antarmuka.galat-sebaris name="jenis_kelamin_murid" />
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Agama <span class="text-red-500">*</span></label>
            <select name="agama" required class="block w-full appearance-none rounded-2xl py-3.5 px-4 pr-10 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer @error('agama') border-red-300 ring-1 ring-red-300 bg-red-50 @enderror">
                <option value="">Pilih Agama</option>
                <option value="Islam" {{ old('agama', $draft->draft_data['agama'] ?? '') == 'Islam' ? 'selected' : '' }}>Islam</option>
                <option value="Kristen" {{ old('agama', $draft->draft_data['agama'] ?? '') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                <option value="Katolik" {{ old('agama', $draft->draft_data['agama'] ?? '') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                <option value="Hindu" {{ old('agama', $draft->draft_data['agama'] ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                <option value="Buddha" {{ old('agama', $draft->draft_data['agama'] ?? '') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                <option value="Konghucu" {{ old('agama', $draft->draft_data['agama'] ?? '') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
            </select>
            <x-antarmuka.galat-sebaris name="agama" />
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const birthDateInput = document.getElementById('tanggal_lahir_murid');
    const usiaDisplay = document.getElementById('usia_display');

    function calculateAge() {
        if (!birthDateInput.value) {
            usiaDisplay.value = '';
            return;
        }

        const birthDate = new Date(birthDateInput.value);
        const today = new Date();

        if (birthDate > today) {
            usiaDisplay.value = 'Tanggal lahir tidak valid';
            return;
        }

        let years = today.getFullYear() - birthDate.getFullYear();
        let months = today.getMonth() - birthDate.getMonth();

        // Jika tanggal hari ini belum melewati tanggal lahir di bulan tersebut
        if (today.getDate() < birthDate.getDate()) {
            months--;
        }

        // Jika bulan negatif, kurangi 1 tahun dan tambah 12 bulan
        if (months < 0) {
            years--;
            months += 12;
        }

        let ageString = '';
        if (years > 0) ageString += years + ' Tahun ';
        if (months > 0) ageString += months + ' Bulan';
        if (years === 0 && months === 0) ageString = 'Kurang dari 1 bulan';

        usiaDisplay.value = ageString.trim();
    }

    if (birthDateInput && usiaDisplay) {
        birthDateInput.addEventListener('change', calculateAge);
        // Hitung juga saat pertama dimuat (berguna untuk mode edit/draft)
        calculateAge();
    }
});
</script>
