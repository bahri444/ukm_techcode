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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('user_uuid')->primary();
            $table->string('kode_member', 20)->nullable();
            $table->string('nama_lengkap', 40)->nullable();
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->enum('role', ['superadmin', 'admin', 'member'])->default('member');
            $table->date('tanggal_lahir')->nullable();
            $table->enum('gender', ['laki-laki', 'perempuan'])->nullable();
            $table->string('alamat', 50)->nullable();
            $table->string('foto', 100)->nullable();
            $table->string('github', 50)->nullable();
            $table->enum('jenis_anggota', ['percobaan', 'pasti', 'kehormatan'])->default('percobaan');
            $table->enum('status_anggota', ['nonaktif', 'aktif'])->default('nonaktif');
            $table->char('angkatan', 4)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
