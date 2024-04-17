<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasMember extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'kelas_member';
    protected $primaryKey = 'kelas_member_uuid';
    protected $fillable = ['kelas_uuid',    'user_uuid',    'metode_pembayaran',    'mulai',    'selesai',    'status_kelas'];
    public function joinToKelas()
    {
        return $this->hasMany(Kelas::class, 'kelas_uuid', 'kelas_uuid');
    }
    public function joinToUser()
    {
        return $this->hasMany(User::class, 'user_uuid', 'user_uuid');
    }
}
