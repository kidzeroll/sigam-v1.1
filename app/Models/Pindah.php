<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pindah extends Model
{
    use HasFactory;

    protected $table = "tb_pindah";
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $dates = ['tanggal_pindah'];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
}
