<?php $__env->startSection('title', 'Kelola Testimoni'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="<?php echo e(route('admin.settings.index')); ?>" class="hover:text-primary-600 transition-colors">Kelola Bimbel (CMS)</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Testimoni</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">

    <?php if (isset($component)) { $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.tajuk-halaman','data' => ['title' => 'Testimoni & Ulasan','description' => 'Pilih cerita dan pengalaman belajar terbaik dari murid dan orang tua agar halaman utamamu terlihat makin meyakinkan.','actionUrl' => ''.e(route('admin.testimonials.create')).'','actionLabel' => 'Tambah Testimoni']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.tajuk-halaman'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Testimoni & Ulasan','description' => 'Pilih cerita dan pengalaman belajar terbaik dari murid dan orang tua agar halaman utamamu terlihat makin meyakinkan.','actionUrl' => ''.e(route('admin.testimonials.create')).'','actionLabel' => 'Tambah Testimoni']); ?>
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
                        <th class="w-12 px-4 py-3 text-center"></th>
                        <th class="w-1/4 px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Pemberi Ulasan</th>
                        <th class="w-auto px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Isi Ulasan & Rating</th>
                        <th class="w-48 px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Status</th>
                        <th class="w-32 px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody id="sortable-table" class="divide-y divide-gray-100">
                    <?php $__empty_1 = true; $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50/50 transition-colors" data-id="<?php echo e($testimonial->id); ?>">
                            <td class="px-4 py-3 align-middle text-center drag-handle cursor-move text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                            </td>
                            <td class="px-4 py-4 align-middle">
                                <div class="text-sm font-bold text-gray-900"><?php echo e($testimonial->nama_pemberi); ?></div>
                                <div class="text-xs text-gray-500 mt-1"><?php echo e($testimonial->peran_pemberi); ?></div>
                            </td>
                            <td class="px-4 py-4 align-middle text-justify">
                                <div class="flex items-center text-yellow-400 mb-1">
                                    <?php for($i = 0; $i < $testimonial->rating; $i++): ?>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <?php endfor; ?>
                                </div>
                                <div class="text-xs text-gray-900 max-w-md line-clamp-2 italic">"<?php echo e($testimonial->testimoni); ?>"</div>
                            </td>
                            <td class="px-4 py-4 align-middle text-center">
                                <div class="flex justify-center translate-x-[44px]">
                                    <?php if (isset($component)) { $__componentOriginald1e5ba0f948572b366847254c1a63922 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald1e5ba0f948572b366847254c1a63922 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.sakelar-status','data' => ['route' => route('admin.testimonials.toggle-status', $testimonial->id),'isActive' => $testimonial->status_testimoni]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.sakelar-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.testimonials.toggle-status', $testimonial->id)),'is-active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($testimonial->status_testimoni)]); ?>
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
                            <td class="px-4 py-4 align-middle">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="<?php echo e(route('admin.testimonials.edit', $testimonial->id)); ?>" class="inline-flex items-center p-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-lg hover:bg-gray-100 hover:text-primary-600 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <?php if (isset($component)) { $__componentOriginalcf42a78d44931673e004c6a791c8bc65 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf42a78d44931673e004c6a791c8bc65 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.formulir-hapus','data' => ['route' => route('admin.testimonials.destroy', $testimonial->id),'itemName' => $testimonial->nama_pemberi]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.formulir-hapus'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.testimonials.destroy', $testimonial->id)),'item-name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($testimonial->nama_pemberi)]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.keadaan-kosong','data' => ['title' => 'Belum Ada Testimoni','message' => 'Belum ada testimoni atau ulasan yang ditambahkan untuk ditampilkan di halaman publik.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.keadaan-kosong'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Belum Ada Testimoni','message' => 'Belum ada testimoni atau ulasan yang ditambahkan untuk ditampilkan di halaman publik.']); ?>
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
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var el = document.getElementById('sortable-table');
    if (el) {
        var sortable = Sortable.create(el, {
            handle: '.drag-handle',
            animation: 150,
            ghostClass: 'bg-primary-50',
            forceFallback: true,
            fallbackClass: 'bg-white shadow-2xl opacity-100 ring-2 ring-primary-400',
            onEnd: function(evt) {
                var items = el.querySelectorAll('tr');
                var orders = [];
                items.forEach(function(item) {
                    var id = item.getAttribute('data-id');
                    if(id) {
                        orders.push(id);
                    }
                });

                if(orders.length > 0) {
                    fetch('<?php echo e(route('admin.testimonials.reorder')); ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        },
                        body: JSON.stringify({ orders: orders })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(!data.success) {
                            alert('Gagal mengurutkan data');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }
            }
        });
    }

    // SweetAlert2 untuk Konfirmasi Hapus
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            let itemName = this.getAttribute('data-name') || 'ini';
            Swal.fire({
                title: 'Hapus Testimoni?',
                text: "Testimoni milik " + itemName + " ini akan dihapus secara permanen dan tidak dapat dikembalikan!",
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ruang-les\resources\views/admin/testimoni/daftar.blade.php ENDPATH**/ ?>