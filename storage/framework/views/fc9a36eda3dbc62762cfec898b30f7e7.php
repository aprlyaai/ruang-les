<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Mentor Panel'); ?> - Ruang Les</title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('favicon.ico')); ?>">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;600;700;800;900&display=swap" rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <!-- AlpineJS -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- TomSelect (Searchable Dropdown) -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <?php echo $__env->yieldPushContent('styles'); ?>

    <style>
        /* TomSelect Tailwind Integration Fixes */
        .ts-control { 
            border-radius: 1rem; 
            padding: 0.75rem 1rem; 
            border-color: #e5e7eb; 
            background-color: #f9fafb; 
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); 
            font-size: 0.875rem; 
            font-weight: 500;
            color: #1f2937;
            transition: all 0.15s ease-in-out; 
        }
        .ts-control.focus { 
            background-color: #ffffff; 
            border-color: #93c38b; 
            box-shadow: 0 0 0 2px #cee6c8; 
        }
        .ts-dropdown { 
            border-radius: 1rem; 
            border-color: #e5e7eb; 
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); 
            font-size: 0.875rem; 
            font-weight: 500; 
            overflow: hidden;
            margin-top: 0.25rem;
        }
        .ts-dropdown .option {
            padding: 0.75rem 1rem;
            transition: background-color 0.1s;
        }
        .ts-dropdown .option.active {
            background-color: #f4f9f3;
            color: #426c3c;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none !important;
        }
        .no-scrollbar {
            -ms-overflow-style: none !important;
            scrollbar-width: none !important;
        }

        /* Elegant Blob Animation */
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 15s infinite alternate ease-in-out;
        }
    </style>
</head>
<body class="bg-primary-50 text-gray-600 font-sans antialiased text-sm overflow-hidden relative leading-relaxed">
    
    <!-- Background Gradient Decorations -->
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[40rem] h-[40rem] bg-primary-200/50 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 animate-blob"></div>
        <div class="absolute top-[20%] right-[-10%] w-[35rem] h-[35rem] bg-primary-300/40 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 animate-blob" style="animation-delay: 2s;"></div>
        <div class="absolute bottom-[-20%] left-[20%] w-[45rem] h-[45rem] bg-primary-100/60 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 animate-blob" style="animation-delay: 4s;"></div>
    </div>

    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden relative z-10 p-2 sm:p-4 gap-4">
        
        <!-- Sidebar Component -->
        <?php if (isset($component)) { $__componentOriginalcd7dfa5089899bedcca9f4fea473db23 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd7dfa5089899bedcca9f4fea473db23 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.mentor.bilah-samping','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mentor.bilah-samping'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd7dfa5089899bedcca9f4fea473db23)): ?>
<?php $attributes = $__attributesOriginalcd7dfa5089899bedcca9f4fea473db23; ?>
<?php unset($__attributesOriginalcd7dfa5089899bedcca9f4fea473db23); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd7dfa5089899bedcca9f4fea473db23)): ?>
<?php $component = $__componentOriginalcd7dfa5089899bedcca9f4fea473db23; ?>
<?php unset($__componentOriginalcd7dfa5089899bedcca9f4fea473db23); ?>
<?php endif; ?>

        <!-- Main Wrapper -->
        <div class="flex-1 flex flex-col h-full overflow-hidden relative">
            <!-- Header Component -->
            <?php if (isset($component)) { $__componentOriginal0aa81ae4e2124677a57124317609bc15 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0aa81ae4e2124677a57124317609bc15 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.mentor.tajuk','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mentor.tajuk'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0aa81ae4e2124677a57124317609bc15)): ?>
<?php $attributes = $__attributesOriginal0aa81ae4e2124677a57124317609bc15; ?>
<?php unset($__attributesOriginal0aa81ae4e2124677a57124317609bc15); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0aa81ae4e2124677a57124317609bc15)): ?>
<?php $component = $__componentOriginal0aa81ae4e2124677a57124317609bc15; ?>
<?php unset($__componentOriginal0aa81ae4e2124677a57124317609bc15); ?>
<?php endif; ?>

            <!-- Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto px-2 pt-7 pb-8 sm:px-4 lg:px-6 custom-scrollbar">
                
                <!-- Native Alpine.js Toast Notification System -->
                <?php echo $__env->make('components.notifikasi-singkat', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
        
        <!-- Mobile Sidebar Overlay -->
        <div x-cloak
             x-show="sidebarOpen" 
             x-transition.opacity
             @click="sidebarOpen = false"
             class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm z-[9999] lg:hidden"
             style="display: none;">
        </div>
    </div>

    <!-- Init Global Scripts -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Restore Main Content Scroll Position for internal scrollable div
            const mainContent = document.querySelector('main.overflow-y-auto');
            if (mainContent) {
                const scrollKey = 'scrollPos_' + window.location.pathname;
                const savedScroll = sessionStorage.getItem(scrollKey);
                if (savedScroll) {
                    // Gunakan setTimeout agar render selesai dulu
                    setTimeout(() => { mainContent.scrollTop = parseInt(savedScroll, 10); }, 10);
                }
                mainContent.addEventListener('scroll', function() {
                    sessionStorage.setItem(scrollKey, mainContent.scrollTop);
                }, { passive: true });
            }

            // Inisialisasi TomSelect pada semua elemen dengan class 'searchable-select'
            document.querySelectorAll('.searchable-select').forEach((el) => {
                new TomSelect(el, {
                    create: false,
                    sortField: { field: "text", direction: "asc" },
                    placeholder: el.getAttribute('data-placeholder') || '-- Pilih --'
                });
            });

            // Global SweetAlert2 untuk Konfirmasi Hapus Permanen (.delete-form)
            document.body.addEventListener('submit', function(e) {
                if (e.target && e.target.classList.contains('delete-form')) {
                    e.preventDefault();
                    let form = e.target;
                    let itemName = form.getAttribute('data-name') || 'data';
                    
                    let customTitle = form.getAttribute('data-title') || 'Hapus Data?';
                    let customText = form.getAttribute('data-text') || ("Semua data terkait " + itemName + " ini akan dihapus secara permanen dari sistem!");
                    let customConfirm = form.getAttribute('data-confirm') || 'Ya, Hapus Permanen';

                    Swal.fire({
                        title: customTitle,
                        text: customText,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: customConfirm,
                        cancelButtonText: 'Batal',
                        width: '24rem',
                        padding: '1.5rem',
                        buttonsStyling: false,
                        customClass: {
                            popup: '!rounded-2xl !shadow-2xl !border !border-gray-100',
                            title: '!text-xl !font-extrabold font-heading !text-gray-900 !pt-2',
                            htmlContainer: '!text-sm !text-gray-500 !mt-2',
                            icon: '!scale-75 !mt-0 !mb-2 !border-amber-400 !text-amber-500',
                            actions: '!mt-6 !w-full !flex !justify-center !gap-3',
                            confirmButton: '!bg-red-500 hover:!bg-red-600 !text-white !rounded-xl !text-sm !font-bold !px-8 !py-2.5 !transition-all !duration-100 !shadow-sm hover:!shadow-md transform hover:!-translate-y-0.5',
                            cancelButton: '!bg-gray-100 hover:!bg-gray-200 !text-gray-700 !rounded-xl !text-sm !font-bold !px-8 !py-2.5 !transition-all !duration-100'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                }
            });
        });
    </script>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\ruang-les\resources\views/layouts/mentor.blade.php ENDPATH**/ ?>