@props(['name', 'label', 'model' => null, 'rows' => '4', 'placeholder' => '', 'required' => false, 'value' => ''])

<div>
    <label class="block text-sm text-gray-600 font-semibold mb-2">{{ $label }} @if($required)<span class="text-red-500">*</span>@endif</label>
    
    <textarea name="{{ $name }}" id="{{ $name }}" rows="{{ $rows }}" 
        @if($model)
            x-model="{{ $model }}" @blur="touched.{{ $name }} = true"
            :class="touched.{{ $name }} && {{ $model }}.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'"
        @else
            class="border-gray-200 focus:border-primary-400 bg-gray-50"
        @endif
        class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800"
        placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }}>{{ $model ? '' : $value }}</textarea>
        
    @if($required && $model)
    <p x-show="touched.{{ $name }} && {{ $model }}.trim() === ''" x-transition style="display: none;" class="text-red-500 text-xs mt-2 font-medium flex items-center">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        {{ $label }} wajib diisi.
    </p>
    @endif
    
    @error($name)
        <span class="text-xs text-red-500 mt-1 block font-medium">{{ $message }}</span>
    @enderror
</div>
