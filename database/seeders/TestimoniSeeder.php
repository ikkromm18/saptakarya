<?php

namespace Database\Seeders;

use App\Models\Testimoni;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TestimoniSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Testimoni::truncate();
        Schema::enableForeignKeyConstraints();

        $testimonis = [
            // ── Status: displayed (akan muncul di homepage) ─────────────
            [
                'user_id'  => null,
                'nama'     => 'Budi Santoso',
                'instansi' => 'Toko Maju Jaya',
                'komentar' => 'Kualitas cetaknya luar biasa! Banner yang saya pesan sangat tajam warnanya dan tidak mudah kusut. Pengerjaan juga tepat waktu sesuai janji. Pasti akan order lagi!',
                'rating'   => 5,
                'status'   => 'displayed',
            ],
            [
                'user_id'  => null,
                'nama'     => 'Siti Rahayu',
                'instansi' => 'Sekolah Tunas Bangsa',
                'komentar' => 'Sudah 3x pesan kaos seragam di Saptakarya. Hasilnya selalu memuaskan, sablonan awet dan tidak mudah pecah meski sudah banyak dicuci. Harganya juga terjangkau!',
                'rating'   => 5,
                'status'   => 'displayed',
            ],
            [
                'user_id'  => null,
                'nama'     => 'Ahmad Fauzan',
                'instansi' => null,
                'komentar' => 'Desain undangan pernikahan saya dibantu dari awal hingga selesai. Hasilnya cantik sekali! Banyak tamu yang memuji undangannya. Terima kasih Saptakarya!',
                'rating'   => 5,
                'status'   => 'displayed',
            ],
            [
                'user_id'  => null,
                'nama'     => 'Dewi Kartika',
                'instansi' => 'CV. Berkah Mandiri',
                'komentar' => 'Proses order mudah, pelayanannya ramah dan responsif. Brosur perusahaan kami tercetak dengan warna yang sangat presisi. Recommended banget!',
                'rating'   => 5,
                'status'   => 'displayed',
            ],
            [
                'user_id'  => null,
                'nama'     => 'Rizky Pratama',
                'instansi' => 'Komunitas Gowes Nusantara',
                'komentar' => 'Pesan 150 kaos untuk komunitas kami. Harga bersaing, kualitas tidak mengecewakan. Sablonan detail dan warnanya cerah. Kerjanya juga cepat, 3 hari sudah jadi!',
                'rating'   => 4,
                'status'   => 'displayed',
            ],

            // ── Status: pending (menunggu persetujuan admin) ────────────
            [
                'user_id'  => null,
                'nama'     => 'Hendra Wijaya',
                'instansi' => 'PT. Maju Bersama',
                'komentar' => 'Spanduk untuk grand opening toko kami hasilnya bagus sekali. Warna cerah dan bahan tebal. Akan order lagi untuk acara berikutnya.',
                'rating'   => 5,
                'status'   => 'pending',
            ],
            [
                'user_id'  => null,
                'nama'     => 'Rina Susanti',
                'instansi' => null,
                'komentar' => 'Stiker produk usaha UMKM saya tercetak rapi, warna sesuai desain. Pengerjaan cepat dan harga ramah di kantong. Nanti akan pesan lagi!',
                'rating'   => 4,
                'status'   => 'pending',
            ],
        ];

        foreach ($testimonis as $testimoni) {
            Testimoni::create($testimoni);
        }
    }
}
