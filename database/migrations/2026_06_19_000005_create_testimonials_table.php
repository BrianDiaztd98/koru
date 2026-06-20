<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('testimonials')) {
            Schema::create('testimonials', function (Blueprint $table) {
                $table->id();
                $table->string('author_name');
                $table->string('author_role')->nullable();
                $table->text('quote_en');
                $table->text('quote_es');
                $table->string('video_url')->nullable();
                $table->string('image_path')->nullable();
                $table->boolean('active_status')->default(true);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
