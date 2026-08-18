<x-tata-letak-publik>
    <!-- 
    Syntax sebelumnya
    <div class="relative w-full min-h-screen overflow-x-hidden flex flex-col justify-center py-12 px-4 sm:px-6 lg:px-8">
    
    Syntax sekarang -->
    <div class="relative w-full min-h-screen overflow-x-hidden flex flex-col justify-center pt-28 pb-12 px-4 sm:px-6 lg:px-8">
        <!-- LATAR BELAKANG MERAH: Ombak SVG & Blobs -->
        <div class="absolute inset-0 w-full h-full z-[-1] pointer-events-none overflow-hidden bg-red-50">
            <svg viewBox="0 0 1440 800" preserveAspectRatio="none" class="absolute inset-0 w-full h-full object-cover scale-[1.15] transform-gpu origin-center filter blur-lg">
                <rect width="1440" height="800" fill="#fef2f2" /> <!-- red-50 -->
                <path fill="#fee2e2" d="M0,100 C200,200 500,-50 900,150 C1200,300 1350,50 1440,120 L1440,800 L0,800 Z" /> <!-- red-100 -->
                <path fill="#fecaca" d="M0,250 C300,100 600,350 950,200 C1200,100 1350,300 1440,220 L1440,800 L0,800 Z" /> <!-- red-200 -->
                <path fill="#fca5a5" d="M0,350 C400,500 700,200 1000,450 C1250,600 1350,300 1440,400 L1440,800 L0,800 Z" /> <!-- red-300 -->
                <path fill="#f87171" d="M0,550 C250,400 650,750 950,500 C1200,350 1380,600 1440,520 L1440,800 L0,800 Z" /> <!-- red-400 -->
                <path fill="#ef4444" d="M0,650 C350,850 550,550 1050,750 C1250,850 1350,600 1440,680 L1440,800 L0,800 Z" /> <!-- red-500 -->
            </svg>
        </div>

        <!-- Decorative Blobs -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-red-200 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob"></div>
            <div class="absolute top-48 -left-24 w-72 h-72 bg-red-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        </div>

        <div class="relative z-10 w-full max-w-md mx-auto">
            <!-- Glassmorphism Card -->
            <div class="bg-white/80 backdrop-blur-xl rounded-[2.5rem] shadow-[0_8px_30px_rgb(239,68,68,0.15)] border border-white/50 p-8 sm:p-10 text-center transform transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_50px_rgb(239,68,68,0.25)]">
                
                <!-- Ikon Peringatan -->
                <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-red-100 mb-6">
                    <svg class="h-10 w-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                
                <h2 class="text-3xl font-extrabold text-gray-900 mb-2 font-heading tracking-tight">Akses Ditolak!</h2>
                
                <!-- Pesan Identitas -->
                <p class="text-gray-600 mb-6 text-sm leading-relaxed">
                    Halo <span class="font-bold text-gray-900">{{ $user->name }}</span>, sistem mendeteksi Anda masuk sebagai <span class="uppercase font-bold text-red-600 bg-red-50 px-2 py-0.5 rounded">{{ $user->role }}</span>. 
                </p>
                
                <!-- Teguran Kuning -->
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-8 text-left rounded-r-xl shadow-sm">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-yellow-700 font-medium">
                                Formulir pendaftaran publik ini KHUSUS untuk Orang Tua/Wali Murid. Anda tidak bisa menambahkan murid baru di sini agar data tidak tumpang tindih.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Tombol Kembali -->
                @if($user->role === 'admin')
                    <a href="{{ url('/admin/dashboard') }}" class="w-full flex items-center justify-center py-4 px-6 border border-transparent rounded-full shadow-lg text-sm font-bold text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 transition-all transform hover:-translate-y-1 group">
                        Kembali ke Dashboard Admin
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                @elseif($user->role === 'mentor')
                    <a href="{{ url('/mentor/dashboard') }}" class="w-full flex items-center justify-center py-4 px-6 border border-transparent rounded-full shadow-lg text-sm font-bold text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 transition-all transform hover:-translate-y-1 group">
                        Kembali ke Dashboard Mentor
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                @else
                    <a href="{{ url('/') }}" class="w-full flex items-center justify-center py-4 px-6 border border-transparent rounded-full shadow-lg text-sm font-bold text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 transition-all transform hover:-translate-y-1 group">
                        Kembali ke Beranda
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                @endif
            </div>
        </div>
    </div>
</x-tata-letak-publik>
