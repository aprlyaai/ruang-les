<?php $__env->startSection('title', 'Materi Belajar'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6" x-data="{ previewModalOpen: false, previewTitle: '', previewUrl: '', isImage: false }">

    <?php if (isset($component)) { $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.tajuk-halaman','data' => ['title' => 'Materi Belajar','description' => 'Akses modul, latihan soal, dan kunci jawaban sesuai dengan jenjang kelas Anak Anda.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.tajuk-halaman'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Materi Belajar','description' => 'Akses modul, latihan soal, dan kunci jawaban sesuai dengan jenjang kelas Anak Anda.']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce)): ?>
<?php $attributes = $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce; ?>
<?php unset($__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce)): ?>
<?php $component = $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce; ?>
<?php unset($__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce); ?>
<?php endif; ?>

    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden mb-6 mt-6">
        <div class="p-5 border-b border-gray-100 bg-gray-50/50">
            <h2 class="text-lg font-bold text-gray-800 flex items-center">
                <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                Filter Pencarian
            </h2>
        </div>
        <div class="p-5">
            <form action="<?php echo e(route('ortu.repositori')); ?>" method="GET">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">

                    <!-- Search Box -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Kata Kunci</label>
                        <div class="relative">
                            <!-- Ikon Kaca Pembesar -->
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>

                            <!-- Input Field -->
                            <input type="text"
                                name="search"
                                value="<?php echo e(request('search')); ?>"
                                placeholder="Cari nama materi atau topik..."
                                class="w-full rounded-2xl py-3 pl-10 pr-4 border border-gray-200 bg-gray-50 text-sm font-medium text-gray-800 shadow-sm focus:bg-white focus:border-primary-400 focus:ring-2 focus:ring-primary-200 focus:outline-none transition-all duration-150">
                        </div>
                    </div>

                    <!-- Dropdown Mapel -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Mata Pelajaran</label>
                        <select name="mapel" class="w-full appearance-none rounded-2xl py-3 pl-4 pr-10 border border-gray-200 bg-gray-50 text-sm font-medium text-gray-800 shadow-sm focus:bg-white focus:border-primary-400 focus:ring-2 focus:ring-primary-200 focus:outline-none transition-all duration-150 cursor-pointer bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat">
                            <option value="">Semua Mapel</option>
                            <?php $__currentLoopData = $mapels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($m); ?>" <?php echo e(request('mapel') == $m ? 'selected' : ''); ?>><?php echo e($m); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <!-- Dropdown Tipe Materi -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Tipe Materi</label>
                        <select name="tipe_materi" class="w-full appearance-none rounded-2xl py-3 pl-4 pr-10 border border-gray-200 bg-gray-50 text-sm font-medium text-gray-800 shadow-sm focus:bg-white focus:border-primary-400 focus:ring-2 focus:ring-primary-200 focus:outline-none transition-all duration-150 cursor-pointer bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat">
                            <option value="">Semua Tipe</option>
                            <option value="Modul Teori" <?php echo e(request('tipe_materi') == 'Modul Teori' ? 'selected' : ''); ?>>Modul Teori</option>
                            <option value="Latihan Soal" <?php echo e(request('tipe_materi') == 'Latihan Soal' ? 'selected' : ''); ?>>Latihan Soal</option>
                            <option value="Kunci Jawaban" <?php echo e(request('tipe_materi') == 'Kunci Jawaban' ? 'selected' : ''); ?>>Kunci Jawaban</option>
                        </select>
                    </div>

                </div>

                <div class="mt-4 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">
                    <a href="<?php echo e(route('ortu.repositori')); ?>" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-xl hover:bg-gray-100 focus:outline-none">
                        Reset Filter
                    </a>
                    <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-white transition-all duration-100 bg-primary-600 border border-transparent rounded-xl hover:bg-primary-700 shadow-sm focus:outline-none">
                        Terapkan Filter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-6">
        <?php if($materials->isEmpty()): ?>
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 overflow-hidden">
                <?php if (isset($component)) { $__componentOriginala248761445578b3580e6fcec2c0db260 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala248761445578b3580e6fcec2c0db260 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.keadaan-kosong','data' => ['title' => 'Materi Tidak Ditemukan','message' => 'Belum ada materi belajar yang diunggah untuk kelas anak ini, atau tidak ada data yang cocok dengan kriteria filter Anda.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.keadaan-kosong'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Materi Tidak Ditemukan','message' => 'Belum ada materi belajar yang diunggah untuk kelas anak ini, atau tidak ada data yang cocok dengan kriteria filter Anda.']); ?>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala248761445578b3580e6fcec2c0db260)): ?>
