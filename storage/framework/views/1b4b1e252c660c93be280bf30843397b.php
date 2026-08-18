
<footer id="footer" class="bg-primary-800/90 backdrop-blur-lg text-white pt-10 pb-6 relative z-10">
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-12 mb-8">
            
            <!-- Kolom 1: Profil -->
            <div class="lg:col-span-4">
                <a href="<?php echo e(url('/')); ?>" class="inline-flex items-center space-x-3 group cursor-pointer mb-4">
                    <div class="w-10 h-10 overflow-hidden rounded-xl border border-primary-600 shadow-sm flex-shrink-0 bg-white transition-transform group-hover:scale-105">
                        <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo Ruang Les" class="w-full h-full object-cover" onerror="this.src='https://ui-avatars.com/api/?name=RL&background=e5f2e2&color=426c3c&rounded=true'">
                    </div>
                    <div class="flex flex-col justify-center text-left">
                        <span class="font-heading text-2xl font-extrabold text-white leading-none tracking-tight group-hover:text-primary-400 transition-colors"><?php echo e($settings['site_name'] ?? 'Ruang Les'); ?></span>
                        <span class="text-sm font-medium text-primary-300"><?php echo e($settings['site_tagline'] ?? 'by Ismaturrohmah'); ?></span>
                    </div>
                </a>
                <p class="text-primary-50/90 text-sm leading-relaxed mb-4">
                    <?php echo e($settings['footer_description'] ?? 'Bimbingan belajar terpadu untuk tingkat Sekolah Dasar (SD). Memfasilitasi perkembangan akademik anak dengan pendekatan modern dan transparan, memadukan peran aktif Mentor dan Orang Tua.'); ?>

                </p>
                <div class="inline-flex items-center space-x-2 bg-primary-900/50 rounded-full px-4 py-2">
                    <span class="w-2 h-2 rounded-full bg-primary-400 animate-pulse"></span>
                    <span class="text-xs font-semibold text-primary-50 tracking-wider">SEDANG BEROPERASI</span>
                </div>
            </div>

            <!-- Kolom 2: Tautan Cepat -->
            <div class="lg:col-span-2">
                <h3 class="text-lg font-semibold text-white mb-4 uppercase tracking-wider text-sm"><?php echo e($settings['footer_quick_links_title'] ?? 'Tautan Cepat'); ?></h3>
                <ul class="space-y-3">
                    <li><a href="<?php echo e(url('/')); ?>" class="text-primary-200 hover:text-white transition-colors flex items-center"><span class="mr-2">›</span> <?php echo e($settings['nav_beranda'] ?? 'Beranda'); ?></a></li>
                    <li><a href="<?php echo e(url('/pendaftaran')); ?>" class="text-primary-200 hover:text-white transition-colors flex items-center"><span class="mr-2">›</span> <?php echo e($settings['nav_pendaftaran'] ?? 'Pendaftaran'); ?> Murid</a></li>
                    <li><a href="<?php echo e(route('tentang-kami')); ?>" class="text-primary-200 hover:text-white transition-colors flex items-center"><span class="mr-2">›</span> <?php echo e($settings['nav_tentang'] ?? 'Tentang Kami'); ?></a></li>
                    <li><a href="<?php echo e(url('/#program')); ?>" class="text-primary-200 hover:text-white transition-colors flex items-center"><span class="mr-2">›</span> <?php echo e($settings['nav_program'] ?? 'Program Belajar'); ?></a></li>
                    <li><a href="<?php echo e(url('/#faq')); ?>" class="text-primary-200 hover:text-white transition-colors flex items-center"><span class="mr-2">›</span> Pusat Bantuan (<?php echo e($settings['nav_faq'] ?? 'FAQ'); ?>)</a></li>
                    <?php if(auth()->guard()->guest()): ?>
                    <li><a href="<?php echo e(route('register')); ?>" class="text-primary-200 hover:text-white transition-colors flex items-center"><span class="mr-2">›</span> Buat Akun Orang Tua</a></li>
                    <li><a href="<?php echo e(route('login')); ?>" class="text-primary-200 hover:text-white transition-colors flex items-center"><span class="mr-2">›</span> <?php echo e($settings['nav_masuk'] ?? 'Masuk'); ?> Portal</a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Kolom 3: Informasi Kontak -->
            <div class="lg:col-span-4">
                <h3 class="text-lg font-semibold text-white mb-4 uppercase tracking-wider text-sm"><?php echo e($settings['footer_contact_title'] ?? 'Hubungi Kami'); ?></h3>
                <ul class="space-y-3">
                    <li>
                        <a href="<?php echo e($settings['footer_maps_url'] ?? 'https://maps.google.com/?q=' . urlencode($settings['footer_address'] ?? 'Jl. H. Shibi No.57, RT.8/RW.001, Srengseng Sawah, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12640')); ?>" target="_blank" rel="noopener noreferrer" class="flex items-start group">
                            <svg class="w-5 h-5 flex-shrink-0 text-primary-200 mr-3 mt-0.5 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span class="text-primary-200 group-hover:text-white text-sm transition-colors text-left"><?php echo e($settings['footer_address'] ?? 'Jl. H. Shibi No.57, RT.8/RW.001, Srengseng Sawah, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12640'); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo e($settings['footer_email'] ?? 'ruanglesismaturrohmah@gmail.com'); ?>" target="_blank" rel="noopener noreferrer" class="flex items-center group">
                            <svg class="w-5 h-5 flex-shrink-0 text-primary-200 mr-3 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span class="text-primary-200 group-hover:text-white text-sm transition-colors"><?php echo e($settings['footer_email'] ?? 'ruanglesismaturrohmah@gmail.com'); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/<?php echo e($settings['footer_whatsapp'] ?? '6281319076124'); ?>" target="_blank" rel="noopener noreferrer" class="flex items-center group">
                            <svg class="w-5 h-5 flex-shrink-0 text-primary-200 mr-3 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span class="text-primary-200 group-hover:text-white text-sm transition-colors">+<?php echo e($settings['footer_whatsapp'] ?? '6281319076124'); ?> (WhatsApp)</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Kolom 4: Sosial Media & Buletin -->
            <div class="lg:col-span-2">
                <h3 class="text-lg font-semibold text-white mb-4 uppercase tracking-wider text-sm"><?php echo e($settings['footer_social_title'] ?? 'Ikuti Kami'); ?></h3>
                <p class="text-primary-50/90 text-sm mb-3"><?php echo e($settings['footer_social_text'] ?? 'Dapatkan info pendaftaran terbaru dan tips belajar bermanfaat.'); ?></p>
                <div class="">
                    <?php
                        $ig_url = $settings['footer_instagram_url'] ?? '#';
                        if ($ig_url !== '#') {
                            $ig_url = trim($ig_url);
                            if (!Str::startsWith($ig_url, ['http://', 'https://'])) {
                                if (Str::contains($ig_url, 'instagram.com')) {
                                    $ig_url = 'https://' . $ig_url;
                                } else {
                                    $ig_url = 'https://instagram.com/' . ltrim($ig_url, '@');
                                }
                            }
                        }
                    ?>
                <ul class="space-y-3">
                    <li>
                        <a href="<?php echo e($ig_url); ?>" target="_blank" rel="noopener noreferrer" class="flex items-center group">
                            <svg class="w-5 h-5 flex-shrink-0 text-primary-200 mr-3 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                            <span class="text-primary-200 group-hover:text-white text-sm transition-colors">@ruangles.id</span>
                        </a>
                    </li>
                </ul>
                </div>
            </div>
            
        </div>
        
        <div class="border-t border-primary-600/50 pt-8 flex flex-col items-center justify-center">
            <p class="text-primary-200 text-sm mb-4 md:mb-0 text-center">
                &copy; <?php echo e(date('Y')); ?> Ruang Les by Ismaturrohmah. All rights reserved.
            </p>
        </div>
    </div>
</footer>
<?php /**PATH C:\laragon\www\ruang-les-v2\resources\views/components/kaki-halaman.blade.php ENDPATH**/ ?>