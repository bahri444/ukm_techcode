<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('modul', function (Blueprint $table) {
            $table->uuid('modul_uuid')->primary();
            $table->foreignUuid('kategori_uuid');
            $table->string('judul', 100);
            $table->longText('materi');
            $table->longText('kode');
            $table->timestamps();
            $table->foreign('kategori_uuid')->references('kategori_uuid')->on('kategori_modul')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('modul');
    }
};
