<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Ruang Les</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- AlpineJS -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- TomSelect (Searchable Dropdown) -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @stack('styles')

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
        <x-admin.bilah-samping />

        <!-- Main Wrapper -->
        <div class="flex-1 flex flex-col h-full overflow-hidden relative">
            <!-- Header Component -->
            <x-admin.tajuk />

            <!-- Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto px-2 pt-7 pb-8 sm:px-4 lg:px-6 custom-scrollbar">
                
                <!-- Native Alpine.js Toast Notification System -->
                @include('components.notifikasi-singkat')

                @yield('content')
            </main>
        </div>
        
        <!-- Mobile Sidebar Overlay -->
        <div x-show="sidebarOpen" 
             x-transition.opacity
             @click="sidebarOpen = false"
             class="fixed inset-0 bg-primary-900/20 backdrop-blur-sm z-40 lg:hidden">
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

            // Global SweetAlert2 untuk Konfirmasi Tutup Tiket (.close-ticket-form)
            document.body.addEventListener('submit', function(e) {
                if (e.target && e.target.classList.contains('close-ticket-form')) {
                    e.preventDefault();
                    let form = e.target;
                    Swal.fire({
                        title: 'Tutup Tiket?',
                        text: "Apakah Anda yakin ingin menutup tiket ini? Pengguna tidak akan bisa membalas lagi.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Tutup Tiket',
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

            // Global SweetAlert2 untuk Konfirmasi Reset Password (.reset-password-form)
            document.body.addEventListener('submit', function(e) {
                if (e.target && e.target.classList.contains('reset-password-form')) {
                    e.preventDefault();
                    let form = e.target;
                    let itemName = form.getAttribute('data-name') || 'akun';
                    Swal.fire({
                        title: 'Reset Password?',
                        text: "Password untuk " + itemName + " akan direset menjadi 'user12345'. Anda yakin?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Reset',
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
    
    @stack('scripts')
</body>
</html>
