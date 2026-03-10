<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'user@saptakarya.com'],
            [
                'name' => 'Regular User',
                'password' => Hash::make('password123'),
                'alamat' => 'Saptakarya Client',
                'no_hp' => '081234567891',
                'role' => 'user',
            ],
            ['email' => 'user1@saptakarya.com'],
            [
                'name' => 'Regular User1',
                'password' => Hash::make('password123'),
                'alamat' => 'Saptakarya Client',
                'no_hp' => '081234567891',
                'role' => 'user',
            ],
            ['email' => 'user2@saptakarya.com'],
            [
                'name' => 'Regular User2',
                'password' => Hash::make('password123'),
                'alamat' => 'Saptakarya Client',
                'no_hp' => '081234567891',
                'role' => 'user',
            ],

        );
    }
}
