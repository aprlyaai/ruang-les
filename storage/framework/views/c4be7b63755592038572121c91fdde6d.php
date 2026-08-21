<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-[10000] w-64 lg:w-[16rem] h-full transition-transform duration-150 ease-in-out lg:relative lg:translate-x-0 bg-primary-500/80 backdrop-blur-md border border-primary-100/50 shadow-sm rounded-r-2xl lg:rounded-2xl flex flex-col overflow-hidden">
    <!-- Logo Area -->
    <div class="flex items-center justify-start h-20 border-b border-primary-100/50 bg-white/40 px-6">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 overflow-hidden rounded-xl border border-gray-200 shadow-sm flex-shrink-0 bg-white">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo Ruang Les" class="w-full h-full object-cover" onerror="this.src='https://ui-avatars.com/api/?name=RL&background=e5f2e2&color=426c3c&rounded=true'">
            </div>
            <div class="flex flex-col justify-center">
                <span class="font-heading text-2xl font-extrabold text-gray-900 leading-none tracking-tight"><?php echo e($settings['site_name'] ?? 'Ruang Les'); ?></span>
                <span class="text-sm font-medium text-primary-700"><?php echo e($settings['site_tagline'] ?? 'by Ismaturrohmah'); ?></span>
            </div>
        </div>
    </div>
    
    <!-- Navigation Links -->
    <nav class="flex-1 px-3 pt-7 pb-6 space-y-1.5 overflow-y-auto custom-scrollbar text-sm font-medium">
        
        <a href="<?php echo e(route('admin.dashboard')); ?>" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm'); ?>">
            <div class="w-7 h-7 rounded-lg <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600'); ?> flex items-center justify-center mr-3 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            </div>
            Dashboard
        </a>

        <a href="<?php echo e(route('admin.regist-verifications.index')); ?>" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 <?php echo e(request()->routeIs('admin.regist-verifications.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm'); ?>">
            <div class="w-7 h-7 rounded-lg <?php echo e(request()->routeIs('admin.regist-verifications.*') ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600'); ?> flex items-center justify-center mr-3 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
            Verifikasi Pendaftaran
            <?php if(isset($badgeVerifikasi) && $badgeVerifikasi > 0): ?>
                <span class="ml-auto bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full min-w-[18px] text-center leading-none flex items-center justify-center animate-pulse"><?php echo e($badgeVerifikasi > 99 ? '99+' : $badgeVerifikasi); ?></span>
            <?php endif; ?>
        </a>

        <div class="pt-5 pb-2">
            <p class="px-1 text-xs font-bold tracking-wider text-gray-500 uppercase">Data Master</p>
        </div>

        <a href="<?php echo e(Route::has('admin.packages.index') ? route('admin.packages.index') : '#'); ?>" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 <?php echo e(request()->routeIs('admin.packages.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm'); ?>">
            <div class="w-7 h-7 rounded-lg <?php echo e(request()->routeIs('admin.packages.*') ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600'); ?> flex items-center justify-center mr-3 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
            </div>
            Paket Program Belajar
        </a>
        
        <a href="<?php echo e(route('admin.mentor.index')); ?>" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 <?php echo e(request()->routeIs('admin.mentor.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm'); ?>">
            <div class="w-7 h-7 rounded-lg <?php echo e(request()->routeIs('admin.mentor.*') ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600'); ?> flex items-center justify-center mr-3 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            Data Mentor
        </a>

        <a href="<?php echo e(route('admin.students.index')); ?>" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 <?php echo e(request()->routeIs('admin.students.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm'); ?>">
            <div class="w-7 h-7 rounded-lg <?php echo e(request()->routeIs('admin.students.*') ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600'); ?> flex items-center justify-center mr-3 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            Data Murid
        </a>

        <a href="<?php echo e(route('admin.parents.index')); ?>" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 <?php echo e(request()->routeIs('admin.parents.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm'); ?>">
            <div class="w-7 h-7 rounded-lg <?php echo e(request()->routeIs('admin.parents.*') ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600'); ?> flex items-center justify-center mr-3 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            Data Wali Murid
        </a>

        <div class="pt-5 pb-2">
            <p class="px-1 text-xs font-bold tracking-wider text-gray-500 uppercase">Akademik</p>
        </div>

        <a href="<?php echo e(route('admin.class-schedules.index')); ?>" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 <?php echo e(request()->routeIs('admin.class-schedules.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm'); ?>">
            <div class="w-7 h-7 rounded-lg <?php echo e(request()->routeIs('admin.class-schedules.*') ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600'); ?> flex items-center justify-center mr-3 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            Jadwal Kelas
        </a>

        <a href="<?php echo e(Route::has('admin.attendances.index') ? route('admin.attendances.index') : '#'); ?>" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 <?php echo e(request()->routeIs('admin.attendances.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm'); ?>">
            <div class="w-7 h-7 rounded-lg <?php echo e(request()->routeIs('admin.attendances.*') ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600'); ?> flex items-center justify-center mr-3 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
            </div>
            Presensi
        </a>

        <a href="<?php echo e(Route::has('admin.progress-notes.index') ? route('admin.progress-notes.index') : '#'); ?>" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 <?php echo e(request()->routeIs('admin.progress-notes.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm'); ?>">
            <div class="w-7 h-7 rounded-lg <?php echo e(request()->routeIs('admin.progress-notes.*') ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600'); ?> flex items-center justify-center mr-3 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            </div>
            Catatan Perkembangan
        </a>

        <a href="<?php echo e(Route::has('admin.scores.index') ? route('admin.scores.index') : '#'); ?>" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 <?php echo e(request()->routeIs('admin.scores.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm'); ?>">
            <div class="w-7 h-7 rounded-lg <?php echo e(request()->routeIs('admin.scores.*') ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600'); ?> flex items-center justify-center mr-3 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
            </div>
            Nilai
        </a>


        <a href="<?php echo e(Route::has('admin.repository.index') ? route('admin.repository.index') : '#'); ?>" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 <?php echo e(request()->routeIs('admin.repository.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm'); ?>">
            <div class="w-7 h-7 rounded-lg <?php echo e(request()->routeIs('admin.repository.*') ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600'); ?> flex items-center justify-center mr-3 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
            Materi Belajar
        </a>

        <div class="pt-5 pb-2">
            <p class="px-1 text-xs font-bold tracking-wider text-gray-500 uppercase">Keuangan</p>
        </div>

        <a href="<?php echo e(route('admin.transactions.index')); ?>" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 <?php echo e(request()->routeIs('admin.transactions.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm'); ?>">
            <div class="w-7 h-7 rounded-lg <?php echo e(request()->routeIs('admin.transactions.*') ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600'); ?> flex items-center justify-center mr-3 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            Pembayaran
            <?php if(isset($badgePembayaran) && $badgePembayaran > 0): ?>
                <span class="ml-auto bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full min-w-[18px] text-center leading-none flex items-center justify-center animate-pulse"><?php echo e($badgePembayaran > 99 ? '99+' : $badgePembayaran); ?></span>
            <?php endif; ?>
        </a>

        <div class="pt-5 pb-2">
            <p class="px-1 text-xs font-bold tracking-wider text-gray-500 uppercase">Layanan & Komunikasi</p>
        </div>

        <a href="<?php echo e(Route::has('admin.helpdesks.index') ? route('admin.helpdesks.index') : '#'); ?>" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 <?php echo e(request()->routeIs('admin.helpdesks.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm'); ?>">
            <div class="w-7 h-7 rounded-lg <?php echo e(request()->routeIs('admin.helpdesks.*') ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600'); ?> flex items-center justify-center mr-3 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            Layanan (Inbox)
            <?php if(isset($badgeLayanan) && $badgeLayanan > 0): ?>
                <span class="ml-auto bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full min-w-[18px] text-center leading-none flex items-center justify-center animate-pulse"><?php echo e($badgeLayanan > 99 ? '99+' : $badgeLayanan); ?></span>
            <?php endif; ?>
        </a>

        <a href="<?php echo e(Route::has('admin.announcements.index') ? route('admin.announcements.index') : '#'); ?>" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 <?php echo e(request()->routeIs('admin.announcements.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm'); ?>">
            <div class="w-7 h-7 rounded-lg <?php echo e(request()->routeIs('admin.announcements.*') ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600'); ?> flex items-center justify-center mr-3 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
            </div>
            Pengumuman
        </a>

        <div class="pt-5 pb-2">
            <p class="px-1 text-xs font-bold tracking-wider text-gray-500 uppercase">Pengaturan Sistem</p>
        </div>

        <a href="<?php echo e(route('admin.settings.index')); ?>?reset_tab=1" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 <?php echo e(request()->routeIs('admin.settings.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm'); ?>">
            <div class="w-7 h-7 rounded-lg <?php echo e(request()->routeIs('admin.settings.*') ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600'); ?> flex items-center justify-center mr-3 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            Kelola Bimbel (CMS)
        </a>

        <a href="<?php echo e(Route::has('admin.users.index') ? route('admin.users.index') : '#'); ?>" @click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-xl transition-all duration-150 <?php echo e(request()->routeIs('admin.users.*') ? 'bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-md shadow-primary-500/30' : 'text-gray-600 hover:bg-white/50 hover:text-primary-800 hover:shadow-sm'); ?>">
            <div class="w-7 h-7 rounded-lg <?php echo e(request()->routeIs('admin.users.*') ? 'bg-white/20 text-white' : 'bg-primary-50 text-primary-600'); ?> flex items-center justify-center mr-3 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            Kelola Pengguna
            <?php if(isset($badgeUsers) && $badgeUsers > 0): ?>
                <span class="ml-auto bg-primary-600 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full min-w-[18px] text-center leading-none flex items-center justify-center animate-pulse"><?php echo e($badgeUsers > 99 ? '99+' : $badgeUsers); ?></span>
            <?php endif; ?>
        </a>
    </nav>

</aside>

<!-- Auto-scroll to keep active menu item exactly where it was -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const sidebarNav = document.querySelector('aside nav');
        
        if (sidebarNav) {
            // 1. Kembalikan posisi scroll persis seperti sebelum reload
            const savedScrollPosition = sessionStorage.getItem('sidebarScrollPosition');
            if (savedScrollPosition) {
                sidebarNav.scrollTop = parseInt(savedScrollPosition, 10);
            } else {
                // Fallback awal (jika belum ada history scroll)
                const activeMenu = document.querySelector('aside nav a.bg-gradient-to-r');
                if (activeMenu) {
                    activeMenu.scrollIntoView({ behavior: 'auto', block: 'nearest' });
                }
            }

            // 2. Simpan posisi scroll sebelum halaman berpindah/dimuat ulang
            window.addEventListener('beforeunload', () => {
                sessionStorage.setItem('sidebarScrollPosition', sidebarNav.scrollTop);
            });
        }
    });
</script>
<?php /**PATH C:\laragon\www\ruang-les\resources\views/components/admin/bilah-samping.blade.php ENDPATH**/ ?>