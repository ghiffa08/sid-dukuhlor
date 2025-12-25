<?php

namespace Modules\ProfileDesa\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\ProfileDesa\Models\ProfileDesa;

class ProfileDesaDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('PRAGMA foreign_keys=OFF;');
        ProfileDesa::truncate();
        DB::statement('PRAGMA foreign_keys=ON;');

        $profilePages = [
            [
                'title' => 'Sejarah Singkat',
                'slug' => 'sejarah-singkat',
                'content' => '<p>Desa Dukuhlor merupakan salah satu desa yang berada di Kecamatan Kuningan, Kabupaten Kuningan, Provinsi Jawa Barat. Desa Dukuhlor memiliki sejarah panjang yang mencerminkan perkembangan masyarakat dan budaya setempat.</p>
                <p>Nama "Dukuhlor" sendiri berasal dari bahasa Sunda yang memiliki makna historis bagi masyarakat setempat. Desa ini telah mengalami berbagai fase perkembangan, dari masa penjajahan hingga era kemerdekaan Indonesia.</p>
                <p>Sejak berdirinya, Desa Dukuhlor telah dipimpin oleh beberapa kepala desa yang berdedikasi dalam memajukan kesejahteraan masyarakat. Pembangunan infrastruktur, peningkatan pendidikan, dan pengembangan ekonomi masyarakat menjadi fokus utama dalam setiap periode kepemimpinan.</p>
                <p>Masyarakat Desa Dukuhlor dikenal ramah dan memiliki semangat gotong royong yang tinggi. Tradisi dan budaya lokal masih terjaga dengan baik hingga saat ini.</p>',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Visi dan Misi',
                'slug' => 'visi-dan-misi',
                'content' => '<h3>Visi</h3>
                <p>Terwujudnya Desa Dukuhlor yang Maju, Mandiri, Religius, dan Sejahtera berbasis pada Potensi Lokal dengan Menjunjung Tinggi Nilai-nilai Kearifan Budaya Sunda.</p>
                
                <h3>Misi</h3>
                <ol>
                    <li>Meningkatkan kualitas pelayanan publik yang cepat, mudah, transparan, dan akuntabel</li>
                    <li>Mengembangkan potensi ekonomi lokal berbasis pertanian, peternakan, dan UMKM</li>
                    <li>Meningkatkan kualitas infrastruktur desa untuk mendukung aksesibilitas dan konektivitas</li>
                    <li>Memberdayakan masyarakat melalui pendidikan, pelatihan keterampilan, dan pengembangan SDM</li>
                    <li>Melestarikan dan mengembangkan nilai-nilai budaya Sunda dan kearifan lokal</li>
                    <li>Meningkatkan partisipasi aktif masyarakat dalam pembangunan desa</li>
                    <li>Membangun tata kelola pemerintahan desa yang baik (good governance)</li>
                    <li>Meningkatkan kehidupan beragama dan kerukunan umat beragama</li>
                </ol>',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Struktur Pemerintahan Desa',
                'slug' => 'struktur-pemerintahan',
                'content' => '<h3>Struktur Organisasi Pemerintahan Desa Dukuhlor</h3>
                <p>Pemerintahan Desa Dukuhlor dipimpin oleh Kepala Desa yang dibantu oleh perangkat desa dalam menjalankan tugas pemerintahan, pembangunan, dan pembinaan kemasyarakatan.</p>
                
                <h4>Perangkat Desa:</h4>
                <ul>
                    <li><strong>Kepala Desa</strong>: [Nama Kepala Desa]</li>
                    <li><strong>Sekretaris Desa</strong>: [Nama Sekretaris Desa]</li>
                </ul>

                <h4>Kepala Urusan (Kaur):</h4>
                <ul>
                    <li><strong>Kaur Tata Usaha dan Umum</strong>: [Nama]</li>
                    <li><strong>Kaur Keuangan</strong>: [Nama]</li>
                    <li><strong>Kaur Perencanaan</strong>: [Nama]</li>
                </ul>

                <h4>Kepala Seksi (Kasi):</h4>
                <ul>
                    <li><strong>Kasi Pemerintahan</strong>: [Nama]</li>
                    <li><strong>Kasi Kesejahteraan</strong>: [Nama]</li>
                    <li><strong>Kasi Pelayanan</strong>: [Nama]</li>
                </ul>

                <h4>Kepala Dusun:</h4>
                <ul>
                    <li><strong>Kadus I</strong>: [Nama]</li>
                    <li><strong>Kadus II</strong>: [Nama]</li>
                    <li><strong>Kadus III</strong>: [Nama]</li>
                </ul>',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Profil Desa',
                'slug' => 'profil-desa',
                'content' => '<h3>Profil Desa Dukuhlor</h3>
                
                <h4>Data Umum</h4>
                <ul>
                    <li><strong>Nama Desa</strong>: Dukuhlor</li>
                    <li><strong>Kecamatan</strong>: Kuningan</li>
                    <li><strong>Kabupaten</strong>: Kuningan</li>
                    <li><strong>Provinsi</strong>: Jawa Barat</li>
                    <li><strong>Kode Pos</strong>: 45511</li>
                    <li><strong>Luas Wilayah</strong>: ± [Luas] Ha</li>
                    <li><strong>Jumlah Penduduk</strong>: ± [Jumlah] Jiwa</li>
                    <li><strong>Jumlah Kepala Keluarga</strong>: ± [Jumlah] KK</li>
                    <li><strong>Jumlah Dusun</strong>: 3 Dusun</li>
                    <li><strong>Jumlah RW</strong>: [Jumlah] RW</li>
                    <li><strong>Jumlah RT</strong>: [Jumlah] RT</li>
                </ul>
                
                <h4>Batas Wilayah</h4>
                <ul>
                    <li><strong>Sebelah Utara</strong>: [Nama Desa/Wilayah]</li>
                    <li><strong>Sebelah Selatan</strong>: [Nama Desa/Wilayah]</li>
                    <li><strong>Sebelah Barat</strong>: [Nama Desa/Wilayah]</li>
                    <li><strong>Sebelah Timur</strong>: [Nama Desa/Wilayah]</li>
                </ul>

                <h4>Kondisi Geografis</h4>
                <p>Desa Dukuhlor terletak di wilayah Kabupaten Kuningan dengan kondisi geografis yang mendukung kegiatan pertanian dan peternakan. Topografi wilayah relatif datar hingga bergelombang dengan ketinggian sekitar [ketinggian] meter di atas permukaan laut.</p>

                <h4>Potensi Desa</h4>
                <ul>
                    <li><strong>Pertanian</strong>: Padi, palawija, dan hortikultura</li>
                    <li><strong>Peternakan</strong>: Sapi, kambing, unggas</li>
                    <li><strong>UMKM</strong>: Kerajinan, kuliner, dan usaha jasa</li>
                    <li><strong>Pariwisata</strong>: Potensi wisata alam dan budaya</li>
                </ul>',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Peta Wilayah',
                'slug' => 'peta-wilayah',
                'content' => '<h3>Peta Wilayah Desa Dukuhlor</h3>
                <p>Peta wilayah Desa Dukuhlor menunjukkan letak geografis dan batas-batas administratif desa yang berada di Kecamatan Kuningan, Kabupaten Kuningan, Jawa Barat.</p>
                <p><em>Peta akan ditampilkan di sini</em></p>
                
                <h4>Koordinat Geografis</h4>
                <ul>
                    <li><strong>Lintang</strong>: [Koordinat Lintang]</li>
                    <li><strong>Bujur</strong>: [Koordinat Bujur]</li>
                </ul>',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Sarana dan Prasarana',
                'slug' => 'sarana-prasarana',
                'content' => '<h3>Sarana dan Prasarana Desa Dukuhlor</h3>
                
                <h4>Pendidikan</h4>
                <ul>
                    <li>TK/PAUD: [Jumlah] unit</li>
                    <li>SD/MI: [Jumlah] unit</li>
                    <li>SMP/MTs: [Jumlah] unit</li>
                </ul>

                <h4>Kesehatan</h4>
                <ul>
                    <li>Puskesmas/Pustu: [Jumlah] unit</li>
                    <li>Posyandu: [Jumlah] unit</li>
                    <li>Polindes: [Jumlah] unit</li>
                </ul>

                <h4>Peribadatan</h4>
                <ul>
                    <li>Masjid: [Jumlah] unit</li>
                    <li>Mushola: [Jumlah] unit</li>
                </ul>

                <h4>Infrastruktur</h4>
                <ul>
                    <li>Kantor Desa: 1 unit</li>
                    <li>Balai Desa: 1 unit</li>
                    <li>Jalan Desa: [Panjang] km</li>
                    <li>Jembatan: [Jumlah] unit</li>
                </ul>',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($profilePages as $page) {
            ProfileDesa::create($page);
        }

        if (! app()->runningUnitTests()) {
            $this->command->info('Profile Desa Dukuhlor pages seeded successfully');
        }
    }
}
