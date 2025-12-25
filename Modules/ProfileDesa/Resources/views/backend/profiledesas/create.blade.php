@extends('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection

@section('breadcrumbs')
<x-backend.breadcrumbs>
    <x-backend.breadcrumb-item route='{{ route("backend.profil-desa.index") }}' icon="{{ $module_icon }}">
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

        <hr>

        <div class="row mt-4">
            <div class="col">
                {{ html()->form('POST', route("backend.profil-desa.store"))->class('form-horizontal')->open() }}

                @include('profiledesa::backend.profiledesas.form')

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <x-backend.buttons.save />
                        </div>
                    </div>
                </div>

                {{ html()->form()->close() }}
            </div>
        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-end text-muted"></small>
            </div>
        </div>
    </div>
</div>
@endsection