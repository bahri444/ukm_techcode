<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesi extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = "profesi_uuid";
    protected $table = "profesi";
    protected $fillable = ["user_uuid",    "bidang_uuid"];

    public function joinToUser()
    {
        return $this->hasMany(User::class, 'user_uuid', 'user_uuid');
    }
    public function joinToBidang()
    {
        return $this->hasMany(Bidang::class, 'bidang_uuid', 'bidang_uuid');
    }
}