<?php $attributes = $__attributesOriginala248761445578b3580e6fcec2c0db260; ?>
<?php unset($__attributesOriginala248761445578b3580e6fcec2c0db260); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala248761445578b3580e6fcec2c0db260)): ?>
<?php $component = $__componentOriginala248761445578b3580e6fcec2c0db260; ?>
<?php unset($__componentOriginala248761445578b3580e6fcec2c0db260); ?>
<?php endif; ?>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php $__currentLoopData = $materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $isNew = $material->created_at->diffInDays(now()) <= 3;
                        $fileExt = $material->sumber_tautan ? pathinfo($material->sumber_tautan, PATHINFO_EXTENSION) : 'link';
                        $isImageFile = in_array(strtolower($fileExt), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                        $previewUrl = $material->url_tautan ? $material->url_tautan : asset('storage/' . $material->sumber_tautan);
                    ?>

                    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.05)] hover:shadow-[0_8px_20px_-6px_rgba(6,81,237,0.1)] hover:-translate-y-1 transition-all duration-300 flex flex-col h-full group relative overflow-hidden">

                        <!-- Header Card -->
                        <div class="flex justify-between items-center mb-3">
                            <div class="flex items-center gap-1.5 px-2 py-0.5 rounded-full text-[10px] font-bold bg-primary-50 text-primary-600 border border-primary-200 w-fit">
                                <?php if($material->tipe_materi == 'Modul Teori'): ?>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <?php elseif($material->tipe_materi == 'Latihan Soal'): ?>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                <?php else: ?>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <?php endif; ?>
                                <?php echo e($material->tipe_materi); ?>

                            </div>

                            <?php if($isNew): ?>
                                <div class="flex items-center gap-1.5 text-[10px] font-bold text-red-500 uppercase tracking-widest">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>
                                    Baru
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Body Card -->
                        <div class="flex-grow">
                            <h3 class="text-base font-extrabold text-gray-900 group-hover:text-primary-600 transition-colors line-clamp-2 mb-1 min-h-[3rem]" title="<?php echo e($material->nama_materi); ?>">
                                <?php echo e($material->nama_materi); ?>

                            </h3>

                            <div class="h-4 mb-2">
                                <?php if($material->topik_bab): ?>
                                    <p class="text-xs text-gray-500 truncate">Topik: <span class="font-semibold text-gray-700"><?php echo e($material->topik_bab); ?></span></p>
                                <?php endif; ?>
                            </div>

                            <div class="h-10 mb-4">
                                <?php if($material->deskripsi_materi): ?>
                                    <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed"><?php echo e($material->deskripsi_materi); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Footer Info -->
                        <div class="mt-auto pt-4 border-t border-gray-50">
                            <div class="flex flex-col space-y-2 mb-4">
                                <div class="flex items-center text-xs text-gray-600 font-medium">
                                    <svg class="w-4 h-4 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                    Kelas <?php echo e($material->kelas_materi ?? 'Semua'); ?> &bull; <?php echo e($material->nama_mapel ?? 'Umum'); ?>

                                </div>
                                <div class="flex items-center text-xs text-gray-600 font-medium">
                                    <svg class="w-4 h-4 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    Diunggah <?php echo e($material->created_at->translatedFormat('d M Y')); ?>

                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex grid grid-cols-2 gap-2 mt-4 transition-all duration-300">
                                <?php if(isset($isPaymentPending) && $isPaymentPending): ?>
                                    <button type="button"
                                            onclick="showPaymentWarning()"
                                            class="inline-flex justify-center items-center px-3 py-2 border border-gray-200 text-xs font-bold rounded-xl text-gray-500 bg-gray-100 cursor-not-allowed opacity-80" title="Verifikasi Pembayaran Tertunda">
                                        <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" /></svg>
                                        Pratinjau
                                    </button>
                                    <button type="button"
                                            onclick="showPaymentWarning()"
                                            class="inline-flex justify-center items-center px-3 py-2 border border-gray-200 text-xs font-bold rounded-xl text-gray-500 bg-gray-100 cursor-not-allowed opacity-80" title="Verifikasi Pembayaran Tertunda">
                                        <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" /></svg>
                                        Unduh
                                    </button>
                                <?php else: ?>
                                    <button type="button"
                                            @click.prevent="previewTitle = '<?php echo e(addslashes($material->nama_materi)); ?>'; previewUrl = '<?php echo e($previewUrl); ?>'; isImage = <?php echo e($isImageFile ? 'true' : 'false'); ?>; previewModalOpen = true;"
                                            class="inline-flex justify-center items-center px-3 py-2 border border-primary-200 text-xs font-bold rounded-xl text-primary-700 bg-primary-50 hover:bg-primary-100 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-primary-500 transition-colors">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        Pratinjau
                                    </button>
                                    <a href="<?php echo e($previewUrl); ?>" target="_blank"
                                       class="inline-flex justify-center items-center px-3 py-2 border text-xs font-bold rounded-xl transition-colors focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-primary-500 <?php echo e($material->sumber_tautan == 'YouTube' ? 'bg-red-50 text-red-700 hover:bg-red-100 border-red-100' : ($material->sumber_tautan == 'Google Drive' ? 'bg-blue-50 text-blue-700 hover:bg-blue-100 border-blue-100' : 'bg-white text-gray-700 hover:bg-gray-100 border-gray-200')); ?>">
                                        <?php if($material->tipe_materi == 'tautan'): ?>
                                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                            Buka
                                        <?php else: ?>
                                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                            Unduh
                                        <?php endif; ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php if($materials->hasPages()): ?>
                <div class="mt-8 mb-4">
                    <?php echo e($materials->appends(['search' => request('search'), 'mapel' => request('mapel'), 'tipe_materi' => request('tipe_materi')])->links()); ?>

                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <!-- Live Preview Modal for Document/Video iframe -->
    <div x-show="previewModalOpen" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6" aria-labelledby="modal-nama_materi" role="dialog" aria-modal="true">

        <!-- Backdrop -->
        <div x-show="previewModalOpen"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm transition-opacity"
             @click="previewModalOpen = false"
             aria-hidden="true"></div>

        <!-- Modal Panel -->
        <div x-show="previewModalOpen"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative bg-white rounded-2xl text-left shadow-2xl transform transition-all w-full max-w-7xl flex flex-col overflow-hidden h-[90vh] sm:h-[95vh]">

            <!-- Header -->
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex justify-between items-center shrink-0">
                <h3 class="text-lg leading-6 font-bold text-gray-900" id="modal-nama_materi" x-text="previewTitle">Pratinjau Dokumen</h3>
                <button type="button" @click="previewModalOpen = false" class="bg-gray-50 rounded-xl p-2 text-gray-400 hover:text-gray-500 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors">
                    <span class="sr-only">Tutup</span>
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>

            <!-- Body -->
            <div class="bg-white p-4 sm:p-6 flex-grow flex flex-col overflow-hidden">
                <div class="flex-grow w-full bg-gray-100 rounded-xl border border-gray-200 overflow-hidden flex items-center justify-center relative">
                    <!-- Loading Indicator -->
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none" id="preview-loader">
                        <svg class="animate-spin h-8 w-8 text-primary-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>

                    <!-- Iframe for PDF/HTML/Links -->
                    <iframe x-show="!isImage" :src="previewUrl" class="absolute inset-0 w-full h-full z-10 border-0" onload="document.getElementById('preview-loader').style.display='none'"></iframe>

                    <!-- Image tag for Images -->
                    <img x-show="isImage" :src="previewUrl" class="absolute inset-0 w-full h-full object-contain z-10" alt="Preview Gambar" onload="document.getElementById('preview-loader').style.display='none'">
                </div>

                <!-- Footer Text -->
                <div class="mt-4 flex flex-col sm:flex-row sm:items-center justify-between text-xs sm:text-sm text-gray-500 shrink-0 gap-2 sm:gap-0">
                    <p class="flex items-center">
                        <svg class="w-4 h-4 mr-1.5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Beberapa jenis file mungkin tidak dapat dipratinjau dan akan diunduh otomatis.
                    </p>
                    <a :href="previewUrl" target="_blank" class="font-bold text-primary-600 hover:text-primary-700 whitespace-nowrap">
                        Buka di tab baru
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $__env->startPush('scripts'); ?>
<script>
    function showPaymentWarning() {
        Swal.fire({
            icon: 'warning',
            nama_materi: 'Akses Terkunci',
            text: 'Pembayaran tagihan Anda sedang dalam proses verifikasi oleh Admin. Anda akan dapat mengakses materi belajar setelah verifikasi selesai.',
            confirmButtonText: 'Mengerti',
            confirmButtonColor: '#B7D9B1',
            customClass: {
                confirmButton: 'text-gray-800 font-bold',
                popup: 'rounded-2xl shadow-xl border border-gray-100',
                nama_materi: 'text-xl text-gray-800'
            }
        });
    }
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.orang-tua', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ruang-les\resources\views/orang-tua/repositori/daftar.blade.php ENDPATH**/ ?>