<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_ukm', function (Blueprint $table) {
            $table->uuid('ukm_uuid')->primary();
            $table->string('nama', 50);
            $table->string('logo', 150);
            $table->string('visi');
            $table->longText('misi');
            $table->longText('tujuan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_ukm');
    }
};
