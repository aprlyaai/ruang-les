<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(config('app.name', 'Ruang Les')); ?></title>
    
    <!-- Vite Assets -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

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
    <main class="flex-grow">
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

    <!-- AlpineJS for Dropdowns (Required if using simple dropdowns) -->
    <script src="//unpkg.com/alpinejs" defer></script>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\ruang-les\resources\views/components/tata-letak-aplikasi.blade.php ENDPATH**/ ?>