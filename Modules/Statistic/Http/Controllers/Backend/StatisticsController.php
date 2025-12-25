<?php

namespace Modules\Statistic\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Modules\Statistic\Models\Statistic;

class StatisticsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Statistics';

        // module name
        $this->module_name = 'statistics';

        // directory path of the module
        $this->module_path = 'statistic::backend';

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
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:statistics,slug',
            'category' => 'required|string',
            'value' => 'required|integer',
            'unit' => 'nullable|string|max:50',
            'icon' => 'nullable|string|max:100',
            'color' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
            'featured_image' => 'nullable|string',
            'meta_title' => 'nullable|string|max:191',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['slug'] = Str::slug($validated['slug']);

        $$module_name_singular = $module_model::create($validated);

        flash()->success("<i class='fa-solid fa-check'></i> New '" . Str::singular($this->module_title) . "' Added")->important();

        return redirect()->route("backend.{$module_name}.show", $$module_name_singular->id);
    }

    public function show($id)
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

    public function edit($id)
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

    public function update(Request $request, $id)
    {
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $$module_name_singular = $module_model::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:statistics,slug,' . $id,
            'category' => 'required|string',
            'value' => 'required|integer',
            'unit' => 'nullable|string|max:50',
            'icon' => 'nullable|string|max:100',
            'color' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
            'featured_image' => 'nullable|string',
            'meta_title' => 'nullable|string|max:191',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['slug'] = Str::slug($validated['slug']);

        $$module_name_singular->update($validated);

        flash()->success("<i class='fa-solid fa-check'></i> '" . Str::singular($this->module_title) . "' Updated Successfully")->important();

        return redirect()->route("backend.{$module_name}.show", $$module_name_singular->id);
    }

    public function destroy($id)
    {
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $$module_name_singular = $module_model::findOrFail($id);
        $$module_name_singular->delete();

        flash()->success("<i class='fa-solid fa-check'></i> '" . Str::singular($this->module_title) . "' Deleted Successfully")->important();

        return redirect()->route("backend.{$module_name}.index");
    }

    public function trashed(): View
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Trash List';

        $$module_name = $module_model::onlyTrashed()->ordered()->paginate();

        return view("{$module_path}.{$module_name}.trash", compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', $module_name));
    }

    public function restore($id)
    {
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $$module_name_singular = $module_model::onlyTrashed()->findOrFail($id);
        $$module_name_singular->restore();

        flash()->success("<i class='fa-solid fa-check'></i> '" . Str::singular($this->module_title) . "' Restored Successfully")->important();

        return redirect()->route("backend.{$module_name}.index");
    }

    protected function getCategories(): array
    {
        return [
            'Kependudukan' => 'Kependudukan',
            'Pendidikan' => 'Pendidikan',
            'Kesehatan' => 'Kesehatan',
            'Ekonomi' => 'Ekonomi',
            'Pekerjaan' => 'Pekerjaan',
            'Perumahan' => 'Perumahan',
        ];
    }
}
