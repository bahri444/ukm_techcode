<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = "kelas_uuid";
    protected $table = "kelas";
    protected $fillable = [
        'nama_kelas',
        'jenis_kelas',
        'harga_kelas'
    ];
}
