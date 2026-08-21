<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasColumn('catatan_perkembangan', 'mentor_id')) {
            try {
                Schema::table('catatan_perkembangan', function (Blueprint $table) {
                    $table->dropForeign('catatan_perkembangan_mentor_id_foreign');
                });
            } catch (\Exception $e) {
                try {
                    Schema::table('catatan_perkembangan', function (Blueprint $table) {
                        $table->dropForeign('progress_notes_mentor_id_foreign');
                    });
                } catch (\Exception $e2) {
                    // Ignore
                }
            }

            Schema::table('catatan_perkembangan', function (Blueprint $table) {
                $table->dropColumn('mentor_id');
            });
        }

        if (Schema::hasColumn('presensi', 'dibuat_oleh')) {
            try {
                Schema::table('presensi', function (Blueprint $table) {
                    $table->dropForeign('attendances_created_by_foreign');
                });
            } catch (\Exception $e) {
                try {
                    Schema::table('presensi', function (Blueprint $table) {
                        $table->dropForeign('presensi_dibuat_oleh_foreign');
                    });
                } catch (\Exception $e2) {
                    // Ignore
                }
            }

            Schema::table('presensi', function (Blueprint $table) {
                $table->dropColumn('dibuat_oleh');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('catatan_perkembangan', function (Blueprint $table) {
            $table->foreignId('mentor_id')
                ->nullable()
                ->after('jadwal_id')
                ->constrained('mentor', 'mentor_id')
                ->nullOnDelete();
        });

        Schema::table('presensi', function (Blueprint $table) {
            $table->foreignId('dibuat_oleh')
                ->nullable()
                ->after('notes_presensi')
                ->constrained('users', 'user_id')
                ->nullOnDelete();
        });
    }
};
