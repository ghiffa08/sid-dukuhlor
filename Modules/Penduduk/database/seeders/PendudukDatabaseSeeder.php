<?php

namespace Modules\Penduduk\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Penduduk\Models\Penduduk;

class PendudukDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks!
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        /*
         * Penduduks Seed
         * ------------------
         */

        DB::table('penduduk')->truncate();
        echo "Truncate: penduduk \n";

        Penduduk::factory()->count(100)->create();
        $rows = Penduduk::all();
        echo " Insert: penduduk \n\n";

        // Enable foreign key checks!
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
