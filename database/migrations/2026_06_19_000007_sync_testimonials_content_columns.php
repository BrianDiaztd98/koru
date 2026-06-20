<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('testimonials')) {
            return;
        }

        Schema::table('testimonials', function (Blueprint $table) {
            if (! Schema::hasColumn('testimonials', 'author_name')) {
                $table->string('author_name');
            }

            if (! Schema::hasColumn('testimonials', 'author_role')) {
                $table->string('author_role')->nullable();
            }

            if (! Schema::hasColumn('testimonials', 'quote_en')) {
                $table->text('quote_en');
            }

            if (! Schema::hasColumn('testimonials', 'quote_es')) {
                $table->text('quote_es');
            }

            if (! Schema::hasColumn('testimonials', 'image_path')) {
                $table->string('image_path')->nullable();
            }

            $legacyColumns = array_filter([
                'client_name',
                'text_en',
                'text_es',
                'rating',
                'is_video',
            ], fn ($column) => Schema::hasColumn('testimonials', $column));

            if ($legacyColumns !== []) {
                $table->dropColumn(array_values($legacyColumns));
            }
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('testimonials')) {
            return;
        }

        Schema::table('testimonials', function (Blueprint $table) {
            $legacyColumns = array_filter([
                'client_name',
                'text_en',
                'text_es',
                'rating',
                'is_video',
            ], fn ($column) => ! Schema::hasColumn('testimonials', $column));

            if ($legacyColumns !== []) {
                $table->string('client_name');
                $table->text('text_en');
                $table->text('text_es');
                $table->integer('rating')->default(5);
                $table->boolean('is_video')->default(false);
            }

            $columns = array_filter([
                'author_name',
                'author_role',
                'quote_en',
                'quote_es',
                'image_path',
            ], fn ($column) => Schema::hasColumn('testimonials', $column));

            if ($columns !== []) {
                $table->dropColumn(array_values($columns));
            }
        });
    }
};
