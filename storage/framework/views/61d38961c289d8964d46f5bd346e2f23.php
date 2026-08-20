<?php $__env->startSection('title', 'Dashboard Mentor'); ?>

<?php $__env->startSection('content'); ?>
<div x-data="{ mounted: false }" x-init="setTimeout(() => mounted = true, 100)">
    <?php
        $formattedDate = \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY');
    ?>

    <div x-show="mounted" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="mb-8">
        <!-- Welcome Section -->
        <?php if (isset($component)) { $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.tajuk-halaman','data' => ['description' => 'Selamat datang di Ruang Les. Mari bantu wujudkan potensi terbaik setiap murid hari ini.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.tajuk-halaman'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['description' => 'Selamat datang di Ruang Les. Mari bantu wujudkan potensi terbaik setiap murid hari ini.']); ?>
             <?php $__env->slot('titleSlot', null, []); ?> 
                <span class="inline-flex items-center flex-wrap">Halo, <?php echo e(Auth::user()->name); ?>! <span class="ml-2 text-3xl sm:text-4xl inline-block animate-bounce" style="animation-duration: 2s;">👋</span></span>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce)): ?>
<?php $attributes = $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce; ?>
<?php unset($__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce)): ?>
<?php $component = $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce; ?>
<?php unset($__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce); ?>
<?php endif; ?>
    </div>

    <!-- Quick Stats -->
    <div x-show="mounted" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

        <!-- Urut 1: Sesi Terlaksana -->
        <?php if (isset($component)) { $__componentOriginalef8e49027d66d5ee542acca573cb2733 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalef8e49027d66d5ee542acca573cb2733 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.kartu-statistik','data' => ['url' => ''.e(route('mentor.jadwal')).'','theme' => 'gradient','color' => 'primary','badgeText' => 'Bulan Ini','title' => 'Sesi Terlaksana','value' => ''.e($totalSesiBulanIni).'','unit' => 'sesi']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.kartu-statistik'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => ''.e(route('mentor.jadwal')).'','theme' => 'gradient','color' => 'primary','badgeText' => 'Bulan Ini','title' => 'Sesi Terlaksana','value' => ''.e($totalSesiBulanIni).'','unit' => 'sesi']); ?>
             <?php $__env->slot('icon', null, []); ?> 
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalef8e49027d66d5ee542acca573cb2733)): ?>
<?php $attributes = $__attributesOriginalef8e49027d66d5ee542acca573cb2733; ?>
<?php unset($__attributesOriginalef8e49027d66d5ee542acca573cb2733); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalef8e49027d66d5ee542acca573cb2733)): ?>
<?php $component = $__componentOriginalef8e49027d66d5ee542acca573cb2733; ?>
<?php unset($__componentOriginalef8e49027d66d5ee542acca573cb2733); ?>
<?php endif; ?>

        <!-- Urut 2: Tugas Tertunda -->
        <?php if (isset($component)) { $__componentOriginalef8e49027d66d5ee542acca573cb2733 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalef8e49027d66d5ee542acca573cb2733 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.kartu-statistik','data' => ['url' => '#tugas-tertunda','theme' => 'glass','color' => ''.e($tugasTertunda > 0 ? 'red' : 'primary').'','badgeText' => 'Hari Ini','title' => 'Tugas Tertunda','value' => ''.e($tugasTertunda).'','unit' => 'tugas']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.kartu-statistik'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => '#tugas-tertunda','theme' => 'glass','color' => ''.e($tugasTertunda > 0 ? 'red' : 'primary').'','badgeText' => 'Hari Ini','title' => 'Tugas Tertunda','value' => ''.e($tugasTertunda).'','unit' => 'tugas']); ?>
             <?php $__env->slot('icon', null, []); ?> 
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalef8e49027d66d5ee542acca573cb2733)): ?>
<?php $attributes = $__attributesOriginalef8e49027d66d5ee542acca573cb2733; ?>
<?php unset($__attributesOriginalef8e49027d66d5ee542acca573cb2733); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalef8e49027d66d5ee542acca573cb2733)): ?>
<?php $component = $__componentOriginalef8e49027d66d5ee542acca573cb2733; ?>
<?php unset($__componentOriginalef8e49027d66d5ee542acca573cb2733); ?>
<?php endif; ?>

        <!-- Urut 3: Total Murid Ajar -->
        <?php if (isset($component)) { $__componentOriginalef8e49027d66d5ee542acca573cb2733 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalef8e49027d66d5ee542acca573cb2733 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.kartu-statistik','data' => ['url' => ''.e(route('mentor.riwayat-belajar')).'','theme' => 'glass','color' => 'primary','badgeText' => 'Aktif','title' => 'Total Murid Ajar','value' => ''.e($totalSiswa).'','unit' => 'anak']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.kartu-statistik'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => ''.e(route('mentor.riwayat-belajar')).'','theme' => 'glass','color' => 'primary','badgeText' => 'Aktif','title' => 'Total Murid Ajar','value' => ''.e($totalSiswa).'','unit' => 'anak']); ?>
             <?php $__env->slot('icon', null, []); ?> 
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalef8e49027d66d5ee542acca573cb2733)): ?>
<?php $attributes = $__attributesOriginalef8e49027d66d5ee542acca573cb2733; ?>
<?php unset($__attributesOriginalef8e49027d66d5ee542acca573cb2733); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalef8e49027d66d5ee542acca573cb2733)): ?>
<?php $component = $__componentOriginalef8e49027d66d5ee542acca573cb2733; ?>
<?php unset($__componentOriginalef8e49027d66d5ee542acca573cb2733); ?>
<?php endif; ?>
    </div>

    <!-- Pending Tasks Alert -->
    <div x-show="mounted" x-transition:enter="transition ease-out duration-500 delay-200" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="mb-8">
        <?php if($tugasTertunda > 0): ?>
    <div id="tugas-tertunda" class="bg-orange-50 border border-orange-200 rounded-2xl p-6 shadow-sm scroll-mt-24">
        <h3 class="text-lg font-bold text-orange-800 mb-4 flex items-center">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            Tugas Administrasi Kelas Hari Ini
        </h3>
        <ul class="space-y-3">
            <?php $__currentLoopData = $detailTugas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tugas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-white p-4 rounded-xl shadow-sm border border-orange-100">
                    <div>
                        <p class="font-semibold text-gray-900"><?php echo e($tugas['siswa']); ?></p>
                        <p class="text-sm text-gray-600">Jadwal: <?php echo e($tugas['jadwal']); ?></p>
                    </div>
                    <div class="flex flex-wrap gap-1.5">
                            <?php if($tugas['belum_presensi']): ?>
                                <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'danger','class' => 'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'danger','class' => 'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold whitespace-nowrap']); ?>Belum Presensi <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $attributes = $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $component = $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
                            <?php endif; ?>
                            <?php if($tugas['belum_catatan']): ?>
                                <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'danger','class' => 'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'danger','class' => 'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold whitespace-nowrap']); ?>Belum Catatan <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $attributes = $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $component = $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
                            <?php endif; ?>
                            <?php if($tugas['belum_nilai']): ?>
                                <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'danger','class' => 'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'danger','class' => 'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold whitespace-nowrap']); ?>Belum Nilai <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $attributes = $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $component = $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
                            <?php endif; ?>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="mt-4">
            <a href="<?php echo e(route('mentor.jadwal')); ?>" class="inline-flex items-center px-4 py-2 bg-orange-600 hover:bg-orange-700 text-white font-medium rounded-xl transition-colors">
                Buka Jadwal Kelas
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </div>
    <?php else: ?>
    <div id="tugas-tertunda" class="bg-primary-50 border border-primary-200 rounded-2xl p-6 shadow-sm text-center scroll-mt-24">
        <div class="w-16 h-16 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        </div>
        <h3 class="text-lg font-bold text-primary-800 mb-2">Semua Tugas Selesai!</h3>
        <p class="text-primary-700">Anda telah menyelesaikan semua pengisian data untuk kelas hari ini.</p>
    </div>
    <?php endif; ?>
    </div>

    <!-- Jadwal Hari Ini Section -->
    <div x-show="mounted" x-transition:enter="transition ease-out duration-500 delay-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-bold text-gray-900 flex items-center">
                <svg class="w-6 h-6 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Jadwal Kelas Hari Ini
            </h2>
            <a href="<?php echo e(route('mentor.jadwal')); ?>" class="text-sm font-bold text-primary-600 hover:text-primary-700">Lihat Semua Jadwal</a>
        </div>

        <?php if($jadwalHariIni->isEmpty()): ?>
            <?php if (isset($component)) { $__componentOriginala248761445578b3580e6fcec2c0db260 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala248761445578b3580e6fcec2c0db260 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.keadaan-kosong','data' => ['title' => 'Yeay! Tidak Ada Jadwal','message' => 'Anda tidak memiliki jadwal mengajar hari ini.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.keadaan-kosong'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Yeay! Tidak Ada Jadwal','message' => 'Anda tidak memiliki jadwal mengajar hari ini.']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala248761445578b3580e6fcec2c0db260)): ?>
