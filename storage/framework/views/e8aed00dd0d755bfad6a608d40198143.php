<!DOCTYPE html>
<html lang="id" class="scroll-smooth scroll-pt-24">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(config('app.name', 'Ruang Les')); ?> - Tingkatkan Prestasi Anak</title>
    
    <!-- SEO & Meta Tags -->
    <meta name="description" content="<?php echo e($settings['meta_description'] ?? 'Platform bimbingan belajar inovatif untuk siswa SD.'); ?>">
    <meta name="keywords" content="<?php echo e($settings['meta_keywords'] ?? 'ruang les, bimbel sd, les privat'); ?>">
    <meta name="author" content="Ismaturrohmah">
    
    <!-- Open Graph / WhatsApp / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url('/')); ?>">
    <meta property="og:title" content="<?php echo e($settings['site_name'] ?? 'Ruang Les'); ?> - Tingkatkan Prestasi Anak">
    <meta property="og:description" content="<?php echo e($settings['meta_description'] ?? 'Platform bimbingan belajar inovatif untuk siswa SD.'); ?>">
    <meta property="og:image" content="<?php echo e(asset($settings['og_image_url'] ?? 'images/logo.png')); ?>">
    
    <!-- Vite Assets -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

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
    <?php if (isset($component)) { $__componentOriginalaadc8f021838537014d8ec5b16922b93 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaadc8f021838537014d8ec5b16922b93 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.tajuk-situs','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('tajuk-situs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaadc8f021838537014d8ec5b16922b93)): ?>
<?php $attributes = $__attributesOriginalaadc8f021838537014d8ec5b16922b93; ?>
<?php unset($__attributesOriginalaadc8f021838537014d8ec5b16922b93); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaadc8f021838537014d8ec5b16922b93)): ?>
<?php $component = $__componentOriginalaadc8f021838537014d8ec5b16922b93; ?>
<?php unset($__componentOriginalaadc8f021838537014d8ec5b16922b93); ?>
<?php endif; ?>

    <!-- Main Content -->
    <main class="flex-grow w-full">
        <?php echo e($slot); ?>

    </main>

    <!-- Footer -->
    <?php if (isset($component)) { $__componentOriginal2927a7343f318e4a55d6a45e11f8b942 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2927a7343f318e4a55d6a45e11f8b942 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.kaki-halaman','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('kaki-halaman'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2927a7343f318e4a55d6a45e11f8b942)): ?>
<?php $attributes = $__attributesOriginal2927a7343f318e4a55d6a45e11f8b942; ?>
<?php unset($__attributesOriginal2927a7343f318e4a55d6a45e11f8b942); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2927a7343f318e4a55d6a45e11f8b942)): ?>
<?php $component = $__componentOriginal2927a7343f318e4a55d6a45e11f8b942; ?>
<?php unset($__componentOriginal2927a7343f318e4a55d6a45e11f8b942); ?>
<?php endif; ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\ruang-les-v2\resources\views/components/tata-letak-publik.blade.php ENDPATH**/ ?>