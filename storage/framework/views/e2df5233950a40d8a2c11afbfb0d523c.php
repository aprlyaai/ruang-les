<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'route', 
    'isActive' => true, 
    'field' => 'is_active',
    'labelActive' => 'Aktif',
    'labelInactive' => 'Nonaktif',
    'bgActive' => 'bg-primary-500',
    'textActive' => 'text-primary-600',
    'confirmTitle' => null,
    'confirmTextActive' => null,
    'confirmTextInactive' => null,
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
    'route', 
    'isActive' => true, 
    'field' => 'is_active',
    'labelActive' => 'Aktif',
    'labelInactive' => 'Nonaktif',
    'bgActive' => 'bg-primary-500',
    'textActive' => 'text-primary-600',
    'confirmTitle' => null,
    'confirmTextActive' => null,
    'confirmTextInactive' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="space-y-3 flex justify-center" x-data="{ 
    isActive: <?php echo e($isActive ? 'true' : 'false'); ?>, 
    toggle(e) {
        let doFetch = () => {
            fetch('<?php echo e($route); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({ field: '<?php echo e($field); ?>' })
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    this.isActive = data.newValue;
                    if(typeof window.dispatchEvent === 'function') {
                        window.dispatchEvent(new CustomEvent('notify', {
                            detail: { type: 'success', title: 'Berhasil', text: 'Status berhasil diubah', duration: 3000 }
                        }));
                    }
                }
            });
        };

        <?php if($confirmTitle): ?>
            e.preventDefault();
            // x-model has already updated this.isActive to the NEW state by the time @change fires
            let intendedState = this.isActive; 
            let isDeactivating = intendedState === false;
            
            // Determine dynamic text based on action
            let dynamicText = isDeactivating ? '<?php echo e($confirmTextInactive); ?>' : '<?php echo e($confirmTextActive); ?>';
            
            // Use uniform warning style for ALL confirmations to ensure consistency
            let iconColorClass = '!border-amber-400 !text-amber-500';
            let iconType = 'warning';
            let btnConfirmClass = '!bg-red-500 hover:!bg-red-600 !text-white !rounded-xl !text-sm !font-bold !px-8 !py-2.5 !transition-all !duration-100 !shadow-sm hover:!shadow-md transform hover:!-translate-y-0.5';
            
            Swal.fire({
                title: '<?php echo e($confirmTitle); ?>',
                text: dynamicText,
                icon: iconType,
                showCancelButton: true,
                confirmButtonText: 'Ya, Lanjutkan',
                cancelButtonText: 'Batal',
                width: '24rem',
                padding: '1.5rem',
                buttonsStyling: false,
                customClass: {
                    popup: '!rounded-2xl !shadow-2xl !border !border-gray-100',
                    title: '!text-xl !font-extrabold font-heading !text-gray-900 !pt-2',
                    htmlContainer: '!text-sm !text-gray-500 !mt-2',
                    icon: '!scale-75 !mt-0 !mb-2 ' + iconColorClass,
                    actions: '!mt-6 !w-full !flex !justify-center !gap-3',
                    confirmButton: btnConfirmClass,
                    cancelButton: '!bg-gray-100 hover:!bg-gray-200 !text-gray-700 !rounded-xl !text-sm !font-bold !px-8 !py-2.5 !transition-all !duration-100'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // x-model already applied it visually, so just fetch
                    doFetch();
                } else {
                    // Revert visually because x-model already toggled it prematurely
                    this.isActive = !intendedState;
                }
            });
        <?php else: ?>
            doFetch();
        <?php endif; ?>
    }
}">
    <label class="flex items-center cursor-pointer group">
        <div class="relative">
            <input type="checkbox" class="sr-only" x-model="isActive" @change="toggle($event)">
            <div class="block w-10 h-6 rounded-full transition-colors duration-300" :class="isActive ? '<?php echo e($bgActive); ?>' : 'bg-gray-300'"></div>
            <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform duration-300" :class="isActive ? 'transform translate-x-4' : ''"></div>
        </div>
        <div class="ml-3 text-xs font-bold transition-colors w-24 text-left" :class="isActive ? '<?php echo e($textActive); ?>' : 'text-gray-500'" x-text="isActive ? '<?php echo e($labelActive); ?>' : '<?php echo e($labelInactive); ?>'"></div>
    </label>
</div>
<?php /**PATH C:\laragon\www\ruang-les\resources\views/components/admin/sakelar-status.blade.php ENDPATH**/ ?>