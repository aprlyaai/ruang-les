<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['layoutSiswas', 'layoutActiveSiswaId', 'isLocked' => false]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['layoutSiswas', 'layoutActiveSiswaId', 'isLocked' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<header class="h-20 bg-white/80 backdrop-blur-md border border-primary-100/50 rounded-2xl flex items-center justify-between px-6 shadow-sm relative z-20">
    <div class="flex items-center">
        <button @click="sidebarOpen = true" class="p-2 mr-4 rounded-xl text-gray-500 hover:text-primary-600 hover:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 lg:hidden transition-colors">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
        <div class="hidden sm:flex items-center text-sm font-medium text-gray-500">
            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
            <a href="<?php echo e(route('dashboard')); ?>" class="hover:text-primary-600 transition-colors">Home</a>

            <?php if (! empty(trim($__env->yieldContent('breadcrumbs')))): ?>
                <?php echo $__env->yieldContent('breadcrumbs'); ?>
            <?php else: ?>
                <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="text-gray-800 font-bold"><?php echo $__env->yieldContent('title', 'Dashboard'); ?></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="flex items-center space-x-3 lg:space-x-4">
        <!-- Date Display (Global) -->
        <div class="hidden md:flex items-center text-xs font-bold text-primary-700 bg-primary-50/60 border border-primary-100/70 rounded-xl px-3.5 py-1.5 shadow-sm">
            <svg class="w-3.5 h-3.5 mr-2 text-primary-600 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <?php echo e(\Carbon\Carbon::now()->translatedFormat('l, d F Y')); ?>

        </div>

        <!-- Switch Murid Dropdown -->
        <?php if($layoutSiswas->count() > 0): ?>
        <div class="relative" x-data="{ studentDropdownOpen: false }">
            <button @click="studentDropdownOpen = !studentDropdownOpen" @click.away="studentDropdownOpen = false" class="flex items-center space-x-2.5 focus:outline-none px-3.5 py-1.5 rounded-xl bg-gray-50 hover:bg-gray-100 transition-all border border-gray-200 hover:border-gray-300 shadow-sm h-12 relative">
                <?php if(isset($hasOtherChildNotifications) && $hasOtherChildNotifications): ?>
                    <span class="absolute -top-1 -right-1 flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500 border-2 border-white"></span>
                    </span>
                <?php endif; ?>
                <?php if (isset($component)) { $__componentOriginala3b0902aa82c25e0a3af1fd64938810c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3b0902aa82c25e0a3af1fd64938810c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.avatar','data' => ['name' => $layoutActiveSiswaId ? ($layoutSiswas->firstWhere('murid_id', $layoutActiveSiswaId)->panggilan_murid ?? 'P') : 'P','size' => '8','textSize' => 'text-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.avatar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($layoutActiveSiswaId ? ($layoutSiswas->firstWhere('murid_id', $layoutActiveSiswaId)->panggilan_murid ?? 'P') : 'P'),'size' => '8','textSize' => 'text-xs']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala3b0902aa82c25e0a3af1fd64938810c)): ?>
<?php $attributes = $__attributesOriginala3b0902aa82c25e0a3af1fd64938810c; ?>
<?php unset($__attributesOriginala3b0902aa82c25e0a3af1fd64938810c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala3b0902aa82c25e0a3af1fd64938810c)): ?>
<?php $component = $__componentOriginala3b0902aa82c25e0a3af1fd64938810c; ?>
<?php unset($__componentOriginala3b0902aa82c25e0a3af1fd64938810c); ?>
<?php endif; ?>
                <span class="text-sm font-bold text-gray-700 hidden md:block">
                    <?php if($layoutActiveSiswaId): ?>
                        <?php echo e($layoutSiswas->firstWhere('murid_id', $layoutActiveSiswaId)->panggilan_murid ?? 'Pilih Anak'); ?>

                    <?php else: ?>
                        Pilih Anak
                    <?php endif; ?>
                </span>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="studentDropdownOpen"
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="transform opacity-0 scale-95"
                 x-transition:enter-end="transform opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="transform opacity-100 scale-100"
                 x-transition:leave-end="transform opacity-0 scale-95"
                 style="display: none;"
                 class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-lg border border-gray-100 py-2 z-50">
                <p class="px-4 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Pilih Profil Anak</p>
                <?php $__currentLoopData = $layoutSiswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form method="POST" action="<?php echo e(route('dashboard.switch')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="murid_id" value="<?php echo e($student->murid_id); ?>">
                        <button type="submit" class="w-full text-left flex items-center px-4 py-2.5 text-sm <?php echo e($layoutActiveSiswaId == $student->murid_id ? 'bg-primary-50 text-primary-700 font-bold' : 'text-gray-700 hover:bg-gray-50'); ?> transition-colors">
                            <div class="mr-3">
                                <?php if (isset($component)) { $__componentOriginala3b0902aa82c25e0a3af1fd64938810c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3b0902aa82c25e0a3af1fd64938810c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.avatar','data' => ['name' => $student->panggilan_murid,'size' => '7','textSize' => 'text-[11px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.avatar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->panggilan_murid),'size' => '7','textSize' => 'text-[11px]']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala3b0902aa82c25e0a3af1fd64938810c)): ?>
