<?php
$json = json_decode(file_get_contents('vendor/laravel-lang/lang/locales/id/php.json'), true);
if (!is_dir('lang/id')) {
    mkdir('lang/id', 0755, true);
}
// The keys in php.json are already the validation rules
$validation = $json;
$validation['attributes'] = [
    'name' => 'Nama',
    'email' => 'Alamat Email',
    'password' => 'Password',
    'phone_number' => 'Nomor Telepon',
    'birth_place' => 'Tempat Lahir',
    'birth_date' => 'Tanggal Lahir',
    'gender' => 'Jenis Kelamin',
    'address' => 'Alamat Lengkap',
    'education_background' => 'Latar Belakang Pendidikan',
    'teaching_specialty' => 'Spesialisasi Mengajar',
    'is_active' => 'Status Keaktifan',
    'full_name' => 'Nama Lengkap',
    'nickname' => 'Nama Panggilan',
    'current_school' => 'Asal Sekolah',
    'grade_level' => 'Tingkat Kelas',
    'nomor_telepon' => 'Nomor Telepon',
    'status_hubungan' => 'Status Hubungan',
    'alamat_domisili' => 'Alamat Domisili',
    'package_name' => 'Nama Paket',
    'learning_location' => 'Lokasi Belajar',
];

// Clean up some keys that might conflict
unset($validation['attributes.name']);

$export = var_export($validation, true);
// Fix the var_export to array() to []
$export = str_replace('array (', '[', $export);
$export = str_replace(')', ']', $export);

file_put_contents('lang/id/validation.php', "<?php\n\nreturn " . $export . ";\n");
echo 'Done';
