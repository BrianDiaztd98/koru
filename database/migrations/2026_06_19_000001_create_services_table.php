<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('services')) {
            Schema::create('services', function (Blueprint $table) {
                $table->id();
                $table->string('slug')->unique();
                $table->string('name_en');
                $table->string('name_es');
                $table->text('description_en');
                $table->text('description_es');
                $table->decimal('price', 10, 2)->default(0);
                $table->string('duration')->nullable();
                $table->string('image_path')->nullable();
                $table->string('category')->default('recovery_performance');
                $table->boolean('active_status')->default(true);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
