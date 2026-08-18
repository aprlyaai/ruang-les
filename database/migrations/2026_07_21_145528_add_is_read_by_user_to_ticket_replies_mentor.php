<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ticket_replies', function (Blueprint $table) {
            $table->boolean('is_read_by_user')->default(false)->after('is_read_by_admin');
        });

        // Set existing replies as read so older tickets don't trigger badges
        DB::table('ticket_replies')->update(['is_read_by_user' => true]);
    }

    public function down(): void
    {
        Schema::table('ticket_replies', function (Blueprint $table) {
            $table->dropColumn('is_read_by_user');
        });
    }
};
