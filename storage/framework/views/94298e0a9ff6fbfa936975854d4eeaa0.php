<?php $__env->startSection('title', 'Detail Profil Murid'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="<?php echo e(route('admin.students.index')); ?>" class="hover:text-primary-600 transition-colors">Data Murid</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Profil Murid</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6 w-full" x-data="{ activeTab: 'profil' }">

    <!-- Header Actions -->
    <div class="mb-4">
        <?php if (isset($component)) { $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.tajuk-halaman','data' => ['title' => 'Detail Profil Murid','backUrl' => ''.e(route('admin.students.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.tajuk-halaman'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Detail Profil Murid','backUrl' => ''.e(route('admin.students.index')).'']); ?>
             <?php $__env->slot('rightActions', null, []); ?> 
                <a href="<?php echo e(route('admin.students.edit', ['student' => $student->id, 'from' => 'detail'])); ?>" class="w-full sm:w-auto px-4 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-xl font-bold text-sm hover:bg-primary-50 hover:text-primary-700 hover:border-primary-300 transition-colors shadow-sm flex items-center justify-center">
                    <svg class="w-4 h-4 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Edit Data
                </a>
                <form action="<?php echo e(route('admin.students.destroy', $student->id)); ?>" method="POST" id="deleteForm" class="w-full sm:w-auto">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="w-full sm:w-auto px-4 py-2.5 bg-white border border-red-200 text-red-600 rounded-xl font-bold text-sm hover:bg-red-50 hover:border-red-300 transition-colors shadow-sm flex items-center justify-center">
                        <svg class="w-4 h-4 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Hapus
                    </button>
                </form>
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

    <!-- Top Banner: Hero Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-6 md:p-8">
        <div class="flex flex-col md:flex-row items-center md:items-center gap-6">
            <div class="flex-shrink-0">
                <div class="w-20 h-20 md:w-24 md:h-24 rounded-full bg-primary-50 border border-primary-100 flex items-center justify-center text-4xl font-extrabold text-primary-700 shadow-sm">
                    <?php echo e(substr($student->nama_murid, 0, 1)); ?>

                </div>
            </div>

            <div class="flex-grow flex flex-col md:flex-row justify-between items-center md:items-center gap-6 w-full text-center md:text-left">
                <div class="flex flex-col justify-center">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900"><?php echo e($student->nama_murid); ?></h2>
                    <p class="text-primary-600 font-semibold text-base mt-1">Panggilan: <?php echo e($student->panggilan_murid); ?></p>

                    <div class="mt-3 flex flex-wrap justify-center md:justify-start gap-4 md:gap-3">
                        <?php if($student->status_murid === 'active'): ?>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium text-primary-700 bg-primary-50 border border-primary-200 w-fit">
                                <span class="w-2 h-2 rounded-full bg-primary-500 mr-2 animate-pulse"></span> Murid Aktif
                            </span>
                        <?php else: ?>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium text-gray-600 bg-gray-50 border border-gray-200 w-fit">
                                <span class="w-2 h-2 rounded-full bg-gray-500 mr-2"></span> Nonaktif
                            </span>
                        <?php endif; ?>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium text-gray-600 bg-gray-50 border border-gray-200 w-fit">
                            Kelas <?php echo e($student->kelas); ?>

                        </span>
                    </div>
                </div>

                <div class="flex-shrink-0">
                    <div class="bg-gradient-to-br from-primary-600 to-primary-800 rounded-2xl border border-primary-500 p-4 text-center min-w-[140px] shadow-sm text-white">
                        <div class="text-xs font-bold text-primary-100 mb-2 uppercase tracking-wider">Total Kelas Diikuti</div>
                        <div class="text-2xl font-extrabold text-white"><?php echo e($student->classes->count()); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col">
        <!-- Tabs Navigation (Desktop Underline Style without Scrollbar Slider) -->
        <div class="bg-white/80 backdrop-blur-md rounded-t-2xl border border-primary-100/50 border-b-0 overflow-hidden">
            <nav class="flex flex-nowrap overflow-x-auto border-b border-gray-100 [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]" aria-label="Tabs">
                <button @click="activeTab = 'profil'"
                        :class="{'border-primary-500 text-primary-700 bg-primary-50/50': activeTab === 'profil', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': activeTab !== 'profil'}"
                        class="flex-1 shrink-0 whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                    <div class="flex items-center justify-center gap-1.5">
                        <svg class="w-5 h-5 mr-1 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Profil & Jadwal
                    </div>
                </button>

                <button @click="activeTab = 'presensi'"
                        :class="{'border-primary-500 text-primary-700 bg-primary-50/50': activeTab === 'presensi', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': activeTab !== 'presensi'}"
                        class="flex-1 shrink-0 whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                    <div class="flex items-center justify-center gap-1.5">
                        <svg class="w-5 h-5 mr-1 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Presensi
                        <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary','class' => 'ml-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary','class' => 'ml-1']); ?><?php echo e($attendances->count()); ?> <?php echo $__env->renderComponent(); ?>
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
                </button>

                <button @click="activeTab = 'catatan'"
                        :class="{'border-primary-500 text-primary-700 bg-primary-50/50': activeTab === 'catatan', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': activeTab !== 'catatan'}"
                        class="flex-1 shrink-0 whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                    <div class="flex items-center justify-center gap-1.5">
                        <svg class="w-5 h-5 mr-1 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        Catatan Perkembangan
                        <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary','class' => 'ml-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary','class' => 'ml-1']); ?><?php echo e($notes->count()); ?> <?php echo $__env->renderComponent(); ?>
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
                </button>

                <button @click="activeTab = 'nilai'"
                        :class="{'border-primary-500 text-primary-700 bg-primary-50/50': activeTab === 'nilai', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': activeTab !== 'nilai'}"
                        class="flex-1 shrink-0 whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                    <div class="flex items-center justify-center gap-1.5">
                        <svg class="w-5 h-5 mr-1 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        Nilai
                        <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary','class' => 'ml-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary','class' => 'ml-1']); ?><?php echo e($scores->count()); ?> <?php echo $__env->renderComponent(); ?>
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
                </button>
            </nav>
        </div>

        <!-- Tab Contents -->
        <div class="bg-white/90 backdrop-blur-sm border border-primary-100/50 rounded-b-2xl shadow-sm p-6">

            <!-- PROFIL TAB -->
            <div x-show="activeTab === 'profil'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0">
                <!-- Main Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    <!-- Kolom Kiri: Detail Informasi -->
                    <div class="lg:col-span-2 space-y-6">

            <!-- Biodata Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5">
                <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-100 pb-3 ">Biodata Diri Anak</h3>
                <div>
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-6">
                        <div>
                            <dt class="block text-sm text-gray-600 font-semibold mb-1">Tempat, Tanggal Lahir</dt>
                            <dd class="font-semibold text-gray-900 text-sm"><?php echo e($student->tempat_lahir_murid); ?>, <?php echo e(\Carbon\Carbon::parse($student->tanggal_lahir_murid)->translatedFormat('d F Y')); ?></dd>
                        </div>
                        <div>
                            <dt class="block text-sm text-gray-600 font-semibold mb-1">Jenis Kelamin</dt>
                            <dd class="font-semibold text-gray-900 text-sm"><?php echo e($student->jenis_kelamin_murid); ?></dd>
                        </div>
                        <div>
                            <dt class="block text-sm text-gray-600 font-semibold mb-1">Agama</dt>
                            <dd class="font-semibold text-gray-900 text-sm"><?php echo e($student->agama ?? '-'); ?></dd>
                        </div>
                        <div>
                            <dt class="block text-sm text-gray-600 font-semibold mb-1">Tanggal Terdaftar</dt>
                            <dd class="font-semibold text-gray-900 text-sm"><?php echo e($student->created_at->translatedFormat('d F Y')); ?></dd>
                        </div>
                    </dl>
                </div>
            </div>

            <!-- Tabel Riwayat Kelas -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden">
                <div class="p-5 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="text-lg font-bold text-primary-800 ">Jadwal Kelas</h3>
                </div>

                <?php if($student->classes->count() > 0): ?>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse min-w-[500px]">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-100 text-xs font-extrabold text-gray-500 uppercase tracking-wider">
                                    <th class="py-3 px-6">Nama Kelas & Paket</th>
                                    <th class="py-3 px-6">Jadwal Belajar</th>
                                    <th class="py-3 px-6 text-center">Mentor</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <?php $__currentLoopData = $student->classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-6">
                                        <p class="font-bold text-gray-900 text-sm"><?php echo e($kelas->nama_kelas); ?></p>
                                        <p class="text-xs text-gray-500 mt-0.5"><?php echo e(optional($kelas->package)->nama_program ?? '-'); ?></p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="font-semibold text-gray-900 text-sm flex items-center">
                                            <svg class="w-4 h-4 mr-1.5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <span class="whitespace-nowrap"><?php echo e($kelas->hari); ?>, <?php echo e($kelas->formatted_time_range); ?></span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <?php if (isset($component)) { $__componentOriginala3b0902aa82c25e0a3af1fd64938810c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3b0902aa82c25e0a3af1fd64938810c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.avatar','data' => ['name' => optional($kelas->mentor)->name ?? 'M','size' => '7','textSize' => 'text-[10px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.avatar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(optional($kelas->mentor)->name ?? 'M'),'size' => '7','textSize' => 'text-[10px]']); ?>
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
                                            <span class="font-semibold text-gray-900 text-sm ml-2.5 whitespace-nowrap"><?php echo e(optional($kelas->mentor)->name ?? 'Belum ada mentor'); ?></span>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="p-8 text-center">
                        <div class="w-16 h-16 rounded-full bg-gray-50 flex items-center justify-center mx-auto mb-3 border border-gray-100">
                            <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-gray-500 font-medium">Murid ini belum terdaftar di kelas manapun.</p>
                    </div>
                <?php endif; ?>
            </div>

        </div>

        <!-- Kolom Kanan: Sidebar Akademik -->
        <div class="space-y-6">

            <!-- Paket & Kuota Card -->
            <?php if(($student->kuota_belajar ?? 0) <= 0): ?>
                <div class="bg-gradient-to-br from-red-500 to-red-700 rounded-2xl shadow-md border border-red-400 p-5 text-white relative overflow-hidden">
                    <div class="space-y-4">
                        <div>
                            <p class="block text-xs text-red-200 font-semibold uppercase tracking-wider mb-1">Sisa Kuota Belajar</p>
                            <div class="flex items-end">
                                <span class="text-4xl font-extrabold text-white leading-none"><?php echo e($student->kuota_belajar ?? 0); ?></span>
                                <span class="text-sm text-red-200 font-medium ml-2 mb-0.5">Sesi (Limit Tercapai)</span>
                            </div>
                        </div>

                        <div class="pt-3 border-t border-white/20">
                            <p class="block text-xs text-red-200 font-semibold uppercase tracking-wider mb-1">Estimasi Selesai (Hari-H)</p>
                            <p class="font-bold text-white text-sm">
                                <?php echo e($student->estimasi_hari_h ? \Carbon\Carbon::parse($student->estimasi_hari_h)->translatedFormat('l, d F Y') : 'Hari-H Pembayaran'); ?>

                            </p>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="bg-gradient-to-br from-primary-600 to-primary-800 rounded-2xl shadow-md border border-primary-500 p-5 text-white relative overflow-hidden">
                    <div class="space-y-4">
                        <div>
                            <p class="block text-xs text-primary-200 font-semibold uppercase tracking-wider mb-1">Sisa Kuota Belajar</p>
                            <div class="flex items-end">
                                <span class="text-4xl font-extrabold text-white leading-none"><?php echo e($student->kuota_belajar ?? 0); ?></span>
                                <span class="text-sm text-primary-200 font-medium ml-2 mb-0.5">Sesi Aktif</span>
                            </div>
                        </div>

                        <div class="pt-3 border-t border-white/20">
                            <p class="block text-xs text-primary-200 font-semibold uppercase tracking-wider mb-1">Estimasi Selesai (Hari-H)</p>
                            <p class="font-bold text-white text-sm">
                                <?php echo e($student->estimasi_hari_h ? \Carbon\Carbon::parse($student->estimasi_hari_h)->translatedFormat('l, d F Y') : '-'); ?>

                            </p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Wali Murid Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5">
                <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-100 pb-3 ">Informasi Orang Tua / Wali Murid</h3>
                <div>
                    <div class="flex items-center mb-5">
                        <div class="w-12 h-12 rounded-full bg-primary-50 text-primary-600 flex items-center justify-center font-bold mr-4 border border-primary-100 flex-shrink-0">
                            <?php echo e(substr(optional($student->parent)->name ?? '?', 0, 1)); ?>

                        </div>
                        <div>
                            <p class="font-bold text-gray-900 leading-tight"><?php echo e(optional($student->parent)->name ?? 'Tidak Ada Data'); ?></p>
                            <p class="text-xs font-medium text-gray-500 mt-0.5"><?php echo e(optional($student->parent)->email); ?></p>
                        </div>
                    </div>

                    <?php if($student->parent): ?>
                    <a href="<?php echo e(route('admin.parents.show', $student->parent?->user_id)); ?>" class="w-full inline-flex justify-center items-center px-4 py-2 bg-gray-50 hover:bg-primary-50 border border-gray-200 hover:border-primary-200 hover:text-primary-700 rounded-xl text-sm font-bold transition-colors">
                        Lihat Profil Wali Murid
                    </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Kondisi Akademik Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5">
                <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-100 pb-3 ">Catatan Akademik</h3>
                <div class="space-y-5">

                    <div>
                        <p class="block text-sm text-gray-600 font-semibold mb-1">Asal Sekolah</p>
                        <p class="font-semibold text-gray-900 text-sm"><?php echo e($student->sekolah); ?></p>
                    </div>

                    <div>
                        <p class="block text-sm text-gray-600 font-semibold mb-1">Nilai Rata-rata Rapor</p>
                        <p class="text-lg font-extrabold text-primary-600"><?php echo e($student->nilai_rata_rata ?? 'N/A'); ?></p>
                    </div>

                    <div class="pt-4 border-t border-gray-100">
                        <p class="block text-sm text-gray-600 font-semibold mb-1">Target Peningkatan Mapel</p>
                        <p class="font-semibold text-gray-900 text-sm"><?php echo e($student->mapel_ditingkatkan ?? '-'); ?></p>
                    </div>

                    <div class="pt-4 border-t border-gray-100">
                        <p class="block text-sm text-gray-600 font-semibold mb-1">Mapel Kurang Dikuasai</p>
                        <p class="font-semibold text-gray-900 text-sm"><?php echo e($student->mapel_sulit ?? '-'); ?></p>
                    </div>

                    <div class="pt-4 border-t border-gray-100">
                        <p class="block text-sm text-gray-600 font-semibold mb-2">Karakteristik & Kemampuan</p>
                        <div class="bg-gray-50 rounded-xl p-4 border border-gray-100 text-sm font-medium text-gray-700 leading-relaxed italic">
                            "<?php echo e($student->karakteristik_anak ?? 'Belum ada catatan.'); ?>"
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- End Kolom Kanan -->
    </div> <!-- End Main Grid -->
