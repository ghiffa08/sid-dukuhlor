@extends("backend.layouts.app")

@section("title")
    {{ __($module_action) }} {{ __($module_title) }}
@endsection

@section("breadcrumbs")
    <x-backend.breadcrumbs>
        <x-backend.breadcrumb-item route='{{ route("backend.$module_name.index") }}' icon="{{ $module_icon }}">
            {{ __($module_title) }}
        </x-backend.breadcrumb-item>
        <x-backend.breadcrumb-item type="active">{{ __($module_action) }}</x-backend.breadcrumb-item>
    </x-backend.breadcrumbs>
@endsection

@section("content")
    <div class="card">
        <div class="card-body">
            <x-backend.section-header>
                <i class="{{ $module_icon }}"></i>
                {{ __($module_title) }}
                <small class="text-muted">{{ __($module_action) }}</small>

                <x-slot name="toolbar">
                    <a
                        href="{{ route("backend.$module_name.index") }}"
                        class="btn btn-secondary btn-sm mt-1"
                        data-toggle="tooltip"
                        title="{{ __(ucwords($module_name)) }} List"
                    >
                        <i class="fas fa-list"></i>
                        List
                    </a>
                </x-slot>
            </x-backend.section-header>

            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table-bordered table">
                            <?php
                                $data = json_decode($$module_name_singular->data);
                                $title = $data->title ?? 'Notification';
                                $text = $data->text ?? $data->message ?? '-';
                                $url_backend = $data->url_backend ?? $data->url ?? '';
                                $url_frontend = $data->url_frontend ?? '';
                                $action_url = $data->action_url ?? '';

                                // Ensure action_url is relative to avoid cross-domain CSRF issues (localhost vs 127.0.0.1)
                                if ($action_url != "") {
                                    $parsed = parse_url($action_url);
                                    if (isset($parsed['path'])) {
                                        $action_url = $parsed['path'];
                                    }
                                }

                                // Custom Logic: Check if Post is already approved
                                $is_action_completed = false;
                                $action_button_text = 'Approve Post';
                                $action_button_class = 'btn-warning';

                                if (($data->module ?? '') === 'Posts') {
                                    $post_id = $data->post_id ?? null;
                                    
                                    // Fallback: Try to get ID from action_url if post_id is missing (legacy notifications)
                                    if (!$post_id && preg_match('/\/posts\/approve\/(\d+)/', $action_url, $matches)) {
                                        $post_id = $matches[1];
                                    }

                                    if ($post_id) {
                                        $post = \Modules\Post\Models\Post::find($post_id);
                                        // If post is found and status is Published, then action is completed
                                        if ($post && $post->status === \Modules\Post\Enums\PostStatus::Published->value) {
                                            $is_action_completed = true;
                                            $action_button_text = 'Approved';
                                            $action_button_class = 'btn-success';
                                        }
                                    }
                                }
                            ?>

                            <tbody>
                                <tr>
                                    <th>Title</th>
                                    <th>
                                        {{ $title }}
                                    </th>
                                </tr>
                                <tr>
                                    <th>Text</th>
                                    <td>
                                        {!! $text !!}
                                    </td>
                                </tr>
                                @if ($url_backend != "")
                                    <tr>
                                        <th>URL Backend</th>
                                        <td>
                                            Backend:
                                            <a href="{{ $url_backend }}">{{ $url_backend }}</a>
                                        </td>
                                    </tr>
                                @endif

                                @if ($url_frontend != "")
                                    <tr>
                                        <th>URL Frontend</th>
                                        <td>
                                            Frontend:
                                            <a href="{{ $url_frontend }}">{{ $url_frontend }}</a>
                                        </td>
                                    </tr>
                                @endif

                                @if ($action_url != "")
                                    <tr>
                                        <th>Action</th>
                                        <td>
                                            @if($is_action_completed)
                                                <button type="button" class="btn {{ $action_button_class }}" disabled>
                                                    <i class="fas fa-check-double"></i> {{ $action_button_text }}
                                                </button>
                                            @else
                                                <form action="{{ $action_url }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn {{ $action_button_class }}" data-toggle="tooltip" title="{{ $action_button_text }}">
                                                        <i class="fas fa-check"></i> {{ $action_button_text }}
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="text-muted float-end">
                        Updated: {{ $$module_name_singular->updated_at->diffForHumans() }}, Created at:
                        {{ $$module_name_singular->created_at->isoFormat("LLLL") }}
                    </small>
                </div>
            </div>
        </div>
    </div>
@endsection
