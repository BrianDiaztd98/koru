<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('services') && ! Schema::hasColumn('services', 'discount_eligible')) {
            Schema::table('services', function (Blueprint $table) {
                $table->boolean('discount_eligible')->default(false)->after('active_status');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('services') && Schema::hasColumn('services', 'discount_eligible')) {
            Schema::table('services', function (Blueprint $table) {
                $table->dropColumn('discount_eligible');
            });
        }
    }
};
