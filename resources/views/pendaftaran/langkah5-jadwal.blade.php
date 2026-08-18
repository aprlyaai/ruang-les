<!-- Langkah 5: Jadwal -->
<div class="space-y-6">

    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
        <p class="text-sm text-orange-500 leading-relaxed">
            Jadwal yang Anda pilih di sini bersifat <em>preferensi (pilihan/harapan utama)</em>. Jadwal ini belum sepenuhnya mengikat atau final. Jadwal pasti akan dikonfirmasi kembali oleh admin menyesuaikan ketersediaan mentor dan kuota kelas.
        </p>
    </div>

    <!-- Hidden inputs for actual form submission -->
    <input type="hidden" name="jadwal_1_id" id="jadwal_1_id" value="{{ old('jadwal_1_id', $draft->draft_data['jadwal_1_id'] ?? '') }}" required>
    <input type="hidden" name="jadwal_2_id" id="jadwal_2_id" value="{{ old('jadwal_2_id', $draft->draft_data['jadwal_2_id'] ?? '') }}" required>



    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Jadwal Pertemuan A -->
        <div class="bg-white/70 backdrop-blur-md border border-white/60 rounded-3xl p-4 md:p-5 shadow-sm relative overflow-hidden transition-all duration-300 hover:shadow-lg hover:bg-white/90">
            <!-- Decorative top accent removed -->

            <div class="flex items-center gap-4 mb-3 border-b border-gray-100 pb-3">
                <div class="w-10 h-10 rounded-full bg-primary-50 flex items-center justify-center text-primary-700 font-black text-lg shadow-sm border border-primary-200">
                    A
                </div>
                <h3 class="text-xl font-extrabold text-gray-800 tracking-tight">Jadwal Pertemuan A</h3>
            </div>

            <div class="space-y-2">
                <!-- Sub-bagian 1: Hari -->
                <div class="bg-white/40 p-3 rounded-xl border border-white/50 backdrop-blur-sm">
                    <h4 class="font-bold text-gray-700 mb-3 text-xs uppercase tracking-widest flex items-center gap-2">
                        <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Pilih Hari <span class="text-red-500">*</span>
                    </h4>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
                            <label class="relative text-center cursor-pointer group">
                                <input type="radio" name="day_A" value="{{ $hari }}" class="sr-only peer day-radio" data-target="A">
                                <div class="flex items-center justify-center h-full px-2 py-2 border-2 rounded-xl transition-colors duration-75 ease-out text-gray-600 border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm peer-checked:bg-primary-50 peer-checked:text-primary-700 peer-checked:border-primary-600 peer-checked:shadow-md hover:border-primary-300 hover:bg-white/80">
                                    <span class="font-bold text-xs sm:text-sm tracking-wide">{{ $hari }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Sub-bagian 2: Waktu -->
                <div class="bg-white/40 p-3 rounded-xl border border-white/50 backdrop-blur-sm">
                    <h4 class="font-bold text-gray-700 mb-3 text-xs uppercase tracking-widest flex items-center gap-2">
                        <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Pilih Waktu (Sesi) <span class="text-red-500">*</span>
                    </h4>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach($sesiList as $dbTime => $timeData)
                            <label class="relative text-center cursor-pointer group">
                                <input type="radio" name="time_A" value="{{ $dbTime }}" class="sr-only peer time-radio" data-target="A">
                                <div class="flex items-center justify-center h-full px-2 py-3 text-[10px] sm:text-xs lg:text-sm font-bold border-2 rounded-xl transition-colors duration-75 ease-out text-gray-600 border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm peer-checked:bg-primary-50 peer-checked:text-primary-700 peer-checked:border-primary-600 peer-checked:shadow-md hover:border-primary-300 hover:bg-white/80">
                                    <span class="tracking-tight whitespace-nowrap">{{ $timeData['start'] }} - {{ $timeData['end'] }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Error Message Container -->
                <div id="error_A" class="text-sm text-red-600 hidden bg-red-50 p-4 rounded-xl border border-red-200 mt-4 shadow-sm">
                    Jadwal tidak tersedia atau kuota penuh.
                </div>
            </div>
        </div>

        <!-- Jadwal Pertemuan B -->
        <div class="bg-white/70 backdrop-blur-md border border-white/60 rounded-3xl p-4 md:p-5 shadow-sm relative overflow-hidden transition-all duration-300 hover:shadow-lg hover:bg-white/90">
            <!-- Decorative top accent removed -->

            <div class="flex items-center gap-4 mb-3 border-b border-gray-100 pb-3">
                <div class="w-10 h-10 rounded-full bg-primary-50 flex items-center justify-center text-primary-700 font-black text-lg shadow-sm border border-primary-200">
                    B
                </div>
                <h3 class="text-xl font-extrabold text-gray-800 tracking-tight">Jadwal Pertemuan B</h3>
            </div>

            <div class="space-y-2">
                <!-- Sub-bagian 1: Hari -->
                <div class="bg-white/40 p-3 rounded-xl border border-white/50 backdrop-blur-sm">
                    <h4 class="font-bold text-gray-700 mb-3 text-xs uppercase tracking-widest flex items-center gap-2">
                        <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Pilih Hari <span class="text-red-500">*</span>
                    </h4>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
                            <label class="relative text-center cursor-pointer group">
                                <input type="radio" name="day_B" value="{{ $hari }}" class="sr-only peer day-radio" data-target="B">
                                <div class="flex items-center justify-center h-full px-2 py-2 border-2 rounded-xl transition-colors duration-75 ease-out text-gray-600 border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm peer-checked:bg-primary-50 peer-checked:text-primary-700 peer-checked:border-primary-600 peer-checked:shadow-md hover:border-primary-300 hover:bg-white/80">
                                    <span class="font-bold text-xs sm:text-sm tracking-wide">{{ $hari }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Sub-bagian 2: Waktu -->
                <div class="bg-white/40 p-3 rounded-xl border border-white/50 backdrop-blur-sm">
                    <h4 class="font-bold text-gray-700 mb-3 text-xs uppercase tracking-widest flex items-center gap-2">
                        <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Pilih Waktu (Sesi) <span class="text-red-500">*</span>
                    </h4>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach($sesiList as $dbTime => $timeData)
                            <label class="relative text-center cursor-pointer group">
                                <input type="radio" name="time_B" value="{{ $dbTime }}" class="sr-only peer time-radio" data-target="B">
                                <div class="flex items-center justify-center h-full px-2 py-3 text-[10px] sm:text-xs lg:text-sm font-bold border-2 rounded-xl transition-colors duration-75 ease-out text-gray-600 border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm peer-checked:bg-primary-50 peer-checked:text-primary-700 peer-checked:border-primary-600 peer-checked:shadow-md hover:border-primary-300 hover:bg-white/80">
                                    <span class="tracking-tight whitespace-nowrap">{{ $timeData['start'] }} - {{ $timeData['end'] }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Error Message Container -->
                <div id="error_B" class="text-sm text-red-600 hidden bg-red-50 p-4 rounded-xl border border-red-200 mt-4 shadow-sm">
                    Jadwal tidak tersedia atau kuota penuh.
                </div>
            </div>
        </div>

    </div>
    <x-antarmuka.galat-sebaris name="jadwal_1_id" />
    <x-antarmuka.galat-sebaris name="jadwal_2_id" />
</div>



<script>
document.addEventListener('DOMContentLoaded', function() {
    // Inject schedule data from backend
    const schedules = @json($mappedSchedules);

    function findScheduleId(day, time) {
        if(!day || !time) return null;
        let found = schedules.find(s => s.day === day && s.time === time);
        return found ? found : null;
    }

    function checkConflict() {
        const id1 = document.getElementById('jadwal_1_id').value;
        const id2 = document.getElementById('jadwal_2_id').value;
        const btnNext = document.querySelector('button[value="next"]');
        const errorB = document.getElementById('error_B');

        // Cek jika errorB berisi pesan bentrok, sembunyikan dulu jika sebelumnya bentrok
        if (errorB.textContent.includes('Bentrok')) {
            errorB.classList.add('hidden');
        }

        if (id1 && id2 && id1 === id2) {
            // Mencegah submit form
            errorB.innerHTML = '<strong class="text-red-600">⚠ Jadwal Bentrok!</strong><br><span class="text-xs">Jadwal Pertemuan B tidak boleh sama persis dengan Jadwal Pertemuan A. Silakan pilih kombinasi hari atau waktu yang berbeda.</span>';
            errorB.classList.remove('hidden');
            if (btnNext) {
                btnNext.disabled = true;
                btnNext.classList.add('opacity-50', 'cursor-not-allowed');
            }
        } else {
            // Bebaskan tombol submit
            if (btnNext) {
                btnNext.disabled = false;
                btnNext.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        }
    }

    function updateHiddenInput(target) {
        const dayRadio = document.querySelector(`input[name="day_${target}"]:checked`);
        const timeRadio = document.querySelector(`input[name="time_${target}"]:checked`);
        const hiddenInput = document.getElementById(`schedule_${target === 'A' ? '1' : '2'}_id`);
        const errorDiv = document.getElementById(`error_${target}`);

        if (dayRadio && timeRadio) {
            const sched = findScheduleId(dayRadio.value, timeRadio.value);
            if (sched) {
                if (sched.quota <= 0) {
                    hiddenInput.value = '';
                    errorDiv.innerHTML = '<strong>Maaf, kuota untuk jadwal ini sudah penuh.</strong><br><span class="text-xs">Silakan pilih hari atau sesi waktu yang lain.</span>';
                    errorDiv.classList.remove('hidden');
                } else {
                    hiddenInput.value = sched.id;
                    errorDiv.classList.add('hidden');
                }
            } else {
                hiddenInput.value = '';
                errorDiv.innerHTML = '<strong>Jadwal ini belum tersedia.</strong><br><span class="text-xs">Maaf, kelas untuk hari dan sesi ini belum tersedia untuk paket ini. Silakan pilih kombinasi lain.</span>';
                errorDiv.classList.remove('hidden');
            }
        } else {
            hiddenInput.value = '';
            errorDiv.classList.add('hidden');
        }

        checkConflict();

        // Trigger change event to trigger form validation/autosave logic
        hiddenInput.dispatchEvent(new Event('change', { bubbles: true }));
    }

    // Attach event listeners to all day and time radios
    document.querySelectorAll('.day-radio, .time-radio').forEach(el => {
        el.addEventListener('change', function() {
            updateHiddenInput(this.getAttribute('data-target'));
        });
    });

    // Function to re-select UI state based on saved hidden input value (e.g. from draft or old input)
    function restoreUIState(hiddenInputId, target) {
        const val = document.getElementById(hiddenInputId).value;
        if (val) {
            let s = schedules.find(x => x.id == val);
            if (s) {
                let dr = document.querySelector(`input[name="day_${target}"][value="${s.day}"]`);
                let tr = document.querySelector(`input[name="time_${target}"][value="${s.time}"]`);
                if (dr) dr.checked = true;
                if (tr) tr.checked = true;

                // Panggil checkConflict setelah me-restore UI
                checkConflict();
            }
        }
    }

    restoreUIState('jadwal_1_id', 'A');
    restoreUIState('jadwal_2_id', 'B');
});
</script>
