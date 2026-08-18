<x-tata-letak-aplikasi>
@php
    $stepNames = [
        1 => 'Identitas Anak',
        2 => 'Akademik',
        3 => 'Informasi Orang Tua/Wali',
        4 => 'Paket Belajar',
        5 => 'Preferensi Jadwal',
        6 => 'Preview Data',
        7 => 'Pembayaran dan Konfirmasi'
    ];
    $stepInstructions = [
        1 => 'Silakan lengkapi data diri anak Anda di bawah ini dengan benar.',
        2 => 'Silakan lengkapi riwayat sekolah dan kebutuhan belajar anak Anda saat ini.',
        3 => 'Silakan lengkapi data orang tua atau wali sebagai penanggung jawab murid.',
        4 => 'Silakan pilih salah satu paket bimbingan belajar yang paling sesuai dengan kebutuhan buah hati Anda.',
        5 => 'Dalam satu minggu terdapat 2 kali pertemuan. Tentukan kombinasi hari dan sesi waktu yang diinginkan.',
        6 => 'Mohon periksa kembali seluruh ringkasan data pendaftaran Anda sebelum melakukan submit final',
        7 => 'Tahap akhir pendaftaran. Silakan lakukan pembayaran sesuai instruksi dan unggah bukti transfer Anda.'
    ];
