<?php $__env->startSection('title', 'Verifikasi Pendaftaran'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Verifikasi Pendaftaran</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">

    <?php if (isset($component)) { $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.tajuk-halaman','data' => ['title' => 'Antrean Verifikasi Pendaftaran','description' => 'Kelola dan periksa data calon murid yang baru mendaftar.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.tajuk-halaman'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Antrean Verifikasi Pendaftaran','description' => 'Kelola dan periksa data calon murid yang baru mendaftar.']); ?>
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

    <!-- Table Section -->
    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-primary-100/50">
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal Daftar</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Calon Murid & Orang Tua</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Program yang Dipilih</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php $__empty_1 = true; $__currentLoopData = $registrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3 align-middle">
                                <div class="text-sm font-semibold text-gray-900"><?php echo e($p->created_at->format('d M Y')); ?></div>
                                <div class="text-xs text-gray-500 mt-1"><?php echo e($p->created_at->format('H:i')); ?> WIB</div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="text-sm font-bold text-gray-900"><?php echo e($p->nama_murid); ?></div>
                                <div class="text-xs text-gray-500 mt-1">Orang Tua: <?php echo e($p->nama_orangtua); ?></div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="text-sm font-semibold text-gray-900"><?php echo e($p->package->nama_program ?? '-'); ?></div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <?php if($p->status_pendaftaran === 'pending'): ?>
                                    <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'warning']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'warning']); ?>Menunggu <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $attributes = $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $component = $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
                                <?php elseif($p->status_pendaftaran === 'approved'): ?>
                                    <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary']); ?>Diterima <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $attributes = $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $component = $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
                                <?php elseif($p->status_pendaftaran === 'rejected'): ?>
                                    <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'danger']); ?>Ditolak <?php echo $__env->renderComponent(); ?>
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
                            <td class="px-4 py-3 align-middle text-center">
                                <a href="<?php echo e(route('admin.regist-verifications.show', $p->id)); ?>" class="inline-flex items-center justify-center px-3 py-1.5 min-h-[25px] min-w-[25px] text-xs font-bold text-gray-600 bg-white border border-gray-200 transition-all duration-100 rounded-lg hover:bg-primary-50 hover:text-primary-600 hover:border-primary-200 shadow-sm">
                                    Lihat Detail
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="px-0 py-0 text-center">
                                <?php if (isset($component)) { $__componentOriginala248761445578b3580e6fcec2c0db260 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala248761445578b3580e6fcec2c0db260 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.keadaan-kosong','data' => ['icon' => 'users','title' => 'Antrean Kosong','message' => 'Belum ada antrean pendaftaran baru saat ini.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.keadaan-kosong'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'users','title' => 'Antrean Kosong','message' => 'Belum ada antrean pendaftaran baru saat ini.']); ?>
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
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($registrations->hasPages()): ?>
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
            <?php echo e($registrations->links()); ?>

        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ruang-les\resources\views/admin/verifikasi-pendaftaran/daftar.blade.php ENDPATH**/ ?>