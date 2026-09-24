<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('services') && ! Schema::hasColumn('services', 'is_best_seller')) {
            Schema::table('services', function (Blueprint $table) {
                $table->boolean('is_best_seller')->default(false)->after('is_featured');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('services') && Schema::hasColumn('services', 'is_best_seller')) {
            Schema::table('services', function (Blueprint $table) {
                $table->dropColumn('is_best_seller');
            });
        }
    }
};
