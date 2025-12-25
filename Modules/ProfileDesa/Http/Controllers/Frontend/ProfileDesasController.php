<?php

namespace Modules\ProfileDesa\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Modules\ProfileDesa\Models\ProfileDesa;

class ProfileDesasController extends Controller
{
    public $module_title;

    public $module_name;

    public $module_path;

    public $module_icon;

    public $module_model;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Profile Desa';

        // module name
        $this->module_name = 'profiledesas';

        // directory path of the module
        $this->module_path = 'profiledesa::frontend';

        // module icon
        $this->module_icon = 'fa-solid fa-building-columns';

        // module model name, path
        $this->module_model = "Modules\ProfileDesa\Models\ProfileDesa";
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

        $$module_name = ProfileDesa::active()
            ->ordered()
            ->paginate(12);

        return view('profiledesa::frontend.profiledesas.index', compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', $module_name));
    }

    public function show(string $slug): View
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Show';

        $profilePage = ProfileDesa::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $profilePages = ProfileDesa::active()
            ->ordered()
            ->get();

        return view('profiledesa::frontend.profiledesas.show', compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', 'profilePage', 'profilePages'));
    }
}
