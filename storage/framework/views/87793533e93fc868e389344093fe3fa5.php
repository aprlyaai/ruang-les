<?php $__env->startSection('title', 'Keuangan'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Pembayaran</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-6">
    <?php if (isset($component)) { $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.tajuk-halaman','data' => ['title' => 'Manajemen Keuangan & Transaksi Kuota','description' => 'Kelola arus kas masuk dan pantau tunggakan kuota belajar murid.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.tajuk-halaman'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Manajemen Keuangan & Transaksi Kuota','description' => 'Kelola arus kas masuk dan pantau tunggakan kuota belajar murid.']); ?>
         <?php $__env->slot('rightActions', null, []); ?> 
            <button @click="$dispatch('open-modal', 'addManualPayment')" class="inline-flex items-center justify-center px-4 py-2 text-sm font-bold text-white transition-all duration-100 bg-primary-600 rounded-xl hover:bg-primary-700 shadow-sm hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Tambah Pembayaran Manual
            </button>
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

<div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden">
    <!-- Tabs Navigation (Inside Card) -->
    <div class="bg-white/80 backdrop-blur-md rounded-t-2xl shadow-sm border border-primary-100/50 border-b-0 overflow-hidden">
        <nav class="flex flex-wrap overflow-x-auto" aria-label="Tabs">

            <!-- Tab Pembayaran -->
            <a href="<?php echo e(route('admin.transactions.index')); ?>"
            class="flex-1 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-center transition-all focus:outline-none
                    <?php echo e(request()->routeIs('admin.transactions.index') ? 'border-primary-500 text-primary-700 bg-primary-50/50' : 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300'); ?>"
            <?php if(request()->routeIs('admin.transactions.index')): ?> aria-current="page" <?php endif; ?>>
                Pembayaran
            </a>

            <!-- Tab Pemantauan Kuota Alarm -->
            <a href="<?php echo e(route('admin.transactions.kuota')); ?>"
            class="flex-1 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-center transition-all focus:outline-none
                    <?php echo e(request()->routeIs('admin.transactions.kuota') ? 'border-primary-500 text-primary-700 bg-primary-50/50' : 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300'); ?>">
                Pemantauan Kuota Murid
            </a>

        </nav>
    </div>

    <!-- Toolbar (Filter & Search) -->
    <div class="p-5 border-b border-gray-100 bg-white">
        <form action="<?php echo e(route('admin.transactions.index')); ?>" method="GET" class="w-full">
            <div class="flex flex-col md:flex-row items-end gap-4">
                <!-- Bagian Kiri: Search Input -->
                <div class="w-full md:w-1/3">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input name="search" type="text" value="<?php echo e(request('search')); ?>" placeholder="Ketik nama, atau kode transaksi..." class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-xl leading-5 bg-gray-50 placeholder-gray-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-primary-200 focus:border-primary-400 sm:text-sm transition-colors shadow-sm">
                    </div>
                </div>

                <!-- Bagian Kanan: Filter Dropdown -->
                <div class="w-full md:w-1/4">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Filter Status</label>
                    <select name="status" class="block w-full pl-3 pr-10 py-2 text-sm font-medium text-gray-700 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 bg-gray-50 hover:bg-white transition-colors shadow-sm appearance-none bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_0.75rem_center] bg-no-repeat cursor-pointer">
                        <option value="all" <?php echo e(request('status') == 'all' ? 'selected' : ''); ?>>Semua Transaksi</option>
                        <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>>Menunggu Verifikasi</option>
                        <option value="verified" <?php echo e(request('status') == 'verified' ? 'selected' : ''); ?>>Lunas (Verified)</option>
                        <option value="rejected" <?php echo e(request('status') == 'rejected' ? 'selected' : ''); ?>>Ditolak</option>
                    </select>
                </div>

                <!-- Spacer untuk mendorong tombol ke kanan (opsional, tapi bagus untuk layout) -->
                <div class="hidden md:block flex-1"></div>

                <!-- Tombol Aksi Filter -->
                <div class="flex justify-end items-center gap-3 w-full md:w-auto mt-2 md:mt-0">
                    <a href="<?php echo e(route('admin.transactions.index')); ?>" class="inline-flex items-center justify-center px-4 py-2 text-sm font-bold text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-all shadow-sm whitespace-nowrap">
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
                    <th scope="col" class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Murid & Orang Tua</th>
                    <th scope="col" class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Paket & Nominal</th>
                    <th scope="col" class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Kontak</th>
                    <th scope="col" class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Status & Waktu</th>
                    <th scope="col" class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $daftar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4">
                        <p class="text-sm font-bold text-gray-900"><?php echo e($daftar->student->nama_murid ?? 'N/A'); ?></p>
                        <p class="text-xs text-gray-500 mt-1">Orang Tua/Wali : <?php echo e($daftar->user->name ?? 'N/A'); ?></p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm text-gray-900">
                            <?php echo e($daftar->package->nama_program ?? 'Pembayaran Manual'); ?>

                        </p>
                        <p class="text-sm font-bold text-gray-900 mt-1">
                            Rp <?php echo e(number_format($daftar->total_pembayaran, 0, ',', '.')); ?>

                        </p>
                    </td>
                    <td class="px-4 py-3 align-middle">
                        <!-- Baris 1: Email (Ikon Surat) -->
                        <div class="text-sm text-gray-900 flex items-center">
                            <svg class="w-4 h-4 text-primary-600 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <?php echo e($daftar->user->email ?? 'N/A'); ?>

                        </div>

                        <!-- Baris 2: Nomor Telepon (Ikon Telepon) -->
                        <div class="text-xs text-gray-500 flex items-center mt-1">
                            <svg class="w-4 h-4 text-primary-600 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <?php echo e($daftar->user->no_telepon_mentor ?? '-'); ?>

                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="mb-1">
                            <?php if($daftar->status_transaksi === 'verified'): ?>
                                <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary']); ?>Lunas (Verified) <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $attributes = $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $component = $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
                            <?php elseif($daftar->status_transaksi === 'rejected'): ?>
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
                            <?php else: ?>
                                <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'warning']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'warning']); ?>Menunggu Verifikasi <?php echo $__env->renderComponent(); ?>
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
                        <p class="text-xs text-gray-500 mt-1"><?php echo e($daftar->created_at->format('d M Y, H:i')); ?> WIB</p>
                    </td>
                    <td class="px-4 py-3 align-middle text-center">
                        <a href="<?php echo e(route('admin.transactions.show', $daftar->id)); ?>" class="inline-flex items-center justify-center px-3 py-1.5 min-h-[25px] min-w-[25px] text-xs font-bold text-gray-600 bg-white border border-gray-200 transition-all duration-100 rounded-lg hover:bg-primary-50 hover:text-primary-600 hover:border-primary-200 shadow-sm">
                            Lihat Detail
                        </a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4 text-gray-400">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <p class="text-gray-500">Tidak ada data transaksi saat ini.</p>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-100">
        <?php echo e($transactions->appends(request()->query())->links()); ?>

    </div>
