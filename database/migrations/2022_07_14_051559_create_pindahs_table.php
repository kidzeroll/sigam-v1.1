<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('tb_pindah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penduduk_id');
            $table->date('tanggal_pindah');
            $table->string('tujuan_pindah')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('penduduk_id')->references('id')->on('tb_penduduk')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_pindah');
    }
};
