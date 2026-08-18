<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengguna;
use App\Models\Mentor;
use App\Models\OrangTua;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // =============================================
        // ADMIN
        // =============================================
        Pengguna::updateOrCreate(
            ['email' => 'admin@ruangles.com'],
            [
                'name'     => 'Admin Ruang Les',
                'password' => Hash::make('admin12345'),
                'role'     => 'admin',
            ]
        );

        // =============================================
        // MENTOR
        // =============================================
        $mentors = [
            [
                'email' => 'ismaturrohmah02@gmail.com',
                'name'  => 'Ismaturrohmah',
                'pass'  => 'mentor12345',
            ],
            [
                'email' => 'missjuly@ruangles.com',
                'name'  => 'Julyesvicka Gita Darmahatari',
                'pass'  => 'mentor12345',
            ],
            [
                'email' => 'muhrizkyramadhann7@gmail.com',
                'name'  => 'Muhammad Rizky Ramadhan',
                'pass'  => 'mentor12345',
            ],
        ];

        foreach ($mentors as $m) {
            $mentor = Pengguna::updateOrCreate(
                ['email' => $m['email']],
                [
                    'name'     => $m['name'],
                    'password' => Hash::make($m['pass']),
                    'role'     => 'mentor',
                ]
            );

            Mentor::firstOrCreate(
                ['user_id' => $mentor->user_id],
                ['status_mentor' => true]
            );
        }

        // =============================================
        // ORANG TUA
        // =============================================
        $orangTuaUsers = [];

        foreach ($orangTuaUsers as $user) {
            $orangTua = Pengguna::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name'     => $user['name'],
                    'password' => Hash::make('orangtua12345'),
                    'role'     => 'orang_tua',
                ]
            );

            OrangTua::firstOrCreate(['user_id' => $orangTua->user_id]);
        }
    }
}
