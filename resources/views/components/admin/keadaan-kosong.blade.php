@props([
    'title' => 'Belum Ada Data', 
    'message' => 'Data saat ini masih kosong.',
    'compact' => false,
    'icon' => null
])

<div class="{{ $compact ? 'p-2 w-full' : 'p-4 md:p-6 w-full' }}">
    <div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center ' . ($compact ? 'py-8 px-4' : 'py-12 px-6') . ' border-2 border-dashed border-gray-200/70 rounded-3xl bg-gradient-to-b from-white/60 to-gray-50/30 backdrop-blur-sm w-full mx-auto transition-all duration-500 hover:bg-white hover:border-primary-300 hover:shadow-[0_8px_30px_rgb(0,0,0,0.04)] group relative overflow-hidden']) }}>
        
        <!-- Decoration background -->
        <div class="absolute -top-10 -right-10 w-32 h-32 bg-primary-50 rounded-full mix-blend-multiply filter blur-xl opacity-0 group-hover:opacity-70 transition-opacity duration-700"></div>
        <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-blue-50 rounded-full mix-blend-multiply filter blur-xl opacity-0 group-hover:opacity-70 transition-opacity duration-700"></div>

        <div class="relative p-5 bg-white shadow-sm ring-1 ring-gray-100 rounded-2xl mb-5 group-hover:-translate-y-1 transition-transform duration-500">
            <!-- Ping animation on hover -->
            <div class="absolute inset-0 bg-primary-100 rounded-2xl opacity-0 group-hover:animate-ping"></div>
            
            <svg class="relative w-10 h-10 text-gray-400 group-hover:text-primary-500 transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                @if($slot->isEmpty())
                    @if($icon == 'document-text')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    @elseif($icon == 'user')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    @elseif($icon == 'calendar')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    @elseif($icon == 'mail')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    @elseif($icon == 'credit-card')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    @else
                        <!-- Default Box Icon -->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    @endif
                @else
                {{ $slot }}
                @endif
            </svg>
        </div>
        <h3 class="relative text-base font-extrabold text-gray-800 font-heading mb-1.5 group-hover:text-primary-900 transition-colors duration-300">{{ $title }}</h3>
        <p class="relative text-sm text-gray-500 text-center max-w-sm leading-relaxed group-hover:text-gray-600 transition-colors duration-300">{{ $message }}</p>
    </div>
</div>
