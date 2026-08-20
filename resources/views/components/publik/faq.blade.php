@props(['settings', 'faqs'])

<section id="faq" class="py-16 lg:py-24 relative overflow-hidden">
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-16">
            <!-- FAQ Header (Kiri) -->
            <div class="w-full lg:w-1/3">
                <div class="sticky top-28">
                    <x-antarmuka.lencana color="primary" class="inline-block py-1 px-3 rounded-full text-[11px] font-bold uppercase tracking-widest mb-4 border">
                        {{ $settings['faq_label'] ?? 'Pusat Bantuan' }}
                    </x-antarmuka.lencana>
                    <h2 class="font-heading text-2xl md:text-3xl font-extrabold text-gray-900 mb-4">{!! nl2br(e($settings['faq_headline'] ?? 'Pertanyaan yang Sering Diajukan')) !!}</h2>
                    <p class="text-base text-gray-600 mb-8 text-justify">
                        {{ $settings['faq_description'] ?? 'Punya pertanyaan seputar sistem pendaftaran, metode belajar, atau biaya? Temukan jawabannya di sini.' }}
                    </p>
                    <div class="bg-gradient-to-br from-primary-50/50 to-white p-6 rounded-2xl border border-primary-100/50 shadow-sm">
                        <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2">{!! nl2br(e($settings['faq_cta_headline'] ?? 'Masih punya pertanyaan?')) !!}</h3>
                        <p class="text-sm text-gray-600 mb-6 leading-relaxed text-justify">{{ $settings['faq_cta_description'] ?? 'Tim Ruang Les siap membantu Anda kapan saja. Jangan ragu untuk menghubungi kami.' }}</p>
                        <a href="#footer" class="inline-flex items-center justify-center w-full px-5 py-3 border border-transparent text-sm font-bold rounded-2xl text-white bg-primary-700 hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 transition-all shadow-sm">
                            {{ $settings['faq_cta_button'] ?? 'Hubungi Kami' }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- FAQ Accordion List (Kanan) -->
            <div class="w-full lg:w-2/3">
                <div x-data="{ activeFaq: null }" class="space-y-3">
                    @forelse($faqs as $faq)
                        <div class="border border-primary-100/50 rounded-2xl bg-white/70 backdrop-blur-md shadow-sm hover:border-primary-300 transition-colors duration-300 overflow-hidden">
                            <button @click="activeFaq = activeFaq === {{ $faq->faq_id }} ? null : {{ $faq->faq_id }}"
                                    class="w-full px-5 py-4 text-left flex justify-between items-center focus:outline-none focus:bg-primary-50 focus:ring-inset focus:ring-2 focus:ring-primary-500 transition-all group">
                                <span class="font-bold text-base text-gray-900 pr-6 group-hover:text-primary-700 transition-colors" :class="activeFaq === {{ $faq->faq_id }} ? 'text-primary-700' : ''">
                                    {{ $faq->pertanyaan }}
                                </span>
                                <x-antarmuka.lencana color="primary" class="bg-white">
                                    <svg class="w-5 h-5 transform transition-transform duration-300" :class="activeFaq === {{ $faq->faq_id }} ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </x-antarmuka.lencana>
                            </button>
                            
                            <div x-show="activeFaq === {{ $faq->faq_id }}"
                                 x-collapse 
                                 class="px-5 pb-4 text-gray-600 text-sm leading-relaxed">
                                <div class="pt-4 border-t border-gray-100 text-justify">
                                    {{ $faq->jawaban }}
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="text-center py-8">
                        <p class="text-gray-500 italic">{{ $settings['empty_faq'] ?? 'Belum ada FAQ.' }}</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
