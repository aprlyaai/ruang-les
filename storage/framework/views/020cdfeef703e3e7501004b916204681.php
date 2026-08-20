<?php $__env->startSection('title', 'Tagihan & Pembayaran'); ?>

<?php $__env->startSection('content'); ?>
<div x-data="{ showImageModal: false, modalImageUrl: '' }">
<div class="mb-6">
    <?php if (isset($component)) { $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.tajuk-halaman','data' => ['title' => 'Tagihan & Pembayaran','description' => 'Lihat sisa kuota dan lakukan pembayaran tagihan belajar anak Anda.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.tajuk-halaman'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Tagihan & Pembayaran','description' => 'Lihat sisa kuota dan lakukan pembayaran tagihan belajar anak Anda.']); ?>
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

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Kolom Kiri: Sisa Kuota & Daftar Tagihan -->
    <div class="lg:col-span-2 space-y-6">

        <!-- Stat Card: Sisa Kuota -->
        <?php
            $quota = $student->kuota_belajar ?? 0;
            $isDebt = $quota < 0;
        ?>

        <div class="bg-white rounded-2xl shadow-sm border <?php echo e($isDebt ? 'border-red-200' : 'border-primary-100/50'); ?> overflow-hidden relative">
            <?php if($isDebt): ?>
                <div class="absolute top-0 right-0 p-4">
                    <span class="flex h-3 w-3 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                    </span>
                </div>
            <?php endif; ?>
            <div class="p-6">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 rounded-xl <?php echo e($isDebt ? 'bg-red-100 text-red-600' : 'bg-primary-100 text-primary-600'); ?> flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-1">Sisa Kuota Belajar</h3>
                        <div class="flex items-end space-x-2">
                            <span class="text-4xl font-extrabold font-heading <?php echo e($isDebt ? 'text-red-600' : 'text-gray-900'); ?>"><?php echo e($quota); ?></span>
                            <span class="text-sm font-medium text-gray-500 mb-1.5">Pertemuan</span>
                        </div>
                    </div>
                </div>

                <?php if($isDebt): ?>
                    <div class="mt-4 p-3 bg-red-50 border border-red-100 rounded-xl">
                        <div class="flex">
                            <svg class="h-5 w-5 text-red-400 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <p class="text-sm text-red-700">
                                Sisa kuota minus menandakan adanya tunggakan kelas. Silakan lakukan pembayaran tagihan di sebelah kanan untuk mengisi ulang kuota dan melanjutkan pembelajaran di Ruang Les.
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Daftar Tagihan -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900 uppercase tracking-wider">Tagihan Menunggu</h3>
            </div>

            <div class="p-6">
                <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="mb-4 last:mb-0 p-5 rounded-xl border <?php echo e($trx->status_transaksi == 'rejected' ? 'border-red-200 bg-red-50/30' : 'border-yellow-200 bg-yellow-50/30'); ?> flex flex-col sm:flex-row justify-between sm:items-center gap-4 transition-all hover:shadow-md">
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <?php if($trx->status_transaksi == 'rejected'): ?>
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
<?php $component->withAttributes(['color' => 'warning']); ?>Menunggu Pembayaran <?php echo $__env->renderComponent(); ?>
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
                                <span class="text-xs text-gray-500 font-medium"><?php echo e($trx->no_invoice); ?></span>
                            </div>
                            <h4 class="font-bold text-gray-900"><?php echo e($trx->package->nama_program ?? 'Paket Bimbel'); ?></h4>
                            <p class="text-sm text-gray-600">Siswa: <?php echo e($trx->student->nama_murid ?? '-'); ?></p>
                            <?php if($trx->status_transaksi == 'rejected'): ?>
                                <p class="text-xs text-red-500 mt-1 font-medium">Harap unggah ulang bukti pembayaran yang valid.</p>
                            <?php endif; ?>
                        </div>
                        <div class="text-left sm:text-right">
                            <p class="text-sm text-gray-500 mb-1">Total Tagihan</p>
                            <p class="text-xl font-bold text-gray-900">Rp <?php echo e(number_format($trx->package->harga ?? 0, 0, ',', '.')); ?></p>
                            <?php if($trx->bukti_pembayaran): ?>
                                <button type="button" @click.prevent="modalImageUrl = '<?php echo e(Storage::url($trx->bukti_pembayaran)); ?>'; showImageModal = true" class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-bold text-gray-600 bg-white border border-gray-200 transition-all duration-100 rounded-lg hover:bg-primary-50 hover:text-primary-600 hover:border-primary-200 shadow-sm focus:outline-none mt-2">
                                    <svg class="w-3.5 h-3.5 mr-1.5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    Lihat Bukti
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php if (isset($component)) { $__componentOriginala248761445578b3580e6fcec2c0db260 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala248761445578b3580e6fcec2c0db260 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.keadaan-kosong','data' => ['title' => 'Semua Lunas!','message' => 'Tidak ada tagihan yang tertunggak saat ini.','icon' => 'M5 13l4 4L19 7']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.keadaan-kosong'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Semua Lunas!','message' => 'Tidak ada tagihan yang tertunggak saat ini.','icon' => 'M5 13l4 4L19 7']); ?>
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
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Kolom Kanan: Form Upload Pembayaran -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden sticky top-24">
            <div class="p-6 border-b border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 uppercase tracking-wider">Konfirmasi Pembayaran</h3>
            </div>
            <div class="p-6 bg-gray-50/50">
                <label for="transaction_id" class="block text-sm font-semibold text-gray-600 mb-2">Rekening Tujuan Transfer:</label>
                <!-- Mock Bank Card (Adapted for Sidebar size) -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-5 text-white shadow-lg relative overflow-hidden group mb-6">
                    <!-- Card Accents -->
                    <div class="absolute -right-8 -top-8 w-24 h-24 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700 ease-in-out"></div>
                    <div class="absolute -left-6 -bottom-6 w-20 h-20 bg-primary-500/30 rounded-full blur-xl"></div>

                    <div class="relative z-10">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-lg font-black tracking-widest text-gray-100 italic uppercase"><?php echo e($settings['nama_bank'] ?? 'BCA'); ?></span>
                            <svg class="w-6 h-6 text-white/20" fill="currentColor" viewBox="0 0 24 24"><path d="M21.93 10.37A6.47 6.47 0 0019 6c-2.4-.6-4.5 1-4.5 1S12.4 5.4 10 6A6.47 6.47 0 007.07 10.37C6.1 13 8 18 8 18c0 0 2-1 4-1s4 1 4 1c0 0 1.9-5 1.07-7.63z"></path></svg>
                        </div>

                        <div class="mb-4">
                            <span class="block text-[9px] font-bold text-gray-400 uppercase tracking-wider mb-1.5">Nomor Rekening</span>
                            <div class="flex items-center gap-2">
                                <span id="rekening-number" class="font-mono text-xl tracking-[0.12em] font-medium text-white shadow-sm"><?php echo e($settings['nomor_akun_bank'] ?? '7340033447'); ?></span>
                                <button type="button" onclick="copyRekening()" class="p-1.5 rounded-lg bg-white/10 hover:bg-white/20 transition-all focus:ring-2 focus:ring-white/50 group/copy relative" title="Salin Nomor Rekening">
                                    <svg class="w-4 h-4 text-gray-300 group-hover/copy:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    <span id="copy-tooltip" class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-900 text-white text-[9px] font-bold px-2 py-1 rounded opacity-0 transition-opacity whitespace-nowrap pointer-events-none">Tersalin!</span>
                                </button>
                            </div>
                        </div>

                        <div>
                            <span class="block text-[9px] font-bold text-gray-400 uppercase tracking-wider mb-1">Atas Nama</span>
                            <span class="font-bold tracking-widest text-xs uppercase text-gray-100"><?php echo e($settings['nama_akun_bank'] ?? 'ISMATURROHMAH'); ?></span>
                        </div>
                    </div>
                </div>

                <form action="<?php echo e(route('ortu.pembayaran.upload')); ?>" method="POST" enctype="multipart/form-data" class="space-y-4" novalidate
                      x-data="{
                          error_transaction: <?php echo e($errors->has('transaction_id') ? 'true' : 'false'); ?>,
                          error_payment: <?php echo e($errors->has('bukti_pembayaran') ? 'true' : 'false'); ?>

                      }">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label for="transaction_id" class="block text-sm font-semibold text-gray-600 mb-2">Kode Tagihan <span class="text-red-500">*</span></label>
                        <select name="transaction_id" id="transaction_id" required <?php echo e($transactions->isEmpty() ? 'disabled' : ''); ?>

                            @change="error_transaction = false"
                            :class="error_transaction ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 focus:ring-primary-200'"
                            class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:outline-none focus:ring-2 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer">
                            <option value="" disabled selected>Pilih Tagihan</option>
                            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($trx->id); ?>"><?php echo e($trx->no_invoice); ?> - Rp <?php echo e(number_format($trx->package->harga ?? 0, 0, ',', '.')); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'transaction_id','xShowError' => 'error_transaction']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'transaction_id','x-show-error' => 'error_transaction']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4392c51ccef42726141b9bd03684153)): ?>
