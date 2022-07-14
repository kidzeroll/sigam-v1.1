<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
    use HasFactory;

    protected $table = "tb_kematian";
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $dates = ['tanggal_kematian'];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
}
