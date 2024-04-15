<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUkm extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = "ukm_uuid";
    protected $table = "about_ukm";
    protected $fillable = ["nama",    "logo",    "visi",    "misi",    "tujuan"];
}
