<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_penduduk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agama_id');
            $table->unsignedBigInteger('pendidikan_id');
            $table->unsignedBigInteger('pekerjaan_id');
            $table->unsignedBigInteger('dusun_id');

            $table->string('no_kk')->nullable();
            $table->string('nik')->unique();
            $table->string('name');
            $table->string('alamat');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->enum('kewarganegaraan', ['WNI', 'WNA', 'GANDA']);
            $table->string('no_pasport')->nullable();
            $table->string('no_kitas_kitap')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('penghasilan')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('status_perkawinan')->default('LAINNYA');
            $table->string('hubungan')->default('LAINNYA');
            $table->enum('status', ['ada', 'meninggal', 'pindah'])->default('ada');
            $table->string('ktp')->nullable();
            $table->timestamps();

            $table->foreign('agama_id')->references('id')->on('tb_agama')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pendidikan_id')->references('id')->on('tb_pendidikan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pekerjaan_id')->references('id')->on('tb_pekerjaan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('dusun_id')->references('id')->on('tb_dusun')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_penduduk');
    }
};
