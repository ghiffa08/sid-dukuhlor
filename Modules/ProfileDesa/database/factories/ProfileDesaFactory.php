<?php

namespace Modules\ProfileDesa\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\ProfileDesa\Models\ProfileDesa;

class ProfileDesaFactory extends Factory
{
    protected $model = ProfileDesa::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'slug' => $this->faker->unique()->slug(),
            'content' => $this->faker->paragraphs(5, true),
            'featured_image' => null,
            'order' => $this->faker->numberBetween(0, 100),
            'is_active' => true,
            'meta_title' => $this->faker->sentence(),
            'meta_description' => $this->faker->sentence(10),
            'meta_keywords' => implode(', ', $this->faker->words(5)),
        ];
    }
}
