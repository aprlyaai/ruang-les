@props([
    'color' => 'gray', // default color: primary, warning, danger, success, gray
    'size' => 'md' // sizes: sm, md, lg
])
@php
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
@endphp
<span {{ $attributes->merge(['class' => "inline-flex items-center rounded-full font-bold border w-fit $sizing $theme"]) }}>
    {{ $slot }}
</span>
