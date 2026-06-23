<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('abouts')) {
            Schema::create('abouts', function (Blueprint $table) {
                $table->id();
                $table->string('title')->default('About KORU');
                $table->text('philosophy')->nullable();
                $table->text('vision')->nullable();
                $table->string('image_1')->nullable();
                $table->string('image_2')->nullable();
                $table->string('image_3')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};