@extends('layouts.admin')

@section('title', 'Nilai')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Nilai</span>
@endsection

@section('content')
<div class="space-y-6">
    <x-admin.tajuk-halaman
        title="Daftar Nilai"
        description="Lihat rekam jejak nilai dan pantau terus progres belajar murid secara mendetail."
    />

<!-- Advanced Filter Panel -->
<x-admin.filter-akademik
    actionUrl="{{ route('admin.scores.index') }}"
    resetUrl="{{ route('admin.scores.index') }}"
    :filterPackages="$filterPackages"
    :filterClasses="$filterClasses"
    :filterStudents="$filterStudents"
    :filterMentors="$filterMentors"
/>

<!-- Master Log Table -->
<div x-data="{
    showEditModal: false,
    editData: {
        id: '',
        studentName: '',
        date: '',
        tipe_nilai: '',
        custom_assessment_type: '',
        materi_nilai: '',
        skor_nilai: '',
        notes_nilai: '',
        actionUrl: ''
    },
    touched: { materi_nilai: false, skor_nilai: false },
    submitForm(e) {
        this.touched.materi_nilai = true;
        this.touched.skor_nilai = true;
        if (this.editData.materi_nilai.trim() === '' || this.editData.skor_nilai.toString().trim() === '') {
            e.preventDefault();
        }
    },
    resetForm() {
        this.touched = { materi_nilai: false, skor_nilai: false };
    }
}"
@open-edit-modal.window="
    editData = { ...$event.detail };
    let standardTypes = ['Pre-test', 'Post-test', 'Latihan Soal', 'Kuis', 'Ujian', 'Tugas', 'Games'];
    if (!standardTypes.includes(editData.tipe_nilai)) {
        editData.custom_assessment_type = editData.tipe_nilai;
        editData.tipe_nilai = 'Lainnya...';
    } else {
        editData.custom_assessment_type = editData.tipe_nilai;
    }
    showEditModal = true;
