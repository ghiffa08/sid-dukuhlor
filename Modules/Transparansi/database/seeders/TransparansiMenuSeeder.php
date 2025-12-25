<?php

namespace Modules\Transparansi\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Menu\Models\Menu;
use Modules\Menu\Models\MenuItem;

class TransparansiMenuSeeder extends Seeder
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

        // 2. Find 'Statistik' menu item to determine order
        $statistik = MenuItem::where('menu_id', $menu->id)
            ->where('slug', 'statistik')
            ->first();

        // Order after Statistik, or fallback to max + 1
        $targetOrder = $statistik ? $statistik->sort_order + 1 : 3;

        // 3. Create or Update 'Transparansi' Parent Item
        $parent = MenuItem::updateOrCreate(
            [
                'menu_id' => $menu->id,
                'slug' => 'transparansi',
            ],
            [
                'parent_id' => null,
                'name' => 'Transparansi',
                'description' => 'Menu Dropdown Transparansi Anggaran',
                'type' => 'dropdown',
                'url' => '#',
                'sort_order' => $targetOrder,
                'depth' => 0,
                'icon' => 'fa-solid fa-file-invoice-dollar',
                'css_classes' => 'nav-link dropdown-toggle',
                'is_active' => true,
                'is_visible' => true,
                'status' => 1,
            ]
        );

        $this->command->info('Updated "Transparansi" parent menu item order to: ' . $targetOrder);

        // 4. Create Child Items (Years)
        // We will seed 2025 and 2024 for now as per reference
        $years = [2025, 2024];

        foreach ($years as $index => $year) {
            $slug = 'apbdes-' . $year;
            
            MenuItem::create([
                'menu_id' => $menu->id,
                'parent_id' => $parent->id,
                'name' => 'APBDes ' . $year,
                'slug' => 'transparansi-' . $slug,
                'description' => 'Laporan APBDes Tahun ' . $year,
                'type' => 'link',
                'url' => '/transparansi/' . $slug, 
                'sort_order' => $index,
                'depth' => 1,
                'path' => (string) $parent->id,
                'css_classes' => 'dropdown-item',
                'is_active' => true,
                'is_visible' => true,
                'status' => 1,
            ]);
        }

        $this->command->info('Created child items for Transparansi (Years).');
    }
}
