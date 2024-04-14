<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kategori_modul', function (Blueprint $table) {
            $table->uuid('kategori_uuid')->primary();
            $table->foreignUuid('kelas_uuid');
            $table->string('nama_kategori', 100);
            $table->timestamps();
            $table->foreign('kelas_uuid')->references('kelas_uuid')->on('kelas')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_modul');
    }
};