<?php $attributes = $__attributesOriginala3b0902aa82c25e0a3af1fd64938810c; ?>
<?php unset($__attributesOriginala3b0902aa82c25e0a3af1fd64938810c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala3b0902aa82c25e0a3af1fd64938810c)): ?>
<?php $component = $__componentOriginala3b0902aa82c25e0a3af1fd64938810c; ?>
<?php unset($__componentOriginala3b0902aa82c25e0a3af1fd64938810c); ?>
<?php endif; ?>
                            </div>
                            <span class="truncate"><?php echo e($student->panggilan_murid); ?></span>
                            <?php if($layoutActiveSiswaId == $student->murid_id): ?>
                                <svg class="w-4 h-4 ml-auto text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <?php endif; ?>
                        </button>
                    </form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="border-t border-gray-100 my-2"></div>
                <a href="<?php echo e(route('pendaftaran.form')); ?>" class="block px-4 py-2 text-sm text-primary-600 hover:bg-primary-50 font-medium transition-colors flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Daftarkan Anak Baru
                </a>
            </div>
        </div>
        <?php endif; ?>

        <!-- Profile Dropdown -->
        <div x-data="{ profileDropdownOpen: false }" class="relative">
            <button @click="profileDropdownOpen = !profileDropdownOpen" class="flex items-center space-x-3 focus:outline-none px-3 py-1.5 rounded-xl hover:bg-white transition-colors border border-transparent hover:border-gray-100 hover:shadow-sm h-12">
                <div class="hidden md:flex flex-col items-end text-right">
                    <span class="text-sm font-bold text-gray-800 leading-none"><?php echo e(Auth::user()->name); ?></span>
                    <span class="text-xs font-bold text-primary-600 mt-1">Orang Tua</span>
                </div>
                <?php if(Auth::user()->avatar): ?>
                    <img src="<?php echo e(asset('storage/' . Auth::user()->avatar)); ?>" alt="<?php echo e(Auth::user()->name); ?>" class="w-8 h-8 rounded-lg object-cover shadow-sm border border-primary-100 flex-shrink-0">
                <?php else: ?>
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-primary-500 to-primary-700 text-white flex items-center justify-center text-sm font-bold shadow-sm flex-shrink-0">
                        <?php echo e(substr(Auth::user()->name, 0, 1)); ?>

                    </div>
                <?php endif; ?>
                <svg class="w-4 h-4 text-gray-400 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="profileDropdownOpen"
                 @click.away="profileDropdownOpen = false"
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="transform opacity-0 scale-95"
                 x-transition:enter-end="transform opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="transform opacity-100 scale-100"
                 x-transition:leave-end="transform opacity-0 scale-95"
                 style="display: none;"
                 class="absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-lg py-2 border border-gray-100 z-50">
                <a href="<?php echo e(route('ortu.profile.index')); ?>" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary-600 font-medium transition-colors group">
                    <svg class="w-4 h-4 mr-3 text-gray-400 group-hover:text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Profil Saya
                </a>

                <div class="h-px bg-gray-100 my-1"></div>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="w-full flex items-center px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 font-bold transition-colors group">
                        <svg class="w-4 h-4 mr-3 text-red-500 group-hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
<?php /**PATH C:\laragon\www\ruang-les\resources\views/components/orang-tua/tajuk.blade.php ENDPATH**/ ?>