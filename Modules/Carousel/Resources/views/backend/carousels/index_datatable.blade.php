@extends('backend.layouts.app')

@section('title')
    {{ __($module_action) }} {{ __($module_title) }}
@endsection

@section('breadcrumbs')
    <x-backend.breadcrumbs>
        <x-backend.breadcrumb-item route='{{ route("backend.dashboard") }}' icon='{{ $module_icon }}'>
            {{ __($module_title) }}
        </x-backend.breadcrumb-item>
        <x-backend.breadcrumb-item type="active">{{ __($module_action) }}</x-backend.breadcrumb-item>
    </x-backend.breadcrumbs>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <x-backend.section-header>
                <i class="{{ $module_icon }}"></i> {{ __($module_title) }} <small class="text-muted">{{ __($module_action) }}</small>

                <x-slot name="toolbar">
                    <x-backend.buttons.return-back />
                    <a class="btn btn-success" href="{{ route("backend.{$module_name}.create") }}" data-toggle="tooltip" title="{{ __('Create') }} {{ ucwords(Str::singular($module_name)) }}">
                        <i class="fas fa-plus-circle"></i> @lang('Create')
                    </a>
                </x-slot>
            </x-backend.section-header>

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th>@lang('Image')</th>
                                    <th>@lang('Title')</th>
                                    <th>@lang('Order')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Updated At')</th>
                                    <th class="text-end">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($$module_name as $module_name_singular)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($module_name_singular->featured_image) }}" alt="{{ $module_name_singular->title }}" class="img-thumbnail" style="max-width: 100px;">
                                        </td>
                                        <td>
                                            <strong>{{ $module_name_singular->title }}</strong>
                                        </td>
                                        <td>{{ $module_name_singular->order }}</td>
                                        <td>
                                            @if ($module_name_singular->is_active)
                                                <span class="badge bg-success">@lang('Active')</span>
                                            @else
                                                <span class="badge bg-secondary">@lang('Inactive')</span>
                                            @endif
                                        </td>
                                        <td>{{ $module_name_singular->updated_at->diffForHumans() }}</td>
                                        <td class="text-end">
                                            <a class="btn btn-sm btn-primary mt-1" href="{{ route("backend.{$module_name}.show", $module_name_singular->id) }}" data-toggle="tooltip" title="Show">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-success mt-1" href="{{ route("backend.{$module_name}.edit", $module_name_singular->id) }}" data-toggle="tooltip" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route("backend.{$module_name}.destroy", $module_name_singular->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger mt-1" type="submit" data-toggle="tooltip" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-7">
                    <div class="float-start">
                        {!! $$module_name->total() !!} @lang('Total')
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

@push ('after-styles')
<!-- DataTables Core and Extensions -->
<link rel="stylesheet" href="{{ asset('vendor/datatable/datatables.min.css') }}">
@endpush

@push ('after-scripts')
<!-- DataTables Core and Extensions -->
<script type="module" src="{{ asset('vendor/datatable/datatables.min.js') }}"></script>

<script type="module">
    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{{ route("backend.$module_name.index_data") }}',
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'updated_at',
                name: 'updated_at'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ]
    });
</script>
@endpush
