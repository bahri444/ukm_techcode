<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = 'saran_uuid';
    protected $table = 'saran';
    protected $fillable = ['kode_member', 'teks_saran'];
}
