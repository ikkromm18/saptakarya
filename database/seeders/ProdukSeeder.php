<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $produks = [
            [
                'nama'      => 'Cetak Banner',
                'slug'      => 'cetak-banner',
                'deskripsi' => 'Banner berkualitas tinggi untuk promosi bisnis, event, dan pameran. Tersedia dalam berbagai ukuran dengan bahan flexi dan vinyl tahan cuaca.',
                'icon'      => 'banner',
                'ukuran'    => ['60x160 cm', '80x200 cm', '100x200 cm', '150x300 cm', 'Custom'],
                'bahan'     => ['Flexi Korea 340gr', 'Flexi Jerman 440gr', 'Vinyl Indoor', 'Vinyl Outdoor'],
                'harga_min' => 25000,
                'harga_max' => 150000,
                'foto'      => 'https://picsum.photos/seed/banner/800/600',
            ],
            [
                'nama'      => 'Cetak Brosur',
                'slug'      => 'cetak-brosur',
                'deskripsi' => 'Brosur cetak full colour dengan kualitas premium. Cocok untuk katalog produk, promosi, dan media informasi bisnis Anda.',
                'icon'      => 'brosur',
                'ukuran'    => ['A4 (21x29.7 cm)', 'A5 (14.8x21 cm)', 'A6 (10.5x14.8 cm)', 'DL (10x21 cm)'],
                'bahan'     => ['Art Paper 120gr', 'Art Paper 150gr', 'Art Carton 230gr', 'Matt Paper 120gr'],
                'harga_min' => 200,
                'harga_max' => 2000,
                'foto'      => 'https://picsum.photos/seed/brosur/800/600',
            ],
            [
                'nama'      => 'Sablon Kaos',
                'slug'      => 'sablon-kaos',
                'deskripsi' => 'Sablon kaos custom berkualitas tinggi untuk seragam, merchandise, dan kebutuhan komunitas. Tersedia teknik sablon manual, DTF, dan polyflex.',
                'icon'      => 'kaos',
                'ukuran'    => ['S', 'M', 'L', 'XL', 'XXL', 'XXXL'],
                'bahan'     => ['Cotton Combed 30s', 'Cotton Combed 24s', 'Polyester', 'TC (Teteron Cotton)'],
                'harga_min' => 45000,
                'harga_max' => 120000,
                'foto'      => 'https://picsum.photos/seed/kaos/800/600',
            ],
            [
                'nama'      => 'Cetak Undangan',
                'slug'      => 'cetak-undangan',
                'deskripsi' => 'Undangan pernikahan, khitanan, dan acara spesial lainnya dengan desain elegan. Tersedia dengan finishing laminasi, foil, dan emboss.',
                'icon'      => 'undangan',
                'ukuran'    => ['10x20 cm', '14x20 cm', 'A5 (14.8x21 cm)', 'Square 15x15 cm'],
                'bahan'     => ['Art Carton 260gr', 'Art Carton 310gr', 'Fancy Paper', 'Jasmine Paper'],
                'harga_min' => 1500,
                'harga_max' => 8000,
                'foto'      => 'https://picsum.photos/seed/undangan/800/600',
            ],
            [
                'nama'      => 'Cetak Stiker',
                'slug'      => 'cetak-stiker',
                'deskripsi' => 'Stiker custom untuk kebutuhan branding, labeling produk, dan dekorasi. Kualitas cetak tajam dengan bahan waterproof tahan lama.',
                'icon'      => 'stiker',
                'ukuran'    => ['5x5 cm', '5x10 cm', 'A5 (14.8x21 cm)', 'A4 (21x29.7 cm)', 'Custom'],
                'bahan'     => ['Vinyl Glossy', 'Vinyl Matte', 'Chromo', 'Transparant'],
                'harga_min' => 500,
                'harga_max' => 15000,
                'foto'      => 'https://picsum.photos/seed/stiker/800/600',
            ],
        ];

        foreach ($produks as $produk) {
            Produk::create($produk);
        }
    }
}
