<?php

namespace Modules\Statistic\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Statistic\Models\Statistic;

class StatisticDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // SQLite compatible approach
        if (DB::getDriverName() === 'sqlite') {
            DB::statement('PRAGMA foreign_keys=OFF;');
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        Statistic::query()->truncate();

        if (DB::getDriverName() === 'sqlite') {
            DB::statement('PRAGMA foreign_keys=ON;');
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        $this->call(StatisticMenuSeeder::class);

        $statistics = [
            [
                'title' => 'Total Penduduk',
                'slug' => 'total-penduduk',
                'category' => 'Kependudukan',
                'value' => 5420,
                'unit' => 'Jiwa',
                'icon' => 'fa-users',
                'color' => 'blue',
                'description' => 'Jumlah total penduduk Desa Dukuhlor',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Jumlah Kepala Keluarga',
                'slug' => 'jumlah-kk',
                'category' => 'Kependudukan',
                'value' => 1680,
                'unit' => 'KK',
                'icon' => 'fa-home',
                'color' => 'green',
                'description' => 'Total kepala keluarga di Desa Dukuhlor',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Laki-laki',
                'slug' => 'penduduk-laki-laki',
                'category' => 'Kependudukan',
                'value' => 2710,
                'unit' => 'Jiwa',
                'icon' => 'fa-male',
                'color' => 'indigo',
                'description' => 'Jumlah penduduk laki-laki',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Perempuan',
                'slug' => 'penduduk-perempuan',
                'category' => 'Kependudukan',
                'value' => 2710,
                'unit' => 'Jiwa',
                'icon' => 'fa-female',
                'color' => 'pink',
                'description' => 'Jumlah penduduk perempuan',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Lulusan SD/Sederajat',
                'slug' => 'lulusan-sd',
                'category' => 'Pendidikan',
                'value' => 1200,
                'unit' => 'Orang',
                'icon' => 'fa-graduation-cap',
                'color' => 'yellow',
                'description' => 'Penduduk dengan pendidikan SD/Sederajat',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Lulusan SMP/Sederajat',
                'slug' => 'lulusan-smp',
                'category' => 'Pendidikan',
                'value' => 950,
                'unit' => 'Orang',
                'icon' => 'fa-graduation-cap',
                'color' => 'yellow',
                'description' => 'Penduduk dengan pendidikan SMP/Sederajat',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'title' => 'Lulusan SMA/Sederajat',
                'slug' => 'lulusan-sma',
                'category' => 'Pendidikan',
                'value' => 780,
                'unit' => 'Orang',
                'icon' => 'fa-graduation-cap',
                'color' => 'yellow',
                'description' => 'Penduduk dengan pendidikan SMA/Sederajat',
                'order' => 7,
                'is_active' => true,
            ],
            [
                'title' => 'Lulusan Diploma/Sarjana',
                'slug' => 'lulusan-diploma-sarjana',
                'category' => 'Pendidikan',
                'value' => 340,
                'unit' => 'Orang',
                'icon' => 'fa-graduation-cap',
                'color' => 'yellow',
                'description' => 'Penduduk dengan pendidikan Diploma/Sarjana',
                'order' => 8,
                'is_active' => true,
            ],
            [
                'title' => 'Petani',
                'slug' => 'pekerjaan-petani',
                'category' => 'Pekerjaan',
                'value' => 1850,
                'unit' => 'Orang',
                'icon' => 'fa-tractor',
                'color' => 'green',
                'description' => 'Penduduk yang bekerja sebagai petani',
                'order' => 9,
                'is_active' => true,
            ],
            [
                'title' => 'Wiraswasta',
                'slug' => 'pekerjaan-wiraswasta',
                'category' => 'Pekerjaan',
                'value' => 620,
                'unit' => 'Orang',
                'icon' => 'fa-briefcase',
                'color' => 'purple',
                'description' => 'Penduduk yang bekerja sebagai wiraswasta',
                'order' => 10,
                'is_active' => true,
            ],
            [
                'title' => 'PNS/TNI/Polri',
                'slug' => 'pekerjaan-pns',
                'category' => 'Pekerjaan',
                'value' => 156,
                'unit' => 'Orang',
                'icon' => 'fa-user-tie',
                'color' => 'blue',
                'description' => 'Penduduk yang bekerja sebagai PNS/TNI/Polri',
                'order' => 11,
                'is_active' => true,
            ],
            [
                'title' => 'Rumah Permanen',
                'slug' => 'rumah-permanen',
                'category' => 'Perumahan',
                'value' => 1250,
                'unit' => 'Unit',
                'icon' => 'fa-building',
                'color' => 'gray',
                'description' => 'Jumlah rumah dengan konstruksi permanen',
                'order' => 12,
                'is_active' => true,
            ],
            [
                'title' => 'Rumah Semi Permanen',
                'slug' => 'rumah-semi-permanen',
                'category' => 'Perumahan',
                'value' => 380,
                'unit' => 'Unit',
                'icon' => 'fa-home',
                'color' => 'gray',
                'description' => 'Jumlah rumah dengan konstruksi semi permanen',
                'order' => 13,
                'is_active' => true,
            ],
            [
                'title' => 'Penerima PKH',
                'slug' => 'penerima-pkh',
                'category' => 'Bantuan Sosial',
                'value' => 285,
                'unit' => 'KK',
                'icon' => 'fa-hand-holding-heart',
                'color' => 'red',
                'description' => 'Keluarga penerima Program Keluarga Harapan',
                'order' => 14,
                'is_active' => true,
            ],
            [
                'title' => 'Penerima BLT',
                'slug' => 'penerima-blt',
                'category' => 'Bantuan Sosial',
                'value' => 420,
                'unit' => 'KK',
                'icon' => 'fa-coins',
                'color' => 'red',
                'description' => 'Keluarga penerima Bantuan Langsung Tunai',
                'order' => 15,
                'is_active' => true,
            ],
        ];

        foreach ($statistics as $statistic) {
            Statistic::query()->create($statistic);
        }

        if (! app()->runningUnitTests()) {
            $this->command->info('Statistics seeded successfully!');
        }
    }
}
