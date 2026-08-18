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
        // 1. Drop tabel mentors jika ada
        Schema::dropIfExists('mentors');

        // 2. Drop kolom icon_svg dari tabel features jika ada
        if (Schema::hasColumn('features', 'icon_svg')) {
            Schema::table('features', function (Blueprint $table) {
                $table->dropColumn('icon_svg');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rollback tabel mentors
        Schema::create('mentors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('teaching_status', ['active', 'leave', 'inactive'])->default('active');
            $table->text('bio')->nullable();
            $table->timestamps();
        });

        // Rollback kolom icon_svg di tabel features
        Schema::table('features', function (Blueprint $table) {
            $table->text('icon_svg')->nullable()->after('description');
        });
    }
};
