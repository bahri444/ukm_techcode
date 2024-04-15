<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bidang', function (Blueprint $table) {
            $table->uuid('bidang_uuid')->primary();
            $table->string('nama_bidang');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bidang');
    }
};
