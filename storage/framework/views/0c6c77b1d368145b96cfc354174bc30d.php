<!-- Langkah 6: Review -->
<div class="space-y-6">

    <?php
        $selectedPaket = isset($draft->draft_data['program_id']) ? collect($pakets)->firstWhere('program_id', $draft->draft_data['program_id']) : null;
        $schedule1 = isset($draft->draft_data['jadwal_1_id']) ? collect($schedules)->firstWhere('jadwal_id', $draft->draft_data['jadwal_1_id']) : null;
        $schedule2 = isset($draft->draft_data['jadwal_2_id']) ? collect($schedules)->firstWhere('jadwal_id', $draft->draft_data['jadwal_2_id']) : null;
    ?>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">

        <!-- 1. Identitas Anak -->
        <div class="bg-white/60 backdrop-blur-md p-5 md:p-6 rounded-2xl border border-white/50 shadow-sm transition-all hover:shadow-md hover:bg-white/80 h-full">
            <div class="flex items-center gap-3 mb-4 border-b border-gray-100 pb-3">
                <div class="w-10 h-10 rounded-full bg-primary-50 flex items-center justify-center text-primary-700 shadow-sm border border-primary-200 shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <h3 class="text-xl font-extrabold text-gray-800 tracking-tight">Identitas Anak</h3>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-1">
                <div class="py-2 border-b border-gray-100/80">
                    <span class="block text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-0.5">Nama Lengkap</span>
                    <span class="font-medium text-gray-800 text-sm"><?php echo e($draft->draft_data['nama_murid'] ?? '-'); ?></span>
                </div>
                <div class="py-2 border-b border-gray-100/80">
                    <span class="block text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-0.5">Nama Panggilan</span>
                    <span class="font-medium text-gray-800 text-sm"><?php echo e($draft->draft_data['panggilan_murid'] ?? '-'); ?></span>
                </div>
                <div class="py-2 border-b border-gray-100/80 sm:col-span-2">
                    <span class="block text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-0.5">Tempat, Tanggal Lahir</span>
                    <span class="font-medium text-gray-800 text-sm">
                        <?php echo e($draft->draft_data['tempat_lahir_murid'] ?? '-'); ?>,
                        <?php echo e(isset($draft->draft_data['tanggal_lahir_murid']) && $draft->draft_data['tanggal_lahir_murid'] ? \Carbon\Carbon::parse($draft->draft_data['tanggal_lahir_murid'])->locale('id')->translatedFormat('d F Y') : '-'); ?>

                    </span>
                </div>
                <div class="py-2 border-b border-gray-100/80 border-b-transparent sm:border-b-gray-100/80">
                    <span class="block text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-0.5">Jenis Kelamin</span>
                    <span class="font-medium text-gray-800 text-sm"><?php echo e($draft->draft_data['jenis_kelamin_murid'] ?? '-'); ?></span>
                </div>
                <div class="py-2 border-b-transparent">
                    <span class="block text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-0.5">Agama</span>
                    <span class="font-medium text-gray-800 text-sm"><?php echo e($draft->draft_data['agama'] ?? '-'); ?></span>
                </div>
            </div>
        </div>

        <!-- 3. Orang Tua / Wali (Dipindah agar bersebelahan dengan Anak) -->
        <div class="bg-white/60 backdrop-blur-md p-5 md:p-6 rounded-2xl border border-white/50 shadow-sm transition-all hover:shadow-md hover:bg-white/80 h-full">
            <div class="flex items-center gap-3 mb-4 border-b border-gray-100 pb-3">
                <div class="w-10 h-10 rounded-full bg-primary-50 flex items-center justify-center text-primary-700 shadow-sm border border-primary-200 shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3 class="text-xl font-extrabold text-gray-800 tracking-tight">Informasi Orang Tua</h3>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-1">
                <div class="py-2 border-b border-gray-100/80">
                    <span class="block text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-0.5">Nama Lengkap</span>
                    <span class="font-medium text-gray-800 text-sm"><?php echo e($draft->draft_data['nama_ortu'] ?? '-'); ?></span>
                </div>
                <div class="py-2 border-b border-gray-100/80">
                    <span class="block text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-0.5">Status Hubungan</span>
                    <span class="font-medium text-gray-800 text-sm"><?php echo e($draft->draft_data['status_hubungan'] ?? '-'); ?></span>
                </div>
                <div class="py-2 border-b border-gray-100/80">
                    <span class="block text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-0.5">Nomor Telepon</span>
                    <span class="font-medium text-gray-800 text-sm"><?php echo e($draft->draft_data['nomor_telepon'] ?? '-'); ?></span>
                </div>
                <div class="py-2 border-b border-gray-100/80">
                    <span class="block text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-0.5">Email</span>
                    <span class="font-medium text-gray-800 text-sm"><?php echo e($draft->draft_data['email'] ?? '-'); ?></span>
                </div>
                <div class="py-2 sm:col-span-2 border-b-transparent">
                    <span class="block text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-0.5">Alamat Lengkap</span>
                    <span class="font-medium text-gray-800 text-sm"><?php echo e($draft->draft_data['alamat_domisili'] ?? '-'); ?></span>
                </div>
            </div>
        </div>

        <!-- 2. Akademik (Dibuat full width) -->
        <div class="lg:col-span-2 bg-white/60 backdrop-blur-md p-5 md:p-6 rounded-2xl border border-white/50 shadow-sm transition-all hover:shadow-md hover:bg-white/80">
            <div class="flex items-center gap-3 mb-4 border-b border-gray-100 pb-3">
                <div class="w-10 h-10 rounded-full bg-primary-50 flex items-center justify-center text-primary-700 shadow-sm border border-primary-200 shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                </div>
                <h3 class="text-xl font-extrabold text-gray-800 tracking-tight">Data Akademik</h3>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-1">
                <div class="py-2 border-b border-gray-100/80 md:col-span-2">
                    <span class="block text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-0.5">Asal Sekolah</span>
                    <span class="font-medium text-gray-800 text-sm"><?php echo e($draft->draft_data['sekolah'] ?? '-'); ?></span>
                </div>
                <div class="py-2 border-b border-gray-100/80">
                    <span class="block text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-0.5">Kelas</span>
                    <span class="font-medium text-gray-800 text-sm"><?php echo e($draft->draft_data['kelas'] ?? '-'); ?> SD</span>
                </div>
                <div class="py-2 border-b border-gray-100/80">
                    <span class="block text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-0.5">Nilai Rata-rata Rapor</span>
                    <span class="font-medium text-gray-800 text-sm"><?php echo e($draft->draft_data['nilai_rata_rata'] ?? '-'); ?></span>
                </div>
                <div class="py-2 border-b border-gray-100/80 sm:col-span-2">
                    <span class="block text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-0.5">Mata Pelajaran yang Ingin Ditingkatkan</span>
                    <span class="font-medium text-gray-800 text-sm"><?php echo e($draft->draft_data['mapel_ditingkatkan'] ?? '-'); ?></span>
                </div>
                <div class="py-2 border-b border-gray-100/80 sm:col-span-2">
                    <span class="block text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-0.5">Mata Pelajaran Paling Sulit</span>
                    <span class="font-medium text-gray-800 text-sm"><?php echo e($draft->draft_data['mapel_sulit'] ?? '-'); ?></span>
                </div>
                <div class="py-2 sm:col-span-2 md:col-span-4 border-b-transparent">
                    <span class="block text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-0.5">Karakteristik & Gaya Belajar Anak</span>
                    <span class="font-medium text-gray-800 text-sm"><?php echo e($draft->draft_data['karakteristik_anak'] ?? '-'); ?></span>
                </div>
            </div>
        </div>

        <!-- 4. Paket & Jadwal (Dibuat full width) -->
        <div class="lg:col-span-2 bg-primary-50/50 backdrop-blur-md p-5 md:p-6 rounded-2xl border-2 border-primary-200 shadow-sm relative overflow-hidden transition-all hover:shadow-md hover:bg-primary-50/70">
            <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-primary-400 to-primary-600"></div>
            <div class="flex items-center gap-3 mb-4 border-b border-gray-200 pb-3">
                <div class="w-10 h-10 rounded-full bg-primary-50 flex items-center justify-center text-primary-700 shadow-sm border border-primary-200 shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h3 class="text-xl font-extrabold text-gray-800 tracking-tight">Pilihan Program Belajar</h3>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-3 gap-x-4">
                <div class="sm:col-span-2 bg-white/80 backdrop-blur-sm px-4 py-3 rounded-xl border border-white/50 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div>
                        <span class="block text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-1">Paket Belajar yang Dipilih</span>
                        <span class="font-bold text-gray-800 text-lg"><?php echo e($selectedPaket ? ($selectedPaket->nama_program ?? $selectedPaket->nama_program) : '-'); ?></span>
                    </div>
                    <?php if($selectedPaket): ?>
                        <div class="bg-primary-100 text-primary-800 px-4 py-2 rounded-lg font-bold text-sm border border-primary-200">
                            <?php echo e('Rp ' . number_format($selectedPaket->harga, 0, ',', '.')); ?> / 8× pertemuan
                        </div>
                    <?php endif; ?>
                </div>
                <div class="bg-white/80 backdrop-blur-sm px-4 py-3 rounded-xl border border-white/50 border-l-4 border-l-primary-500 shadow-sm">
                    <span class="block text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-0.5">Jadwal Pertemuan A</span>
                    <span class="font-medium text-gray-800 text-sm">
                        <?php echo e($schedule1 ? $schedule1->hari . ' (' . $schedule1->formatted_time_range . ')' : '-'); ?>

                    </span>
                </div>
                <div class="bg-white/80 backdrop-blur-sm px-4 py-3 rounded-xl border border-white/50 border-l-4 border-l-primary-500 shadow-sm">
                    <span class="block text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-0.5">Jadwal Pertemuan B</span>
                    <span class="font-medium text-gray-800 text-sm">
                        <?php echo e($schedule2 ? $schedule2->hari . ' (' . $schedule2->formatted_time_range . ')' : '-'); ?>

                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col">
        <label for="persetujuan" class="flex items-start gap-4 p-5 md:p-6 rounded-2xl bg-white/60 backdrop-blur-md border border-white/80 shadow-sm cursor-pointer hover:bg-white/90 hover:shadow-md transition-all group">
            <div class="flex items-center h-6 mt-0.5">
                <input id="persetujuan" name="persetujuan" type="checkbox" required class="focus:ring-primary-500 focus:ring-offset-2 h-4 w-4 text-primary-600 border-gray-300 rounded cursor-pointer transition-all <?php $__errorArgs = ['persetujuan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 ring-2 ring-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            </div>
            <div class="text-sm">
                <span class="block font-bold text-gray-800 text-sm md:text-base mb-0.5 group-hover:text-primary-700 transition-colors">Pernyataan Kebenaran Data <span class="text-red-500">*</span></span>

                <p class="text-gray-600 leading-relaxed text-xs md:text-sm">Saya menyatakan bahwa seluruh data yang diisikan di atas adalah benar dan dapat dipertanggungjawabkan.</p>
            </div>
        </label>
        <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'persetujuan']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'persetujuan']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale4392c51ccef42726141b9bd03684153)): ?>
<?php $attributes = $__attributesOriginale4392c51ccef42726141b9bd03684153; ?>
<?php unset($__attributesOriginale4392c51ccef42726141b9bd03684153); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale4392c51ccef42726141b9bd03684153)): ?>
<?php $component = $__componentOriginale4392c51ccef42726141b9bd03684153; ?>
<?php unset($__componentOriginale4392c51ccef42726141b9bd03684153); ?>
<?php endif; ?>
    </div>
</div>
<?php /**PATH C:\laragon\www\ruang-les\resources\views/pendaftaran/langkah6-review.blade.php ENDPATH**/ ?>