<?php if (isset($component)) { $__componentOriginalcd7eb8639108f2f802be8be93b4351fe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd7eb8639108f2f802be8be93b4351fe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.tata-letak-tamu','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('tata-letak-tamu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="min-h-screen relative flex items-center justify-center bg-primary-50 overflow-hidden py-12 px-4 sm:px-6 lg:px-8">
        
        <!-- Background Decorations (SVG Waves like Beranda) -->
        <div class="absolute inset-0 w-full h-full z-0 pointer-events-none overflow-hidden">
            <svg viewBox="0 0 1440 800" preserveAspectRatio="none" class="absolute inset-0 w-full h-full object-cover scale-[1.15] transform-gpu origin-center filter blur-lg opacity-50">
                <rect width="1440" height="800" fill="var(--color-primary-50)" />
                <path fill="var(--color-primary-100)" d="M0,100 C200,200 500,-50 900,150 C1200,300 1350,50 1440,120 L1440,800 L0,800 Z" />
                <path fill="var(--color-primary-200)" d="M0,250 C300,100 600,350 950,200 C1200,100 1350,300 1440,220 L1440,800 L0,800 Z" />
            </svg>
        </div>

        <!-- Animated Blobs -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-primary-300 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>
            <div class="absolute bottom-1/4 right-1/3 w-72 h-72 bg-yellow-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
            <div class="absolute top-1/2 right-1/4 w-80 h-80 bg-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative z-10 w-full max-w-[32rem] flex flex-col items-center">
            
            <!-- Centered Branding -->
            <a href="<?php echo e(url('/')); ?>" class="flex-shrink-0 flex items-center space-x-3 group cursor-pointer mb-8">
                <div class="w-10 h-10 overflow-hidden rounded-xl border border-gray-200 shadow-sm flex-shrink-0 bg-white transition-transform group-hover:scale-105">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo Ruang Les" class="w-full h-full object-cover" onerror="this.src='https://ui-avatars.com/api/?name=RL&background=e5f2e2&color=426c3c&rounded=true'">
                </div>
                <div class="flex flex-col justify-center text-left">
                    <span class="font-heading text-2xl font-extrabold text-gray-900 leading-none tracking-tight group-hover:text-primary-700 transition-colors"><?php echo e($settings['site_name'] ?? 'Ruang Les'); ?></span>
                    <span class="text-sm font-medium text-primary-700"><?php echo e($settings['site_tagline'] ?? 'by Ismaturrohmah'); ?></span>
                </div>
            </a>

            <!-- Form Card (Glassmorphism) -->
            <div class="w-full bg-white/80 backdrop-blur-xl rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 p-8 sm:p-10 relative z-20">
                
                <!-- Form Header -->
                <div class="mb-8 text-center">
                    <?php if (isset($component)) { $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.lencana','data' => ['color' => 'primary','class' => 'inline-block py-1 px-3 rounded-full text-[10px] font-bold uppercase tracking-widest mb-3 border']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.lencana'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'primary','class' => 'inline-block py-1 px-3 rounded-full text-[10px] font-bold uppercase tracking-widest mb-3 border']); ?>
                        Masuk Portal
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $attributes = $__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__attributesOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b)): ?>
<?php $component = $__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b; ?>
<?php unset($__componentOriginal9e0c80b3c4e03c7346eb73cf95f43f4b); ?>
<?php endif; ?>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 font-heading mb-2 tracking-tight">Selamat Datang!</h2>
                    <p class="text-sm text-gray-500">Silakan masuk ke portal Anda.</p>
                </div>

                <!-- Form -->
                <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-5" novalidate>
                    <?php echo csrf_field(); ?>

                    <!-- Email -->
                    <div x-data="{ errorEmail: <?php echo e($errors->has('email') ? 'true' : 'false'); ?> }">
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-1.5">Alamat Email <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <input id="email" name="email" type="email" autocomplete="email" autofocus required value="<?php echo e(old('email')); ?>"
                                @input="errorEmail = false"
                                placeholder="contoh@email.com"
                                class="w-full pl-11 pr-4 py-3.5 bg-white/50 border border-gray-200 rounded-2xl shadow-sm placeholder-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200"
                                :class="errorEmail ? 'border-red-300 ring-1 ring-red-300 bg-red-50' : ''">
                        </div>
                        <div x-show="errorEmail">
                            <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'email']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'email']); ?>
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
                        </div>
                    </div>

                    <!-- Password -->
                    <div x-data="{ showPassword: false, errorPass: <?php echo e($errors->has('password') ? 'true' : 'false'); ?> }">
                        <label for="password" class="block text-sm font-bold text-gray-700 mb-1.5">Kata Sandi <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input :type="showPassword ? 'text' : 'password'" id="password" name="password" required autocomplete="current-password"
                                @input="errorPass = false"
                                placeholder="Masukkan kata sandi"
                                class="w-full pl-11 pr-12 py-3.5 bg-white/50 border border-gray-200 rounded-2xl shadow-sm placeholder-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-all duration-200"
                                :class="errorPass ? 'border-red-300 ring-1 ring-red-300 bg-red-50' : ''">
                            <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-primary-600 focus:text-primary-600 focus:outline-none transition-colors">
                                <svg x-show="showPassword" style="display: none;" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                <svg x-show="!showPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>
                            </button>
                        </div>
                        <div x-show="errorPass">
                            <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'password']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'password']); ?>
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
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 text-primary-600 bg-white border-gray-300 rounded focus:ring-primary-400 focus:ring-2">
                        <label for="remember_me" class="ml-2 block text-sm font-medium text-gray-600">
                            Ingat Saya di perangkat ini
                        </label>
                    </div>

                    <button type="submit" class="w-full flex justify-center py-4 px-4 mt-10 border border-transparent rounded-2xl shadow-[0_8px_20px_-6px_rgba(183,217,177,0.6)] hover:shadow-[0_12px_25px_-6px_rgba(183,217,177,0.8)] text-sm font-extrabold text-white bg-primary-700 hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 transition-all transform hover:-translate-y-1">
                        Masuk Portal
                    </button>
                </form>

                <div class="mt-10 pt-6 border-t border-gray-200 text-center">
                    <p class="text-sm text-gray-600">
                        Belum memiliki akun? 
                        <a href="<?php echo e(route('register')); ?>" class="font-bold text-primary-700 hover:text-primary-800 transition-colors ml-1 hover:underline">Daftar di sini</a>
                    </p>
                </div>

            </div>
            
            <!-- Footer Note -->
            <div class="mt-8 text-center text-xs text-gray-500 relative z-20">
                &copy; <?php echo e(date('Y')); ?> Ruang Les by Ismaturrohmah. Dilindungi hak cipta.
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd7eb8639108f2f802be8be93b4351fe)): ?>
<?php $attributes = $__attributesOriginalcd7eb8639108f2f802be8be93b4351fe; ?>
<?php unset($__attributesOriginalcd7eb8639108f2f802be8be93b4351fe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd7eb8639108f2f802be8be93b4351fe)): ?>
<?php $component = $__componentOriginalcd7eb8639108f2f802be8be93b4351fe; ?>
<?php unset($__componentOriginalcd7eb8639108f2f802be8be93b4351fe); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\ruang-les\resources\views/autentikasi/masuk.blade.php ENDPATH**/ ?>