<?php $__env->startSection('title', 'Pengaturan Konten Landing Page'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold">Kelola Bimbel (CMS)</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
<style>
    trix-toolbar [data-trix-button-group="file-tools"] { display: none; }
    trix-editor { min-height: 150px; background-color: #f9fafb; border-radius: 1rem; border: 1px solid #e5e7eb; padding: 0.75rem; transition: all 0.1s; margin-top: 0.5rem; }
    trix-editor:focus { border-color: #93c38b; box-shadow: 0 0 0 2px #cee6c8; background-color: white; outline: none; }

    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    .animate-gradient {
        animation: gradient 4s ease infinite;
    }
    @keyframes shimmer {
        100% { transform: translateX(100%); }
    }
    .animate-shimmer {
        animation: shimmer 2s infinite;
    }
</style>

<div class="w-full" x-data="{
    activeTab: $persist('hero').as('admin_settings_tab'),
    isSticky: true,
    init() {
        if (new URLSearchParams(window.location.search).has('reset_tab')) {
            this.activeTab = 'hero';
            window.history.replaceState({}, document.title, window.location.pathname);
        }

        this.$nextTick(() => {
            const main = this.$el.closest('main');
            if (main) {
                main.addEventListener('scroll', () => {
                    this.isSticky = (main.clientHeight + main.scrollTop) < (main.scrollHeight - 60);
                });
                this.isSticky = (main.clientHeight + main.scrollTop) < (main.scrollHeight - 60);
            }
        });
    }
}">

    <div class="mb-6">
        <?php if (isset($component)) { $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.tajuk-halaman','data' => ['title' => 'Content Management System (CMS) Ruang Les','description' => 'Waktunya berkreasi! Rancang website semenarik mungkin untuk memikat hati para orang tua dan buah hatinya ❤️']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.tajuk-halaman'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Content Management System (CMS) Ruang Les','description' => 'Waktunya berkreasi! Rancang website semenarik mungkin untuk memikat hati para orang tua dan buah hatinya ❤️']); ?>
             <?php $__env->slot('rightActions', null, []); ?> 
                <a href="<?php echo e(url('/')); ?>" target="_blank" class="group relative inline-flex items-center justify-center px-6 py-2.5 rounded-xl font-bold text-white overflow-hidden shadow-[0_4px_15px_rgba(147,195,139,0.4)] hover:shadow-[0_8px_25px_rgba(147,195,139,0.6)] transition-all duration-300 hover:-translate-y-1">
                    <!-- Animated Gradient Background -->
                    <div class="absolute inset-0 bg-gradient-to-r from-primary-600 via-primary-400 to-primary-600 bg-[length:200%_auto] animate-gradient"></div>
                    <!-- Shimmer Effect -->
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent -translate-x-full group-hover:animate-shimmer"></div>
                    <!-- Button Content -->
                    <span class="relative z-10 flex items-center drop-shadow-sm">
                        <svg class="w-4 h-4 mr-2 transition-transform duration-300 group-hover:-translate-y-0.5 group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        Lihat Website
                    </span>
                </a>
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
    </div>

    <!-- Tabs Navigation -->
    <div class="bg-white/80 backdrop-blur-md rounded-t-2xl shadow-sm border border-primary-100/50 border-b-0 overflow-hidden">
        <nav class="flex flex-wrap overflow-x-auto" aria-label="Tabs">
            <button @click="activeTab = 'hero'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': activeTab === 'hero', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': activeTab !== 'hero'}" class="flex-1 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                Header & Hero
            </button>
            <button @click="activeTab = 'fitur'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': activeTab === 'fitur', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': activeTab !== 'fitur'}" class="flex-1 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                Fitur Unggulan
            </button>
            <button @click="activeTab = 'program'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': activeTab === 'program', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': activeTab !== 'program'}" class="flex-1 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                Program Belajar
            </button>
            <button @click="activeTab = 'testimoni'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': activeTab === 'testimoni', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': activeTab !== 'testimoni'}" class="flex-1 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                Testimoni
            </button>
            <button @click="activeTab = 'faq'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': activeTab === 'faq', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': activeTab !== 'faq'}" class="flex-1 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                Tanya Jawab (FAQ)
            </button>
            <button @click="activeTab = 'profil'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': activeTab === 'profil', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': activeTab !== 'profil'}" class="flex-1 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                Tentang Kami
            </button>
            <button @click="activeTab = 'galeri'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': activeTab === 'galeri', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': activeTab !== 'galeri'}" class="flex-1 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                Galeri
            </button>
            <button @click="activeTab = 'footer'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': activeTab === 'footer', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': activeTab !== 'footer'}" class="flex-1 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                Footer
            </button>
            <button @click="activeTab = 'pendaftaran'" :class="{'border-primary-500 text-primary-700 bg-primary-50/50': activeTab === 'pendaftaran', 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:border-gray-300': activeTab !== 'pendaftaran'}" class="flex-1 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-center transition-all focus:outline-none">
                Pendaftaran
            </button>
        </nav>
    </div>

    <!-- Main Form -->
    <div class="bg-white/90 backdrop-blur-md rounded-b-2xl shadow-sm border border-primary-100/50 p-6 md:p-8 border-t-0">
        <form action="<?php echo e(route('admin.settings.update')); ?>" method="POST" enctype="multipart/form-data" @reset="$dispatch('form-reset')">
            <?php echo csrf_field(); ?>

            <!-- 1. Header & Banner -->
            <div x-show="activeTab === 'hero'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" style="display: none;">
                <h3 class="text-lg leading-6 font-bold text-primary-800 mb-6">1. Hero Section</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Top Left: Identitas Website -->
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 h-fit">
                        <h4 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Identitas Website</h4>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Nama Bimbel / Lembaga</label>
                                <input type="text" name="bimbel_name" value="<?php echo e($settings['bimbel_name'] ?? 'Ruang Les'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                            </div>
                            <div>
                                <div x-data="{ imageUrl: '<?php echo e(isset($settings['logo_utama']) ? (str_starts_with($settings['logo_utama'], 'images/') ? asset($settings['logo_utama']) : asset('storage/' . $settings['logo_utama'])) : ''); ?>', originalUrl: '<?php echo e(isset($settings['logo_utama']) ? (str_starts_with($settings['logo_utama'], 'images/') ? asset($settings['logo_utama']) : asset('storage/' . $settings['logo_utama'])) : ''); ?>' }" @form-reset.window="imageUrl = originalUrl">
                                    <label class="block text-sm text-gray-600 font-semibold mb-2">Logo Utama (Navbar)</label>
                                    <div class="mb-3">
                                        <div x-show="imageUrl" style="display: none;">
                                            <img :src="imageUrl" alt="Logo Preview" class="aspect-square w-24 object-contain rounded-lg border border-gray-300 bg-white p-2 shadow-sm">
                                        </div>
                                        <div x-show="!imageUrl" class="aspect-square w-24 border-2 border-dashed border-primary-400 bg-primary-50/50 rounded-lg flex flex-col items-center justify-center transition-colors duration-300">
                                            <div class="w-8 h-8 rounded-full bg-white border border-primary-400 shadow-sm flex items-center justify-center mb-1 transition-colors duration-300">
                                                <svg class="h-4 w-4 text-primary-600 transition-colors duration-300" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                            </div>
                                            <span class="text-[10px] font-semibold text-primary-600 transition-colors duration-300">Belum ada logo</span>
                                        </div>
                                    </div>
                                    <input type="file" name="logo_utama" accept="image/jpeg,image/png,image/webp,image/svg+xml" @change="if ($event.target.files.length) imageUrl = URL.createObjectURL($event.target.files[0])" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100 transition-colors cursor-pointer bg-white border border-gray-200 rounded-xl">
                                    <p class="text-xs text-gray-500 mt-2">
                                        <span class="font-bold text-primary-700">Rasio Foto 1:1</span><br>
                                        Format: SVG, JPEG, JPG, PNG, WEBP.<br>
                                        Maksimal berukuran 2MB.
                                    </p>
                                </div>
                            </div>
                            <div>
                                <div x-data="{ imageUrl: '<?php echo e(isset($settings['favicon']) ? (str_starts_with($settings['favicon'], 'images/') ? asset($settings['favicon']) : asset('storage/' . $settings['favicon'])) : ''); ?>', originalUrl: '<?php echo e(isset($settings['favicon']) ? (str_starts_with($settings['favicon'], 'images/') ? asset($settings['favicon']) : asset('storage/' . $settings['favicon'])) : ''); ?>' }" @form-reset.window="imageUrl = originalUrl">
                                    <label class="block text-sm text-gray-600 font-semibold mb-2">Favicon (Ikon Tab Browser)</label>
                                    <div class="mb-3">
                                        <div x-show="imageUrl" style="display: none;">
                                            <img :src="imageUrl" alt="Favicon Preview" class="aspect-square w-24 object-contain rounded-lg border border-gray-300 bg-white p-2 shadow-sm">
                                        </div>
                                        <div x-show="!imageUrl" class="aspect-square w-24 border-2 border-dashed border-primary-400 bg-primary-50/50 rounded-lg flex flex-col items-center justify-center transition-colors duration-300">
                                            <div class="w-8 h-8 rounded-full bg-white border border-primary-400 shadow-sm flex items-center justify-center transition-colors duration-300">
                                                <svg class="h-4 w-4 text-primary-600 transition-colors duration-300" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="file" name="favicon" accept="image/jpeg,image/png,image/webp,image/x-icon" @change="if ($event.target.files.length) imageUrl = URL.createObjectURL($event.target.files[0])" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100 transition-colors cursor-pointer bg-white border border-gray-200 rounded-xl">
                                    <p class="text-xs text-gray-500 mt-2">
                                        <span class="font-bold text-primary-700">Rasio Foto 1:1</span><br>
                                        Format: ICO, JPEG, JPG, PNG, WEBP.<br>
                                        Maksimal berukuran 2MB.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Top Right: Gambar Ilustrasi -->
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 h-fit">
                        <div x-data="{ imageUrl: '<?php echo e(isset($settings['hero_image']) ? (str_starts_with($settings['hero_image'], 'images/') ? asset($settings['hero_image']) : asset('storage/' . $settings['hero_image'])) : ''); ?>', originalUrl: '<?php echo e(isset($settings['hero_image']) ? (str_starts_with($settings['hero_image'], 'images/') ? asset($settings['hero_image']) : asset('storage/' . $settings['hero_image'])) : ''); ?>' }" @form-reset.window="imageUrl = originalUrl">
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-3">Gambar Ilustrasi</label>
                                <div class="mb-4">
                                    <div x-show="imageUrl" style="display: none;">
                                        <img :src="imageUrl" alt="Hero Preview" class="aspect-square w-full max-w-[240px] mx-auto object-cover rounded-2xl border border-gray-200 bg-white p-2 shadow-sm">
                                    </div>
                                    <div x-show="!imageUrl" class="aspect-square w-full max-w-[240px] mx-auto border-2 border-dashed border-primary-400 bg-primary-50/50 rounded-2xl flex flex-col items-center justify-center transition-colors duration-300">
                                        <div class="w-16 h-16 rounded-full bg-white border border-primary-400 shadow-sm flex items-center justify-center mb-3 transition-colors duration-300">
                                            <svg class="h-8 w-8 text-primary-600 transition-colors duration-300" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                        </div>
                                        <span class="text-sm font-semibold text-primary-600 transition-colors duration-300">Belum ada ilustrasi</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="file" name="hero_image" accept="image/jpeg,image/png,image/webp" @change="if ($event.target.files.length) imageUrl = URL.createObjectURL($event.target.files[0])" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100 transition-colors cursor-pointer bg-white border border-gray-200 rounded-xl">
                                <p class="text-xs text-gray-500 mt-2 leading-relaxed">
                                    <span class="font-bold text-primary-700">Rasio Foto 1:1</span><br>
                                    Format: JPEG, JPG, PNG, WEBP.<br>
                                    Maksimal berukuran 2MB.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Bottom Left -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Label Kategori</label>
                            <input type="text" name="hero_label" value="<?php echo e($settings['hero_label'] ?? 'Solusi Edukasi Modern'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Headline Judul</label>
                            <textarea name="hero_headline" rows="2" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800"><?php echo e($settings['hero_headline'] ?? "Tingkatkan Prestasi Anak
Bersama Ruang Les"); ?></textarea>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Deskripsi</label>
                            <textarea name="hero_description" rows="3" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800"><?php echo e($settings['hero_description'] ?? 'Platform bimbingan belajar inovatif untuk siswa Sekolah Dasar (SD). Pantau perkembangan secara transparan, pilih jadwal fleksibel, dan dukung masa depan cerah buah hati Anda dengan metode belajar yang menyenangkan.'); ?></textarea>
                        </div>
                    </div>

                    <!-- Bottom Right -->
                    <div class="space-y-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Tombol CTA 1</label>
                                <input type="text" name="hero_cta_button" value="<?php echo e($settings['hero_cta_button'] ?? ''); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Tombol CTA 2</label>
                                <input type="text" name="hero_secondary_button" value="<?php echo e($settings['hero_secondary_button'] ?? ''); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Badge Melayang Atas (Rating)</label>
                                <input type="text" name="hero_badge_text_1" value="<?php echo e($settings['hero_badge_text_1'] ?? ''); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Badge Melayang Bawah (Skor)</label>
                                <input type="text" name="hero_badge_text_2" value="<?php echo e($settings['hero_badge_text_2'] ?? ''); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Fitur Unggulan -->
            <div x-show="activeTab === 'fitur'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" style="display: none;">
                <h3 class="text-lg leading-6 font-bold text-primary-800 mb-6">2. Fitur Section</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Label Kategori</label>
                            <input type="text" name="features_label" value="<?php echo e($settings['features_label'] ?? 'Kenapa Memilih Kami?'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Headline Judul</label>
                            <textarea name="features_headline" rows="2" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800"><?php echo e($settings['features_headline'] ?? 'Belajar Lebih Dekat, Pantau Lebih Mudah'); ?></textarea>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Deskripsi</label>
                            <textarea name="features_description" rows="3" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800"><?php echo e($settings['features_description'] ?? 'Anak butuh mentor yang sabar, dan orang tua butuh kepastian. Di Ruang Les, anak Anda mendapat bimbingan yang nyaman, sementara Anda bisa memantau perkembangannya kapan saja secara online.'); ?></textarea>
                        </div>
                    </div>

                    <div>
                        <div class="bg-primary-50/40 p-5 rounded-2xl border border-primary-100 shadow-sm">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm mr-3 text-primary-600 border border-primary-50 shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <h4 class="text-lg font-bold text-primary-800">Kelola Fitur Unggulan</h4>
                            </div>
                            <p class="text-sm text-gray-600 mb-5 leading-relaxed">
                                Atur fitur apa saja yang ingin kamu sorot di halaman publik untuk menarik perhatian orang tua murid.
                            </p>
                            <a href="<?php echo e(route('admin.features.index')); ?>" class="inline-flex items-center justify-center w-full px-4 py-2.5 bg-white border border-primary-200 text-primary-700 rounded-xl text-sm font-bold hover:bg-primary-100 hover:border-primary-300 transition-all shadow-sm group">
                                Kelola Daftar Fitur
                                <svg class="w-4 h-4 ml-1.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Program Belajar -->
            <div x-show="activeTab === 'program'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" style="display: none;">
                <h3 class="text-lg leading-6 font-bold text-primary-800 mb-6">3. Program Belajar Section</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Label Kategori</label>
                            <input type="text" name="program_label" value="<?php echo e($settings['program_label'] ?? 'Program Unggulan'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Headline Judul</label>
                            <textarea name="program_headline" rows="2" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800"><?php echo e($settings['program_headline'] ?? 'Pilihan Program Belajar'); ?></textarea>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Deskripsi</label>
                            <textarea name="program_description" rows="3" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800"><?php echo e($settings['program_description'] ?? 'Kami menyediakan program yang disesuaikan dengan kebutuhan fokus dan gaya belajar anak Anda.'); ?></textarea>
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200">
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Teks Badge di Kartu Program</label>
                            <input type="text" name="program_popular_badge" value="<?php echo e($settings['program_popular_badge'] ?? 'Paling Diminati'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                            <div class="mt-3 flex items-start text-xs text-primary-600">
                                <svg class="w-4 h-4 text-primary-600 mr-1.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <p>Badge ini akan melayang di atas kartu paket belajar yang ditandai sebagai "Populer" di Data Master Paket.</p>
                            </div>
                        </div>

                        <div class="bg-primary-50 border border-primary-100 p-5 rounded-2xl flex flex-col md:flex-row items-center justify-between gap-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm mr-4 text-primary-600 shrink-0">
                                     <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <p class="text-sm text-primary-800 font-medium">
                                    Kartu program ditarik otomatis dari <strong class="font-bold">Data Master Paket</strong>.
                                </p>
                            </div>
                            <a href="<?php echo e(route('admin.packages.index')); ?>" class="shrink-0 inline-flex items-center justify-center px-4 py-2 bg-white border border-primary-200 rounded-xl text-sm font-bold text-primary-700 hover:bg-primary-50 transition-colors shadow-sm">
                                Ke Master Paket
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. Testimoni -->
            <div x-show="activeTab === 'testimoni'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" style="display: none;">
                <h3 class="text-lg leading-6 font-bold text-primary-800 mb-6">4. Testimoni Section</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Label Kategori</label>
                            <input type="text" name="testimoni_label" value="<?php echo e($settings['testimoni_label'] ?? 'Kisah Sukses'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Headline Judul</label>
                            <textarea name="testimoni_headline" rows="2" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800"><?php echo e($settings['testimoni_headline'] ?? 'Kata Mereka Tentang Ruang Les'); ?></textarea>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Deskripsi</label>
                            <textarea name="testimoni_description" rows="3" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800"><?php echo e($settings['testimoni_description'] ?? 'Bergabunglah dengan ratusan orang tua yang telah mempercayakan perkembangan akademik anaknya kepada kami.'); ?></textarea>
                        </div>
                    </div>

                    <div>
                        <div class="bg-primary-50/40 p-5 rounded-2xl border border-primary-100 shadow-sm">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm mr-3 text-primary-600 border border-primary-50 shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                </div>
                                <h4 class="text-lg font-bold text-primary-800">Kelola Testimoni</h4>
                            </div>
                            <p class="text-sm text-gray-600 mb-5 leading-relaxed">
                                Pilih testimoni yang dikirim oleh orang tua/wali murid untuk dibagikan di halaman publik.
                            </p>
                            <a href="<?php echo e(route('admin.testimonials.index')); ?>" class="inline-flex items-center justify-center w-full px-4 py-2.5 bg-white border border-primary-200 text-primary-700 rounded-xl text-sm font-bold hover:bg-primary-100 hover:border-primary-300 transition-all shadow-sm group">
                                Kelola Daftar Testimoni
                                <svg class="w-4 h-4 ml-1.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5. FAQ -->
            <div x-show="activeTab === 'faq'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" style="display: none;">
                <h3 class="text-lg leading-6 font-bold text-primary-800 mb-6">5. Tanya Jawab (Frequently Asked Questions / FAQ) Section</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Label Kategori</label>
                            <input type="text" name="faq_label" value="<?php echo e($settings['faq_label'] ?? 'Pusat Bantuan'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Headline Judul</label>
                            <textarea name="faq_headline" rows="2" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800"><?php echo e($settings['faq_headline'] ?? 'Pertanyaan yang Sering Diajukan'); ?></textarea>
                        </div>

                        <div class="pt-4 border-t border-dashed border-gray-200 mt-4 space-y-5">
                            <h5 class="font-bold text-gray-800 text-base">Kotak Call to Action (CTA)</h5>
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Judul</label>
                                <textarea name="faq_cta_headline" rows="2" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800"><?php echo e($settings['faq_cta_headline'] ?? 'Masih punya pertanyaan?'); ?></textarea>
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Deskripsi</label>
                                <textarea name="faq_cta_description" rows="2" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800"><?php echo e($settings['faq_cta_description'] ?? 'Tim layanan pelanggan kami siap membantu Anda kapan saja. Jangan ragu untuk menghubungi kami.'); ?></textarea>
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Tombol CTA</label>
                                <input type="text" name="faq_cta_button" value="<?php echo e($settings['faq_cta_button'] ?? 'Hubungi Kami Sekarang'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="bg-primary-50/40 p-5 rounded-2xl border border-primary-100 shadow-sm">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm mr-3 text-primary-600 border border-primary-50 shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h4 class="text-lg font-bold text-primary-800">Kelola Tanya Jawab (FAQ)</h4>
                            </div>
                            <p class="text-sm text-gray-600 mb-5 leading-relaxed">
                                Tambahkan daftar pertanyaan dan jawaban yang paling sering ditanyakan oleh orang tua.
                            </p>
                            <a href="<?php echo e(route('admin.faqs.index')); ?>" class="inline-flex items-center justify-center w-full px-4 py-2.5 bg-white border border-primary-200 text-primary-700 rounded-xl text-sm font-bold hover:bg-primary-100 hover:border-primary-300 transition-all shadow-sm group">
                                Kelola Daftar FAQ
                                <svg class="w-4 h-4 ml-1.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 6. Mengenal Kami -->
            <div x-show="activeTab === 'profil'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" style="display: none;">
                <h3 class="text-lg leading-6 font-bold text-primary-800 mb-6">6. Tentang Kami Section</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Label Kategori</label>
                            <input type="text" name="about_label" value="<?php echo e($settings['about_label'] ?? 'Mengenal Kami'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Headline Judul</label>
                            <textarea name="about_headline" rows="2" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800"><?php echo e(str_replace(['<br>', '<br/>', '<br />'], "\n", $settings['about_headline'] ?? "Belajar dengan Hati,\nTumbuh dengan Percaya Diri")); ?></textarea>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Deskripsi</label>
                            <textarea name="about_us" rows="7" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800"><?php echo e($settings['about_us'] ?? ''); ?></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Visi</label>
                                <textarea name="visi" rows="5" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800"><?php echo e($settings['visi'] ?? 'Menjadi platform digital dan mitra terpercaya bagi orang tua dalam mendampingi tumbuh kembang akademik serta pembentukan karakter anak secara holistik.'); ?></textarea>
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Misi</label>
                                <textarea name="misi" rows="5" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800"><?php echo e($settings['misi'] ?? 'Memberikan pendampingan belajar yang personal dan disesuaikan dengan kebutuhan unik setiap murid.\nMenyediakan laporan perkembangan berkala secara transparan demi menjalin komunikasi terbuka dengan orang tua.\nMembangun lingkungan belajar yang aman, nyaman, dan menumbuhkan rasa cinta belajar sejak dini.'); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200">
                            <h4 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Profil Founder</h4>
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-sm text-gray-600 font-semibold mb-2">Nama Lengkap</label>
                                    <input type="text" name="founder_name" value="<?php echo e($settings['founder_name'] ?? 'Ismaturrohmah, S.Pd., Gr.'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 font-semibold mb-2">Jabatan</label>
                                    <input type="text" name="founder_role" value="<?php echo e($settings['founder_role'] ?? 'Founder'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                                </div>
                                <div>
                                    <div x-data="{ imageUrl: '<?php echo e(isset($settings['founder_image']) ? asset($settings['founder_image']) : ''); ?>', originalUrl: '<?php echo e(isset($settings['founder_image']) ? asset($settings['founder_image']) : ''); ?>' }" @form-reset.window="imageUrl = originalUrl">
                                    <label class="block text-sm text-gray-600 font-semibold mb-2">Foto Profil</label>
                                    <div class="mb-3">
                                        <div x-show="imageUrl" style="display: none;">
                                            <img :src="imageUrl" alt="Founder Preview" class="aspect-[4/5] w-28 object-cover rounded-xl border-2 border-gray-200 bg-white p-1 shadow-sm">
                                        </div>
                                        <div x-show="!imageUrl" class="aspect-[4/5] w-28 border-2 border-dashed border-primary-400 bg-primary-50/50 rounded-xl flex flex-col items-center justify-center transition-colors duration-300">
                                            <div class="w-10 h-10 rounded-full bg-white border border-primary-400 shadow-sm flex items-center justify-center mb-1.5 transition-colors duration-300">
                                                <svg class="h-5 w-5 text-primary-600 transition-colors duration-300" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                            </div>
                                            <span class="text-[10px] font-semibold text-primary-600 transition-colors duration-300">Belum ada foto</span>
                                        </div>
                                    </div>
                                    <input type="file" name="founder_image" accept="image/jpeg,image/png,image/webp" @change="if ($event.target.files.length) imageUrl = URL.createObjectURL($event.target.files[0])" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100 transition-colors cursor-pointer bg-white border border-gray-200 rounded-xl">
                                    <p class="text-xs text-gray-500 mt-2 leading-relaxed">
                                        <span class="font-bold text-primary-700">Rasio Foto 4:5</span><br>
                                        Format: JPEG, JPG, PNG, WEBP.<br>
                                        Maksimal berukuran 2MB.
                                    </p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 7. Galeri Edukasi -->
            <div x-show="activeTab === 'galeri'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" style="display: none;">
                <h3 class="text-lg leading-6 font-bold text-primary-800 mb-6">7. Galeri Dokumentasi Section</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Label Kategori</label>
                            <input type="text" name="gallery_label" value="<?php echo e($settings['gallery_label'] ?? 'Galeri Dokumentasi'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Headline Judul</label>
                            <textarea name="gallery_headline" rows="2" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800"><?php echo e($settings['gallery_headline'] ?? 'Momen Berharga di Ruang Les'); ?></textarea>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Deskripsi</label>
                            <textarea name="gallery_description" rows="4" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800"><?php echo e($settings['gallery_description'] ?? 'Sekilas gambaran suasana belajar yang interaktif, hangat, dan menyenangkan.'); ?></textarea>
                        </div>
                    </div>

                    <div>
                        <div class="bg-primary-50/40 p-5 rounded-2xl border border-primary-100 shadow-sm">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm mr-3 text-primary-600 border border-primary-50 shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                                <h4 class="text-lg font-bold text-primary-800">Kelola Galeri Foto</h4>
                            </div>
                            <p class="text-sm text-gray-600 mb-5 leading-relaxed">
                                Bagikan momen terbaik dan pamerkan foto-foto seru dari kegiatan, fasilitas, dan suasana belajar yang menyenangkan.
                            </p>
                            <a href="<?php echo e(route('admin.galleries.index')); ?>" class="inline-flex items-center justify-center w-full px-4 py-2.5 bg-white border border-primary-200 text-primary-700 rounded-xl text-sm font-bold hover:bg-primary-100 hover:border-primary-300 transition-all shadow-sm group">
                                Kelola Galeri Foto
                                <svg class="w-4 h-4 ml-1.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 8. Footer -->
            <div x-show="activeTab === 'footer'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" style="display: none;">
                <h3 class="text-lg leading-6 font-bold text-primary-800 mb-6">8. Informasi Footer</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Deskripsi Footer</label>
                            <textarea name="footer_description" rows="4" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800"><?php echo e($settings['footer_description'] ?? 'Bimbingan belajar terpadu untuk tingkat Sekolah Dasar (SD). Memfasilitasi perkembangan akademik anak dengan pendekatan modern dan transparan, memadukan peran aktif Mentor dan Orang Tua.'); ?></textarea>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200">
                            <h4 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Informasi Kontak Utama</h4>
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-sm text-gray-600 font-semibold mb-2">Alamat Lengkap</label>
                                    <input type="text" name="footer_address" value="<?php echo e($settings['footer_address'] ?? 'Jl. H. Shibi No.57, RT.8/RW.001, Srengseng Sawah, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12640'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 font-semibold mb-2">Link URL Google Maps</label>
                                    <input type="text" name="footer_maps_url" value="<?php echo e($settings['footer_maps_url'] ?? 'https://maps.app.goo.gl/3Q'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors placeholder-gray-400 text-sm font-medium" placeholder="https://maps.app.goo.gl/...">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm text-gray-600 font-semibold mb-2">Alamat Email Resmi</label>
                                        <input type="email" name="footer_email" value="<?php echo e($settings['footer_email'] ?? 'ruanglesismaturrohmah@gmail.com'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                                    </div>
                                    <div>
                                        <label class="block text-sm text-gray-600 font-semibold mb-2">Nomor Telepon Resmi</label>
                                        <input type="text" name="footer_whatsapp" value="<?php echo e($settings['footer_whatsapp'] ?? '6281319076124'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200">
                            <h4 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Sosial Media</h4>
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-sm text-gray-600 font-semibold mb-2">Call to Action</label>
                                    <input type="text" name="footer_social_text" value="<?php echo e($settings['footer_social_text'] ?? 'Dapatkan info pendaftaran terbaru dan tips belajar bermanfaat.'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 font-semibold mb-2">Link Instagram</label>
                                    <input type="text" name="footer_instagram_url" value="<?php echo e($settings['footer_instagram_url'] ?? 'https://instagram.com/ruangles'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800 placeholder-gray-400">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 9. Pendaftaran & Pembayaran -->
            <div x-show="activeTab === 'pendaftaran'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" style="display: none;">
                <h3 class="text-lg leading-6 font-bold text-primary-800 mb-6">9. Pendaftaran & Pembayaran</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200">
                            <h4 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Banner Pendaftaran</h4>
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-sm text-gray-600 font-semibold mb-2">Headline Banner</label>
                                    <input type="text" name="cta_headline" value="<?php echo e($settings['cta_headline'] ?? 'Siap Memulai Perjalanan Belajar Anak Anda?'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 font-semibold mb-2">Deskripsi Banner</label>
                                    <textarea name="cta_description" rows="3" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800"><?php echo e($settings['cta_description'] ?? 'Bergabunglah bersama ratusan orang tua lainnya yang telah mempercayakan pendidikan karakter dan akademik putra-putrinya di Ruang Les.'); ?></textarea>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 font-semibold mb-2">Tombol Call to Action</label>
                                    <input type="text" name="cta_button_text" value="<?php echo e($settings['cta_button_text'] ?? 'Daftar Sekarang'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 mb-6">
                            <h4 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Rekening Bank</h4>
                            <div class="space-y-5">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm text-gray-600 font-semibold mb-2">Nama Bank</label>
                                        <input type="text" name="nama_bank" value="<?php echo e($settings['nama_bank'] ?? 'Bank Central Asia (BCA)'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                                    </div>
                                    <div>
                                        <label class="block text-sm text-gray-600 font-semibold mb-2">Nomor Rekening</label>
                                        <input type="text" name="nomor_akun_bank" value="<?php echo e($settings['nomor_akun_bank'] ?? '7340033447'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800 font-mono">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 font-semibold mb-2">Nama Pemilik Rekening</label>
                                    <input type="text" name="nama_akun_bank" value="<?php echo e($settings['nama_akun_bank'] ?? 'Ismaturrohmah'); ?>" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200">
                            <h4 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Syarat & Ketentuan Pendaftaran (T&C)</h4>
                            <div class="bg-white rounded-2xl shadow-sm">
                                <input id="terms_conditions" type="hidden" name="terms_conditions" value="<?php echo e($settings['terms_conditions'] ?? '<ol><li>Pendaftaran dianggap sah apabila telah melakukan konfirmasi pembayaran.</li><li>Murid wajib mematuhi seluruh peraturan bimbingan belajar Ruang Les.</li><li>Informasi lebih lanjut dapat menghubungi Admin kami.</li></ol>'); ?>">
                                <trix-editor input="terms_conditions" class="trix-content"></trix-editor>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button (Fixed at Bottom of the Form Container) -->
            <div :class="isSticky ? 'bottom-[-20px] p-3 md:p-4 rounded-2xl' : 'bottom-0 p-6 md:p-8 rounded-2xl'" class="mt-10 flex flex-col md:flex-row items-center gap-3 md:gap-4 sticky bg-white/90 backdrop-blur-md shadow-[0_-4px_10px_-1px_rgba(0,0,0,0.05)] border border-primary-100/50 z-20 transition-all duration-300">
                <button type="reset" :class="isSticky ? 'py-3 text-sm rounded-xl' : 'py-4 text-sm rounded-2xl'" class="w-full md:w-1/3 flex items-center justify-center px-6 font-bold text-gray-700 transition-all duration-300 bg-white border border-gray-300 hover:bg-red-50 hover:border-red-200 hover:text-red-600 shadow-sm transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    Reset Perubahan
                </button>
                <button type="submit" :class="isSticky ? 'py-3 text-sm rounded-xl' : 'py-4 text-base rounded-2xl'" class="w-full md:w-2/3 flex items-center justify-center px-8 font-extrabold text-white transition-all duration-300 bg-primary-600 hover:bg-primary-700 shadow-lg shadow-primary-500/30 transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                    Simpan Semua Pengaturan
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ruang-les\resources\views/admin/pengaturan/daftar.blade.php ENDPATH**/ ?>