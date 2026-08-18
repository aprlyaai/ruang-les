@props(['settings', 'groupedPackages'])

<section id="program" class="py-16 lg:py-20 relative">
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <x-antarmuka.lencana color="primary" class="inline-block py-1 px-3 rounded-full text-[11px] font-bold uppercase tracking-widest mb-4 border">
            {{ $settings['program_label'] ?? 'Program Unggulan' }}
        </x-antarmuka.lencana>
        <h2 class="font-heading text-2xl md:text-3xl font-extrabold text-gray-900 mb-6">{!! nl2br(e($settings['program_headline'] ?? 'Pilihan Program Belajar')) !!}</h2>
        <p class="text-base text-gray-600 max-w-4xl mx-auto mb-12">
            {{ $settings['program_description'] ?? 'Kami menyediakan program yang disesuaikan dengan kebutuhan fokus dan gaya belajar anak Anda.' }}
        </p>


        <div x-data="{
                activeSlide: 0,
                totalSlides: {{ $groupedPackages->count() }},
                slidesToShow: 3,
                updateSlidesToShow() {
                    if (window.innerWidth >= 1024) {
                        this.slidesToShow = 3;
                    } else if (window.innerWidth >= 768) {
                        this.slidesToShow = 2;
                    } else {
                        this.slidesToShow = 1;
                    }
                    this.activeSlide = Math.min(this.activeSlide, this.maxSlide);
                },
                get maxSlide() {
                    return Math.max(0, this.totalSlides - this.slidesToShow);
                },
                updateActiveSlide() {
                    if (!this.$refs.slider) return;
                    const cardWidth = this.$refs.slider.clientWidth / this.slidesToShow;
                    this.activeSlide = Math.round(this.$refs.slider.scrollLeft / cardWidth);
                },
                equalizePriceBoxes() {
                    this.$nextTick(() => {
                        const boxes = this.$el.querySelectorAll('.harga-box');
                        if (!boxes.length) return;
                        boxes.forEach(b => b.style.height = 'auto');
                        let maxH = 104;
                        boxes.forEach(b => { if(b.offsetHeight > maxH) maxH = b.offsetHeight; });
                        boxes.forEach(b => b.style.height = maxH + 'px');
                    });
                },
                scrollToSlide(index) {
                    this.activeSlide = Math.min(this.maxSlide, Math.max(0, index));
                    if (!this.$refs.slider) return;
                    const cardWidth = this.$refs.slider.clientWidth / this.slidesToShow;
                    this.$refs.slider.scrollTo({
                        left: this.activeSlide * cardWidth,
                        behavior: 'smooth'
                    });
                }
             }"
             x-init="updateSlidesToShow(); equalizePriceBoxes(); window.addEventListener('resize', () => { updateSlidesToShow(); equalizePriceBoxes(); })"
             class="relative max-w-[90rem] mx-auto">

            <!-- Custom Navigation Buttons (Floating Side Controls) -->
            <button @click="scrollToSlide(activeSlide - 1)"
                    aria-label="Geser ke Kiri"
                    :disabled="activeSlide === 0"
                    :class="activeSlide === 0 ? 'opacity-0 invisible' : 'opacity-100 visible hover:bg-primary-700 hover:text-white border-primary-200 text-primary-700 active:scale-95'"
                    class="hidden md:flex absolute left-2 lg:-left-6 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full border bg-white items-center justify-center transition-all duration-300 shadow-md hover:shadow-lg focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <button @click="scrollToSlide(activeSlide + 1)"
                    aria-label="Geser ke Kanan"
                    :disabled="activeSlide === maxSlide"
                    :class="activeSlide === maxSlide ? 'opacity-0 invisible' : 'opacity-100 visible hover:bg-primary-700 hover:text-white border-primary-200 text-primary-700 active:scale-95'"
                    class="hidden md:flex absolute right-2 lg:-right-6 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full border bg-white items-center justify-center transition-all duration-300 shadow-md hover:shadow-lg focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>

            <!-- Viewport Slider -->
            <div class="overflow-hidden rounded-3xl -mx-4 px-4 py-4">
                <div x-ref="slider"
                     @scroll.debounce.50ms="updateActiveSlide"
                     class="flex w-full overflow-x-auto snap-x snap-mandatory scrollbar-hide pb-4 pt-8 -mt-8"
                     style="-ms-overflow-style: none; scrollbar-width: none;">

                    @forelse ($groupedPackages as $groupKey => $group)
                    @php
                        $first = $group->first();
                        $kategori = strtolower($first->tipe_program);

                        if (str_contains($kategori, 'semi')) {
                            // Semi Privat - Two/small group (Users Icon)
                            $iconSvg = '<svg class="w-6 h-6 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>';
                        } elseif (str_contains($kategori, 'privat')) {
                            // Privat - Single focus (Pengguna Icon)
                            $iconSvg = '<svg class="w-6 h-6 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>';
                        } else {
                            // Reguler/Group - Classroom (Academic/Building Icon)
                            $iconSvg = '<svg class="w-6 h-6 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>';
                        }
                    @endphp

                    <!-- Slide Card -->
                    <div class="w-full md:w-1/2 lg:w-1/3 flex-shrink-0 px-6 flex snap-start relative pt-5 pb-5">
                        @php
                            $isPopular = $first->direkomendasikan;
                        @endphp

                        <!-- Card Container -->
                        <div class="w-full h-full bg-white/70 backdrop-blur-md rounded-2xl border {{ $isPopular ? 'border-yellow-300 shadow-[0_20px_40px_-15px_rgba(250,204,21,0.3)] z-10' : 'border-gray-200 hover:border-primary-300 shadow-[0_8px_30px_rgb(0,0,0,0.04)]' }} p-6 transition-all duration-500 relative flex flex-col group hover:-translate-y-2 hover:shadow-xl">

                            @if($isPopular)
                            <!-- Popular Badge -->
                            <div class="absolute -top-4 left-0 right-0 flex justify-center z-20">
                                <div class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white text-[10px] font-bold uppercase tracking-widest py-1.5 px-6 rounded-full shadow-lg border border-yellow-300 animate-pulse">
                                    {{ $settings['program_popular_badge'] ?? 'Paling Diminati' }}
                                </div>
                            </div>
                            @endif
                            <!-- Header Section -->
                            <div class="flex items-center mb-6">
                                <!-- Icon -->
                                <div class="w-14 h-14 flex-shrink-0 bg-primary-50 rounded-[1.25rem] flex items-center justify-center text-primary-600 mr-5 group-hover:scale-110 group-hover:-rotate-3 transition-transform duration-500 shadow-sm border border-primary-100/50">
                                    {!! $iconSvg !!}
                                </div>

                                <div class="flex flex-col text-left items-start">
                                    <h3 class="font-heading text-[19px] font-extrabold text-gray-900 uppercase tracking-wide leading-tight mb-2">
                                        {{ $first->nama_program }}
                                    </h3>
                                    <x-antarmuka.lencana color="primary" class="!rounded-md uppercase tracking-wider shadow-sm !text-[11px]">
                                        {{ $first->kelas_program }}
                                    </x-antarmuka.lencana>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="border-l-[3px] border-primary-300 pl-4 mb-6">
                                <div class="text-gray-500 text-[13px] leading-relaxed italic text-justify space-y-1">
                                    @foreach(explode("\n", $first->deskripsi_program) as $desc_line)
                                        @if(trim($desc_line) !== '')
                                            <p>{{ ltrim(trim($desc_line), '- ') }}</p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <!-- Features -->
                            <ul class="space-y-2.5 mb-6 flex-1">
                                <!-- Keunggulan 1 -->
                                <li class="flex items-start">
                                    <div class="w-5 h-5 rounded-full bg-primary-50 flex items-center justify-center flex-shrink-0 mt-0.5 mr-3">
                                        <svg class="w-3 h-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                    <span class="text-gray-600 text-sm text-justify">
                                        {{ $first->student_capacity_label }}
                                    </span>
                                </li>
                                <!-- Keunggulan 2 -->
                                <li class="flex items-start">
                                    <div class="w-5 h-5 rounded-full bg-primary-50 flex items-center justify-center flex-shrink-0 mt-0.5 mr-3">
                                        <svg class="w-3 h-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                    <span class="text-gray-600 text-sm text-justify">{{ $first->pertemuan }}× pertemuan</span>
                                </li>
                                <!-- Keunggulan 3 -->
                                <li class="flex items-start">
                                    <div class="w-5 h-5 rounded-full bg-primary-50 flex items-center justify-center flex-shrink-0 mt-0.5 mr-3">
                                        <svg class="w-3 h-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                    <span class="text-gray-600 text-sm text-justify">Waktu belajar {{ $first->durasi_belajar }} menit per pertemuan</span>
                                </li>
                                <!-- Keunggulan 4 -->
                                <li class="flex items-start">
                                    <div class="w-5 h-5 rounded-full bg-primary-50 flex items-center justify-center flex-shrink-0 mt-0.5 mr-3">
                                        <svg class="w-3 h-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                    <span class="text-gray-600 text-sm text-justify">
                                        @if ($group->count() > 1) Pilihan lokasi fleksibel @else Sesi belajar dilakukan di {{ strtolower($first->lokasi_belajar) }} @endif
                                    </span>
                                </li>
                            </ul>

                            <!-- Bottom Section: Pricing & CTA -->
                            <div class="mt-auto pt-2">
                                <div class="mb-4 bg-gray-50 rounded-[14px] p-3.5 border border-gray-100 flex flex-col justify-start min-h-[100px] harga-box">
                                    <p class="text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-3 text-left w-full">BIAYA PROGRAM:</p>
                                    <div class="space-y-3 flex-1 flex flex-col justify-center w-full">
                                        @foreach($group as $item)
                                        <div class="flex justify-between items-end">
                                            <div class="flex flex-col">
                                                <span class="text-gray-900 font-medium text-sm">{{ $item->lokasi_belajar }}</span>
                                            </div>
                                            <div class="flex items-start">
                                                <span class="text-xs font-medium text-primary-600 mt-0.5 mr-0.5">Rp</span>
                                                <span class="text-lg font-extrabold text-gray-900">{{ number_format($item->harga, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                        @if(!$loop->last)
                                        <div class="w-full border-t border-dashed border-gray-200"></div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>

                                @guest
                                    <a href="{{ route('register') }}" class="flex items-center justify-center w-full py-3 px-4 bg-primary-600 hover:bg-primary-700 text-white font-bold text-sm rounded-2xl transition-all duration-300 shadow-[0_8px_20px_-6px_rgba(183,217,177,0.6)] hover:shadow-[0_12px_25px_-6px_rgba(183,217,177,0.8)] hover:-translate-y-0.5 group-hover:bg-primary-700">
                                        Pilih Program
                                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </a>
                                @else
                                    <a href="{{ route('pendaftaran.form', ['paket' => $first->id]) }}" class="flex items-center justify-center w-full py-3 px-4 bg-primary-600 hover:bg-primary-700 text-white font-bold text-sm rounded-2xl transition-all duration-300 shadow-[0_8px_20px_-6px_rgba(183,217,177,0.6)] hover:shadow-[0_12px_25px_-6px_rgba(183,217,177,0.8)] hover:-translate-y-0.5 group-hover:bg-primary-700">
                                        Pilih Program
                                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </a>
                                @endguest
                            </div>
                        </div>
                    </div>
                    @empty
                <div class="w-full py-12 text-center bg-white/50 rounded-2xl border border-dashed border-primary-200">
                    <svg class="w-16 h-16 mx-auto text-primary-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $settings['empty_program_title'] ?? 'Belum Ada Program Belajar' }}</h3>
                    <p class="text-gray-600">{{ $settings['empty_program_desc'] ?? 'Silakan kembali lagi nanti untuk melihat program terbaru kami.' }}</p>
                </div>
                    @endforelse
                </div>
            </div>

            <!-- Pagination Dots -->
            <div class="flex justify-center space-x-2 mt-0">
                <template x-for="i in (maxSlide + 1)">
                    <button @click="scrollToSlide(i - 1)"
                            :class="activeSlide === (i - 1) ? 'w-6 bg-primary-700' : 'w-2 bg-primary-200'"
                            class="h-2 rounded-full transition-all duration-300 focus:outline-none"></button>
                </template>
            </div>
        </div>
    </div>
</section>
