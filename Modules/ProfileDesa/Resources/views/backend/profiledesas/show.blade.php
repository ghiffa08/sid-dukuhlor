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
            <i class="{{ $module_icon }}"></i> {{ $$module_name_singular->title }}

            <x-slot name="toolbar">
                <x-backend.buttons.return-back />
                <a href="{{ route('backend.profil-desa.edit', $$module_name_singular->id) }}"
                    class="btn btn-sm btn-primary"
                    data-toggle="tooltip"
                    title="Edit {{ $module_title }}">
                    <i class="fas fa-wrench"></i> Edit
                </a>
                <a href="{{ route('frontend.profil-desa.show', $$module_name_singular->slug) }}"
                    class="btn btn-sm btn-success"
                    target="_blank"
                    data-toggle="tooltip"
                    title="Lihat di Frontend">
                    <i class="fas fa-external-link-alt"></i> Preview
                </a>
            </x-slot>
        </x-backend.section-header>

        <hr>

        <div class="row mt-4">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label fw-bold">Judul:</label>
                    <p>{{ $$module_name_singular->title }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Slug:</label>
                    <p><code>{{ $$module_name_singular->slug }}</code></p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Urutan:</label>
                    <p>{{ $$module_name_singular->order }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Status:</label>
                    <p>
                        @if ($$module_name_singular->is_active)
                        <span class="badge bg-success">Aktif</span>
                        @else
                        <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </p>
                </div>

                @if ($$module_name_singular->featured_image)
                <div class="mb-3">
                    <label class="form-label fw-bold">Gambar Unggulan:</label>
                    <br>
                    <img src="{{ $$module_name_singular->featured_image }}"
                        alt="{{ $$module_name_singular->title }}"
                        class="img-fluid"
                        style="max-height: 300px;">
                </div>
                @endif

                <div class="mb-3">
                    <label class="form-label fw-bold">Konten:</label>
                    <div class="border rounded p-3 bg-light">
                        {!! $$module_name_singular->content !!}
                    </div>
                </div>

                @if ($$module_name_singular->meta_title)
                <div class="mb-3">
                    <label class="form-label fw-bold">Meta Title:</label>
                    <p>{{ $$module_name_singular->meta_title }}</p>
                </div>
                @endif

                @if ($$module_name_singular->meta_description)
                <div class="mb-3">
                    <label class="form-label fw-bold">Meta Description:</label>
                    <p>{{ $$module_name_singular->meta_description }}</p>
                </div>
                @endif

                @if ($$module_name_singular->meta_keywords)
                <div class="mb-3">
                    <label class="form-label fw-bold">Meta Keywords:</label>
                    <p>{{ $$module_name_singular->meta_keywords }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-end text-muted">
                    Diperbarui: {{ $$module_name_singular->updated_at->diffForHumans() }},
                    Dibuat: {{ $$module_name_singular->created_at->isoFormat('LLLL') }}
                </small>
            </div>
        </div>
    </div>
</div>
@endsection