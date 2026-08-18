@props([
    'url' => '#',
    'theme' => 'glass', 
    'color' => 'primary', 
    'badgeText' => null,
    'title',
    'value',
    'unit' => null
])

@php
    $bgClass = '';
    $iconBgClass = '';
    $badgeClass = '';
    $titleClass = '';
    $valueClass = '';
    $unitClass = '';

    if ($theme === 'gradient') {
        $iconBgClass = 'bg-white/20 text-white backdrop-blur-sm';
        $badgeClass = 'text-white bg-white/20 backdrop-blur-sm';
        $valueClass = 'text-white text-2xl lg:text-3xl';
        $unitClass = 'text-white/70';
        
        switch ($color) {
            case 'primary':
            default:
                $bgClass = 'bg-gradient-to-br from-primary-600 to-primary-800 border border-primary-500 shadow-md hover:shadow-xl';
                $titleClass = 'text-primary-100';
                break;
        }
    } else {
        $titleClass = 'text-gray-700'; 
        $valueClass = 'text-gray-900 text-3xl';
        $unitClass = 'text-gray-400';

        switch ($color) {
            case 'yellow':
                $bgClass = 'bg-white/80 backdrop-blur-md border border-yellow-200/50 hover:border-yellow-300 shadow-sm hover:shadow-lg';
                $iconBgClass = 'bg-yellow-100 text-yellow-600';
                $badgeClass = 'text-yellow-600 bg-yellow-50';
                break;
            case 'red':
                $bgClass = 'bg-white/80 backdrop-blur-md border border-red-200/50 hover:border-red-300 shadow-sm hover:shadow-lg';
                $iconBgClass = 'bg-red-100 text-red-600';
                $badgeClass = 'text-red-600 bg-red-50';
                break;
            case 'blue':
                $bgClass = 'bg-white/80 backdrop-blur-md border border-blue-200/50 hover:border-blue-300 shadow-sm hover:shadow-lg';
                $iconBgClass = 'bg-blue-100 text-blue-600';
                $badgeClass = 'text-blue-600 bg-blue-50';
                break;
            case 'primary':
            default:
                $bgClass = 'bg-white/80 backdrop-blur-md border border-primary-100/50 hover:border-primary-200 shadow-sm hover:shadow-lg';
                $iconBgClass = 'bg-primary-100 text-primary-600';
                $badgeClass = 'text-primary-600 bg-primary-50';
                break;
        }
    }
@endphp

<a href="{{ $url }}" class="{{ $bgClass }} rounded-2xl p-6 flex flex-col transition-all duration-300 hover:-translate-y-1 group relative overflow-hidden">
    <div class="flex items-center justify-between relative z-10 mb-4">
        <div class="p-3 rounded-xl {{ $iconBgClass }}">
            {{ $icon }}
        </div>
        @if($badgeText)
        <span class="flex items-center text-xs font-bold px-2 py-1 rounded-md {{ $badgeClass }}">
            {{ $badgeText }}
        </span>
        @endif
    </div>
    <div class="relative z-10 mt-auto">
        <p class="text-sm font-bold uppercase tracking-wider mb-1 {{ $titleClass }}">{{ $title }}</p>
        <p class="font-extrabold {{ $valueClass }}">
            {{ $value }}
            @if($unit)
                <span class="text-sm font-medium normal-case tracking-normal {{ $unitClass }}">{{ $unit }}</span>
            @endif
        </p>
    </div>
</a>
