<?php $__env->startSection('title', 'Detail Transaksi'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="<?php echo e(route('admin.transactions.index')); ?>" class="hover:text-primary-600 transition-colors">Pembayaran</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Detail Transaksi</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6 w-full">
    <?php if (isset($component)) { $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.tajuk-halaman','data' => ['title' => 'Detail Transaksi: '.e($transaction->student->nama_murid ?? 'N/A').'','backUrl' => ''.e(route('admin.transactions.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.tajuk-halaman'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Detail Transaksi: '.e($transaction->student->nama_murid ?? 'N/A').'','backUrl' => ''.e(route('admin.transactions.index')).'']); ?>
         <?php $__env->slot('rightActions', null, []); ?> 
            <?php if($transaction->status_transaksi === 'pending'): ?>
                <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'warning','size' => 'lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'warning','size' => 'lg']); ?>Status: Menunggu Verifikasi <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $attributes = $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $component = $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
            <?php elseif($transaction->status_transaksi === 'verified'): ?>
                <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary','size' => 'lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary','size' => 'lg']); ?>Status: Lunas (Verified) <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $attributes = $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $component = $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
            <?php elseif($transaction->status_transaksi === 'rejected'): ?>
                <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'danger','size' => 'lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'danger','size' => 'lg']); ?>Status: Ditolak <?php echo $__env->renderComponent(); ?>
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

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <!-- Kolom Kiri -->
        <div class="lg:col-span-2 space-y-4">
            <!-- Data Anak -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden p-5">
                <h3 class="text-lg font-bold text-primary-800 border-b border-gray-100 pb-3 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Data Identitas & Akademik Anak
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8 text-sm">
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Nama Lengkap</span><span class="font-semibold text-gray-900"><?php echo e($transaction->student->nama_murid ?? '-'); ?></span></div>
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Nama Panggilan</span><span class="font-semibold text-gray-900"><?php echo e($transaction->student->panggilan_murid ?? '-'); ?></span></div>
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Tempat, Tanggal Lahir</span><span class="font-semibold text-gray-900"><?php echo e($transaction->student->tempat_lahir_murid ?? '-'); ?>, <?php echo e($transaction->student->tanggal_lahir_murid ? \Carbon\Carbon::parse($transaction->student->tanggal_lahir_murid)->format('d F Y') : '-'); ?></span></div>
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Jenis Kelamin & Agama</span><span class="font-semibold text-gray-900"><?php echo e($transaction->student->jenis_kelamin_murid === 'L' ? 'Laki-laki' : ($transaction->student->jenis_kelamin_murid === 'P' ? 'Perempuan' : ucfirst($transaction->student->jenis_kelamin_murid ?? '-'))); ?> & <?php echo e(ucfirst($transaction->student->agama ?? '-')); ?></span></div>
                    <div class="md:col-span-2 pt-2 border-t border-gray-50"></div>
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Asal Sekolah</span><span class="font-semibold text-gray-900"><?php echo e($transaction->student->sekolah ?? '-'); ?></span></div>
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Kelas</span><span class="font-semibold text-gray-900"><?php echo e($transaction->student->kelas ?? '-'); ?> SD</span></div>
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Nilai Rata-rata</span><span class="font-semibold text-gray-900"><?php echo e($transaction->student->nilai_rata_rata ?? '-'); ?></span></div>
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Karakteristik</span><span class="font-semibold text-gray-900"><?php echo e($transaction->student->karakteristik_anak ?? '-'); ?></span></div>
                </div>
            </div>

            <!-- Data Wali -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden p-5">
                <h3 class="text-lg font-bold text-primary-800 border-b border-gray-100 pb-3 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Data Orang Tua / Wali
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8 text-sm">
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Nama Ortu/Wali</span><span class="font-semibold text-gray-900"><?php echo e($transaction->user->name ?? '-'); ?></span></div>
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Hubungan</span><span class="font-semibold text-gray-900">Orang Tua / Wali</span></div>
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Nomor Telepon/WhatsApp</span><span class="font-semibold text-gray-900"><?php echo e($transaction->user->no_telepon_mentor ?? '-'); ?></span></div>
                    <div><span class="block text-sm text-gray-600 font-semibold mb-1">Alamat Email</span><span class="font-semibold text-gray-900"><?php echo e($transaction->user->email ?? '-'); ?></span></div>
                    <div class="md:col-span-2"><span class="block text-sm text-gray-600 font-semibold mb-1">Alamat Lengkap</span><span class="font-semibold text-gray-900"><?php echo e($transaction->user->alamat_domisili ?? '-'); ?></span></div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan -->
        <div class="space-y-4">
            <!-- Pilihan Paket -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden p-5">
                <h3 class="text-lg font-bold text-primary-800 border-b border-gray-100 pb-3 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    Pilihan Paket
                </h3>
                <div class="space-y-4 text-sm">
                    <div class="bg-primary-50 p-4 rounded-xl border border-primary-100">
                        <span class="block text-sm text-gray-600 font-semibold mb-1">Kode Transaksi (Invoice):</span>
                        <span class="font-bold text-lg text-gray-900 block mb-3"><?php echo e($transaction->no_invoice ?? '-'); ?></span>

                        <span class="block text-sm text-gray-600 font-semibold mb-1">Program Belajar:</span>
                        <span class="font-bold text-xl text-primary-700"><?php echo e($transaction->package->nama_program ?? 'Pembayaran Manual'); ?></span>
                        <span class="block text-sm text-gray-600 font-semibold mt-3">Total Tagihan: <span class="font-bold text-gray-900 text-lg">Rp <?php echo e(number_format($transaction->total_pembayaran ?? 0, 0, ',', '.')); ?></span></span>
                    </div>
                </div>
            </div>

            <!-- Bukti Pembayaran -->
            <div x-data="{ showImageModal: false, modalImageUrl: '' }" class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden p-5">
                <h3 class="text-lg font-bold text-primary-800 border-b border-gray-100 pb-3 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    Bukti Pembayaran
                </h3>
                <div class="mt-2 text-center">
                    <?php if($transaction->bukti_pembayaran): ?>
                        <?php
                            $fileExtension = pathinfo($transaction->bukti_pembayaran, PATHINFO_EXTENSION);
                            $isImage = in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png']);
                        ?>

                        <?php if($isImage): ?>
                            <button type="button" @click.prevent="modalImageUrl = '<?php echo e(asset('storage/' . $transaction->bukti_pembayaran)); ?>'; showImageModal = true" class="inline-block w-full p-2 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500">
                                <img src="<?php echo e(asset('storage/' . $transaction->bukti_pembayaran)); ?>" alt="Bukti Transfer" class="max-h-64 object-contain mx-auto border border-gray-300 rounded-lg">
                                <span class="block text-sm text-primary-600 mt-2 font-medium">Klik gambar untuk memperbesar</span>
                            </button>
                        <?php else: ?>
                            <div class="p-4 rounded-xl border border-gray-200 bg-gray-50 flex flex-col items-center justify-center">
                                <svg class="w-10 h-10 text-red-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                <p class="text-sm font-medium text-gray-900 mb-2">Dokumen PDF/File</p>
                                <button type="button" @click.prevent="modalImageUrl = '<?php echo e(asset('storage/' . $transaction->bukti_pembayaran)); ?>'; showImageModal = true" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 text-sm font-medium shadow-sm transition-colors">Lihat Bukti</button>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="p-6 bg-gray-50 rounded-xl text-gray-500 border border-dashed border-gray-300">Tidak ada bukti pembayaran yang diunggah.</div>
                    <?php endif; ?>
                    <?php if($transaction->status_transaksi !== 'pending' && $transaction->diverifikasi_pada): ?>
                        <span class="block text-xs text-gray-500 mt-2">Diverifikasi pada: <?php echo e(\Carbon\Carbon::parse($transaction->diverifikasi_pada)->format('d M Y H:i')); ?></span>
                    <?php endif; ?>
                </div>

                <?php if($transaction->bukti_pembayaran): ?>
                <!-- Lightbox Modal -->
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
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Aksi -->
    <?php if($transaction->status_transaksi === 'pending'): ?>
    <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-sm border border-primary-100/50 p-6 flex flex-col md:flex-row md:items-center justify-between gap-4 sticky bottom-4 z-20">
        <div>
            <p class="font-bold text-gray-900">Keputusan Admin</p>
            <p class="text-sm text-gray-500">Pastikan bukti transfer sudah valid sebelum mengambil keputusan.</p>
            <p class="text-xs text-primary-600 font-medium mt-1">Menyetujui transaksi ini akan menambah kuota belajar anak.</p>
        </div>

        <div class="flex space-x-3 w-full md:w-auto">
            <form action="<?php echo e(route('admin.transactions.reject', $transaction->id)); ?>" method="POST" class="flex-1 md:flex-none" onsubmit="return confirm('Tolak transaksi ini? Pastikan Anda sudah menginformasikannya kepada orang tua murid.');">
                <?php echo csrf_field(); ?>
                <button type="submit" class="w-full px-6 py-3 bg-white border border-red-200 text-red-600 font-bold rounded-xl hover:bg-red-50 focus:ring-4 focus:ring-red-100 transition-all text-center">
                    Tolak Transaksi
                </button>
            </form>

            <form action="<?php echo e(route('admin.transactions.verify', $transaction->id)); ?>" method="POST" class="flex-1 md:flex-none">
                <?php echo csrf_field(); ?>
                <button type="submit" class="w-full px-8 py-3 bg-primary-600 text-white font-bold rounded-xl hover:bg-primary-700 shadow-md shadow-primary-500/30 hover:shadow-lg focus:ring-4 focus:ring-primary-200 transition-all text-center">
                    Setujui Transaksi Ini
                </button>
            </form>
        </div>
    </div>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ruang-les\resources\views/admin/transaksi/detail.blade.php ENDPATH**/ ?>