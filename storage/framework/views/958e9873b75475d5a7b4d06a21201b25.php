<?php $__env->startSection('title', 'Paket Program Belajar'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Program Belajar</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">

    <?php if (isset($component)) { $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.tajuk-halaman','data' => ['title' => 'Daftar Paket Program Belajar Ruang Les','description' => 'Rancang dan tawarkan berbagai pilihan program belajar terbaik untuk murid Ruang Les.','actionUrl' => ''.e(route('admin.packages.create')).'','actionLabel' => 'Tambah Paket']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.tajuk-halaman'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Daftar Paket Program Belajar Ruang Les','description' => 'Rancang dan tawarkan berbagai pilihan program belajar terbaik untuk murid Ruang Les.','actionUrl' => ''.e(route('admin.packages.create')).'','actionLabel' => 'Tambah Paket']); ?>
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
                        <th class="w-10 px-4 py-3 text-center"></th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Paket</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Spesifikasi</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Harga & Sesi</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Status Publikasi</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody id="sortable-table" class="divide-y divide-gray-100">
                    <?php $__empty_1 = true; $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="bg-white hover:bg-gray-50 transition-colors" data-id="<?php echo e($package->id); ?>">
                            <td class="px-4 py-3 align-middle text-center drag-handle cursor-grab active:cursor-grabbing select-none text-gray-400 hover:text-gray-600" style="touch-action: none;">
                                <svg class="w-5 h-5 mx-auto pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="text-sm font-bold text-gray-900"><?php echo e($package->nama_program); ?></div>
                            </td>
                             <td class="px-4 py-3 align-middle">
                                <div class="text-sm font-semibold text-gray-900"><?php echo e($package->kelas_program); ?></div>
                                <div class="text-xs text-gray-500 mt-1 flex flex-col gap-0.5">
                                    <span class="inline-flex items-center whitespace-nowrap" title="Kapasitas Murid">
                                        <svg class="w-3.5 h-3.5 mr-1 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                        <?php echo e($package->student_capacity_label); ?>

                                    </span>
                                    <?php if($package->lokasi_belajar): ?>
                                        <span class="inline-flex items-center whitespace-nowrap" title="Lokasi Belajar">
                                            <svg class="w-3.5 h-3.5 mr-1 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                            <?php echo e($package->lokasi_belajar); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="text-sm font-bold text-primary-700 whitespace-nowrap">Rp <?php echo e(number_format($package->harga, 0, ',', '.')); ?></div>
                                <div class="text-xs text-gray-500 mt-1 flex flex-col gap-1 sm:flex-row sm:items-center">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-gray-100 text-gray-600 whitespace-nowrap w-fit">
                                        <svg class="w-3 h-3 mr-1 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <?php echo e($package->pertemuan); ?> Sesi
                                    </span>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-gray-100 text-gray-600 whitespace-nowrap w-fit">
                                        <svg class="w-3 h-3 mr-1 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <?php echo e($package->durasi_belajar); ?> Menit
                                    </span>
                                </div>
                            </td>

                            <td class="px-4 py-3 align-middle">
                                <div class="space-y-3">
                                    <?php if (isset($component)) { $__componentOriginald1e5ba0f948572b366847254c1a63922 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald1e5ba0f948572b366847254c1a63922 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.sakelar-status','data' => ['route' => route('admin.packages.toggle-status', $package->id),'isActive' => $package->status_program,'field' => 'status_program']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.sakelar-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.packages.toggle-status', $package->id)),'is-active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($package->status_program),'field' => 'status_program']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald1e5ba0f948572b366847254c1a63922)): ?>
<?php $attributes = $__attributesOriginald1e5ba0f948572b366847254c1a63922; ?>
<?php unset($__attributesOriginald1e5ba0f948572b366847254c1a63922); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald1e5ba0f948572b366847254c1a63922)): ?>
<?php $component = $__componentOriginald1e5ba0f948572b366847254c1a63922; ?>
<?php unset($__componentOriginald1e5ba0f948572b366847254c1a63922); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginald1e5ba0f948572b366847254c1a63922 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald1e5ba0f948572b366847254c1a63922 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.sakelar-status','data' => ['route' => route('admin.packages.toggle-status', $package->id),'isActive' => $package->direkomendasikan,'field' => 'direkomendasikan','labelActive' => 'Rekomendasi','labelInactive' => 'Rekomendasi','bgActive' => 'bg-amber-400','textActive' => 'text-amber-600']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.sakelar-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.packages.toggle-status', $package->id)),'is-active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($package->direkomendasikan),'field' => 'direkomendasikan','label-active' => 'Rekomendasi','label-inactive' => 'Rekomendasi','bg-active' => 'bg-amber-400','text-active' => 'text-amber-600']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald1e5ba0f948572b366847254c1a63922)): ?>
<?php $attributes = $__attributesOriginald1e5ba0f948572b366847254c1a63922; ?>
<?php unset($__attributesOriginald1e5ba0f948572b366847254c1a63922); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald1e5ba0f948572b366847254c1a63922)): ?>
<?php $component = $__componentOriginald1e5ba0f948572b366847254c1a63922; ?>
<?php unset($__componentOriginald1e5ba0f948572b366847254c1a63922); ?>
<?php endif; ?>
                                </div>
                            </td>

                            <td class="px-4 py-3 align-middle">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="<?php echo e(route('admin.packages.edit', $package->id)); ?>" class="inline-flex items-center p-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-lg hover:bg-gray-100 hover:text-primary-600 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <?php if (isset($component)) { $__componentOriginalcf42a78d44931673e004c6a791c8bc65 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf42a78d44931673e004c6a791c8bc65 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.formulir-hapus','data' => ['route' => route('admin.packages.destroy', $package->id),'itemName' => $package->nama_program]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.formulir-hapus'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.packages.destroy', $package->id)),'item-name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($package->nama_program)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf42a78d44931673e004c6a791c8bc65)): ?>
