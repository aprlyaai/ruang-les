<?php $__env->startSection('title', 'Catatan Perkembangan'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Catatan Perkembangan</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <?php if (isset($component)) { $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.tajuk-halaman','data' => ['title' => 'Daftar Catatan Perkembangan','description' => 'Pantau jurnal akademik harian dan perkembangan murid secara mendetail.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.tajuk-halaman'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Daftar Catatan Perkembangan','description' => 'Pantau jurnal akademik harian dan perkembangan murid secara mendetail.']); ?>
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

<!-- Advanced Filter Panel -->
<?php if (isset($component)) { $__componentOriginal67f5acd0d126aeb8590f06554d75b8bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67f5acd0d126aeb8590f06554d75b8bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.filter-akademik','data' => ['actionUrl' => ''.e(route('admin.progress-notes.index')).'','resetUrl' => ''.e(route('admin.progress-notes.index')).'','filterPackages' => $filterPackages,'filterClasses' => $filterClasses,'filterStudents' => $filterStudents,'filterMentors' => $filterMentors]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.filter-akademik'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['actionUrl' => ''.e(route('admin.progress-notes.index')).'','resetUrl' => ''.e(route('admin.progress-notes.index')).'','filterPackages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($filterPackages),'filterClasses' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($filterClasses),'filterStudents' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($filterStudents),'filterMentors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($filterMentors)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal67f5acd0d126aeb8590f06554d75b8bc)): ?>
<?php $attributes = $__attributesOriginal67f5acd0d126aeb8590f06554d75b8bc; ?>
<?php unset($__attributesOriginal67f5acd0d126aeb8590f06554d75b8bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67f5acd0d126aeb8590f06554d75b8bc)): ?>
<?php $component = $__componentOriginal67f5acd0d126aeb8590f06554d75b8bc; ?>
<?php unset($__componentOriginal67f5acd0d126aeb8590f06554d75b8bc); ?>
<?php endif; ?>

<!-- Master Log Table -->
<div x-data="{
    showEditModal: false,
    editData: {
        id: '',
        studentName: '',
        date: '',
        materi: '',
        status_fokus: '',
        skor_pemahaman: '',
        catatan_perkembangan: '',
        actionUrl: ''
    },
    touched: { materi: false, catatan_perkembangan: false },
    submitForm(e) {
        this.touched.materi = true;
        this.touched.catatan_perkembangan = true;
        if (this.editData.materi.trim() === '' || this.editData.catatan_perkembangan.trim() === '') {
            e.preventDefault();
        }
    },
    resetForm() {
        this.touched = { materi: false, catatan_perkembangan: false };
    }
}"
@open-edit-modal.window="
    editData = $event.detail;
    showEditModal = true;
