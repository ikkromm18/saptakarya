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
            // ── Print Banner ───────────────────────────────────────
            [
                'nama'      => 'Cetak Banner',
                'slug'      => 'cetak-banner',
                'deskripsi' => 'Banner berkualitas tinggi untuk promosi bisnis, event, dan pameran. Tersedia dalam berbagai ukuran dengan bahan flexi dan vinyl tahan cuaca.',
                'icon'      => 'banner',
                'ukuran'    => ['60x160 cm', '80x200 cm', '100x200 cm', '120x240 cm', '150x300 cm', 'Custom'],
                'bahan'     => ['Flexi Korea 340gr', 'Flexi Jerman 440gr', 'Vinyl Indoor', 'Vinyl Outdoor'],
                'harga_min' => 25000,
                'harga_max' => 200000,
                'foto'      => 'https://picsum.photos/seed/banner/800/600',
            ],

            // ── Spanduk ────────────────────────────────────────────
            [
                'nama'      => 'Cetak Spanduk',
                'slug'      => 'cetak-spanduk',
                'deskripsi' => 'Spanduk flexi horizontal dengan cetak full colour vivid. Cocok untuk grand opening, kampanye, dan event outdoor.',
                'icon'      => 'spanduk',
                'ukuran'    => ['2x0.8 m', '3x1 m', '4x1 m', '5x1 m', '6x1 m', 'Custom'],
                'bahan'     => ['Flexi Korea 340gr', 'Flexi Jerman 440gr', 'Kain Oscar'],
                'harga_min' => 35000,
                'harga_max' => 300000,
                'foto'      => 'https://picsum.photos/seed/spanduk/800/600',
            ],

            // ── Brosur ─────────────────────────────────────────────
            [
                'nama'      => 'Cetak Brosur',
                'slug'      => 'cetak-brosur',
                'deskripsi' => 'Brosur cetak full colour dengan kualitas premium. Cocok untuk katalog produk, promosi, dan media informasi bisnis Anda.',
                'icon'      => 'brosur',
                'ukuran'    => ['A4 (21x29.7 cm)', 'A5 (14.8x21 cm)', 'A6 (10.5x14.8 cm)', 'DL (10x21 cm)', '1/3 A4'],
                'bahan'     => ['Art Paper 120gr', 'Art Paper 150gr', 'Art Carton 230gr', 'Matt Paper 120gr'],
                'harga_min' => 200,
                'harga_max' => 2500,
                'foto'      => 'https://picsum.photos/seed/brosur/800/600',
            ],

            // ── Sablon Kaos ────────────────────────────────────────
            [
                'nama'      => 'Sablon Kaos',
                'slug'      => 'sablon-kaos',
                'deskripsi' => 'Sablon kaos custom berkualitas tinggi untuk seragam, merchandise, dan kebutuhan komunitas. Tersedia teknik sablon manual, DTF, dan polyflex.',
                'icon'      => 'kaos',
                'ukuran'    => ['S', 'M', 'L', 'XL', 'XXL', 'XXXL'],
                'bahan'     => ['Cotton Combed 30s', 'Cotton Combed 24s', 'Polyester', 'TC (Teteron Cotton)', 'Dry Fit'],
                'harga_min' => 45000,
                'harga_max' => 130000,
                'foto'      => 'https://picsum.photos/seed/kaos/800/600',
            ],

            // ── Cetak Undangan ─────────────────────────────────────
            [
                'nama'      => 'Cetak Undangan',
                'slug'      => 'cetak-undangan',
                'deskripsi' => 'Undangan pernikahan, khitanan, dan acara spesial lainnya dengan desain elegan. Tersedia dengan finishing laminasi, foil emas, dan emboss.',
                'icon'      => 'undangan',
                'ukuran'    => ['10x20 cm', '14x20 cm', 'A5 (14.8x21 cm)', 'Square 15x15 cm', 'Custom'],
                'bahan'     => ['Art Carton 260gr', 'Art Carton 310gr', 'Fancy Paper', 'Jasmine Paper'],
                'harga_min' => 1500,
                'harga_max' => 10000,
                'foto'      => 'https://picsum.photos/seed/undangan/800/600',
            ],

            // ── Cetak Stiker ───────────────────────────────────────
            [
                'nama'      => 'Cetak Stiker',
                'slug'      => 'cetak-stiker',
                'deskripsi' => 'Stiker custom untuk kebutuhan branding, labeling produk, dan dekorasi. Kualitas cetak tajam dengan bahan waterproof tahan lama.',
                'icon'      => 'stiker',
                'ukuran'    => ['5x5 cm', '5x10 cm', 'A5 (14.8x21 cm)', 'A4 (21x29.7 cm)', 'Custom'],
                'bahan'     => ['Vinyl Glossy', 'Vinyl Matte', 'Chromo', 'Transparant', 'Hologram'],
                'harga_min' => 500,
                'harga_max' => 18000,
                'foto'      => 'https://picsum.photos/seed/stiker/800/600',
            ],

            // ── Nota & Kop Surat ───────────────────────────────────
            [
                'nama'      => 'Nota & Kop Surat',
                'slug'      => 'nota-kop-surat',
                'deskripsi' => 'Nota bon karbon rangkap dan kop surat profesional untuk operasional bisnis. Cetak cepat dengan hasil rapi dan tajam.',
                'icon'      => 'nota',
                'ukuran'    => ['1/3 Folio', 'A5', 'A4'],
                'bahan'     => ['HVS 70gr', 'Art Paper 100gr', 'Kertas NCR (Karbon)'],
                'harga_min' => 50000,
                'harga_max' => 500000,
                'foto'      => 'https://picsum.photos/seed/nota/800/600',
            ],

            // ── ID Card & Lanyard ──────────────────────────────────
            [
                'nama'      => 'Cetak ID Card & Lanyard',
                'slug'      => 'cetak-id-card-lanyard',
                'deskripsi' => 'ID card PVC full colour untuk karyawan, panitia event, dan anggota organisasi. Tersedia dengan laminasi dan lanyard custom.',
                'icon'      => 'idcard',
                'ukuran'    => ['85x54 mm (Standard CR80)'],
                'bahan'     => ['PVC 0.5 mm', 'PVC 0.76 mm', 'Art Carton 310gr'],
                'harga_min' => 3000,
                'harga_max' => 25000,
                'foto'      => 'https://picsum.photos/seed/idcard/800/600',
            ],
        ];

        foreach ($produks as $data) {
            Produk::create($data);
        }
    }
}
