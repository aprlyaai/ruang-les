<?php $__env->startSection('title', 'Keuangan'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="<?php echo e(route('admin.transactions.index')); ?>" class="text-gray-500 hover:text-gray-700">Pembayaran</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Kuota Murid</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight font-heading">Manajemen Keuangan & Transaksi Kuota</h1>
        <p class="text-gray-500 mt-2 text-base">Kelola arus kas masuk dan pantau tunggakan kuota belajar murid.</p>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden mb-8"
    x-data="{ showModal: false, selectedStudentId: null, selectedStudentName: '' }">

    <div class="bg-white/80 backdrop-blur-md rounded-t-2xl shadow-sm border border-primary-100/50 border-b-0 overflow-hidden">

        <nav class="flex flex-wrap overflow-x-auto" aria-label="Tabs">
            <a href="<?php echo e(route('admin.transactions.index')); ?>"
            class="<?php echo e(request()->routeIs('admin.transactions.index') ? 'border-primary-500 text-primary-700 bg-primary-50/50' : 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300'); ?> flex-1 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-center transition-all focus:outline-none block">
                Pembayaran
            </a>

            <a href="<?php echo e(route('admin.transactions.kuota')); ?>"
            class="<?php echo e(request()->routeIs('admin.transactions.kuota') ? 'border-primary-500 text-primary-700 bg-primary-50/50' : 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300'); ?> flex-1 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-center transition-all focus:outline-none block">
                Pemantauan Kuota Murid
            </a>
        </nav>

    </div>

    <!-- Summary Cards -->
    <div class="p-6 bg-white border-b border-gray-100">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="<?php echo e(route('admin.transactions.kuota', ['quota_status' => 'all'])); ?>" class="bg-primary-50/50 rounded-xl p-5 border border-primary-100 flex items-center justify-between hover:shadow-md hover:-translate-y-1 transition-all cursor-pointer group">
                <div>
                    <p class="text-sm font-semibold text-primary-700 uppercase tracking-wider group-hover:text-primary-800 transition-colors">Total Murid Aktif</p>
                    <p class="text-2xl font-bold text-primary-900 mt-1"><?php echo e($totalActive); ?></p>
                </div>
                <div class="p-3 bg-primary-100 text-primary-700 rounded-xl group-hover:bg-primary-200 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
            </a>

            <a href="<?php echo e(route('admin.transactions.kuota', ['quota_status' => 'kritis'])); ?>" class="bg-yellow-50/50 rounded-xl p-5 border border-yellow-100 flex items-center justify-between hover:shadow-md hover:-translate-y-1 transition-all cursor-pointer group">
                <div>
                    <p class="text-sm font-semibold text-yellow-600 uppercase tracking-wider group-hover:text-yellow-700 transition-colors">Sisa Kuota = 0 (Batas)</p>
                    <p class="text-2xl font-bold text-yellow-700 mt-1"><?php echo e($totalZeroQuota); ?></p>
                </div>
                <div class="p-3 bg-yellow-100 text-yellow-700 rounded-xl group-hover:bg-yellow-200 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
            </a>

            <a href="<?php echo e(route('admin.transactions.kuota', ['quota_status' => 'nunggak'])); ?>" class="bg-red-50 rounded-xl p-5 border border-red-100 flex items-center justify-between hover:shadow-md hover:-translate-y-1 transition-all cursor-pointer group">
                <div>
                    <p class="text-sm font-semibold text-red-600 uppercase tracking-wider group-hover:text-red-700 transition-colors">Kuota Menunggak (< 0)</p>
                    <p class="text-2xl font-bold text-red-700 mt-1"><?php echo e($totalNegativeQuota); ?></p>
                </div>
                <div class="p-3 bg-red-100 text-red-700 rounded-xl group-hover:bg-red-200 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </a>
        </div>
    </div>

<!-- Toolbar (Filter & Search) -->
    <div class="p-5 border-b border-gray-100 bg-white">
        <form action="<?php echo e(route('admin.transactions.kuota')); ?>" method="GET" class="w-full">
            <div class="flex flex-col md:flex-row items-end gap-4">
                <!-- Bagian Kiri: Search Input -->
                <div class="w-full md:w-1/3">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Murid</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Ketik nama murid..." class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-xl leading-5 bg-gray-50 placeholder-gray-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-primary-200 focus:border-primary-400 sm:text-sm transition-colors shadow-sm">
                    </div>
                </div>

                <!-- Bagian Tengah: Filter Dropdown -->
                <div class="w-full md:w-1/4">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Filter Kondisi</label>
                    <select name="quota_status" class="block w-full pl-3 pr-10 py-2 text-sm font-medium text-gray-700 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 bg-gray-50 hover:bg-white transition-colors shadow-sm appearance-none bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_0.75rem_center] bg-no-repeat cursor-pointer">
                        <option value="all" <?php echo e(request('quota_status') == 'all' ? 'selected' : ''); ?>>Semua Murid</option>
                        <option value="aman" <?php echo e(request('quota_status') == 'aman' ? 'selected' : ''); ?>>Aman (> 0)</option>
                        <option value="kritis" <?php echo e(request('quota_status') == 'kritis' ? 'selected' : ''); ?>>Batas Kritis (= 0)</option>
                        <option value="nunggak" <?php echo e(request('quota_status') == 'nunggak' ? 'selected' : ''); ?>>Menunggak (< 0)</option>
                    </select>
                </div>

                <!-- Spacer untuk mendorong tombol ke kanan -->
                <div class="hidden md:block flex-1"></div>

                <!-- Bagian Kanan: Buttons -->
                <div class="flex justify-end items-center gap-3 w-full md:w-auto mt-2 md:mt-0">
                    <a href="<?php echo e(route('admin.transactions.kuota')); ?>" class="inline-flex items-center justify-center px-4 py-2 text-sm font-bold text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-all shadow-sm whitespace-nowrap">
                        Reset Filter
                    </a>
                    <button type="submit" class="inline-flex items-center justify-center px-4 py-2 text-sm font-bold text-white bg-primary-600 border border-transparent rounded-xl hover:bg-primary-700 transition-all shadow-sm whitespace-nowrap">
                        Terapkan Filter
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-gray-50/50 border-b border-primary-100/50">
                    <th scope="col" class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Murid</th>
                    <th scope="col" class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Orang Tua / Wali</th>
                    <th scope="col" class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Sisa Kuota</th>
                    <th scope="col" class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Aksi (Teguran)</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $isZero = $student->kuota_belajar == 0;
                    $isNegative = $student->kuota_belajar < 0;
                ?>
                <tr class="hover:bg-gray-50/80 transition-colors">
                    <td class="px-6 py-4">
                        <p class="text-sm font-bold text-gray-900"><?php echo e($student->nama_murid); ?></p>
                        <p class="text-xs text-gray-500 mt-1">Panggilan: <?php echo e($student->panggilan_murid); ?></p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm font-bold text-gray-900"><?php echo e($student->user->name ?? 'N/A'); ?></p>
                        <p class="text-xs text-gray-500 mt-1"><?php echo e($student->user->email ?? '-'); ?></p>
                    </td>
                    <td class="px-4 py-3 align-middle text-center">
                        <!-- Ukuran lingkaran disesuaikan (w-8 h-8) agar lebih proporsional dengan tinggi baris -->
                        <?php if($isNegative): ?>
                            <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'danger','class' => 'inline-flex items-center justify-center w-8 h-8 rounded-full font-bold text-sm shadow-sm border']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'danger','class' => 'inline-flex items-center justify-center w-8 h-8 rounded-full font-bold text-sm shadow-sm border']); ?>
                                <?php echo e($student->kuota_belajar); ?>

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
                        <?php elseif($isZero): ?>
                            <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'warning','class' => 'inline-flex items-center justify-center w-8 h-8 rounded-full font-bold text-sm shadow-sm border']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'warning','class' => 'inline-flex items-center justify-center w-8 h-8 rounded-full font-bold text-sm shadow-sm border']); ?>
                                <?php echo e($student->kuota_belajar); ?>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary','class' => 'inline-flex items-center justify-center w-8 h-8 rounded-full font-bold text-sm shadow-sm border']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary','class' => 'inline-flex items-center justify-center w-8 h-8 rounded-full font-bold text-sm shadow-sm border']); ?>
                                <?php echo e($student->kuota_belajar); ?>

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
                    <td class="px-4 py-3 align-middle text-center">
                        <?php if($isNegative): ?>
                            <!-- Desain tombol disesuaikan dengan proporsi tabel (px-3 py-1.5 text-xs) -->
                            <button @click="showModal = true; selectedStudentId = <?php echo e($student->id); ?>; selectedStudentName = '<?php echo e($student->nama_murid); ?>'" class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-bold text-white transition-all duration-300 bg-red-600 rounded-lg hover:bg-red-700 shadow-sm hover:shadow-md hover:-translate-y-0.5 animate-pulse w-fit">
                                Kirim Teguran
                            </button>
                        <?php elseif($isZero): ?>
                            <!-- Label diubah menggunakan style badge agar konsisten dengan Kode 1 -->
                            <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'warning']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'warning']); ?>Jatuh Tempo <?php echo $__env->renderComponent(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary']); ?>Aman <?php echo $__env->renderComponent(); ?>
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
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <!-- Empty state disamakan 100% desainnya dengan Kode 1 -->
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4 text-gray-400">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <p class="text-gray-500">Tidak ada data yang cocok saat ini.</p>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-100">
        <?php echo e($students->appends(request()->query())->links()); ?>

    </div>

    <!-- Teguran Modal -->
    <template x-teleport="body">
        <div x-show="showModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <!-- Backdrop -->
            <div x-show="showModal"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity"
                 @click="showModal = false"></div>

            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div x-show="showModal"
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full relative z-10">

                    <form action="<?php echo e(route('admin.transactions.remind')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="murid_id" x-model="selectedStudentId">

                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <h3 class="text-xl leading-6 font-bold text-gray-900 flex items-center">
                                <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'danger','class' => 'w-10 h-10 rounded-full flex items-center justify-center mr-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'danger','class' => 'w-10 h-10 rounded-full flex items-center justify-center mr-3']); ?>
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
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
                                Kirim Teguran Tunggakan
                            </h3>
                            <p class="text-sm text-gray-500 mb-6 ml-13">Anda akan mengirimkan pengingat teguran kuota kepada orang tua/wali murid dari murid: <strong class="text-gray-900" x-text="selectedStudentName"></strong>.</p>

                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100 mb-4 ml-13">
                                <label class="flex items-center space-x-3 cursor-pointer">
                                    <input type="radio" name="send_email" value="0" checked class="w-5 h-5 text-primary-600 border-gray-300 focus:ring-primary-500">
                                    <span class="flex flex-col">
                                        <span class="text-sm font-bold text-gray-900">Hanya Notifikasi Sistem</span>
                                        <span class="text-xs text-gray-500 mt-0.5">Muncul di ikon lonceng dasbor orang tua.</span>
                                    </span>
                                </label>
                            </div>

                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100 ml-13">
                                <label class="flex items-center space-x-3 cursor-pointer">
                                    <input type="radio" name="send_email" value="1" class="w-5 h-5 text-primary-600 border-gray-300 focus:ring-primary-500">
                                    <span class="flex flex-col">
                                        <span class="text-sm font-bold text-gray-900">Sistem + Kirim Email Resmi</span>
                                        <span class="text-xs text-gray-500 mt-0.5">Sistem akan mengirimkan email ke alamat orang tua.</span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 flex flex-col-reverse sm:flex-row sm:justify-end gap-3 border-t border-gray-100">
                            <button type="button" @click="showModal = false" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-xl hover:bg-gray-100 focus:outline-none">
                                Batal
                            </button>
                            <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-white transition-all duration-100 bg-red-600 border border-transparent rounded-xl hover:bg-red-700 shadow-sm focus:outline-none">
                                Kirim Teguran Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </template>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ruang-les\resources\views/admin/transaksi/kuota.blade.php ENDPATH**/ ?>