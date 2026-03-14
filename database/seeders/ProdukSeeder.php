<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        // Disable FK checks so we can safely clear the table
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Produk::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $produks = [
            // ── Cetak Banner ───────────────────────────────────────
            [
                'nama'      => 'Cetak Banner',
                'slug'      => 'cetak-banner',
                'deskripsi' => 'Banner berkualitas tinggi untuk promosi bisnis, event, dan pameran. Tersedia dalam berbagai ukuran dengan bahan flexi dan vinyl tahan cuaca.',
                'icon'      => 'banner',
                'ukuran'    => ['60x160 cm', '80x200 cm', '100x200 cm', '120x240 cm', '150x300 cm'],
                'bahan'     => ['Flexi Korea 340gr', 'Flexi Jerman 440gr', 'Vinyl Outdoor'],
                'harga'     => [
                    '60x160 cm'  => ['Flexi Korea 340gr' => 25000,  'Flexi Jerman 440gr' => 35000,  'Vinyl Outdoor' => 40000],
                    '80x200 cm'  => ['Flexi Korea 340gr' => 40000,  'Flexi Jerman 440gr' => 55000,  'Vinyl Outdoor' => 65000],
                    '100x200 cm' => ['Flexi Korea 340gr' => 55000,  'Flexi Jerman 440gr' => 70000,  'Vinyl Outdoor' => 85000],
                    '120x240 cm' => ['Flexi Korea 340gr' => 75000,  'Flexi Jerman 440gr' => 95000,  'Vinyl Outdoor' => 115000],
                    '150x300 cm' => ['Flexi Korea 340gr' => 105000, 'Flexi Jerman 440gr' => 135000, 'Vinyl Outdoor' => 160000],
                ],
                'harga_min' => 25000,
                'harga_max' => 160000,
                'foto'      => 'https://picsum.photos/seed/banner/800/600',
            ],

            // ── Cetak Spanduk ─────────────────────────────────────
            [
                'nama'      => 'Cetak Spanduk',
                'slug'      => 'cetak-spanduk',
                'deskripsi' => 'Spanduk flexi horizontal dengan cetak full colour vivid. Cocok untuk grand opening, kampanye, dan event outdoor.',
                'icon'      => 'spanduk',
                'ukuran'    => ['2x0.8 m', '3x1 m', '4x1 m', '5x1 m', '6x1 m'],
                'bahan'     => ['Flexi Korea 340gr', 'Flexi Jerman 440gr', 'Kain Oscar'],
                'harga'     => [
                    '2x0.8 m' => ['Flexi Korea 340gr' => 35000,  'Flexi Jerman 440gr' => 50000,  'Kain Oscar' => 80000],
                    '3x1 m'   => ['Flexi Korea 340gr' => 55000,  'Flexi Jerman 440gr' => 75000,  'Kain Oscar' => 120000],
                    '4x1 m'   => ['Flexi Korea 340gr' => 75000,  'Flexi Jerman 440gr' => 100000, 'Kain Oscar' => 160000],
                    '5x1 m'   => ['Flexi Korea 340gr' => 90000,  'Flexi Jerman 440gr' => 125000, 'Kain Oscar' => 200000],
                    '6x1 m'   => ['Flexi Korea 340gr' => 110000, 'Flexi Jerman 440gr' => 150000, 'Kain Oscar' => 240000],
                ],
                'harga_min' => 35000,
                'harga_max' => 240000,
                'foto'      => 'https://picsum.photos/seed/spanduk/800/600',
            ],

            // ── Cetak Brosur ──────────────────────────────────────
            [
                'nama'      => 'Cetak Brosur',
                'slug'      => 'cetak-brosur',
                'deskripsi' => 'Brosur cetak full colour dengan kualitas premium. Cocok untuk katalog produk, promosi, dan media informasi bisnis Anda.',
                'icon'      => 'brosur',
                'ukuran'    => ['A4 (21x29.7 cm)', 'A5 (14.8x21 cm)', 'A6 (10.5x14.8 cm)', 'DL (10x21 cm)'],
                'bahan'     => ['Art Paper 120gr', 'Art Paper 150gr', 'Art Carton 230gr', 'Matt Paper 120gr'],
                'harga'     => [
                    'A4 (21x29.7 cm)'   => ['Art Paper 120gr' => 700,  'Art Paper 150gr' => 900,  'Art Carton 230gr' => 1400, 'Matt Paper 120gr' => 800],
                    'A5 (14.8x21 cm)'   => ['Art Paper 120gr' => 400,  'Art Paper 150gr' => 500,  'Art Carton 230gr' => 750,  'Matt Paper 120gr' => 450],
                    'A6 (10.5x14.8 cm)' => ['Art Paper 120gr' => 250,  'Art Paper 150gr' => 320,  'Art Carton 230gr' => 480,  'Matt Paper 120gr' => 280],
                    'DL (10x21 cm)'     => ['Art Paper 120gr' => 350,  'Art Paper 150gr' => 450,  'Art Carton 230gr' => 650,  'Matt Paper 120gr' => 380],
                ],
                'harga_min' => 250,
                'harga_max' => 1400,
                'foto'      => 'https://picsum.photos/seed/brosur/800/600',
            ],

            // ── Sablon Kaos ───────────────────────────────────────
            [
                'nama'      => 'Sablon Kaos',
                'slug'      => 'sablon-kaos',
                'deskripsi' => 'Sablon kaos custom berkualitas tinggi untuk seragam, merchandise, dan kebutuhan komunitas. Tersedia teknik sablon manual, DTF, dan polyflex.',
                'icon'      => 'kaos',
                'ukuran'    => ['S', 'M', 'L', 'XL', 'XXL', 'XXXL'],
                'bahan'     => ['Cotton Combed 30s', 'Cotton Combed 24s', 'Polyester', 'Dry Fit'],
                'harga'     => [
                    'S'    => ['Cotton Combed 30s' => 45000, 'Cotton Combed 24s' => 50000, 'Polyester' => 40000, 'Dry Fit' => 55000],
                    'M'    => ['Cotton Combed 30s' => 47000, 'Cotton Combed 24s' => 52000, 'Polyester' => 42000, 'Dry Fit' => 57000],
                    'L'    => ['Cotton Combed 30s' => 50000, 'Cotton Combed 24s' => 55000, 'Polyester' => 45000, 'Dry Fit' => 60000],
                    'XL'   => ['Cotton Combed 30s' => 55000, 'Cotton Combed 24s' => 60000, 'Polyester' => 50000, 'Dry Fit' => 65000],
                    'XXL'  => ['Cotton Combed 30s' => 60000, 'Cotton Combed 24s' => 65000, 'Polyester' => 55000, 'Dry Fit' => 72000],
                    'XXXL' => ['Cotton Combed 30s' => 68000, 'Cotton Combed 24s' => 75000, 'Polyester' => 62000, 'Dry Fit' => 82000],
                ],
                'harga_min' => 40000,
                'harga_max' => 82000,
                'foto'      => 'https://picsum.photos/seed/kaos/800/600',
            ],

            // ── Cetak Undangan ────────────────────────────────────
            [
                'nama'      => 'Cetak Undangan',
                'slug'      => 'cetak-undangan',
                'deskripsi' => 'Undangan pernikahan, khitanan, dan acara spesial lainnya dengan desain elegan. Tersedia dengan finishing laminasi, foil emas, dan emboss.',
                'icon'      => 'undangan',
                'ukuran'    => ['10x20 cm', '14x20 cm', 'A5 (14.8x21 cm)', 'Square 15x15 cm'],
                'bahan'     => ['Art Carton 260gr', 'Art Carton 310gr', 'Fancy Paper'],
                'harga'     => [
                    '10x20 cm'           => ['Art Carton 260gr' => 1500,  'Art Carton 310gr' => 2000,  'Fancy Paper' => 3500],
                    '14x20 cm'           => ['Art Carton 260gr' => 2000,  'Art Carton 310gr' => 2800,  'Fancy Paper' => 5000],
                    'A5 (14.8x21 cm)'    => ['Art Carton 260gr' => 2200,  'Art Carton 310gr' => 3000,  'Fancy Paper' => 5500],
                    'Square 15x15 cm'    => ['Art Carton 260gr' => 2500,  'Art Carton 310gr' => 3500,  'Fancy Paper' => 6500],
                ],
                'harga_min' => 1500,
                'harga_max' => 6500,
                'foto'      => 'https://picsum.photos/seed/undangan/800/600',
            ],

            // ── Cetak Stiker ──────────────────────────────────────
            [
                'nama'      => 'Cetak Stiker',
                'slug'      => 'cetak-stiker',
                'deskripsi' => 'Stiker custom untuk kebutuhan branding, labeling produk, dan dekorasi. Kualitas cetak tajam dengan bahan waterproof tahan lama.',
                'icon'      => 'stiker',
                'ukuran'    => ['5x5 cm', '5x10 cm', 'A5 (14.8x21 cm)', 'A4 (21x29.7 cm)'],
                'bahan'     => ['Vinyl Glossy', 'Vinyl Matte', 'Chromo', 'Transparant'],
                'harga'     => [
                    '5x5 cm'           => ['Vinyl Glossy' => 600,   'Vinyl Matte' => 700,   'Chromo' => 500,   'Transparant' => 800],
                    '5x10 cm'          => ['Vinyl Glossy' => 1000,  'Vinyl Matte' => 1200,  'Chromo' => 800,   'Transparant' => 1400],
                    'A5 (14.8x21 cm)'  => ['Vinyl Glossy' => 3500,  'Vinyl Matte' => 4000,  'Chromo' => 2800,  'Transparant' => 4500],
                    'A4 (21x29.7 cm)'  => ['Vinyl Glossy' => 6000,  'Vinyl Matte' => 7000,  'Chromo' => 5000,  'Transparant' => 8000],
                ],
                'harga_min' => 500,
                'harga_max' => 8000,
                'foto'      => 'https://picsum.photos/seed/stiker/800/600',
            ],

            // ── Nota & Kop Surat ──────────────────────────────────
            [
                'nama'      => 'Nota & Kop Surat',
                'slug'      => 'nota-kop-surat',
                'deskripsi' => 'Nota bon karbon rangkap dan kop surat profesional untuk operasional bisnis. Cetak cepat dengan hasil rapi dan tajam.',
                'icon'      => 'nota',
                'ukuran'    => ['1/3 Folio', 'A5', 'A4'],
                'bahan'     => ['HVS 70gr', 'Art Paper 100gr', 'Kertas NCR (Karbon)'],
                'harga'     => [
                    '1/3 Folio' => ['HVS 70gr' => 65000,  'Art Paper 100gr' => 80000,  'Kertas NCR (Karbon)' => 120000],
                    'A5'        => ['HVS 70gr' => 90000,  'Art Paper 100gr' => 110000, 'Kertas NCR (Karbon)' => 160000],
                    'A4'        => ['HVS 70gr' => 140000, 'Art Paper 100gr' => 175000, 'Kertas NCR (Karbon)' => 250000],
                ],
                'harga_min' => 65000,
                'harga_max' => 250000,
                'foto'      => 'https://picsum.photos/seed/nota/800/600',
            ],

            // ── ID Card & Lanyard ─────────────────────────────────
            [
                'nama'      => 'Cetak ID Card & Lanyard',
                'slug'      => 'cetak-id-card-lanyard',
                'deskripsi' => 'ID card PVC full colour untuk karyawan, panitia event, dan anggota organisasi. Tersedia dengan laminasi dan lanyard custom.',
                'icon'      => 'idcard',
                'ukuran'    => ['85x54 mm (Standard CR80)'],
                'bahan'     => ['PVC 0.5 mm', 'PVC 0.76 mm', 'Art Carton 310gr'],
                'harga'     => [
                    '85x54 mm (Standard CR80)' => ['PVC 0.5 mm' => 5000, 'PVC 0.76 mm' => 7000, 'Art Carton 310gr' => 3500],
                ],
                'harga_min' => 3500,
                'harga_max' => 7000,
                'foto'      => 'https://picsum.photos/seed/idcard/800/600',
            ],
        ];

        foreach ($produks as $data) {
            Produk::create($data);
        }
    }
}
