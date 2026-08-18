@extends('layouts.admin')

@section('title', 'Detail Presensi Murid')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('admin.attendances.index') }}?tab=tab-siswa" class="hover:text-primary-600 transition-colors">Presensi</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Detail Presensi</span>
@endsection

@section('content')
    <div class="mb-6">
        <x-admin.tajuk-halaman
            title="Detail Presensi Murid"
            backUrl="{{ route('admin.attendances.index') }}?tab=tab-siswa"
        />
    </div>

    <!-- Top Banner: Hero Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-6 md:p-8 relative overflow-hidden mb-6">

        <div class="flex flex-col md:flex-row items-center md:items-start gap-6 relative z-10">
            <!-- 1. Avatar -->
            <div class="flex-shrink-0">
                <div class="w-20 h-20 md:w-24 md:h-24 rounded-full bg-primary-50 border border-primary-100 flex items-center justify-center text-4xl font-extrabold text-primary-700 shadow-sm">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
            </div>

            <div class="flex-grow text-center md:text-left w-full">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">

                    <!-- 2. Teks -->
                    <div>
                        <h2 class="text-2xl md:text-3xl font-extrabold text-primary-600">{{ $student->nama_murid }}</h2>
                        <p class="text-gray-900 font-semibold text-base mt-1">{{ $student->sekolah ?? 'Sekolah Tidak Diketahui' }}</p>
                    </div>

                    <!-- 3. Badge Kuota -->
                    <div>
                        <x-antarmuka.lencana color="primary" class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold {{ $student->kuota_belajar <= 0 ? ' ' : ' ' }} border w-fit">
                            Sisa Kuota: {{ $student->kuota_belajar }} Sesi
                        </x-antarmuka.lencana>
                    </div>
                </div>

                <!-- 4. Label Kelas -->
                <div class="mt-4 flex flex-col justify-center md:justify-start gap-2 border-t border-gray-100 pt-4">
                    <div class="inline-flex items-center justify-center md:justify-start text-sm font-medium text-gray-600 w-full md:w-auto">
                        <span class="text-sm font-semibold text-gray-600 mr-2">Tingkat Kelas:</span>
                        <x-antarmuka.lencana color="gray" class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-bold border tracking-wide uppercase">
                            KELAS {{ $student->kelas ?? '-' }} SD
                        </x-antarmuka.lencana>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div x-data="{
    showEditModal: false,
    editData: {
        id: '',
        studentName: '',
        date: '',
        status: '',
        notes: '',
        actionUrl: ''
    }
}"
@open-edit-modal.window="
    editData = $event.detail;
    showEditModal = true;
"
class="space-y-8">
    @forelse($attendances->groupBy(function($q) { return $q->schedule->package->nama_program ?? 'Tanpa Paket'; }) as $package => $packageAtts)
        <div>
            <h3 class="text-xl font-bold text-gray-800 mb-4">{{ $package }}</h3>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach($packageAtts->groupBy('jadwal_id') as $scheduleId => $scheduleAtts)
                    @php $schedule = $scheduleAtts->first()->schedule; @endphp
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <!-- Header Kelas -->
                        <div class="p-4 border-b border-gray-100 bg-gray-50/50 flex flex-col gap-1">
                            <h4 class="font-bold text-gray-800">{{ $schedule->nama_kelas ?? 'Kelas Terhapus' }}</h4>
                            <p class="text-xs text-gray-500 font-semibold">{{ $schedule->hari ?? '-' }}, {{ $schedule->formatted_time_range ?? '-' }}</p>
                            <p class="text-xs text-gray-500 font-medium mt-1">Mentor: <span class="font-bold text-gray-700">{{ $schedule->mentor->name ?? '-' }}</span></p>
                        </div>

                        <!-- Timeline -->
                        <div class="p-6">
                            <div class="relative border-l-2 border-gray-100 ml-2 space-y-6">
                                @foreach($scheduleAtts as $att)
                                    <div class="relative pl-6">
                                        <!-- Timeline Dot -->
                                        <div class="absolute -left-[5px] top-1.5 w-2 h-2 rounded-full ring-4 ring-white
                                            {{ $att->status_presensi === 'hadir' ? 'bg-primary-500' : ($att->status_presensi === 'tidak_hadir' ? 'bg-red-500' : 'bg-yellow-500') }}">
                                        </div>

                                        <!-- Content -->
                                        <div class="flex items-start justify-between gap-4">
                                            <div>
                                                <p class="text-sm font-bold text-gray-900" title="Tanggal Pertemuan Kelas">{{ \Carbon\Carbon::parse($att->tanggal_presensi)->format('d M Y') }}</p>
                                                <p class="text-[10px] text-gray-500 mt-0.5 uppercase font-bold" title="Waktu Input Data">Input: {{ $att->created_at->format('d M, H:i') }} WIB</p>
                                                @if($att->notes_presensi)
                                                    <p class="text-xs text-gray-600 mt-2 italic bg-gray-50 p-2 rounded-lg border border-gray-100 inline-block">"{{ $att->notes_presensi }}"</p>
                                                @endif
                                            </div>

                                            <!-- Badge & Action -->
                                            <div class="flex items-center gap-2">
                                                @if($att->status_presensi === 'hadir')
                                                    <x-antarmuka.lencana color="primary" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold border">Hadir</x-antarmuka.lencana>
                                                @elseif($att->status_presensi === 'tidak_hadir')
                                                    <x-antarmuka.lencana color="danger" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold border">Tidak Hadir</x-antarmuka.lencana>
                                                @else
                                                    <x-antarmuka.lencana color="warning" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold border">Libur</x-antarmuka.lencana>
                                                @endif

                                                <button @click.prevent="$dispatch('open-edit-modal', {
                                                    id: {{ $att->id }},
                                                    studentName: '{{ addslashes($student->nama_murid) }}',
                                                    date: '{{ \Carbon\Carbon::parse($att->tanggal_presensi)->format('d M Y') }}',
                                                    status: '{{ $att->status_presensi }}',
                                                    notes: '{{ addslashes($att->notes_presensi ?? '') }}',
                                                    actionUrl: '{{ route('admin.attendances.update', $att->id) }}'
                                                })" class="inline-flex items-center p-2 text-gray-500 bg-gray-50 rounded-lg hover:bg-primary-50 hover:text-primary-600 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500" title="Koreksi">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </button>

                                                <x-admin.formulir-hapus
                                                    :route="route('admin.attendances.destroy', $att->id)"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-12">
            <x-admin.keadaan-kosong
                icon="users"
                title="Belum ada Riwayat"
                message="Murid belum memiliki kehadiran di kelas manapun."
            />
        </div>
    @endforelse

    <!-- Modal Edit Presensi (Alpine Style) -->
    <template x-teleport="body">
        <div x-show="showEditModal" class="fixed inset-0 z-[9999] overflow-y-auto text-left" style="display: none;">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="showEditModal" x-transition.opacity class="fixed inset-0 transition-opacity" aria-hidden="true">
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
                                    <textarea name="notes" rows="2" x-model="editData.notes" class="block w-full border border-gray-200 rounded-2xl shadow-sm focus:outline-none focus:border-primary-400 focus:ring-2 focus:ring-primary-200 text-sm font-medium text-gray-800 p-3 transition-colors duration-100" placeholder="Contoh: Sakit demam, izin keluar kota, dll"></textarea>
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



<script>
    function toggleModal(modalID) {
        document.getElementById(modalID).classList.toggle('hidden');
    }
</script>
@endsection
