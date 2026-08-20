<?php $__env->startSection('title', 'Layanan & Bantuan'); ?>

<?php $__env->startSection('content'); ?>
<div x-data="{ tab: 'Semua', modalOpen: <?php echo e($errors->any() ? 'true' : 'false'); ?>, errors: { kategori_layanan: <?php echo e($errors->has('kategori_layanan') ? 'true' : 'false'); ?>, subject_layanan: <?php echo e($errors->has('subject_layanan') ? 'true' : 'false'); ?>, pesan: <?php echo e($errors->has('pesan') ? 'true' : 'false'); ?> }, categoryType: '<?php echo e(old('category_select', '')); ?>', customCategory: '<?php echo e(old('custom_category', '')); ?>', closeModal() { this.modalOpen = false; this.errors = { kategori_layanan: false, subject_layanan: false, pesan: false }; } }" class="space-y-0">

    <?php if (isset($component)) { $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.tajuk-halaman','data' => ['title' => 'Layanan & Bantuan','description' => 'Sampaikan testimoni, pertanyaan, keluhan, atau kendala Anda kepada pihak Ruang Les.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.tajuk-halaman'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Layanan & Bantuan','description' => 'Sampaikan testimoni, pertanyaan, keluhan, atau kendala Anda kepada pihak Ruang Les.']); ?>
         <?php $__env->slot('rightActions', null, []); ?> 
            <button @click="modalOpen = true" class="inline-flex items-center justify-center px-4 py-2 text-sm font-bold text-white transition-all duration-100 bg-primary-600 rounded-xl hover:bg-primary-700 shadow-sm hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Buat Tiket Baru
            </button>
         <?php $__env->endSlot(); ?>
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

    <!-- Tab Navigation -->
    <div class="bg-white/80 backdrop-blur-md rounded-t-2xl shadow-sm border border-primary-100/50 border-b-0 overflow-hidden mt-6">
        <nav class="flex overflow-x-auto whitespace-nowrap no-scrollbar" style="-ms-overflow-style: none; scrollbar-width: none;" aria-label="Tabs">
            <button @click="tab = 'Semua'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': tab === 'Semua', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': tab !== 'Semua'}" class="flex-1 min-w-max whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                Semua
            </button>
            <button @click="tab = 'Open'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': tab === 'Open', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': tab !== 'Open'}" class="flex-1 min-w-max whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                Menunggu Balasan
            </button>
            <button @click="tab = 'In Progress'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': tab === 'In Progress', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': tab !== 'In Progress'}" class="flex-1 min-w-max whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                Sedang Ditangani
            </button>
            <button @click="tab = 'Closed'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': tab === 'Closed', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': tab !== 'Closed'}" class="flex-1 min-w-max whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
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
                    <?php $__empty_1 = true; $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                            $hasUnread = $ticket->replies->where('dibaca_pengguna', false)->where('user_id', '!=', auth()->id())->count() > 0;
                            $rowClass = $hasUnread ? 'bg-primary-50 font-semibold' : ($ticket->status_layanan == 'Open' ? 'bg-blue-50/30' : '');
                        ?>
                        <tr x-show="tab === 'Semua' || tab === '<?php echo e($ticket->status_layanan); ?>'" x-cloak class="hover:bg-primary-50/50 transition-colors <?php echo e($rowClass); ?>">
                            <td class="px-4 py-3 align-middle whitespace-nowrap">
                                <div class="flex items-center gap-2">
                                    <?php if($hasUnread): ?>
                                        <span class="w-2 h-2 bg-red-500 rounded-full flex-shrink-0 animate-pulse"></span>
                                    <?php endif; ?>
                                    <div>
                                        <div class="text-sm font-bold text-gray-900"><?php echo e($ticket->no_ticket); ?></div>
                                        <div class="text-xs text-gray-500 mt-1"><?php echo e($ticket->created_at->format('d M Y, H:i')); ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="text-sm font-semibold text-gray-900">
                                    <?php echo e($ticket->kategori_layanan); ?>

                                </div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <div class="text-sm font-semibold text-gray-900"><?php echo e($ticket->subject_layanan); ?></div>
                            </td>
                            <td class="px-4 py-3 align-middle">
                                <?php if($ticket->status_layanan == 'Open'): ?>
                                    <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'danger','class' => 'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border w-fit whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'danger','class' => 'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border w-fit whitespace-nowrap']); ?>
                                        <span class="w-1.5 h-1.5 bg-red-500 rounded-full mr-1.5 shrink-0 animate-pulse"></span>
                                        Menunggu Balasan
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
                                <?php elseif($ticket->status_layanan == 'In Progress'): ?>
                                    <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'warning','class' => 'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border w-fit whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'warning','class' => 'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border w-fit whitespace-nowrap']); ?>
                                        <span class="w-1.5 h-1.5 bg-amber-500 rounded-full mr-1.5 shrink-0"></span>
                                        Sedang Ditangani
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
                                <?php else: ?>
                                    <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'gray','class' => 'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border w-fit whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'gray','class' => 'inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border w-fit whitespace-nowrap']); ?>
                                        <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-1.5 shrink-0"></span>
                                        Selesai
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
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-3 align-middle text-center">
                                <a href="<?php echo e(route('ortu.layanan.show', $ticket->id)); ?>" class="inline-flex items-center justify-center px-3 py-1.5 min-h-[25px] min-w-[25px] text-xs font-bold text-gray-600 bg-white border border-gray-200 transition-all duration-100 rounded-lg hover:bg-primary-50 hover:text-primary-600 hover:border-primary-200 shadow-sm">
                                    Buka Chat
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-12 align-middle">
                                <?php if (isset($component)) { $__componentOriginala248761445578b3580e6fcec2c0db260 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala248761445578b3580e6fcec2c0db260 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.keadaan-kosong','data' => ['icon' => 'mail','title' => 'Belum Ada Riwayat Layanan','message' => 'Butuh bantuan atau punya masukan? Silakan sampaikan di sini. Jangan ragu untuk menghubungi tim Ruang Les ya! ^^']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.keadaan-kosong'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'mail','title' => 'Belum Ada Riwayat Layanan','message' => 'Butuh bantuan atau punya masukan? Silakan sampaikan di sini. Jangan ragu untuk menghubungi tim Ruang Les ya! ^^']); ?>
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

                    <form action="<?php echo e(route('ortu.layanan.store')); ?>" method="POST" novalidate>
                        <?php echo csrf_field(); ?>
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
                                        <option value="Keluhan Mentor">Keluhan Mentor</option>
                                        <option value="Kendala Sistem">Kendala Sistem Web</option>
                                        <option value="Lainnya...">Lainnya...</option>
                                    </select>

                                    <div x-show="categoryType === 'Lainnya...'" x-transition x-cloak class="mt-3">
                                        <input type="text" x-model="customCategory" @input="errors.kategori_layanan = false" name="custom_category" placeholder="Tuliskan kategori spesifik Anda..." :class="errors.kategori_layanan ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 focus:ring-primary-200'" class="block w-full rounded-2xl p-3 border shadow-sm focus:outline-none focus:ring-2 transition-colors duration-100 text-sm font-medium text-gray-800">
                                    </div>

                                    <input type="hidden" name="kategori_layanan" :value="categoryType === 'Lainnya...' ? customCategory : categoryType">

                                    <?php $__errorArgs = ['kategori_layanan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p x-show="errors.kategori_layanan" class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            Kategori tiket wajib diisi.
                                        </p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div>
                                    <label for="subject_layanan" class="block text-sm font-semibold text-gray-600 mb-2">Subjek <span class="text-red-500">*</span></label>
                                    <input type="text" name="subject_layanan" id="subject_layanan" @input="errors.subject_layanan = false" value="<?php echo e(old('subject_layanan')); ?>" placeholder="Tuliskan topik atau ringkasan pesan Anda" :class="errors.subject_layanan ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 focus:ring-primary-200'" class="block w-full rounded-2xl p-3 border shadow-sm focus:outline-none focus:ring-2 transition-colors duration-100 text-sm font-medium text-gray-800">

                                    <?php $__errorArgs = ['subject_layanan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p x-show="errors.subject_layanan" class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            Subjek tiket wajib diisi.
                                        </p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div>
                                    <label for="pesan" class="block text-sm font-semibold text-gray-600 mb-2">Isi Pesan <span class="text-red-500">*</span></label>
                                    <textarea name="pesan" id="pesan" rows="5" @input="errors.pesan = false" placeholder="Ceritakan semua detail pesan Anda secara jelas agar tim Ruang Les dapat merespons dengan tepat..." :class="errors.pesan ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 focus:ring-primary-200'" class="block w-full rounded-2xl p-3 border shadow-sm focus:outline-none focus:ring-2 transition-colors duration-100 text-sm font-medium text-gray-800"><?php echo e(old('pesan')); ?></textarea>

                                    <?php $__errorArgs = ['pesan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p x-show="errors.pesan" class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            Detail wajib diisi.
                                        </p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.orang-tua', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ruang-les\resources\views/orang-tua/layanan/daftar.blade.php ENDPATH**/ ?>