"
class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
        <h2 class="text-lg font-bold text-gray-800">Semua Nilai</h2>
        <x-antarmuka.lencana color="primary" class="whitespace-nowrap">{{ $scores->total() }} Data Tersedia</x-antarmuka.lencana>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm min-w-[700px]">
            <thead>
                <tr class="bg-gray-50/50 border-b border-primary-100/50">
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Paket Program</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Jadwal Kelas</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal & Waktu</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Murid</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Topik Penilaian</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Skor</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Mentor</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($scores as $skor_nilai)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-4 py-3 align-middle">
                        @if(isset($skor_nilai->schedule->package))
                            <span class="text-sm font-semibold text-gray-900">{{ $skor_nilai->schedule->package->nama_program }}</span>
                        @else
                            <span class="text-sm italic text-gray-500">Tanpa Paket</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 align-middle">
                        <p class="text-sm font-semibold text-gray-900">{{ $skor_nilai->schedule->nama_kelas ?? 'Kelas Terhapus' }}</p>
                        <p class="text-xs text-gray-500 mt-1">{{ $skor_nilai->schedule->hari ?? '-' }}, {{ $skor_nilai->schedule->formatted_time_range ?? '-' }}</p>
                    </td>
                    <td class="px-4 py-3 align-middle">
                        <div class="flex flex-col gap-1">
                            <p class="text-sm font-semibold text-gray-900 whitespace-nowrap" title="Tanggal Pertemuan Kelas">
                                <span class="text-[10px] uppercase text-gray-500 font-bold block mb-0.5">Pertemuan:</span>
                                {{ \Carbon\Carbon::parse($skor_nilai->tanggal_penilaian)->format('d M Y') }}
                            </p>
                            <p class="text-xs text-gray-500 whitespace-nowrap" title="Waktu Input Data oleh Mentor">
                                <span class="text-[10px] uppercase text-gray-500 font-bold">Input:</span>
                                {{ $skor_nilai->created_at->format('d M, H:i') }}
                            </p>
                        </div>
                    </td>
                    <td class="px-4 py-3 align-middle">
                        <p class="text-sm font-bold text-gray-900 whitespace-nowrap">{{ $skor_nilai->student->nama_murid ?? 'Murid Terhapus' }}</p>
                        <a href="{{ route('admin.scores.show', $skor_nilai->murid_id) }}" class="inline-flex items-center mt-1.5 text-[11px] font-bold text-primary-600 hover:text-primary-800 bg-primary-50 hover:bg-primary-100 border border-primary-100 px-2 py-0.5 rounded transition-colors whitespace-nowrap">
                            <svg class="w-3 h-3 mr-1 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            Buku Nilai
                        </a>
                    </td>
                    <td class="px-4 py-3 align-middle">
                        <div class="flex items-center gap-2 mb-1">
                            <x-antarmuka.lencana color="primary" class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold border whitespace-nowrap">
                                {{ $skor_nilai->tipe_nilai }}
                            </x-antarmuka.lencana>
                        </div>
                        <p class="text-sm font-semibold text-gray-900" title="{{ $skor_nilai->materi_nilai }}">{{ $skor_nilai->materi_nilai }}</p>
                    </td>
                    <td class="px-4 py-3 align-middle text-center">
                        <div class="inline-flex items-center justify-center w-10 h-10 rounded-full shrink-0 {{ $skor_nilai->skor_nilai >= 80 ? 'bg-primary-50 text-primary-600' : ($skor_nilai->skor_nilai >= 60 ? 'bg-yellow-50 text-yellow-600' : 'bg-red-50 text-red-600') }}">
                            <span class="text-base font-black leading-none">{{ $skor_nilai->skor_nilai }}</span>
                        </div>
                    </td>
                    <td class="px-4 py-3 align-middle">
                        <p class="text-sm font-semibold text-gray-900">{{ $skor_nilai->schedule->mentor->name ?? 'Sistem' }}</p>
                    </td>
                    <td class="px-4 py-3 align-middle text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button @click.prevent="$dispatch('open-edit-modal', {
                                id: {{ $skor_nilai->id }},
                                studentName: '{{ addslashes($skor_nilai->student->nama_murid) }}',
                                date: '{{ $skor_nilai->tanggal_penilaian }}',
                                tipe_nilai: '{{ $skor_nilai->tipe_nilai }}',
                                materi_nilai: '{{ addslashes($skor_nilai->materi_nilai) }}',
                                skor_nilai: '{{ $skor_nilai->skor_nilai }}',
                                notes_nilai: '{{ addslashes($skor_nilai->notes_nilai) }}',
                                actionUrl: '{{ route('admin.scores.update', $skor_nilai->id) }}'
                            })" class="inline-flex items-center justify-center px-3 py-1.5 min-h-[25px] min-w-[25px] text-xs font-bold text-gray-600 bg-white border border-gray-200 transition-all duration-100 rounded-lg hover:bg-primary-50 hover:text-primary-600 hover:border-primary-200 shadow-sm" title="Koreksi">
                                Koreksi
                            </button>
                            <x-admin.formulir-hapus
                                :route="route('admin.scores.destroy', $skor_nilai->id)"
                            />
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-6 py-12 align-middle">
                        <x-admin.keadaan-kosong
                            icon="document-text"
                            title="Data Nilai Tidak Ditemukan"
                            message="Tidak ada data nilai yang sesuai dengan filter Anda. Coba sesuaikan rentang tanggal atau atur ulang filter."
                        />
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($scores->hasPages())
    <div class="p-4 border-t border-gray-100 bg-gray-50/50">
        {{ $scores->appends(request()->query())->links() }}
    </div>
    @endif

    <!-- Modal Edit (Alpine Style) -->
    <template x-teleport="body">
        <div x-cloak x-show="showEditModal" class="fixed inset-0 z-[9999] overflow-y-auto text-left" style="display: none;">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="showEditModal" x-transition.opacity class="fixed inset-0 transition-opacity" aria-hidden="true" style="display: none;">
                    <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm z-0"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div x-show="showEditModal"
                    @click.away="showEditModal = false; resetForm()"
                    x-transition:enter="ease-out duration-100"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full relative z-10">

                    <form :action="editData.actionUrl" method="POST" @submit="submitForm" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6">
                            <h3 class="text-xl leading-6 font-bold text-gray-900 mb-2 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                Koreksi Data Nilai
                            </h3>
                            <p class="text-sm text-gray-500 mb-5">Ubah catatan perkembangan atau tambahkan catatan untuk murid ini.</p>

                            <div class="bg-primary-50/50 p-4 rounded-xl border border-primary-100/50 mb-5">
                                <p class="text-[10px] text-primary-600 font-bold mb-1 uppercase tracking-wider">Data Murid</p>
                                <p class="font-bold text-gray-900" x-text="editData.studentName"></p>
                                <input type="date" name="tanggal_penilaian" x-model="editData.date" max="{{ date('Y-m-d') }}" class="mt-2 block w-full rounded-2xl p-3 border border-gray-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-600 mb-2">Tipe Penilaian <span class="text-red-500">*</span></label>
                                    <select x-model="editData.tipe_nilai" x-on:change="if(editData.tipe_nilai !== 'Lainnya...') { editData.custom_assessment_type = editData.tipe_nilai; }" class="block w-full appearance-none rounded-2xl p-3 pr-10 border border-gray-200 shadow-sm focus:outline-none focus:border-primary-400 focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer">
                                        <option value="Pre-test">Pre-test</option>
                                        <option value="Post-test">Post-test</option>
                                        <option value="Latihan Soal">Latihan Soal</option>
                                        <option value="Kuis">Kuis</option>
                                        <option value="Ujian">Ujian</option>
                                        <option value="Tugas">Tugas</option>
                                        <option value="Games">Games</option>
                                        <option value="Lainnya...">Lainnya...</option>
                                    </select>
                                    <input type="text" name="tipe_nilai" x-model="editData.custom_assessment_type" x-show="editData.tipe_nilai === 'Lainnya...'" placeholder="Ketik tipe penilaian..." class="mt-3 block w-full rounded-2xl p-3 border border-gray-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-600 mb-2">Materi / Topik Penilaian <span class="text-red-500">*</span></label>
                                        <input type="text" name="materi_nilai" x-model="editData.materi_nilai" @blur="touched.materi_nilai = true" :class="touched.materi_nilai && editData.materi_nilai.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 focus:ring-primary-200'" class="block w-full rounded-2xl p-3 border shadow-sm focus:outline-none focus:ring-2 transition-colors duration-100 text-sm font-medium text-gray-800">
                                        <p x-show="touched.materi_nilai && editData.materi_nilai.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            Materi / Topik wajib diisi.
                                        </p>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-600 mb-2">Skor Nilai (0-100) <span class="text-red-500">*</span></label>
                                        <input type="number" name="skor_nilai" min="0" max="100" x-model="editData.skor_nilai" @blur="touched.skor_nilai = true" :class="touched.skor_nilai && editData.skor_nilai.toString().trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 focus:ring-primary-200'" class="block w-full rounded-2xl p-3 border shadow-sm focus:outline-none focus:ring-2 transition-colors duration-100 text-sm font-medium text-gray-800">
                                        <p x-show="touched.skor_nilai && editData.skor_nilai.toString().trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                Nilai wajib diisi.
                                        </p>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-600 mb-2">Catatan Khusus <span class="text-gray-400 font-normal">(Opsional)</span></label>
                                    <textarea name="notes_nilai" rows="3" x-model="editData.notes_nilai" class="block w-full border-gray-200 rounded-2xl shadow-sm focus:outline-none focus:ring-2 focus:border-primary-400 focus:ring-primary-200 text-sm font-medium text-gray-800 p-3 transition-colors duration-100"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 flex flex-col-reverse sm:flex-row sm:justify-end gap-3 border-t border-gray-100">
                            <button type="button" @click="showEditModal = false; resetForm()" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-xl hover:bg-gray-100 focus:outline-none">
                                Batal
                            </button>
                            <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-white transition-all duration-100 bg-primary-600 border border-transparent rounded-xl hover:bg-primary-700 shadow-sm focus:outline-none">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </template>
</div>
</div>
@endsection
