@extends('layouts.admin')

@section('title', 'Pusat Pengumuman')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Pengumuman</span>
@endsection

@section('content')
<div class="space-y-6">



    <x-admin.tajuk-halaman
        title="Pusat Pengumuman (Broadcast)"
        description="Sampaikan pesan atau pengumuman penting ke semua pengguna dalam satu waktu."
        actionUrl="{{ route('admin.announcements.create') }}"
        actionLabel="Buat Pengumuman Baru"
        icon="megaphone"

    />

    <!-- Table Section -->
    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden" x-data="{ search: '', filter: 'all' }">

        <!-- Toolbar (Search & Filter) -->
        <div class="p-4 border-b border-gray-100 bg-gray-50/50 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="relative w-full md:max-w-md">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input x-model="search" type="text" placeholder="Cari judul atau isi pengumuman..." class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-xl leading-5 bg-white placeholder-gray-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-primary-200 focus:border-primary-400 sm:text-sm transition-colors duration-100">
                <button x-show="search.length > 0" @click="search = ''" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <div class="w-full md:w-auto flex items-center space-x-2">
                <label class="text-sm font-semibold text-gray-900 whitespace-nowrap">Filter Status:</label>
                <select x-model="filter" class="block w-full md:w-48 pl-3 pr-10 py-2 text-sm font-medium text-gray-700 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 bg-white transition-colors shadow-sm appearance-none bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_0.75rem_center] bg-no-repeat cursor-pointer">
                    <option value="all">Semua Status</option>
                    <option value="1">Ditayangkan</option>
                    <option value="0">Diarsipkan</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-primary-100/50">
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Judul Pengumuman</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Isi Pengumuman</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Penerima</th>
                        <th class="px-4 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Status Publikasi</th>
                        <th class="px-4 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($announcements as $announcement)
                        <tr class="hover:bg-gray-50 transition-colors" data-id="{{ $announcement->id }}" x-show="(filter === 'all' || filter === '{{ $announcement->status_pengumuman ? '1' : '0' }}') && (search === '' || @js(strtolower($announcement->judul_pengumuman ?? '')).includes(search.toLowerCase()) || @js(strtolower(strip_tags($announcement->isi_pengumuman ?? ''))).includes(search.toLowerCase()))" x-transition>
                            <td class="px-4 py-3 align-middle whitespace-nowrap">
                                <div class="text-sm font-semibold text-gray-900">{{ $announcement->created_at->format('d M Y') }}</div>
                                <div class="text-xs text-gray-500 mt-1">{{ $announcement->created_at->format('H:i') }} WIB</div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="text-sm font-bold text-gray-900">{{ $announcement->judul_pengumuman }}</div>
                            </td>
                            <td class="px-4 py-4 align-middle">
                                <div class="text-sm text-gray-900 max-w-3xl leading-relaxed text-justify">{!! Str::limit(strip_tags($announcement->isi_pengumuman), 137) !!}</div>
                            </td>
                            <td class="px-4 py-3 align-middle whitespace-nowrap">
                                <x-antarmuka.lencana color="primary" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold w-fit border">
                                    {{ $announcement->target_audience }}
                                </x-antarmuka.lencana>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="space-y-3">
                                    <x-admin.sakelar-status
                                        :route="route('admin.announcements.toggle-status', $announcement->id)"
                                        :is-active="$announcement->status_pengumuman"
                                        field="status_pengumuman"
                                        label-active="Ditayangkan"
                                        label-inactive="Diarsipkan"
                                    />
                                    <x-admin.sakelar-status
                                        :route="route('admin.announcements.toggle-status', $announcement->id)"
                                        :is-active="$announcement->diprioritaskan"
                                        field="diprioritaskan"
                                        label-active="Disematkan"
                                        label-inactive="Disematkan"
                                        bg-active="bg-amber-400"
                                        text-active="text-amber-600"
                                    />
                                </div>
                            </td>
                            <td class="px-4 py-3 align-middle whitespace-nowrap text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('admin.announcements.edit', $announcement->id) }}" class="inline-flex items-center p-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-lg hover:bg-gray-100 hover:text-primary-600 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500" title="Edit">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <x-admin.formulir-hapus :route="route('admin.announcements.destroy', $announcement->id)" :item-name="$announcement->judul_pengumuman" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 align-middle">
                                <x-admin.keadaan-kosong
                                    title="Belum ada pengumuman"
                                    message="Yuk, buat pengumuman pertama untuk membagikan informasi kepada Ruang Les."
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </x-admin.keadaan-kosong>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