</div> <!-- End PROFIL TAB -->

            <!-- PRESENSI TAB -->
            <div x-show="activeTab === 'presensi'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" style="display: none;">
                <?php if($attendances->isEmpty()): ?>
                    <?php if (isset($component)) { $__componentOriginala248761445578b3580e6fcec2c0db260 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala248761445578b3580e6fcec2c0db260 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.keadaan-kosong','data' => ['title' => 'Belum Ada Data Presensi','message' => 'Murid ini belum pernah diinput absensinya di kelas manapun.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.keadaan-kosong'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Belum Ada Data Presensi','message' => 'Murid ini belum pernah diinput absensinya di kelas manapun.']); ?>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
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
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse min-w-[600px]">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200">
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Kelas & Paket</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Mentor</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $att): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <td class="px-6 py-4">
                                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider whitespace-nowrap">Pertemuan Ke-<?php echo e($loop->count - $loop->index); ?></p>
                                            <p class="text-sm font-extrabold text-gray-900 mt-0.5 whitespace-nowrap"><?php echo e(\Carbon\Carbon::parse($att->tanggal_presensi)->translatedFormat('l, d F Y')); ?></p>
                                        </td>
                                        <td class="px-6 py-4">
                                            <p class="text-sm font-semibold text-gray-900"><?php echo e($att->schedule?->nama_kelas ?? 'Tanpa Kelas'); ?></p>
                                            <p class="text-xs text-gray-500 mt-0.5"><?php echo e($att->schedule?->package?->nama_program ?? 'Paket'); ?></p>
                                        </td>
                                        <td class="px-6 py-4 align-middle">
                                            <span class="text-sm font-bold text-gray-800 whitespace-nowrap"><?php echo e($att->schedule?->mentor?->nama_murid ?? 'Tidak diketahui'); ?></span>
                                        </td>
                                        <td class="px-4 py-3 align-middle">
                                            <?php if($att->status_presensi === 'hadir'): ?>
                                                <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary','class' => 'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border w-fit whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary','class' => 'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border w-fit whitespace-nowrap']); ?>
                                                    Hadir
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
                                            <?php elseif($att->status_presensi === 'tidak_hadir'): ?>
                                                <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'danger','class' => 'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border w-fit whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'danger','class' => 'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border w-fit whitespace-nowrap']); ?>
                                                    Tidak Hadir
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
                                            <?php else: ?>
                                                <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'warning','class' => 'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border w-fit whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'warning','class' => 'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border w-fit whitespace-nowrap']); ?>
                                                    Libur
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
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php if($att->notes_presensi): ?>
                                                <p class="text-sm text-gray-600 italic">"<?php echo e($att->notes_presensi); ?>"</p>
                                            <?php else: ?>
                                                <span class="text-sm text-gray-600">-</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>

            <!-- CATATAN TAB -->
            <div x-show="activeTab === 'catatan'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" style="display: none;">
                <?php if($notes->isEmpty()): ?>
                    <?php if (isset($component)) { $__componentOriginala248761445578b3580e6fcec2c0db260 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala248761445578b3580e6fcec2c0db260 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.keadaan-kosong','data' => ['title' => 'Belum Ada Data Catatan Perkembangan','message' => 'Murid ini belum pernah diinput perkembangannya di kelas manapun.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.keadaan-kosong'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Belum Ada Data Catatan Perkembangan','message' => 'Murid ini belum pernah diinput perkembangannya di kelas manapun.']); ?>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
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
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse min-w-[650px]">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200">
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal & Materi</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Kelas & Paket</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Skor Pemahaman</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Fokus & Catatan Perkembangan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <td class="px-6 py-4 align-top w-1/4">
                                            <p class="text-sm font-semibold text-gray-900 whitespace-nowrap"><?php echo e(\Carbon\Carbon::parse($note->tanggal_catatan)->translatedFormat('l, d F Y')); ?></p>
                                            <p class="text-sm font-semibold text-primary-700 mt-1"><?php echo e($note->materi); ?></p>
                                        </td>
                                        <td class="px-6 py-4 align-top">
                                            <p class="text-sm font-semibold text-gray-900"><?php echo e($note->schedule?->nama_kelas ?? 'Tanpa Kelas'); ?></p>
                                            <p class="text-xs text-gray-500 mt-1"><?php echo e($note->schedule?->package?->nama_program ?? 'Paket'); ?></p>
                                        </td>
                                        <td class="px-6 py-4 align-top w-1/6">
                                            <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary','class' => 'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary','class' => 'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border whitespace-nowrap']); ?>
                                                Paham: <?php echo e($note->skor_pemahaman ?? 0); ?>%
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
                                        </td>
                                        <td class="px-6 py-4 align-top">
                                            <div class="mb-2">
                                                <span class="text-sm font-semibold text-gray-900">Status Fokus:</span>
                                                <span class="text-sm font-bold text-gray-900 ml-1"><?php echo e(ucwords(str_replace('_', ' ', $note->status_fokus))); ?></span>
                                            </div>
                                            <div class="bg-gray-50 p-3 rounded-xl border border-gray-100 text-sm text-gray-700 leading-relaxed whitespace-pre-line"><?php echo e($note->catatan_perkembangan); ?></div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>

            <!-- NILAI TAB -->
            <div x-show="activeTab === 'nilai'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" style="display: none;">
                <?php if($scores->isEmpty()): ?>
                    <?php if (isset($component)) { $__componentOriginala248761445578b3580e6fcec2c0db260 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala248761445578b3580e6fcec2c0db260 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.keadaan-kosong','data' => ['title' => 'Belum Ada Data Nilai','message' => 'Murid ini belum pernah diinput nilainya di kelas manapun.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.keadaan-kosong'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Belum Ada Data Nilai','message' => 'Murid ini belum pernah diinput nilainya di kelas manapun.']); ?>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2-2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
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
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse min-w-[650px]">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200">
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal & Tipe Penilaian</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Kelas & Paket</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Materi / Topik</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Skor Penilaian</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <?php $__currentLoopData = $scores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $score): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <td class="px-6 py-4 align-top">
                                            <p class="text-sm font-semibold text-gray-900 whitespace-nowrap"><?php echo e(\Carbon\Carbon::parse($score->tanggal_penilaian)->translatedFormat('l, d F Y')); ?></p>
                                            <p class="text-sm font-semibold text-primary-700 mt-1"><?php echo e($score->tipe_nilai); ?></p>
                                        </td>
                                        <td class="px-6 py-4 align-top">
                                            <p class="text-sm font-semibold text-gray-900"><?php echo e($score->schedule?->nama_kelas ?? 'Tanpa Kelas'); ?></p>
                                            <p class="text-xs text-gray-500 mt-1"><?php echo e($score->schedule?->package?->nama_program ?? 'Paket'); ?></p>
                                        </td>
                                        <td class="px-6 py-4 align-top">
                                            <p class="text-sm font-semibold text-gray-900"><?php echo e($score->materi_nilai); ?></p>
                                        </td>
                                        <td class="px-4 py-3 align-middle text-center">
                                            <div class="inline-flex items-center justify-center w-10 h-10 rounded-full shrink-0 <?php echo e($score->score >= 80 ? 'bg-primary-50 text-primary-600' : ($score->score >= 60 ? 'bg-yellow-50 text-yellow-600' : 'bg-red-50 text-red-600')); ?>">
                                                <span class="text-base font-black leading-none"><?php echo e($score->score); ?></span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 align-top">
                                            <?php if($score->notes): ?>
                                                <p class="text-sm text-gray-600 italic">"<?php echo e($score->notes); ?>"</p>
                                            <?php else: ?>
                                                <span class="text-sm text-gray-600">-</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>



        </div> <!-- End Tab Contents -->
    </div> <!-- End Flex Col (Tabs + Content) -->
