<?php

namespace Modules\Carousel\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Modules\Carousel\Models\Carousel;

class CarouselsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        parent::__construct();

        $this->module_title = 'Carousels';
        $this->module_name = 'carousels';
        $this->module_path = 'carousel::backend';
        $this->module_icon = 'fa-solid fa-images';
        $this->module_model = Carousel::class;
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

        $$module_name = $module_model::ordered()->paginate();

        return view("{$module_path}.{$module_name}.index", compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', $module_name));
    }

    public function create(): View
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Create';

        return view("{$module_path}.{$module_name}.create", compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular'));
    }

    public function store(Request $request): RedirectResponse
    {
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $validated = $request->validate([
            'title' => 'required|string|max:191',
            'description' => 'nullable|string',
            'featured_image' => 'nullable|string',
            'link' => 'nullable|url|max:191',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $$module_name_singular = $module_model::create($validated);

        flash('New Carousel Added')->success()->important();

        return redirect()->route("backend.{$module_name}.show", $$module_name_singular->id);
    }

    public function show($id): View
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Show';

        $$module_name_singular = $module_model::findOrFail($id);

        return view("{$module_path}.{$module_name}.show", compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', $module_name_singular));
    }

    public function edit($id): View
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Edit';

        $$module_name_singular = $module_model::findOrFail($id);

        return view("{$module_path}.{$module_name}.edit", compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', $module_name_singular));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $$module_name_singular = $module_model::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:191',
            'description' => 'nullable|string',
            'featured_image' => 'nullable|string',
            'link' => 'nullable|url|max:191',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $$module_name_singular->update($validated);

        flash('Carousel Updated Successfully')->success()->important();

        return redirect()->route("backend.{$module_name}.show", $$module_name_singular->id);
    }

    public function destroy($id): RedirectResponse
    {
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $$module_name_singular = $module_model::findOrFail($id);

        $$module_name_singular->delete();

        flash('Carousel Deleted Successfully')->success()->important();

        return redirect()->route("backend.{$module_name}.index");
    }
}
