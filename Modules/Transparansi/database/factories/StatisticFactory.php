<?php

namespace Modules\Statistic\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Statistic\Models\Statistic;

class StatisticFactory extends Factory
{
    protected $model = Statistic::class;

    public function definition(): array
    {
        $categories = ['Kependudukan', 'Pendidikan', 'Kesehatan', 'Ekonomi'];

        return [
            'title' => $this->faker->sentence(3),
            'slug' => $this->faker->unique()->slug(),
            'category' => $this->faker->randomElement($categories),
            'value' => $this->faker->numberBetween(10, 10000),
            'unit' => $this->faker->randomElement(['Orang', 'Jiwa', 'KK', 'Unit', '%']),
            'icon' => $this->faker->randomElement(['fa-users', 'fa-chart-bar', 'fa-home']),
            'color' => $this->faker->randomElement(['blue', 'green', 'red', 'yellow']),
            'description' => $this->faker->sentence(),
            'order' => $this->faker->numberBetween(0, 100),
            'is_active' => true,
        ];
    }
}
