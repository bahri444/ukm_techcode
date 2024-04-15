<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('saran', function (Blueprint $table) {
            $table->uuid('saran_uuid')->primary();
            $table->string('kode_member', 20);
            $table->longText('teks_saran');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('saran');
    }
};
