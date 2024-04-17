<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasUuids, HasFactory;
    protected $primaryKey = 'user_uuid';
    protected $table = 'users';
    protected $fillable = [
        'kode_member',
        'nama_lengkap',
        'email',
        'password',
        'role',
        'tanggal_lahir',
        'gender',
        'alamat',
        'foto',
        'github',
        'jenis_anggota',
        'status_anggota',
        'angkatan',
    ];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
