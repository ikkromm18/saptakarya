<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'instansi',
        'komentar',
        'rating',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope: only testimonials marked as displayed (shown on homepage).
     */
    public function scopeDisplayed($query)
    {
        return $query->where('status', 'displayed');
    }
}
