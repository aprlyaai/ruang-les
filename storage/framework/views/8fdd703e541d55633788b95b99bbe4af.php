<header class="fixed w-full top-0 z-50 bg-primary-500/80 backdrop-blur-lg shadow-sm border-b border-primary-600/20 transition-all duration-300" x-data="{ scrolled: false, mobileMenuOpen: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center transition-all duration-300" :class="scrolled ? 'h-16' : 'h-20'">
            
            <!-- Logo (Kiri) -->
            <a href="<?php echo e(url('/')); ?>" class="flex-shrink-0 flex items-center space-x-3 group cursor-pointer">
                <div class="w-10 h-10 overflow-hidden rounded-xl border border-gray-200 shadow-sm flex-shrink-0 bg-white transition-transform group-hover:scale-105">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo Ruang Les" class="w-full h-full object-cover" onerror="this.src='https://ui-avatars.com/api/?name=RL&background=e5f2e2&color=426c3c&rounded=true'">
                </div>
                <div class="flex flex-col justify-center">
                    <span class="font-heading text-2xl font-extrabold text-gray-900 leading-none tracking-tight group-hover:text-primary-700 transition-colors"><?php echo e($settings['site_name'] ?? 'Ruang Les'); ?></span>
                    <span class="text-sm font-medium text-primary-700"><?php echo e($settings['site_tagline'] ?? 'by Ismaturrohmah'); ?></span>
                </div>
            </a>

            <!-- Navigasi (Tengah) -->
            <nav class="hidden lg:flex space-x-6 xl:space-x-8">
                <a href="<?php echo e(url('/')); ?>" class="text-primary-900 hover:text-white font-medium transition-colors"><?php echo e($settings['nav_beranda'] ?? 'Beranda'); ?></a>
                <a href="<?php echo e(route('pendaftaran.form')); ?>" class="text-primary-900 hover:text-white font-medium transition-colors"><?php echo e($settings['nav_pendaftaran'] ?? 'Pendaftaran'); ?></a>
                <a href="<?php echo e(route('tentang-kami')); ?>" class="text-primary-900 hover:text-white font-medium transition-colors"><?php echo e($settings['nav_tentang'] ?? 'Tentang Kami'); ?></a>
                <a href="<?php echo e(url('/#program')); ?>" class="text-primary-900 hover:text-white font-medium transition-colors"><?php echo e($settings['nav_program'] ?? 'Program Belajar'); ?></a>
                <a href="<?php echo e(url('/#faq')); ?>" class="text-primary-900 hover:text-white font-medium transition-colors"><?php echo e($settings['nav_faq'] ?? 'FAQ'); ?></a>
                <a href="<?php echo e(url('/#footer')); ?>" class="text-primary-900 hover:text-white font-medium transition-colors"><?php echo e($settings['nav_kontak'] ?? 'Kontak'); ?></a>
            </nav>

            <!-- Zona Akses (Kanan) -->
            <div class="hidden lg:flex items-center space-x-4">
                <?php if(auth()->guard()->guest()): ?>
                    <!-- Guest: Registrasi & Masuk -->
                    <a href="<?php echo e(route('login')); ?>" class="text-primary-900 hover:text-white font-medium px-3 py-2 border border-transparent rounded-2xl hover:border-white transition-all"><?php echo e($settings['nav_masuk'] ?? 'Masuk'); ?></a>
                    <a href="<?php echo e(route('register')); ?>" class="bg-primary-700 hover:bg-primary-800 text-white font-medium px-6 py-2 rounded-2xl shadow-sm transition-all transform hover:-translate-y-0.5"><?php echo e($settings['nav_registrasi'] ?? 'Registrasi'); ?></a>
                <?php else: ?>
                    <!-- Logged In: Dropdown Profil -->
                    <div x-data="{ open: false }" @click.away="open = false" class="relative">
                        <button @click="open = !open" aria-label="Buka Menu Pengguna" aria-haspopup="true" :aria-expanded="open" class="flex items-center space-x-2 text-gray-700 hover:text-primary-700 focus:outline-none transition-colors">
                            <div class="w-10 h-10 rounded-full bg-primary-700 text-white flex items-center justify-center font-bold text-lg">
                                <?php echo e(substr(Auth::user()->name, 0, 1)); ?>

                            </div>
                            <span class="font-medium"><?php echo e(explode(' ', Auth::user()->name)[0]); ?></span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>

                        <div x-show="open" x-transition.opacity class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50">
                            <?php if(Auth::user()->role === 'admin'): ?>
                                <a href="<?php echo e(url('/admin/dashboard')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary-700">Dashboard Admin</a>
                            <?php elseif(Auth::user()->role === 'mentor'): ?>
                                <a href="<?php echo e(url('/mentor/dashboard')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary-700">Dashboard Mentor</a>
                            <?php else: ?>
                                <a href="<?php echo e(url('/dashboard')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary-700">Dashboard Orang Tua</a>
                            <?php endif; ?>
                            
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Mobile Menu Button -->
            <div class="lg:hidden flex items-center">
                <button @click="mobileMenuOpen = !mobileMenuOpen" aria-label="Buka Menu Navigasi" class="text-gray-500 hover:text-gray-700 focus:outline-none p-2">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    <svg x-show="mobileMenuOpen" style="display: none;" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Panel -->
    <div x-show="mobileMenuOpen" x-collapse class="lg:hidden bg-white border-b border-gray-100 shadow-sm">
        <div class="px-4 pt-2 pb-6 space-y-1">
            <a href="<?php echo e(url('/')); ?>" @click="mobileMenuOpen = false" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-700 hover:bg-gray-50">Beranda</a>
            <a href="<?php echo e(route('pendaftaran.form')); ?>" @click="mobileMenuOpen = false" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-700 hover:bg-gray-50">Pendaftaran</a>
            <a href="<?php echo e(route('tentang-kami')); ?>" @click="mobileMenuOpen = false" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-700 hover:bg-gray-50">Tentang Kami</a>
            <a href="<?php echo e(url('/#program')); ?>" @click="mobileMenuOpen = false" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-700 hover:bg-gray-50">Program Belajar</a>
            <a href="<?php echo e(url('/#faq')); ?>" @click="mobileMenuOpen = false" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-700 hover:bg-gray-50">FAQ</a>
            <a href="<?php echo e(url('/#footer')); ?>" @click="mobileMenuOpen = false" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-700 hover:bg-gray-50">Kontak</a>
            
            <div class="border-t border-gray-100 mt-4 pt-4">
                <?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(route('login')); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-700 hover:bg-gray-50">Masuk</a>
                    <a href="<?php echo e(route('register')); ?>" class="block px-3 py-2 mt-2 rounded-2xl text-base font-bold text-white bg-primary-700 hover:bg-primary-800 text-center">Registrasi</a>
                <?php else: ?>
                    <div class="px-3 py-2">
                        <p class="text-sm font-medium text-gray-500">Halo,</p>
                        <p class="text-base font-bold text-gray-900"><?php echo e(Auth::user()->name); ?></p>
                    </div>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="mt-2">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-red-600 hover:bg-red-50">
                            Logout
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<?php /**PATH C:\laragon\www\ruang-les-v2\resources\views/components/tajuk-situs.blade.php ENDPATH**/ ?>