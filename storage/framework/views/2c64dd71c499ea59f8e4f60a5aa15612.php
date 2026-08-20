<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['name', 'label', 'model' => null, 'type' => 'text', 'placeholder' => '', 'required' => false, 'value' => '']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['name', 'label', 'model' => null, 'type' => 'text', 'placeholder' => '', 'required' => false, 'value' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div>
    <label class="block text-sm text-gray-600 font-semibold mb-2"><?php echo e($label); ?> <?php if($required): ?><span class="text-red-500">*</span><?php endif; ?></label>
    
    <input type="<?php echo e($type); ?>" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>" 
        <?php if($model): ?>
            x-model="<?php echo e($model); ?>" @blur="touched.<?php echo e($name); ?> = true"
            :class="touched.<?php echo e($name); ?> && <?php echo e($model); ?>.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'"
        <?php else: ?>
            value="<?php echo e($value); ?>"
            class="border-gray-200 focus:border-primary-400 bg-gray-50"
        <?php endif; ?>
        class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800"
        placeholder="<?php echo e($placeholder); ?>" <?php echo e($required ? 'required' : ''); ?>>
        
    <?php if($required && $model): ?>
    <p x-show="touched.<?php echo e($name); ?> && <?php echo e($model); ?>.trim() === ''" x-transition style="display: none;" class="text-red-500 text-xs mt-2 font-medium flex items-center">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <?php echo e($label); ?> wajib diisi.
    </p>
    <?php endif; ?>
    
    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="text-xs text-red-500 mt-1 block font-medium"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<?php /**PATH C:\laragon\www\ruang-les\resources\views/components/admin/input-formulir.blade.php ENDPATH**/ ?>