<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKegiatan extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = "kategori_uuid";
    protected $table = "kategori_kegiatan";
    protected $fillable = ["nama_kategori_kegiatan"];
}
