<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // Truncate before reseeding to avoid duplicates
        Portfolio::truncate();

        $portfolios = [
            // ── Banner ──────────────────────────────────────────────
            [
                'judul'     => 'Banner Pameran UMKM Nasional',
                'deskripsi' => 'Banner flexi 150×300 cm full colour untuk booth pameran UMKM. Desain modern dengan palet warna merah-putih.',
                'foto'      => 'https://picsum.photos/seed/port-banner1/800/600',
                'kategori'  => 'Banner',
            ],
            [
                'judul'     => 'Spanduk Grand Opening Toko',
                'deskripsi' => 'Spanduk horizontal 5 meter untuk acara pembukaan toko baru. Laminasi UV tahan cuaca.',
                'foto'      => 'https://picsum.photos/seed/port-banner2/800/600',
                'kategori'  => 'Banner',
            ],
            [
                'judul'     => 'Backdrop Foto Wisuda Kampus',
                'deskripsi' => 'Backdrop banner 3×2 m untuk area foto wisuda. Cetak vivid colour dengan bahan kain oscar.',
                'foto'      => 'https://picsum.photos/seed/port-banner3/800/600',
                'kategori'  => 'Banner',
            ],

            // ── Sablon Kaos ─────────────────────────────────────────
            [
                'judul'     => 'Kaos Seragam Komunitas Pesepeda',
                'deskripsi' => 'Sablon kaos 200 pcs untuk komunitas gowes weekend. Tinta rubber anti-luntur, bahan cotton combed 30s.',
                'foto'      => 'https://picsum.photos/seed/port-kaos1/800/600',
                'kategori'  => 'Sablon Kaos',
            ],
            [
                'judul'     => 'Jersey Tim Futsal Antar RT',
                'deskripsi' => 'Sublimasi jersey futsal 22 pcs. Bahan dry-fit, warna full print kiri-kanan.',
                'foto'      => 'https://picsum.photos/seed/port-kaos2/800/600',
                'kategori'  => 'Sablon Kaos',
            ],

            // ── Undangan ────────────────────────────────────────────
            [
                'judul'     => 'Undangan Pernikahan Adat Jawa',
                'deskripsi' => 'Undangan eksklusif dengan finishing foil emas dan laminasi soft touch. Cetak 500 lembar.',
                'foto'      => 'https://picsum.photos/seed/port-undangan1/800/600',
                'kategori'  => 'Undangan',
            ],
            [
                'judul'     => 'Undangan Digital & Cetak Ulang Tahun',
                'deskripsi' => 'Paket undangan ulang tahun anak A5 dua sisi, kertas art carton 260 gsm.',
                'foto'      => 'https://picsum.photos/seed/port-undangan2/800/600',
                'kategori'  => 'Undangan',
            ],

            // ── Brosur ──────────────────────────────────────────────
            [
                'judul'     => 'Brosur Menu Cafe & Resto',
                'deskripsi' => 'Brosur menu restoran A5 dua sisi, laminasi glossy. Desain minimalis dan elegan.',
                'foto'      => 'https://picsum.photos/seed/port-brosur1/800/600',
                'kategori'  => 'Brosur',
            ],
            [
                'judul'     => 'Flyer Promosi Event Musik',
                'deskripsi' => 'Flyer A4 full colour untuk promosi konser band indie lokal. Cetak 1.000 lembar.',
                'foto'      => 'https://picsum.photos/seed/port-brosur2/800/600',
                'kategori'  => 'Brosur',
            ],

            // ── Stiker ──────────────────────────────────────────────
            [
                'judul'     => 'Stiker Label Produk UMKM',
                'deskripsi' => 'Stiker label produk makanan kemasan die-cut, waterproof vinyl. Cetak 2.000 pcs.',
                'foto'      => 'https://picsum.photos/seed/port-stiker1/800/600',
                'kategori'  => 'Stiker',
            ],
            [
                'judul'     => 'Stiker Cutting Kaca Showroom',
                'deskripsi' => 'Stiker sandblast kaca showroom mobil ukuran 120×60 cm. Bahan oracal premium.',
                'foto'      => 'https://picsum.photos/seed/port-stiker2/800/600',
                'kategori'  => 'Stiker',
            ],

            // ── Nota & Kop Surat ────────────────────────────────────
            [
                'judul'     => 'Nota Bon UMKM Warung Makan',
                'deskripsi' => 'Nota 1/3 folio karbon rangkap 2 warna. Cetak 500 buku, isi 50 lembar per buku.',
                'foto'      => 'https://picsum.photos/seed/port-nota1/800/600',
                'kategori'  => 'Nota & Kop',
            ],
        ];

        foreach ($portfolios as $data) {
            Portfolio::create($data);
        }
    }
}
