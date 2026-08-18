@extends('layouts.admin')

@section('title', 'Data Murid')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Data Murid</span>
@endsection

@section('content')
<div class="space-y-6">

    <x-admin.tajuk-halaman
        title="Daftar Murid Ruang Les"
        description="Pantau dan kelola data seluruh murid yang mempercayakan proses belajarnya di Ruang Les."
        actionUrl="{{ route('admin.students.create') }}"
        actionLabel="Tambah Murid"
    />



    <!-- Table Section with Search & Filter -->
    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden" x-data="{ search: '', filter: 'all' }">

        <!-- Toolbar -->
        <div class="p-4 border-b border-gray-100 bg-gray-50/50 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="relative w-full md:max-w-md">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input x-model="search" type="text" placeholder="Cari nama murid atau asal sekolah..." class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-xl leading-5 bg-white placeholder-gray-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-primary-200 focus:border-primary-400 sm:text-sm transition-colors duration-100">
                <button x-show="search.length > 0" @click="search = ''" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div class="w-full md:w-auto flex items-center space-x-2">
                <label class="text-sm font-semibold text-gray-900 whitespace-nowrap">Filter Status:</label>
                <select x-model="filter" class="block w-full md:w-48 pl-3 pr-10 py-2 text-sm font-medium text-gray-700 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 bg-white transition-colors shadow-sm appearance-none bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_0.75rem_center] bg-no-repeat cursor-pointer">
                    <option value="all">Semua Status</option>
                    <option value="active">Aktif</option>
                    <option value="inactive">Nonaktif</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-primary-100/50">
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Murid</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Sekolah & Kelas</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Wali Murid</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($students as $student)
                        <tr class="hover:bg-gray-50 transition-colors" x-show="(filter === 'all' || filter === '{{ $student->status_murid }}') && (search === '' || @js(strtolower($student->nama_murid ?? '')).includes(search.toLowerCase()) || @js(strtolower($student->sekolah ?? '')).includes(search.toLowerCase()))" x-transition>
                            <td class="px-4 py-3 align-middle">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <x-admin.avatar :name="$student->nama_murid" />
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-bold text-gray-900 flex items-center">
                                            {{ $student->nama_murid }}
                                            @if($student->status_murid === 'active')
                                                <x-antarmuka.lencana color="primary" class="ml-2 inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold border w-fit">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-primary-500 mr-1.5"></x-antarmuka.lencana> Aktif
                                                </span>
                                            @else
                                                <x-antarmuka.lencana color="gray" class="ml-2 inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold border w-fit">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-gray-400 mr-1.5"></x-antarmuka.lencana> Nonaktif
                                                </span>
                                            @endif
                                        </div>
                                        <div class="text-xs text-gray-500 mt-1">{{ $student->panggilan_murid }} &bull; {{ $student->jenis_kelamin_murid }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="text-sm font-semibold text-gray-900">{{ $student->sekolah }}</div>
                                <div class="text-xs text-gray-500 mt-1">Kelas {{ $student->kelas }}</div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    <a href="{{ route('admin.parents.show', $student->parent?->user_id) }}" class="text-sm font-semibold text-primary-600 hover:text-primary-800 transition-colors">
                                        {{ optional($student->parent)->name ?? 'Tidak Ada' }}
                                    </a>
                                </div>
                            </td>
                            <td class="px-4 py-3 align-middle text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('admin.students.show', $student->id) }}" class="inline-flex items-center p-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-lg hover:bg-gray-100 hover:text-primary-600 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500" title="Lihat Profil">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </a>
                                    <a href="{{ route('admin.students.edit', $student->id) }}" class="inline-flex items-center p-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-lg hover:bg-gray-100 hover:text-primary-600 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <x-admin.formulir-hapus :route="route('admin.students.destroy', $student->id)" :item-name="$student->user->name" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 align-middle">
                                <x-admin.keadaan-kosong
                                    title="Belum Ada Data Murid"
                                    message="Saat ini belum ada murid yang bergabung di Ruang Les."
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
document.addEventListener('DOMContentLoaded', function() {
    const deleteForms = document.querySelectorAll('.delete-form');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            let itemName = this.getAttribute('data-name') || 'ini';
            Swal.fire({
                title: 'Hapus Data Murid?',
                text: "Seluruh data profil, histori kelas, dan catatan perkembangan murid " + itemName + " ini akan terhapus secara permanen dan tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                width: '24rem',
                padding: '1.5rem',
                buttonsStyling: false,
                customClass: {
                    popup: '!rounded-2xl !shadow-2xl !border !border-gray-100',
                    title: '!text-xl !font-extrabold font-heading !text-gray-900 !pt-2',
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
