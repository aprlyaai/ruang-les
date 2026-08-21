<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'name',
    'avatarUrl' => null,
    'size' => 10,
    'textSize' => 'text-sm'
]));

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

foreach (array_filter(([
    'name',
    'avatarUrl' => null,
    'size' => 10,
    'textSize' => 'text-sm'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $sizeClass = 'w-' . $size . ' h-' . $size;
    $initials = strtoupper(substr($name, 0, 1));
?>

<?php if($avatarUrl): ?>
    <img src="<?php echo e(asset('storage/' . $avatarUrl)); ?>" alt="<?php echo e($name); ?>" class="<?php echo e($sizeClass); ?> rounded-full object-cover border-2 border-white shadow-sm flex-shrink-0 transition-all duration-300 transform hover:scale-110 hover:shadow-md hover:border-primary-200 relative z-0 hover:z-10">
<?php else: ?>
    <div class="<?php echo e($sizeClass); ?> rounded-full bg-gradient-to-br from-primary-100 to-primary-200 flex items-center justify-center text-primary-700 font-bold flex-shrink-0 border-2 border-white shadow-sm <?php echo e($textSize); ?> transition-all duration-300 transform hover:scale-110 hover:shadow-md hover:border-primary-200 relative z-0 hover:z-10">
        <?php echo e($initials); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\ruang-les\resources\views/components/admin/avatar.blade.php ENDPATH**/ ?>