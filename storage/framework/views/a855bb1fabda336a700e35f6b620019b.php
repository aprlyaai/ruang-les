<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['settings', 'groupedPackages']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['settings', 'groupedPackages']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section id="program" class="py-16 lg:py-20 relative">
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary','class' => 'inline-block py-1 px-3 rounded-full text-[11px] font-bold uppercase tracking-widest mb-4 border']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary','class' => 'inline-block py-1 px-3 rounded-full text-[11px] font-bold uppercase tracking-widest mb-4 border']); ?>
            <?php echo e($settings['program_label'] ?? 'Program Unggulan'); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $attributes = $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $component = $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
        <h2 class="font-heading text-2xl md:text-3xl font-extrabold text-gray-900 mb-6"><?php echo nl2br(e($settings['program_headline'] ?? 'Pilihan Program Belajar')); ?></h2>
        <p class="text-base text-gray-600 max-w-4xl mx-auto mb-12">
            <?php echo e($settings['program_description'] ?? 'Kami menyediakan program yang disesuaikan dengan kebutuhan fokus dan gaya belajar anak Anda.'); ?>

        </p>


        <div x-data="{
                activeSlide: 0,
                totalSlides: <?php echo e($groupedPackages->count()); ?>,
                slidesToShow: 3,
                autoplayTimer: null,
                updateSlidesToShow() {
                    if (window.innerWidth >= 1024) {
                        this.slidesToShow = 3;
                    } else if (window.innerWidth >= 768) {
                        this.slidesToShow = 2;
                    } else {
                        this.slidesToShow = 1;
                    }
                    this.activeSlide = Math.min(this.activeSlide, this.maxSlide);
                },
                get maxSlide() {
                    return Math.max(0, this.totalSlides - this.slidesToShow);
                },
                updateActiveSlide() {
                    if (!this.$refs.slider) return;
                    const cardWidth = this.$refs.slider.clientWidth / this.slidesToShow;
                    this.activeSlide = Math.round(this.$refs.slider.scrollLeft / cardWidth);
                },
                equalizePriceBoxes() {
                    this.$nextTick(() => {
                        const boxes = this.$el.querySelectorAll('.harga-box');
                        if (!boxes.length) return;
                        boxes.forEach(b => b.style.height = 'auto');
                        let maxH = 104;
                        boxes.forEach(b => { if(b.offsetHeight > maxH) maxH = b.offsetHeight; });
                        boxes.forEach(b => b.style.height = maxH + 'px');
                    });
                },
                scrollToSlide(index) {
                    this.activeSlide = Math.min(this.maxSlide, Math.max(0, index));
                    if (!this.$refs.slider) return;
                    const cardWidth = this.$refs.slider.clientWidth / this.slidesToShow;
                    this.$refs.slider.scrollTo({
                        left: this.activeSlide * cardWidth,
                        behavior: 'smooth'
                    });
                },
                nextSlide() {
                    if (this.maxSlide <= 0) return;
                    if (this.activeSlide >= this.maxSlide) {
                        this.scrollToSlide(0);
                    } else {
                        this.scrollToSlide(this.activeSlide + 1);
                    }
                },
                startAutoplay() {
                    this.stopAutoplay();
                    if (this.maxSlide > 0) {
                        this.autoplayTimer = setInterval(() => {
                            this.nextSlide();
                        }, 5500);
                    }
                },
                stopAutoplay() {
                    if (this.autoplayTimer) {
                        clearInterval(this.autoplayTimer);
                        this.autoplayTimer = null;
                    }
                }
             }"
             x-init="updateSlidesToShow(); equalizePriceBoxes(); startAutoplay(); window.addEventListener('resize', () => { updateSlidesToShow(); equalizePriceBoxes(); startAutoplay(); })"
             @mouseenter="stopAutoplay()"
             @mouseleave="startAutoplay()"
             @touchstart="stopAutoplay()"
             @touchend="startAutoplay()"
             class="relative max-w-[90rem] mx-auto">

            <!-- Custom Navigation Buttons (Floating Side Controls) -->
            <button @click="scrollToSlide(activeSlide - 1)"
                    aria-label="Geser ke Kiri"
                    :disabled="activeSlide === 0"
                    :class="activeSlide === 0 ? 'opacity-0 invisible' : 'opacity-100 visible hover:bg-primary-700 hover:text-white border-primary-200 text-primary-700 active:scale-95'"
                    class="hidden md:flex absolute -left-4 lg:-left-6 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full border-2 bg-white/90 backdrop-blur items-center justify-center transition-all duration-300 shadow-xl focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <button @click="scrollToSlide(activeSlide + 1)"
                    aria-label="Geser ke Kanan"
                    :disabled="activeSlide === maxSlide"
                    :class="activeSlide === maxSlide ? 'opacity-0 invisible' : 'opacity-100 visible hover:bg-primary-700 hover:text-white border-primary-200 text-primary-700 active:scale-95'"
                    class="hidden md:flex absolute -right-4 lg:-right-6 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full border-2 bg-white/90 backdrop-blur items-center justify-center transition-all duration-300 shadow-xl focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
            </button>

            <!-- Viewport Slider -->
            <div class="overflow-hidden rounded-3xl -mx-4 px-4 py-4">
                <div x-ref="slider"
                     @scroll.debounce.50ms="updateActiveSlide"
                     class="flex w-full overflow-x-auto snap-x snap-mandatory scrollbar-hide pb-4 pt-8 -mt-8"
                     style="-ms-overflow-style: none; scrollbar-width: none;">

                    <?php $__empty_1 = true; $__currentLoopData = $groupedPackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupKey => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $first = $group->first();
                        $kategori = strtolower($first->tipe_program);

                        if (str_contains($kategori, 'semi')) {
                            // Semi Privat - Two/small group (Users Icon)
                            $iconSvg = '<svg class="w-6 h-6 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>';
                        } elseif (str_contains($kategori, 'privat')) {
                            // Privat - Single focus (Pengguna Icon)
                            $iconSvg = '<svg class="w-6 h-6 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>';
                        } else {
                            // Reguler/Group - Classroom (Academic/Building Icon)
                            $iconSvg = '<svg class="w-6 h-6 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>';
                        }
                    ?>

                    <!-- Slide Card -->
                    <div class="w-full md:w-1/2 lg:w-1/3 flex-shrink-0 px-6 flex snap-start relative pt-5 pb-5">
                        <?php
                            $isPopular = $first->direkomendasikan;
                        ?>

                        <!-- Card Container -->
                        <div class="w-full h-full bg-white/70 backdrop-blur-md rounded-2xl border <?php echo e($isPopular ? 'border-yellow-300 shadow-[0_20px_40px_-15px_rgba(250,204,21,0.3)] z-10' : 'border-gray-200 hover:border-primary-300 shadow-[0_8px_30px_rgb(0,0,0,0.04)]'); ?> p-6 transition-all duration-500 relative flex flex-col group hover:-translate-y-2 hover:shadow-xl">

                            <?php if($isPopular): ?>
                            <!-- Popular Badge -->
                            <div class="absolute -top-4 left-0 right-0 flex justify-center z-20">
                                <div class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white text-[10px] font-bold uppercase tracking-widest py-1.5 px-6 rounded-full shadow-lg border border-yellow-300 animate-pulse">
                                    <?php echo e($settings['program_popular_badge'] ?? 'Paling Diminati'); ?>

                                </div>
                            </div>
                            <?php endif; ?>
                            <!-- Header Section -->
                            <div class="flex items-center mb-6">
                                <!-- Icon -->
                                <div class="w-14 h-14 flex-shrink-0 bg-primary-50 rounded-[1.25rem] flex items-center justify-center text-primary-600 mr-5 group-hover:scale-110 group-hover:-rotate-3 transition-transform duration-500 shadow-sm border border-primary-100/50">
                                    <?php echo $iconSvg; ?>

                                </div>

                                <div class="flex flex-col text-left items-start">
                                    <h3 class="font-heading text-[19px] font-extrabold text-gray-900 uppercase tracking-wide leading-tight mb-2">
                                        <?php echo e($first->nama_program); ?>

                                    </h3>
                                    <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary','class' => '!rounded-md uppercase tracking-wider shadow-sm !text-[11px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary','class' => '!rounded-md uppercase tracking-wider shadow-sm !text-[11px]']); ?>
                                        <?php echo e($first->kelas_program); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $attributes = $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $component = $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="border-l-[3px] border-primary-300 pl-4 mb-6">
                                <div class="text-gray-500 text-[13px] leading-relaxed italic text-justify space-y-1">
                                    <?php $__currentLoopData = explode("\n", $first->deskripsi_program); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $desc_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(trim($desc_line) !== ''): ?>
                                            <p><?php echo e(ltrim(trim($desc_line), '- ')); ?></p>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <!-- Features -->
                            <ul class="space-y-2.5 mb-6 flex-1">
                                <!-- Keunggulan 1 -->
                                <li class="flex items-start">
                                    <div class="w-5 h-5 rounded-full bg-primary-50 flex items-center justify-center flex-shrink-0 mt-0.5 mr-3">
                                        <svg class="w-3 h-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                    <span class="text-gray-600 text-sm text-justify">
                                        <?php echo e($first->student_capacity_label); ?>

                                    </span>
                                </li>
                                <!-- Keunggulan 2 -->
                                <li class="flex items-start">
                                    <div class="w-5 h-5 rounded-full bg-primary-50 flex items-center justify-center flex-shrink-0 mt-0.5 mr-3">
                                        <svg class="w-3 h-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                    <span class="text-gray-600 text-sm text-justify"><?php echo e($first->pertemuan); ?>× pertemuan</span>
                                </li>
                                <!-- Keunggulan 3 -->
                                <li class="flex items-start">
                                    <div class="w-5 h-5 rounded-full bg-primary-50 flex items-center justify-center flex-shrink-0 mt-0.5 mr-3">
                                        <svg class="w-3 h-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                    <span class="text-gray-600 text-sm text-justify">Waktu belajar <?php echo e($first->durasi_belajar); ?> menit per pertemuan</span>
                                </li>
                                <!-- Keunggulan 4 -->
                                <li class="flex items-start">
                                    <div class="w-5 h-5 rounded-full bg-primary-50 flex items-center justify-center flex-shrink-0 mt-0.5 mr-3">
                                        <svg class="w-3 h-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                    <span class="text-gray-600 text-sm text-justify">
                                        <?php if($group->count() > 1): ?> Pilihan lokasi fleksibel <?php else: ?> Sesi belajar dilakukan di <?php echo e(strtolower($first->lokasi_belajar)); ?> <?php endif; ?>
                                    </span>
                                </li>
                            </ul>

                            <!-- Bottom Section: Pricing & CTA -->
                            <div class="mt-auto pt-2">
                                <div class="mb-4 bg-gray-50 rounded-[14px] p-3.5 border border-gray-100 flex flex-col justify-start min-h-[100px] harga-box">
                                    <p class="text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-3 text-left w-full">BIAYA PROGRAM:</p>
                                    <div class="space-y-3 flex-1 flex flex-col justify-center w-full">
                                        <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="flex justify-between items-end">
                                            <div class="flex flex-col">
                                                <span class="text-gray-900 font-medium text-sm"><?php echo e($item->lokasi_belajar); ?></span>
                                            </div>
                                            <div class="flex items-start">
                                                <span class="text-xs font-medium text-primary-600 mt-0.5 mr-0.5">Rp</span>
                                                <span class="text-lg font-extrabold text-gray-900"><?php echo e(number_format($item->harga, 0, ',', '.')); ?></span>
                                            </div>
                                        </div>
                                        <?php if(!$loop->last): ?>
                                        <div class="w-full border-t border-dashed border-gray-200"></div>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>

                                <?php if(auth()->guard()->guest()): ?>
                                    <a href="<?php echo e(route('register')); ?>" class="flex items-center justify-center w-full py-3 px-4 bg-primary-600 hover:bg-primary-700 text-white font-bold text-sm rounded-2xl transition-all duration-300 shadow-[0_8px_20px_-6px_rgba(183,217,177,0.6)] hover:shadow-[0_12px_25px_-6px_rgba(183,217,177,0.8)] hover:-translate-y-0.5 group-hover:bg-primary-700">
                                        Pilih Program
                                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('pendaftaran.form', ['paket' => $first->id])); ?>" class="flex items-center justify-center w-full py-3 px-4 bg-primary-600 hover:bg-primary-700 text-white font-bold text-sm rounded-2xl transition-all duration-300 shadow-[0_8px_20px_-6px_rgba(183,217,177,0.6)] hover:shadow-[0_12px_25px_-6px_rgba(183,217,177,0.8)] hover:-translate-y-0.5 group-hover:bg-primary-700">
                                        Pilih Program
                                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="w-full py-12 text-center bg-white/50 rounded-2xl border border-dashed border-primary-200">
                    <svg class="w-16 h-16 mx-auto text-primary-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo e($settings['empty_program_title'] ?? 'Belum Ada Program Belajar'); ?></h3>
                    <p class="text-gray-600"><?php echo e($settings['empty_program_desc'] ?? 'Silakan kembali lagi nanti untuk melihat program terbaru kami.'); ?></p>
                </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Pagination Dots -->
            <div class="flex justify-center space-x-2 mt-0">
                <template x-for="i in (maxSlide + 1)">
                    <button @click="scrollToSlide(i - 1)"
                            :class="activeSlide === (i - 1) ? 'w-6 bg-primary-700' : 'w-2 bg-primary-200'"
                            class="h-2 rounded-full transition-all duration-300 focus:outline-none"></button>
                </template>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\laragon\www\ruang-les\resources\views/components/publik/program.blade.php ENDPATH**/ ?>