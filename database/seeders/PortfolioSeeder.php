<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $portfolios = [
            [
                'judul'     => 'Banner Pameran UMKM Nasional',
                'deskripsi' => 'Banner flexi 150x300cm full colour untuk booth pameran UMKM.',
                'foto'      => 'https://picsum.photos/seed/port1/800/600',
                'kategori'  => 'Banner',
            ],
            [
                'judul'     => 'Kaos Seragam Komunitas Pesepeda',
                'deskripsi' => 'Sablon kaos 200 pcs untuk komunitas sepeda gowes weekend.',
                'foto'      => 'https://picsum.photos/seed/port2/800/600',
                'kategori'  => 'Sablon Kaos',
            ],
            [
                'judul'     => 'Undangan Pernikahan Adat Jawa',
                'deskripsi' => 'Undangan eksklusif dengan finishing foil emas dan laminasi soft touch.',
                'foto'      => 'https://picsum.photos/seed/port3/800/600',
                'kategori'  => 'Undangan',
            ],
            [
                'judul'     => 'Brosur Cafe & Resto',
                'deskripsi' => 'Brosur menu restoran A5 dua sisi dengan laminasi glossy.',
                'foto'      => 'https://picsum.photos/seed/port4/800/600',
                'kategori'  => 'Brosur',
            ],
            [
                'judul'     => 'Stiker Label Produk UMKM',
                'deskripsi' => 'Stiker label produk makanan kemasan die-cut, waterproof vinyl.',
                'foto'      => 'https://picsum.photos/seed/port5/800/600',
                'kategori'  => 'Stiker',
            ],
            [
                'judul'     => 'Spanduk Kampanye Pemilu',
                'deskripsi' => 'Cetak banner horizontal 6 meter untuk kampanye calon legislatif.',
                'foto'      => 'https://picsum.photos/seed/port6/800/600',
                'kategori'  => 'Banner',
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }
    }
}
