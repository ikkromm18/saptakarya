<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add harga (pricing matrix) JSON column to produks
        Schema::table('produks', function (Blueprint $table) {
            $table->json('harga')->nullable()->after('bahan');
        });

        // Add harga_satuan (snapshot per-unit price) to orders
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('harga_satuan')->default(0)->after('jumlah');
        });
    }

    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->dropColumn('harga');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('harga_satuan');
        });
    }
};
