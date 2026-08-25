<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_glance_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_id')->constrained()->cascadeOnDelete();
            $table->integer('order')->default(0);
            $table->string('title', 80);
            $table->text('description')->nullable();
            $table->timestamps();

            $table->index(['about_id', 'order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_glance_items');
    }
};
