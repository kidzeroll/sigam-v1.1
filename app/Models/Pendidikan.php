<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table = "tb_pendidikan";
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class);
    }
}
