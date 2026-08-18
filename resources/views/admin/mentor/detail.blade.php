@extends('layouts.admin')

@section('title', 'Profil Mentor: ' . $mentor->name)

@section('breadcrumbs')
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="{{ route('admin.mentor.index') }}" class="hover:text-primary-600 transition-colors">Data Mentor</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Profil Mentor</span>
@endsection

@section('content')
<div class="space-y-4 w-full">

    <!-- Header Actions -->
    <div class="flex justify-between items-center mb-4">
        <div class="flex-1">
            <x-admin.tajuk-halaman
                title="Detail Profil Mentor"
                backUrl="{{ route('admin.mentor.index') }}"
            />
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.mentor.edit', ['mentor' => $mentor->id, 'from' => 'detail']) }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-xl hover:bg-primary-50 hover:text-primary-700 hover:border-primary-300 shadow-sm hover:-translate-y-0.5">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                Edit Data
            </a>
            <form action="{{ route('admin.mentor.destroy', $mentor->id) }}" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center justify-center px-4 py-2 text-sm font-bold text-red-600 transition-all duration-100 bg-white border border-red-200 rounded-xl hover:bg-red-50 hover:border-red-300 shadow-sm hover:-translate-y-0.5">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Hapus
                </button>
            </form>
        </div>
    </div>

    <!-- Top Banner: Hero Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-6 md:p-8">
        <div class="flex flex-col md:flex-row items-center md:items-center gap-6">
            <div class="flex-shrink-0">
                @if($mentor->avatar)
                    <img src="{{ asset('storage/' . $mentor->avatar) }}" alt="Avatar" class="w-20 h-20 md:w-24 md:h-24 rounded-full object-cover shadow-sm bg-gray-50 border border-gray-100">
                @else
                    <div class="w-20 h-20 md:w-24 md:h-24 rounded-full bg-primary-50 border border-primary-100 flex items-center justify-center text-5xl font-extrabold text-primary-700 shadow-sm">
                        {{ substr($mentor->name, 0, 1) }}
                    </div>
                @endif
            </div>

            <div class="flex-grow text-center md:text-left">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900">{{ $mentor->name }}</h2>
                        <p class="text-primary-600 font-semibold text-base mt-1">{{ optional($mentor->mentorProfile)->spesialisasi_mentor ?? 'Belum ada spesialisasi' }}</p>
                    </div>

                    <div>
                        @if(optional($mentor->mentorProfile)->status_mentor)
                            <x-antarmuka.lencana color="primary" class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold border w-fit">
                                <span class="w-2 h-2 rounded-full bg-primary-500 mr-2 animate-pulse"></x-antarmuka.lencana> Aktif Mengajar
                            </span>
                        @else
                            <x-antarmuka.lencana color="gray" class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold border w-fit">
                                <span class="w-2 h-2 rounded-full bg-gray-500 mr-2"></x-antarmuka.lencana> Nonaktif
                            </span>
                        @endif
                    </div>
                </div>

                <div class="mt-3 flex flex-wrap justify-center md:justify-start gap-4 md:gap-8">
                    <div class="inline-flex items-center px-3 py-1 rounded-xl text-sm font-medium text-gray-600 bg-gray-50 border border-gray-200 w-fit">
                        <svg class="w-5 h-5 text-primary-600 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <a href="mailto:{{ $mentor->email }}" class="hover:text-primary-700 transition-colors">{{ $mentor->email }}</a>
                    </div>
                    <div class="inline-flex items-center px-3 py-1 rounded-xl text-sm font-medium text-gray-600 bg-gray-50 border border-gray-200 w-fit">
                        <svg class="w-5 h-5 text-primary-600 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        @php
                            $wa_phone = preg_replace('/[^0-9]/', '', optional($mentor->mentorProfile)->no_telepon_mentor ?? '');
                            if (str_starts_with($wa_phone, '0')) {
                                $wa_phone = '62' . substr($wa_phone, 1);
                            }
                        @endphp
                        <a href="https://wa.me/{{ $wa_phone }}" target="_blank" class="hover:text-primary-600 transition-colors">{{ optional($mentor->mentorProfile)->no_telepon_mentor ?? '-' }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Grid Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

        <!-- Kolom Utama (Kiri): Data Diri & Jadwal -->
        <div class="lg:col-span-2 space-y-4">

            <!-- Bio Data -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5">
                <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-100 pb-3 ">Biodata Diri & Profesi Mentor
                </h3>
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6 text-sm">
                    <div>
                        <dt class="block text-sm text-gray-600 font-semibold mb-1">Tempat, Tanggal Lahir</dt>
                        <dd class="font-semibold text-gray-900 text-sm">
                            {{ optional($mentor->mentorProfile)->tempat_lahir_mentor ?? '-' }},
                            {{ optional($mentor->mentorProfile)->tanggal_lahir_mentor ? \Carbon\Carbon::parse($mentor->mentorProfile->tanggal_lahir_mentor)->format('d M Y') : '-' }}
                        </dd>
                    </div>
                    <div>
                        <dt class="block text-sm text-gray-600 font-semibold mb-1">Jenis Kelamin</dt>
                        <dd class="font-semibold text-gray-900 text-sm">
                            {{ optional($mentor->mentorProfile)->jenis_kelamin_mentor ?? '-' }}
                        </dd>
                    </div>
                    <div class="md:col-span-2">
                        <dt class="block text-sm text-gray-600 font-semibold mb-1">Latar Belakang Pendidikan</dt>
                        <dd class="font-semibold text-gray-900 text-sm">{{ optional($mentor->mentorProfile)->pendidikan_mentor ?? '-' }}</dd>
                    </div>
                    <div class="md:col-span-2">
                        <dt class="block text-sm text-gray-600 font-semibold mb-1">Alamat Lengkap</dt>
                        <dd class="font-semibold text-gray-900 text-sm leading-relaxed">{{ optional($mentor->mentorProfile)->alamat_mentor ?? '-' }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Kelas Aktif -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden">
                <div class="p-5 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="text-lg font-bold text-primary-800 ">Jadwal Mengajar (Penugasan)
                    </h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-white border-b border-gray-100">
                                <th class="px-6 py-4 text-xs font-extrabold text-gray-500 uppercase tracking-wider">Nama Kelas</th>
                                <th class="px-6 py-4 text-xs font-extrabold text-gray-500 uppercase tracking-wider">Paket & Kategori</th>
                                <th class="px-6 py-4 text-xs font-extrabold text-gray-500 uppercase tracking-wider">Jadwal Belajar</th>
                                <th class="px-6 py-4 text-xs font-extrabold text-gray-500 uppercase tracking-wider text-center">Jumlah Murid</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($mentor->jadwals as $jadwal)
                                <tr class="hover:bg-primary-50/50 transition-colors">
                                    <td class="px-6 py-5 font-bold text-gray-900">
                                        {{ $jadwal->nama_kelas }}
                                    </td>
                                    <td class="px-6 py-5">
                                        <p class="text-sm font-semibold text-gray-900 mb-1">{{ optional($jadwal->package)->nama_program ?? 'Program Belajar Ruang Les' }}</p>
                                        <x-antarmuka.lencana color="primary" class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold border">
                                            {{ optional($jadwal->package)->tipe_program ?? '-' }}
                                        </x-antarmuka.lencana>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="text-sm text-gray-900 font-semibold flex items-center mb-1">
                                            <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            {{ $jadwal->hari }}, {{ $jadwal->formatted_time_range }}
                                        </div>
                                        <div class="text-xs font-medium text-gray-500 flex items-center">
                                            <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                            Lokasi: {{ optional($jadwal->package)->lokasi_belajar ?? 'Online' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-5 text-center font-semibold text-gray-900">
                                        {{ $jadwal->jumlah_murid ?? 0 }} / {{ optional($jadwal->package)->max_murid ?? 6 }} murid
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="px-0 py-0 text-center">
                                        <x-admin.keadaan-kosong title="Data Kosong" message="Mentor ini belum memiliki penugasan jadwal kelas." />
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Kolom Samping (Kanan): Stats & Payroll -->
        <div class="lg:col-span-1 space-y-4">

            <!-- Workload Stats -->
            <div class="bg-gradient-to-br from-primary-600 to-primary-800 rounded-2xl shadow-md border border-primary-500 p-5 text-white relative overflow-hidden">


                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <div class="text-primary-100 font-medium text-sm mb-1 uppercase tracking-wider">Total Kelas Aktif</div>
                        <div class="text-4xl font-extrabold">{{ $mentor->jadwals->count() }} <span class="text-lg font-medium text-primary-200">Kelas</span></div>
                    </div>
                    <div class="w-14 h-14 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center border border-white/30">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Financial Data (Payroll) -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5">
                <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-100 pb-3 ">Informasi Payroll
                </h3>

                @if(optional($mentor->mentorProfile)->nama_bank)
                    <div class="bg-gradient-to-r from-gray-50 to-white p-5 rounded-2xl border border-gray-200 shadow-sm relative overflow-hidden">
                        <!-- Chip pattern -->
                        <div class="absolute right-4 top-4 opacity-20">
                            <svg class="w-10 h-10" viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="2" y="5" width="20" height="14" rx="2" stroke-width="2"></rect><path d="M2 10h20M6 5v14M10 5v14M14 5v14M18 5v14" stroke-width="1"></path></svg>
                        </div>

                        <div class="text-xs font-bold text-primary-600 mb-2 uppercase tracking-widest">{{ $mentor->mentorProfile->nama_bank }}</div>
                        <div class="font-mono text-xl md:text-2xl font-extrabold text-gray-900 mb-4 tracking-widest drop-shadow-sm">{{ chunk_split($mentor->mentorProfile->nomor_akun_bank, 4, ' ') }}</div>

                        <div class="flex flex-col">
                            <span class="text-[10px] text-gray-400 uppercase font-bold tracking-wider mb-0.5">Pemilik Rekening</span>
                            <span class="text-sm font-bold text-gray-800 uppercase">{{ $mentor->mentorProfile->nama_akun_bank }}</span>
                        </div>
                    </div>
                @else
                    <div class="p-5 bg-amber-50 rounded-2xl border border-amber-200 flex flex-col items-center justify-center text-center">
                        <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center mb-3">
                            <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <p class="text-sm font-bold text-amber-800 mb-1">Data Belum Lengkap</p>
                        <p class="text-xs font-medium text-amber-600">Mentor belum mendaftarkan rekening bank untuk payroll.</p>
                        <a href="{{ route('admin.mentor.edit', ['mentor' => $mentor->id, 'from' => 'detail']) }}" class="mt-4 px-4 py-2 bg-white text-amber-700 text-xs font-bold rounded-lg border border-amber-200 shadow-sm hover:bg-amber-100 transition-colors">Lengkapi Data</a>
                    </div>
                @endif
            </div>

        </div>

    </div>
</div>
@endsection
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // SweetAlert2 untuk Konfirmasi Hapus
    const deleteForm = document.getElementById('deleteForm');
    if(deleteForm) {
        deleteForm.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Hapus Data Mentor?',
                text: "Semua data profil dan akses login mentor ini akan terhapus secara permanen! Jadwal kelas yang terikat dengan mentor ini mungkin akan terdampak.",
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
