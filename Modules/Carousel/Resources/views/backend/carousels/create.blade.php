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
                </x-slot>
            </x-backend.section-header>

            <div class="row mt-4">
                <div class="col">
                    {{ html()->form('POST', route("backend.$module_name.store"))->open() }}

                    @include('carousel::backend.carousels.form')

                    <div class="row">
                        <div class="col">
                            <button class="btn btn-success" type="submit">
                                <i class="fas fa-check"></i> @lang('Create')
                            </button>
                        </div>
                    </div>

                    {{ html()->form()->close() }}
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