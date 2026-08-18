<!-- Langkah 4: Paket -->
<div class="space-y-6">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
        @foreach($pakets as $paket)
            <label class="group relative bg-white/60 backdrop-blur-md rounded-2xl p-4 md:p-5 flex flex-col cursor-pointer transition-all duration-300 border-2 border-white/50 {{ ($paket->direkomendasikan) ? 'shadow-lg hover:shadow-xl' : 'shadow-sm hover:shadow-lg' }} hover:border-primary-400 hover:bg-white/80 has-[:checked]:border-primary-700 has-[:checked]:bg-primary-50/90 has-[:checked]:ring-4 has-[:checked]:ring-primary-200 has-[:checked]:-translate-y-1 has-[:checked]:scale-[1.02] has-[:checked]:shadow-[0_20px_40px_-15px_rgba(66,108,60,0.3)]">

                <input type="radio" name="program_id" value="{{ $paket->program_id }}" class="sr-only" {{ (old('program_id', $draft->draft_data['program_id'] ?? '') == $paket->program_id) ? 'checked' : '' }} required>

                @if($paket->direkomendasikan)
                    <!-- Badge Rekomendasi -->
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 whitespace-nowrap bg-gradient-to-r from-orange-400 to-amber-500 text-white text-[10px] font-bold uppercase px-2.5 py-0.5 rounded-full shadow-lg flex items-center gap-1 border border-yellow-300 z-10">
                        <span class="flex items-center">
                            <svg class="w-3 h-3 mr-1 text-yellow-100" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            Pilihan Favorit
                        </span>
                    </div>
                @endif
                <!-- Checked Indicator Circle -->
                <div class="absolute top-4 right-4 w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center transition-all duration-300 bg-white/50 backdrop-blur-sm group-has-[:checked]:border-transparent group-has-[:checked]:bg-gradient-to-tr group-has-[:checked]:from-primary-800 group-has-[:checked]:to-primary-600 group-has-[:checked]:shadow-md z-10 group-has-[:checked]:scale-110 group-has-[:checked]:ring-4 group-has-[:checked]:ring-primary-200/60">
                    <svg class="w-3.5 h-3.5 text-white opacity-0 transition-all duration-300 group-has-[:checked]:opacity-100 group-has-[:checked]:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5" d="M5 13l4 4L19 7"></path></svg>
                </div>

                <!-- Header Card (Pill Category & Title) -->
                <div class="pr-8 mb-4 relative z-0">
                    <span class="inline-block px-2 py-0.5 rounded text-[10px] font-bold tracking-wide uppercase mb-2 bg-primary-50 text-primary-700 border border-primary-200/60 shadow-sm transition-colors duration-300 group-has-[:checked]:bg-primary-700 group-has-[:checked]:text-white group-has-[:checked]:border-transparent">
                        {{ $paket->kelas_program }}
                    </span>

                    <h3 class="font-bold text-lg text-gray-900 leading-tight transition-colors duration-300 group-has-[:checked]:text-primary-900">{{ $paket->nama_program }}</h3>

                    <span class="text-xs font-medium text-gray-500 block mt-0.5">{{ $paket->lokasi_belajar }}</span>
                </div>

                <!-- Price Section -->
                <div class="mb-4 pb-4 border-b border-gray-100 relative z-0">
                    <div class="flex items-baseline text-gray-900">
                        <span class="text-lg font-bold tracking-tight text-gray-400">Rp</span>
                        <span class="text-[28px] font-extrabold tracking-tighter ml-1">{{ number_format($paket->harga ?? $paket->harga, 0, ',', '.') }}</span>
                    </div>
                </div>

                <!-- Features List -->
                <ul class="space-y-1.5 text-xs text-gray-600 flex-1 flex flex-col justify-start relative z-0">
                    <li class="flex items-start">
                        <svg class="w-3.5 h-3.5 mr-1.5 mt-0.5 text-primary-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span><strong>{{ $paket->pertemuan ?? 8 }}</strong>× Pertemuan</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-3.5 h-3.5 mr-1.5 mt-0.5 text-primary-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Durasi <strong>{{ $paket->durasi_belajar ?? 90 }} Menit</strong> per sesi</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-3.5 h-3.5 mr-1.5 mt-0.5 text-primary-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span>Maksimal <strong>{{ $paket->max_murid ?? 1 }} Murid</strong></span>
                    </li>
                    @if(!empty($paket->deskripsi_program))
                        @foreach(explode("\n", $paket->deskripsi_program) as $desc_line)
                            @if(trim($desc_line) !== '')
                            <li class="flex items-start">
                                <svg class="w-3.5 h-3.5 mr-1.5 mt-0.5 text-primary-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span>{{ ltrim(trim($desc_line), '- ') }}</span>
                            </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </label>
        @endforeach
    </div>
    <x-antarmuka.galat-sebaris name="program_id" />
</div>