@endphp

    <div class="relative w-full min-h-screen overflow-x-hidden flex flex-col justify-start pt-38 pb-22 px-4 sm:px-6 lg:px-8">
        <!-- Latar Belakang SVG Ombak & Blobs -->
        <div class="fixed inset-0 w-full h-full z-[-1] pointer-events-none overflow-hidden bg-primary-50">
            <svg viewBox="0 0 1440 800" preserveAspectRatio="none" class="absolute inset-0 w-full h-full object-cover scale-[1.15] transform-gpu origin-center filter blur-lg">
                <rect width="1440" height="800" fill="var(--color-primary-50)" />
                <path fill="var(--color-primary-100)" d="M0,100 C200,200 500,-50 900,150 C1200,300 1350,50 1440,120 L1440,800 L0,800 Z" />
                <path fill="var(--color-primary-200)" d="M0,250 C300,100 600,350 950,200 C1200,100 1350,300 1440,220 L1440,800 L0,800 Z" />
                <path fill="var(--color-primary-350)" d="M0,350 C400,500 700,200 1000,450 C1250,600 1350,300 1440,400 L1440,800 L0,800 Z" />
                <path fill="var(--color-primary-400)" d="M0,550 C250,400 650,750 950,500 C1200,350 1380,600 1440,520 L1440,800 L0,800 Z" />
                <path fill="var(--color-primary-450)" d="M0,650 C350,850 550,550 1050,750 C1250,850 1350,600 1440,680 L1440,800 L0,800 Z" />
            </svg>
        </div>
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-[-1] pointer-events-none">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob"></div>
            <div class="absolute top-48 -left-24 w-72 h-72 bg-primary-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        </div>

        <div class="relative z-10 w-full max-w-5xl mx-auto">

        <!-- Judul -->
        <div class="text-center mb-12">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 font-heading tracking-tight">Formulir Pendaftaran Siswa Baru</h1>
            <p class="text-sm text-gray-500 mt-2">Ruang Les by Ismaturrohmah — Bimbel Sekolah Dasar</p>
        </div>

        <!-- Progress Bar (Outside Card) -->
        <div class="px-2 md:px-8 max-w-4xl mx-auto">
            <div class="relative w-full">
                <!-- Background dashed line -->
                <div class="absolute left-[calc(100%/14)] right-[calc(100%/14)] top-7 md:top-8 transform -translate-y-1/2 h-[2px] border-t-[3px] border-dashed border-primary-500 z-0"></div>

                <!-- Active Progress Line -->
                <div class="absolute left-[calc(100%/14)] top-7 md:top-8 transform -translate-y-1/2 h-[3px] bg-gradient-to-r from-primary-400 to-primary-600 z-0 transition-all duration-500" style="width: calc((100% / 7) * {{ $draft->current_step - 1 }});"></div>

                <div class="grid grid-cols-7 w-full relative z-10">
                    @for ($i = 1; $i <= 7; $i++)
                        <div class="relative flex flex-col items-center">
                            <!-- Step Circle Wrapper (fixed height to align text) -->
                        <div class="h-14 md:h-16 flex items-center justify-center relative z-10 mb-2 md:mb-3">
                            @if ($i < $draft->current_step)
                                <!-- Completed Step (Clickable) -->
                                <button type="submit" name="action" value="jump_{{ $i }}" form="formPendaftaran" formnovalidate class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-gradient-to-tr from-primary-600 to-primary-400 text-white flex items-center justify-center font-bold shadow-md shadow-primary-500/30 ring-4 ring-primary-100 transform transition-all duration-300 hover:scale-110 hover:ring-primary-200 cursor-pointer focus:outline-none focus:ring-primary-300">
                                    <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </button>
                            @elseif ($i == $draft->current_step)
                                <!-- Current Step -->
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-white/95 backdrop-blur-sm border-[3px] border-primary-600 text-primary-700 flex items-center justify-center font-extrabold shadow-lg shadow-primary-500/20 ring-4 ring-primary-100 transform scale-110 transition">
                                    {{ $i }}
                                </div>
                            @else
                                <!-- Upcoming Step -->
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-white/60 backdrop-blur-sm border-2 border-white/80 text-gray-400 flex items-center justify-center font-bold shadow-sm ring-4 ring-transparent transition">
                                    {{ $i }}
                                </div>
                            @endif
                        </div>

                        <!-- Step Title -->
                        <div class="hidden sm:flex w-full items-start justify-center px-1">
                            @if ($i < $draft->current_step)
                                <span class="text-[10px] md:text-xs font-semibold text-primary-600 text-center leading-tight transition-colors">{{ $stepNames[$i] }}</span>
                            @elseif ($i == $draft->current_step)
                                <span class="text-[10px] md:text-xs font-extrabold text-primary-800 text-center leading-tight transition-colors">{{ $stepNames[$i] }}</span>
                            @else
                                <span class="text-[10px] md:text-xs font-medium text-gray-400 text-center leading-tight transition-colors">{{ $stepNames[$i] }}</span>
                            @endif
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <!-- Main Card (Glassmorphism) -->
        <div class="mt-12 bg-white/80 backdrop-blur-xl rounded-3xl shadow-[0_8px_30px_rgb(66,108,60,0.15)] overflow-hidden border border-white/50 transition-all duration-500 hover:shadow-[0_20px_50px_rgb(66,108,60,0.2)]">
            <!-- Dynamic Card Header -->
            <div class="bg-white/50 backdrop-blur-md px-6 py-5 border-b border-gray-200/50 flex items-center gap-4">
                <div class="w-12 h-12 sm:w-12 sm:h-12 bg-gradient-to-br from-primary-500 to-primary-700 rounded-xl sm:rounded-2xl text-white flex items-center justify-center font-extrabold text-xl sm:text-2xl shrink-0 shadow-lg shadow-primary-500/30">
                    {{ $draft->current_step }}
                </div>
                <div>
                    <h2 class="text-lg md:text-xl font-extrabold text-slate-900 font-heading">{{ $stepNames[$draft->current_step] }}</h2>
                    <p class="text-xs md:text-sm text-gray-500 mt-0.5">{{ $stepInstructions[$draft->current_step] }}</p>
                </div>
            </div>

            <!-- Card Body Form -->
            <div class="p-6 md:p-8">
                <form id="formPendaftaran" action="{{ route('pendaftaran.save') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf



                    @if ($draft->current_step == 1)
                        @include('pendaftaran.langkah1-identitas')
                    @elseif ($draft->current_step == 2)
                        @include('pendaftaran.langkah2-akademik')
                    @elseif ($draft->current_step == 3)
                        @include('pendaftaran.langkah3-ortu')
                    @elseif ($draft->current_step == 4)
                        @include('pendaftaran.langkah4-paket')
                    @elseif ($draft->current_step == 5)
                        @include('pendaftaran.langkah5-jadwal')
                    @elseif ($draft->current_step == 6)
                        @include('pendaftaran.langkah6-review')
                    @elseif ($draft->current_step == 7)
                        @include('pendaftaran.langkah7-pembayaran')
                    @endif

                    <!-- Card Footer (Navigation) -->
                    <div class="mt-10 flex flex-col-reverse sm:flex-row items-center justify-between pt-6 border-t-2 border-gray-200 gap-4">
                        <!-- Sisi Kiri: Tombol Kembali -->
                        <div class="w-full sm:w-1/3 flex justify-start">
                            @if ($draft->current_step > 1)
                                <button type="submit" name="action" value="back" formnovalidate class="w-full sm:w-auto whitespace-nowrap inline-flex items-center justify-center px-8 py-3.5 border border-gray-200 shadow-sm text-sm font-extrabold rounded-2xl text-gray-700 bg-white/80 backdrop-blur-sm hover:bg-white hover:text-primary-800 focus:outline-none focus-visible:ring-4 focus-visible:ring-primary-300 transition-all transform hover:-translate-y-1 group">
                                    <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                                    Kembali
                                </button>
                            @endif
                        </div>

                        <!-- Bagian Tengah: Teks Posisi Langkah -->
                        <div class="w-full sm:w-1/3 flex justify-center">
                            <span class="text-sm font-bold text-gray-500 bg-white/50 px-4 py-1 rounded-full border border-white/60 shadow-inner">Langkah {{ $draft->current_step }} dari 7</span>
                        </div>

                        <!-- Sisi Kanan: Tombol Lanjut/Selesai -->
                        <div class="w-full sm:w-1/3 flex justify-end">
                            @if ($draft->current_step == 7)
                                <button type="submit" name="action" value="next" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 border border-transparent shadow-[0_8px_20px_-6px_rgba(183,217,177,0.6)] hover:shadow-[0_12px_25px_-6px_rgba(183,217,177,0.8)] text-sm font-extrabold rounded-2xl text-white bg-primary-700 hover:bg-primary-800 focus:outline-none focus-visible:ring-4 focus-visible:ring-primary-300 transition-all transform hover:-translate-y-1 group">
                                    Selesai & Kirim Data
                                </button>
                            @else
                                <button type="submit" name="action" value="next" class="w-full sm:w-auto whitespace-nowrap inline-flex items-center justify-center px-8 py-3.5 border border-transparent shadow-[0_8px_20px_-6px_rgba(183,217,177,0.6)] hover:shadow-[0_12px_25px_-6px_rgba(183,217,177,0.8)] text-sm font-extrabold rounded-2xl text-white bg-primary-700 hover:bg-primary-800 focus:outline-none focus-visible:ring-4 focus-visible:ring-primary-300 transition-all transform hover:-translate-y-1 group">
                                    Selanjutnya
                                    <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div> <!-- End of relative z-10 w-full max-w-5xl mx-auto -->
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tanggalLahirInput = document.getElementById('tanggal_lahir_murid');
            const usiaDisplay = document.getElementById('usia_display');

            if (tanggalLahirInput && usiaDisplay) {
                function calculateAge() {
                    const dobValue = tanggalLahirInput.value;
                    if (!dobValue) {
                        usiaDisplay.value = '';
                        return;
                    }

                    const dob = new Date(dobValue);
                    const today = new Date();

                    let years = today.getFullYear() - dob.getFullYear();
                    let months = today.getMonth() - dob.getMonth();

                    if (months < 0 || (months === 0 && today.getDate() < dob.getDate())) {
                        years--;
                        months += 12;
                    }

                    if (today.getDate() < dob.getDate()) {
                        months--;
                        if(months < 0) {
                            months = 11;
                        }
                    }

                    if (years < 0) {
                        usiaDisplay.value = 'Tanggal Lahir Tidak Valid';
                    } else {
                        usiaDisplay.value = `${years} Tahun ${months} Bulan`;
                    }
                }

                tanggalLahirInput.addEventListener('change', calculateAge);
                tanggalLahirInput.addEventListener('input', calculateAge);

                // Hitung otomatis saat dimuat jika sudah ada nilainya (draf)
                calculateAge();
            }

            // File input upload preview & Drag-and-Drop script
            const fileInput = document.getElementById('bukti_bayar');
            const uploadContainer = document.getElementById('upload-container');

            if (fileInput && uploadContainer) {
                // Prevent default behaviors for drag and drop
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    uploadContainer.addEventListener(eventName, preventDefaults, false);
                });

                function preventDefaults(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                // Highlight container on drag over
                ['dragenter', 'dragover'].forEach(eventName => {
                    uploadContainer.addEventListener(eventName, highlight, false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    uploadContainer.addEventListener(eventName, unhighlight, false);
                });

                function highlight() {
                    uploadContainer.classList.remove('border-gray-300');
                    uploadContainer.classList.add('border-primary', 'bg-primary-50');
                }

                function unhighlight() {
                    if (fileInput.files.length === 0) {
                        uploadContainer.classList.remove('border-primary', 'bg-primary-50');
                        uploadContainer.classList.add('border-gray-300');
                    }
                }

                // Handle dropped files
                uploadContainer.addEventListener('drop', handleDrop, false);

                function handleDrop(e) {
                    const dt = e.dataTransfer;
                    const files = dt.files;

                    if (files.length > 0) {
                        fileInput.files = files; // Assign files to file input
                        // Trigger change event to trigger preview logic
                        const event = new Event('change', { bubbles: true });
                        fileInput.dispatchEvent(event);
                    }
                }

                // Main Change Event logic
                fileInput.addEventListener('change', function(e) {
                    const uploadPlaceholder = document.getElementById('upload-placeholder');
                    const uploadPreview = document.getElementById('upload-preview');
                    const imgPreviewContainer = document.getElementById('img-preview-container');
                    const imgPreview = document.getElementById('img-preview');
                    const fileIconContainer = document.getElementById('file-icon-container');
                    const previewFilename = document.getElementById('preview-filename');
                    const previewFilesize = document.getElementById('preview-filesize');

                    if (e.target.files.length > 0) {
                        const file = e.target.files[0];

                        // Show selected state styling
                        uploadContainer.classList.remove('border-gray-300');
                        uploadContainer.classList.add('border-primary', 'bg-primary-50', 'border-solid');
                        uploadContainer.classList.remove('border-dashed');

                        uploadPlaceholder.classList.add('hidden');
                        uploadPreview.classList.remove('hidden');

                        // Set filename and size
                        previewFilename.textContent = file.name;
                        const sizeInMB = (file.size / (1024 * 1024)).toFixed(2);
                        previewFilesize.textContent = `${sizeInMB} MB`;

                        // Show thumbnail preview if image
                        if (file.type.startsWith('image/')) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                imgPreview.src = e.target.result;
                                imgPreviewContainer.classList.remove('hidden');
                                fileIconContainer.classList.add('hidden');
                            };
                            reader.readAsDataURL(file);
                        } else {
                            // Show document/PDF icon instead
                            imgPreviewContainer.classList.add('hidden');
                            fileIconContainer.classList.remove('hidden');
                        }
                    } else {
                        // Reset to placeholder state
                        uploadContainer.classList.remove('border-primary', 'bg-primary-50', 'border-solid');
                        uploadContainer.classList.add('border-gray-300', 'border-dashed');
                        uploadPlaceholder.classList.remove('hidden');
                        uploadPreview.classList.add('hidden');
                    }
                });
            }

            // Autosave Logic
            const formPendaftaran = document.getElementById('formPendaftaran');
            if (formPendaftaran) {
                const inputs = formPendaftaran.querySelectorAll('input:not([type="hidden"]), select, textarea');
                let autosaveTimeout = null;

                inputs.forEach(input => {
                    input.addEventListener('change', function() {
                        clearTimeout(autosaveTimeout);
                        autosaveTimeout = setTimeout(() => {
                            const formData = new FormData(formPendaftaran);
                            fetch('{{ route("pendaftaran.autosave") }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Accept': 'application/json',
                                },
                                body: formData
                            }).then(response => response.json())
                            .then(data => {
                                if(data.success) console.log('Draft autosaved');
                            })
                            .catch(error => console.error('Autosave error:', error));
                        }, 500);
                    });
                });
            }
        });
    </script>
    @endpush
</x-tata-letak-aplikasi>

