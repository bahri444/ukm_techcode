<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = 'kegiatan_uuid';
    protected $table = 'kegiatan';
    protected $fillable = [
        'kategori_uuid',
        'nama_kegiatan',
        'foto_kegiatan',
        'deskripsi',
        'tempat',
        'tanggal_mulai',
        'tanggal_selesai'
    ];
    public function joinToKategoriKegiatan()
    {
        return $this->hasMany(KategoriKegiatan::class, 'kategori_uuid', 'kategori_uuid');
    }
}
