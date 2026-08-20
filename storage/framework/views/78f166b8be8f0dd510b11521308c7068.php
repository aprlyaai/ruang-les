<?php $__env->startSection('title', isset($mentor) ? 'Edit Mentor' : 'Tambah Mentor'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="<?php echo e(route('admin.mentor.index')); ?>" class="hover:text-primary-600 transition-colors">Data Mentor</a>
    <?php if(isset($mentor) && request('from') == 'detail'): ?>
        <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        <a href="<?php echo e(route('admin.mentor.show', $mentor->id)); ?>" class="hover:text-primary-600 transition-colors">Profil Mentor</a>
    <?php endif; ?>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold"><?php echo $__env->yieldContent('title'); ?></span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="w-full space-y-6">

    <?php if (isset($component)) { $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.tajuk-halaman','data' => ['title' => ''.e(isset($mentor) ? 'Edit Data Mentor' : 'Tambah Mentor Baru').'','backUrl' => ''.e((isset($mentor) && request('from') == 'detail') ? route('admin.mentor.show', $mentor->id) : route('admin.mentor.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.tajuk-halaman'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(isset($mentor) ? 'Edit Data Mentor' : 'Tambah Mentor Baru').'','backUrl' => ''.e((isset($mentor) && request('from') == 'detail') ? route('admin.mentor.show', $mentor->id) : route('admin.mentor.index')).'']); ?>
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
    <form action="<?php echo e(isset($mentor) ? route('admin.mentor.update', $mentor->id) : route('admin.mentor.store')); ?>" method="POST" enctype="multipart/form-data"
          x-data="{
              from: '<?php echo e(request('from')); ?>',
              name: <?php echo \Illuminate\Support\Js::from((string) old('name', $mentor->name ?? ''))->toHtml() ?>,
              email: <?php echo \Illuminate\Support\Js::from((string) old('email', $mentor->email ?? ''))->toHtml() ?>,
              phoneNumber: <?php echo \Illuminate\Support\Js::from((string) old('no_telepon_mentor', $mentor->mentorProfile->no_telepon_mentor ?? ''))->toHtml() ?>,
              showPassword: false,
              showPasswordConfirm: false,
              password: '',
              birthPlace: <?php echo \Illuminate\Support\Js::from((string) old('tempat_lahir_mentor', $mentor->mentorProfile->tempat_lahir_mentor ?? ''))->toHtml() ?>,
              birthDate: <?php echo \Illuminate\Support\Js::from((string) old('tanggal_lahir_mentor', $mentor->mentorProfile->tanggal_lahir_mentor ?? ''))->toHtml() ?>,
              jenis_kelamin_mentor: <?php echo \Illuminate\Support\Js::from((string) old('jenis_kelamin_mentor', $mentor->mentorProfile->jenis_kelamin_mentor ?? ''))->toHtml() ?>,
              alamat_mentor: <?php echo \Illuminate\Support\Js::from((string) old('alamat_mentor', $mentor->mentorProfile->alamat_mentor ?? ''))->toHtml() ?>,
              education: <?php echo \Illuminate\Support\Js::from((string) old('pendidikan_mentor', $mentor->mentorProfile->pendidikan_mentor ?? ''))->toHtml() ?>,
              isActive: <?php echo \Illuminate\Support\Js::from((string) old('status_mentor', $mentor->mentorProfile->status_mentor ?? ''))->toHtml() ?>,
              imagePreview: <?php echo \Illuminate\Support\Js::from(isset($mentor) && $mentor->avatar ? asset('storage/' . $mentor->avatar) : '')->toHtml() ?>,
              touched: {},
              handleFileChange(event) {
                  const file = event.target.files[0];
                  if (!file) return;
                  if (!file.type.match('image.*')) {
                      alert('Harap unggah file gambar (JPG, PNG, dll).');
                      return;
                  }
                  const reader = new FileReader();
                  reader.onload = (e) => {
                      this.imagePreview = e.target.result;
                  };
                  reader.readAsDataURL(file);
              },
              resetForm() {
                  this.name = <?php echo \Illuminate\Support\Js::from((string) old('name', $mentor->name ?? ''))->toHtml() ?>;
                  this.email = <?php echo \Illuminate\Support\Js::from((string) old('email', $mentor->email ?? ''))->toHtml() ?>;
                  this.phoneNumber = <?php echo \Illuminate\Support\Js::from((string) old('no_telepon_mentor', $mentor->mentorProfile->no_telepon_mentor ?? ''))->toHtml() ?>;
                  this.password = '';
                  this.showPassword = false;
                  this.showPasswordConfirm = false;
                  this.birthPlace = <?php echo \Illuminate\Support\Js::from((string) old('tempat_lahir_mentor', $mentor->mentorProfile->tempat_lahir_mentor ?? ''))->toHtml() ?>;
                  this.birthDate = <?php echo \Illuminate\Support\Js::from((string) old('tanggal_lahir_mentor', $mentor->mentorProfile->tanggal_lahir_mentor ?? ''))->toHtml() ?>;
                  this.jenis_kelamin_mentor = <?php echo \Illuminate\Support\Js::from((string) old('jenis_kelamin_mentor', $mentor->mentorProfile->jenis_kelamin_mentor ?? ''))->toHtml() ?>;
                  this.alamat_mentor = <?php echo \Illuminate\Support\Js::from((string) old('alamat_mentor', $mentor->mentorProfile->alamat_mentor ?? ''))->toHtml() ?>;
                  this.education = <?php echo \Illuminate\Support\Js::from((string) old('pendidikan_mentor', $mentor->mentorProfile->pendidikan_mentor ?? ''))->toHtml() ?>;
                  this.isActive = <?php echo \Illuminate\Support\Js::from((string) old('status_mentor', $mentor->mentorProfile->status_mentor ?? ''))->toHtml() ?>;
                  this.imagePreview = <?php echo \Illuminate\Support\Js::from(isset($mentor) && $mentor->avatar ? asset('storage/' . $mentor->avatar) : '')->toHtml() ?>;
                  this.touched = {};

                  setTimeout(() => {
                      let ts = document.querySelector('input[name=spesialisasi_mentor]');
                      if (ts) ts.value = <?php echo \Illuminate\Support\Js::from((string) old('spesialisasi_mentor', $mentor->mentorProfile->spesialisasi_mentor ?? ''))->toHtml() ?>;

                      let bn = document.querySelector('input[name=nama_bank]');
                      if (bn) bn.value = <?php echo \Illuminate\Support\Js::from((string) old('nama_bank', $mentor->mentorProfile->nama_bank ?? ''))->toHtml() ?>;

                      let ban = document.querySelector('input[name=nomor_akun_bank]');
                      if (ban) ban.value = <?php echo \Illuminate\Support\Js::from((string) old('nomor_akun_bank', $mentor->mentorProfile->nomor_akun_bank ?? ''))->toHtml() ?>;

                      let bname = document.querySelector('input[name=nama_akun_bank]');
                      if (bname) bname.value = <?php echo \Illuminate\Support\Js::from((string) old('nama_akun_bank', $mentor->mentorProfile->nama_akun_bank ?? ''))->toHtml() ?>;

                      let fileInput = document.querySelector('input[type=file]');
                      if (fileInput) fileInput.value = '';
                  }, 10);
              },
              submitForm(e) {
                  this.touched.name = true;
                  this.touched.email = true;
                  this.touched.phoneNumber = true;
                  this.touched.password = true;
                  this.touched.birthPlace = true;
                  this.touched.birthDate = true;
                  this.touched.jenis_kelamin_mentor = true;
                  this.touched.alamat_mentor = true;
                  this.touched.education = true;
                  this.touched.isActive = true;

                  let isValid = true;
                  if (String(this.name).trim() === '') isValid = false;
                  if (String(this.email).trim() === '') isValid = false;
                  if (String(this.phoneNumber).trim() === '') isValid = false;
                  <?php if(!isset($mentor)): ?>
                  if (this.password === '') isValid = false;
                  <?php endif; ?>
                  if (String(this.birthPlace).trim() === '') isValid = false;
                  if (String(this.birthDate).trim() === '') isValid = false;
                  if (String(this.jenis_kelamin_mentor).trim() === '') isValid = false;
                  if (String(this.alamat_mentor).trim() === '') isValid = false;
                  if (String(this.education).trim() === '') isValid = false;
                  if (String(this.isActive).trim() === '') isValid = false;

            if (!isValid) {
                e.preventDefault();
            }
        }
    }" @submit="submitForm" novalidate>
        <?php echo csrf_field(); ?>
        <?php if(isset($mentor)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <input type="hidden" name="from" :value="from">

                <div class="space-y-6">
            <!-- 1. Akun & Kredensial (Top Card) -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
                <h3 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Informasi Akun</h3>

                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Kiri: Foto Profil -->
                    <div class="w-full lg:w-1/3 xl:w-1/4">
                        <label class="block text-sm text-gray-600 font-semibold mb-2 text-center lg:text-left">Foto Profil</label>
                        <div class="flex flex-col items-center justify-center space-y-4">
                            <div class="flex-shrink-0">
                                <!-- Existing / Preview Image -->
                                <template x-if="imagePreview">
                                    <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white shadow-md bg-white">
                                        <img :src="imagePreview" alt="Avatar" class="w-full h-full object-cover">
                                    </div>
                                </template>

                                <!-- Empty State -->
                                <template x-if="!imagePreview">
                                    <div class="w-32 h-32 rounded-full bg-gray-50 flex items-center justify-center border-4 border-white shadow-md">
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    </div>
                                </template>
                            </div>
                            <div class="w-full text-center lg:text-left">
                                <input type="file" name="avatar" accept="image/jpeg,image/png,image/webp" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100 transition-colors cursor-pointer border border-gray-200 rounded-xl bg-white" @change="handleFileChange">
                                <p class="mt-2 text-xs text-gray-500 leading-relaxed">
                                    <span class="font-bold text-primary-700">Rasio Foto 1:1</span><br>
                                    Format: JPEG, JPG, PNG, WEBP.<br>
                                    Maksimal berukuran 2MB.
                                </p>
                                <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'avatar']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'avatar']); ?>
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
                    </div>

                    <!-- Kanan: Data Akun -->
                    <div class="w-full lg:w-2/3 xl:w-3/4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="md:col-span-2">
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="name" x-model="name" placeholder="Masukkan nama lengkap mentor" @blur="touched.name = true" :class="touched.name && name.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                                <p x-show="touched.name && name.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Nama lengkap wajib diisi.
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
                                <input type="email" name="email" x-model="email" placeholder="Contoh: email@gmail.com" @blur="touched.email = true" :class="touched.email && email.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                                <p x-show="touched.email && email.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Email wajib diisi dengan valid.
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
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Nomor Telepon / WhatsApp Aktif <span class="text-red-500">*</span></label>
                                <input type="text" name="no_telepon_mentor" x-model="phoneNumber" placeholder="Contoh: 628123456789" @blur="touched.phoneNumber = true" :class="touched.phoneNumber && phoneNumber.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                                <p x-show="touched.phoneNumber && phoneNumber.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Nomor telepon wajib diisi.
                                </p>
                                <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'no_telepon_mentor']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'no_telepon_mentor']); ?>
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
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Password <?php echo isset($mentor) ? '<span class="text-xs font-normal text-gray-500 ml-1">(Kosongkan jika tidak diubah)</span>' : '<span class="text-red-500">*</span>'; ?></label>
                                <div class="relative">
                                    <input :type="showPassword ? 'text' : 'password'" name="password" x-model="password" placeholder="Masukkan password minimal 8 karakter" @blur="touched.password = true" :class="touched.password && password === '' && !<?php echo e(isset($mentor) ? 'true' : 'false'); ?> ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" <?php echo e(isset($mentor) ? '' : 'required'); ?>>
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
                                <?php if(!isset($mentor)): ?>
                                <p x-show="touched.password && password === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
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
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Konfirmasi Password <?php echo isset($mentor) ? '' : ''; ?></label>
                                <div class="relative">
                                    <input :type="showPasswordConfirm ? 'text' : 'password'" name="password_confirmation" placeholder="Ulangi password yang telah dibuat" class="block w-full rounded-2xl p-3 pr-10 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800" <?php echo e(isset($mentor) ? '' : 'required'); ?>>
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
                        </div>
                    </div>
                </div>
            </div>

                        <!-- Bagian Bawah -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- Kolom Kiri: Biodata -->
                <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6 h-fit">
                    <h3 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Biodata Diri</h3>
                    <div class="space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Tempat Lahir <span class="text-red-500">*</span></label>
                                <input type="text" name="tempat_lahir_mentor" x-model="birthPlace" placeholder="Contoh: Jakarta" @blur="touched.birthPlace = true" :class="touched.birthPlace && birthPlace.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                                <p x-show="touched.birthPlace && birthPlace.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Tempat lahir wajib diisi.
                                </p>
                                <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'tempat_lahir_mentor']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'tempat_lahir_mentor']); ?>
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
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Tanggal Lahir <span class="text-red-500">*</span></label>
                                <input type="date" name="tanggal_lahir_mentor" max="<?php echo e(date('Y-m-d')); ?>" x-model="birthDate" @blur="touched.birthDate = true" :class="touched.birthDate && birthDate.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                                <p x-show="touched.birthDate && birthDate.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Tanggal lahir wajib diisi.
                                </p>
                                <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'tanggal_lahir_mentor']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'tanggal_lahir_mentor']); ?>
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

                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Jenis Kelamin <span class="text-red-500">*</span></label>
                            <select name="jenis_kelamin_mentor" x-model="jenis_kelamin_mentor" @blur="touched.jenis_kelamin_mentor = true" :class="touched.jenis_kelamin_mentor && jenis_kelamin_mentor.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer" required>
                                <option value="" disabled <?php echo e(!isset($mentor) && !old('jenis_kelamin_mentor') ? 'selected' : ''); ?>>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" <?php echo e(old('jenis_kelamin_mentor', $mentor->mentorProfile->jenis_kelamin_mentor ?? '') == 'Laki-laki' ? 'selected' : ''); ?>>Laki-laki</option>
                                <option value="Perempuan" <?php echo e(old('jenis_kelamin_mentor', $mentor->mentorProfile->jenis_kelamin_mentor ?? '') == 'Perempuan' ? 'selected' : ''); ?>>Perempuan</option>
                            </select>
                            <p x-show="touched.jenis_kelamin_mentor && jenis_kelamin_mentor.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Jenis kelamin wajib diisi.
                            </p>
                            <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'jenis_kelamin_mentor']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'jenis_kelamin_mentor']); ?>
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
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Alamat Lengkap <span class="text-red-500">*</span></label>
                            <textarea name="alamat_mentor" rows="3" x-model="alamat_mentor" placeholder="Masukkan alamat lengkap rumah saat ini" @blur="touched.alamat_mentor = true" :class="touched.alamat_mentor && alamat_mentor.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required></textarea>
                            <p x-show="touched.alamat_mentor && alamat_mentor.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Alamat domisili wajib diisi.
                            </p>
                            <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'alamat_mentor']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'alamat_mentor']); ?>
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
                </div>

                <!-- Kolom Kanan: Profesi -->
                <div class="space-y-6 h-fit">
                    <!-- Card Profesi -->
                    <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
                        <h3 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Profesi & Spesialisasi</h3>
                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Latar Belakang Pendidikan <span class="text-red-500">*</span></label>
                                <input type="text" name="pendidikan_mentor" x-model="education" placeholder="Contoh: S2 Pendidikan Profesi Guru Harvard" @blur="touched.education = true" :class="touched.education && education.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                                <p x-show="touched.education && education.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Latar belakang pendidikan wajib diisi.
                                </p>
                                <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'pendidikan_mentor']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'pendidikan_mentor']); ?>
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
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Spesialisasi Mengajar</label>
                                <input type="text" name="spesialisasi_mentor" value="<?php echo e(old('spesialisasi_mentor', $mentor->mentorProfile->spesialisasi_mentor ?? '')); ?>" placeholder="Contoh: Mata pelajaran SD" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Status Keaktifan <span class="text-red-500">*</span></label>
                                <select name="status_mentor" x-model="isActive" @blur="touched.isActive = true" :class="touched.isActive && isActive === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer" required>
                                    <option value="" disabled <?php echo e(!isset($mentor) && !old('status_mentor') ? 'selected' : ''); ?>>Pilih Status Keaktifan</option>
                                    <option value="1" <?php echo e(old('status_mentor', $mentor->mentorProfile->status_mentor ?? '') == '1' ? 'selected' : ''); ?>>Aktif Mengajar</option>
                                    <option value="0" <?php echo e(old('status_mentor', $mentor->mentorProfile->status_mentor ?? '') == '0' ? 'selected' : ''); ?>>Nonaktif</option>
                                </select>
                                <p x-show="touched.isActive && isActive === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Status keaktifan wajib dipilih.
                                </p>
                                <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'status_mentor']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'status_mentor']); ?>
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
                    </div>
                </div>

            </div>

            <!-- Card Rekening Bank (Full Width) -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6 w-full">
                <h3 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Informasi Rekening Bank</h3>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Nama Bank</label>
                            <input type="text" name="nama_bank" value="<?php echo e(old('nama_bank', $mentor->mentorProfile->nama_bank ?? '')); ?>" placeholder="Contoh: BCA / Mandiri" class="block w-full rounded-xl p-3 border border-gray-200 bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Nomor Rekening</label>
                            <input type="text" name="nomor_akun_bank" value="<?php echo e(old('nomor_akun_bank', $mentor->mentorProfile->nomor_akun_bank ?? '')); ?>" placeholder="Contoh: 1234567890" class="block w-full rounded-xl p-3 border border-gray-200 bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 font-semibold mb-2">Nama Pemilik Rekening</label>
                        <input type="text" name="nama_akun_bank" value="<?php echo e(old('nama_akun_bank', $mentor->mentorProfile->nama_akun_bank ?? '')); ?>" placeholder="Contoh: Ruang Les by Ismaturrohmah" class="block w-full rounded-xl p-3 border border-gray-200 bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                        <p class="mt-2 text-xs text-gray-500">(Harus sesuai dengan nama di buku tabungan)</p>
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex flex-col-reverse md:flex-row gap-4 mt-8">
                <button type="button" @click="resetForm()" class="w-full md:w-1/3 flex items-center justify-center px-6 py-4 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-2xl hover:bg-red-50 hover:border-red-200 hover:text-red-600 shadow-sm transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Bersihkan Data
                </button>
                <button type="submit" class="w-full md:w-2/3 flex items-center justify-center px-8 py-4 text-base font-extrabold text-white transition-all duration-100 bg-primary-600 rounded-2xl hover:bg-primary-700 shadow-lg shadow-primary-500/30 transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                    <?php echo e(isset($mentor) ? 'Simpan Perubahan Data Mentor' : 'Simpan Data Mentor Baru'); ?>

                </button>
            </div>
        </div>
    </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ruang-les\resources\views/admin/mentor/formulir.blade.php ENDPATH**/ ?>