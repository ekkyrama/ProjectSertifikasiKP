<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analog extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_film',
        'keterangan_cuci',
        'total_harga',
        'link_album'
    ];
}
