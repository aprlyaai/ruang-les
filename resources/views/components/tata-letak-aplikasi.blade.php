<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Ruang Les') }}</title>
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #fdfdfd;
            color: #333333;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">
    
    <!-- Dynamic Header -->
    <x-tajuk-situs />

    <!-- Main Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <x-kaki-halaman />

    <!-- AlpineJS for Dropdowns (Required if using simple dropdowns) -->
    <script src="//unpkg.com/alpinejs" defer></script>
    
    @stack('scripts')
</body>
</html>
