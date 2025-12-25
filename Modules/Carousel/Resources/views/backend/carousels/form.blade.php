<div class="row mb-3">
    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'title';
            $field_label = __('Title');
            $field_placeholder = $field_label;
            $required = 'required';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }}
            {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>

    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'order';
            $field_label = __('Order');
            $field_placeholder = $field_label;
            $required = 'required';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }}
            {!! field_required($required) !!}
            {{ html()->input('number', $field_name)->placeholder($field_placeholder)->class('form-control')->attribute('min', '0')->attributes(["$required"]) }}
        </div>
    </div>

    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'is_active';
            $field_label = __('Status');
            $field_placeholder = __('Select an option');
            $required = 'required';
            $select_options = [
                '1' => 'Active',
                '0' => 'Inactive',
            ];
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }}
            {!! field_required($required) !!}
            {{ html()->select($field_name, $select_options)->class('form-select')->attributes(["$required"]) }}
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-12">
        <div class="form-group">
            <?php
            $field_name = 'description';
            $field_label = __('Description');
            $field_placeholder = $field_label;
            $required = '';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }}
            {!! field_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->rows(3)->attributes(["$required"]) }}
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-12">
        <div class="form-group">
            <?php
            $field_name = 'link';
            $field_label = __('Button Link (Optional)');
            $field_placeholder = 'https://example.com';
            $required = '';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }}
            {!! field_required($required) !!}
            {{ html()->input('url', $field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
            <small class="form-text text-muted">@lang('Leave empty if you don\'t want a button on this slide')</small>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-12">
        <div class="form-group">
            <?php
            $field_name = 'featured_image';
            $field_label = __('Carousel Image');
            $field_placeholder = $field_label;
            $required = '';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }}
            {!! field_required($required) !!}
            <div class="input-group">
                <input class="form-control" id="{{ $field_name }}" name="{{ $field_name }}" type="text" value="{{ old($field_name, $$module_name_singular->$field_name ?? '') }}" placeholder="{{ $field_placeholder }}" {{ $required }} />
                <button class="btn btn-primary" data-input="{{ $field_name }}" data-preview="holder" type="button">
                    <i class="fas fa-folder-open"></i> @lang('Browse')
                </button>
            </div>
            <small class="form-text text-muted">@lang('Recommended size: 1920x800px')</small>
        </div>
    </div>

    @if (isset($$module_name_singular) && $$module_name_singular->featured_image)
        <div class="col-12 col-sm-6">
            <div class="form-group">
                <label>@lang('Current Image')</label>
                <div id="holder">
                    <img class="img-fluid img-thumbnail" src="{{ asset($$module_name_singular->featured_image) }}" alt="{{ $$module_name_singular->title }}" />
                </div>
            </div>
        </div>
    @endif
</div>

@push('after-scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $('button[data-input="featured_image"]').filemanager('image');
    </script>
@endpush