</div>
<!-- Add Manual Payment Modal -->
<template x-teleport="body">
<div x-data="{ open: false, total_pembayaran: 0, program_id: '' }"
     @open-modal.window="if ($event.detail === 'addManualPayment') open = true"
     @keydown.escape.window="open = false"
     x-show="open"
     class="fixed inset-0 z-50 overflow-y-auto"
     style="display: none;">

    <!-- Backdrop -->
    <div x-show="open"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity"
         @click="open = false"></div>

    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <!-- Modal Panel -->
        <div x-show="open"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">

            <form action="<?php echo e(route('admin.transactions.manual')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-primary-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                            <h3 class="text-xl leading-6 font-bold text-gray-900" id="modal-title">Tambah Pembayaran Manual</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500 mb-5">Gunakan form ini jika orang tua membayar tagihan secara tunai di tempat. Kuota anak akan otomatis bertambah saat pembayaran disimpan.</p>

                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-600 mb-2">Pilih Murid</label>
                                        <select name="murid_id" required class="block w-full appearance-none rounded-2xl p-3 pr-10 border border-gray-200 shadow-sm focus:outline-none focus:border-primary-400 focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer">
                                            <option value="" disabled selected>Pilih Murid</option>
                                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($student->id); ?>"><?php echo e($student->nama_murid); ?> (Sisa Kuota: <?php echo e($student->kuota_belajar); ?>)</option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-semibold text-gray-600 mb-2">Pilih Paket</label>
                                        <select name="program_id" x-model="program_id" @change="
                                            const pkg = $event.target.options[$event.target.selectedIndex];
                                            total_pembayaran = pkg.getAttribute('data-price') || 0;
                                        " required class="block w-full appearance-none rounded-2xl p-3 pr-10 border border-gray-200 shadow-sm focus:outline-none focus:border-primary-400 focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer">
                                            <option value="" disabled selected data-price="0">Pilih Paket</option>
                                            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($package->id); ?>" data-price="<?php echo e($package->harga); ?>">
                                                    <?php echo e($package->nama_program); ?> (+<?php echo e($package->pertemuan); ?> Pertemuan)
                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-semibold text-gray-600 mb-2">Nominal Pembayaran (Rp)</label>
                                        <input type="number" name="total_pembayaran" x-model="total_pembayaran" required min="0" step="1000" class="block w-full rounded-2xl p-3 border border-gray-200 shadow-sm focus:outline-none focus:border-primary-400 focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 flex flex-col-reverse sm:flex-row sm:justify-end gap-3 border-t border-gray-100">
                    <button type="button" @click="open = false" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-xl hover:bg-gray-100 focus:outline-none">
                        Batal
                    </button>
                    <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-white transition-all duration-100 bg-primary-600 border border-transparent rounded-xl hover:bg-primary-700 shadow-sm focus:outline-none">
                        Simpan Pembayaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</template>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ruang-les\resources\views/admin/transaksi/daftar.blade.php ENDPATH**/ ?>