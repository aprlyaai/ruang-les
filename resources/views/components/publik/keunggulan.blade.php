@props(['settings', 'features'])

<section class="py-16 lg:py-20 relative">
    <!-- Decorative blob -->
    <div class="absolute right-0 top-1/2 transform -translate-y-1/2 translate-x-1/3 w-96 h-96 bg-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 -z-10"></div>

    <div class="relative z-10 max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <x-antarmuka.lencana color="primary" class="inline-block py-1 px-3 rounded-full text-[11px] font-bold uppercase tracking-widest mb-4 border">
            {{ $settings['features_label'] ?? 'Kenapa Memilih Kami?' }}
        </x-antarmuka.lencana>
        <h2 class="font-heading text-2xl md:text-3xl font-extrabold text-gray-900 mb-6">{!! nl2br(e($settings['features_headline'] ?? 'Belajar Lebih Dekat, Pantau Lebih Mudah')) !!}</h2>
        <p class="text-base text-gray-600 max-w-2xl mx-auto mb-12">
            {{ $settings['features_description'] ?? 'Anak butuh mentor yang sabar, dan orang tua butuh kepastian. Di Ruang Les, anak Anda mendapat bimbingan yang nyaman, sementara Anda bisa memantau perkembangannya kapan saja secara online.' }}
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-[90rem] mx-auto lg:pb-8">
            @php
            $svgIcons = [
                '<svg class="w-7 h-7 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>', // Smile
                '<svg class="w-7 h-7 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>', // Lightning
                '<svg class="w-7 h-7 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>', // Shield Check
                '<svg class="w-7 h-7 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>', // Book
                '<svg class="w-7 h-7 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg>', // Chat
                '<svg class="w-7 h-7 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>' // Sparkles
            ];
            @endphp
            @foreach($features as $index => $feature)
            <!-- Card {{ $index + 1 }}: {{ $feature->nama_keunggulan }} -->
            <div class="bg-white/70 backdrop-blur-md rounded-2xl shadow-sm hover:shadow-xl border border-primary-100/50 p-5 sm:p-6 transform hover:-translate-y-1 transition-all duration-300 flex flex-col sm:flex-row items-start gap-4 sm:gap-5 text-left {{ $index % 2 != 0 ? 'lg:relative lg:top-8' : '' }}">
                <div class="flex flex-row items-center sm:items-start gap-4 sm:gap-0 w-full sm:w-auto flex-shrink-0">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-primary-500 to-primary-700 rounded-xl sm:rounded-2xl flex items-center justify-center shadow-lg shadow-primary-500/30 text-white">
                        {!! $svgIcons[$index % count($svgIcons)] !!}
                    </div>
                    <h3 class="font-heading text-lg font-bold text-gray-900 sm:hidden leading-tight flex-1">{{ $feature->nama_keunggulan }}</h3>
                </div>
                <div class="mt-1 sm:mt-0">
                    <h3 class="font-heading text-xl font-bold text-gray-900 hidden sm:block mb-2">{{ $feature->nama_keunggulan }}</h3>
                    <p class="text-gray-600 leading-relaxed text-sm text-justify">
                        {{ $feature->deskripsi_keunggulan }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
