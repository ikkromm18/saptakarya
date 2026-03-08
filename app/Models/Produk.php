<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'icon',
        'ukuran',
        'bahan',
        'harga_min',
        'harga_max',
        'foto',
    ];

    protected $casts = [
        'ukuran' => 'array',
        'bahan'  => 'array',
    ];
}
