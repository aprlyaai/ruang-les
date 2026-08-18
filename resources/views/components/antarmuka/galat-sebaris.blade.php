@props(['name' => null, 'for' => null, 'xShowError' => false])

@php
    $errorName = $name ?? $for;
@endphp

@error($errorName)
    <p {{ $xShowError ? 'x-show='.$xShowError : '' }} {{ $attributes->merge(['class' => 'text-red-500 text-xs mt-2 font-medium flex items-center']) }}>
        <svg class="w-4 h-4 mr-1 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span>{{ $message }}</span>
    </p>
@enderror
