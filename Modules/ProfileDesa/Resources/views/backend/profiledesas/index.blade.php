@extends('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection

@section('breadcrumbs')
<x-backend.breadcrumbs>
    <x-backend.breadcrumb-item type="active" icon="{{ $module_icon }}">
        {{ __($module_title) }}
    </x-backend.breadcrumb-item>
</x-backend.breadcrumbs>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <x-backend.section-header>
            <i class="{{ $module_icon }}"></i> {{ __($module_title) }} <small class="text-muted">{{ __($module_action) }}</small>

            <x-slot name="toolbar">
                <x-backend.buttons.create route='{{ route("backend.profil-desa.create") }}' title="Tambah {{ $module_title }}" />
                <x-backend.buttons.return-back />
            </x-slot>
        </x-backend.section-header>

        <div class="row mt-4">
            <div class="col">
                <table id="datatable" class="table table-bordered table-hover table-responsive-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Slug</th>
                            <th>Urutan</th>
                            <th>Status</th>
                            <th>Diperbarui</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($$module_name as $module_name_singular)
                        <tr>
                            <td>{{ $module_name_singular->id }}</td>
                            <td>
                                <strong>
                                    <a href="{{ route("backend.profil-desa.show", $module_name_singular->id) }}">
                                        {{ $module_name_singular->title }}
                                    </a>
                                </strong>
                            </td>
                            <td><code>{{ $module_name_singular->slug }}</code></td>
                            <td>{{ $module_name_singular->order }}</td>
                            <td>
                                @if ($module_name_singular->is_active)
                                <span class="badge bg-success">Aktif</span>
                                @else
                                <span class="badge bg-secondary">Nonaktif</span>
                                @endif
                            </td>
                            <td>{{ $module_name_singular->updated_at->diffForHumans() }}</td>
                            <td class="text-end">
                                <a href="{{ route("backend.profil-desa.show", $module_name_singular->id) }}"
                                    class="btn btn-sm btn-primary mt-1"
                                    data-toggle="tooltip"
                                    title="Lihat">
                                    <i class="fas fa-tv"></i>
                                </a>
                                <a href="{{ route("backend.profil-desa.edit", $module_name_singular->id) }}"
                                    class="btn btn-sm btn-success mt-1"
                                    data-toggle="tooltip"
                                    title="Edit">
                                    <i class="fas fa-wrench"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $$module_name->total() !!} Total
                </div>
            </div>
            <div class="col-5">
                <div class="float-end">
                    {!! $$module_name->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection