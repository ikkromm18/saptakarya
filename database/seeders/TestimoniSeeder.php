<?php

namespace Database\Seeders;

use App\Models\Testimoni;
use Illuminate\Database\Seeder;

class TestimoniSeeder extends Seeder
{
    public function run(): void
    {
        $testimonis = [
            [
                'nama'     => 'Budi Santoso',
                'instansi' => 'Toko Maju Jaya',
                'komentar' => 'Kualitas cetaknya luar biasa! Banner yang saya pesan sangat tajam warnanya dan tidak mudah kusut. Pengerjaan juga tepat waktu sesuai janji. Pasti akan order lagi!',
                'rating'   => 5,
            ],
            [
                'nama'     => 'Siti Rahayu',
                'instansi' => 'Sekolah Tunas Bangsa',
                'komentar' => 'Sudah 3x pesan kaos seragam di Saptakarya. Hasilnya selalu memuaskan, sablonan awet dan tidak mudah pecah meski sudah banyak dicuci. Harganya juga terjangkau!',
                'rating'   => 5,
            ],
            [
                'nama'     => 'Ahmad Fauzan',
                'instansi' => null,
                'komentar' => 'Desain undangan pernikahan saya dibantu dari awal hingga selesai. Hasilnya cantik sekali! Banyak tamu yang memuji undangannya. Terima kasih Saptakarya!',
                'rating'   => 5,
            ],
            [
                'nama'     => 'Dewi Kartika',
                'instansi' => 'CV. Berkah Mandiri',
                'komentar' => 'Proses order mudah, pelayanannya ramah dan responsif. Brosur perusahaan kami tercetak dengan warna yang sangat presisi. Recommended banget!',
                'rating'   => 5,
            ],
            [
                'nama'     => 'Rizky Pratama',
                'instansi' => 'Komunitas Gowes Nusantara',
                'komentar' => 'Pesan 150 kaos untuk komunitas kami. Harga bersaing, kualitas tidak mengecewakan. Sablonan detail dan warnanya cerah. Kerjanya juga cepat, 3 hari sudah jadi!',
                'rating'   => 4,
            ],
        ];

        foreach ($testimonis as $testimoni) {
            Testimoni::create($testimoni);
        }
    }
}
