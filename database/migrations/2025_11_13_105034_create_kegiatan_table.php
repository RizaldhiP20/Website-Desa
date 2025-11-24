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
        Schema::connection('pgsql_rejosari')->create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->enum('kategori', ['pembangunan', 'pemerintahan', 'pembinaan', 'pemasyarakatan', 'lainnya']);
            $table->date('tanggal_kegiatan');
            $table->string('foto')->nullable();
            $table->string('slug')->unique();
            $table->enum('status', ['draft', 'published', 'archived'])->default('published');
            $table->unsignedBigInteger('dibuat_oleh')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_rejosari')->dropIfExists('kegiatan');
    }
};
