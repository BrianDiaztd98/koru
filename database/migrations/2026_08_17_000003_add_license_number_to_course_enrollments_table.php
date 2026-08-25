<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('course_enrollments', function (Blueprint $table): void {
            $table->string('license_number', 7)->nullable()->after('phone');
        });
    }

    public function down(): void
    {
        Schema::table('course_enrollments', function (Blueprint $table): void {
            $table->dropColumn('license_number');
        });
    }
};
