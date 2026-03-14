<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
        'kategori',
    ];

    /**
     * Return a safe absolute URL for the foto field,
     * whether it's an external URL (seeder) or a local /storage/ path.
     */
    public function getFotoUrlAttribute(): string
    {
        if (filter_var($this->foto, FILTER_VALIDATE_URL)) {
            return $this->foto;
        }

        return asset($this->foto);
    }
}
