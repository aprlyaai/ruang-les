<?php $__env->startSection('title', isset($gallery) ? 'Edit Galeri' : 'Tambah Foto Baru'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="<?php echo e(route('admin.settings.index')); ?>" class="hover:text-primary-600 transition-colors">Kelola Bimbel (CMS)</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="<?php echo e(route('admin.galleries.index')); ?>" class="hover:text-primary-600 transition-colors">Kelola Galeri</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold"><?php echo e(isset($gallery) ? 'Edit Foto' : 'Tambah Foto'); ?></span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="w-full space-y-4" x-data="galleryForm()">
    <div class="mb-6">
        <?php if (isset($component)) { $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.tajuk-halaman','data' => ['title' => ''.e(isset($gallery) ? 'Edit Foto' : 'Tambah Foto Baru').'','backUrl' => ''.e(route('admin.galleries.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.tajuk-halaman'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(isset($gallery) ? 'Edit Foto' : 'Tambah Foto Baru').'','backUrl' => ''.e(route('admin.galleries.index')).'']); ?>
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

    <form action="<?php echo e(isset($gallery) ? route('admin.galleries.update', $gallery->id) : route('admin.galleries.store')); ?>" method="POST" enctype="multipart/form-data" @submit="submitForm" novalidate>
        <?php echo csrf_field(); ?>
        <?php if(isset($gallery)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
            <!-- Kolom Kiri: Informasi Galeri -->
            <div class="lg:col-span-2 space-y-5">
                <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
                    <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-200 pb-3">Upload Foto Dokumentasi</h3>
                    <div class="space-y-6">

                        <!-- Upload Gambar -->
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-3">Foto Galeri <span class="text-red-500">*</span></label>

                            <div class="mb-4">
                                <!-- Existing / Preview Image -->
                                <template x-if="imagePreview">
                                    <div>
                                        <img :src="imagePreview" alt="Preview Foto" class="aspect-[4/3] w-full max-w-[320px] mx-auto object-cover rounded-2xl border border-gray-200 bg-white p-2 shadow-sm">
                                    </div>
                                </template>

                                <!-- Empty State (Desain Premium Statis dengan Error State) -->
                                <template x-if="!imagePreview">
                                    <div class="aspect-[4/3] w-full max-w-[320px] mx-auto border-2 border-dashed rounded-2xl flex flex-col items-center justify-center transition-colors duration-300"
                                         :class="touched.gambar && !isEditMode && !imagePreview ? 'border-red-400 bg-red-50/50' : 'border-primary-400 bg-primary-50/50'">
                                        <div class="w-[72px] h-[72px] rounded-full bg-white border shadow-sm flex items-center justify-center mb-3 transition-colors duration-300"
                                             :class="touched.gambar && !isEditMode && !imagePreview ? 'border-red-400' : 'border-primary-400'">
                                            <svg class="h-8 w-8 transition-colors duration-300" :class="touched.gambar && !isEditMode && !imagePreview ? 'text-red-500' : 'text-primary-600'" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <span class="text-sm font-semibold transition-colors duration-300" :class="touched.gambar && !isEditMode && !imagePreview ? 'text-red-500' : 'text-primary-600'">Belum ada foto</span>
                                    </div>
                                </template>
                            </div>

                            <div>
                                <input id="gambar-upload" name="gambar" type="file" accept="gambar/jpeg,gambar/png,gambar/webp,gambar/gif" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100 transition-colors cursor-pointer border rounded-xl" :class="touched.gambar && !isEditMode && !imagePreview ? 'border-red-500 bg-red-50/50' : 'border-gray-200 bg-white'" @change="handleFileChange; touched.gambar = true;">

                                <p x-show="touched.gambar && !isEditMode && !imagePreview" x-transition style="display: none;" class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Foto galeri wajib diunggah.
                                </p>
                                <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'gambar']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'gambar']); ?>
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

                                <p class="text-xs text-gray-500 mt-2 leading-relaxed">
                                    <span class="font-bold text-primary-700">Rasio Foto 4:3</span><br>
                                    Format: JPEG, JPG, PNG, WEBP.<br>
                                    Maksimal berukuran 2MB.
                                </p>
                            </div>
                        </div>

                        <?php if (isset($component)) { $__componentOriginalfa91bef822c99e50cb1dc6565d42476b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfa91bef822c99e50cb1dc6565d42476b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.input-formulir','data' => ['name' => 'kategori','label' => 'Kategori Foto','model' => 'formData.kategori','placeholder' => 'Contoh: Kegiatan Belajar, Praktikum, Outbound','required' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.input-formulir'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'kategori','label' => 'Kategori Foto','model' => 'formData.kategori','placeholder' => 'Contoh: Kegiatan Belajar, Praktikum, Outbound','required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfa91bef822c99e50cb1dc6565d42476b)): ?>
<?php $attributes = $__attributesOriginalfa91bef822c99e50cb1dc6565d42476b; ?>
<?php unset($__attributesOriginalfa91bef822c99e50cb1dc6565d42476b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfa91bef822c99e50cb1dc6565d42476b)): ?>
<?php $component = $__componentOriginalfa91bef822c99e50cb1dc6565d42476b; ?>
<?php unset($__componentOriginalfa91bef822c99e50cb1dc6565d42476b); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginalfa91bef822c99e50cb1dc6565d42476b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfa91bef822c99e50cb1dc6565d42476b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.input-formulir','data' => ['name' => 'nama_gambar','label' => 'Judul Foto','model' => 'formData.nama_gambar','placeholder' => 'Contoh: Anak-anak sedang belajar Fisika Dasar','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.input-formulir'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'nama_gambar','label' => 'Judul Foto','model' => 'formData.nama_gambar','placeholder' => 'Contoh: Anak-anak sedang belajar Fisika Dasar','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfa91bef822c99e50cb1dc6565d42476b)): ?>
<?php $attributes = $__attributesOriginalfa91bef822c99e50cb1dc6565d42476b; ?>
<?php unset($__attributesOriginalfa91bef822c99e50cb1dc6565d42476b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfa91bef822c99e50cb1dc6565d42476b)): ?>
<?php $component = $__componentOriginalfa91bef822c99e50cb1dc6565d42476b; ?>
<?php unset($__componentOriginalfa91bef822c99e50cb1dc6565d42476b); ?>
<?php endif; ?>

                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Status & Simpan -->
            <div class="space-y-5 sticky top-6">
                <!-- Section 2: Pengaturan Tampilan -->
                <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
                    <h3 class="text-lg font-bold text-primary-800 mb-4 border-b border-gray-200 pb-3">Status Publikasi</h3>
                    <div class="space-y-4">
                        <label class="flex items-start p-3 border border-gray-100 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer group">
                            <div class="flex items-center h-5 mt-0.5">
                                <!-- Hidden fallback for unchecked state -->
                                <input type="hidden" name="status_galeri" value="0">
                                <input id="status_galeri" name="status_galeri" type="checkbox" value="1"
                                    class="w-4 h-4 text-primary-600 bg-white border-gray-300 rounded focus:ring-primary-500 focus:ring-2 cursor-pointer"
                                    <?php echo e(old('status_galeri', $gallery->status_galeri ?? true) ? 'checked' : ''); ?>>
                            </div>
                            <div class="ml-3 text-sm">
                                <span class="font-bold text-gray-700 group-hover:text-primary-700 transition-colors">Tampilkan di Galeri</span>
                                <p class="text-xs text-gray-500 mt-0.5">Jika dimatikan, foto ini akan disembunyikan dari halaman depan.</p>
                            </div>
                        </label>
                        <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'status_galeri']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'status_galeri']); ?>
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

                        <input type="hidden" name="urutan" value="<?php echo e(old('urutan', $gallery->urutan ?? 0)); ?>">
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex flex-col gap-4 mt-8">
                    <button type="submit" class="w-full flex items-center justify-center px-8 py-4 text-base font-extrabold text-white transition-all duration-100 bg-primary-600 rounded-2xl hover:bg-primary-700 shadow-lg shadow-primary-500/30 transform hover:-translate-y-1">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                        <?php echo e(isset($gallery) ? 'Simpan Perubahan Foto' : 'Simpan Foto Baru'); ?>

                    </button>
                    <button type="button" @click="resetForm()" class="w-full flex items-center justify-center px-6 py-4 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-2xl hover:bg-red-50 hover:border-red-200 hover:text-red-600 shadow-sm transform hover:-translate-y-1">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Bersihkan Data
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('galleryForm', () => ({
            formKey: 'gallery_form_cache',
            isEditMode: <?php echo e(isset($gallery) ? 'true' : 'false'); ?>,
            imagePreview: '<?php echo e(isset($gallery) && $gallery->gambar ? (str_starts_with($gallery->gambar, "images/") ? asset($gallery->gambar) : asset("storage/" . $gallery->gambar)) : ""); ?>',
            touched: {},
            formData: {
                kategori: <?php echo json_encode(old('kategori', $gallery->kategori ?? ''), 512) ?>,
                nama_gambar: <?php echo json_encode(old('nama_gambar', $gallery->nama_gambar ?? ''), 512) ?>
            },
            init() {
                if (!this.isEditMode) {
                    const cached = localStorage.getItem(this.formKey);
                    if (cached) {
                        try {
                            const parsed = JSON.parse(cached);
                            // Merge only if server validation didn't flash old data
                            if (this.formData.kategori === '') this.formData.kategori = parsed.kategori || '';
                            if (this.formData.nama_gambar === '') this.formData.nama_gambar = parsed.nama_gambar || '';
                        } catch (e) {}
                    }

                    this.$watch('formData', value => {
                        localStorage.setItem(this.formKey, JSON.stringify(value));
                    });
                }
            },
            submitForm(e) {
                this.touched.nama_gambar = true;
                this.touched.gambar = true;

                let hasError = false;

                if (!this.formData.nama_gambar.trim()) {
                    hasError = true;
                }

                if (!this.isEditMode && !this.imagePreview) {
                    hasError = true;
                }

                if (hasError) {
                    e.preventDefault();
                    setTimeout(() => {
                        const firstError = document.querySelector('.text-red-500');
                        if(firstError) {
                            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    }, 100);
                } else {
                    this.clearCache();
                }
            },
            handleFileChange(event) {
                const file = event.target.files[0];
                if (!file) return;

                // Simple validation for preview
                if (!file.type.match('gambar.*')) {
                    alert('Harap unggah file gambar (JPG, PNG, dll).');
                    return;
                }

                const reader = new FileReader();
                reader.onload = (e) => {
                    this.imagePreview = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            clearCache() {
                if (!this.isEditMode) {
                    localStorage.removeItem(this.formKey);
                }
            },
            resetForm() {
                this.formData.kategori = <?php echo json_encode(old('kategori', $gallery->kategori ?? ''), 512) ?>;
                this.formData.nama_gambar = <?php echo json_encode(old('nama_gambar', $gallery->nama_gambar ?? ''), 512) ?>;
                this.touched = {};
                if (!this.isEditMode) {
                    this.imagePreview = '';
                    this.clearCache();
                    document.getElementById('gambar-upload').value = '';
                }
            }
        }));
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ruang-les\resources\views/admin/galeri/formulir.blade.php ENDPATH**/ ?>