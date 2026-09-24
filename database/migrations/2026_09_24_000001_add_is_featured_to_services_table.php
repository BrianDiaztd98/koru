<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('services') && ! Schema::hasColumn('services', 'is_featured')) {
            Schema::table('services', function (Blueprint $table) {
                $table->boolean('is_featured')->default(false)->after('discount_eligible');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('services') && Schema::hasColumn('services', 'is_featured')) {
            Schema::table('services', function (Blueprint $table) {
                $table->dropColumn('is_featured');
            });
        }
    }
};
