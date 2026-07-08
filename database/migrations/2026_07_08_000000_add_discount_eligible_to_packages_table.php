<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('packages') && ! Schema::hasColumn('packages', 'discount_eligible')) {
            Schema::table('packages', function (Blueprint $table) {
                $table->boolean('discount_eligible')->default(false)->after('active_status');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('packages') && Schema::hasColumn('packages', 'discount_eligible')) {
            Schema::table('packages', function (Blueprint $table) {
                $table->dropColumn('discount_eligible');
            });
        }
    }
};