"
class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
        <h2 class="text-lg font-bold text-gray-800">Semua Catatan Perkembangan</h2>
        <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary']); ?><?php echo e($notes->total()); ?> Data Tersedia <?php echo $__env->renderComponent(); ?>
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

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-gray-50/50 border-b border-primary-100/50">
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Paket Program</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Jadwal Kelas</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal & Waktu</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Murid</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Topik & Fokus</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Mentor</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $__empty_1 = true; $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-4 py-3 align-middle">
                        <?php if(isset($note->schedule->package)): ?>
                            <span class="text-sm font-semibold text-gray-900"><?php echo e($note->schedule->package->nama_program); ?></span>
                        <?php else: ?>
                            <span class="text-sm italic text-gray-500">Tanpa Paket</span>
                        <?php endif; ?>
                    </td>
                    <td class="px-4 py-3 align-middle">
                        <p class="text-sm font-semibold text-gray-900"><?php echo e($note->schedule->nama_kelas ?? 'Kelas Terhapus'); ?></p>
                        <p class="text-xs text-gray-500 mt-1"><?php echo e($note->schedule->hari ?? '-'); ?>, <?php echo e($note->schedule->formatted_time_range ?? '-'); ?></p>
                    </td>
                    <td class="px-4 py-3 align-middle">
                        <div class="flex flex-col gap-1">
                            <p class="text-sm font-semibold text-gray-900" title="Tanggal Pertemuan Kelas">
                                <span class="text-[10px] uppercase text-gray-500 font-bold block mb-0.5">Pertemuan:</span>
                                <?php echo e(\Carbon\Carbon::parse($note->tanggal_catatan)->format('d M Y')); ?>

                            </p>
                            <p class="text-xs text-gray-500" title="Waktu Input Data oleh Mentor">
                                <span class="text-[10px] uppercase text-gray-500 font-bold">Input:</span>
                                <?php echo e($note->created_at->format('d M, H:i')); ?>

                            </p>
                        </div>
                    </td>
                    <td class="px-4 py-3 align-middle">
                        <p class="text-sm font-bold text-gray-900"><?php echo e($note->student->nama_murid ?? 'Murid Terhapus'); ?></p>
                        <a href="<?php echo e(route('admin.progress-notes.show', $note->murid_id)); ?>" class="inline-flex items-center mt-1.5 text-[11px] font-bold text-primary-600 hover:text-primary-800 bg-primary-50 hover:bg-primary-100 border border-primary-100 px-2 py-0.5 rounded transition-colors">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            Buku Perkembangan
                        </a>
                    </td>
                    <td class="px-4 py-3 align-middle">
                        <p class="text-sm font-semibold text-gray-900" title="<?php echo e($note->materi); ?>"><?php echo e($note->materi); ?></p>
                        <div class="mt-1 flex items-center gap-2">
                            <?php if($note->status_fokus === 'sangat_fokus'): ?>
                                <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary','class' => 'inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold border w-fit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary','class' => 'inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold border w-fit']); ?>Sangat Fokus <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $attributes = $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $component = $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
                            <?php elseif($note->status_fokus === 'fokus'): ?>
                                <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary','class' => 'inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold border w-fit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary','class' => 'inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold border w-fit']); ?>Fokus <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $attributes = $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $component = $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
                            <?php elseif($note->status_fokus === 'kurang_fokus'): ?>
                                <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'warning','class' => 'inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold border w-fit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'warning','class' => 'inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold border w-fit']); ?>Kurang Fokus <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $attributes = $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $component = $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
                            <?php elseif($note->status_fokus === 'tidak_fokus'): ?>
                                <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'danger','class' => 'inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold border w-fit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'danger','class' => 'inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold border w-fit']); ?>Tidak Fokus <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $attributes = $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $component = $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
                            <?php endif; ?>
                            <?php if($note->skor_pemahaman !== null): ?>
                                <span class="text-xs text-gray-500">Skor: <?php echo e($note->skor_pemahaman); ?>% paham</span>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td class="text-sm font-semibold text-gray-900"><?php echo e($note->mentor->name ?? 'Sistem'); ?></td>
                    <td class="px-4 py-3 align-middle text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button @click.prevent="$dispatch('open-edit-modal', {
                                id: <?php echo e($note->id); ?>,
                                studentName: '<?php echo e(addslashes($note->student->nama_murid)); ?>',
                                date: '<?php echo e($note->tanggal_catatan); ?>',
                                materi: '<?php echo e(addslashes($note->materi)); ?>',
                                status_fokus: '<?php echo e($note->status_fokus); ?>',
                                skor_pemahaman: '<?php echo e($note->skor_pemahaman ?? ''); ?>',
                                catatan_perkembangan: '<?php echo e(addslashes($note->catatan_perkembangan)); ?>',
                                actionUrl: '<?php echo e(route('admin.progress-notes.update', $note->id)); ?>'
                            })" class="inline-flex items-center justify-center px-3 py-1.5 min-h-[25px] min-w-[25px] text-xs font-bold text-gray-600 bg-white border border-gray-200 transition-all duration-100 rounded-lg hover:bg-primary-50 hover:text-primary-600 hover:border-primary-200 shadow-sm" title="Koreksi">
                                Koreksi
                            </button>
                            <?php if (isset($component)) { $__componentOriginalcf42a78d44931673e004c6a791c8bc65 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf42a78d44931673e004c6a791c8bc65 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.formulir-hapus','data' => ['route' => route('admin.progress-notes.destroy', $note->id)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.formulir-hapus'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.progress-notes.destroy', $note->id))]); ?>
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
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7" class="px-6 py-12 align-middle">
                        <?php if (isset($component)) { $__componentOriginala248761445578b3580e6fcec2c0db260 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala248761445578b3580e6fcec2c0db260 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.keadaan-kosong','data' => ['icon' => 'document-text','title' => 'Data Catatan Perkembangan Tidak Ditemukan','message' => 'Tidak ada data catatan perkembangan yang sesuai dengan filter Anda. Coba sesuaikan rentang tanggal atau atur ulang filter.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.keadaan-kosong'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'document-text','title' => 'Data Catatan Perkembangan Tidak Ditemukan','message' => 'Tidak ada data catatan perkembangan yang sesuai dengan filter Anda. Coba sesuaikan rentang tanggal atau atur ulang filter.']); ?>
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
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if($notes->hasPages()): ?>
    <div class="p-4 border-t border-gray-100 bg-gray-50/50">
        <?php echo e($notes->appends(request()->query())->links()); ?>

    </div>
    <?php endif; ?>

    <!-- Modal Edit (Alpine Style) -->
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

                    <form :action="editData.actionUrl" method="POST" @submit="submitForm" novalidate>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6">
                            <h3 class="text-xl leading-6 font-bold text-gray-900 mb-2 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                Koreksi Catatan Perkembangan
                            </h3>
                            <p class="text-sm text-gray-500 mb-5">Ubah catatan perkembangan atau tambahkan catatan untuk murid ini.</p>

                            <div class="bg-primary-50/50 p-4 rounded-xl border border-primary-100/50 mb-5">
                                <p class="text-[10px] text-primary-600 font-bold mb-1 uppercase tracking-wider">Data Murid</p>
                                <p class="font-bold text-gray-900" x-text="editData.studentName"></p>
                                <input type="date" name="date" x-model="editData.date" max="<?php echo e(date('Y-m-d')); ?>" class="mt-2 block w-full rounded-2xl p-3 border border-gray-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-600 mb-2">Materi / Topik Pembelajaran <span class="text-red-500">*</span></label>
                                    <input type="text" name="materi" x-model="editData.materi" @blur="touched.materi = true" :class="touched.materi && editData.materi.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 focus:ring-primary-200'" class="block w-full rounded-2xl p-3 border shadow-sm focus:outline-none focus:ring-2 transition-colors duration-100 text-sm font-medium text-gray-800">
                                    <p x-show="touched.materi && editData.materi.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        Materi / Topik wajib diisi.
                                    </p>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-600 mb-2">Status Fokus <span class="text-red-500">*</span></label>
                                        <select name="status_fokus" x-model="editData.status_fokus" required class="block w-full appearance-none rounded-2xl p-3 pr-10 border border-gray-200 shadow-sm focus:outline-none focus:border-primary-400 focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer">
                                            <option value="sangat_fokus">Sangat Fokus</option>
                                            <option value="fokus">Fokus</option>
                                            <option value="kurang_fokus">Kurang Fokus</option>
                                            <option value="tidak_fokus">Tidak Fokus</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-600 mb-2">Skor Pemahaman (0-100)</label>
                                        <input type="number" name="skor_pemahaman" min="0" max="100" x-model="editData.skor_pemahaman" class="block w-full rounded-2xl p-3 border border-gray-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-600 mb-2">Catatan Perkembangan <span class="text-red-500">*</span></label>
                                    <textarea name="catatan_perkembangan" rows="3" x-model="editData.catatan_perkembangan" @blur="touched.catatan_perkembangan = true" :class="touched.catatan_perkembangan && editData.catatan_perkembangan.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 focus:ring-primary-200'" class="block w-full border rounded-2xl shadow-sm focus:outline-none focus:ring-2 text-sm font-medium text-gray-800 p-3 transition-colors duration-100"></textarea>
                                    <p x-show="touched.catatan_perkembangan && editData.catatan_perkembangan.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        Catatan perkembangan wajib diisi.
                                    </p>
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
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ruang-les\resources\views/admin/catatan-perkembangan/daftar.blade.php ENDPATH**/ ?>