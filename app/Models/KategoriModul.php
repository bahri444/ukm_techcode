<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModul extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = "kategori_uuid";
    protected $table = "kategori_modul";
    protected $fillable = [
        'kelas_uuid',
        'nama_kategori',
    ];
    public function joinToKelas()
    {
        return $this->hasMany(Kelas::class, 'kelas_uuid', 'kelas_uuid');
    }
}
