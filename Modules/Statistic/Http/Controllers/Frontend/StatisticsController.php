<?php

namespace Modules\Statistic\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Modules\Statistic\Models\Statistic;

class StatisticsController extends Controller
{
    public $module_title;

    public $module_name;

    public $module_path;

    public $module_icon;

    public $module_model;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Statistics';

        // module name
        $this->module_name = 'statistik';

        // directory path of the module
        $this->module_path = 'statistic::frontend';

        // module icon
        $this->module_icon = 'fa-solid fa-chart-line';

        // module model name, path
        $this->module_model = "Modules\Statistic\Models\Statistic";
    }

    public function index(): View
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        // Get distinct categories to list as "Pages"
        $categories = Statistic::active()
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->get()
            ->pluck('category');

        return view('statistic::frontend.statistics.index', compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', 'categories'));
    }

    public function show(string $slug): View
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);
        $module_action = 'Detail';

        // Get sidebar categories
        $categories = Statistic::active()
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->get()
            ->pluck('category');

        // Check if slug matches a Category
        $statistics = Statistic::active()
            ->ordered()
            ->get()
            ->filter(function ($stat) use ($slug) {
                return Str::slug($stat->category) === $slug;
            });

        if ($statistics->isNotEmpty()) {
            // It is a Category Page
            $category_name = $statistics->first()->category;

            // Prepare chart data
            $chartData = [
                'labels' => $statistics->pluck('title')->toArray(),
                'series' => $statistics->pluck('value')->toArray(),
                'colors' => $statistics->pluck('color')->map(function($color) {
                        return $color ?? '#3B82F6';
                })->toArray(),
                'category_name' => $category_name
            ];

            return view('statistic::frontend.statistics.category', compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', 'statistics', 'chartData', 'categories'));
        }

        // If not a category, try finding a single statistic (fallback)
        $statistic = Statistic::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $statistics = Statistic::active()->ordered()->get(); // For compatibility if view needs it

        return view('statistic::frontend.statistics.show', compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', 'statistic', 'statistics', 'categories'));
    }
}
