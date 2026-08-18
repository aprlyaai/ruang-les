@props([
    'action' => '',
    'placeholder' => 'Cari data...',
    'name' => 'search',
])

<form action="{{ $action }}" method="GET" class="w-full flex flex-col md:flex-row justify-between items-center gap-4" id="search-filter-form">
    <div class="relative w-full md:max-w-md">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <input type="text" id="global-search-input" name="{{ $name }}" value="{{ request($name) }}" placeholder="{{ $placeholder }}" oninput="clearTimeout(this.timer); this.timer = setTimeout(() => { document.getElementById('search-filter-form').submit(); }, 100);" class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-xl leading-5 bg-white placeholder-gray-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-primary-200 focus:border-primary-400 sm:text-sm transition-colors duration-100">
        @if(request($name))
            <a href="{{ $action }}" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none" title="Hapus Pencarian">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </a>
        @endif
    </div>
    
    @if(trim($slot))
        <div class="w-full md:w-auto flex items-center space-x-2">
            {{ $slot }}
        </div>
    @endif
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const urlParams = new URLSearchParams(window.location.search);
        if(urlParams.has('{{ $name }}')) {
            const input = document.getElementById('global-search-input');
            if(input) {
                input.focus();
                const val = input.value;
                input.value = '';
                input.value = val;
            }
        }
    });
</script>
