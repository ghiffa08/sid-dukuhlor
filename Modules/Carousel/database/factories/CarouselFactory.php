<?php

namespace Modules\Carousel\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Carousel\Models\Carousel;

class CarouselFactory extends Factory
{
    protected $model = Carousel::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'featured_image' => 'https://placehold.co/1920x800',
            'link' => fake()->optional()->url(),
            'order' => fake()->numberBetween(1, 10),
            'is_active' => true,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }
}
