<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Client Outcomes feature removed: drop the unused testimonials table.
     */
    public function up(): void
    {
        Schema::dropIfExists('testimonials');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Intentionally empty: the Client Outcomes feature was removed entirely.
    }
};
