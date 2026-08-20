@props(['isLocked' => false])

<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-[10000] w-64 lg:w-[16rem] h-full transition-transform duration-150 ease-in-out lg:relative lg:translate-x-0 bg-primary-500/80 backdrop-blur-md border border-primary-100/50 shadow-sm rounded-r-2xl lg:rounded-2xl flex flex-col overflow-hidden">
    <!-- Logo Area -->
    <div class="flex items-center justify-start h-20 border-b border-primary-100/50 bg-white/40 px-6">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 overflow-hidden rounded-xl border border-gray-200 shadow-sm flex-shrink-0 bg-white">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Ruang Les" class="w-full h-full object-cover" onerror="this.src='https://ui-avatars.com/api/?name=RL&background=e5f2e2&color=426c3c&rounded=true'">
            </div>
            <div class="flex flex-col justify-center">
                <span class="font-heading text-2xl font-extrabold text-gray-900 leading-none tracking-tight">{{ $settings['site_name'] ?? 'Ruang Les' }}</span>
                <span class="text-sm font-medium text-primary-700">by Ismaturrohmah</span>
            </div>
        </div>
    </div>
    
    <!-- Navigation Links -->
    <nav class="flex-1 px-3 pt-7 pb-6 space-y-1.5 overflow-y-auto custom-scrollbar text-sm font-medium">
        
        <a href="{{ route('dashboard') }}" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm' }}">
            <div class="w-7 h-7 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600' }} flex items-center justify-center mr-3 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            </div>
            Dashboard
        </a>

        <div class="pt-5 pb-2">
            <p class="px-1 text-xs font-bold tracking-wider text-gray-500 uppercase">Akademik</p>
        </div>
        
        @if($isLocked)
            @foreach([
                ['label' => 'Jadwal Kelas'],
                ['label' => 'Buku Akademik'],
                ['label' => 'Materi Belajar'],
            ] as $menu)
            <div class="flex items-center px-3 py-2 rounded-xl text-gray-500 opacity-60 cursor-not-allowed">
                <div class="w-7 h-7 rounded-lg bg-gray-100 text-gray-400 flex items-center justify-center mr-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                {{ $menu['label'] }}
            </div>
            @endforeach
        @else
            @php
                $isJadwalActive = request()->routeIs('ortu.jadwal');
                $isBukuAkademikActive = request()->routeIs('ortu.buku-akademik', 'ortu.buku-akademik.*');
                $isRepositoriActive = request()->routeIs('ortu.repositori', 'ortu.repositori.*');
            @endphp
            
            <a href="{{ route('ortu.jadwal') }}" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 {{ $isJadwalActive ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm' }}">
                <div class="w-7 h-7 rounded-lg {{ $isJadwalActive ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600' }} flex items-center justify-center mr-3 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                Jadwal Kelas
            </a>

            <a href="{{ route('ortu.buku-akademik') }}" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 {{ $isBukuAkademikActive ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm' }}">
                <div class="w-7 h-7 rounded-lg {{ $isBukuAkademikActive ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600' }} flex items-center justify-center mr-3 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                Buku Akademik
                @php $totalAkademik = ($badgeJadwalOrtu ?? 0) + ($badgePresensiOrtu ?? 0) + ($badgeCatatanOrtu ?? 0) + ($badgeNilaiOrtu ?? 0); @endphp
                @if($totalAkademik > 0)
                    <span class="ml-auto bg-primary-600 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full min-w-[18px] text-center leading-none flex items-center justify-center animate-pulse">{{ $totalAkademik > 99 ? '99+' : $totalAkademik }}</span>
                @endif
            </a>

            <a href="{{ route('ortu.repositori') }}" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 {{ $isRepositoriActive ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm' }}">
                <div class="w-7 h-7 rounded-lg {{ $isRepositoriActive ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600' }} flex items-center justify-center mr-3 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                Materi Belajar
                @if(isset($badgeMateriOrtu) && $badgeMateriOrtu > 0)
                    <span class="ml-auto bg-primary-600 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full min-w-[18px] text-center leading-none flex items-center justify-center animate-pulse">{{ $badgeMateriOrtu > 99 ? '99+' : $badgeMateriOrtu }}</span>
                @endif
            </a>
        @endif

        <div class="pt-5 pb-2">
            <p class="px-1 text-xs font-bold tracking-wider text-gray-500 uppercase">Keuangan</p>
        </div>

        @if($isLocked)
            @foreach([
                ['label' => 'Tagihan & Pembayaran'],
                ['label' => 'Riwayat Transaksi'],
            ] as $menu)
            <div class="flex items-center px-3 py-2 rounded-xl text-gray-500 opacity-60 cursor-not-allowed">
                <div class="w-7 h-7 rounded-lg bg-gray-100 text-gray-400 flex items-center justify-center mr-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                {{ $menu['label'] }}
            </div>
            @endforeach
        @else
            @php
                $isTagihanActive = request()->routeIs('ortu.tagihan', 'ortu.tagihan.*');
                $isRiwayatActive = request()->routeIs('ortu.riwayat', 'ortu.riwayat.*');
            @endphp
            
            <a href="{{ route('ortu.tagihan') }}" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 {{ $isTagihanActive ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm' }}">
                <div class="w-7 h-7 rounded-lg {{ $isTagihanActive ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600' }} flex items-center justify-center mr-3 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z"></path></svg>
                </div>
                Tagihan & Pembayaran
            </a>

            <a href="{{ route('ortu.riwayat') }}" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 {{ $isRiwayatActive ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm' }}">
                <div class="w-7 h-7 rounded-lg {{ $isRiwayatActive ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600' }} flex items-center justify-center mr-3 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                Riwayat Transaksi
            </a>
        @endif

        <div class="pt-5 pb-2">
            <p class="px-1 text-xs font-bold tracking-wider text-gray-500 uppercase">Lainnya</p>
        </div>

        @if($isLocked)
            @foreach([
                ['label' => 'Layanan'],
            ] as $menu)
            <div class="flex items-center px-3 py-2 rounded-xl text-gray-500 opacity-60 cursor-not-allowed">
                <div class="w-7 h-7 rounded-lg bg-gray-100 text-gray-400 flex items-center justify-center mr-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                {{ $menu['label'] }}
            </div>
            @endforeach
        @else
            @php
                $isLayananActive = request()->routeIs('ortu.layanan.*');
            @endphp

            <a href="{{ route('ortu.layanan.index') }}" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 {{ $isLayananActive ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm' }}">
                <div class="w-7 h-7 rounded-lg {{ $isLayananActive ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600' }} flex items-center justify-center mr-3 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg>
                </div>
                Layanan
                @if(isset($badgeLayananOrtu) && $badgeLayananOrtu > 0)
                    <span class="ml-auto bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full min-w-[18px] text-center leading-none flex items-center justify-center animate-pulse">{{ $badgeLayananOrtu > 99 ? '99+' : $badgeLayananOrtu }}</span>
                @endif
            </a>
        @endif

    </nav>

</aside>

<!-- Auto-scroll to keep active menu item exactly where it was -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const sidebarNav = document.querySelector('aside nav');
        
        if (sidebarNav) {
            const savedScrollPosition = sessionStorage.getItem('ortuSidebarScrollPosition');
            if (savedScrollPosition) {
                sidebarNav.scrollTop = parseInt(savedScrollPosition, 10);
            } else {
                const activeMenu = document.querySelector('aside nav a.bg-gradient-to-r');
                if (activeMenu) {
                    activeMenu.scrollIntoView({ behavior: 'auto', block: 'nearest' });
                }
            }

            window.addEventListener('beforeunload', () => {
                sessionStorage.setItem('ortuSidebarScrollPosition', sidebarNav.scrollTop);
            });
        }
    });
</script>
