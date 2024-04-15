<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = "bidang_uuid";
    protected $table = "bidang";
    protected $fillable = ["nama_bidang"];
}
