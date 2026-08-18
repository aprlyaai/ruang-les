<x-tata-letak-aplikasi>
    <div class="relative w-full min-h-screen overflow-x-hidden flex flex-col justify-center pt-28 pb-12 px-4 sm:px-6 lg:px-8">
        <!-- Latar Belakang SVG Ombak & Blobs -->
        <div class="absolute inset-0 w-full h-full z-[-1] pointer-events-none overflow-hidden bg-primary-50">
            <svg viewBox="0 0 1440 800" preserveAspectRatio="none" class="absolute inset-0 w-full h-full object-cover scale-[1.15] transform-gpu origin-center filter blur-lg">
                <rect width="1440" height="800" fill="var(--color-primary-50)" />
                <path fill="var(--color-primary-100)" d="M0,100 C200,200 500,-50 900,150 C1200,300 1350,50 1440,120 L1440,800 L0,800 Z" />
                <path fill="var(--color-primary-200)" d="M0,250 C300,100 600,350 950,200 C1200,100 1350,300 1440,220 L1440,800 L0,800 Z" />
                <path fill="var(--color-primary-350)" d="M0,350 C400,500 700,200 1000,450 C1250,600 1350,300 1440,400 L1440,800 L0,800 Z" />
                <path fill="var(--color-primary-400)" d="M0,550 C250,400 650,750 950,500 C1200,350 1380,600 1440,520 L1440,800 L0,800 Z" />
                <path fill="var(--color-primary-450)" d="M0,650 C350,850 550,550 1050,750 C1250,850 1350,600 1440,680 L1440,800 L0,800 Z" />
            </svg>
        </div>
        <style>
            @keyframes success-circle {
                0% { transform: scale(0); opacity: 0; }
                60% { transform: scale(1.2); opacity: 1; }
                100% { transform: scale(1); opacity: 1; }
            }
            .animate-success-circle {
                animation: success-circle 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            }
            
            @keyframes ripple {
                0% { transform: scale(0.8); opacity: 0.6; }
                100% { transform: scale(1.8); opacity: 0; }
            }

            .check-path {
                stroke-dasharray: 40;
                stroke-dashoffset: 40;
                animation: check-draw 0.6s ease-out forwards;
            }
            @keyframes check-draw {
                0% { stroke-dashoffset: 40; }
                100% { stroke-dashoffset: 0; }
            }
            
            @keyframes fade-in-up {
                0% { transform: translateY(30px); opacity: 0; }
                100% { transform: translateY(0); opacity: 1; }
            }
            .animate-fade-in-up {
                animation: fade-in-up 0.8s ease-out forwards;
            }
            
            .delay-100 { animation-delay: 100ms; }
            .delay-200 { animation-delay: 200ms; }
            .delay-300 { animation-delay: 300ms; }
            .delay-400 { animation-delay: 400ms; }
            .delay-500 { animation-delay: 500ms; }
            .opacity-0-init { opacity: 0; }
        </style>

        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-[-1] pointer-events-none">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob"></div>
            <div class="absolute top-48 -left-24 w-72 h-72 bg-primary-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        </div>

        <div class="relative z-10 max-w-2xl w-full mx-auto text-center">
            <div class="bg-white/60 backdrop-blur-md rounded-3xl shadow-sm border border-white/50 p-8 md:p-12 transition-all hover:shadow-md hover:bg-white/80 animate-fade-in-up opacity-0-init">
                <div class="relative mx-auto flex items-center justify-center h-28 w-28 mb-8">
                    <!-- Wavy Ripple 1 -->
                    <svg viewBox="0 0 24 24" class="absolute inset-0 w-full h-full text-primary-300 opacity-0 animate-[ripple_1.5s_cubic-bezier(0.165,0.84,0.44,1)_0.3s_forwards]" fill="none" stroke="currentColor" stroke-width="0.5">
                        <polygon points="12.000,0.500 14.640,2.148 17.750,2.041 19.212,4.788 21.959,6.250 21.852,9.360 23.500,12.000 21.852,14.640 21.959,17.750 19.212,19.212 17.750,21.959 14.640,21.852 12.000,23.500 9.360,21.852 6.250,21.959 4.788,19.212 2.041,17.750 2.148,14.640 0.500,12.000 2.148,9.360 2.041,6.250 4.788,4.788 6.250,2.041 9.360,2.148" stroke-linejoin="round" />
                    </svg>
                    <!-- Wavy Ripple 2 -->
                    <svg viewBox="0 0 24 24" class="absolute inset-0 w-full h-full text-primary-200 opacity-0 animate-[ripple_1.5s_cubic-bezier(0.165,0.84,0.44,1)_0.6s_forwards]" fill="none" stroke="currentColor" stroke-width="1">
                        <polygon points="12.000,0.500 14.640,2.148 17.750,2.041 19.212,4.788 21.959,6.250 21.852,9.360 23.500,12.000 21.852,14.640 21.959,17.750 19.212,19.212 17.750,21.959 14.640,21.852 12.000,23.500 9.360,21.852 6.250,21.959 4.788,19.212 2.041,17.750 2.148,14.640 0.500,12.000 2.148,9.360 2.041,6.250 4.788,4.788 6.250,2.041 9.360,2.148" stroke-linejoin="round" />
                    </svg>
                    
                    <!-- Main Wavy Badge Background -->
                    <svg viewBox="0 0 24 24" class="absolute inset-0 w-full h-full drop-shadow-[0_0_20px_rgba(66,108,60,0.4)] animate-success-circle delay-100 opacity-0-init">
                        <defs>
                            <linearGradient id="badge-grad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="var(--color-primary-400)" />
                                <stop offset="100%" stop-color="var(--color-primary-600)" />
                            </linearGradient>
                        </defs>
                        <polygon fill="url(#badge-grad)" stroke="currentColor" class="text-primary-500" stroke-width="0.5" stroke-linejoin="round" points="12.000,0.500 14.640,2.148 17.750,2.041 19.212,4.788 21.959,6.250 21.852,9.360 23.500,12.000 21.852,14.640 21.959,17.750 19.212,19.212 17.750,21.959 14.640,21.852 12.000,23.500 9.360,21.852 6.250,21.959 4.788,19.212 2.041,17.750 2.148,14.640 0.500,12.000 2.148,9.360 2.041,6.250 4.788,4.788 6.250,2.041 9.360,2.148" />
                    </svg>
                    
                    <!-- Animated SVG Checkmark -->
                    <svg class="relative z-10 h-16 w-16 text-white drop-shadow-md" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path class="check-path delay-500" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight mb-4 animate-fade-in-up delay-300 opacity-0-init">Pendaftaran Berhasil!</h2>
                <p class="text-gray-600 mb-8 leading-relaxed animate-fade-in-up delay-400 opacity-0-init">
                    Terima kasih telah mempercayakan bimbingan belajar putra/putri Anda kepada Ruang Les. 
                    Data pendaftaran dan bukti pembayaran Anda sedang diproses dan akan diverifikasi oleh Admin.
                </p>
                
                <div class="bg-primary-50/50 backdrop-blur-sm border border-primary-100 rounded-2xl p-5 mb-8 text-left inline-block w-full max-w-lg mx-auto shadow-sm animate-fade-in-up delay-500 opacity-0-init">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 mt-0.5">
                            <div class="w-6 h-6 rounded-full bg-primary-200 flex items-center justify-center text-primary-700">
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-primary-800 leading-relaxed font-medium">
                                Status verifikasi pendaftaran dapat Anda pantau secara berkala melalui dashboard akun Anda.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="animate-fade-in-up delay-500 opacity-0-init">
                    <a href="{{ url('/') }}" class="inline-flex items-center justify-center px-8 py-3.5 border border-transparent shadow-[0_8px_20px_-6px_rgba(183,217,177,0.6)] hover:shadow-[0_12px_25px_-6px_rgba(183,217,177,0.8)] text-sm font-extrabold rounded-2xl text-white bg-primary-700 hover:bg-primary-800 focus:outline-none focus-visible:ring-4 focus-visible:ring-primary-300 transition-all transform hover:-translate-y-1 group">
                        Kembali ke Beranda
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-tata-letak-aplikasi>

