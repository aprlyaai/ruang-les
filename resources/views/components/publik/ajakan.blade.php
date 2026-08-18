@props(['settings'])

<section class="pb-24 lg:pb-32 relative overflow-hidden">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-primary-600 to-primary-800 rounded-[2.5rem] p-8 md:p-12 shadow-2xl relative overflow-hidden flex flex-col items-center text-center transform transition-all duration-500 hover:shadow-[0_20px_50px_rgba(66,108,60,0.3)] hover:-translate-y-1">
            <!-- Decorative background patterns -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full mix-blend-overlay filter blur-3xl transform translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/10 rounded-full mix-blend-overlay filter blur-3xl transform -translate-x-1/2 translate-y-1/2 pointer-events-none"></div>
            
            <h2 class="font-heading text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white mb-4 tracking-tight relative z-10">
                {!! nl2br(e($settings['cta_headline'] ?? 'Siap Memulai Perjalanan Belajar Anak Anda?')) !!}
            </h2>
            <p class="text-primary-50 text-base md:text-lg max-w-2xl mb-8 leading-relaxed relative z-10">
                {{ $settings['cta_description'] ?? 'Bergabunglah bersama ratusan orang tua lainnya yang telah mempercayakan pendidikan karakter dan akademik putra-putrinya di Ruang Les.' }}
            </p>
            <div class="relative z-10">
                @guest
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-base font-bold rounded-full text-primary-800 bg-white hover:bg-primary-50 focus:outline-none focus:ring-4 focus:ring-primary-300 transition-all shadow-xl hover:shadow-2xl transform hover:-translate-y-1 group">
                        {{ $settings['cta_button_text'] ?? 'Daftar Sekarang' }}
                        <svg class="w-5 h-5 ml-3 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                @else
                    <a href="{{ route('pendaftaran.form') }}" class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-base font-bold rounded-full text-primary-800 bg-white hover:bg-primary-50 focus:outline-none focus:ring-4 focus:ring-primary-300 transition-all shadow-xl hover:shadow-2xl transform hover:-translate-y-1 group">
                        {{ $settings['cta_button_text'] ?? 'Daftar Sekarang' }}
                        <svg class="w-5 h-5 ml-3 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                @endguest
            </div>
        </div>
    </div>
</section>
