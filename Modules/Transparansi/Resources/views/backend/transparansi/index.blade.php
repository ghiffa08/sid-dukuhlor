@extends('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection

@section('breadcrumbs')
<x-backend.breadcrumbs>
    <x-backend.breadcrumb-item type="active" icon='{{ $module_icon }}'>{{ __($module_title) }}</x-backend.breadcrumb-item>
</x-backend.breadcrumbs>
@endsection

@section('content')
<div class="card">
    <div class="card-body">

        <x-backend.section-header :module_name="$module_name" :module_title="$module_title" :module_icon="$module_icon" :module_action="$module_action" />

        <div class="row mt-4">
            <div class="col">
                <table id="datatable" class="table table-bordered table-hover table-responsive-sm">
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Jenis</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Anggaran</th>
                            <th>Realisasi</th>
                            <th>Urutan</th>
                            <th>Status</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($$module_name as $item)
                        <tr>
                            <td>
                                {{ $item->year }}
                            </td>
                            <td>
                                @if($item->type == 'PENDAPATAN')
                                    <span class="badge bg-success">PENDAPATAN</span>
                                @elseif($item->type == 'BELANJA')
                                    <span class="badge bg-danger">BELANJA</span>
                                @else
                                    <span class="badge bg-info">PEMBIAYAAN</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url("admin/$module_name", $item->id) }}">
                                    <strong>{{ $item->title }}</strong>
                                </a>
                            </td>
                             <td>
                                {{ $item->category }}
                            </td>
                             <td class="text-end">
                                Rp {{ number_format($item->budget, 0, ',', '.') }}
                            </td>
                            <td class="text-end">
                                Rp {{ number_format($item->realization, 0, ',', '.') }}
                            </td>
                             <td>
                                {{ $item->order }}
                            </td>
                             <td>
                                @if ($item->is_active)
                                <span class="badge bg-success">Pubish</span>
                                @else
                                <span class="badge bg-secondary">Unpublish</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href='{!!route("backend.$module_name.edit", $item)!!}' class='btn btn-sm btn-primary mt-1' data-toggle="tooltip" title="Edit {{ ucwords(Str::singular($module_name)) }}"><i class="fas fa-wrench"></i></a>
                                <a href='{!!route("backend.$module_name.show", $item)!!}' class='btn btn-sm btn-success mt-1' data-toggle="tooltip" title="Show {{ ucwords(Str::singular($module_name)) }}"><i class="fas fa-tv"></i></a>
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
                    Total {{ $$module_name->total() }} {{ ucwords($module_name) }}
                </div>
            </div>
            <div class="col-5">
                <div class="float-end">
                    {!! $$module_name->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
