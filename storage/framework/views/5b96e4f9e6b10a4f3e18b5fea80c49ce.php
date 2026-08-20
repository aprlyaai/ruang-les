<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'url' => '#',
    'theme' => 'glass', 
    'color' => 'primary', 
    'badgeText' => null,
    'title',
    'value',
    'unit' => null
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
    'url' => '#',
    'theme' => 'glass', 
    'color' => 'primary', 
    'badgeText' => null,
    'title',
    'value',
    'unit' => null
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $bgClass = '';
    $iconBgClass = '';
    $badgeClass = '';
    $titleClass = '';
    $valueClass = '';
    $unitClass = '';

    if ($theme === 'gradient') {
        $iconBgClass = 'bg-white/20 text-white backdrop-blur-sm';
        $badgeClass = 'text-white bg-white/20 backdrop-blur-sm';
        $valueClass = 'text-white text-2xl lg:text-3xl';
        $unitClass = 'text-white/70';
        
        switch ($color) {
            case 'primary':
            default:
                $bgClass = 'bg-gradient-to-br from-primary-600 to-primary-800 border border-primary-500 shadow-md hover:shadow-xl';
                $titleClass = 'text-primary-100';
                break;
        }
    } else {
        $titleClass = 'text-gray-700'; 
        $valueClass = 'text-gray-900 text-3xl';
        $unitClass = 'text-gray-400';

        switch ($color) {
            case 'yellow':
                $bgClass = 'bg-white/80 backdrop-blur-md border border-yellow-200/50 hover:border-yellow-300 shadow-sm hover:shadow-lg';
                $iconBgClass = 'bg-yellow-100 text-yellow-600';
                $badgeClass = 'text-yellow-600 bg-yellow-50';
                break;
            case 'red':
                $bgClass = 'bg-white/80 backdrop-blur-md border border-red-200/50 hover:border-red-300 shadow-sm hover:shadow-lg';
                $iconBgClass = 'bg-red-100 text-red-600';
                $badgeClass = 'text-red-600 bg-red-50';
                break;
            case 'blue':
                $bgClass = 'bg-white/80 backdrop-blur-md border border-blue-200/50 hover:border-blue-300 shadow-sm hover:shadow-lg';
                $iconBgClass = 'bg-blue-100 text-blue-600';
                $badgeClass = 'text-blue-600 bg-blue-50';
                break;
            case 'primary':
            default:
                $bgClass = 'bg-white/80 backdrop-blur-md border border-primary-100/50 hover:border-primary-200 shadow-sm hover:shadow-lg';
                $iconBgClass = 'bg-primary-100 text-primary-600';
                $badgeClass = 'text-primary-600 bg-primary-50';
                break;
        }
    }
?>

<a href="<?php echo e($url); ?>" class="<?php echo e($bgClass); ?> rounded-2xl p-6 flex flex-col transition-all duration-300 hover:-translate-y-1 group relative overflow-hidden">
    <div class="flex items-center justify-between relative z-10 mb-4">
        <div class="p-3 rounded-xl <?php echo e($iconBgClass); ?>">
            <?php echo e($icon); ?>

        </div>
        <?php if($badgeText): ?>
        <span class="flex items-center text-xs font-bold px-2 py-1 rounded-md <?php echo e($badgeClass); ?>">
            <?php echo e($badgeText); ?>

        </span>
        <?php endif; ?>
    </div>
    <div class="relative z-10 mt-auto">
        <p class="text-sm font-bold uppercase tracking-wider mb-1 <?php echo e($titleClass); ?>"><?php echo e($title); ?></p>
        <p class="font-extrabold <?php echo e($valueClass); ?>">
            <?php echo e($value); ?>

            <?php if($unit): ?>
                <span class="text-sm font-medium normal-case tracking-normal <?php echo e($unitClass); ?>"><?php echo e($unit); ?></span>
            <?php endif; ?>
        </p>
    </div>
</a>
<?php /**PATH C:\laragon\www\ruang-les\resources\views/components/admin/kartu-statistik.blade.php ENDPATH**/ ?>