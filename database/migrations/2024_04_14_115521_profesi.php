<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('profesi', function (Blueprint $table) {
            $table->uuid('profesi_uuid')->primary();
            $table->foreignUuid('user_uuid');
            $table->foreignUuid('bidang_uuid');
            $table->timestamps();
            $table->foreign('user_uuid')->references('user_uuid')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('bidang_uuid')->references('bidang_uuid')->on('bidang')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profesi');
    }
};
