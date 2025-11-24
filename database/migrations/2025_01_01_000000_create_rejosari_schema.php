<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Buat schema rejosari jika belum ada
        DB::connection('pgsql')->statement("CREATE SCHEMA IF NOT EXISTS rejosari");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop schema rejosari
        DB::connection('pgsql')->statement("DROP SCHEMA IF EXISTS rejosari CASCADE");
    }
};
