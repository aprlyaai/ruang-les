<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['settings', 'testimonials']));

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

foreach (array_filter((['settings', 'testimonials']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section id="testimoni" class="py-16 lg:py-20 relative overflow-hidden">
    <!-- Background Decoration -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-primary-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40 -z-10 translate-x-1/2 -translate-y-1/2"></div>

    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
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
                <?php echo e($settings['testimoni_label'] ?? 'Kisah Sukses'); ?>

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
            <h2 class="font-heading text-2xl md:text-3xl font-extrabold text-gray-900 mb-4"><?php echo nl2br(e($settings['testimoni_headline'] ?? 'Kata Mereka Tentang Ruang Les')); ?></h2>
            <p class="text-base text-gray-600 max-w-2xl mx-auto">
                <?php echo e($settings['testimoni_description'] ?? 'Bergabunglah dengan ratusan orang tua yang telah mempercayakan perkembangan akademik anaknya kepada kami.'); ?>

            </p>
        </div>

        <!-- Testimoni Carousel Layout (Alpine.js) -->
        <div x-data="{
                activeSlide: 0,
                totalSlides: <?php echo e($testimonials->count()); ?>,
                slidesToShow: 3,
                updateSlidesToShow() {
                    if (window.innerWidth >= 1024) {
                        this.slidesToShow = 4;
                    } else if (window.innerWidth >= 768) {
                        this.slidesToShow = 2;
                    } else {
                        this.slidesToShow = 1.15;
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
                }
             }"
             x-init="updateSlidesToShow(); window.addEventListener('resize', () => { updateSlidesToShow(); })"
             class="relative max-w-[90rem] mx-auto">

            <!-- Navigation Buttons -->
            <button @click="scrollToSlide(activeSlide - 1)"
                    :disabled="activeSlide === 0"
                    :class="activeSlide === 0 ? 'opacity-0 invisible' : 'opacity-100 visible hover:bg-primary-700 hover:text-white border-primary-200 text-primary-700 active:scale-95'"
                    class="hidden md:flex absolute -left-4 lg:-left-6 top-[40%] -translate-y-1/2 z-20 w-14 h-14 rounded-full border-2 bg-white/90 backdrop-blur items-center justify-center transition-all duration-300 shadow-xl focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <button @click="scrollToSlide(activeSlide + 1)"
                    :disabled="activeSlide >= maxSlide"
                    :class="activeSlide >= maxSlide ? 'opacity-0 invisible' : 'opacity-100 visible hover:bg-primary-700 hover:text-white border-primary-200 text-primary-700 active:scale-95'"
                    class="hidden md:flex absolute -right-4 lg:-right-6 top-[40%] -translate-y-1/2 z-20 w-14 h-14 rounded-full border-2 bg-white/90 backdrop-blur items-center justify-center transition-all duration-300 shadow-xl focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
            </button>

            <!-- Viewport Slider -->
            <div class="overflow-hidden -mx-4 px-4 py-6">
                <!-- CLASS PENTING: items-start memastikan kartu rata atas dan tidak melar bersamaan -->
                <div x-ref="slider"
                     @scroll.debounce.50ms="updateActiveSlide"
                     class="flex items-start w-full overflow-x-auto snap-x snap-mandatory scrollbar-hide pb-4 space-x-4 md:space-x-6"
                     style="-ms-overflow-style: none; scrollbar-width: none;">

                    <?php $__empty_1 = true; $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <!-- Slide Card -->
                        <div class="w-[85%] md:w-[calc(50%-12px)] lg:w-[calc(25%-18px)] flex-shrink-0 snap-center transition-all duration-500">
                            <div class="bg-white/70 backdrop-blur-md rounded-2xl p-6 shadow-sm hover:shadow-xl border border-primary-100/50 transition-all duration-300 flex flex-col group h-auto"
                                 x-data="{
                                    expanded: false,
                                    clamped: true,
                                    hasOverflow: false,
                                    baseHeight: 0,
                                    checkOverflow() {
                                        if(this.expanded) return;
                                        this.hasOverflow = this.$refs.textContent.scrollHeight > this.$refs.textContent.clientHeight;
                                        if(!this.baseHeight) this.baseHeight = this.$refs.textContent.clientHeight;
                                    },
                                    toggle() {
                                        if (this.expanded) {
                                            this.expanded = false;
                                            setTimeout(() => { this.clamped = true; }, 400);
                                        } else {
                                            this.clamped = false;
                                            this.expanded = true;
                                        }
                                    }
                                 }"
                                 x-init="$nextTick(() => checkOverflow())"
                                 @resize.window.debounce.100ms="checkOverflow()">
                                <div>
                                    <!-- Star Rating -->
                                    <div class="flex items-center space-x-1 mb-6">
                                        <?php for($i = 0; $i < $testi->rating; $i++): ?>
                                            <svg class="w-5 h-5 text-yellow-400 transform transition-transform group-hover:scale-110" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <?php endfor; ?>
                                    </div>

                                    <!-- Content with Line Clamping -->
                                    <div class="relative z-10 mb-2">
                                        <span class="text-5xl text-primary-500 absolute -top-4 -left-2 -z-10 font-serif leading-none">"</span>
                                        <div class="overflow-hidden transition-[max-height] duration-500 ease-in-out relative z-10"
                                             :style="expanded ? `max-height: ${$refs.textContent.scrollHeight + 20}px` : `max-height: ${baseHeight ? baseHeight + 'px' : '4.875rem'}`">
                                            <p x-ref="textContent"
                                               class="text-gray-700 text-base leading-relaxed italic"
                                               :class="clamped ? 'line-clamp-3' : ''">
                                                <?php echo e($testi->testimoni); ?>

                                            </p>
                                        </div>
                                        <span class="text-5xl text-primary-500 absolute -bottom-4 right-0 -z-10 font-serif leading-none rotate-180">"</span>
                                    </div>

                                    <!-- Expander Button (Hanya Muncul Jika Overflow) -->
                                    <div style="display: none;" x-show="hasOverflow || expanded">
                                        <button @click="toggle()" class="text-sm font-bold text-primary-700 hover:text-primary-800 text-left mb-8 focus:outline-none flex items-center inline-flex transition-colors mt-2">
                                            <span x-text="expanded ? 'Tampilkan lebih sedikit' : 'Baca selengkapnya'"></span>
                                            <svg class="w-4 h-4 ml-1 transform transition-transform duration-300" :class="expanded ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </button>
                                    </div>

                                    <!-- Spacer untuk card pendek (Muncul jika tidak overflow) -->
                                    <div x-show="!hasOverflow && !expanded" class="mb-8 mt-2 h-5"></div>
                                </div>

                                <!-- Author Profile -->
                                <div class="flex items-center space-x-4 mt-auto pt-4 border-t border-gray-100">
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-primary-500 to-primary-700 flex items-center justify-center flex-shrink-0 shadow-md">
                                        <span class="font-bold text-white text-lg"><?php echo e(substr($testi->nama_pemberi, 0, 1)); ?></span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900"><?php echo e($testi->nama_pemberi); ?></h4>
                                        <p class="text-sm text-primary-700 font-medium"><?php echo e($testi->peran_pemberi); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="w-full py-12 text-center bg-white/50 rounded-2xl border border-dashed border-primary-200">
                    <svg class="w-16 h-16 mx-auto text-primary-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    <p class="text-gray-600 font-medium"><?php echo e($settings['empty_testimoni'] ?? 'Belum ada testimoni.'); ?></p>
                </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Pagination Dots -->
            <?php if($testimonials->count() > 1): ?>
            <div class="flex justify-center space-x-2 mt-0">
                <template x-for="i in (maxSlide + 1)">
                    <button @click="scrollToSlide(i - 1)"
                            :class="activeSlide === (i - 1) ? 'w-8 bg-primary-700 shadow-md' : 'w-2.5 bg-primary-200'"
                            class="h-2.5 rounded-full transition-all duration-300 focus:outline-none"></button>
                </template>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH C:\laragon\www\ruang-les\resources\views/components/publik/testimoni.blade.php ENDPATH**/ ?>