<?php $attributes = $__attributesOriginala248761445578b3580e6fcec2c0db260; ?>
<?php unset($__attributesOriginala248761445578b3580e6fcec2c0db260); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala248761445578b3580e6fcec2c0db260)): ?>
<?php $component = $__componentOriginala248761445578b3580e6fcec2c0db260; ?>
<?php unset($__componentOriginala248761445578b3580e6fcec2c0db260); ?>
<?php endif; ?>
        <?php else: ?>
            <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-gray-50/50 border-b border-primary-100/50 text-xs font-bold text-gray-500 uppercase tracking-wider">
                                <th class="px-6 py-4">Nama Kelas & Paket</th>
                                <th class="px-6 py-4">Waktu Belajar</th>
                                <th class="px-6 py-4">Daftar Murid</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            <?php $__currentLoopData = $jadwalHariIni; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 align-top">
                                        <p class="font-bold text-gray-900 text-sm"><?php echo e($schedule->nama_kelas); ?></p>
                                        <p class="text-xs text-gray-500 mt-0.5"><?php echo e($schedule->package->nama_program ?? 'Paket'); ?></p>
                                    </td>
                                    <td class="px-6 py-4 align-top whitespace-nowrap">
                                        <div class="font-semibold text-gray-900 text-sm flex items-center mt-1 whitespace-nowrap">
                                            <svg class="w-4 h-4 mr-1.5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <span class="whitespace-nowrap"><?php echo e($schedule->formatted_time_range); ?></span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 align-top">
                                        <?php if($schedule->students->isEmpty()): ?>
                                            <p class="text-xs text-gray-400 italic mt-1">Belum ada murid di kelas ini.</p>
                                        <?php else: ?>
                                            <div class="space-y-2 max-w-xl">
                                                <?php $__currentLoopData = $schedule->students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-2 bg-gray-50/50 rounded-xl border border-gray-100/80">
                                                        <div class="flex items-center space-x-2.5">
                                                            <?php if (isset($component)) { $__componentOriginala3b0902aa82c25e0a3af1fd64938810c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3b0902aa82c25e0a3af1fd64938810c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.avatar','data' => ['name' => $student->nama_murid,'size' => '7','textSize' => 'text-[10px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.avatar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->nama_murid),'size' => '7','textSize' => 'text-[10px]']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala3b0902aa82c25e0a3af1fd64938810c)): ?>
