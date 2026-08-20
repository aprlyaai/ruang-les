<!-- Image Viewer Lightbox -->
<template x-teleport="body">
    <div x-show="showImageModal" class="fixed inset-0 z-[9999] overflow-y-auto" style="display: none;">
        <div class="flex items-center justify-center min-h-screen p-4 text-center">
            <div x-show="showImageModal" x-transition.opacity class="fixed inset-0 bg-gray-900/80 transition-opacity" aria-hidden="true" @click="showImageModal = false"></div>
            <div x-show="showImageModal" 
                x-transition:enter="ease-out duration-100" 
                x-transition:enter-start="opacity-0 scale-95" 
                x-transition:enter-end="opacity-100 scale-100" 
                class="inline-block relative z-[10000] p-2 max-w-4xl w-full">
                
                <button @click="showImageModal = false" type="button" class="absolute -top-12 right-0 p-3 text-white hover:text-gray-300 focus:outline-none min-h-[44px] min-w-[44px]" title="Tutup">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                
                <template x-if="modalImageUrl">
                    <div>
                        <!-- Tampilkan Object jika file PDF -->
                        <template x-if="modalImageUrl.toLowerCase().endsWith('.pdf')">
                            <object :data="modalImageUrl" class="w-full h-[85vh] shadow-2xl bg-white rounded-xl" type="application/pdf">
                                <div class="bg-white p-8 rounded-xl text-center">
                                    <p class="text-gray-500 mb-4">Browser Anda tidak mendukung preview PDF.</p>
                                    <a :href="modalImageUrl" target="_blank" class="inline-flex justify-center rounded-xl border border-transparent shadow-sm px-6 py-2 bg-primary-600 text-base font-bold text-white hover:bg-primary-700 transition-colors">Download PDF</a>
                                </div>
                            </object>
                        </template>
                        
                        <!-- Tampilkan IMG biasa jika file gambar (JPG/PNG) -->
                        <template x-if="!modalImageUrl.toLowerCase().endsWith('.pdf')">
                            <img :src="modalImageUrl" alt="Pratinjau Dokumen" class="w-full h-auto max-h-[85vh] object-contain mx-auto border border-gray-500 shadow-2xl rounded-xl" @click.stop>
                        </template>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>
<?php /**PATH C:\laragon\www\ruang-les\resources\views/components/antarmuka/dialog-gambar.blade.php ENDPATH**/ ?>