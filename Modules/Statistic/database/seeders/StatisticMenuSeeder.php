<?php

namespace Modules\Statistic\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Menu\Models\Menu;
use Modules\Menu\Models\MenuItem;

class StatisticMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Find the Main Menu (Top Nav)
        $menu = Menu::where('slug', 'top-nav')->first();

        if (!$menu) {
            $this->command->error('Top Nav menu not found. Please run Menu seeders first.');
            return;
        }

        // 2. Find 'Profil Desa' menu item to determine order
        $profilDesa = MenuItem::where('menu_id', $menu->id)
            ->where('slug', 'profil-desa')
            ->first();

        // Default order after Profil Desa (assuming Profil Desa is 1, so this becomes 2)
        // If Profil Desa doesn't exist, fallback to 1 (after Home) or max + 1
        $targetOrder = $profilDesa ? $profilDesa->sort_order + 1 : 2;

        // 3. Create or Update 'Statistik' Parent Item
        // using updateOrCreate to ensure we update the order if it exists
        $parent = MenuItem::updateOrCreate(
            [
                'menu_id' => $menu->id,
                'slug' => 'statistik',
            ],
            [
                'parent_id' => null,
                'name' => 'Statistik',
                'description' => 'Menu Dropdown Statistik',
                'type' => 'dropdown',
                'url' => '#',
                'sort_order' => $targetOrder,
                'depth' => 0,
                'icon' => 'fa-solid fa-chart-line',
                'css_classes' => 'nav-link dropdown-toggle',
                'is_active' => true,
                'is_visible' => true,
                'status' => 1,
            ]
        );

        $this->command->info('Updated "Statistik" parent menu item order to: ' . $targetOrder);

        // 4. Create Child Items
        $categories = [
            'Kependudukan',
            'Pendidikan',
            'Kesehatan',
            'Ekonomi',
            'Pekerjaan',
            'Perumahan',
        ];

        foreach ($categories as $index => $category) {
            $slug = \Illuminate\Support\Str::slug($category);
            
            MenuItem::create([
                'menu_id' => $menu->id,
                'parent_id' => $parent->id,
                'name' => 'Statistik ' . $category,
                'slug' => 'statistik-' . $slug,
                'description' => 'Halaman Statistik ' . $category,
                'type' => 'link',
                'url' => '/statistik/' . $slug, // Using manually constructed URL to ensure it matches route
                'sort_order' => $index,
                'depth' => 1,
                'path' => (string) $parent->id,
                'css_classes' => 'dropdown-item',
                'is_active' => true,
                'is_visible' => true,
                'status' => 1,
            ]);
        }

        $this->command->info('Created ' . count($categories) . ' child items for Statistik.');
    }
}
