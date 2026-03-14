<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'produk_id',
        'kode_pesanan',
        'ukuran',
        'bahan',
        'jumlah',
        'total_harga',
        'file_desain',
        'bukti_bayar',
        'status',
        'catatan',
    ];

    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the produk that belongs to the order.
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    /**
     * Get the status badge class for the order.
     */
    public function getStatusBadgeAttribute()
    {
        return match ($this->status) {
            'pending' => 'bg-yellow-100 text-yellow-800',
            'awaiting_payment' => 'bg-orange-100 text-orange-800',
            'processing' => 'bg-blue-100 text-blue-800',
            'shipping' => 'bg-indigo-100 text-indigo-800',
            'completed' => 'bg-green-100 text-green-800',
            'cancelled' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    /**
     * Get the status label for the order.
     */
    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            'pending' => 'Pending',
            'awaiting_payment' => 'Menunggu Pembayaran',
            'processing' => 'Diproses',
            'shipping' => 'Dikirim',
            'completed' => 'Selesai',
            'cancelled' => 'Dibatalkan',
            default => 'Unknown',
        };
    }
}
