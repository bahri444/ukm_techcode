<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kategori_kegiatan', function (Blueprint $table) {
            $table->uuid('kategori_uuid')->primary();
            $table->string('nama_kategori_kegiatan', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_kegiatan');
    }
};
