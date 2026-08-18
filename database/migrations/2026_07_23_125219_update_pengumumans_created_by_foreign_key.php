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
        Schema::table('pengumumans', function (Blueprint $table) {
            $table->dropForeign('pengumumans_created_by_foreign');
            
            // Jadikan nullable agar bisa menampung nilai null
            $table->unsignedBigInteger('created_by')->nullable()->change();

            $table->foreign('created_by')
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
        Schema::table('pengumumans', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            
            $table->unsignedBigInteger('created_by')->nullable(false)->change();

            $table->foreign('created_by', 'pengumumans_created_by_foreign')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }
};
