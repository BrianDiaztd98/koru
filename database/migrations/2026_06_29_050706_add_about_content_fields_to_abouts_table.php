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
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('feature_1_title')->nullable();
            $table->text('feature_1_description')->nullable();
            $table->string('feature_2_title')->nullable();
            $table->text('feature_2_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn([
                'subtitle',
                'description',
                'feature_1_title',
                'feature_1_description',
                'feature_2_title',
                'feature_2_description',
            ]);
        });
    }
};
