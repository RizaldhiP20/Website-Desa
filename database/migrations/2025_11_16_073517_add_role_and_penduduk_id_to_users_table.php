<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // modify users table in auth schema via default pgsql connection
        Schema::connection('pgsql')->table('users', function (Blueprint $table) {
            $table->string('role')->nullable();
            $table->unsignedBigInteger('penduduk_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'penduduk_id']);
        });
    }
};
