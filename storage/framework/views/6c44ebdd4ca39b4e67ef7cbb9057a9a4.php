<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['settings']));

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

foreach (array_filter((['settings']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section class="pt-32 pb-16 lg:pt-40 lg:pb-24 relative min-h-screen">
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Row 1: Intro Text & Founder Photo -->
        <div class="flex flex-col lg:flex-row items-center gap-16 mb-20">
            <!-- Teks Intro -->
            <div class="w-full lg:w-1/2">
                <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary','class' => 'inline-block py-1.5 px-4 rounded-full text-xs font-bold uppercase tracking-widest mb-6 shadow-sm border transform hover:scale-105 transition-transform duration-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary','class' => 'inline-block py-1.5 px-4 rounded-full text-xs font-bold uppercase tracking-widest mb-6 shadow-sm border transform hover:scale-105 transition-transform duration-300']); ?>
                    <?php echo e($settings['about_label'] ?? 'Mengenal Kami'); ?>

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
                <h1 class="font-heading text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
                    <?php echo nl2br(e(str_replace(['<br>', '<br/>', '<br />'], "\n", $settings['about_headline'] ?? "Belajar dengan Hati, Tumbuh dengan Percaya Diri"))); ?>

                </h1>
                <div class="space-y-4 text-gray-600 text-base md:text-lg leading-relaxed text-justify">
                    <?php
                        $about_us = $settings['about_us'] ?? "Ruang Les dirintis oleh Ismaturrohmah, seorang pendidik yang percaya bahwa setiap anak memiliki ritme serta potensi belajar yang unik. Fokus utama kami adalah mendampingi murid memahami materi pelajaran melalui pendekatan yang interaktif dan personal. Kami hadir tidak sekadar untuk mengejar nilai akademik, tetapi juga untuk membangun kemandirian dan karakter belajar yang tangguh sejak usia dini.";
                        $about_paragraphs = explode("\n", $about_us);
                    ?>
                    <?php $__currentLoopData = $about_paragraphs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paragraph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(trim($paragraph) !== ''): ?>
                            <p><?php echo e($paragraph); ?></p>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <!-- Founder Photo Container -->
            <div class="w-full lg:w-1/2 relative flex justify-center lg:justify-end">
                <div class="relative w-[80%] sm:w-[70%] lg:w-full max-w-[280px] sm:max-w-sm lg:max-w-md mx-auto transform transition-all duration-500 hover:-translate-y-2">
                    <!-- Decorative background frame -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-primary-400 to-primary-100 rounded-3xl transform rotate-3 scale-102 opacity-60 shadow-lg -z-10"></div>
                    
                    <!-- Main Photo wrapper -->
                    <div class="relative bg-white rounded-3xl shadow-xl p-2 border border-gray-100 overflow-hidden z-10">
                        <img src="<?php echo e(isset($settings['founder_image']) ? asset($settings['founder_image']) : asset('images/founder.png')); ?>" alt="Founder Ruang Les" loading="lazy" class="w-full h-auto object-cover rounded-2xl aspect-[4/5] object-center">
                    </div>

                    <!-- Floating Badge -->
                    <div class="absolute -bottom-6 -left-6 bg-white/80 backdrop-blur-md py-3 px-5 rounded-2xl shadow-2xl border border-gray-100 z-20 flex items-center space-x-3 transform hover:scale-105 transition-transform duration-300 animate-bounce-slow">
                        <div class="bg-primary-100 p-2.5 rounded-full flex items-center justify-center shadow-inner">
                            <svg class="w-6 h-6 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 font-bold tracking-wider uppercase"><?php echo e($settings['founder_role'] ?? 'Founder'); ?></p>
                            <p class="font-bold text-gray-900 text-sm"><?php echo e($settings['founder_name'] ?? 'Ismaturrohmah, S.Pd., Gr.'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 2: Visi & Misi Cards side-by-side -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
            <!-- Visi Card -->
            <div class="bg-white/70 backdrop-blur-md rounded-3xl p-8 md:p-10 border border-primary-100/50 shadow-sm hover:shadow-xl transition-all duration-300 relative overflow-hidden group transform hover:-translate-y-1">
                <div class="relative z-10">
                    <h3 class="font-heading text-lg md:text-xl font-extrabold text-primary-800 tracking-wider mb-4 uppercase">Visi</h3>
                    <p class="text-gray-700 text-base md:text-lg leading-relaxed text-justify">
                        <?php echo e($settings['visi'] ?? 'Menjadi platform digital dan mitra terpercaya bagi orang tua dalam mendampingi tumbuh kembang akademik serta pembentukan karakter anak secara holistik.'); ?>

                    </p>
                </div>
            </div>

            <!-- Misi Card -->
            <div class="bg-white/70 backdrop-blur-md rounded-3xl p-8 md:p-10 border border-primary-100/50 shadow-sm hover:shadow-xl transition-all duration-300 relative overflow-hidden group transform hover:-translate-y-1">
                <div class="relative z-10">
                    <h3 class="font-heading text-lg md:text-xl font-extrabold text-primary-800 tracking-wider mb-4 uppercase">Misi</h3>
                    <ul class="space-y-4">
                        <?php
                            $misi_text = $settings['misi'] ?? "Memberikan pendampingan belajar yang personal dan disesuaikan dengan kebutuhan unik setiap murid. Menyediakan laporan perkembangan berkala secara transparan demi menjalin komunikasi terbuka dengan orang tua. Membangun lingkungan belajar yang aman, nyaman, dan menumbuhkan rasa cinta belajar sejak dini.";
                            $misi_points = explode("\n", $misi_text);
                        ?>
                        <?php $__currentLoopData = $misi_points; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $poin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(trim($poin) !== ''): ?>
                                <li class="flex items-start">
                                    <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary','class' => 'rounded-full p-1 mr-3 mt-0.5 flex-shrink-0 shadow-sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary','class' => 'rounded-full p-1 mr-3 mt-0.5 flex-shrink-0 shadow-sm']); ?>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
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
                                    <p class="text-gray-700 text-base leading-relaxed text-justify w-full"><?php echo e($poin); ?></p>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\laragon\www\ruang-les\resources\views/components/publik/pengantar-tentang.blade.php ENDPATH**/ ?>