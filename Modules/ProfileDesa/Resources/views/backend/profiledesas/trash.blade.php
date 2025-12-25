@extends('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection

@section('breadcrumbs')
<x-backend.breadcrumbs>
    <x-backend.breadcrumb-item route='{{ route("backend.$module_name.index") }}' icon="{{ $module_icon }}">
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
                <a href="{{ route("backend.$module_name.index") }}" 
                   class="btn btn-sm btn-secondary" 
                   data-toggle="tooltip" 
                   title="Daftar {{ $module_title }}">
                    <i class="fas fa-list"></i> Daftar
                </a>
            </x-slot>
        </x-backend.section-header>

        <div class="row mt-4">
            <div class="col">
                <table id="datatable" class="table table-bordered table-hover table-responsive-sm">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Dihapus</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($$module_name as $module_name_singular)
                        <tr>
                            <td>
                                <strong>{{ $module_name_singular->title }}</strong>
                            </td>
                            <td>{{ $module_name_singular->deleted_at->diffForHumans() }}</td>
                            <td class="text-end">
                                <form action="{{ route("backend.$module_name.restore", $module_name_singular->id) }}" 
                                      method="POST" 
                                      style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" 
                                            class="btn btn-sm btn-warning" 
                                            data-toggle="tooltip" 
                                            title="Pulihkan">
                                        <i class="fas fa-undo"></i>
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
