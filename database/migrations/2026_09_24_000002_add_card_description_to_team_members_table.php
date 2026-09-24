<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('team_members') && ! Schema::hasColumn('team_members', 'card_description_en')) {
            Schema::table('team_members', function (Blueprint $table) {
                $table->text('card_description_en')->nullable()->after('specialty_en');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('team_members') && Schema::hasColumn('team_members', 'card_description_en')) {
            Schema::table('team_members', function (Blueprint $table) {
                $table->dropColumn('card_description_en');
            });
        }
    }
};