<?php $attributes = $__attributesOriginalcf42a78d44931673e004c6a791c8bc65; ?>
<?php unset($__attributesOriginalcf42a78d44931673e004c6a791c8bc65); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf42a78d44931673e004c6a791c8bc65)): ?>
<?php $component = $__componentOriginalcf42a78d44931673e004c6a791c8bc65; ?>
<?php unset($__componentOriginalcf42a78d44931673e004c6a791c8bc65); ?>
<?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-12 align-middle">
                                <?php if (isset($component)) { $__componentOriginala248761445578b3580e6fcec2c0db260 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala248761445578b3580e6fcec2c0db260 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.keadaan-kosong','data' => ['title' => 'Belum Ada Paket Program Belajar','message' => 'Saat ini belum ada data paket program belajar di Ruang Les yang ditambahkan.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.keadaan-kosong'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Belum Ada Paket Program Belajar','message' => 'Saat ini belum ada data paket program belajar di Ruang Les yang ditambahkan.']); ?>
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
        <?php if($packages->hasPages()): ?>
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
            <?php echo e($packages->links()); ?>

        </div>
        <?php endif; ?>
    </div>

</div>

<?php $__env->startPush('scripts'); ?>
<script>
function initSortableProgram() {
    var el = document.getElementById('sortable-table');
    if (!el || typeof Sortable === 'undefined') return;
    if (el._sortable) return;

    el._sortable = Sortable.create(el, {
        handle: '.drag-handle',
        animation: 150,
        forceFallback: true,
        fallbackOnBody: true,
        fallbackTolerance: 3,
        ghostClass: 'opacity-40',
        chosenClass: 'bg-primary-50',
        onEnd: function(evt) {
            var items = el.querySelectorAll('tr[data-id]');
            var orders = [];
            items.forEach(function(item) {
                var id = item.getAttribute('data-id');
                if (id) orders.push(id);
            });

            fetch('<?php echo e(route('admin.packages.reorder')); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({ orders: orders })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success && typeof window.dispatchEvent === 'function') {
                    window.dispatchEvent(new CustomEvent('notify', {
                        detail: { type: 'success', title: 'Berhasil', text: 'Urutan paket berhasil diperbarui', duration: 3000 }
                    }));
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    });
}

initSortableProgram();
document.addEventListener('DOMContentLoaded', initSortableProgram);
window.addEventListener('load', initSortableProgram);

    // SweetAlert2 untuk Konfirmasi Hapus
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            let itemName = this.getAttribute('data-name') || 'ini';
            Swal.fire({
                title: 'Hapus Paket?',
                text: "Semua data pendaftaran terkait paket " + itemName + " ini akan ikut terhapus permanen dari sistem!",
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
                    form.submit();
                }
            });
        });
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ruang-les\resources\views/admin/program/daftar.blade.php ENDPATH**/ ?>