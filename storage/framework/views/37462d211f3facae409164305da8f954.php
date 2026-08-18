<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'color' => 'gray', // default color: primary, warning, danger, success, gray
    'size' => 'md' // sizes: sm, md, lg
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
    'color' => 'gray', // default color: primary, warning, danger, success, gray
    'size' => 'md' // sizes: sm, md, lg
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<?php
    $colorClasses = [
        'primary' => 'bg-primary-50 text-primary-700 border-primary-200',
        'success' => 'bg-green-50 text-green-700 border-green-200',
        'warning' => 'bg-yellow-50 text-yellow-700 border-yellow-200',
        'danger' => 'bg-red-50 text-red-700 border-red-200',
        'gray' => 'bg-gray-50 text-gray-700 border-gray-200',
    ];
    
    $sizeClasses = [
        'sm' => 'px-2 py-0.5 text-[10px]',
        'md' => 'px-2.5 py-0.5 text-xs',
        'lg' => 'px-3 py-1 text-sm',
    ];

    $theme = $colorClasses[$color] ?? $colorClasses['gray'];
    $sizing = $sizeClasses[$size] ?? $sizeClasses['md'];
?>
<span <?php echo e($attributes->merge(['class' => "inline-flex items-center rounded-full font-bold border w-fit $sizing $theme"])); ?>>
    <?php echo e($slot); ?>

</span>
<?php /**PATH C:\laragon\www\ruang-les-v2\resources\views/components/antarmuka/lencana.blade.php ENDPATH**/ ?>