<x-tata-letak-publik>
    <div class="relative w-full overflow-x-hidden">
        <!-- LATAR BELAKANG: Menampilkan efek gelombang animasi menggunakan elemen SVG -->
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

        <x-publik.utama :settings="$settings" :firstLine="$firstLine" :secondLine="$secondLine" />
        
        <!-- Divider -->
        <div class="max-w-[90rem] mx-auto h-[3px] bg-gradient-to-r from-transparent via-primary-700/40 to-transparent w-[90%] relative z-10 rounded-full"></div>
        
        <x-publik.keunggulan :features="$features" :settings="$settings" />
        
        <!-- Divider -->
        <div class="max-w-[90rem] mx-auto h-[3px] bg-gradient-to-r from-transparent via-primary-700/40 to-transparent w-[90%] relative z-10 rounded-full"></div>
        
        <x-publik.program :groupedPackages="$groupedPackages" :settings="$settings" />
        
        <!-- Divider -->
        <div class="max-w-[90rem] mx-auto h-[3px] bg-gradient-to-r from-transparent via-primary-700/40 to-transparent w-[90%] relative z-10 rounded-full"></div>
        
        <x-publik.testimoni :testimonials="$testimonials" :settings="$settings" />
        
        <!-- Divider -->
        <div class="max-w-[90rem] mx-auto h-[3px] bg-gradient-to-r from-transparent via-primary-700/40 to-transparent w-[90%] relative z-10 rounded-full"></div>
        
        <x-publik.faq :faqs="$faqs" :settings="$settings" />
        
        <x-publik.ajakan :settings="$settings" />
    </div>

    <!-- BAGIAN GAYA CSS KHUSUS: Mengatur animasi tambahan seperti efek melayang (blob) dan sembunyikan scrollbar -->
    <style>
        /* Custom Animations */
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .perspective {
            perspective: 1000px;
        }
        .pattern-dots {
            background-image: radial-gradient(currentColor 1px, transparent 1px);
            background-size: 20px 20px;
        }
        .animate-bounce-slow {
            animation: bounce 3s infinite;
        }
        /* Hide scrollbar for slider */
        .scrollbar-hide {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none; /* Chrome, Safari and Opera */
        }
    </style>
</x-tata-letak-publik>
