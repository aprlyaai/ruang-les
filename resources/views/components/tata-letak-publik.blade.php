<!DOCTYPE html>
<html lang="id" class="scroll-smooth scroll-pt-24">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Ruang Les') }} - Tingkatkan Prestasi Anak</title>
    
    <!-- SEO & Meta Tags -->
    <meta name="description" content="{{ $settings['meta_description'] ?? 'Platform bimbingan belajar inovatif untuk siswa SD.' }}">
    <meta name="keywords" content="{{ $settings['meta_keywords'] ?? 'ruang les, bimbel sd, les privat' }}">
    <meta name="author" content="Ismaturrohmah">
    
    <!-- Open Graph / WhatsApp / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="{{ $settings['site_name'] ?? 'Ruang Les' }} - Tingkatkan Prestasi Anak">
    <meta property="og:description" content="{{ $settings['meta_description'] ?? 'Platform bimbingan belajar inovatif untuk siswa SD.' }}">
    <meta property="og:image" content="{{ asset($settings['og_image_url'] ?? 'images/logo.png') }}">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet">
    
    <!-- AlpineJS with Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #fdfdfd;
            color: #333333;
            overflow-x: hidden;
        }
        h1, h2, h3, .font-heading {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">
    
    <!-- Dynamic Header -->
    <x-tajuk-situs />

    <!-- Main Content -->
    <main class="flex-grow w-full">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <x-kaki-halaman />

    @stack('scripts')
</body>
</html>
