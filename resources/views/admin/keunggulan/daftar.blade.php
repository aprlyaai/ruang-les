@extends('layouts.admin')

@section('title', 'Kelola Fitur Unggulan')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('admin.settings.index') }}" class="hover:text-primary-600 transition-colors">Kelola Bimbel (CMS)</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Fitur</span>
@endsection

@section('content')
<div class="space-y-6">

    <x-admin.tajuk-halaman
        title="Fitur Unggulan"
        description="Tampilkan apa saja yang bikin bimbelmu spesial dan beda dari yang lain!"
        actionUrl="{{ route('admin.features.create') }}"
        actionLabel="Tambah Fitur"
    />

    <!-- Table Section -->
    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-primary-100/50">
                        <th class="w-12 px-4 py-3 text-center"></th>
                        <th class="w-1/4 px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Judul Fitur</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Deskripsi</th>
                        <th class="w-48 px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Status</th>
                        <th class="w-32 px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody id="sortable-table" class="divide-y divide-gray-100">
                    @forelse($features as $feature)
                        <tr class="bg-white hover:bg-gray-50 transition-colors" data-id="{{ $feature->id }}">
                            <td class="px-4 py-3 align-middle text-center drag-handle cursor-grab active:cursor-grabbing select-none text-gray-400 hover:text-gray-600" style="touch-action: none;">
                                <svg class="w-5 h-5 mx-auto pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                            </td>
                            <td class="px-4 py-4 align-middle">
                                <div class="text-sm font-bold text-gray-900">{{ $feature->nama_keunggulan }}</div>
                            </td>
                            <td class="px-4 py-4 align-middle">
                                <div class="text-sm text-gray-900 max-w-3xl leading-relaxed text-justify">{{ $feature->deskripsi_keunggulan }}</div>
                            </td>
                            <td class="px-4 py-3 align-middle text-center">
                                <div class="flex justify-center translate-x-[44px]">
                                    <x-admin.sakelar-status
                                        :route="route('admin.features.toggle-status', $feature->id)"
                                        :is-active="$feature->status_keunggulan"
                                        field="status_keunggulan"
                                    />
                                </div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('admin.features.edit', $feature->id) }}" class="inline-flex items-center p-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-lg hover:bg-gray-100 hover:text-primary-600 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <x-admin.formulir-hapus :route="route('admin.features.destroy', $feature->id)" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 align-middle">
                                <x-admin.keadaan-kosong
                                    title="Belum Ada Fitur"
                                    message="Belum ada fitur unggulan yang ditambahkan untuk ditampilkan di halaman publik."
                                />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
function initSortableFeature() {
    var el = document.getElementById('sortable-table');
    if (!el || typeof Sortable === 'undefined') return;
    if (el._sortable) return;

    el._sortable = Sortable.create(el, {
        handle: '.drag-handle',
        animation: 150,
        forceFallback: true,
        fallbackOnBody: true,
        fallbackTolerance: 3,
        ghostClass: 'opacity-40',
        chosenClass: 'bg-primary-50',
        onEnd: function(evt) {
            var items = el.querySelectorAll('tr[data-id]');
            var orders = [];
            items.forEach(function(item) {
                var id = item.getAttribute('data-id');
                if(id) {
                    orders.push(id);
                }
            });

            if(orders.length > 0) {
                fetch('{{ route('admin.features.reorder') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ orders: orders })
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success && typeof window.dispatchEvent === 'function') {
                        window.dispatchEvent(new CustomEvent('notify', {
                            detail: { type: 'success', title: 'Berhasil', text: 'Urutan keunggulan berhasil diperbarui', duration: 3000 }
                        }));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }
    });
}

initSortableFeature();
document.addEventListener('DOMContentLoaded', initSortableFeature);
window.addEventListener('load', initSortableFeature);

    // SweetAlert2 untuk Konfirmasi Hapus
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                nama_keunggulan: 'Hapus Fitur?',
                text: "Fitur ini akan dihapus secara permanen dan tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                width: '24rem',
                padding: '1.5rem',
                buttonsStyling: false,
                customClass: {
                    popup: '!rounded-2xl !shadow-2xl !border !border-gray-100',
                    nama_keunggulan: '!text-xl !font-extrabold font-heading !text-gray-900 !pt-2',
                    htmlContainer: '!text-sm !text-gray-500 !mt-2',
                    icon: '!scale-75 !mt-0 !mb-2 !border-amber-400 !text-amber-500',
                    actions: '!mt-6 !w-full !flex !justify-center !gap-3',
                    confirmButton: '!bg-red-500 hover:!bg-red-600 !text-white !rounded-xl !text-sm !font-bold !px-8 !py-2.5 !transition-all !duration-100 !shadow-sm hover:!shadow-md transform hover:!-translate-y-0.5',
                    cancelButton: '!bg-gray-100 hover:!bg-gray-200 !text-gray-700 !rounded-xl !text-sm !font-bold !px-8 !py-2.5 !transition-all !duration-100'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>
@endpush
@endsection