</div> <!-- End Main Container -->

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // SweetAlert2 untuk Konfirmasi Hapus
    const deleteForm = document.getElementById('deleteForm');
    if(deleteForm) {
        deleteForm.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Hapus Data Murid?',
                text: "Seluruh data profil, histori kelas, dan catatan perkembangan murid ini akan terhapus secara permanen dan tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                width: '24rem',
                padding: '1.5rem',
                buttonsStyling: false,
                customClass: {
                    popup: '!rounded-2xl !shadow-2xl !border !border-gray-100',
                    title: '!text-xl !font-extrabold font-heading !text-gray-900 !pt-2',
                    htmlContainer: '!text-sm !text-gray-500 !mt-2',
                    icon: '!scale-75 !mt-0 !mb-2 !border-amber-400 !text-amber-500',
                    actions: '!mt-6 !w-full !flex !justify-center !gap-3',
                    confirmButton: '!bg-red-500 hover:!bg-red-600 !text-white !rounded-xl !text-sm !font-bold !px-8 !py-2.5 !transition-all !duration-100 !shadow-sm hover:!shadow-md transform hover:!-translate-y-0.5',
                    cancelButton: '!bg-gray-100 hover:!bg-gray-200 !text-gray-700 !rounded-xl !text-sm !font-bold !px-8 !py-2.5 !transition-all !duration-100'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteForm.submit();
                }
            });
        });
    }
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ruang-les\resources\views/admin/murid/detail.blade.php ENDPATH**/ ?>