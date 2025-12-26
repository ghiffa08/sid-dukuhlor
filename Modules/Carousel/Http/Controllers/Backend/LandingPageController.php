<?php

namespace Modules\Carousel\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LandingPageController extends BackendBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->module_title = 'Landing Page Settings';
        $this->module_name = 'landing_page';
        $this->module_path = 'carousel::backend';
        $this->module_icon = 'fa-solid fa-pager';
    }

    public function index(): View
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;

        // Fetch existing settings
        $settings = DB::table('settings')->pluck('val', 'name')->toArray();

        return view("{$module_path}.landing_page.index", compact(
            'module_title',
            'module_name',
            'module_path',
            'module_icon',
            'settings'
        ));
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        // Handle file uploads if any
        if ($request->hasFile('landing_welcome_image')) {
            $path = $request->file('landing_welcome_image')->store('landing-page', 'public');
            $data['landing_welcome_image'] = '/storage/'.$path;
        }

        foreach ($data as $key => $value) {
            DB::table('settings')->updateOrInsert(
                ['name' => $key],
                ['val' => $value]
            );
        }

        flash('Landing Page Settings Updated')->success()->important();

        return redirect()->back();
    }
}
