<?php

namespace Modules\Transparansi\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Transparansi\Models\TransparansiBudget;

class TransparansiDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable Foreign Key Checks
        if (DB::getDriverName() === 'sqlite') {
            DB::statement('PRAGMA foreign_keys=OFF;');
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        TransparansiBudget::truncate();

        if (DB::getDriverName() === 'sqlite') {
            DB::statement('PRAGMA foreign_keys=ON;');
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        $this->call(TransparansiMenuSeeder::class);

        $budgets = [
            // --- 2025 (Estimasi) ---
            // PENDAPATAN
            [
                'year' => 2025,
                'type' => 'PENDAPATAN',
                'category' => 'Pendapatan Asli Desa',
                'title' => 'Hasil Usaha Desa',
                'slug' => '2025-hasil-usaha-desa',
                'budget' => 50000000,
                'realization' => 0,
                'description' => 'Pendapatan dari BUMDes',
            ],
            [
                'year' => 2025,
                'type' => 'PENDAPATAN',
                'category' => 'Pendapatan Transfer',
                'title' => 'Dana Desa',
                'slug' => '2025-dana-desa',
                'budget' => 850000000,
                'realization' => 0,
                'description' => 'Dana Desa dari APBN',
            ],
             [
                'year' => 2025,
                'type' => 'PENDAPATAN',
                'category' => 'Pendapatan Transfer',
                'title' => 'Alokasi Dana Desa (ADD)',
                'slug' => '2025-add',
                'budget' => 350000000,
                'realization' => 0,
                'description' => 'Alokasi Dana Desa dari APBD Kabupaten',
            ],
            // BELANJA
            [
                'year' => 2025,
                'type' => 'BELANJA',
                'category' => 'Bidang Penyelenggaraan Pemerintahan Desa',
                'title' => 'Penyediaan Penghasilan Tetap dan Tunjangan Perangkat Desa',
                'slug' => '2025-siltap',
                'budget' => 300000000,
                'realization' => 0,
                'description' => 'Gaji dan Tunjangan',
            ],
            [
                'year' => 2025,
                'type' => 'BELANJA',
                'category' => 'Bidang Pelaksanaan Pembangunan Desa',
                'title' => 'Pembangunan/Rehabilitasi/Peningkatan Jalan Desa',
                'slug' => '2025-jalan-desa',
                'budget' => 450000000,
                'realization' => 0,
                'description' => 'Pavingisasi Jalan Lingkungan',
            ],
            // PEMBIAYAAN
            [
                'year' => 2025,
                'type' => 'PEMBIAYAAN',
                'category' => 'Penerimaan Pembiayaan',
                'title' => 'Sisa Lebih Perhitungan Anggaran (SiLPA) Tahun Sebelumnya',
                'slug' => '2025-silpa',
                'budget' => 25000000,
                'realization' => 0,
                'description' => 'SiLPA tahun 2024',
            ],

             // --- 2024 (Realisasi Ada) ---
            [
                'year' => 2024,
                'type' => 'PENDAPATAN',
                'category' => 'Pendapatan Asli Desa',
                'title' => 'Hasil Usaha Desa',
                'slug' => '2024-hasil-usaha-desa',
                'budget' => 40000000,
                'realization' => 45000000,
                'description' => 'Target tercapai',
            ],
            [
                'year' => 2024,
                'type' => 'BELANJA',
                'category' => 'Bidang Pelaksanaan Pembangunan Desa',
                'title' => 'Pembangunan Jembatan',
                'slug' => '2024-jembatan',
                'budget' => 200000000,
                'realization' => 195000000,
                'description' => 'Jembatan penghubung dusun',
            ],
        ];

        foreach ($budgets as $index => $data) {
             // Add required defaults
             $data['order'] = $index + 1;
             $data['is_active'] = true;
             
             TransparansiBudget::create($data);
        }
        
        if (! app()->runningUnitTests()) {
            $this->command->info('Transparansi Budgets seeded successfully!');
        }
    }
}
