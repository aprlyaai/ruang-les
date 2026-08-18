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
        Schema::table('class_schedules', function (Blueprint $table) {
            $table->dropForeign('class_schedules_mentor_id_foreign');
            
            // Jadikan kolom mentor_id nullable agar bisa menerima nilai NULL saat mentor dihapus
            $table->unsignedBigInteger('mentor_id')->nullable()->change();

            $table->foreign('mentor_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('class_schedules', function (Blueprint $table) {
            $table->dropForeign(['mentor_id']); // Drops the newly created FK

            $table->foreign('mentor_id', 'class_schedules_mentor_id_foreign')
                  ->references('id')
                  ->on('mentors')
                  ->onDelete('cascade');
        });
    }
};
