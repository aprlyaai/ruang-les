@extends('layouts.admin')

@section('title', 'Presensi')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Presensi</span>
@endsection

@section('content')
<div class="space-y-6">
    <x-admin.tajuk-halaman
        title="Daftar Presensi"
        description="Lacak dan kelola riwayat kehadiran secara menyeluruh."
    />



<!-- Advanced Filter Panel -->
<x-admin.filter-akademik
    actionUrl="{{ route('admin.attendances.index') }}"
    resetUrl="{{ route('admin.attendances.index') }}"
    :filterPackages="$filterPackages"
    :filterClasses="$filterClasses"
    :filterStudents="$filterStudents"
    :filterMentors="$filterMentors"
/>

<!-- Master Log Table -->
<div x-data="{
    showEditModal: false,
    editData: { id: '', studentName: '', date: '', status: '', notes: '', actionUrl: '' }
}"
@open-edit-modal.window="
    editData = $event.detail;
    showEditModal = true;
"
class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
        <h2 class="text-lg font-bold text-gray-800">Semua Presensi</h2>
        <x-antarmuka.lencana color="primary" class="whitespace-nowrap">{{ $attendances->total() }} Data Tersedia</x-antarmuka.lencana>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm min-w-[700px]">
            <thead>
                <tr class="bg-gray-50/50 border-b border-primary-100/50">
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Paket Program</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Jadwal Kelas</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal & Waktu</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Murid</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Presensi</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Mentor</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($attendances as $log)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-4 py-3 align-middle">
                        @if(isset($log->schedule->package))
                            <span class="text-sm font-semibold text-gray-900">{{ $log->schedule->package->nama_program }}</span>
                        @else
                            <span class="text-sm italic text-gray-500">Tanpa Paket</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 align-middle">
                        <p class="text-sm font-semibold text-gray-900">{{ $log->schedule->nama_kelas ?? 'Kelas Terhapus' }}</p>
                        <p class="text-xs text-gray-500 mt-1">{{ $log->schedule->hari ?? '-' }}, {{ $log->schedule->formatted_time_range ?? '-' }}</p>
                    </td>
                    <td class="px-4 py-3 align-middle">
                        <div class="flex flex-col gap-1">
                            <p class="text-sm font-semibold text-gray-900 whitespace-nowrap" title="Tanggal Pertemuan Kelas">
                                <span class="text-[10px] uppercase text-gray-500 font-bold block mb-0.5">Pertemuan:</span>
                                {{ \Carbon\Carbon::parse($log->tanggal_presensi)->format('d M Y') }}
                            </p>
                            <p class="text-xs text-gray-500 whitespace-nowrap" title="Waktu Input Data oleh Mentor">
                                <span class="text-[10px] uppercase text-gray-500 font-bold">Input:</span>
                                {{ $log->created_at->format('d M, H:i') }}
                            </p>
                        </div>
                    </td>
                    <td class="px-4 py-3 align-middle">
                        <p class="text-sm font-bold text-gray-900 whitespace-nowrap">{{ $log->student->nama_murid ?? 'Murid Terhapus' }}</p>
                        <a href="{{ route('admin.attendances.student', $log->murid_id) }}" class="inline-flex items-center mt-1.5 text-[11px] font-bold text-primary-600 hover:text-primary-800 bg-primary-50 hover:bg-primary-100 border border-primary-100 px-2 py-0.5 rounded transition-colors whitespace-nowrap">
                            <svg class="w-3 h-3 mr-1 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                            Buku Presensi
                        </a>
                    </td>
                    <td class="px-4 py-3 align-middle">
                    @if($log->status_presensi === 'hadir')
                        <x-antarmuka.lencana color="primary" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit whitespace-nowrap">
                            Hadir
                        </x-antarmuka.lencana>
                    @elseif($log->status_presensi === 'tidak_hadir')
                        <x-antarmuka.lencana color="danger" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit whitespace-nowrap">
                            Tidak Hadir
                        </x-antarmuka.lencana>
                    @else
                        <x-antarmuka.lencana color="warning" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit whitespace-nowrap">
                            Libur
                        </x-antarmuka.lencana>
                    @endif
                    </td>
                    <td class="text-sm font-semibold text-gray-900">{{ $log->creator->name ?? 'Sistem' }}</td>
                    <td class="px-4 py-3 align-middle text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button @click.prevent="$dispatch('open-edit-modal', {
                                id: {{ $log->id }},
                                studentName: '{{ addslashes($log->student->nama_murid) }}',
                                date: '{{ \Carbon\Carbon::parse($log->tanggal_presensi)->format('d M Y') }}',
                                status: '{{ $log->status_presensi }}',
                                notes: '{{ addslashes($log->notes_presensi ?? '') }}',
                                actionUrl: '{{ route('admin.attendances.update', $log->id) }}'
                            })" class="inline-flex items-center justify-center px-3 py-1.5 min-h-[25px] min-w-[25px] text-xs font-bold text-gray-600 bg-white border border-gray-200 transition-all duration-100 rounded-lg hover:bg-primary-50 hover:text-primary-600 hover:border-primary-200 shadow-sm" title="Koreksi">
                                Koreksi
                            </button>
                            <x-admin.formulir-hapus
                                :route="route('admin.attendances.destroy', $log->id)"
                            />
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 align-middle">
                        <x-admin.keadaan-kosong
                            title="Data Presensi Tidak Ditemukan"
                            message="Tidak ada data presensi yang sesuai dengan filter Anda. Coba sesuaikan rentang tanggal atau atur ulang filter."
                        />
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="p-4 border-t border-gray-100 bg-white">
        {{ $attendances->appends(request()->query())->links() }}
    </div>

    <!-- Modal Edit Presensi Tunggal (Alpine Style) -->
    <template x-teleport="body">
        <div x-cloak x-show="showEditModal" class="fixed inset-0 z-[9999] overflow-y-auto text-left" style="display: none;">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="showEditModal" x-transition.opacity class="fixed inset-0 transition-opacity" aria-hidden="true" style="display: none;">
                    <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm z-0"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div x-show="showEditModal"
                    @click.away="showEditModal = false"
                    x-transition:enter="ease-out duration-100"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full relative z-10">

                    <form :action="editData.actionUrl" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6">
                            <h3 class="text-xl leading-6 font-bold text-gray-900 mb-2 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                Koreksi Presensi
                            </h3>
                            <p class="text-sm text-gray-500 mb-5">Ubah status kehadiran atau tambahkan keterangan untuk presensi ini.</p>

                            <div class="bg-primary-50/50 p-4 rounded-xl border border-primary-100/50 mb-5">
                                <p class="text-[10px] text-primary-600 font-bold mb-1 uppercase tracking-wider">Data Murid</p>
                                <p class="font-bold text-gray-900" x-text="editData.studentName"></p>
                                <p class="text-sm text-gray-900 mt-1">Tanggal: <span x-text="editData.date"></span></p>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-600 mb-2">Ubah Status Kehadiran</label>
                                    <select name="status" x-model="editData.status" class="block w-full appearance-none rounded-2xl p-3 pr-10 border border-gray-200 shadow-sm focus:outline-none focus:border-primary-400 focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer">
                                        <option value="hadir">Hadir</option>
                                        <option value="tidak_hadir">Tidak Hadir</option>
                                        <option value="libur">Libur</option>
                                    </select>
                                    <div class="mt-2 flex items-start">
                                        <svg class="w-4 h-4 text-amber-500 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <p class="text-xs text-gray-500">
                                            Perhatian: Kuota sisa belajar anak akan dihitung ulang secara otomatis jika Anda mengubah status ini dari atau ke 'Hadir'.
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-600 mb-2">Keterangan Tambahan <span class="text-gray-400 font-normal">(Opsional)</span></label>
                                    <textarea name="notes" x-model="editData.notes" rows="2" class="block w-full border border-gray-200 rounded-2xl shadow-sm focus:outline-none focus:border-primary-400 focus:ring-2 focus:ring-primary-200 text-sm font-medium text-gray-800 p-3 transition-colors duration-100" placeholder="Contoh: Sakit demam, izin keluar kota, dll"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 flex flex-col-reverse sm:flex-row sm:justify-end gap-3 border-t border-gray-100">
                            <button type="button" @click="showEditModal = false" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-xl hover:bg-gray-100 focus:outline-none">
                                Batal
                            </button>
                            <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-white transition-all duration-100 bg-primary-600 border border-transparent rounded-xl hover:bg-primary-700 shadow-sm focus:outline-none">
                                Koreksi & Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </template>
</div>

@endsection
