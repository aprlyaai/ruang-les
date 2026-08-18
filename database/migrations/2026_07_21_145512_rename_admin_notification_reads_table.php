<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Drop foreign key and unique constraint before renaming column
        Schema::table('admin_notification_reads', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
            $table->dropUnique(['admin_id', 'key']);
        });

        // Rename table
        Schema::rename('admin_notification_reads', 'user_notification_reads');

        // Rename column, add foreign key and unique constraint
        Schema::table('user_notification_reads', function (Blueprint $table) {
            $table->renameColumn('admin_id', 'user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['user_id', 'key']);
        });
    }

    public function down(): void
    {
        Schema::table('user_notification_reads', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropUnique(['user_id', 'key']);
            $table->renameColumn('user_id', 'admin_id');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::rename('user_notification_reads', 'admin_notification_reads');

        Schema::table('admin_notification_reads', function (Blueprint $table) {
            $table->unique(['admin_id', 'key']);
        });
    }
};
