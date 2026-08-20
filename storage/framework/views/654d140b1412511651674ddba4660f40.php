<?php $__env->startSection('title', 'Detail Profil Wali Murid'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="<?php echo e(route('admin.parents.index')); ?>" class="text-gray-500 hover:text-primary-600 transition-colors font-medium">Data Wali Murid</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Profil Wali Murid</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-4 w-full">

    <!-- Action Bar -->
    <div class="mb-4">
        <?php if (isset($component)) { $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.tajuk-halaman','data' => ['title' => 'Detail Profil Wali Murid','backUrl' => ''.e(route('admin.parents.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.tajuk-halaman'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Detail Profil Wali Murid','backUrl' => ''.e(route('admin.parents.index')).'']); ?>
             <?php $__env->slot('rightActions', null, []); ?> 
                <a href="<?php echo e(route('admin.parents.edit', ['parent' => $parent->id, 'from' => 'detail'])); ?>" class="w-full sm:w-auto px-4 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-xl font-bold text-sm hover:bg-primary-50 hover:text-primary-700 hover:border-primary-300 transition-colors shadow-sm flex items-center justify-center">
                    <svg class="w-4 h-4 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Edit Data
                </a>
                <form action="<?php echo e(route('admin.parents.destroy', $parent->id)); ?>" method="POST" id="deleteForm" class="w-full sm:w-auto">
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
                <?php if($parent->avatar): ?>
                    <img src="<?php echo e(asset('storage/' . $parent->avatar)); ?>" alt="Avatar" class="w-16 h-16 md:w-20 md:h-20 rounded-full object-cover shadow-sm bg-gray-50 border border-gray-100">
                <?php else: ?>
                    <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-primary-50 border border-primary-100 flex items-center justify-center text-3xl font-extrabold text-primary-700 shadow-sm">
                        <?php echo e(substr($parent->name, 0, 1)); ?>

                    </div>
                <?php endif; ?>
            </div>

            <div class="flex-grow flex flex-col md:flex-row justify-between items-center md:items-center gap-4 w-full text-center md:text-left">
                <div class="flex flex-col justify-center">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900"><?php echo e($parent->name); ?></h2>
                    <p class="text-primary-600 font-semibold text-base mt-1">Status Hubungan: <?php echo e(optional($parent->parentProfile)->status_hubungan ?? 'Wali'); ?></p>
                </div>

                <div class="flex-shrink-0 mt-2 md:mt-0">
                    <div class="bg-gradient-to-br from-primary-600 to-primary-800 rounded-2xl border border-primary-500 p-3 px-5 text-center min-w-[120px] shadow-sm text-white">
                        <div class="text-[10px] md:text-xs font-bold text-primary-100 mb-1 uppercase tracking-wider">Total Anak</div>
                        <div class="text-xl md:text-2xl font-extrabold text-white"><?php echo e($parent->students->count()); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

        <!-- Kolom Kiri: Daftar Anak -->
        <div class="lg:col-span-2 space-y-4">

            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden">
                <div class="p-5 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="text-lg font-bold text-primary-800">Daftar Anak</h3>
                </div>
                <div class="p-0">
                    <?php if($parent->students->count() > 0): ?>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse text-sm">
                                <thead>
                                    <tr class="bg-gray-50/50 border-b border-primary-100/50">
                                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Anak</th>
                                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Sekolah & Kelas</th>
                                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Sisa Kuota</th>
                                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Status</th>
                                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <?php $__currentLoopData = $parent->students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="px-6 py-4 align-middle">
                                                <div class="flex items-center">
                                                    <?php if (isset($component)) { $__componentOriginala3b0902aa82c25e0a3af1fd64938810c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3b0902aa82c25e0a3af1fd64938810c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.avatar','data' => ['name' => $student->nama_murid,'size' => '8','textSize' => 'text-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.avatar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->nama_murid),'size' => '8','textSize' => 'text-xs']); ?>
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
                                                    <div class="ml-4">
                                                        <a href="<?php echo e(route('admin.students.show', $student->id)); ?>" class="font-bold text-gray-900 hover:text-primary-600 transition-colors"><?php echo e($student->nama_murid); ?></a>
                                                        <div class="text-xs text-gray-500 mt-1"><?php echo e($student->panggilan_murid); ?> &bull; <?php echo e($student->jenis_kelamin_murid); ?></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 align-middle">
                                                <div class="text-sm font-semibold text-gray-900"><?php echo e($student->sekolah); ?></div>
                                                <div class="text-xs text-gray-500 mt-1">Kelas <?php echo e($student->kelas); ?></div>
                                            </td>
                                             <td class="px-6 py-4 align-middle text-center font-bold">
                                                <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => $student->kuota_belajar <= 0 ? 'danger' : 'primary','class' => 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->kuota_belajar <= 0 ? 'danger' : 'primary'),'class' => 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border whitespace-nowrap']); ?>
                                                    <?php echo e($student->kuota_belajar ?? 0); ?> Sesi
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
                                            <td class="px-6 py-4 align-middle text-center">
                                                <?php if($student->status_murid === 'active'): ?>
                                                    <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary','class' => 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary','class' => 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit whitespace-nowrap']); ?>
                                                        <span class="w-1.5 h-1.5 rounded-full bg-primary-500 mr-1.5"></span> Aktif
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'gray','class' => 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'gray','class' => 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit whitespace-nowrap']); ?>
                                                        <span class="w-1.5 h-1.5 rounded-full bg-gray-400 mr-1.5"></span> Nonaktif
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
                                            <td class="px-6 py-4 align-middle text-center">
                                                <a href="<?php echo e(route('admin.students.show', $student->id)); ?>" class="inline-flex items-center justify-center p-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-lg hover:bg-gray-100 hover:text-primary-600 transition-colors" title="Lihat Profil Anak">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="p-12 text-center border-t border-dashed border-gray-100">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                <h3 class="text-lg font-bold text-gray-900 font-heading mb-1">Belum ada anak yang terdaftar</h3>
                                <p class="text-sm text-gray-500">Data anak akan muncul setelah ada pendaftaran yang disetujui.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>

        <!-- Kolom Kanan: Info Wali -->
        <div class="space-y-4">

            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5">
                <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-100 pb-3">Informasi Kontak & Alamat</h3>
                <div class="space-y-5">
                    <div>
                        <p class="block text-sm text-gray-600 font-semibold mb-1">Alamat Email</p>
                        <p class="font-semibold text-gray-900 text-sm">
                            <a href="mailto:<?php echo e($parent->email); ?>" class="hover:text-primary-600 transition-colors"><?php echo e($parent->email); ?></a>
                        </p>
                    </div>
                    <div class="pt-4 border-t border-gray-100">
                        <p class="block text-sm text-gray-600 font-semibold mb-1">Nomor Telepon / WhatsApp Aktif</p>
                        <p class="font-semibold text-gray-900 text-sm">
                            <?php
                                $wa_phone = preg_replace('/[^0-9]/', '', optional($parent->parentProfile)->no_telepon_orangtua ?? '');
                                if (str_starts_with($wa_phone, '0')) {
                                    $wa_phone = '62' . substr($wa_phone, 1);
                                }
                            ?>
                            <?php if($wa_phone): ?>
                            <a href="https://wa.me/<?php echo e($wa_phone); ?>" target="_blank" class="hover:text-primary-600 transition-colors"><?php echo e(optional($parent->parentProfile)->no_telepon_orangtua); ?></a>
                            <?php else: ?>
                            -
                            <?php endif; ?>
                        </p>
                    </div>
                    <div class="pt-4 border-t border-gray-100">
                        <p class="block text-sm text-gray-600 font-semibold mb-1">Alamat Lengkap</p>
                        <p class="font-semibold text-gray-900 text-sm leading-relaxed"><?php echo e(optional($parent->parentProfile)->alamat_domisili ?? '-'); ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // SweetAlert2 untuk Konfirmasi Hapus
    const deleteForm = document.getElementById('deleteForm');
    if(deleteForm) {
        deleteForm.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Hapus Data Wali Murid?',
                text: "Semua data profil dan akses login wali murid ini akan terhapus permanen! Harap pastikan tidak ada data anak yang masih terikat.",
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ruang-les\resources\views/admin/orang-tua/detail.blade.php ENDPATH**/ ?>