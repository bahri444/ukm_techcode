<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSetup extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = 'home_uuid';
    protected $table = 'home';
    protected $fillable = ['title',    'deskripsi',    'banner'];
}
