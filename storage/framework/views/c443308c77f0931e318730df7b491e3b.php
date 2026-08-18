<?php if (isset($component)) { $__componentOriginalcca8b3434b2f26effed6a432780d8e12 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcca8b3434b2f26effed6a432780d8e12 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.tata-letak-publik','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('tata-letak-publik'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="relative w-full overflow-x-hidden">
        <!-- LATAR BELAKANG: Menampilkan efek gelombang animasi menggunakan elemen SVG -->
        <div class="absolute inset-0 w-full h-full z-[-1] pointer-events-none overflow-hidden bg-primary-50">
            <svg viewBox="0 0 1440 800" preserveAspectRatio="none" class="absolute inset-0 w-full h-full object-cover scale-[1.15] transform-gpu origin-center filter blur-lg">
                <rect width="1440" height="800" fill="var(--color-primary-50)" />
                <path fill="var(--color-primary-100)" d="M0,100 C200,200 500,-50 900,150 C1200,300 1350,50 1440,120 L1440,800 L0,800 Z" />
                <path fill="var(--color-primary-200)" d="M0,250 C300,100 600,350 950,200 C1200,100 1350,300 1440,220 L1440,800 L0,800 Z" />
                <path fill="var(--color-primary-350)" d="M0,350 C400,500 700,200 1000,450 C1250,600 1350,300 1440,400 L1440,800 L0,800 Z" />
                <path fill="var(--color-primary-400)" d="M0,550 C250,400 650,750 950,500 C1200,350 1380,600 1440,520 L1440,800 L0,800 Z" />
                <path fill="var(--color-primary-450)" d="M0,650 C350,850 550,550 1050,750 C1250,850 1350,600 1440,680 L1440,800 L0,800 Z" />
            </svg>
        </div>

        <?php if (isset($component)) { $__componentOriginald872e0170acd7bdbc1fab7b4b1027187 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald872e0170acd7bdbc1fab7b4b1027187 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.publik.utama','data' => ['settings' => $settings,'firstLine' => $firstLine,'secondLine' => $secondLine]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('publik.utama'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['settings' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($settings),'firstLine' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($firstLine),'secondLine' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($secondLine)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald872e0170acd7bdbc1fab7b4b1027187)): ?>
<?php $attributes = $__attributesOriginald872e0170acd7bdbc1fab7b4b1027187; ?>
<?php unset($__attributesOriginald872e0170acd7bdbc1fab7b4b1027187); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald872e0170acd7bdbc1fab7b4b1027187)): ?>
<?php $component = $__componentOriginald872e0170acd7bdbc1fab7b4b1027187; ?>
<?php unset($__componentOriginald872e0170acd7bdbc1fab7b4b1027187); ?>
<?php endif; ?>
        
        <!-- Divider -->
        <div class="max-w-[90rem] mx-auto h-[3px] bg-gradient-to-r from-transparent via-primary-700/40 to-transparent w-[90%] relative z-10 rounded-full"></div>
        
        <?php if (isset($component)) { $__componentOriginal6e96cbedf7e30f6fc14e2cef22699d22 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6e96cbedf7e30f6fc14e2cef22699d22 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.publik.keunggulan','data' => ['features' => $features,'settings' => $settings]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('publik.keunggulan'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['features' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($features),'settings' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($settings)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6e96cbedf7e30f6fc14e2cef22699d22)): ?>
<?php $attributes = $__attributesOriginal6e96cbedf7e30f6fc14e2cef22699d22; ?>
<?php unset($__attributesOriginal6e96cbedf7e30f6fc14e2cef22699d22); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6e96cbedf7e30f6fc14e2cef22699d22)): ?>
<?php $component = $__componentOriginal6e96cbedf7e30f6fc14e2cef22699d22; ?>
<?php unset($__componentOriginal6e96cbedf7e30f6fc14e2cef22699d22); ?>
<?php endif; ?>
        
        <!-- Divider -->
        <div class="max-w-[90rem] mx-auto h-[3px] bg-gradient-to-r from-transparent via-primary-700/40 to-transparent w-[90%] relative z-10 rounded-full"></div>
        
        <?php if (isset($component)) { $__componentOriginale96474136176f98e21a2db2674b44f89 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale96474136176f98e21a2db2674b44f89 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.publik.program','data' => ['groupedPackages' => $groupedPackages,'settings' => $settings]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('publik.program'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['groupedPackages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($groupedPackages),'settings' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($settings)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale96474136176f98e21a2db2674b44f89)): ?>