<?php $attributes = $__attributesOriginale4392c51ccef42726141b9bd03684153; ?>
<?php unset($__attributesOriginale4392c51ccef42726141b9bd03684153); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4392c51ccef42726141b9bd03684153)): ?>
<?php $component = $__componentOriginale4392c51ccef42726141b9bd03684153; ?>
<?php unset($__componentOriginale4392c51ccef42726141b9bd03684153); ?>
<?php endif; ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-2">Bukti Pembayaran <span class="text-red-500">*</span></label>

                        <?php if (isset($component)) { $__componentOriginale2a734bbb78080eae36bf302735fdac9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale2a734bbb78080eae36bf302735fdac9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.unggah-berkas','data' => ['name' => 'bukti_pembayaran','xShowError' => 'error_payment','accept' => 'image/jpeg,image/jpg,image/png,image/webp,application/pdf','disabled' => $transactions->isEmpty()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.unggah-berkas'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'bukti_pembayaran','x-show-error' => 'error_payment','accept' => 'image/jpeg,image/jpg,image/png,image/webp,application/pdf','disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($transactions->isEmpty())]); ?>
                            <span class="font-bold text-primary-700">Rasio Foto: 4:3</span><br>
                            Format: JPEG, JPG, PNG, WEBP, PDF.<br>
                            Maksimal berukuran 2MB.
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale2a734bbb78080eae36bf302735fdac9)): ?>
<?php $attributes = $__attributesOriginale2a734bbb78080eae36bf302735fdac9; ?>
<?php unset($__attributesOriginale2a734bbb78080eae36bf302735fdac9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale2a734bbb78080eae36bf302735fdac9)): ?>
<?php $component = $__componentOriginale2a734bbb78080eae36bf302735fdac9; ?>
<?php unset($__componentOriginale2a734bbb78080eae36bf302735fdac9); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'bukti_pembayaran','xShowError' => 'error_payment']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'bukti_pembayaran','x-show-error' => 'error_payment']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4392c51ccef42726141b9bd03684153)): ?>
<?php $attributes = $__attributesOriginale4392c51ccef42726141b9bd03684153; ?>
<?php unset($__attributesOriginale4392c51ccef42726141b9bd03684153); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4392c51ccef42726141b9bd03684153)): ?>
<?php $component = $__componentOriginale4392c51ccef42726141b9bd03684153; ?>
<?php unset($__componentOriginale4392c51ccef42726141b9bd03684153); ?>
<?php endif; ?>
                    </div>

                    <div class="pt-2">
                        <button type="submit" <?php echo e($transactions->isEmpty() ? 'disabled' : ''); ?>

                            class="w-full inline-flex items-center justify-center px-5 py-3 text-sm font-bold text-white transition-all duration-100 border border-transparent rounded-2xl shadow-sm focus:outline-none <?php echo e($transactions->isEmpty() ? 'bg-gray-300 cursor-not-allowed' : 'bg-primary-600 hover:bg-primary-700 hover:-translate-y-0.5'); ?>">
                            Kirim Bukti Pembayaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Image Viewer Lightbox -->
