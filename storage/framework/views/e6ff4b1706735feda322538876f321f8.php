<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['settings', 'galleries']));

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

foreach (array_filter((['settings', 'galleries']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section class="py-16 lg:py-24 relative overflow-hidden">
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary','class' => 'inline-block py-1.5 px-4 rounded-full text-xs font-bold uppercase tracking-widest mb-4 border']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary','class' => 'inline-block py-1.5 px-4 rounded-full text-xs font-bold uppercase tracking-widest mb-4 border']); ?>
                <?php echo e($settings['gallery_label'] ?? 'Galeri Dokumentasi'); ?>

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
            <h2 class="font-heading text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-900 mb-4"><?php echo nl2br(e($settings['gallery_headline'] ?? 'Momen Berharga di Ruang Les')); ?></h2>
            <p class="text-base md:text-lg text-gray-600 max-w-2xl mx-auto">
                <?php echo e($settings['gallery_description'] ?? 'Sekilas gambaran suasana belajar yang interaktif, hangat, dan menyenangkan.'); ?>

            </p>
        </div>

        <?php if(isset($galleries) && $galleries->count() > 0): ?>
        <!-- Carousel Layout (Alpine.js) -->
        <div x-data="{
                activeSlide: 0,
                totalSlides: <?php echo e($galleries->count()); ?>,
                slidesToShow: 3,
                autoplayTimer: null,
                updateSlidesToShow() {
                    if (window.innerWidth >= 1024) {
                        this.slidesToShow = 3;
                    } else if (window.innerWidth >= 768) {
                        this.slidesToShow = 2;
                    } else {
                        this.slidesToShow = 1.15; // Di mobile sengaja 1.15 agar foto sebelahnya 'ngintip' sedikit
                    }
                },
                get maxSlide() {
                    return Math.max(0, this.totalSlides - Math.floor(this.slidesToShow));
                },
                updateActiveSlide() {
                    if (!this.$refs.slider) return;
                    const cardWidth = this.$refs.slider.clientWidth / this.slidesToShow;
                    this.activeSlide = Math.round(this.$refs.slider.scrollLeft / cardWidth);
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
             x-init="updateSlidesToShow(); startAutoplay(); window.addEventListener('resize', () => { updateSlidesToShow(); startAutoplay(); })"
             @mouseenter="stopAutoplay()"
             @mouseleave="startAutoplay()"
             @touchstart="stopAutoplay()"
             @touchend="startAutoplay()"
             class="relative max-w-[90rem] mx-auto">

            <!-- Tombol Navigasi Desktop -->
            <button @click="scrollToSlide(activeSlide - 1)"
                    :disabled="activeSlide === 0"
                    :class="activeSlide === 0 ? 'opacity-0 invisible' : 'opacity-100 visible hover:bg-primary-700 hover:text-white border-primary-200 text-primary-700 active:scale-95'"
                    class="hidden md:flex absolute -left-4 lg:-left-6 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full border-2 bg-white/90 backdrop-blur items-center justify-center transition-all duration-300 shadow-xl focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <button @click="scrollToSlide(activeSlide + 1)"
                    :disabled="activeSlide >= maxSlide"
                    :class="activeSlide >= maxSlide ? 'opacity-0 invisible' : 'opacity-100 visible hover:bg-primary-700 hover:text-white border-primary-200 text-primary-700 active:scale-95'"
                    class="hidden md:flex absolute -right-4 lg:-right-6 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full border-2 bg-white/90 backdrop-blur items-center justify-center transition-all duration-300 shadow-xl focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
            </button>

            <!-- Viewport Slider -->
            <div class="overflow-hidden -mx-4 px-4 py-6">
                <div x-ref="slider"
                     @scroll.debounce.50ms="updateActiveSlide"
                     class="flex w-full overflow-x-auto snap-x snap-mandatory scrollbar-hide pb-8 space-x-4 md:space-x-6"
                     style="-ms-overflow-style: none; scrollbar-width: none;">

                    <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="w-[85%] md:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] flex-shrink-0 snap-center">
                        <div class="relative rounded-3xl overflow-hidden group shadow-md hover:shadow-2xl border border-gray-100 transition-all duration-500 aspect-[4/3] transform hover:-translate-y-2">
                            <img src="<?php echo e(str_starts_with($gallery->gambar, 'images/') ? asset($gallery->gambar) : asset('storage/' . $gallery->gambar)); ?>" alt="<?php echo e($gallery->nama_gambar); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                                <?php if($gallery->kategori): ?>
                                    <p class="text-primary-300 font-bold text-xs tracking-widest uppercase mb-1"><?php echo e($gallery->kategori); ?></p>
                                <?php endif; ?>
                                <p class="text-white font-bold text-xl font-heading"><?php echo e($gallery->nama_gambar); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>

            <div class="flex justify-center space-x-2 mt-2">
                <template x-for="i in (maxSlide + 1)">
                    <button @click="scrollToSlide(i - 1)"
                            :class="activeSlide === (i - 1) ? 'w-8 bg-primary-700 shadow-md' : 'w-2.5 bg-primary-200'"
                            class="h-2.5 rounded-full transition-all duration-300 focus:outline-none"></button>
                </template>
            </div>
        </div>
        <?php else: ?>
        <div class="text-center py-10 bg-white rounded-3xl border border-gray-100 shadow-sm max-w-4xl mx-auto">
            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <p class="text-gray-500 font-medium">Belum ada foto yang ditambahkan ke galeri.</p>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php /**PATH C:\laragon\www\ruang-les\resources\views/components/publik/galeri-tentang.blade.php ENDPATH**/ ?>