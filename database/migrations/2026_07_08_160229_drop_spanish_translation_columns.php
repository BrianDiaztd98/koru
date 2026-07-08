<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Drop the Spanish (ES) translation columns that are no longer used.
     */
    public function up(): void
    {
        $columnsByTable = [
            'services' => ['name_es', 'description_es'],
            'courses' => ['title_es', 'description_es'],
            'team_members' => ['bio_es', 'specialty_es'],
            'testimonials' => ['quote_es'],
            'packages' => ['name_es', 'description_es'],
        ];

        foreach ($columnsByTable as $table => $columns) {
            if (! Schema::hasTable($table)) {
                continue;
            }

            $existing = array_filter(
                $columns,
                fn (string $column) => Schema::hasColumn($table, $column),
            );

            if ($existing === []) {
                continue;
            }

            Schema::table($table, function (Blueprint $table) use ($existing) {
                $table->dropColumn($existing);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('name_es');
            $table->text('description_es');
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->string('title_es');
            $table->text('description_es');
        });

        Schema::table('team_members', function (Blueprint $table) {
            $table->text('bio_es')->nullable();
            $table->text('specialty_es')->nullable()->after('specialty_en');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->text('quote_es');
        });

        Schema::table('packages', function (Blueprint $table) {
            $table->string('name_es');
            $table->text('description_es')->nullable();
        });
    }
};