<?php $attributes = $__attributesOriginale96474136176f98e21a2db2674b44f89; ?>
<?php unset($__attributesOriginale96474136176f98e21a2db2674b44f89); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale96474136176f98e21a2db2674b44f89)): ?>
<?php $component = $__componentOriginale96474136176f98e21a2db2674b44f89; ?>
<?php unset($__componentOriginale96474136176f98e21a2db2674b44f89); ?>
<?php endif; ?>
        
        <!-- Divider -->
        <div class="max-w-[90rem] mx-auto h-[3px] bg-gradient-to-r from-transparent via-primary-700/40 to-transparent w-[90%] relative z-10 rounded-full"></div>
        
        <?php if (isset($component)) { $__componentOriginal0b2e490fd1a67fa2528d49bbb1926c08 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b2e490fd1a67fa2528d49bbb1926c08 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.publik.testimoni','data' => ['testimonials' => $testimonials,'settings' => $settings]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('publik.testimoni'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['testimonials' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($testimonials),'settings' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($settings)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b2e490fd1a67fa2528d49bbb1926c08)): ?>
<?php $attributes = $__attributesOriginal0b2e490fd1a67fa2528d49bbb1926c08; ?>
<?php unset($__attributesOriginal0b2e490fd1a67fa2528d49bbb1926c08); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b2e490fd1a67fa2528d49bbb1926c08)): ?>
<?php $component = $__componentOriginal0b2e490fd1a67fa2528d49bbb1926c08; ?>
<?php unset($__componentOriginal0b2e490fd1a67fa2528d49bbb1926c08); ?>
<?php endif; ?>
        
        <!-- Divider -->
        <div class="max-w-[90rem] mx-auto h-[3px] bg-gradient-to-r from-transparent via-primary-700/40 to-transparent w-[90%] relative z-10 rounded-full"></div>
        
        <?php if (isset($component)) { $__componentOriginalc3e52a6284fa046a9c8c86dbb5ad483e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc3e52a6284fa046a9c8c86dbb5ad483e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.publik.faq','data' => ['faqs' => $faqs,'settings' => $settings]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('publik.faq'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['faqs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($faqs),'settings' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($settings)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc3e52a6284fa046a9c8c86dbb5ad483e)): ?>
<?php $attributes = $__attributesOriginalc3e52a6284fa046a9c8c86dbb5ad483e; ?>
<?php unset($__attributesOriginalc3e52a6284fa046a9c8c86dbb5ad483e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3e52a6284fa046a9c8c86dbb5ad483e)): ?>
<?php $component = $__componentOriginalc3e52a6284fa046a9c8c86dbb5ad483e; ?>
<?php unset($__componentOriginalc3e52a6284fa046a9c8c86dbb5ad483e); ?>
<?php endif; ?>
        
        <?php if (isset($component)) { $__componentOriginal1bfa4e60ef216c95d545a3e610c276e1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1bfa4e60ef216c95d545a3e610c276e1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.publik.ajakan','data' => ['settings' => $settings]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('publik.ajakan'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['settings' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($settings)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1bfa4e60ef216c95d545a3e610c276e1)): ?>
<?php $attributes = $__attributesOriginal1bfa4e60ef216c95d545a3e610c276e1; ?>
<?php unset($__attributesOriginal1bfa4e60ef216c95d545a3e610c276e1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1bfa4e60ef216c95d545a3e610c276e1)): ?>
<?php $component = $__componentOriginal1bfa4e60ef216c95d545a3e610c276e1; ?>
<?php unset($__componentOriginal1bfa4e60ef216c95d545a3e610c276e1); ?>
<?php endif; ?>
    </div>

    <!-- BAGIAN GAYA CSS KHUSUS: Mengatur animasi tambahan seperti efek melayang (blob) dan sembunyikan scrollbar -->
    <style>
        /* Custom Animations */
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .perspective {
            perspective: 1000px;
        }
        .pattern-dots {
            background-image: radial-gradient(currentColor 1px, transparent 1px);
            background-size: 20px 20px;
        }
        .animate-bounce-slow {
            animation: bounce 3s infinite;
        }
        /* Hide scrollbar for slider */
        .scrollbar-hide {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none; /* Chrome, Safari and Opera */
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcca8b3434b2f26effed6a432780d8e12)): ?>
<?php $attributes = $__attributesOriginalcca8b3434b2f26effed6a432780d8e12; ?>
<?php unset($__attributesOriginalcca8b3434b2f26effed6a432780d8e12); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcca8b3434b2f26effed6a432780d8e12)): ?>
<?php $component = $__componentOriginalcca8b3434b2f26effed6a432780d8e12; ?>
<?php unset($__componentOriginalcca8b3434b2f26effed6a432780d8e12); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\ruang-les-v2\resources\views/publik/beranda.blade.php ENDPATH**/ ?>