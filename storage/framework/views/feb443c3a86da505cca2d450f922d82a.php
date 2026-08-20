<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['settings', 'firstLine', 'secondLine']));

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

foreach (array_filter((['settings', 'firstLine', 'secondLine']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section class="relative w-full min-h-[100dvh] flex items-center pt-24 pb-16 lg:pt-28 lg:pb-20">
    <!-- Background Gradient Decorations -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob"></div>
        <div class="absolute top-48 -left-24 w-72 h-72 bg-primary-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
    </div>

    <div class="relative z-10 w-full max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row items-center justify-between">
        <!-- Text Content -->
        <div class="w-full lg:w-[60%] text-center lg:text-left">
            <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary','class' => 'inline-block py-1 px-3 rounded-full text-xs font-bold uppercase tracking-wider mb-6 shadow-sm border transform hover:scale-105 transition-transform duration-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary','class' => 'inline-block py-1 px-3 rounded-full text-xs font-bold uppercase tracking-wider mb-6 shadow-sm border transform hover:scale-105 transition-transform duration-300']); ?>
                <?php echo e($settings['hero_label'] ?? 'Solusi Edukasi Modern'); ?>

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
            <h1 class="font-heading text-4xl sm:text-5xl lg:text-5xl xl:text-6xl font-extrabold text-gray-900 leading-tight mb-6 tracking-tight">
                <?php echo nl2br(e($firstLine)); ?><br/>
                <?php if($secondLine): ?>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-700 to-primary-500"><?php echo nl2br(e($secondLine)); ?></span>
                <?php endif; ?>
            </h1>
            <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto lg:mx-0 leading-relaxed text-center lg:text-left">
                <?php echo e($settings['hero_description'] ?? 'Platform bimbingan belajar inovatif untuk siswa Sekolah Dasar (SD). Pantau perkembangan secara transparan, pilih jadwal fleksibel, dan dukung masa depan cerah buah hati Anda dengan metode belajar yang menyenangkan.'); ?>

            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start space-y-4 sm:space-y-0 sm:space-x-4">
                <?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(route('register')); ?>" class="w-full sm:w-auto flex items-center justify-center px-8 py-4 border border-transparent text-base font-bold rounded-full text-white bg-primary-700 hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 transition-all shadow-lg hover:shadow-primary-500/50 transform hover:-translate-y-1">
                        <?php echo e($settings['hero_cta_button'] ?? 'Daftar Sekarang'); ?>

                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('pendaftaran.form')); ?>" class="w-full sm:w-auto flex items-center justify-center px-8 py-4 border border-transparent text-base font-bold rounded-full text-white bg-primary-700 hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 transition-all shadow-lg hover:shadow-primary-500/50 transform hover:-translate-y-1">
                        <?php echo e($settings['hero_cta_button'] ?? 'Daftar Sekarang'); ?>

                    </a>
                <?php endif; ?>
                <a href="#program" class="w-full sm:w-auto flex items-center justify-center px-8 py-4 border-2 border-primary-700 text-base font-bold rounded-full text-primary-700 bg-transparent hover:bg-primary-50 transition-all shadow-sm transform hover:-translate-y-1">
                    <?php echo e($settings['hero_secondary_button'] ?? 'Lihat Program'); ?>

                </a>
            </div>
        </div>

        <!-- Hero Image / Visual -->
        <div class="w-full lg:w-[40%] mt-16 lg:mt-0 relative">
            <div class="relative w-[80%] sm:w-[70%] lg:w-full max-w-[280px] sm:max-w-sm lg:max-w-md mx-auto transform transition-all duration-500 group cursor-pointer focus:outline-none" tabindex="0">
                <!-- Animated Background Shape -->
                <div class="absolute inset-0 bg-gradient-to-tr from-primary-400 to-primary-200 rounded-3xl transform rotate-3 scale-102 transition-all duration-500 group-hover:rotate-6 group-focus-within:rotate-6 group-hover:scale-105 group-focus-within:scale-105 shadow-xl opacity-70"></div>
                
                <!-- Main Image -->
                <div class="relative bg-white rounded-3xl shadow-2xl p-2 border border-gray-100 overflow-hidden z-10 transition-transform duration-500 group-hover:-translate-y-2 group-focus-within:-translate-y-2">
                    <img src="<?php echo e(asset($settings['hero_image'] ?? 'images/logo.png')); ?>" alt="Logo Ruang Les Besar" class="w-full h-auto object-cover rounded-2xl aspect-square object-center shadow-inner" onerror="this.src='https://placehold.co/800x800/e5f2e2/426c3c?text=Logo+Ruang+Les'">
                </div>
                
                <!-- Floating Badge -->
                <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-xl border border-gray-100 z-20 flex items-center space-x-4 animate-bounce-slow">
                    <div class="bg-yellow-100 p-2 rounded-full">
                        <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-medium"><?php echo e($settings['hero_badge_text_1'] ?? 'Rating'); ?></p>
                        <p class="font-bold text-gray-900"><?php echo e($settings['hero_badge_text_2'] ?? '4.9 / 5.0'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\laragon\www\ruang-les\resources\views/components/publik/utama.blade.php ENDPATH**/ ?>