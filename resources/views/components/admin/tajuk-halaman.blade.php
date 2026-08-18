@props([
    'title', 
    'description' => null, 
    'actionUrl' => null, 
    'actionLabel' => 'Tambah Data', 
    'icon' => 'add',
    'backUrl' => null
])

<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
    <div class="flex items-center space-x-4">
        @if($backUrl)
        <a href="{{ $backUrl }}" class="w-9 h-9 flex items-center justify-center text-gray-500 hover:text-primary-700 hover:bg-primary-50 bg-white rounded-full shadow-sm border border-gray-200 hover:border-primary-200 transition-all duration-100 transform hover:-translate-y-0.5" title="Kembali">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        @endif
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight font-heading">
                @if(isset($titleSlot))
                    {{ $titleSlot }}
                @else
                    {{ $title ?? '' }}
                @endif
            </h2>
            @if($description)
            <p class="text-gray-500 mt-2 text-base">{{ $description }}</p>
            @endif
        </div>
    </div>
    @if($actionUrl)
    <div>
        <a href="{{ $actionUrl }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-bold text-white transition-all duration-100 bg-primary-600 rounded-xl hover:bg-primary-700 shadow-sm hover:-translate-y-0.5">
            @if($icon == 'add')
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            @elseif($icon == 'megaphone')
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
            @endif
            {{ $actionLabel }}
        </a>
    </div>
    @endif
    
    @if(isset($rightActions))
        <div class="flex items-center space-x-3">
            {{ $rightActions }}
        </div>
    @endif
</div>
