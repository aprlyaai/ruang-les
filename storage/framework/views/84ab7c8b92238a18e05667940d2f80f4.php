<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title', 
    'description' => null, 
    'actionUrl' => null, 
    'actionLabel' => 'Tambah Data', 
    'icon' => 'add',
    'backUrl' => null
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
    'title', 
    'description' => null, 
    'actionUrl' => null, 
    'actionLabel' => 'Tambah Data', 
    'icon' => 'add',
    'backUrl' => null
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
    <div class="flex items-center space-x-4">
        <?php if($backUrl): ?>
        <a href="<?php echo e($backUrl); ?>" class="w-9 h-9 flex items-center justify-center text-gray-500 hover:text-primary-700 hover:bg-primary-50 bg-white rounded-full shadow-sm border border-gray-200 hover:border-primary-200 transition-all duration-100 transform hover:-translate-y-0.5 shrink-0" title="Kembali">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <?php endif; ?>
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight font-heading">
                <?php if(isset($titleSlot)): ?>
                    <?php echo e($titleSlot); ?>

                <?php else: ?>
                    <?php echo e($title ?? ''); ?>

                <?php endif; ?>
            </h2>
            <?php if($description): ?>
            <p class="text-gray-500 mt-2 text-base"><?php echo e($description); ?></p>
            <?php endif; ?>
        </div>
    </div>
    <?php if($actionUrl): ?>
    <div>
        <a href="<?php echo e($actionUrl); ?>" class="inline-flex items-center justify-center px-4 py-2 text-sm font-bold text-white transition-all duration-100 bg-primary-600 rounded-xl hover:bg-primary-700 shadow-sm hover:-translate-y-0.5 whitespace-nowrap">
            <?php if($icon == 'add'): ?>
            <svg class="w-5 h-5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            <?php elseif($icon == 'megaphone'): ?>
            <svg class="w-5 h-5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
            <?php endif; ?>
            <?php echo e($actionLabel); ?>

        </a>
    </div>
    <?php endif; ?>
    
    <?php if(isset($rightActions)): ?>
        <div class="flex flex-col sm:flex-row w-full sm:w-auto space-y-2 sm:space-y-0 sm:space-x-3">
            <?php echo e($rightActions); ?>

        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\ruang-les\resources\views/components/admin/tajuk-halaman.blade.php ENDPATH**/ ?>