<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->uuid('kegiatan_uuid')->primary();
            $table->foreignUuid('kategori_uuid');
            $table->string('nama_kegiatan', 150);
            $table->string('foto_kegiatan', 150);
            $table->longText('deskripsi');
            $table->string('tempat', 150);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->timestamps();
            $table->foreign('kategori_uuid',)->references('kategori_uuid')->on('kategori_kegiatan')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kegiatan');
    }
};
