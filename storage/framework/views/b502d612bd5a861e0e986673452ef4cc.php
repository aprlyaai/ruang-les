<header class="h-20 bg-white/80 backdrop-blur-md border border-primary-100/50 rounded-2xl flex items-center justify-between px-6 shadow-sm relative z-20">
    <div class="flex items-center">
        <button @click="sidebarOpen = true" class="p-2 mr-4 rounded-xl text-gray-500 hover:text-primary-600 hover:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 lg:hidden transition-colors">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
        <div class="hidden sm:flex items-center text-sm font-medium text-gray-500">
            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
            <a href="<?php echo e(route('mentor.dashboard')); ?>" class="hover:text-primary-600 transition-colors">Home</a>
            
            <?php if (! empty(trim($__env->yieldContent('breadcrumbs')))): ?>
                <?php echo $__env->yieldContent('breadcrumbs'); ?>
            <?php else: ?>
                <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="text-gray-800 font-bold"><?php echo $__env->yieldContent('title', 'Dashboard'); ?></span>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="flex items-center space-x-4">
        <!-- Date Display (Global) -->
        <div class="hidden md:flex items-center text-xs font-bold text-primary-700 bg-primary-50/60 border border-primary-100/70 rounded-xl px-3.5 py-1.5 shadow-sm">
            <svg class="w-3.5 h-3.5 mr-2 text-primary-600 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <?php echo e(\Carbon\Carbon::now()->translatedFormat('l, d F Y')); ?>

        </div>

        <!-- Profile Dropdown -->
        <div x-data="{ dropdownOpen: false }" class="relative">
            <button @click="dropdownOpen = !dropdownOpen" class="flex items-center space-x-3 focus:outline-none px-3 py-2 rounded-xl hover:bg-white transition-colors border border-transparent hover:border-gray-100 hover:shadow-sm">
                <div class="hidden md:flex flex-col items-end text-right">
                    <span class="text-sm font-bold text-gray-800 leading-none"><?php echo e(Auth::user()->name); ?></span>
                    <span class="text-xs font-bold text-primary-600 mt-1">Mentor</span>
                </div>
                <?php if(Auth::user()->avatar): ?>
                    <img src="<?php echo e(asset('storage/' . Auth::user()->avatar)); ?>" alt="<?php echo e(Auth::user()->name); ?>" class="w-9 h-9 rounded-lg object-cover shadow-sm border border-primary-100 flex-shrink-0">
                <?php else: ?>
                    <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-primary-500 to-primary-700 text-white flex items-center justify-center font-bold shadow-sm flex-shrink-0">
                        <?php echo e(substr(Auth::user()->name, 0, 1)); ?>

                    </div>
                <?php endif; ?>
                <svg class="w-4 h-4 text-gray-400 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="dropdownOpen" 
                 @click.away="dropdownOpen = false"
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="transform opacity-0 scale-95"
                 x-transition:enter-end="transform opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="transform opacity-100 scale-100"
                 x-transition:leave-end="transform opacity-0 scale-95"
                 class="absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-lg py-2 border border-gray-100 z-50">
                <a href="<?php echo e(route('mentor.profile.index')); ?>" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary-600 font-medium transition-colors group">
                    <svg class="w-4 h-4 mr-3 text-gray-400 group-hover:text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Profil Saya
                </a>

                <div class="h-px bg-gray-100 my-1"></div>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="w-full flex items-center px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 font-bold transition-colors group">
                        <svg class="w-4 h-4 mr-3 text-red-500 group-hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
<?php /**PATH C:\laragon\www\ruang-les\resources\views/components/mentor/tajuk.blade.php ENDPATH**/ ?>