@props(['variant' => 'primary', 'type' => 'button'])

@php
    $baseClasses = 'inline-flex items-center justify-center px-6 py-2.5 text-sm font-bold leading-normal transition-all duration-300 rounded-full focus:outline-none focus:ring-4 focus:ring-offset-1 disabled:opacity-50 disabled:cursor-not-allowed shadow-sm transform hover:-translate-y-0.5';
    
    $variants = [
        'primary' => 'bg-primary-700 text-white border border-transparent hover:bg-primary-800 focus:ring-primary-300 hover:shadow-md',
        'secondary' => 'bg-primary-100 text-primary-800 border border-transparent hover:bg-primary-200 focus:ring-primary-300',
        'danger' => 'bg-red-600 text-white border border-transparent hover:bg-red-700 focus:ring-red-300 hover:shadow-md',
        'outline' => 'bg-transparent text-primary-700 border-2 border-primary-700 hover:bg-primary-50 focus:ring-primary-300',
    ];

    $variantClasses = $variants[$variant] ?? $variants['primary'];
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $baseClasses . ' ' . $variantClasses]) }}>
    {{ $slot }}
</button>
