<div class="row">
    <div class="col-12 col-sm-8">
        <div class="form-group">
            <?php
            $field_name = 'title';
            $field_label = 'Judul';
            $field_placeholder = $field_label;
            $required = 'required';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label')->for($field_name) }}
            {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>

    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'order';
            $field_label = 'Urutan';
            $field_placeholder = $field_label;
            $required = 'required';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label')->for($field_name) }}
            {!! field_required($required) !!}
            {{ html()->number($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-sm-8">
        <div class="form-group">
            <?php
            $field_name = 'slug';
            $field_label = 'Slug';
            $field_placeholder = 'slug-otomatis';
            $required = 'required';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label')->for($field_name) }}
            {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
            <small class="form-text text-muted">Versi URL-friendly dari judul (otomatis jika kosong)</small>
        </div>
    </div>

    <div class="col-12 col-sm-4">
        <div class="form-group">
            <?php
            $field_name = 'is_active';
            $field_label = 'Status';
            $field_placeholder = 'Status';
            $required = '';
            $select_options = [
                '1' => 'Aktif',
                '0' => 'Nonaktif',
            ];
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label')->for($field_name) }}
            {!! field_required($required) !!}
            {{ html()->select($field_name, $select_options)->class('form-select')->attributes(["$required"]) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'content';
            $field_label = 'Konten';
            $field_placeholder = $field_label;
            $required = '';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label')->for($field_name) }}
            {!! field_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->id('content')->attributes(["$required"]) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'featured_image';
            $field_label = 'Gambar Unggulan';
            $field_placeholder = $field_label;
            $required = '';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label')->for($field_name) }}
            {!! field_required($required) !!}
            <div class="input-group mb-3">
                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required", 'aria-label' => 'Image', 'aria-describedby' => 'button-featured-image']) }}
                <button class="btn btn-outline-info" id="button-featured-image" data-input="{{ $field_name }}" type="button">
                    <i class="fas fa-folder-open"></i>
                    &nbsp;
                    @lang('Browse')
                </button>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <h5>Pengaturan SEO</h5>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'meta_title';
            $field_label = 'Meta Title';
            $field_placeholder = $field_label;
            $required = '';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label')->for($field_name) }}
            {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
            <small class="form-text text-muted">Kosongkan untuk menggunakan judul halaman</small>
        </div>
    </div>

    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'meta_keywords';
            $field_label = 'Meta Keywords';
            $field_placeholder = 'keyword1, keyword2, keyword3';
            $required = '';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label')->for($field_name) }}
            {!! field_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'meta_description';
            $field_label = 'Meta Description';
            $field_placeholder = $field_label;
            $required = '';
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label')->for($field_name) }}
            {!! field_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(['rows' => 3, "$required"]) }}
        </div>
    </div>
</div>

@push('after-styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet" />
<style>
    .note-editor.note-frame :after {
        display: none;
    }

    .note-editor .note-toolbar .note-dropdown-menu,
    .note-popover .popover-content .note-dropdown-menu {
        min-width: 180px;
    }
</style>
@endpush

@push('after-scripts')
<script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
<script type="module">
    // Auto-generate slug from title
    document.getElementById('title')?.addEventListener('blur', function() {
        const slugInput = document.getElementById('slug');
        if (slugInput && slugInput.value === '') {
            slugInput.value = this.value
                .toLowerCase()
                .replace(/[^\w\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim();
        }
    });

    // Define function to open filemanager window
    var lfm = function(options, cb) {
        var route_prefix = options && options.prefix ? options.prefix : '/laravel-filemanager';
        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
            contents: '<i class="note-icon-picture"></i> ',
            tooltip: 'Insert image with filemanager',
            click: function() {
                lfm(
                    {
                        prefix: '/laravel-filemanager',
                    },
                    function(lfmItems, path) {
                        lfmItems.forEach(function(lfmItem) {
                            context.invoke('insertImage', lfmItem.url);
                        });
                    }
                );
            },
        });
        return button.render();
    };

    // Initialize Summernote
    $('#content').summernote({
        height: 400,
        toolbar: [
            ['style', ['style']],
            ['font', ['fontname', 'fontsize', 'bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'lfm', 'video']],
            ['view', ['codeview', 'undo', 'redo', 'help']],
        ],
        buttons: {
            lfm: LFMButton,
        },
        // Allow iframe and video embeds
        callbacks: {
            onPaste: function (e) {
                var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                e.preventDefault();
                document.execCommand('insertText', false, bufferText);
            }
        },
        // Keep HTML tags including iframe
        codeviewFilter: false,
        codeviewIframeFilter: true,
    });
</script>

<script type="module" src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script type="module">
    $('#button-featured-image').filemanager('image');
</script>
@endpush
