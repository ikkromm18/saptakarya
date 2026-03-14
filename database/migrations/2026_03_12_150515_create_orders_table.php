<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('produk_id')->constrained()->onDelete('cascade');
            $table->string('kode_pesanan')->unique();
            $table->string('ukuran')->nullable();
            $table->string('bahan')->nullable();
            $table->integer('jumlah')->default(1);
            $table->decimal('total_harga', 15, 2);
            $table->string('file_desain')->nullable();
            $table->string('bukti_bayar')->nullable();
            $table->enum('status', ['pending', 'awaiting_payment', 'processing', 'shipping', 'completed', 'cancelled'])->default('pending');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
