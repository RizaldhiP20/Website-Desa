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
        DB::connection('pgsql')->statement('CREATE SCHEMA IF NOT EXISTS auth');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::connection('pgsql')->statement('DROP SCHEMA IF EXISTS auth CASCADE');
    }
};
