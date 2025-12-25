<?php

namespace Modules\Penduduk\database\factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PendudukFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Penduduk\Models\Penduduk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nik' => $this->faker->numerify('35#############'), // Example NIK format
            'nama_lengkap' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->dateTimeBetween('-70 years', '-1 years')->format('Y-m-d'),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']),
            'pendidikan_kk' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'Tidak Sekolah']),
            'pendidikan_sedang' => $this->faker->randomElement(['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'Perguruan Tinggi']),
            'pekerjaan' => $this->faker->randomElement(['Petani', 'Buruh Tani', 'PNS', 'Wiraswasta', 'Pelajar', 'Ibu Rumah Tangga', 'TNI/POLRI', 'Pedagang']),
            'status_kawin' => $this->faker->randomElement(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']),
            'status_penduduk' => 'Tetap',
            'alamat' => $this->faker->address,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
