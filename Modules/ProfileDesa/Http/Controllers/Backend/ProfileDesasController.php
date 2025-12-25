<?php

namespace Modules\ProfileDesa\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProfileDesasController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'ProfileDesas';

        // module name
        $this->module_name = 'profiledesas';

        // directory path of the module
        $this->module_path = 'profiledesa::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

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

        $$module_name = $module_model::ordered()->paginate();

        return view("{$module_path}.profiledesas.index", compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', $module_name));
    }

    public function create(): View
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Create';

        return view("{$module_path}.profiledesas.create", compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular'));
    }

    public function store(Request $request): RedirectResponse
    {
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $validated = $request->validate([
            'title' => 'required|string|max:191',
            'slug' => 'required|string|max:191|unique:profile_desa,slug',
            'content' => 'nullable|string',
            'featured_image' => 'nullable|string',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
            'meta_title' => 'nullable|string|max:191',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['slug'] = Str::slug($validated['slug']);

        $$module_name_singular = $module_model::create($validated);

        flash('Profil Desa baru berhasil ditambahkan')->success()->important();

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

        return view("{$module_path}.profiledesas.show", compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', $module_name_singular));
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

        return view("{$module_path}.profiledesas.edit", compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', $module_name_singular));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $$module_name_singular = $module_model::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:191',
            'slug' => 'required|string|max:191|unique:profile_desa,slug,'.$id,
            'content' => 'nullable|string',
            'featured_image' => 'nullable|string',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
            'meta_title' => 'nullable|string|max:191',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['slug'] = Str::slug($validated['slug']);

        $$module_name_singular->update($validated);

        flash('Profil Desa berhasil diperbarui')->success()->important();

        return redirect()->route('backend.profil-desa.show', $$module_name_singular->id);
    }

    public function destroy($id): RedirectResponse
    {
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $$module_name_singular = $module_model::findOrFail($id);
        $$module_name_singular->delete();

        flash('Profil Desa berhasil dihapus')->success()->important();

        return redirect()->route('backend.profiledesas.index');
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

        return view("{$module_path}.profiledesas.trash", compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', $module_name));
    }

    public function restore($id): RedirectResponse
    {
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $$module_name_singular = $module_model::withTrashed()->findOrFail($id);
        $$module_name_singular->restore();

        flash('Profil Desa berhasil dipulihkan')->success()->important();

        return redirect()->route('backend.profiledesas.index');
    }
}