<?php if (isset($component)) { $__componentOriginala7cb9b49c5681afb2c2b0690931cdbe4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala7cb9b49c5681afb2c2b0690931cdbe4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.dialog-gambar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.dialog-gambar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala7cb9b49c5681afb2c2b0690931cdbe4)): ?>
<?php $attributes = $__attributesOriginala7cb9b49c5681afb2c2b0690931cdbe4; ?>
<?php unset($__attributesOriginala7cb9b49c5681afb2c2b0690931cdbe4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala7cb9b49c5681afb2c2b0690931cdbe4)): ?>
<?php $component = $__componentOriginala7cb9b49c5681afb2c2b0690931cdbe4; ?>
<?php unset($__componentOriginala7cb9b49c5681afb2c2b0690931cdbe4); ?>
<?php endif; ?>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
function copyRekening() {
    const rekening = '<?php echo e($settings['nomor_akun_bank'] ?? '7340033447'); ?>';
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(rekening).then(() => {
            showTooltip();
        }).catch(err => {
            fallbackCopy(rekening);
        });
    } else {
        fallbackCopy(rekening);
    }
}

function fallbackCopy(text) {
    const textArea = document.createElement("textarea");
    textArea.value = text;
    textArea.style.position = "fixed";
    textArea.style.left = "-9999px";
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    try {
        document.execCommand('copy');
        showTooltip();
    } catch (err) {
        console.error('Fallback copy failed: ', err);
        alert('Gagal menyalin nomor rekening. Silakan salin manual.');
    }
    document.body.removeChild(textArea);
}

function showTooltip() {
    const tooltip = document.getElementById('copy-tooltip');
    if (tooltip) {
        tooltip.classList.remove('opacity-0');
        tooltip.classList.add('opacity-100');
        setTimeout(() => {
            tooltip.classList.remove('opacity-100');
            tooltip.classList.add('opacity-0');
        }, 2000);
    }
}
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.orang-tua', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ruang-les\resources\views/orang-tua/keuangan/tagihan.blade.php ENDPATH**/ ?>