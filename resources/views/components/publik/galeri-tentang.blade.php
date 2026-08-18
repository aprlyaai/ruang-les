@props(['settings', 'galleries'])

<section class="py-16 lg:py-24 relative overflow-hidden">
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <x-antarmuka.lencana color="primary" class="inline-block py-1.5 px-4 rounded-full text-xs font-bold uppercase tracking-widest mb-4 border">
                {{ $settings['gallery_label'] ?? 'Galeri Dokumentasi' }}
            </x-antarmuka.lencana>
            <h2 class="font-heading text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">{!! nl2br(e($settings['gallery_headline'] ?? 'Momen Berharga di Ruang Les')) !!}</h2>
            <p class="text-base md:text-lg text-gray-600 max-w-2xl mx-auto">
                {{ $settings['gallery_description'] ?? 'Sekilas gambaran suasana belajar yang interaktif, hangat, dan menyenangkan.' }}
            </p>
        </div>

        @if(isset($galleries) && $galleries->count() > 0)
        <!-- Carousel Layout (Alpine.js) -->
        <div x-data="{
                activeSlide: 0,
                totalSlides: {{ $galleries->count() }},
                slidesToShow: 3,
                updateSlidesToShow() {
                    if (window.innerWidth >= 1024) {
                        this.slidesToShow = 3;
                    } else if (window.innerWidth >= 768) {
                        this.slidesToShow = 2;
                    } else {
                        this.slidesToShow = 1.15; // Di mobile sengaja 1.15 agar foto sebelahnya 'ngintip' sedikit
                    }
                },
                get maxSlide() {
                    return Math.max(0, this.totalSlides - Math.floor(this.slidesToShow));
                },
                updateActiveSlide() {
                    if (!this.$refs.slider) return;
                    const cardWidth = this.$refs.slider.clientWidth / this.slidesToShow;
                    this.activeSlide = Math.round(this.$refs.slider.scrollLeft / cardWidth);
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
             x-init="updateSlidesToShow(); window.addEventListener('resize', () => { updateSlidesToShow(); })"
             class="relative max-w-[90rem] mx-auto">

            <!-- Tombol Navigasi Desktop -->
            <button @click="scrollToSlide(activeSlide - 1)"
                    :disabled="activeSlide === 0"
                    :class="activeSlide === 0 ? 'opacity-0 invisible' : 'opacity-100 visible hover:bg-primary-700 hover:text-white border-primary-200 text-primary-700 active:scale-95'"
                    class="hidden md:flex absolute -left-4 lg:-left-6 top-1/2 -translate-y-1/2 z-20 w-14 h-14 rounded-full border-2 bg-white/90 backdrop-blur items-center justify-center transition-all duration-300 shadow-xl focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <button @click="scrollToSlide(activeSlide + 1)"
                    :disabled="activeSlide >= maxSlide"
                    :class="activeSlide >= maxSlide ? 'opacity-0 invisible' : 'opacity-100 visible hover:bg-primary-700 hover:text-white border-primary-200 text-primary-700 active:scale-95'"
                    class="hidden md:flex absolute -right-4 lg:-right-6 top-1/2 -translate-y-1/2 z-20 w-14 h-14 rounded-full border-2 bg-white/90 backdrop-blur items-center justify-center transition-all duration-300 shadow-xl focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
            </button>

            <!-- Viewport Slider -->
            <div class="overflow-hidden -mx-4 px-4 py-6">
                <div x-ref="slider"
                     @scroll.debounce.50ms="updateActiveSlide"
                     class="flex w-full overflow-x-auto snap-x snap-mandatory scrollbar-hide pb-8 space-x-4 md:space-x-6"
                     style="-ms-overflow-style: none; scrollbar-width: none;">

                    @foreach($galleries as $gallery)
                    <div class="w-[85%] md:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] flex-shrink-0 snap-center">
                        <div class="relative rounded-3xl overflow-hidden group shadow-md hover:shadow-2xl border border-gray-100 transition-all duration-500 aspect-[4/3] transform hover:-translate-y-2">
                            <img src="{{ str_starts_with($gallery->gambar, 'images/') ? asset($gallery->gambar) : asset('storage/' . $gallery->gambar) }}" alt="{{ $gallery->nama_gambar }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                                @if($gallery->kategori)
                                    <p class="text-primary-300 font-bold text-xs tracking-widest uppercase mb-1">{{ $gallery->kategori }}</p>
                                @endif
                                <p class="text-white font-bold text-xl font-heading">{{ $gallery->nama_gambar }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            <div class="flex justify-center space-x-2 mt-2">
                <template x-for="i in (maxSlide + 1)">
                    <button @click="scrollToSlide(i - 1)"
                            :class="activeSlide === (i - 1) ? 'w-8 bg-primary-700 shadow-md' : 'w-2.5 bg-primary-200'"
                            class="h-2.5 rounded-full transition-all duration-300 focus:outline-none"></button>
                </template>
            </div>
        </div>
        @else
        <div class="text-center py-10 bg-white rounded-3xl border border-gray-100 shadow-sm max-w-4xl mx-auto">
            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <p class="text-gray-500 font-medium">Belum ada foto yang ditambahkan ke galeri.</p>
        </div>
        @endif
    </div>
</section>
