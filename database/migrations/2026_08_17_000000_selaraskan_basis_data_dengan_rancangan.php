<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menyelaraskan tabel dan atribut operasional dengan Class Diagram PI.
     * Tabel bawaan Laravel (cache, jobs, migrations, notifications, sessions)
     * sengaja tidak diterjemahkan karena dikelola langsung oleh framework.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        foreach ($this->tableRenames() as $oldName => $newName) {
            if (Schema::hasTable($oldName) && ! Schema::hasTable($newName)) {
                Schema::rename($oldName, $newName);
            }
        }

        foreach ($this->columnRenames() as $table => $columns) {
            $this->renameColumns($table, $columns);
        }

        $this->relinkProfileForeignKeys();

        if (Schema::hasTable('jadwal_kelas') && ! Schema::hasColumn('jadwal_kelas', 'max_murid')) {
            Schema::table('jadwal_kelas', function (Blueprint $table) {
                $table->unsignedInteger('max_murid')->default(1)->after('jumlah_murid');
            });

            DB::statement(
                'UPDATE jadwal_kelas AS j '
                .'LEFT JOIN program AS p ON p.program_id = j.program_id '
                .'SET j.max_murid = COALESCE(p.max_murid, 1)'
            );
        }

        $this->expandGenderValues();

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        $this->restoreCompactGenderValues();

        $this->restoreUserForeignKeys();

        if (Schema::hasTable('jadwal_kelas') && Schema::hasColumn('jadwal_kelas', 'max_murid')) {
            Schema::table('jadwal_kelas', function (Blueprint $table) {
                $table->dropColumn('max_murid');
            });
        }

        foreach (array_reverse($this->columnRenames(), true) as $table => $columns) {
            $this->renameColumns($table, array_flip($columns));
        }

        foreach (array_reverse($this->tableRenames(), true) as $oldName => $newName) {
            if (Schema::hasTable($newName) && ! Schema::hasTable($oldName)) {
                Schema::rename($newName, $oldName);
            }
        }

        Schema::enableForeignKeyConstraints();
    }

    private function tableRenames(): array
    {
        return [
            'mentor_profiles' => 'mentor',
            'parents' => 'orang_tua',
            'students' => 'murid',
            'packages' => 'program',
            'class_schedules' => 'jadwal_kelas',
            'class_student' => 'jadwal_murid',
            'pendaftarans' => 'pendaftaran',
            'pendaftaran_drafts' => 'draft_pendaftaran',
            'transactions' => 'transaksi',
            'attendances' => 'presensi',
            'progress_notes' => 'catatan_perkembangan',
            'student_scores' => 'nilai',
            'materials' => 'materi_belajar',
            'pengumumans' => 'pengumuman',
            'tickets' => 'layanan',
            'ticket_replies' => 'pesan_layanan',
            'features' => 'keunggulan',
            'testimonials' => 'testimoni',
            'faqs' => 'faq',
            'galleries' => 'galeri',
            'user_notification_reads' => 'status_baca_notifikasi',
        ];
    }

    private function columnRenames(): array
    {
        return [
            'users' => [
                'id' => 'user_id',
            ],
            'mentor' => [
                'id' => 'mentor_id',
                'phone_number' => 'no_telepon_mentor',
                'birth_place' => 'tempat_lahir_mentor',
                'birth_date' => 'tanggal_lahir_mentor',
                'gender' => 'jenis_kelamin_mentor',
                'address' => 'alamat_mentor',
                'education_background' => 'pendidikan_mentor',
                'teaching_specialty' => 'spesialisasi_mentor',
                'bank_name' => 'nama_bank',
                'bank_account_number' => 'nomor_akun_bank',
                'bank_account_name' => 'nama_akun_bank',
                'is_active' => 'status_mentor',
            ],
            'orang_tua' => [
                'id' => 'orangtua_id',
                'nomor_telepon' => 'no_telepon_orangtua',
            ],
            'murid' => [
                'id' => 'murid_id',
                'parent_id' => 'orangtua_id',
                'full_name' => 'nama_murid',
                'nickname' => 'panggilan_murid',
                'birth_place' => 'tempat_lahir_murid',
                'birth_date' => 'tanggal_lahir_murid',
                'gender' => 'jenis_kelamin_murid',
                'religion' => 'agama',
                'current_school' => 'sekolah',
                'grade_level' => 'kelas',
                'report_score' => 'nilai_rata_rata',
                'characteristics' => 'karakteristik_anak',
                'study_quota' => 'kuota_belajar',
                'status' => 'status_murid',
            ],
            'program' => [
                'id' => 'program_id',
                'type' => 'tipe_program',
                'package_name' => 'nama_program',
                'grade_level' => 'kelas_program',
                'max_students' => 'max_murid',
                'meeting_count' => 'pertemuan',
                'duration_minutes' => 'durasi_belajar',
                'price' => 'harga',
                'learning_location' => 'lokasi_belajar',
                'description' => 'deskripsi_program',
                'is_active' => 'status_program',
                'is_recommended' => 'direkomendasikan',
                'order' => 'urutan',
            ],
            'jadwal_kelas' => [
                'id' => 'jadwal_id',
                'class_name' => 'nama_kelas',
                'package_id' => 'program_id',
                'day_of_week' => 'hari',
                'session_time' => 'waktu_belajar',
                'quota_filled' => 'jumlah_murid',
                'status' => 'status_jadwal',
            ],
            'jadwal_murid' => [
                'id' => 'jadwal_murid_id',
                'class_schedule_id' => 'jadwal_id',
                'student_id' => 'murid_id',
            ],
            'pendaftaran' => [
                'id' => 'pendaftaran_id',
                'full_name' => 'nama_murid',
                'nickname' => 'panggilan_murid',
                'birth_place' => 'tempat_lahir_murid',
                'birth_date' => 'tanggal_lahir_murid',
                'gender' => 'jenis_kelamin_murid',
                'religion' => 'agama',
                'current_school' => 'sekolah',
                'grade_level' => 'kelas',
                'nama_ortu' => 'nama_orangtua',
                'nomor_telepon' => 'no_telepon_orangtua',
                'email_ortu' => 'email_orangtua',
                'package_id' => 'program_id',
                'schedule_1_id' => 'jadwal_1_id',
                'schedule_2_id' => 'jadwal_2_id',
                'status' => 'status_pendaftaran',
            ],
            'draft_pendaftaran' => [
                'id' => 'draft_id',
            ],
            'transaksi' => [
                'id' => 'transaksi_id',
                'invoice_number' => 'no_invoice',
                'parent_id' => 'orangtua_id',
                'student_id' => 'murid_id',
                'package_id' => 'program_id',
                'schedule_1_id' => 'jadwal_1_id',
                'schedule_2_id' => 'jadwal_2_id',
                'amount' => 'total_pembayaran',
                'payment_proof' => 'bukti_pembayaran',
                'status' => 'status_transaksi',
                'verified_by' => 'diverifikasi_oleh',
                'verified_at' => 'diverifikasi_pada',
            ],
            'presensi' => [
                'id' => 'presensi_id',
                'student_id' => 'murid_id',
                'schedule_id' => 'jadwal_id',
                'attendance_date' => 'tanggal_presensi',
                'status' => 'status_presensi',
                'notes' => 'notes_presensi',
                'created_by' => 'dibuat_oleh',
            ],
            'catatan_perkembangan' => [
                'id' => 'catatan_id',
                'student_id' => 'murid_id',
                'schedule_id' => 'jadwal_id',
                'date' => 'tanggal_catatan',
                'catatan_umum' => 'catatan_perkembangan',
            ],
            'nilai' => [
                'id' => 'nilai_id',
                'student_id' => 'murid_id',
                'schedule_id' => 'jadwal_id',
                'assessment_date' => 'tanggal_penilaian',
                'assessment_type' => 'tipe_nilai',
                'title' => 'materi_nilai',
                'score' => 'skor_nilai',
                'notes' => 'notes_nilai',
            ],
            'materi_belajar' => [
                'id' => 'materi_id',
                'title' => 'nama_materi',
                'grade_level' => 'kelas_materi',
                'mata_pelajaran' => 'nama_mapel',
                'description' => 'deskripsi_materi',
                'is_active' => 'status_materi',
                'uploaded_by' => 'diunggah_oleh',
                'click_count' => 'jumlah_klik',
            ],
            'pengumuman' => [
                'id' => 'pengumuman_id',
                'title' => 'judul_pengumuman',
                'content' => 'isi_pengumuman',
                'is_pinned' => 'diprioritaskan',
                'is_active' => 'status_pengumuman',
                'created_by' => 'dibuat_oleh',
            ],
            'layanan' => [
                'id' => 'layanan_id',
                'ticket_number' => 'no_ticket',
                'category' => 'kategori_layanan',
                'subject' => 'subject_layanan',
                'status' => 'status_layanan',
            ],
            'pesan_layanan' => [
                'id' => 'pesan_id',
                'ticket_id' => 'layanan_id',
                'message' => 'pesan',
                'is_read_by_admin' => 'dibaca_admin',
                'is_read_by_user' => 'dibaca_pengguna',
            ],
            'settings' => [
                'id' => 'settings_id',
            ],
            'keunggulan' => [
                'id' => 'keunggulan_id',
                'title' => 'nama_keunggulan',
                'description' => 'deskripsi_keunggulan',
                'order' => 'urutan',
                'is_active' => 'status_keunggulan',
            ],
            'testimoni' => [
                'id' => 'testimoni_id',
                'name' => 'nama_pemberi',
                'role' => 'peran_pemberi',
                'content' => 'testimoni',
                'order' => 'urutan',
                'is_active' => 'status_testimoni',
            ],
            'faq' => [
                'id' => 'faq_id',
                'question' => 'pertanyaan',
                'answer' => 'jawaban',
                'order' => 'urutan',
                'is_active' => 'status_faq',
            ],
            'galeri' => [
                'id' => 'galeri_id',
                'image_path' => 'gambar',
                'category' => 'kategori',
                'title' => 'nama_gambar',
                'order' => 'urutan',
                'is_active' => 'status_galeri',
            ],
            'status_baca_notifikasi' => [
                'id' => 'status_baca_id',
                'key' => 'kunci',
                'last_read_at' => 'terakhir_dibaca',
            ],
        ];
    }

    private function renameColumns(string $table, array $columns): void
    {
        if (! Schema::hasTable($table)) {
            return;
        }

        foreach ($columns as $oldName => $newName) {
            if (Schema::hasColumn($table, $oldName) && ! Schema::hasColumn($table, $newName)) {
                if ($this->renameEnumColumn($table, $oldName, $newName)) {
                    continue;
                }

                Schema::table($table, function (Blueprint $blueprint) use ($oldName, $newName) {
                    $blueprint->renameColumn($oldName, $newName);
                });
            }
        }
    }

    /**
     * MariaDB dapat mengembalikan nilai default ENUM beserta tanda kutipnya
     * ketika Laravel melakukan introspeksi. Gunakan SQL eksplisit untuk kolom
     * ENUM yang memiliki default agar migrasi tidak membentuk default ganda.
     */
    private function renameEnumColumn(string $table, string $oldName, string $newName): bool
    {
        $statements = [
            'murid.status.status_murid' => "ALTER TABLE `murid` CHANGE COLUMN `status` `status_murid` ENUM('pending','active','inactive') NOT NULL DEFAULT 'pending'",
            'murid.status_murid.status' => "ALTER TABLE `murid` CHANGE COLUMN `status_murid` `status` ENUM('pending','active','inactive') NOT NULL DEFAULT 'pending'",
            'program.type.tipe_program' => "ALTER TABLE `program` CHANGE COLUMN `type` `tipe_program` ENUM('Privat','Semi Privat','Reguler') NULL DEFAULT 'Privat'",
            'program.tipe_program.type' => "ALTER TABLE `program` CHANGE COLUMN `tipe_program` `type` ENUM('Privat','Semi Privat','Reguler') NULL DEFAULT 'Privat'",
            'jadwal_kelas.status.status_jadwal' => "ALTER TABLE `jadwal_kelas` CHANGE COLUMN `status` `status_jadwal` ENUM('active','full_booked','archived') NOT NULL DEFAULT 'active'",
            'jadwal_kelas.status_jadwal.status' => "ALTER TABLE `jadwal_kelas` CHANGE COLUMN `status_jadwal` `status` ENUM('active','full_booked','archived') NOT NULL DEFAULT 'active'",
            'pendaftaran.status.status_pendaftaran' => "ALTER TABLE `pendaftaran` CHANGE COLUMN `status` `status_pendaftaran` ENUM('pending','approved','rejected') NOT NULL DEFAULT 'pending'",
            'pendaftaran.status_pendaftaran.status' => "ALTER TABLE `pendaftaran` CHANGE COLUMN `status_pendaftaran` `status` ENUM('pending','approved','rejected') NOT NULL DEFAULT 'pending'",
            'layanan.status.status_layanan' => "ALTER TABLE `layanan` CHANGE COLUMN `status` `status_layanan` ENUM('Open','In Progress','Closed') NOT NULL DEFAULT 'Open'",
            'layanan.status_layanan.status' => "ALTER TABLE `layanan` CHANGE COLUMN `status_layanan` `status` ENUM('Open','In Progress','Closed') NOT NULL DEFAULT 'Open'",
            'transaksi.status.status_transaksi' => "ALTER TABLE `transaksi` CHANGE COLUMN `status` `status_transaksi` ENUM('pending','verified','rejected') NOT NULL DEFAULT 'pending'",
            'transaksi.status_transaksi.status' => "ALTER TABLE `transaksi` CHANGE COLUMN `status_transaksi` `status` ENUM('pending','verified','rejected') NOT NULL DEFAULT 'pending'",
        ];

        $key = $table.'.'.$oldName.'.'.$newName;

        if (! isset($statements[$key])) {
            return false;
        }

        DB::statement($statements[$key]);

        return true;
    }

    private function expandGenderValues(): void
    {
        if (Schema::hasTable('mentor') && Schema::hasColumn('mentor', 'jenis_kelamin_mentor')) {
            DB::statement("ALTER TABLE mentor MODIFY jenis_kelamin_mentor ENUM('L','P','Laki-laki','Perempuan') NULL");
            DB::statement("UPDATE mentor SET jenis_kelamin_mentor = 'Laki-laki' WHERE jenis_kelamin_mentor = 'L'");
            DB::statement("UPDATE mentor SET jenis_kelamin_mentor = 'Perempuan' WHERE jenis_kelamin_mentor = 'P'");
            DB::statement("ALTER TABLE mentor MODIFY jenis_kelamin_mentor ENUM('Laki-laki','Perempuan') NULL");
        }

        if (Schema::hasTable('murid') && Schema::hasColumn('murid', 'jenis_kelamin_murid')) {
            DB::statement("ALTER TABLE murid MODIFY jenis_kelamin_murid ENUM('L','P','Laki-laki','Perempuan') NOT NULL");
            DB::statement("UPDATE murid SET jenis_kelamin_murid = 'Laki-laki' WHERE jenis_kelamin_murid = 'L'");
            DB::statement("UPDATE murid SET jenis_kelamin_murid = 'Perempuan' WHERE jenis_kelamin_murid = 'P'");
            DB::statement("ALTER TABLE murid MODIFY jenis_kelamin_murid ENUM('Laki-laki','Perempuan') NOT NULL");
        }
    }

    /**
     * Pada versi lama kolom parent_id dan mentor_id masih menunjuk langsung
     * ke users. Class Diagram memisahkan akun dan profil, sehingga nilai lama
     * dikonversi ke primary key tabel orang_tua dan mentor terlebih dahulu.
     */
    private function relinkProfileForeignKeys(): void
    {
        DB::statement(
            "INSERT INTO orang_tua (user_id, created_at, updated_at) "
            ."SELECT u.user_id, NOW(), NOW() FROM users u "
            ."LEFT JOIN orang_tua o ON o.user_id = u.user_id "
            ."WHERE u.role = 'orang_tua' AND o.orangtua_id IS NULL"
        );
        DB::statement(
            "INSERT INTO mentor (user_id, status_mentor, created_at, updated_at) "
            ."SELECT u.user_id, 1, NOW(), NOW() FROM users u "
            ."LEFT JOIN mentor m ON m.user_id = u.user_id "
            ."WHERE u.role = 'mentor' AND m.mentor_id IS NULL"
        );

        DB::statement('ALTER TABLE murid DROP FOREIGN KEY students_parent_id_foreign');
        DB::statement(
            'UPDATE murid m JOIN orang_tua o ON o.user_id = m.orangtua_id '
            .'SET m.orangtua_id = o.orangtua_id'
        );
        DB::statement(
            'ALTER TABLE murid ADD CONSTRAINT murid_orangtua_id_foreign '
            .'FOREIGN KEY (orangtua_id) REFERENCES orang_tua (orangtua_id) ON DELETE CASCADE'
        );

        DB::statement('ALTER TABLE transaksi DROP FOREIGN KEY transactions_parent_id_foreign');
        DB::statement(
            'UPDATE transaksi t JOIN orang_tua o ON o.user_id = t.orangtua_id '
            .'SET t.orangtua_id = o.orangtua_id'
        );
        DB::statement(
            'ALTER TABLE transaksi ADD CONSTRAINT transaksi_orangtua_id_foreign '
            .'FOREIGN KEY (orangtua_id) REFERENCES orang_tua (orangtua_id) ON DELETE CASCADE'
        );

        DB::statement('ALTER TABLE jadwal_kelas DROP FOREIGN KEY class_schedules_mentor_id_foreign');
        DB::statement(
            'UPDATE jadwal_kelas j JOIN mentor m ON m.user_id = j.mentor_id '
            .'SET j.mentor_id = m.mentor_id'
        );
        DB::statement(
            'ALTER TABLE jadwal_kelas ADD CONSTRAINT jadwal_kelas_mentor_id_foreign '
            .'FOREIGN KEY (mentor_id) REFERENCES mentor (mentor_id) ON DELETE SET NULL'
        );

        DB::statement('ALTER TABLE catatan_perkembangan DROP FOREIGN KEY progress_notes_mentor_id_foreign');
        DB::statement(
            'UPDATE catatan_perkembangan c JOIN mentor m ON m.user_id = c.mentor_id '
            .'SET c.mentor_id = m.mentor_id'
        );
        DB::statement(
            'ALTER TABLE catatan_perkembangan ADD CONSTRAINT catatan_perkembangan_mentor_id_foreign '
            .'FOREIGN KEY (mentor_id) REFERENCES mentor (mentor_id) ON DELETE SET NULL'
        );
    }

    private function restoreUserForeignKeys(): void
    {
        DB::statement('ALTER TABLE murid DROP FOREIGN KEY murid_orangtua_id_foreign');
        DB::statement(
            'UPDATE murid m JOIN orang_tua o ON o.orangtua_id = m.orangtua_id '
            .'SET m.orangtua_id = o.user_id'
        );
        DB::statement(
            'ALTER TABLE murid ADD CONSTRAINT students_parent_id_foreign '
            .'FOREIGN KEY (orangtua_id) REFERENCES users (user_id) ON DELETE CASCADE'
        );

        DB::statement('ALTER TABLE transaksi DROP FOREIGN KEY transaksi_orangtua_id_foreign');
        DB::statement(
            'UPDATE transaksi t JOIN orang_tua o ON o.orangtua_id = t.orangtua_id '
            .'SET t.orangtua_id = o.user_id'
        );
        DB::statement(
            'ALTER TABLE transaksi ADD CONSTRAINT transactions_parent_id_foreign '
            .'FOREIGN KEY (orangtua_id) REFERENCES users (user_id) ON DELETE CASCADE'
        );

        DB::statement('ALTER TABLE jadwal_kelas DROP FOREIGN KEY jadwal_kelas_mentor_id_foreign');
        DB::statement(
            'UPDATE jadwal_kelas j JOIN mentor m ON m.mentor_id = j.mentor_id '
            .'SET j.mentor_id = m.user_id'
        );
        DB::statement(
            'ALTER TABLE jadwal_kelas ADD CONSTRAINT class_schedules_mentor_id_foreign '
            .'FOREIGN KEY (mentor_id) REFERENCES users (user_id) ON DELETE SET NULL'
        );

        DB::statement('ALTER TABLE catatan_perkembangan DROP FOREIGN KEY catatan_perkembangan_mentor_id_foreign');
        DB::statement(
            'UPDATE catatan_perkembangan c JOIN mentor m ON m.mentor_id = c.mentor_id '
            .'SET c.mentor_id = m.user_id'
        );
        DB::statement(
            'ALTER TABLE catatan_perkembangan ADD CONSTRAINT progress_notes_mentor_id_foreign '
            .'FOREIGN KEY (mentor_id) REFERENCES users (user_id) ON DELETE SET NULL'
        );
    }

    private function restoreCompactGenderValues(): void
    {
        if (Schema::hasTable('mentor') && Schema::hasColumn('mentor', 'jenis_kelamin_mentor')) {
            DB::statement("ALTER TABLE mentor MODIFY jenis_kelamin_mentor ENUM('L','P','Laki-laki','Perempuan') NULL");
            DB::statement("UPDATE mentor SET jenis_kelamin_mentor = 'L' WHERE jenis_kelamin_mentor = 'Laki-laki'");
            DB::statement("UPDATE mentor SET jenis_kelamin_mentor = 'P' WHERE jenis_kelamin_mentor = 'Perempuan'");
            DB::statement("ALTER TABLE mentor MODIFY jenis_kelamin_mentor ENUM('L','P') NULL");
        }

        if (Schema::hasTable('murid') && Schema::hasColumn('murid', 'jenis_kelamin_murid')) {
            DB::statement("ALTER TABLE murid MODIFY jenis_kelamin_murid ENUM('L','P','Laki-laki','Perempuan') NOT NULL");
            DB::statement("UPDATE murid SET jenis_kelamin_murid = 'L' WHERE jenis_kelamin_murid = 'Laki-laki'");
            DB::statement("UPDATE murid SET jenis_kelamin_murid = 'P' WHERE jenis_kelamin_murid = 'Perempuan'");
            DB::statement("ALTER TABLE murid MODIFY jenis_kelamin_murid ENUM('L','P') NOT NULL");
        }
    }
};
