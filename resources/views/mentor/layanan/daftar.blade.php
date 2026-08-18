@extends('layouts.mentor')

@section('title', 'Layanan & Bantuan')

@section('content')
<div x-data="{ tab: 'Semua', modalOpen: {{ $errors->any() ? 'true' : 'false' }}, errors: { kategori_layanan: {{ $errors->has('kategori_layanan') ? 'true' : 'false' }}, subject_layanan: {{ $errors->has('subject_layanan') ? 'true' : 'false' }}, pesan: {{ $errors->has('pesan') ? 'true' : 'false' }} }, categoryType: '{{ old('category_select', '') }}', customCategory: '{{ old('custom_category', '') }}', closeModal() { this.modalOpen = false; this.errors = { kategori_layanan: false, subject_layanan: false, pesan: false }; } }" class="space-y-0">

    <x-admin.tajuk-halaman
        title="Layanan & Bantuan"
        description="Sampaikan testimoni, pertanyaan, keluhan, atau kendala Anda kepada pihak Ruang Les."
    >
        <x-slot name="rightActions">
            <button @click="modalOpen = true" class="inline-flex items-center justify-center px-4 py-2 text-sm font-bold text-white transition-all duration-100 bg-primary-600 rounded-xl hover:bg-primary-700 shadow-sm hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Buat Tiket Baru
            </button>
        </x-slot>
    </x-admin.tajuk-halaman>

    <!-- Tab Navigation -->
    <div class="bg-white/80 backdrop-blur-md rounded-t-2xl shadow-sm border border-primary-100/50 border-b-0 overflow-hidden mt-6">
        <nav class="flex flex-wrap overflow-x-auto" aria-label="Tabs">
            <button @click="tab = 'Semua'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': tab === 'Semua', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': tab !== 'Semua'}" class="flex-1 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                Semua
            </button>
            <button @click="tab = 'Open'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': tab === 'Open', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': tab !== 'Open'}" class="flex-1 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                Menunggu Balasan
            </button>
            <button @click="tab = 'In Progress'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': tab === 'In Progress', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': tab !== 'In Progress'}" class="flex-1 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                Sedang Ditangani
            </button>
            <button @click="tab = 'Closed'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': tab === 'Closed', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': tab !== 'Closed'}" class="flex-1 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                Selesai
            </button>
        </nav>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-b-2xl shadow-sm border border-primary-100/50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-primary-100/50">
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Tiket & Waktu</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Subjek</th>
                        <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($tickets as $ticket)
                        @php
                            $hasUnread = $ticket->replies->where('dibaca_pengguna', false)->where('user_id', '!=', auth()->id())->count() > 0;
                            $rowClass = $hasUnread ? 'bg-primary-50 font-semibold' : ($ticket->status_layanan == 'Open' ? 'bg-blue-50/30' : '');
                        @endphp
                        <tr x-show="tab === 'Semua' || tab === '{{ $ticket->status_layanan }}'" x-cloak class="hover:bg-primary-50/50 transition-colors {{ $rowClass }}">
                            <td class="px-4 py-3 align-middle whitespace-nowrap">
                                <div class="flex items-center gap-2">
                                    @if($hasUnread)
                                        <span class="w-2 h-2 bg-red-500 rounded-full flex-shrink-0 animate-pulse"></span>
                                    @endif
                                    <div>
                                        <div class="text-sm font-bold text-gray-900">{{ $ticket->no_ticket }}</div>
                                        <div class="text-xs text-gray-500 mt-1">{{ $ticket->created_at->format('d M Y, H:i') }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="text-sm font-semibold text-gray-900">
                                    {{ $ticket->kategori_layanan }}
                                </div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="text-sm font-semibold text-gray-900">{{ $ticket->subject_layanan }}</div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                @if($ticket->status_layanan == 'Open')
                                    <x-antarmuka.lencana color="danger" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit">
                                        <span class="w-1.5 h-1.5 bg-red-500 rounded-full mr-1.5 animate-pulse"></x-antarmuka.lencana>
                                        Menunggu Balasan
                                    </span>
                                @elseif($ticket->status_layanan == 'In Progress')
                                    <x-antarmuka.lencana color="warning" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit">
                                        <span class="w-1.5 h-1.5 bg-amber-500 rounded-full mr-1.5"></x-antarmuka.lencana>
                                        Sedang Ditangani
                                    </span>
                                @else
                                    <x-antarmuka.lencana color="gray" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border w-fit">
                                        <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-1.5"></x-antarmuka.lencana>
                                        Selesai
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 align-middle text-center">
                                <a href="{{ route('mentor.layanan.show', $ticket->id) }}" class="inline-flex items-center justify-center px-3 py-1.5 min-h-[25px] min-w-[25px] text-xs font-bold text-gray-600 bg-white border border-gray-200 transition-all duration-100 rounded-lg hover:bg-primary-50 hover:text-primary-600 hover:border-primary-200 shadow-sm">
                                    Buka Chat
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 align-middle">
                                <x-admin.keadaan-kosong
                                    icon="mail"
                                    title="Belum Ada Riwayat Layanan"
                                    message="Butuh bantuan atau punya masukan? Silakan sampaikan di sini. Jangan ragu untuk menghubungi tim Ruang Les ya! ^^"
                                />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Buat Tiket Baru -->
    <template x-teleport="body">
        <div x-show="modalOpen" class="fixed inset-0 z-[9999] overflow-y-auto text-left" style="display: none;">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Backdrop -->
                <div x-show="modalOpen" x-transition.opacity class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm z-0" @click="closeModal()"></div>
                </div>

                <!-- Spacer for vertical alignment -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <!-- Modal Panel -->
                <div x-show="modalOpen"
                     x-transition:enter="ease-out duration-100"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl w-full relative z-10">

                    <form action="{{ route('mentor.layanan.store') }}" method="POST" novalidate>
                        @csrf
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6">

                            <!-- Header -->
                            <div class="flex items-start justify-between mb-5">
                                <h3 class="text-xl leading-6 font-bold text-gray-900 flex items-center">
                                    <svg class="w-6 h-6 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                                    Buat Tiket Baru
                                </h3>
                                <button type="button" @click="closeModal()" class="text-gray-400 hover:text-gray-500 focus:outline-none hover:bg-gray-100 rounded-full p-1 transition-colors">
                                    <span class="sr-only">Tutup</span>
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                </button>
                            </div>

                            <!-- Form Content -->
                            <div class="space-y-4">
                                <div>
                                    <label for="category_select" class="block text-sm font-semibold text-gray-600 mb-2">Kategori <span class="text-red-500">*</span></label>
                                    <select x-model="categoryType" @change="errors.kategori_layanan = false" name="category_select" id="category_select" :class="errors.kategori_layanan ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 focus:ring-primary-200'" class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:outline-none focus:ring-2 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer">
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        <option value="Administrasi">Administrasi</option>
                                        <option value="Keuangan">Keuangan</option>
                                        <option value="Jadwal">Jadwal</option>
                                        <option value="Kelas">Kelas</option>
                                        <option value="Request Jadwal">Request Jadwal</option>
                                        <option value="Request Materi">Request Materi</option>
                                        <option value="Feedback">Feedback / Masukan</option>
                                        <option value="Testimoni">Testimoni</option>
                                        <option value="Keluhan Murid / Ortu">Keluhan Murid / Ortu</option>
                                        <option value="Kendala Sistem">Kendala Sistem Web</option>
                                        <option value="Lainnya...">Lainnya...</option>
                                    </select>

                                    <div x-show="categoryType === 'Lainnya...'" x-transition x-cloak class="mt-3">
                                        <input type="text" x-model="customCategory" @input="errors.kategori_layanan = false" name="custom_category" placeholder="Tuliskan kategori spesifik Anda..." :class="errors.kategori_layanan ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 focus:ring-primary-200'" class="block w-full rounded-2xl p-3 border shadow-sm focus:outline-none focus:ring-2 transition-colors duration-100 text-sm font-medium text-gray-800">
                                    </div>

                                    <input type="hidden" name="kategori_layanan" :value="categoryType === 'Lainnya...' ? customCategory : categoryType">

                                    @error('kategori_layanan')
                                        <p x-show="errors.kategori_layanan" class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            Kategori tiket wajib diisi.
                                        </p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="subject_layanan" class="block text-sm font-semibold text-gray-600 mb-2">Subjek <span class="text-red-500">*</span></label>
                                    <input type="text" name="subject_layanan" id="subject_layanan" @input="errors.subject_layanan = false" value="{{ old('subject_layanan') }}" placeholder="Tuliskan topik atau ringkasan pesan Anda" :class="errors.subject_layanan ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 focus:ring-primary-200'" class="block w-full rounded-2xl p-3 border shadow-sm focus:outline-none focus:ring-2 transition-colors duration-100 text-sm font-medium text-gray-800">

                                    @error('subject_layanan')
                                        <p x-show="errors.subject_layanan" class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            Subjek tiket wajib diisi.
                                        </p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pesan" class="block text-sm font-semibold text-gray-600 mb-2">Isi Pesan <span class="text-red-500">*</span></label>
                                    <textarea name="pesan" id="pesan" rows="5" @input="errors.pesan = false" placeholder="Ceritakan semua detail pesan Anda secara jelas agar tim Ruang Les dapat merespons dengan tepat..." :class="errors.pesan ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 focus:ring-primary-200'" class="block w-full rounded-2xl p-3 border shadow-sm focus:outline-none focus:ring-2 transition-colors duration-100 text-sm font-medium text-gray-800">{{ old('pesan') }}</textarea>

                                    @error('pesan')
                                        <p x-show="errors.pesan" class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            Detail wajib diisi.
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 flex flex-col-reverse sm:flex-row sm:justify-end gap-3 border-t border-gray-100">
                            <button type="button" @click="closeModal()" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-xl hover:bg-gray-100 focus:outline-none">
                                Batal
                            </button>
                            <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-white transition-all duration-100 bg-primary-600 border border-transparent rounded-xl hover:bg-primary-700 shadow-sm focus:outline-none">
                                Kirim Tiket
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </template>
</div>
@endsection
