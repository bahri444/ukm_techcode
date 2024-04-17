<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{

    use HasFactory, HasUuids;
    protected $primaryKey = "modul_uuid";
    protected $table = "modul";
    protected $fillable = [
        'kategori_uuid',
        'judul',
        'materi',
        'kode',
    ];
    public function joinToKategoriModul()
    {
        return $this->hasMany(KategoriModul::class, 'kategori_uuid', 'kategori_uuid');
    }
}
