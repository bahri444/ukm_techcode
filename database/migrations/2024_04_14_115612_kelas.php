<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->uuid('kelas_uuid')->primary();
            $table->string('nama_kelas', 100);
            $table->enum('jenis_kelas', ['free', 'regular']);
            $table->double('harga_kelas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kelas');
    }
};
