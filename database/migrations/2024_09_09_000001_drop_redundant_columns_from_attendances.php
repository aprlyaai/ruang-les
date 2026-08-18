<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropColumn(['material_taught', 'focus_status', 'obstacles_note', 'score']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->string('material_taught')->nullable();
            $table->string('focus_status')->nullable();
            $table->text('obstacles_note')->nullable();
            $table->decimal('score', 5, 2)->nullable();
        });
    }
};
?>
