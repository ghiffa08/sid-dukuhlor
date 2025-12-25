<?php

namespace Modules\Carousel\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Carousel\Models\Carousel;

class CarouselDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Handle foreign key constraints based on database driver
        $driver = DB::getDriverName();

        if ($driver === 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        } elseif ($driver === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = OFF;');
        }

        Carousel::truncate();

        if ($driver === 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        } elseif ($driver === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = ON;');
        }

        $carousels = [
            [
                'title' => 'Welcome to '.config('app.name'),
                'description' => 'Providing excellent public services',
                'featured_image' => 'https://placehold.co/1920x800/0066cc/ffffff?text=Welcome',
                'link' => null,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Our Services',
                'description' => 'Building a better future together',
                'featured_image' => 'https://placehold.co/1920x800/00aa66/ffffff?text=Services',
                'link' => null,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Community',
                'description' => 'Join our growing community',
                'featured_image' => 'https://placehold.co/1920x800/cc6600/ffffff?text=Community',
                'link' => null,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Innovation',
                'description' => 'Embracing digital transformation',
                'featured_image' => 'https://placehold.co/1920x800/9900cc/ffffff?text=Innovation',
                'link' => null,
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($carousels as $carousel) {
            Carousel::create($carousel);
        }

        $this->command->info('Carousel seeded successfully!');
    }
}
