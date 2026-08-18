<!-- Langkah 2: Akademik -->
<div class="space-y-6">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Asal Sekolah <span class="text-red-500">*</span></label>
            <input type="text" name="sekolah" value="{{ old('sekolah', $draft->draft_data['sekolah'] ?? '') }}" placeholder="Contoh: Sekolah Dasar Negeri" required class="block w-full rounded-2xl py-3.5 px-4 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm font-medium text-gray-800 placeholder:font-normal placeholder:text-gray-400 @error('sekolah') border-red-300 ring-1 ring-red-300 bg-red-50 @enderror">
            <x-antarmuka.galat-sebaris name="sekolah" />
        </div>
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Kelas Saat Ini <span class="text-red-500">*</span></label>
            <select name="kelas" required class="block w-full appearance-none rounded-2xl py-3.5 px-4 pr-10 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer @error('kelas') border-red-300 ring-1 ring-red-300 bg-red-50 @enderror">
                <option value="">Pilih Kelas</option>
                @for($i = 1; $i <= 6; $i++)
                    <option value="Kelas {{ $i }}" {{ old('kelas', $draft->draft_data['kelas'] ?? '') == 'Kelas '.$i ? 'selected' : '' }}>Kelas {{ $i }}</option>
                @endfor
            </select>
            <x-antarmuka.galat-sebaris name="kelas" />
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Nilai Rata-rata Rapor Terakhir</label>
            <input type="number" step="0.01" name="nilai_rata_rata" value="{{ old('nilai_rata_rata', $draft->draft_data['nilai_rata_rata'] ?? '') }}" placeholder="Contoh: 85.5" class="block w-full rounded-2xl py-3.5 px-4 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm font-medium text-gray-800 placeholder:font-normal placeholder:text-gray-400 @error('nilai_rata_rata') border-red-300 ring-1 ring-red-300 bg-red-50 @enderror">
            <x-antarmuka.galat-sebaris name="nilai_rata_rata" />
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Mata Pelajaran yang Ingin Ditingkatkan <span class="text-red-500">*</span></label>
            <input type="text" name="mapel_ditingkatkan" value="{{ old('mapel_ditingkatkan', $draft->draft_data['mapel_ditingkatkan'] ?? '') }}" placeholder="Contoh: Matematika (MTK), Bahasa Indonesia, Bahasa Inggris, IPAS, Pendidikan Pancasila, Tematik, dan PLBJ" required class="block w-full rounded-2xl py-3.5 px-4 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm font-medium text-gray-800 placeholder:font-normal placeholder:text-gray-400 @error('mapel_ditingkatkan') border-red-300 ring-1 ring-red-300 bg-red-50 @enderror">
            <x-antarmuka.galat-sebaris name="mapel_ditingkatkan" />
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Mata Pelajaran yang Dirasa Sulit <span class="text-red-500">*</span></label>
            <input type="text" name="mapel_sulit" value="{{ old('mapel_sulit', $draft->draft_data['mapel_sulit'] ?? '') }}" placeholder="Contoh: Matematika (MTK), Bahasa Indonesia, Bahasa Inggris, IPAS, Pendidikan Pancasila, Tematik, dan PLBJ" required class="block w-full rounded-2xl py-3.5 px-4 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm font-medium text-gray-800 placeholder:font-normal placeholder:text-gray-400 @error('mapel_sulit') border-red-300 ring-1 ring-red-300 bg-red-50 @enderror">
            <x-antarmuka.galat-sebaris name="mapel_sulit" />
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Karakteristik & Kemampuan Anak <span class="text-red-500">*</span></label>
            <textarea name="karakteristik_anak" rows="3" placeholder="Ceritakan sedikit mengenai anak Anda" required class="block w-full rounded-2xl py-3.5 px-4 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm font-medium text-gray-800 placeholder:font-normal placeholder:text-gray-400 @error('karakteristik_anak') border-red-300 ring-1 ring-red-300 bg-red-50 @enderror">{{ old('karakteristik_anak', $draft->draft_data['karakteristik_anak'] ?? '') }}</textarea>
            <x-antarmuka.galat-sebaris name="karakteristik_anak" />
        </div>
    </div>
</div>
