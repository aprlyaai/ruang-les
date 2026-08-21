<?php $__env->startSection('title', isset($student) ? 'Edit Murid' : 'Tambah Murid Baru'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <a href="<?php echo e(route('admin.students.index')); ?>" class="hover:text-primary-600 transition-colors">Data Murid</a>
    <?php if(isset($student) && request('from') == 'detail'): ?>
        <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        <a href="<?php echo e(route('admin.students.show', $student->id)); ?>" class="hover:text-primary-600 transition-colors">Profil Murid</a>
    <?php endif; ?>
    <svg class="w-3 h-3 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    <span class="text-gray-800 font-bold"><?php echo $__env->yieldContent('title'); ?></span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="w-full space-y-6" x-data="{
    touched: {},
    parentId: <?php echo \Illuminate\Support\Js::from((string) old('orangtua_id', $student->orangtua_id ?? ''))->toHtml() ?>,
    fullName: <?php echo \Illuminate\Support\Js::from((string) old('nama_murid', $student->nama_murid ?? ''))->toHtml() ?>,
    panggilan_murid: <?php echo \Illuminate\Support\Js::from((string) old('panggilan_murid', $student->panggilan_murid ?? ''))->toHtml() ?>,
    agama: <?php echo \Illuminate\Support\Js::from((string) old('agama', $student->agama ?? ''))->toHtml() ?>,
    birthPlace: <?php echo \Illuminate\Support\Js::from((string) old('tempat_lahir_murid', $student->tempat_lahir_murid ?? ''))->toHtml() ?>,
    birthDate: <?php echo \Illuminate\Support\Js::from((string) old('tanggal_lahir_murid', $student->tanggal_lahir_murid ?? ''))->toHtml() ?>,
    jenis_kelamin_murid: <?php echo \Illuminate\Support\Js::from((string) old('jenis_kelamin_murid', $student->jenis_kelamin_murid ?? ''))->toHtml() ?>,
    currentSchool: <?php echo \Illuminate\Support\Js::from((string) old('sekolah', $student->sekolah ?? ''))->toHtml() ?>,
    gradeLevel: <?php echo \Illuminate\Support\Js::from((string) old('kelas', $student->kelas ?? ''))->toHtml() ?>,
    mapelDitingkatkan: <?php echo \Illuminate\Support\Js::from((string) old('mapel_ditingkatkan', $student->mapel_ditingkatkan ?? ''))->toHtml() ?>,
    karakteristik_anak: <?php echo \Illuminate\Support\Js::from((string) old('karakteristik_anak', $student->karakteristik_anak ?? ''))->toHtml() ?>,
    resetForm() {
        this.parentId = '<?php echo e(old('orangtua_id', $student->orangtua_id ?? '')); ?>';
        this.fullName = <?php echo \Illuminate\Support\Js::from((string) old('nama_murid', $student->nama_murid ?? ''))->toHtml() ?>;
        this.panggilan_murid = <?php echo \Illuminate\Support\Js::from((string) old('panggilan_murid', $student->panggilan_murid ?? ''))->toHtml() ?>;
        this.agama = <?php echo \Illuminate\Support\Js::from((string) old('agama', $student->agama ?? ''))->toHtml() ?>;
        this.birthPlace = <?php echo \Illuminate\Support\Js::from((string) old('tempat_lahir_murid', $student->tempat_lahir_murid ?? ''))->toHtml() ?>;
        this.birthDate = '<?php echo e(old('tanggal_lahir_murid', $student->tanggal_lahir_murid ?? '')); ?>';
        this.jenis_kelamin_murid = '<?php echo e(old('jenis_kelamin_murid', $student->jenis_kelamin_murid ?? '')); ?>';
        this.currentSchool = <?php echo \Illuminate\Support\Js::from((string) old('sekolah', $student->sekolah ?? ''))->toHtml() ?>;
        this.gradeLevel = <?php echo \Illuminate\Support\Js::from((string) old('kelas', $student->kelas ?? ''))->toHtml() ?>;
        this.mapelDitingkatkan = <?php echo \Illuminate\Support\Js::from((string) old('mapel_ditingkatkan', $student->mapel_ditingkatkan ?? ''))->toHtml() ?>;
        this.karakteristik_anak = <?php echo \Illuminate\Support\Js::from((string) old('karakteristik_anak', $student->karakteristik_anak ?? ''))->toHtml() ?>;
        this.touched = {};

        setTimeout(() => {
            let rr = document.querySelector('input[name=nilai_rata_rata]');
            if (rr) rr.value = <?php echo \Illuminate\Support\Js::from((string) old('nilai_rata_rata', $student->nilai_rata_rata ?? ''))->toHtml() ?>;

            let md = document.querySelector('input[name=mapel_ditingkatkan]');
            if (md) md.value = <?php echo \Illuminate\Support\Js::from((string) old('mapel_ditingkatkan', $student->mapel_ditingkatkan ?? ''))->toHtml() ?>;

            let ms = document.querySelector('input[name=mapel_sulit]');
            if (ms) ms.value = <?php echo \Illuminate\Support\Js::from((string) old('mapel_sulit', $student->mapel_sulit ?? ''))->toHtml() ?>;

            let ch = document.querySelector('textarea[name=karakteristik_anak]');
            if (ch) ch.value = <?php echo \Illuminate\Support\Js::from((string) old('karakteristik_anak', $student->karakteristik_anak ?? ''))->toHtml() ?>;

            let fileInput = document.querySelector('input[type=file]');
            if (fileInput) fileInput.value = '';
        }, 10);
    },
    submitForm(e) {
        this.touched.parentId = true;
        this.touched.fullName = true;
        this.touched.panggilan_murid = true;
        this.touched.agama = true;
        this.touched.birthPlace = true;
        this.touched.birthDate = true;
        this.touched.jenis_kelamin_murid = true;
        this.touched.currentSchool = true;
        this.touched.gradeLevel = true;
        this.touched.mapelDitingkatkan = true;
        this.touched.karakteristik_anak = true;

        let isValid = true;

        if (this.parentId === '') isValid = false;
        if (this.fullName.trim() === '') isValid = false;
        if (this.panggilan_murid.trim() === '') isValid = false;
        if (this.agama === '') isValid = false;
        if (this.birthPlace.trim() === '') isValid = false;
        if (this.birthDate === '') isValid = false;
        if (this.jenis_kelamin_murid === '') isValid = false;
        if (this.currentSchool.trim() === '') isValid = false;
        if (this.gradeLevel.trim() === '') isValid = false;
        if (this.mapelDitingkatkan.trim() === '') isValid = false;
        if (this.karakteristik_anak.trim() === '') isValid = false;

        if (!isValid) {
            e.preventDefault();
        }
    }
}">

    <?php if (isset($component)) { $__componentOriginalbab0e3efdab257546d29c6a1a8dc50ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbab0e3efdab257546d29c6a1a8dc50ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.tajuk-halaman','data' => ['title' => ''.e(isset($student) ? 'Edit Data Murid' : 'Tambah Murid Baru').'','backUrl' => ''.e((isset($student) && request('from') == 'detail') ? route('admin.students.show', $student->id) : route('admin.students.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.tajuk-halaman'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(isset($student) ? 'Edit Data Murid' : 'Tambah Murid Baru').'','backUrl' => ''.e((isset($student) && request('from') == 'detail') ? route('admin.students.show', $student->id) : route('admin.students.index')).'']); ?>
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
    <form @submit="submitForm" novalidate action="<?php echo e(isset($student) ? route('admin.students.update', $student->id) : route('admin.students.store')); ?>" method="POST" id="studentForm" class="space-y-6">
        <?php echo csrf_field(); ?>
        <?php if(isset($student)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <input type="hidden" name="from" value="<?php echo e(request('from')); ?>">

        <!-- Card 1: Wali Murid -->
        <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6">
            <h3 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Pilih Akun Orang Tua / Wali Murid</h3>

            <div>
                <label class="block text-sm text-gray-600 font-semibold mb-2">Orang Tua / Wali <span class="text-red-500">*</span></label>
                <select name="orangtua_id" x-model="parentId" @blur="touched.parentId = true" :class="touched.parentId && parentId === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer" required>
                    <option value="" disabled>Pilih Akun Orang Tua / Wali</option>
                    <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($parent->orangtua_id); ?>">
                            <?php echo e($parent->name); ?> (<?php echo e($parent->email); ?>)
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <p x-show="touched.parentId && parentId === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Wali murid wajib dipilih.
                </p>
                <p class="mt-3 text-sm text-gray-600 font-medium">Jika wali murid belum ada di daftar, silakan <a href="<?php echo e(route('admin.parents.create')); ?>" class="text-primary-600 font-extrabold hover:underline">Tambahkan Wali Murid Baru</a>.</p>
                <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'orangtua_id']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'orangtua_id']); ?>
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

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <!-- Kolom Kiri: Biodata -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6 h-fit">
                <h3 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Biodata Diri</h3>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm text-gray-600 font-semibold mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_murid" x-model="fullName" placeholder="Masukkan nama lengkap anak" @blur="touched.fullName = true" :class="touched.fullName && fullName.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                        <p x-show="touched.fullName && fullName.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Nama lengkap wajib diisi.
                        </p>
                        <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'nama_murid']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'nama_murid']); ?>
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

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Nama Panggilan <span class="text-red-500">*</span></label>
                            <input type="text" name="panggilan_murid" x-model="panggilan_murid" placeholder="Masukkan nama akrab anak" @blur="touched.panggilan_murid = true" :class="touched.panggilan_murid && panggilan_murid.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                            <p x-show="touched.panggilan_murid && panggilan_murid.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Nama panggilan wajib diisi.
                            </p>
                            <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'panggilan_murid']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'panggilan_murid']); ?>
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
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Agama <span class="text-red-500">*</span></label>
                            <select name="agama" x-model="agama" @blur="touched.agama = true" :class="touched.agama && agama === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer" required>
                                <option value="" disabled>Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                            <p x-show="touched.agama && agama === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Agama wajib dipilih.
                            </p>
                            <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'agama']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'agama']); ?>
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

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Tempat Lahir <span class="text-red-500">*</span></label>
                            <input type="text" name="tempat_lahir_murid" x-model="birthPlace" placeholder="Contoh: Jakarta" @blur="touched.birthPlace = true" :class="touched.birthPlace && birthPlace.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                            <p x-show="touched.birthPlace && birthPlace.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Tempat lahir wajib diisi.
                            </p>
                            <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'tempat_lahir_murid']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'tempat_lahir_murid']); ?>
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
                            <input type="date" name="tanggal_lahir_murid" max="<?php echo e(date('Y-m-d')); ?>" x-model="birthDate" @blur="touched.birthDate = true" :class="touched.birthDate && birthDate.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                            <p x-show="touched.birthDate && birthDate.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Tanggal lahir wajib diisi.
                            </p>
                            <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'tanggal_lahir_murid']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'tanggal_lahir_murid']); ?>
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
                        <select name="jenis_kelamin_murid" x-model="jenis_kelamin_murid" @blur="touched.jenis_kelamin_murid = true" :class="touched.jenis_kelamin_murid && jenis_kelamin_murid.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer" required>
                            <option value="" disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <p x-show="touched.jenis_kelamin_murid && jenis_kelamin_murid.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Jenis kelamin wajib dipilih.
                        </p>
                        <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'jenis_kelamin_murid']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'jenis_kelamin_murid']); ?>
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

                    <?php if(isset($student)): ?>
                    <div>
                        <label class="block text-sm text-gray-600 font-semibold mb-2">Status Keaktifan <span class="text-red-500">*</span></label>
                        <select name="status_murid" class="block w-full appearance-none rounded-2xl p-3 pr-10 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer" required>
                            <option value="active" <?php echo e(old('status_murid', $student->status_murid) == 'active' ? 'selected' : ''); ?>>Aktif Mengikuti Les</option>
                            <option value="inactive" <?php echo e(old('status_murid', $student->status_murid) == 'inactive' ? 'selected' : ''); ?>>Tidak Aktif / Lulus</option>
                        </select>
                        <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'status_murid']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'status_murid']); ?>
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
                    <?php endif; ?>
                </div>
            </div>

            <!-- Kolom Kanan: Akademik -->
            <div class="bg-white rounded-2xl shadow-sm border border-primary-100/50 p-5 md:p-6 h-fit">
                <h3 class="text-lg font-bold text-primary-800 mb-5 border-b border-gray-200 pb-3">Catatan Akademik</h3>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm text-gray-600 font-semibold mb-2">Asal Sekolah <span class="text-red-500">*</span></label>
                        <input type="text" name="sekolah" x-model="currentSchool" placeholder="Contoh: Sekolah Dasar Negeri" @blur="touched.currentSchool = true" :class="touched.currentSchool && currentSchool.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                        <p x-show="touched.currentSchool && currentSchool.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Asal sekolah wajib diisi.
                        </p>
                        <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'sekolah']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'sekolah']); ?>
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

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Kelas <span class="text-red-500">*</span></label>
                            <select name="kelas" x-model="gradeLevel" @blur="touched.gradeLevel = true" :class="touched.gradeLevel && gradeLevel === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full appearance-none rounded-2xl p-3 pr-10 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%234b5563%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-[position:right_1rem_center] bg-no-repeat cursor-pointer" required>
                                <option value="" disabled>Pilih Kelas</option>
                                <?php for($i = 1; $i <= 6; $i++): ?>
                                    <option value="<?php echo e($i); ?>" <?php echo e(old('kelas', $student->kelas ?? '') == $i ? 'selected' : ''); ?>>Kelas <?php echo e($i); ?></option>
                                <?php endfor; ?>
                            </select>
                            <p x-show="touched.gradeLevel && gradeLevel === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Kelas wajib dipilih.
                            </p>
                            <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'kelas']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'kelas']); ?>
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
                            <label class="block text-sm text-gray-600 font-semibold mb-2">Nilai Rata-rata Rapor</label>
                            <input type="number" step="0.01" min="1" max="100" name="nilai_rata_rata" value="<?php echo e(old('nilai_rata_rata', $student->nilai_rata_rata ?? '')); ?>" placeholder="1 - 100" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                            <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'nilai_rata_rata']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'nilai_rata_rata']); ?>
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

                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Mata Pelajaran yang Ingin Ditingkatkan <span class="text-red-500">*</span></label>
                                <input type="text" name="mapel_ditingkatkan" x-model="mapelDitingkatkan" placeholder="Contoh: Matematika (MTK), Bahasa Indonesia, Bahasa Inggris, IPAS, Pendidikan Pancasila, Tematik, dan PLBJ" @blur="touched.mapelDitingkatkan = true" :class="touched.mapelDitingkatkan && mapelDitingkatkan.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required>
                                <p x-show="touched.mapelDitingkatkan && mapelDitingkatkan.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Mata pelajaran wajib diisi.
                                </p>
                                <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'mapel_ditingkatkan']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'mapel_ditingkatkan']); ?>
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
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Mata Pelajaran yang Dirasa Sulit</label>
                                <input type="text" name="mapel_sulit" value="<?php echo e(old('mapel_sulit', $student->mapel_sulit ?? '')); ?>" placeholder="Contoh: Matematika (MTK), Bahasa Indonesia, Bahasa Inggris, IPAS, Pendidikan Pancasila, Tematik, dan PLBJ" class="block w-full rounded-2xl p-3 border border-gray-200 bg-gray-50 shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 focus:border-primary-400 transition-colors duration-100 text-sm font-medium text-gray-800">
                                <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'mapel_sulit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'mapel_sulit']); ?>
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
                                <label class="block text-sm text-gray-600 font-semibold mb-2">Karakteristik & Kemampuan Anak <span class="text-red-500">*</span></label>
                                <textarea name="karakteristik_anak" x-model="karakteristik_anak" rows="3" placeholder="Ceritakan sedikit mengenai anak Anda" @blur="touched.karakteristik_anak = true" :class="touched.karakteristik_anak && karakteristik_anak.trim() === '' ? 'border-red-500 focus:ring-red-500 bg-red-50/30' : 'border-gray-200 focus:border-primary-400 bg-gray-50'" class="block w-full rounded-2xl p-3 border shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-200 transition-colors duration-100 text-sm font-medium text-gray-800" required></textarea>
                                <p x-show="touched.karakteristik_anak && karakteristik_anak.trim() === ''" x-transition class="text-red-500 text-xs mt-2 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Karakteristik anak wajib diisi.
                                </p>
                                <?php if (isset($component)) { $__componentOriginale4392c51ccef42726141b9bd03684153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale4392c51ccef42726141b9bd03684153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.antarmuka.galat-sebaris','data' => ['name' => 'karakteristik_anak']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('antarmuka.galat-sebaris'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'karakteristik_anak']); ?>
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

        <!-- Tombol Aksi -->
        <div class="flex flex-col-reverse md:flex-row gap-4 mt-8">
            <button type="button" @click="resetForm()" class="w-full md:w-1/3 flex items-center justify-center px-6 py-4 text-sm font-bold text-gray-700 transition-all duration-100 bg-white border border-gray-300 rounded-2xl hover:bg-red-50 hover:border-red-200 hover:text-red-600 shadow-sm transform hover:-translate-y-1">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                Bersihkan Data
            </button>
            <button type="submit" class="w-full md:w-2/3 flex items-center justify-center px-8 py-4 text-base font-extrabold text-white transition-all duration-100 bg-primary-600 rounded-2xl hover:bg-primary-700 shadow-lg shadow-primary-500/30 transform hover:-translate-y-1">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                <?php echo e(isset($student) ? 'Simpan Perubahan Data Murid' : 'Simpan Data Murid Baru'); ?>

            </button>
        </div>
    </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ruang-les\resources\views/admin/murid/formulir.blade.php ENDPATH**/ ?>