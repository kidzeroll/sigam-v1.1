<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendatang extends Model
{
    use HasFactory;
    protected $table = "tb_pendatang";
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $dates = ['tanggal_datang'];
}
