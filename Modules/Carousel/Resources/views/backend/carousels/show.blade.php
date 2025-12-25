@extends('backend.layouts.app')

@section('title')
    {{ __($module_action) }} {{ __($module_title) }}
@endsection

@section('breadcrumbs')
    <x-backend.breadcrumbs>
        <x-backend.breadcrumb-item route='{{ route("backend.$module_name.index") }}' icon='{{ $module_icon }}'>
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
                    <a class="btn btn-success" href="{{ route("backend.$module_name.edit", $$module_name_singular->id) }}" data-toggle="tooltip" title="Edit">
                        <i class="fas fa-edit"></i> @lang('Edit')
                    </a>
                </x-slot>
            </x-backend.section-header>

            <div class="row mt-4">
                <div class="col">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-4">
                            <strong>@lang('Title'):</strong>
                        </div>
                        <div class="col-12 col-sm-8">
                            {{ $$module_name_singular->title }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-4">
                            <strong>@lang('Description'):</strong>
                        </div>
                        <div class="col-12 col-sm-8">
                            {{ $$module_name_singular->description ?? '-' }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-4">
                            <strong>@lang('Link'):</strong>
                        </div>
                        <div class="col-12 col-sm-8">
                            @if ($$module_name_singular->link)
                                <a href="{{ $$module_name_singular->link }}" target="_blank">{{ $$module_name_singular->link }}</a>
                            @else
                                -
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-4">
                            <strong>@lang('Order'):</strong>
                        </div>
                        <div class="col-12 col-sm-8">
                            {{ $$module_name_singular->order }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-4">
                            <strong>@lang('Status'):</strong>
                        </div>
                        <div class="col-12 col-sm-8">
                            @if ($$module_name_singular->is_active)
                                <span class="badge bg-success">@lang('Active')</span>
                            @else
                                <span class="badge bg-secondary">@lang('Inactive')</span>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-4">
                            <strong>@lang('Image'):</strong>
                        </div>
                        <div class="col-12 col-sm-8">
                            @if ($$module_name_singular->featured_image)
                                <img class="img-fluid" src="{{ asset($$module_name_singular->featured_image) }}" alt="{{ $$module_name_singular->title }}" style="max-width: 600px;" />
                            @else
                                <span class="text-muted">@lang('No image')</span>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-4">
                            <strong>@lang('Created At'):</strong>
                        </div>
                        <div class="col-12 col-sm-8">
                            {{ $$module_name_singular->created_at->format('Y-m-d H:i:s') }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-4">
                            <strong>@lang('Updated At'):</strong>
                        </div>
                        <div class="col-12 col-sm-8">
                            {{ $$module_name_singular->updated_at->format('Y-m-d H:i:s') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col text-end">
                    <small class="text-muted">{{ __($module_title) }}</small>
                </div>
            </div>
        </div>
    </div>
@endsection