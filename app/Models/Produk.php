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
        'harga',
        'harga_min',
        'harga_max',
        'foto',
    ];

    protected $casts = [
        'ukuran' => 'array',
        'bahan'  => 'array',
        'harga'  => 'array',
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

    /**
     * Get flat list of all prices from the harga matrix.
     */
    public function getAllPricesAttribute(): array
    {
        if (blank($this->harga)) {
            return [];
        }
        $prices = [];
        foreach ($this->harga as $ukuranPrices) {
            foreach ((array) $ukuranPrices as $price) {
                if (is_numeric($price) && $price > 0) {
                    $prices[] = (int) $price;
                }
            }
        }
        return $prices;
    }

    /**
     * Get the minimum price from the harga matrix.
     */
    public function getMinPriceAttribute(): int
    {
        $all = $this->all_prices;
        return count($all) > 0 ? min($all) : (int) $this->harga_min;
    }

    /**
     * Get the maximum price from the harga matrix.
     */
    public function getMaxPriceAttribute(): int
    {
        $all = $this->all_prices;
        return count($all) > 0 ? max($all) : (int) $this->harga_max;
    }
}
