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
        Schema::create('day_discount_settings', function (Blueprint $table) {
            $table->id();
            // Carbon dayOfWeek convention: 0 = Sunday ... 6 = Saturday.
            $table->unsignedTinyInteger('day_of_week')->unique();
            $table->decimal('percentage', 5, 2)->default(0);
            $table->boolean('active_status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('day_discount_settings');
    }
};
