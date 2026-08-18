<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;
use Illuminate\Support\Facades\Schema;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Program::truncate();
        Schema::enableForeignKeyConstraints();

        $packages = [
            // ── Privat Kelas 1-3 SD ────────────────────────────────────
            [
                'tipe_program'              => 'Privat',
                'nama_program'      => 'Ruang Privat',
                'kelas_program'       => 'Kelas 1-3 SD',
                'max_murid'      => 1,
                'pertemuan'     => 8,
                'durasi_belajar'  => 60,
                'harga'             => 440000,
                'lokasi_belajar' => 'Ruang Les',
                'deskripsi_program'       => 'Belajar lebih fokus dengan privasi maksimal dan fleksibilitas penuh.',
                'status_program'         => true,
                'direkomendasikan'    => false,
                'urutan'             => 1,
            ],
            [
                'tipe_program'              => 'Privat',
                'nama_program'      => 'Ruang Privat',
                'kelas_program'       => 'Kelas 1-3 SD',
                'max_murid'      => 1,
                'pertemuan'     => 8,
                'durasi_belajar'  => 60,
                'harga'             => 600000,
                'lokasi_belajar' => 'Rumah Murid',
                'deskripsi_program'       => 'Belajar lebih fokus dengan privasi maksimal dan fleksibilitas penuh.',
                'status_program'         => true,
                'direkomendasikan'    => false,
                'urutan'             => 2,
            ],
            // ── Privat Kelas 4-6 SD ────────────────────────────────────
            [
                'tipe_program'              => 'Privat',
                'nama_program'      => 'Ruang Privat',
                'kelas_program'       => 'Kelas 4-6 SD',
                'max_murid'      => 1,
                'pertemuan'     => 8,
                'durasi_belajar'  => 60,
                'harga'             => 640000,
                'lokasi_belajar' => 'Ruang Les',
                'deskripsi_program'       => 'Belajar lebih fokus dengan privasi maksimal dan fleksibilitas penuh.',
                'status_program'         => true,
                'direkomendasikan'    => true,
                'urutan'             => 3,
            ],
            [
                'tipe_program'              => 'Privat',
                'nama_program'      => 'Ruang Privat',
                'kelas_program'       => 'Kelas 4-6 SD',
                'max_murid'      => 1,
                'pertemuan'     => 8,
                'durasi_belajar'  => 60,
                'harga'             => 800000,
                'lokasi_belajar' => 'Rumah Murid',
                'deskripsi_program'       => 'Belajar lebih fokus dengan privasi maksimal dan fleksibilitas penuh.',
                'status_program'         => true,
                'direkomendasikan'    => true,
                'urutan'             => 4,
            ],
            // ── Semi Privat ────────────────────────────────────────────
            [
                'tipe_program'              => 'Semi Privat',
                'nama_program'      => 'Ruang Semi Privat',
                'kelas_program'       => 'Kelas 1-3 SD',
                'max_murid'      => 2,
                'pertemuan'     => 8,
                'durasi_belajar'  => 60,
                'harga'             => 200000,
                'lokasi_belajar' => 'Ruang Les',
                'deskripsi_program'       => 'Bimbingan intensif dalam kelompok kecil untuk interaksi yang lebih hangat.',
                'status_program'         => true,
                'direkomendasikan'    => false,
                'urutan'             => 8,
            ],
            [
                'tipe_program'              => 'Semi Privat',
                'nama_program'      => 'Ruang Semi Privat',
                'kelas_program'       => 'Kelas 4-6 SD',
                'max_murid'      => 2,
                'pertemuan'     => 8,
                'durasi_belajar'  => 60,
                'harga'             => 240000,
                'lokasi_belajar' => 'Ruang Les',
                'deskripsi_program'       => 'Bimbingan intensif dalam kelompok kecil untuk interaksi yang lebih hangat.',
                'status_program'         => true,
                'direkomendasikan'    => false,
                'urutan'             => 9,
            ],
            // ── Reguler ────────────────────────────────────────────────
            [
                'tipe_program'              => 'Reguler',
                'nama_program'      => 'Ruang Reguler',
                'kelas_program'       => 'Kelas 1-6 SD',
                'max_murid'      => 8,
                'pertemuan'     => 8,
                'durasi_belajar'  => 60,
                'harga'             => 120000,
                'lokasi_belajar' => 'Ruang Les',
                'deskripsi_program'       => 'Suasana kelas yang interaktif dan kolaboratif untuk memacu semangat kompetisi positif.',
                'status_program'         => true,
                'direkomendasikan'    => false,
                'urutan'             => 10,
            ],
        ];

        foreach ($packages as $package) {
            Program::create($package);
        }
    }
}

