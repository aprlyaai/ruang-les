<!-- Langkah 3: Orang Tua -->
<?php
    $parentProfile = auth()->user()?->parentProfile;
    $defaultNama = $draft->draft_data['nama_ortu'] ?? auth()->user()?->name;
    $defaultStatus = $draft->draft_data['status_hubungan'] ?? $parentProfile?->status_hubungan ?? '';
    $defaultTelepon = $draft->draft_data['nomor_telepon'] ?? $parentProfile?->no_telepon_orangtua ?? '';
    $defaultEmail = $draft->draft_data['email'] ?? auth()->user()?->email;
    $defaultAlamat = $draft->draft_data['alamat_domisili'] ?? $parentProfile?->alamat_domisili ?? '';
?>
<div class="space-y-6">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Nama Lengkap Orang Tua / Wali <span class="text-red-500">*</span></label>
            <input type="text" name="nama_ortu" value="<?php echo e(old('nama_ortu', $defaultNama)); ?>" placeholder="Masukkan nama lengkap Anda" required class="block w-full rounded-2xl py-3.5 px-4 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm font-medium text-gray-800 placeholder:font-normal placeholder:text-gray-400 <?php $__errorArgs = ['nama_ortu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 ring-1 ring-red-300 bg-red-50 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'nama_ortu']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'nama_ortu']); ?>
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
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Status Hubungan <span class="text-red-500">*</span></label>
            <select name="status_hubungan" required class="block w-full appearance-none rounded-2xl py-3.5 px-4 pr-10 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer <?php $__errorArgs = ['status_hubungan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 ring-1 ring-red-300 bg-red-50 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <option value="">Pilih Status Hubungan Dengan Anak</option>
                <option value="Ayah Kandung" <?php echo e(old('status_hubungan', $defaultStatus) == 'Ayah Kandung' ? 'selected' : ''); ?>>Ayah Kandung</option>
                <option value="Ibu Kandung" <?php echo e(old('status_hubungan', $defaultStatus) == 'Ibu Kandung' ? 'selected' : ''); ?>>Ibu Kandung</option>
                <option value="Ayah Tiri" <?php echo e(old('status_hubungan', $defaultStatus) == 'Ayah Tiri' ? 'selected' : ''); ?>>Ayah Tiri</option>
                <option value="Ibu Tiri" <?php echo e(old('status_hubungan', $defaultStatus) == 'Ibu Tiri' ? 'selected' : ''); ?>>Ibu Tiri</option>
                <option value="Ayah Angkat" <?php echo e(old('status_hubungan', $defaultStatus) == 'Ayah Angkat' ? 'selected' : ''); ?>>Ayah Angkat</option>
                <option value="Ibu Angkat" <?php echo e(old('status_hubungan', $defaultStatus) == 'Ibu Angkat' ? 'selected' : ''); ?>>Ibu Angkat</option>
                <option value="Kakek" <?php echo e(old('status_hubungan', $defaultStatus) == 'Kakek' ? 'selected' : ''); ?>>Kakek</option>
                <option value="Nenek" <?php echo e(old('status_hubungan', $defaultStatus) == 'Nenek' ? 'selected' : ''); ?>>Nenek</option>
                <option value="Paman" <?php echo e(old('status_hubungan', $defaultStatus) == 'Paman' ? 'selected' : ''); ?>>Paman</option>
                <option value="Bibi" <?php echo e(old('status_hubungan', $defaultStatus) == 'Bibi' ? 'selected' : ''); ?>>Bibi</option>
                <option value="Saudara Kandung" <?php echo e(old('status_hubungan', $defaultStatus) == 'Saudara Kandung' ? 'selected' : ''); ?>>Saudara Kandung</option>
                <option value="Wali (Legal/Ditunjuk)" <?php echo e(old('status_hubungan', $defaultStatus) == 'Wali (Legal/Ditunjuk)' ? 'selected' : ''); ?>>Wali (Legal/Ditunjuk)</option>
                <option value="Pengasuh" <?php echo e(old('status_hubungan', $defaultStatus) == 'Pengasuh' ? 'selected' : ''); ?>>Pengasuh</option>
                <option value="Pengurus Panti Asuhan/Yayasan" <?php echo e(old('status_hubungan', $defaultStatus) == 'Pengurus Panti Asuhan/Yayasan' ? 'selected' : ''); ?>>Pengurus Panti Asuhan/Yayasan</option>
                <option value="Lainnya" <?php echo e(old('status_hubungan', $defaultStatus) == 'Lainnya' ? 'selected' : ''); ?>>Lainnya</option>
            </select>
            <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'status_hubungan']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'status_hubungan']); ?>
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
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Nomor Telepon / WhatsApp Aktif <span class="text-red-500">*</span></label>
            <input type="tel" name="nomor_telepon" value="<?php echo e(old('nomor_telepon', $defaultTelepon)); ?>" placeholder="Contoh: 081234567890" required class="block w-full rounded-2xl py-3.5 px-4 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm font-medium text-gray-800 placeholder:font-normal placeholder:text-gray-400 <?php $__errorArgs = ['nomor_telepon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 ring-1 ring-red-300 bg-red-50 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'nomor_telepon']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'nomor_telepon']); ?>
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
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Alamat Email <span class="text-red-500">*</span></label>
            <input type="email" name="email" value="<?php echo e(old('email', $defaultEmail)); ?>" placeholder="Contoh: email@gmail.com" required class="block w-full rounded-2xl py-3.5 px-4 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm font-medium text-gray-800 placeholder:font-normal placeholder:text-gray-400 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 ring-1 ring-red-300 bg-red-50 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'email']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'email']); ?>
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
        <div class="md:col-span-2">
            <label class="block text-sm font-bold text-gray-700 mb-1.5">Alamat Lengkap <span class="text-red-500">*</span></label>
            <textarea name="alamat_domisili" rows="3" placeholder="Masukkan alamat lengkap rumah saat ini" required class="block w-full rounded-2xl py-3.5 px-4 border border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200 text-sm font-medium text-gray-800 placeholder:font-normal placeholder:text-gray-400 <?php $__errorArgs = ['alamat_domisili'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 ring-1 ring-red-300 bg-red-50 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('alamat_domisili', $defaultAlamat)); ?></textarea>
            <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'alamat_domisili']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'alamat_domisili']); ?>
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
    </div>
</div>
<?php /**PATH C:\laragon\www\ruang-les\resources\views/pendaftaran/langkah3-ortu.blade.php ENDPATH**/ ?>