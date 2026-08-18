@props(['route', 'itemName' => '', 'iconOnly' => false, 'title' => '', 'text' => '', 'confirm' => ''])

<form action="{{ $route }}" method="POST" class="delete-form" data-name="{{ $itemName }}" 
    @if($title) data-title="{{ $title }}" @endif
    @if($text) data-text="{{ $text }}" @endif
    @if($confirm) data-confirm="{{ $confirm }}" @endif
>
    @csrf
    @method('DELETE')
    <button type="submit" class="inline-flex items-center p-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-lg hover:bg-red-50 hover:text-red-600 transition-colors focus:outline-none focus:ring-2 focus:ring-red-500" title="Hapus">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
    </button>
</form>
