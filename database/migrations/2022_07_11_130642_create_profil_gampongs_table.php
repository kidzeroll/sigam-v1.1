<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_profil_gampong', function (Blueprint $table) {
            $table->id();
            $table->string('nama_gampong')->nullable();
            $table->string('nama_kecamatan')->nullable();
            $table->string('nama_kabupaten')->nullable();
            $table->string('nama_provinsi')->nullable();
            $table->string('alamat_gampong', 191)->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('nama_keuchik')->nullable();
            $table->string('alamat_keuchik')->nullable();
            $table->string('logo')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('instagram')->nullable();
            $table->string('kode_gampong')->nullable();
            $table->text('map')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_profil_gampong');
    }
};
