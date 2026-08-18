@extends('layouts.admin')

@section('title', 'Repositori Materi')

@section('content')
<x-admin.tajuk-halaman
    title="Repositori Materi"
    description="Atur semua bahan ajar dari catatan sampai video dalam satu ruang terpadu."
    actionUrl="{{ route('admin.repository.create') }}"
    actionLabel="Tambah Materi"
    icon="add"
/>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 mb-6 mt-6">
    <div class="p-5 border-b border-gray-100 bg-gray-50/50">
        <h2 class="text-lg font-bold text-gray-800 flex items-center">
            <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
            Filter Pencarian
        </h2>
    </div>
    <div class="p-5">
        <form action="{{ route('admin.repository.index') }}" method="GET">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Kata Kunci</label>
                    <div class="relative">
                        <!-- Ikon Kaca Pembesar -->
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>

                        <!-- Input Field -->
                        <input type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari nama materi atau topik..."
                            class="w-full rounded-2xl py-3 pl-10 pr-4 border border-gray-200 bg-gray-50 text-sm font-medium text-gray-800 shadow-sm focus:bg-white focus:border-primary-400 focus:ring-2 focus:ring-primary-200 focus:outline-none transition-all duration-150">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Jenjang Kelas</label>
                    <select name="kelas_materi" class="w-full appearance-none rounded-2xl py-3 pl-4 pr-10 border border-gray-200 bg-gray-50 text-sm font-medium text-gray-800 shadow-sm focus:bg-white focus:border-primary-400 focus:ring-2 focus:ring-primary-200 focus:outline-none transition-all duration-150 cursor-pointer bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat">
                        <option value="">Semua Kelas</option>
                        @for($i=1; $i<=6; $i++)
                            <option value="{{ $i }}" {{ request('kelas_materi') == $i ? 'selected' : '' }}>Kelas {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Mata Pelajaran</label>
                    <select name="nama_mapel" class="w-full appearance-none rounded-2xl py-3 pl-4 pr-10 border border-gray-200 bg-gray-50 text-sm font-medium text-gray-800 shadow-sm focus:bg-white focus:border-primary-400 focus:ring-2 focus:ring-primary-200 focus:outline-none transition-all duration-150 cursor-pointer bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat">
                        <option value="">Semua Mapel</option>
                        @foreach($mapels as $m)
                            <option value="{{ $m }}" {{ request('nama_mapel') == $m ? 'selected' : '' }}>{{ $m }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Tipe Materi</label>
                    <select name="tipe_materi" class="w-full appearance-none rounded-2xl py-3 pl-4 pr-10 border border-gray-200 bg-gray-50 text-sm font-medium text-gray-800 shadow-sm focus:bg-white focus:border-primary-400 focus:ring-2 focus:ring-primary-200 focus:outline-none transition-all duration-150 cursor-pointer bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat">
                        <option value="">Semua Tipe</option>
                        <option value="Modul Teori" {{ request('tipe_materi') == 'Modul Teori' ? 'selected' : '' }}>Modul Teori</option>
                        <option value="Latihan Soal" {{ request('tipe_materi') == 'Latihan Soal' ? 'selected' : '' }}>Latihan Soal</option>
                        <option value="Kunci Jawaban" {{ request('tipe_materi') == 'Kunci Jawaban' ? 'selected' : '' }}>Kunci Jawaban</option>
                    </select>
                </div>
            </div>

            <div class="mt-4 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">
                <a href="{{ route('admin.repository.index') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-xl hover:bg-gray-100 focus:outline-none">
                    Reset Filter
                </a>
                <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-white transition-all duration-100 bg-primary-600 border border-transparent rounded-xl hover:bg-primary-700 shadow-sm focus:outline-none">
                    Terapkan Filter
                </button>
            </div>
        </form>
    </div>
</div>



<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Judul & Topik</th>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Jenjang & Mapel</th>
                    <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Sumber Tautan</th>
                    <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Hak Akses</th>
                    <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Klik</th>
                    <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($materials as $material)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="text-sm font-bold text-gray-900">{{ $material->nama_materi }}</div>
                        <div class="text-xs text-gray-500 mt-1 flex items-center gap-1">
                            <x-antarmuka.lencana color="gray" class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold border w-fit">
                                {{ $material->tipe_materi }}
                            </x-antarmuka.lencana>
                            @if($material->topik_bab)
                            <span>&bull;</span>
                            <span>Bab: {{ $material->topik_bab }}</span>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-semibold text-gray-900">Kelas {{ $material->kelas_materi }}</div>
                        <div class="text-xs text-primary-600 mt-1">{{ $material->nama_mapel }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ $material->url_tautan }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-medium {{ $material->sumber_tautan == 'YouTube' ? 'bg-red-50 text-red-700 hover:bg-red-100' : ($material->sumber_tautan == 'Google Drive' ? 'bg-blue-50 text-blue-700 hover:bg-blue-100' : 'bg-gray-100 text-gray-700 hover:bg-gray-200') }} transition-colors">
                            @if($material->sumber_tautan == 'YouTube')
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            @elseif($material->sumber_tautan == 'Google Drive')
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 512 512"><path d="M339 314.9L175.4 32h163.7L512 314.9H339zM151.7 73.1L0 338.4l81.9 141.6 151.7-265.3L151.7 73.1zm115.9 297.3H16.4l81.9 141.6h331.6l81.9-141.6H267.6z"/></svg>
                            @else
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" /></svg>
                            @endif
                            Buka Tautan
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="text-xs font-semibold flex items-center justify-start gap-1 {{ $material->hak_akses == 'Publik' ? 'text-gray-600' : ($material->hak_akses == 'Murid' ? 'text-blue-600' : 'text-red-600') }}">
                            @if($material->hak_akses == 'Publik')
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            @elseif($material->hak_akses == 'Murid')
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                            @else
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                            @endif
                            {{ $material->hak_akses == 'Murid' ? 'Murid' : ($material->hak_akses == 'Mentor' ? 'Mentor' : 'Publik') }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        @if($material->status_materi)
                            <x-antarmuka.lencana color="primary" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit">
                                Tayang
                            </x-antarmuka.lencana>
                        @else
                            <x-antarmuka.lencana color="gray" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit">
                                Draft
                            </x-antarmuka.lencana>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <span class="text-sm font-semibold text-gray-900">{{ $material->jumlah_klik }}</span>
                        <span class="text-xs text-gray-500 mt-1 block">Klik</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('admin.repository.edit', $material->id) }}" class="inline-flex items-center p-1.5 text-gray-500 bg-gray-50 rounded-lg hover:bg-primary-50 hover:text-primary-600 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                            <x-admin.formulir-hapus :route="route('admin.repository.destroy', $material->id)" />
                        </div>
                        <div class="text-[10px] text-gray-500 mt-0.5">Oleh: {{ $material->uploader->name ?? 'Sistem' }}</div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12">
                        <x-admin.keadaan-kosong
                            icon="document-text"
                            title="Materi Tidak Ditemukan"
                            message="Belum ada materi belajar yang diunggah atau tidak ada data yang cocok dengan filter Anda."
                        />
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
        {{ $materials->links() }}
    </div>
</div>
@endsection
