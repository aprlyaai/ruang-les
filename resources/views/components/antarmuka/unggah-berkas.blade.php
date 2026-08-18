@props([
    'name', 
    'id' => null, 
    'accept' => 'image/jpeg,image/jpg,image/png,image/webp,application/pdf',
    'xShowError' => false,
    'required' => true,
    'disabled' => false
])

@php
    $inputId = $id ?? $name;
@endphp

<div>
    <div x-data="{
        file: null, 
        fileName: '', 
        fileSize: '', 
        previewUrl: null, 
        isDragging: false,
        isImage: false,
        
        handleFileDrop(e) {
            this.isDragging = false;
            if (e.dataTransfer.files.length > 0) {
                this.processFile(e.dataTransfer.files[0]);
            }
        },
        handleFileInput(e) {
            if (e.target.files.length > 0) {
                this.processFile(e.target.files[0]);
            }
        },
        processFile(file) {
            this.file = file;
            this.fileName = file.name;
            this.fileSize = (file.size / 1024 / 1024).toFixed(2) + ' MB';
            this.isImage = file.type.startsWith('image/');
            @if($xShowError && $xShowError !== 'true' && $xShowError !== 'false') 
                {{ $xShowError }} = false; 
            @endif
            
            if (this.isImage) {
                const reader = new FileReader();
                reader.onload = (e) => this.previewUrl = e.target.result;
                reader.readAsDataURL(file);
            } else {
                this.previewUrl = null;
            }
        },
        removeFile(inputId) {
            this.file = null;
            this.fileName = '';
            this.fileSize = '';
            this.previewUrl = null;
            this.isImage = false;
            document.getElementById(inputId).value = '';
            @if($xShowError && $xShowError !== 'true' && $xShowError !== 'false') 
                {{ $xShowError }} = true; 
            @endif
        }
    }" class="relative group w-full border-2 border-dashed rounded-2xl p-6 transition-all duration-200 flex flex-col items-center justify-center min-h-[160px]"
        :class="isDragging ? 'border-primary-500 bg-primary-50/50' : (file ? 'border-primary-200 bg-white' : ({{ $xShowError ?: 'false' }} ? 'border-red-500 bg-red-50/10' : 'border-gray-300 hover:border-primary-400 bg-gray-50'))"
        @dragover.prevent="isDragging = true"
        @dragleave.prevent="isDragging = false"
        @drop.prevent="handleFileDrop($event)">
        
        <!-- Hidden File Input -->
        <input type="file" name="{{ $name }}" id="{{ $inputId }}" accept="{{ $accept }}" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" @change="handleFileInput($event)" {{ $required ? 'required' : '' }} {{ $disabled ? 'disabled' : '' }}>
        
        <!-- UI Placeholder saat tidak ada file -->
        <div x-show="!file" class="space-y-3 text-center pointer-events-none relative z-0 w-full">
            
            <div class="w-16 h-16 rounded-full bg-white border border-primary-100 shadow-sm flex items-center justify-center mx-auto mb-4 group-hover:scale-110 group-hover:border-primary-400 transition-transform duration-300">
                <svg class="h-8 w-8 text-primary-300 group-hover:text-primary-600 transition-colors" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
            
            <div class="flex text-sm text-gray-700 justify-center font-semibold">
                <span class="text-primary-600 underline decoration-primary-300 underline-offset-4">Pilih file</span>
                <p class="pl-1 text-gray-500 font-normal">atau seret dan lepas ke sini</p>
            </div>
            
         </div>
          <!-- UI Preview when file is selected -->
          <div x-show="file" class="flex flex-col items-center space-y-3 relative z-20 w-full" style="display: none;">
             <div class="w-20 h-20 rounded-xl border border-gray-200 overflow-hidden bg-white flex items-center justify-center shadow-sm">
                 <img x-show="isImage" :src="previewUrl" class="w-full h-full object-cover">
                 <svg x-show="!isImage" class="w-10 h-10 text-primary-500" fill="currentColor" viewBox="0 0 20 20">
                     <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                 </svg>
             </div>
             <div class="text-center w-full max-w-xs px-2">
                 <p class="text-sm font-bold text-gray-800 truncate" x-text="fileName"></p>
                 <p class="text-xs text-gray-500" x-text="fileSize"></p>
                 <button type="button" @click.prevent="removeFile('{{ $inputId }}')" class="mt-2 inline-flex items-center text-xs font-bold text-red-500 hover:text-red-700 hover:bg-red-50 px-2 py-1 rounded-md transition-colors relative z-30">
                     <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                     Hapus
                 </button>
             </div>
          </div>
     </div>
     
     <div class="mt-2.5 text-xs text-gray-500 font-medium leading-relaxed">
         {{ $slot }}
     </div>
</div>