<?php $attributes = $__attributesOriginala3b0902aa82c25e0a3af1fd64938810c; ?>
<?php unset($__attributesOriginala3b0902aa82c25e0a3af1fd64938810c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala3b0902aa82c25e0a3af1fd64938810c)): ?>
<?php $component = $__componentOriginala3b0902aa82c25e0a3af1fd64938810c; ?>
<?php unset($__componentOriginala3b0902aa82c25e0a3af1fd64938810c); ?>
<?php endif; ?>
                                                            <span class="font-bold text-gray-800 text-xs"><?php echo e($student->nama_murid); ?></span>
                                                        </div>
                                                        <div class="flex flex-wrap gap-1.5">
                                                            <a href="<?php echo e(route('mentor.presensi.create', ['jadwal_id' => $schedule->jadwal_id, 'siswa_id' => $student->murid_id])); ?>"
                                                               class="inline-flex items-center px-2.5 py-1 bg-green-50 text-green-700 hover:bg-green-100 hover:text-green-800 rounded-lg text-[10px] font-bold transition-colors" title="Isi Presensi">
                                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                                                                Presensi
                                                            </a>
                                                            <a href="<?php echo e(route('mentor.catatan.create', ['jadwal_id' => $schedule->jadwal_id, 'siswa_id' => $student->murid_id])); ?>"
                                                               class="inline-flex items-center px-2.5 py-1 bg-blue-50 text-blue-700 hover:bg-blue-100 hover:text-blue-800 rounded-lg text-[10px] font-bold transition-colors" title="Isi Catatan">
                                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                                Catatan
                                                            </a>
                                                            <a href="<?php echo e(route('mentor.nilai.create', ['jadwal_id' => $schedule->jadwal_id, 'siswa_id' => $student->murid_id])); ?>"
                                                               class="inline-flex items-center px-2.5 py-1 bg-purple-50 text-purple-700 hover:bg-purple-100 hover:text-purple-800 rounded-lg text-[10px] font-bold transition-colors" title="Input Nilai">
                                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                                                Nilai
                                                            </a>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Pengumuman Section -->
    <div x-show="mounted" x-transition:enter="transition ease-out duration-500 delay-500" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="mb-8">
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-50 flex items-center bg-primary-50/50">
                <svg class="w-6 h-6 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                <h3 class="font-bold text-gray-900 text-lg">Pengumuman</h3>
            </div>

            <?php if(isset($pengumumans) && $pengumumans->count() > 0): ?>
            <div class="divide-y divide-gray-100 max-h-96 overflow-y-auto">
                <?php $__currentLoopData = $pengumumans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengumuman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="p-6 <?php echo e($pengumuman->diprioritaskan ? 'bg-amber-50/30' : 'hover:bg-gray-50 transition-colors'); ?>">
                    <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-2 mb-2">
                        <div class="flex items-start gap-2 flex-1 min-w-0">
                            <?php if($pengumuman->diprioritaskan): ?>
                            <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'warning','class' => 'inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold shrink-0 mt-0.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'warning','class' => 'inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold shrink-0 mt-0.5']); ?>
                                <svg class="w-3 h-3 mr-1 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                                Pinned
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
                            <?php endif; ?>
                            <h4 class="font-bold text-gray-900 leading-snug flex-1 break-words"><?php echo e($pengumuman->judul_pengumuman); ?></h4>
                        </div>
                        <span class="text-xs text-gray-400 whitespace-nowrap shrink-0 sm:ml-4"><?php echo e($pengumuman->created_at->format('d M Y')); ?></span>
                    </div>
                    <div class="text-sm text-gray-600 prose prose-sm max-w-none text-justify">
                        <?php echo $pengumuman->isi_pengumuman; ?>

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php else: ?>
            <div class="p-8 flex flex-col items-center justify-center min-h-[250px]">
                <?php if (isset($component)) { $__componentOriginala248761445578b3580e6fcec2c0db260 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala248761445578b3580e6fcec2c0db260 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.keadaan-kosong','data' => ['title' => 'Tidak Ada Pengumuman','message' => 'Belum ada informasi terbaru dari admin.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.keadaan-kosong'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Tidak Ada Pengumuman','message' => 'Belum ada informasi terbaru dari admin.']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala248761445578b3580e6fcec2c0db260)): ?>
<?php $attributes = $__attributesOriginala248761445578b3580e6fcec2c0db260; ?>
<?php unset($__attributesOriginala248761445578b3580e6fcec2c0db260); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala248761445578b3580e6fcec2c0db260)): ?>
<?php $component = $__componentOriginala248761445578b3580e6fcec2c0db260; ?>
<?php unset($__componentOriginala248761445578b3580e6fcec2c0db260); ?>
<?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mentor', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ruang-les\resources\views/mentor/dasbor/utama.blade.php ENDPATH**/ ?>