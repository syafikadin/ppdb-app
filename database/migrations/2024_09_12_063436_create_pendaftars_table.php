<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id(); // ID Pendaftar
            $table->unsignedBigInteger('id_siswa'); // Referensi ke tabel siswas
            $table->string('status_pendaftaran')->default('Belum Mendaftar'); // Status pendaftaran lengkap
            $table->timestamps(); // Created at dan Updated at

            // Foreign key constraint
            $table->foreign('id_siswa')->references('id')->on('siswas')->onDelete('cascade');

            // Status Pendaftaran
            // 1. Belum mendaftar
            // 2. Sudah daftar, belum diverifikasi
            // 3. Sudah diverifikasi
            // 4. Diterima / Tidak diterima`
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftars');
    }
};
