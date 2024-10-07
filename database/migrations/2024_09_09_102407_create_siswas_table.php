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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('gelombang_id')->nullable()->onDelete('cascade');
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('email')->nullable();
            $table->string('foto')->nullable();
            $table->string('nomor_wa')->nullable();
            $table->string('sosmed')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('penghasilan_ibu')->nullable();
            $table->string('nomor_wali')->nullable();
            $table->string('alamat_wali')->nullable();
            $table->string('piagam')->nullable();
            $table->string('ukuran_seragam')->nullable();
            $table->string('akta')->nullable();
            $table->string('kk')->nullable();
            $table->string('ktp')->nullable();
            $table->string('rapor')->nullable();
            $table->string('catatan')->nullable();
            $table->string('status')->default('Belum Mendaftar');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
};
