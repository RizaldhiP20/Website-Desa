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
        Schema::connection('pgsql_rejosari')->create('rumahs', function (Blueprint $table) {
            $table->id();
            $table->string('alamat_rumah');
            $table->foreignId('dusun_id')->constrained('dusuns')->onDelete('cascade');
            $table->integer('rt');
            $table->integer('rw');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_rejosari')->dropIfExists('rumahs');
    }
};
