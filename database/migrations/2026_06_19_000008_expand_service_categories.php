<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('services') || ! Schema::hasColumn('services', 'category')) {
            return;
        }

        if (Schema::getConnection()->getDriverName() === 'pgsql') {
            Schema::getConnection()->statement('ALTER TABLE services DROP CONSTRAINT IF EXISTS services_category_check');
        }

        Schema::table('services', function (Blueprint $table) {
            $table->string('category')->default('recovery_performance')->change();
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('services') || ! Schema::hasColumn('services', 'category')) {
            return;
        }

        Schema::table('services', function (Blueprint $table) {
            $table->string('category')->default('recovery_performance')->change();
        });
    }
};
