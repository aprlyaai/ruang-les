@props([
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
])

<div class="space-y-3 flex justify-center" x-data="{ 
    isActive: {{ $isActive ? 'true' : 'false' }}, 
    toggle(e) {
        let doFetch = () => {
            fetch('{{ $route }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ field: '{{ $field }}' })
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    this.isActive = data.newValue;
                    if(typeof window.dispatchEvent === 'function') {
                        window.dispatchEvent(new CustomEvent('notify', {
                            detail: { type: 'success', title: 'Berhasil', text: data.message || 'Status berhasil diubah', duration: 3000 }
                        }));
                    }
                } else {
                    this.isActive = !this.isActive;
                    if (data.message && typeof Swal !== 'undefined') {
                        Swal.fire({ icon: 'error', title: 'Gagal', text: data.message, confirmColor: '#ef4444' });
                    }
                }
            })
            .catch(err => {
                this.isActive = !this.isActive;
            });
        };

        @if($confirmTitle)
            e.preventDefault();
            // x-model has already updated this.isActive to the NEW state by the time @change fires
            let intendedState = this.isActive; 
            let isDeactivating = intendedState === false;
            
            // Determine dynamic text based on action
            let dynamicText = isDeactivating ? '{{ $confirmTextInactive }}' : '{{ $confirmTextActive }}';
            
            // Use uniform warning style for ALL confirmations to ensure consistency
            let iconColorClass = '!border-amber-400 !text-amber-500';
            let iconType = 'warning';
            let btnConfirmClass = '!bg-red-500 hover:!bg-red-600 !text-white !rounded-xl !text-sm !font-bold !px-8 !py-2.5 !transition-all !duration-100 !shadow-sm hover:!shadow-md transform hover:!-translate-y-0.5';
            
            Swal.fire({
                title: '{{ $confirmTitle }}',
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
        @else
            doFetch();
        @endif
    }
}">
    <label class="flex items-center cursor-pointer group">
        <div class="relative">
            <input type="checkbox" class="sr-only" x-model="isActive" @change="toggle($event)">
            <div class="block w-10 h-6 rounded-full transition-colors duration-300" :class="isActive ? '{{ $bgActive }}' : 'bg-gray-300'"></div>
            <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform duration-300" :class="isActive ? 'transform translate-x-4' : ''"></div>
        </div>
        <div class="ml-3 text-xs font-bold transition-colors w-24 text-left" :class="isActive ? '{{ $textActive }}' : 'text-gray-500'" x-text="isActive ? '{{ $labelActive }}' : '{{ $labelInactive }}'"></div>
    </label>
</div>
