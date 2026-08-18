<x-tata-letak-publik>
    <div class="relative w-full overflow-x-hidden">
        <!-- LATAR BELAKANG: Ombak SVG & Blobs -->
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

        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob"></div>
            <div class="absolute top-48 -left-24 w-72 h-72 bg-primary-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        </div>

        <x-publik.pengantar-tentang :settings="$settings" />

        <!-- Divider -->
        <div class="max-w-[90rem] mx-auto h-[3px] bg-gradient-to-r from-transparent via-primary-700/40 to-transparent w-[90%] relative z-10 rounded-full my-8"></div>

        <x-publik.galeri-tentang :settings="$settings" :galleries="$galleries" />

        <x-publik.ajakan :settings="$settings" />

    </div>
</x-tata-letak-publik>
