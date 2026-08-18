@props([
    'name',
    'avatarUrl' => null,
    'size' => 10,
    'textSize' => 'text-sm'
])

@php
    $sizeClass = 'w-' . $size . ' h-' . $size;
    $initials = strtoupper(substr($name, 0, 1));
@endphp

@if($avatarUrl)
    <img src="{{ asset('storage/' . $avatarUrl) }}" alt="{{ $name }}" class="{{ $sizeClass }} rounded-full object-cover border-2 border-white shadow-sm flex-shrink-0 transition-all duration-300 transform hover:scale-110 hover:shadow-md hover:border-primary-200 relative z-0 hover:z-10">
@else
    <div class="{{ $sizeClass }} rounded-full bg-gradient-to-br from-primary-100 to-primary-200 flex items-center justify-center text-primary-700 font-bold flex-shrink-0 border-2 border-white shadow-sm {{ $textSize }} transition-all duration-300 transform hover:scale-110 hover:shadow-md hover:border-primary-200 relative z-0 hover:z-10">
        {{ $initials }}
    </div>
@endif
