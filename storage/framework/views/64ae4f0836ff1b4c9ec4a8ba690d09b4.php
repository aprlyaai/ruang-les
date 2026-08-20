<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['route', 'itemName' => '', 'iconOnly' => false, 'title' => '', 'text' => '', 'confirm' => '']));

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

foreach (array_filter((['route', 'itemName' => '', 'iconOnly' => false, 'title' => '', 'text' => '', 'confirm' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<form action="<?php echo e($route); ?>" method="POST" class="delete-form" data-name="<?php echo e($itemName); ?>" 
    <?php if($title): ?> data-title="<?php echo e($title); ?>" <?php endif; ?>
    <?php if($text): ?> data-text="<?php echo e($text); ?>" <?php endif; ?>
    <?php if($confirm): ?> data-confirm="<?php echo e($confirm); ?>" <?php endif; ?>
>
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button type="submit" class="inline-flex items-center p-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-lg hover:bg-red-50 hover:text-red-600 transition-colors focus:outline-none focus:ring-2 focus:ring-red-500" title="Hapus">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
    </button>
</form>
<?php /**PATH C:\laragon\www\ruang-les\resources\views/components/admin/formulir-hapus.blade.php ENDPATH**/ ?>