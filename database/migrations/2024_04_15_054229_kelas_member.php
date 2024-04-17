<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kelas_member', function (Blueprint $table) {
            $table->uuid('kelas_member_uuid')->primary();
            $table->foreignUuid('kelas_uuid');
            $table->foreignUuid('user_uuid');
            $table->enum('metode_pembayaran', ['cash', 'cicil']);
            $table->date('mulai')->nullable();
            $table->date('selesai')->nullable();
            $table->enum('status_kelas', ['pending', 'aktif'])->default('pending');
            $table->timestamps();
            $table->foreign('kelas_uuid')->references('kelas_uuid')->on('kelas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_uuid')->references('user_uuid')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kelas_member');
    }
};
