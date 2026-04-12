<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('timeline_ppdbs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gelombang_id')->constrained('gelombangs')->cascadeOnDelete();
            $table->unsignedTinyInteger('urutan');
            $table->string('nama_tahap');
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->timestamps();

            $table->unique(['gelombang_id', 'urutan']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('timeline_ppdbs');
    }
};
