@extends('layouts.admin')

@section('title', 'Detail Profil Wali Murid')

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('admin.parents.index') }}" class="text-gray-500 hover:text-primary-600 transition-colors font-medium">Data Wali Murid</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Profil Wali Murid</span>
@endsection

@section('content')
<div class="space-y-4 w-full">

    <!-- Action Bar -->
    <div class="mb-4">
        <x-admin.tajuk-halaman
            title="Detail Profil Wali Murid"
            backUrl="{{ route('admin.parents.index') }}"
        >
            <x-slot name="rightActions">
                <a href="{{ route('admin.parents.edit', ['parent' => $parent->id, 'from' => 'detail']) }}" class="w-full sm:w-auto px-4 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-xl font-bold text-sm hover:bg-primary-50 hover:text-primary-700 hover:border-primary-300 transition-colors shadow-sm flex items-center justify-center">
                    <svg class="w-4 h-4 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Edit Data
                </a>
                <form action="{{ route('admin.parents.destroy', $parent->id) }}" method="POST" id="deleteForm" class="w-full sm:w-auto">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full sm:w-auto px-4 py-2.5 bg-white border border-red-200 text-red-600 rounded-xl font-bold text-sm hover:bg-red-50 hover:border-red-300 transition-colors shadow-sm flex items-center justify-center">
                        <svg class="w-4 h-4 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Hapus
                    </button>
                </form>
            </x-slot>
        </x-admin.tajuk-halaman>
    </div>

    <!-- Top Banner: Hero Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-6 md:p-8">
        <div class="flex flex-col md:flex-row items-center md:items-center gap-6">
            <div class="flex-shrink-0">
                @if($parent->avatar)
                    <img src="{{ asset('storage/' . $parent->avatar) }}" alt="Avatar" class="w-16 h-16 md:w-20 md:h-20 rounded-full object-cover shadow-sm bg-gray-50 border border-gray-100">
                @else
                    <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-primary-50 border border-primary-100 flex items-center justify-center text-3xl font-extrabold text-primary-700 shadow-sm">
                        {{ substr($parent->name, 0, 1) }}
                    </div>
                @endif
            </div>

            <div class="flex-grow flex flex-col md:flex-row justify-between items-center md:items-center gap-4 w-full text-center md:text-left">
                <div class="flex flex-col justify-center">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900">{{ $parent->name }}</h2>
                    <p class="text-primary-600 font-semibold text-base mt-1">Status Hubungan: {{ optional($parent->parentProfile)->status_hubungan ?? 'Wali' }}</p>
                </div>

                <div class="flex-shrink-0 mt-2 md:mt-0">
                    <div class="bg-gradient-to-br from-primary-600 to-primary-800 rounded-2xl border border-primary-500 p-3 px-5 text-center min-w-[120px] shadow-sm text-white">
                        <div class="text-[10px] md:text-xs font-bold text-primary-100 mb-1 uppercase tracking-wider">Total Anak</div>
                        <div class="text-xl md:text-2xl font-extrabold text-white">{{ $parent->students->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

        <!-- Kolom Kiri: Daftar Anak -->
        <div class="lg:col-span-2 space-y-4">

            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden">
                <div class="p-5 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="text-lg font-bold text-primary-800">Daftar Anak</h3>
                </div>
                <div class="p-0">
                    @if($parent->students->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse text-sm">
                                <thead>
                                    <tr class="bg-gray-50/50 border-b border-primary-100/50">
                                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Anak</th>
                                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Sekolah & Kelas</th>
                                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Sisa Kuota</th>
                                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Status</th>
                                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($parent->students as $student)
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="px-6 py-4 align-middle">
                                                <div class="flex items-center">
                                                    <x-admin.avatar :name="$student->nama_murid" size="8" textSize="text-xs" />
                                                    <div class="ml-4">
                                                        <a href="{{ route('admin.students.show', $student->id) }}" class="font-bold text-gray-900 hover:text-primary-600 transition-colors">{{ $student->nama_murid }}</a>
                                                        <div class="text-xs text-gray-500 mt-1">{{ $student->panggilan_murid }} &bull; {{ $student->jenis_kelamin_murid }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 align-middle">
                                                <div class="text-sm font-semibold text-gray-900">{{ $student->sekolah }}</div>
                                                <div class="text-xs text-gray-500 mt-1">Kelas {{ $student->kelas }}</div>
                                            </td>
                                             <td class="px-6 py-4 align-middle text-center font-bold">
                                                <x-antarmuka.lencana :color="$student->kuota_belajar <= 0 ? 'danger' : 'primary'" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border whitespace-nowrap">
                                                    {{ $student->kuota_belajar ?? 0 }} Sesi
                                                </x-antarmuka.lencana>
                                            </td>
                                            <td class="px-6 py-4 align-middle text-center">
                                                @if($student->status_murid === 'active')
                                                    <x-antarmuka.lencana color="primary" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit whitespace-nowrap">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-primary-500 mr-1.5"></span> Aktif
                                                    </x-antarmuka.lencana>
                                                @else
                                                    <x-antarmuka.lencana color="gray" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit whitespace-nowrap">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-gray-400 mr-1.5"></span> Nonaktif
                                                    </x-antarmuka.lencana>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 align-middle text-center">
                                                <a href="{{ route('admin.students.show', $student->id) }}" class="inline-flex items-center justify-center p-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-lg hover:bg-gray-100 hover:text-primary-600 transition-colors" title="Lihat Profil Anak">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="p-12 text-center border-t border-dashed border-gray-100">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                <h3 class="text-lg font-bold text-gray-900 font-heading mb-1">Belum ada anak yang terdaftar</h3>
                                <p class="text-sm text-gray-500">Data anak akan muncul setelah ada pendaftaran yang disetujui.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>

        <!-- Kolom Kanan: Info Wali -->
        <div class="space-y-4">

            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5">
                <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-100 pb-3">Informasi Kontak & Alamat</h3>
                <div class="space-y-5">
                    <div>
                        <p class="block text-sm text-gray-600 font-semibold mb-1">Alamat Email</p>
                        <p class="font-semibold text-gray-900 text-sm">
                            <a href="mailto:{{ $parent->email }}" class="hover:text-primary-600 transition-colors">{{ $parent->email }}</a>
                        </p>
                    </div>
                    <div class="pt-4 border-t border-gray-100">
                        <p class="block text-sm text-gray-600 font-semibold mb-1">Nomor Telepon / WhatsApp Aktif</p>
                        <p class="font-semibold text-gray-900 text-sm">
                            @php
                                $wa_phone = preg_replace('/[^0-9]/', '', optional($parent->parentProfile)->no_telepon_orangtua ?? '');
                                if (str_starts_with($wa_phone, '0')) {
                                    $wa_phone = '62' . substr($wa_phone, 1);
                                }
                            @endphp
                            @if($wa_phone)
                            <a href="https://wa.me/{{ $wa_phone }}" target="_blank" class="hover:text-primary-600 transition-colors">{{ optional($parent->parentProfile)->no_telepon_orangtua }}</a>
                            @else
                            -
                            @endif
                        </p>
                    </div>
                    <div class="pt-4 border-t border-gray-100">
                        <p class="block text-sm text-gray-600 font-semibold mb-1">Alamat Lengkap</p>
                        <p class="font-semibold text-gray-900 text-sm leading-relaxed">{{ optional($parent->parentProfile)->alamat_domisili ?? '-' }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // SweetAlert2 untuk Konfirmasi Hapus
    const deleteForm = document.getElementById('deleteForm');
    if(deleteForm) {
        deleteForm.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Hapus Data Wali Murid?',
                text: "Semua data profil dan akses login wali murid ini akan terhapus permanen! Harap pastikan tidak ada data anak yang masih terikat.",
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
                    deleteForm.submit();
                }
            });
        });
    }
});
</script>
@endpush
@endsection
