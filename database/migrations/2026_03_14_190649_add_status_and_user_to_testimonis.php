<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('testimonis', function (Blueprint $table) {
            // FK to users (nullable — admin-seeded data won't have a user)
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null')->after('id');

            // status: pending → awaiting review; displayed → shown on homepage; hidden → rejected/hidden
            $table->enum('status', ['pending', 'displayed', 'hidden'])->default('pending')->after('rating');
        });
    }

    public function down(): void
    {
        Schema::table('testimonis', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'status']);
        });
    }
};
