<?php $__env->startSection('title', 'Detail Nilai Murid'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="<?php echo e(route('admin.scores.index')); ?>" class="hover:text-primary-600 transition-colors font-medium text-gray-500">Nilai</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Detail Nilai</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <div class="mb-6">
        <?php if (isset($component)) { $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.tajuk-halaman','data' => ['title' => 'Detail Nilai Murid','backUrl' => ''.e(route('admin.scores.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.tajuk-halaman'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Detail Nilai Murid','backUrl' => ''.e(route('admin.scores.index')).'']); ?>
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
    </div>

    <!-- Top Banner: Hero Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-6 md:p-8 relative overflow-hidden mb-6">

        <div class="flex flex-col md:flex-row items-center md:items-start gap-6 relative z-10">
            <!-- 1. Avatar -->
            <div class="flex-shrink-0">
                <div class="w-20 h-20 md:w-24 md:h-24 rounded-full bg-primary-50 border border-primary-100 flex items-center justify-center text-4xl font-extrabold text-primary-700 shadow-sm">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
            </div>

            <div class="flex-grow text-center md:text-left w-full">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">

                    <!-- 2. Teks -->
                    <div>
                        <h2 class="text-2xl md:text-3xl font-extrabold text-primary-600"><?php echo e($student->nama_murid); ?></h2>
                        <p class="text-gray-900 font-semibold text-base mt-1"><?php echo e($student->sekolah ?? 'Sekolah Tidak Diketahui'); ?></p>
                    </div>
                </div>

                <!-- 4. Label Kelas -->
                <div class="mt-4 flex flex-col justify-center md:justify-start gap-2 border-t border-gray-100 pt-4">
                    <div class="inline-flex items-center justify-center md:justify-start text-sm font-medium text-gray-600 w-full md:w-auto">
                        <span class="text-sm font-semibold text-gray-600 mr-2">Tingkat Kelas:</span>
                        <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'gray','class' => 'inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-bold border tracking-wide uppercase']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'gray','class' => 'inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-bold border tracking-wide uppercase']); ?>
                            KELAS <?php echo e($student->kelas ?? '-'); ?> SD
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $attributes = $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $component = $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Feed Timeline per Program -->
    <?php $__empty_1 = true; $__currentLoopData = $scores->groupBy(function($q) { return $q->schedule->package->nama_program ?? 'Tanpa Paket'; }); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package => $packageNotes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div>
            <h3 class="text-xl font-bold text-gray-800 mb-4"><?php echo e($package); ?></h3>

            <div class="grid grid-cols-1 gap-6">
                <?php $__currentLoopData = $packageNotes->groupBy('jadwal_id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scheduleId => $scheduleNotes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $schedule = $scheduleNotes->first()->schedule; ?>
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                        <!-- Header Kelas -->
                        <div class="p-4 border-b border-gray-100 bg-gray-50/50 flex flex-col gap-1">
                            <h4 class="font-bold text-gray-800"><?php echo e($schedule->nama_kelas ?? 'Kelas Terhapus'); ?></h4>
                            <p class="text-xs text-gray-500 font-semibold"><?php echo e($schedule->hari ?? '-'); ?>, <?php echo e($schedule->formatted_time_range ?? '-'); ?></p>
                            <p class="text-xs text-gray-500 font-medium mt-1">Mentor: <span class="font-bold text-gray-700"><?php echo e($schedule->mentor->name ?? '-'); ?></span></p>
                        </div>

                        <!-- Timeline Feed -->
                        <div class="p-6">
                            <div class="relative border-l-2 border-gray-200 ml-2 space-y-6">
                                <?php $__currentLoopData = $scheduleNotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skor_nilai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        // Tentukan warna berdasarkan nilai
                                        $scoreColor = '';
                                        $scoreText = '';
                                        $scoreDotColor = '';
                                        if($skor_nilai->skor_nilai >= 80) {
                                            $scoreColor = 'text-primary-700 bg-primary-50 border-primary-200';
                                            $scoreText = 'Sangat Baik';
                                            $scoreDotColor = 'bg-primary-500';
                                        } elseif($skor_nilai->skor_nilai >= 60) {
                                            $scoreColor = 'text-yellow-700 bg-yellow-50 border-yellow-200';
                                            $scoreText = 'Cukup';
                                            $scoreDotColor = 'bg-yellow-500';
                                        } else {
                                            $scoreColor = 'text-red-700 bg-red-50 border-red-200';
                                            $scoreText = 'Kurang';
                                            $scoreDotColor = 'bg-red-500';
                                        }
                                    ?>

                                    <div x-data="{
                                        showEditModal: <?php echo e($errors->any() && old('note_id') == $skor_nilai->id ? 'true' : 'false'); ?>,
                                        materi_nilai: <?php echo \Illuminate\Support\Js::from((string) old('materi_nilai', $skor_nilai->materi_nilai))->toHtml() ?>,
                                        tipe_nilai: <?php echo \Illuminate\Support\Js::from((string) old('tipe_nilai', $skor_nilai->tipe_nilai))->toHtml() ?>,
                                        skor_nilai: <?php echo \Illuminate\Support\Js::from((string) old('skor_nilai', $skor_nilai->skor_nilai))->toHtml() ?>,
                                        notes_nilai: <?php echo \Illuminate\Support\Js::from((string) old('notes_nilai', $skor_nilai->notes_nilai))->toHtml() ?>,
                                        touched: { materi_nilai: false, skor_nilai: false },
                                        submitForm(e) {
                                            this.touched.materi_nilai = true;
                                            this.touched.skor_nilai = true;
                                            if (this.materi_nilai.trim() === '' || this.skor_nilai.toString().trim() === '') {
                                                e.preventDefault();
                                            }
                                        },
                                        resetForm() {
                                            this.materi_nilai = <?php echo \Illuminate\Support\Js::from((string) $skor_nilai->materi_nilai)->toHtml() ?>;
                                            this.tipe_nilai = <?php echo \Illuminate\Support\Js::from((string) $skor_nilai->tipe_nilai)->toHtml() ?>;
                                            this.skor_nilai = <?php echo \Illuminate\Support\Js::from((string) $skor_nilai->skor_nilai)->toHtml() ?>;
                                            this.notes_nilai = <?php echo \Illuminate\Support\Js::from((string) $skor_nilai->notes_nilai)->toHtml() ?>;
                                            this.touched = { materi_nilai: false, skor_nilai: false };
                                        }
                                    }" class="relative pl-6">
                                        <!-- Timeline Dot -->
                                        <div class="absolute -left-[5px] top-1.5 w-2 h-2 rounded-full ring-4 ring-white <?php echo e($scoreDotColor); ?>">
                                        </div>


                                        <!-- Analitik Card -->
                                        <div class="bg-white border border-gray-100 shadow-sm rounded-xl overflow-hidden hover:shadow-md transition-shadow group">

                                            <!-- Card Header -->
                                            <div class="flex flex-col sm:flex-row sm:items-center justify-between p-4 border-b border-gray-50 bg-gray-50/30 gap-4">
                                                <div>
                                                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1"><?php echo e(\Carbon\Carbon::parse($skor_nilai->tanggal_penilaian)->format('d M Y')); ?></p>
                                                    <h5 class="text-base font-bold text-gray-900"><?php echo e($skor_nilai->materi_nilai); ?></h5>
                                                </div>

                                                <!-- Badges -->
                                                <div class="flex items-center gap-2">
                                                    <div class="flex flex-col items-center justify-center bg-white border border-gray-200 rounded-lg px-3 py-1 shadow-sm">
                                                        <span class="text-[10px] text-gray-500 font-bold uppercase">Skor</span>
                                                        <span class="text-sm font-black text-gray-900"><?php echo e($skor_nilai->skor_nilai); ?></span>
                                                    </div>
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold border <?php echo e($scoreColor); ?>">
                                                        <?php echo e($skor_nilai->tipe_nilai); ?>

                                                    </span>

                                                    <!-- Edit Button -->
                                                    <button @click.prevent="showEditModal = true" class="inline-flex items-center p-2 text-gray-500 bg-gray-50 rounded-lg hover:bg-primary-50 hover:text-primary-600 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500" title="Koreksi">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                    </button>

                                                    <!-- Delete Button -->
                                                    <?php if (isset($component)) { $__componentOriginalcf42a78d44931673e004c6a791c8bc65 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf42a78d44931673e004c6a791c8bc65 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.formulir-hapus','data' => ['route' => route('admin.scores.destroy', $skor_nilai->id)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.formulir-hapus'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.scores.destroy', $skor_nilai->id))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf42a78d44931673e004c6a791c8bc65)): ?>
<?php $attributes = $__attributesOriginalcf42a78d44931673e004c6a791c8bc65; ?>
<?php unset($__attributesOriginalcf42a78d44931673e004c6a791c8bc65); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf42a78d44931673e004c6a791c8bc65)): ?>
<?php $component = $__componentOriginalcf42a78d44931673e004c6a791c8bc65; ?>
<?php unset($__componentOriginalcf42a78d44931673e004c6a791c8bc65); ?>
<?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- Card Body -->
                                            <div class="p-4">
                                                <p class="text-sm text-gray-700 leading-relaxed whitespace-pre-line"><?php echo e($skor_nilai->notes_nilai); ?></p>

                                                <div class="mt-4 pt-3 border-t border-gray-50 flex items-center justify-between">
                                                    <div class="flex items-center text-[10px] font-bold text-gray-400 uppercase">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                                        Mentor: <?php echo e($skor_nilai->schedule->mentor->name ?? '-'); ?>

                                                    </div>
                                                    <div class="text-[10px] font-bold text-gray-400 uppercase">
                                                        Diinput: <?php echo e($skor_nilai->created_at->format('d/m/y H:i')); ?> WIB
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Edit -->
                                        <template x-teleport="body">
                                            <div x-show="showEditModal" class="fixed inset-0 z-[9999] overflow-y-auto text-left" style="display: none;">
                                                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                    <div x-show="showEditModal" x-transition.opacity class="fixed inset-0 transition-opacity" aria-hidden="true">
                                                        <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm z-0"></div>
                                                    </div>

                                                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                                                    <div x-show="showEditModal"
                                                        @click.away="showEditModal = false; resetForm()"
                                                        x-transition:enter="ease-out duration-100"
                                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                        class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full relative z-10">

                                                        <form action="<?php echo e(route('admin.scores.update', $skor_nilai->id)); ?>" method="POST" @submit="submitForm" novalidate>
                                                            <!-- Input hidden to identify which form has errors -->
                                                            <input type="hidden" name="note_id" value="<?php echo e($skor_nilai->id); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('PUT'); ?>
                                                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6">
                                                                <h3 class="text-xl leading-6 font-bold text-gray-900 mb-2 flex items-center">
                                                                    <svg class="w-6 h-6 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                                    Koreksi Data Nilai
                                                                </h3>
                                                                <p class="text-sm text-gray-500 mb-5">Ubah catatan perkembangan atau tambahkan catatan untuk murid ini.</p>

                                                                <div class="bg-primary-50/50 p-4 rounded-xl border border-primary-100/50 mb-5">
                                                                    <p class="text-[10px] text-primary-600 font-bold mb-1 uppercase tracking-wider">Data Murid</p>
                                                                    <p class="font-bold text-gray-900"><?php echo e($skor_nilai->student->nama_murid); ?></p>
                                                                    <!-- Tambah validasi bawaan fungsi old() agar aman saat gagal submit -->
                                                                    <input type="date" name="tanggal_penilaian" value="<?php echo e(old('tanggal_penilaian', $skor_nilai->tanggal_penilaian)); ?>" max="<?php echo e(date('Y-m-d')); ?>" required class="mt-2 block w-full rounded-2xl p-3 border border-gray-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                                                                </div>

                                                                <div class="space-y-4">
                                                                    <div>
                                                                        <label class="block text-sm font-semibold text-gray-600 mb-2">Tipe Penilaian <span class="text-red-500">*</span></label>
                                                                        <select x-model="tipe_nilai" x-on:change="if(tipe_nilai !== 'Lainnya...') { $refs.customTypeInput.value = tipe_nilai; }" class="block w-full appearance-none rounded-2xl p-3 pr-10 border border-gray-200 shadow-sm focus:outline-none focus:border-primary-400 focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer">
                                                                            <?php
                                                                                $standardTypes = ['Pre-test', 'Post-test', 'Latihan Soal', 'Kuis', 'Ujian', 'Tugas', 'Games'];
                                                                                $isCustom = !in_array($skor_nilai->tipe_nilai, $standardTypes);
                                                                            ?>
                                                                            <?php $__currentLoopData = $standardTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option value="<?php echo e($type); ?>" <?php echo e(!$isCustom && $skor_nilai->tipe_nilai === $type ? 'selected' : ''); ?>><?php echo e($type); ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="Lainnya..." <?php echo e($isCustom ? 'selected' : ''); ?>>Lainnya...</option>
                                                                        </select>
                                                                        <input type="text" name="tipe_nilai" x-ref="customTypeInput" x-show="tipe_nilai === 'Lainnya...'" value="<?php echo e(old('tipe_nilai', $skor_nilai->tipe_nilai)); ?>" placeholder="Ketik tipe penilaian..." class="mt-3 block w-full rounded-2xl p-3 border border-gray-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                                                                    </div>

                                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                                        <div>
                                                                            <label class="block text-sm font-semibold text-gray-600 mb-2">Judul / Topik Penilaian <span class="text-red-500">*</span></label>
                                                                            <input type="text" name="materi_nilai" x-model="materi_nilai" @blur="touched.materi_nilai = true" :class="touched.materi_nilai && materi_nilai.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 focus:ring-primary-200'" class="block w-full rounded-2xl p-3 border shadow-sm focus:outline-none focus:ring-2 transition-colors duration-100 text-sm font-medium text-gray-800">
                                                                            <p x-show="touched.materi_nilai && materi_nilai.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                                                Judul wajib diisi.
                                                                            </p>
                                                                        </div>
                                                                        <div>
                                                                            <label class="block text-sm font-semibold text-gray-600 mb-2">Skor Nilai (0-100) <span class="text-red-500">*</span></label>
                                                                            <input type="number" name="skor_nilai" min="0" max="100" x-model="skor_nilai" @blur="touched.skor_nilai = true" :class="touched.skor_nilai && skor_nilai.toString().trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 focus:ring-primary-200'" class="block w-full rounded-2xl p-3 border shadow-sm focus:outline-none focus:ring-2 transition-colors duration-100 text-sm font-medium text-gray-800">
                                                                            <p x-show="touched.skor_nilai && skor_nilai.toString().trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                                                Skor wajib diisi.
                                                                            </p>
                                                                        </div>
                                                                    </div>

                                                                    <div>
                                                                        <label class="block text-sm font-semibold text-gray-600 mb-2">Catatan Khusus <span class="text-gray-400 font-normal">(Opsional)</span></label>
                                                                        <textarea name="notes_nilai" rows="3" x-model="notes_nilai" class="block w-full border-gray-200 rounded-2xl shadow-sm focus:outline-none focus:ring-2 focus:border-primary-400 focus:ring-primary-200 text-sm font-medium text-gray-800 p-3 transition-colors duration-100"></textarea>
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
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-12">
            <?php if (isset($component)) { $__componentOriginala248761445578b3580e6fcec2c0db260 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala248761445578b3580e6fcec2c0db260 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.keadaan-kosong','data' => ['icon' => 'document-text','title' => 'Belum ada Nilai','message' => 'Murid ini belum memiliki nilai.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.keadaan-kosong'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'document-text','title' => 'Belum ada Nilai','message' => 'Murid ini belum memiliki nilai.']); ?>
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
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ruang-les\resources\views/admin/nilai/detail.blade.php ENDPATH**/ ?>