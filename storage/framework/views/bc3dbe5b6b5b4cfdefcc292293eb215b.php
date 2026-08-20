<?php $__env->startSection('title', isset($user) ? 'Edit Pengguna' : 'Tambah Pengguna'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="<?php echo e(route('admin.users.index')); ?>" class="hover:text-primary-600 transition-colors">Pengguna</a>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold"><?php echo $__env->yieldContent('title'); ?></span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="w-full space-y-6">

    <?php if (isset($component)) { $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.tajuk-halaman','data' => ['title' => ''.e(isset($user) ? 'Edit Data Pengguna' : 'Tambah Pengguna Baru').'','backUrl' => ''.e(route('admin.users.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.tajuk-halaman'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(isset($user) ? 'Edit Data Pengguna' : 'Tambah Pengguna Baru').'','backUrl' => ''.e(route('admin.users.index')).'']); ?>
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

    <!-- Form -->
    <form action="<?php echo e(isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store')); ?>" method="POST" enctype="multipart/form-data"
          x-data="{
              isEditMode: <?php echo \Illuminate\Support\Js::from(isset($user))->toHtml() ?>,
              originalData: {
                  name: <?php echo \Illuminate\Support\Js::from((string) old('name', $user->name ?? ''))->toHtml() ?>,
                  email: <?php echo \Illuminate\Support\Js::from((string) old('email', $user->email ?? ''))->toHtml() ?>,
                  role: <?php echo \Illuminate\Support\Js::from((string) old('role', $user->role ?? ''))->toHtml() ?>
              },
              name: <?php echo \Illuminate\Support\Js::from((string) old('name', $user->name ?? ''))->toHtml() ?>,
              email: <?php echo \Illuminate\Support\Js::from((string) old('email', $user->email ?? ''))->toHtml() ?>,
              role: <?php echo \Illuminate\Support\Js::from((string) old('role', $user->role ?? ''))->toHtml() ?>,
              showPassword: false,
              showPasswordConfirm: false,
              password: '',
              passwordConfirm: '',
              touched: {
                  name: false,
                  email: false,
                  role: false,
                  password: false
              },
              resetForm() {
                  if (this.isEditMode) {
                      this.name = this.originalData.name;
                      this.email = this.originalData.email;
                      this.role = this.originalData.role;
                  } else {
                      this.name = '';
                      this.email = '';
                      this.role = '';
                  }
                  this.password = '';
                  this.passwordConfirm = '';
                  this.showPassword = false;
                  this.showPasswordConfirm = false;
                  this.touched = {
                      name: false,
                      email: false,
                      role: false,
                      password: false
                  };
              },
              submitForm(e) {
                  this.touched.name = true;
                  this.touched.email = true;
                  this.touched.role = true;
                  if (!this.isEditMode) {
                      this.touched.password = true;
                  }

                  let isValid = true;
                  if (String(this.name).trim() === '') isValid = false;
                  if (String(this.email).trim() === '') isValid = false;
                  if (String(this.role).trim() === '') isValid = false;
                  <?php if(!isset($user)): ?>
                  if (this.password === '') isValid = false;
                  <?php endif; ?>

                  if (!isValid) {
                      e.preventDefault();
                  }
              }
          }" @submit="submitForm" novalidate>
        <?php echo csrf_field(); ?>
        <?php if(isset($user)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-6 md:p-8">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm text-gray-600 font-semibold mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="name" x-model="name" @blur="touched.name = true"
                        :class="touched.name && String(name).trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'"
                        class="block w-full rounded-xl p-3 border focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800"
                        placeholder="Masukkan nama lengkap pengguna" required>
                    <p x-show="touched.name && String(name).trim() === ''" x-transition style="display: none;" class="text-red-500 text-xs mt-2 font-medium flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Nama Lengkap wajib diisi.
                    </p>
                    <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'name']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'name']); ?>
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

                <div>
                    <label class="block text-sm text-gray-600 font-semibold mb-2">Alamat Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" x-model="email" @blur="touched.email = true"
                        :class="touched.email && String(email).trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'"
                        class="block w-full rounded-xl p-3 border focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800"
                        placeholder="Contoh: email@gmail.com" required>
                    <p x-show="touched.email && String(email).trim() === ''" x-transition style="display: none;" class="text-red-500 text-xs mt-2 font-medium flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Email wajib diisi.
                    </p>
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

                <div>
                    <label class="block text-sm text-gray-600 font-semibold mb-2">Password <?php if(!isset($user)): ?><span class="text-red-500">*</span><?php else: ?><span class="text-gray-400 font-normal">(Kosongkan jika tidak diubah)</span><?php endif; ?></label>
                    <div class="relative">
                        <input name="password" x-model="password" :type="showPassword ? 'text' : 'password'" @blur="touched.password = true"
                            :class="touched.password && password === '' && !isEditMode ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'"
                            class="block w-full rounded-xl p-3 pr-12 border focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800"
                            placeholder="Masukkan password minimal 8 karakter">
                        <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-primary-600 focus:text-primary-600 focus:outline-none transition-colors">
                            <svg x-show="showPassword" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="!showPassword" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
                    <?php if(!isset($user)): ?>
                    <p x-show="touched.password && password === ''" x-transition style="display: none;" class="text-red-500 text-xs mt-2 font-medium flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Password wajib diisi.
                    </p>
                    <?php endif; ?>
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

                <div>
                    <label class="block text-sm text-gray-600 font-semibold mb-2">Konfirmasi Password <?php if(!isset($user)): ?> <?php endif; ?></label>
                    <div class="relative">
                        <input name="password_confirmation" x-model="passwordConfirm" :type="showPasswordConfirm ? 'text' : 'password'"
                            class="block w-full rounded-xl p-3 pr-12 border border-gray-200 focus:border-primary-400 bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800"
                            placeholder="Ulangi password yang telah dibuat">
                        <button type="button" @click="showPasswordConfirm = !showPasswordConfirm" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-primary-600 focus:text-primary-600 focus:outline-none transition-colors">
                            <svg x-show="showPasswordConfirm" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="!showPasswordConfirm" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm text-gray-600 font-semibold mb-2">Peran (Role) <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <select name="role" x-model="role" @blur="touched.role = true"
                            :class="touched.role && String(role).trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'"
                            class="block w-full rounded-xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 appearance-none bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer">
                            <option value="" disabled>Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="mentor">Mentor</option>
                            <option value="orang_tua">Orang Tua</option>
                        </select>
                    </div>
                    <p x-show="touched.role && String(role).trim() === ''" x-transition style="display: none;" class="text-red-500 text-xs mt-2 font-medium flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Role wajib dipilih.
                    </p>
                    <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'role']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'role']); ?>
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

            <!-- Tombol Aksi -->
            <div class="flex flex-col-reverse md:flex-row gap-4 mt-8">
                <button type="button" @click="resetForm()" class="w-full md:w-1/3 flex items-center justify-center px-6 py-4 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-2xl hover:bg-red-50 hover:border-red-200 hover:text-red-600 shadow-sm transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Bersihkan Data
                </button>
                <button type="submit" class="w-full md:w-2/3 flex items-center justify-center px-6 md:px-8 py-4 text-base font-extrabold text-white transition-all duration-100 bg-primary-600 rounded-2xl hover:bg-primary-700 shadow-lg shadow-primary-500/30 transform hover:-translate-y-1 text-center">
                    <svg class="w-5 h-5 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                    <span><?php echo e(isset($user) ? 'Simpan Perubahan Data Pengguna' : 'Simpan Data Pengguna Baru'); ?></span>
                </button>
            </div>
        </div>
    </form>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ruang-les\resources\views/admin/pengguna/formulir.blade.php ENDPATH**/ ?>