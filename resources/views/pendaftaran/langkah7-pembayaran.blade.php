<!-- Langkah 7: Pembayaran dan Konfirmasi -->
<div class="space-y-6">
    @php
        $selectedPaket = isset($draft->draft_data['program_id']) ? collect($pakets)->firstWhere('program_id', $draft->draft_data['program_id']) : null;
    @endphp

    <!-- Informasi Pembayaran Card -->
    <div class="bg-white/60 backdrop-blur-md border border-white/50 rounded-2xl p-5 md:p-6 shadow-sm relative overflow-hidden transition-all duration-300 hover:shadow-md hover:bg-white/80">

        <div class="flex flex-col md:flex-row gap-6 justify-between items-start">
            <!-- Total Bill Section -->
            <div class="flex-1 w-full">
                <div class="flex items-center gap-3 mb-3 border-b border-gray-100 pb-3">
                    <div class="w-10 h-10 rounded-full bg-primary-50 border border-primary-200 flex items-center justify-center text-primary-700 shadow-sm shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-gray-800 tracking-tight">Tagihan Pembayaran</h3>
                </div>

                <p class="text-sm font-medium text-gray-600 mb-3">Total tagihan untuk paket pilihan Anda <strong class="text-gray-900 font-bold">{{ $selectedPaket ? ($selectedPaket->nama_program ?? $selectedPaket->nama_program) : '' }}</strong>:</p>

                <div class="inline-block bg-gradient-to-br from-primary-600 to-primary-800 rounded-2xl px-6 py-5 shadow-lg relative overflow-hidden group">
                    <div class="absolute -right-4 -top-4 w-20 h-20 bg-white/10 rounded-full blur-xl group-hover:scale-150 transition-transform duration-700"></div>
                    <span class="block text-[10px] font-bold text-primary-100 uppercase tracking-widest mb-1 opacity-90 relative z-10">Total yang harus dibayar</span>
                    <p class="text-4xl font-black text-white tracking-tight relative z-10">
                        Rp {{ $selectedPaket ? number_format($selectedPaket->harga ?? $selectedPaket->harga, 0, ',', '.') : '0' }}
                    </p>
                </div>
            </div>

            <!-- Bank Details Section -->
            <div class="flex-1 w-full relative">
                <p class="text-sm font-bold text-gray-700 mb-3 uppercase tracking-widest flex items-center gap-2">
                    <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    Tujuan Transfer
                </p>

                <!-- Mock Bank Card -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-5 md:p-6 text-white shadow-xl relative overflow-hidden group">
                    <!-- Card Accents -->
                    <div class="absolute -right-8 -top-8 w-32 h-32 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700 ease-in-out"></div>
                    <div class="absolute -left-6 -bottom-6 w-24 h-24 bg-primary-500/50 rounded-full blur-xl"></div>

                    <div class="relative z-10">
                        <div class="flex justify-between items-center mb-5">
                            <span class="text-2xl font-black tracking-widest text-gray-100 italic">{{ $settings['nama_bank'] ?? 'Bank Central Asia (BCA)' }}</span>
                            <svg class="w-8 h-8 text-white/30" fill="currentColor" viewBox="0 0 24 24"><path d="M21.93 10.37A6.47 6.47 0 0019 6c-2.4-.6-4.5 1-4.5 1S12.4 5.4 10 6A6.47 6.47 0 007.07 10.37C6.1 13 8 18 8 18c0 0 2-1 4-1s4 1 4 1c0 0 1.9-5 1.07-7.63z"></path></svg>
                        </div>

                        <div class="mb-3 flex justify-between items-end">
                            <div>
                                <span class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Nomor Rekening</span>
                                <div class="flex items-center gap-3">
                                    <span id="rekening-number" class="font-mono text-2xl md:text-3xl tracking-[0.15em] font-medium text-white shadow-sm">{{ $settings['nomor_akun_bank'] ?? '7340033447' }}</span>
                                    <button type="button" onclick="copyRekening()" class="p-2 rounded-xl bg-white/10 hover:bg-white/20 transition-all focus:ring-2 focus:ring-white/50 group/copy relative" title="Salin Nomor Rekening">
                                        <svg class="w-5 h-5 text-gray-300 group-hover/copy:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                        <span id="copy-tooltip" class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-900 text-white text-[10px] font-bold px-2 py-1 rounded opacity-0 transition-opacity whitespace-nowrap pointer-events-none">Tersalin!</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div>
                            <span class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Atas Nama</span>
                            <span class="font-bold tracking-widest text-sm uppercase text-gray-100">{{ $settings['nama_akun_bank'] ?? 'ISMATURROHMAH' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Bukti Card -->
    <div class="bg-white/60 backdrop-blur-md border border-white/50 rounded-2xl p-5 md:p-6 shadow-sm transition-all duration-300 hover:shadow-md hover:bg-white/80">
        <div class="flex items-center gap-3 mb-3 border-b border-gray-100 pb-3">
            <div class="w-10 h-10 rounded-full bg-primary-50 flex items-center justify-center text-primary-700 shadow-sm border border-primary-200 shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
            </div>
            <h3 class="text-xl font-extrabold text-gray-800 tracking-tight">Unggah Bukti Pembayaran <span class="text-red-500 ml-1">*</span></h3>
        </div>

        <div class="mt-4">
            <x-antarmuka.unggah-berkas name="bukti_bayar" x-show-error="{{ $errors->has('bukti_bayar') ? 'true' : 'false' }}">
                <span class="font-bold text-primary-700">Rasio Foto: 4:3</span><br>
                Format: JPEG, JPG, PNG, WEBP, PDF.<br>
                Maksimal berukuran 2MB.
            </x-antarmuka.unggah-berkas>

            <x-antarmuka.galat-sebaris name="bukti_bayar" />
        </div>
    </div>
</div>

<script>
function copyRekening() {
    const rekening = '{{ $settings['nomor_akun_bank'] ?? '7340033447' }}';
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(rekening).then(() => {
            showTooltip();
        }).catch(err => {
            fallbackCopy(rekening);
        });
    } else {
        fallbackCopy(rekening);
    }
}

function fallbackCopy(text) {
    const textArea = document.createElement("textarea");
    textArea.value = text;
    textArea.style.position = "fixed";
    textArea.style.left = "-9999px";
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    try {
        document.execCommand('copy');
        showTooltip();
    } catch (err) {
        console.error('Fallback copy failed: ', err);
        alert('Gagal menyalin nomor rekening. Silakan salin manual.');
    }
    document.body.removeChild(textArea);
}

function showTooltip() {
    const tooltip = document.getElementById('copy-tooltip');
    if (tooltip) {
        tooltip.classList.remove('opacity-0');
        tooltip.classList.add('opacity-100');
        setTimeout(() => {
            tooltip.classList.remove('opacity-100');
            tooltip.classList.add('opacity-0');
        }, 2000);
    }
}
</script>
