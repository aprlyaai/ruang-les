<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Pengguna;

use App\Models\JadwalKelas;
use App\Models\Program;
use Illuminate\Support\Facades\Hash;

class ClassScheduleSeeder extends Seeder
{
    public function run(): void
    {
        // =========================================================
        // MENTOR: cari berdasarkan email
        // =========================================================
        $mentorIsma   = Pengguna::where('email', 'ismaturrohmah02@gmail.com')->first();
        $mentorJuly   = Pengguna::where('email', 'missjuly@ruangles.com')->first();
        $mentorRizky  = Pengguna::where('email', 'muhrizkyramadhann7@gmail.com')->first();



        // =========================================================
        // PACKAGE IDs — dicari dinamis berdasarkan data aktual
        // =========================================================
        $pkgPrivat13RL   = Program::where('nama_program', 'Ruang Privat')->where('kelas_program', 'Kelas 1-3 SD')->where('lokasi_belajar', 'Ruang Les')->value('program_id');
        $pkgPrivat46RL   = Program::where('nama_program', 'Ruang Privat')->where('kelas_program', 'Kelas 4-6 SD')->where('lokasi_belajar', 'Ruang Les')->value('program_id');
        $pkgPrivat13RM   = Program::where('nama_program', 'Ruang Privat')->where('kelas_program', 'Kelas 1-3 SD')->where('lokasi_belajar', 'Rumah Murid')->value('program_id');
        $pkgPrivat46RM   = Program::where('nama_program', 'Ruang Privat')->where('kelas_program', 'Kelas 4-6 SD')->where('lokasi_belajar', 'Rumah Murid')->value('program_id');
        $pkgSemiPrivat13 = Program::where('nama_program', 'Ruang Semi Privat')->where('kelas_program', 'Kelas 1-3 SD')->value('program_id');
        $pkgSemiPrivat46 = Program::where('nama_program', 'Ruang Semi Privat')->where('kelas_program', 'Kelas 4-6 SD')->value('program_id');
        $pkgReguler      = Program::where('nama_program', 'Ruang Reguler')->value('program_id');

        // =========================================================
        // BERSIHKAN JADWAL
        // =========================================================
        Schema::disableForeignKeyConstraints();
        DB::table('jadwal_kelas')->truncate();
        Schema::enableForeignKeyConstraints();

        $now = now();

        // =========================================================
        // JADWAL
        // Format: [program_id, nama_kelas, day, waktu_belajar, mentor_id]
        // =========================================================
        $ismaId  = $mentorIsma?->mentor_id;
        $julyId  = $mentorJuly?->mentor_id;
        $rizkyId = $mentorRizky?->mentor_id;

        $schedules = [
            // ── SENIN ──────────────────────────────────────────────
            [$pkgReguler,      'R.5',            'Senin',   '15:00', $ismaId],
            [$pkgSemiPrivat46, 'SP.5',           'Senin',   '16:00', $ismaId],
            [$pkgReguler,      'R.6',            'Senin',   '19:00', $ismaId],

            // ── SELASA ─────────────────────────────────────────────
            [$pkgSemiPrivat46, 'SP.5',           'Selasa',  '15:00', $ismaId],
            [$pkgPrivat46RM,   'P.6',            'Selasa',  '17:00', $ismaId],
            [$pkgReguler,      'R.6A',           'Selasa',  '19:00', $julyId],
            [$pkgReguler,      'R.6B',           'Selasa',  '20:00', $julyId],

            // ── RABU ───────────────────────────────────────────────
            [$pkgSemiPrivat13, 'SP.2/4',         'Rabu',    '15:00', $ismaId],
            [$pkgSemiPrivat46, 'SP.5',           'Rabu',    '16:00', $ismaId],
            [$pkgReguler,      'R.6B',           'Rabu',    '19:00', $ismaId],
            [$pkgReguler,      'R.6A',           'Rabu',    '20:00', $ismaId],

            // ── KAMIS ──────────────────────────────────────────────
            [$pkgSemiPrivat13, 'SP.1',           'Kamis',   '15:00', $ismaId],
            [$pkgSemiPrivat13, 'SP.2/4',         'Kamis',   '16:00', $ismaId],
            [$pkgSemiPrivat46, 'SP.6',           'Kamis',   '17:00', $ismaId],
            [$pkgPrivat46RM,   'P.6',            'Kamis',   '17:00', $rizkyId],
            [$pkgSemiPrivat46, 'SP.4/6',         'Kamis',   '19:00', $julyId],
            [$pkgReguler,      'R.6',            'Kamis',   '20:00', $julyId],

            // ── JUMAT ──────────────────────────────────────────────
            [$pkgSemiPrivat13, 'SP.1',           'Jumat',   '15:00', $ismaId],
            [$pkgSemiPrivat46, 'SP.5',           'Jumat',   '16:00', $ismaId],
            [$pkgReguler,      'R.5',            'Jumat',   '17:00', $ismaId],
            [$pkgPrivat13RL,   'P.3',            'Jumat',   '19:00', $ismaId],

            // ── SABTU ──────────────────────────────────────────────
            [$pkgSemiPrivat46, 'SP.6',           'Sabtu',   '15:00', $julyId],
            [$pkgPrivat13RL,   'P.3',            'Sabtu',   '16:00', $julyId],
        ];

        $insertData = [];
        foreach ($schedules as $s) {
            $insertData[] = [
                'program_id'  => $s[0],
                'nama_kelas'  => $s[1],
                'hari' => $s[2],
                'waktu_belajar'=> $s[3],
                'mentor_id'   => $s[4],
                'jumlah_murid'=> 0,
                'max_murid'   => Program::find($s[0])?->max_murid ?? 1,
                'status_jadwal' => 'active',
                'created_at'  => $now,
                'updated_at'  => $now,
            ];
        }

        DB::table('jadwal_kelas')->insert($insertData);
    }
}
