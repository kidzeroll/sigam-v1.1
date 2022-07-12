<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;

    protected $table = "tb_agama";
    protected $primaryKey = 'id';
    protected $guarded = ['id'];


    public function penduduk()
    {
        return $this->hasMany(Penduduk::class);
    }
}
