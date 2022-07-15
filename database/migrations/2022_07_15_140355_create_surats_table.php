<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_surat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penduduk_id');
            $table->string('jenis_surat');
            $table->string('keperluan');
            $table->string('no_hp');
            $table->enum('status', ['menunggu', 'disetujui', 'ditandatangani', 'selesai'])->default('menunggu');
            $table->string('surat')->nullable();

            $table->timestamps();

            $table->foreign('penduduk_id')->references('id')->on('tb_penduduk')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_surat');
    }
};
