<?php $__env->startSection('title', 'Kelola Pengguna'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Pengguna</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">

    <?php if (isset($component)) { $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.tajuk-halaman','data' => ['title' => 'Daftar Pengguna Sistem','description' => 'Kelola akses akun Admin, Mentor, dan Orang Tua.','actionUrl' => ''.e(route('admin.users.create')).'','actionLabel' => 'Tambah Pengguna']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.tajuk-halaman'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Daftar Pengguna Sistem','description' => 'Kelola akses akun Admin, Mentor, dan Orang Tua.','actionUrl' => ''.e(route('admin.users.create')).'','actionLabel' => 'Tambah Pengguna']); ?>
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

    <!-- Table Section with Search -->
    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden" x-data="{ search: '', filter: 'all' }">
        
        <!-- Toolbar (Search & Filter) -->
        <div class="p-4 border-b border-gray-100 bg-gray-50/50 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="w-full md:max-w-md relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </div>
                <input x-model="search" type="text" placeholder="Cari nama pengguna atau email..." class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-xl leading-5 bg-white placeholder-gray-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-primary-200 focus:border-primary-400 sm:text-sm transition-colors duration-100">
                <button x-show="search.length > 0" @click="search = ''" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none" style="display: none;">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            
            <div class="w-full md:w-auto flex items-center gap-3 md:ml-auto">
                <span class="text-sm font-semibold text-gray-900 whitespace-nowrap">Filter Peran:</span>
                <select x-model="filter" class="block w-full md:w-48 pl-3 pr-10 py-2 text-sm font-medium text-gray-700 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 bg-white transition-colors shadow-sm appearance-none bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_0.75rem_center] bg-no-repeat cursor-pointer">
                    <option value="all">Semua Peran</option>
                    <option value="admin">Admin</option>
                    <option value="mentor">Mentor</option>
                    <option value="orang_tua">Orang Tua</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm min-w-[650px]">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-primary-100/50">
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Peran (Role)</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Terdaftar</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Status</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50 transition-colors <?php echo e($user->trashed() ? 'bg-red-50/30' : ''); ?>" 
                            x-show="(filter === 'all' || filter === '<?php echo e($user->role); ?>') && (search === '' || <?php echo \Illuminate\Support\Js::from(strtolower($user->name ?? ''))->toHtml() ?>.includes(search.toLowerCase()) || <?php echo \Illuminate\Support\Js::from(strtolower($user->email ?? ''))->toHtml() ?>.includes(search.toLowerCase()))" 
                            x-transition>
                            <td class="px-4 py-3 align-middle">
                                <div class="flex items-center space-x-3">
                                    <?php if (isset($component)) { $__componentOriginala3b0902aa82c25e0a3af1fd64938810c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3b0902aa82c25e0a3af1fd64938810c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.avatar','data' => ['name' => $user->name,'avatarUrl' => $user->avatar]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.avatar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user->name),'avatar-url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user->avatar)]); ?>
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
                                    <div class="text-sm font-bold text-gray-900"><?php echo e($user->name); ?></div>
                                </div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="text-sm text-gray-900 flex items-center">
                                    <svg class="w-4 h-4 text-primary-600 mr-1.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    <span class="truncate"><?php echo e($user->email); ?></span>
                                </div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <?php if($user->role === 'admin'): ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-primary-100 text-primary-700 border border-primary-200 w-fit whitespace-nowrap">Admin</span>
                                <?php elseif($user->role === 'mentor'): ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-sky-100 text-sky-700 border border-sky-200 w-fit whitespace-nowrap">Mentor</span>
                                <?php else: ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-pink-100 text-pink-500 border border-pink-200 w-fit whitespace-nowrap">Orang Tua</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="text-sm font-semibold text-gray-900">
                                    <?php echo e($user->created_at->format('d M Y')); ?>

                                </div>
                            </td>
                            <td class="px-4 py-3 align-middle text-center">
                                <div class="flex justify-center translate-x-[40px]">
                                    <?php if (isset($component)) { $__componentOriginald1e5ba0f948572b366847254c1a63922 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald1e5ba0f948572b366847254c1a63922 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.sakelar-status','data' => ['route' => route('admin.users.toggle-status', $user->id),'isActive' => !$user->trashed(),'confirmTitle' => 'Konfirmasi Perubahan Status','confirmTextActive' => 'Apakah Anda yakin ingin mengaktifkan akun milik pengguna '.e($user->name).' ini? Pengguna akan diberikan akses kembali ke sistem.','confirmTextInactive' => 'Apakah Anda yakin ingin menonaktifkan akun milik pengguna '.e($user->name).' ini? Pengguna yang dinonaktifkan tidak akan dapat masuk ke sistem.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.sakelar-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.users.toggle-status', $user->id)),'is-active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!$user->trashed()),'confirmTitle' => 'Konfirmasi Perubahan Status','confirmTextActive' => 'Apakah Anda yakin ingin mengaktifkan akun milik pengguna '.e($user->name).' ini? Pengguna akan diberikan akses kembali ke sistem.','confirmTextInactive' => 'Apakah Anda yakin ingin menonaktifkan akun milik pengguna '.e($user->name).' ini? Pengguna yang dinonaktifkan tidak akan dapat masuk ke sistem.']); ?>
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
                                    <form action="<?php echo e(route('admin.users.reset-password', $user->id)); ?>" method="POST" class="inline-block reset-password-form" data-name="<?php echo e($user->name); ?>" title="Reset Password">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="inline-flex items-center p-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-lg hover:bg-gray-100 hover:text-amber-600 transition-colors focus:outline-none focus:ring-2 focus:ring-amber-500">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" /></svg>
                                        </button>
                                    </form>

                                    <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>" class="inline-flex items-center p-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-lg hover:bg-gray-100 hover:text-primary-600 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500" title="Edit">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                    </a>
                                    
                                    <?php if (isset($component)) { $__componentOriginalcf42a78d44931673e004c6a791c8bc65 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf42a78d44931673e004c6a791c8bc65 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.formulir-hapus','data' => ['route' => route('admin.users.destroy', $user->id),'itemName' => $user->name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.formulir-hapus'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.users.destroy', $user->id)),'item-name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user->name)]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.keadaan-kosong','data' => ['title' => 'Belum Ada Pengguna','message' => 'Data pengguna tidak ditemukan.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.keadaan-kosong'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Belum Ada Pengguna','message' => 'Data pengguna tidak ditemukan.']); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // SweetAlert logs have been moved to layouts.admin globally
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ruang-les\resources\views/admin/pengguna/daftar.blade.php ENDPATH**/ ?>