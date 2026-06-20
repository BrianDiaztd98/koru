<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('courses')) {
            Schema::create('courses', function (Blueprint $table) {
                $table->id();
                $table->string('title_en');
                $table->string('title_es');
                $table->text('description_en');
                $table->text('description_es');
                $table->integer('ce_credits')->default(0);
                $table->date('date');
                $table->decimal('price', 10, 2)->default(0);
                $table->boolean('active_status')->default(true);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
