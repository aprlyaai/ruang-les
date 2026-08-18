<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['settings', 'faqs']));

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

foreach (array_filter((['settings', 'faqs']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section id="faq" class="py-16 lg:py-24 relative overflow-hidden">
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-16">
            <!-- FAQ Header (Kiri) -->
            <div class="w-full lg:w-1/3">
                <div class="sticky top-28">
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
                        <?php echo e($settings['faq_label'] ?? 'Pusat Bantuan'); ?>

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
                    <h2 class="font-heading text-2xl md:text-3xl font-extrabold text-gray-900 mb-4"><?php echo nl2br(e($settings['faq_headline'] ?? 'Pertanyaan yang Sering Diajukan')); ?></h2>
                    <p class="text-base text-gray-600 mb-8 text-justify">
                        <?php echo e($settings['faq_description'] ?? 'Punya pertanyaan seputar sistem pendaftaran, metode belajar, atau biaya? Temukan jawabannya di sini.'); ?>

                    </p>
                    <div class="bg-gradient-to-br from-primary-50/50 to-white p-6 rounded-2xl border border-primary-100/50 shadow-sm">
                        <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2"><?php echo nl2br(e($settings['faq_cta_headline'] ?? 'Masih punya pertanyaan?')); ?></h3>
                        <p class="text-sm text-gray-600 mb-6 leading-relaxed text-justify"><?php echo e($settings['faq_cta_description'] ?? 'Tim Ruang Les siap membantu Anda kapan saja. Jangan ragu untuk menghubungi kami.'); ?></p>
                        <a href="#footer" class="inline-flex items-center justify-center w-full px-5 py-3 border border-transparent text-sm font-bold rounded-2xl text-white bg-primary-700 hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 transition-all shadow-sm">
                            <?php echo e($settings['faq_cta_button'] ?? 'Hubungi Kami'); ?>

                        </a>
                    </div>
                </div>
            </div>

            <!-- FAQ Accordion List (Kanan) -->
            <div class="w-full lg:w-2/3">
                <div x-data="{ activeFaq: null }" class="space-y-3">
                    <?php $__empty_1 = true; $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="border border-primary-100/50 rounded-2xl bg-white/70 backdrop-blur-md shadow-sm hover:border-primary-300 transition-colors duration-300 overflow-hidden">
                            <button @click="activeFaq = activeFaq === <?php echo e($faq->faq_id); ?> ? null : <?php echo e($faq->faq_id); ?>"
                                    class="w-full px-5 py-4 text-left flex justify-between items-center focus:outline-none focus:bg-primary-50 focus:ring-inset focus:ring-2 focus:ring-primary-500 transition-all group">
                                <span class="font-bold text-base text-gray-900 pr-6 group-hover:text-primary-700 transition-colors" :class="activeFaq === <?php echo e($faq->faq_id); ?> ? 'text-primary-700' : ''">
                                    <?php echo e($faq->pertanyaan); ?>

                                </span>
                                <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary','class' => 'bg-white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary','class' => 'bg-white']); ?>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                                    </svg>
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
                            </button>
                            
                            <div x-show="activeFaq === <?php echo e($faq->faq_id); ?>"
                                 x-collapse 
                                 class="px-5 pb-4 text-gray-600 text-sm leading-relaxed">
                                <div class="pt-4 border-t border-gray-100 text-justify">
                                    <?php echo e($faq->jawaban); ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-center py-8">
                        <p class="text-gray-500 italic"><?php echo e($settings['empty_faq'] ?? 'Belum ada FAQ.'); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\laragon\www\ruang-les-v2\resources\views/components/publik/faq.blade.php ENDPATH**/ ?>