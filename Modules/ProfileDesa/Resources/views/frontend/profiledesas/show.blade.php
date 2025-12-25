@extends('frontend.layouts.app')

@section('title')
{{ $profilePage->title }} - {{ __($module_title) }}
@endsection

@section('content')
<!-- Hero Section with Gradient -->
<section class="bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 py-20 text-white">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <nav class="mb-8 flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a
                        href="{{ route('frontend.index') }}"
                        class="inline-flex items-center text-sm font-medium text-white hover:text-blue-200">
                        <svg class="me-2.5 h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="mx-1 h-3 w-3 text-white rtl:rotate-180" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <a
                            href="{{ route('frontend.profil-desa.index') }}"
                            class="ms-1 text-sm font-medium text-white hover:text-blue-200 md:ms-2">
                            {{ __($module_title) }}
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="mx-1 h-3 w-3 text-white rtl:rotate-180" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-blue-200 md:ms-2">{{ $profilePage->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Page Title -->
        <div class="max-w-4xl">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl lg:text-6xl">
                {{ $profilePage->title }}
            </h1>
            @if ($profilePage->meta_description)
            <p class="mb-6 text-lg font-normal text-blue-100 lg:text-xl">
                {{ $profilePage->meta_description }}
            </p>
            @endif

            <!-- Metadata Badges -->
            <div class="flex flex-wrap items-center gap-3">
                <span class="inline-flex items-center rounded-full bg-blue-500 bg-opacity-50 px-3 py-1 text-sm font-medium text-white">
                    <svg class="me-1.5 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                    </svg>
                    Diperbarui {{ $profilePage->updated_at->diffForHumans() }}
                </span>

                <button
                    type="button"
                    onclick="window.print()"
                    class="inline-flex items-center rounded-full bg-white bg-opacity-20 px-3 py-1 text-sm font-medium text-white hover:bg-opacity-30">
                    <svg class="me-1.5 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    Cetak
                </button>

                <button
                    type="button"
                    onclick="shareContent()"
                    class="inline-flex items-center rounded-full bg-white bg-opacity-20 px-3 py-1 text-sm font-medium text-white hover:bg-opacity-30">
                    <svg class="me-1.5 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                    </svg>
                    Bagikan
                </button>
            </div>
        </div>
    </div>
</section>

@include('frontend.includes.messages')

<!-- Main Content -->
<section class="bg-gray-50 py-12 dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-4">
            <!-- Sidebar Navigation -->
            <aside class="lg:col-span-1">
                <div class="sticky top-24">
                    <!-- Profile Menu Card -->
                    <div class="mb-6 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-200 bg-gradient-to-r from-blue-600 to-blue-700 p-4 dark:border-gray-700">
                            <h3 class="flex items-center text-lg font-semibold text-white">
                                <svg class="me-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                </svg>
                                Menu {{ __($module_title) }}
                            </h3>
                        </div>
                        <nav class="p-2">
                            <ul class="space-y-1" role="list">
                                @foreach ($profilePages as $page)
                                <li>
                                    <a
                                        href="{{ route('frontend.profil-desa.show', $page->slug) }}"
                                        class="group flex items-center rounded-lg px-3 py-2.5 text-sm font-medium transition-all {{ $page->id === $profilePage->id ? 'bg-blue-600 text-white shadow-sm' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                                        <svg class="me-2.5 h-4 w-4 {{ $page->id === $profilePage->id ? 'text-white' : 'text-gray-400 group-hover:text-blue-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="flex-1">{{ $page->title }}</span>
                                        @if ($page->id === $profilePage->id)
                                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        @endif
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>

                    <!-- Quick Actions Card -->
                    <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-200 p-4 dark:border-gray-700">
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Aksi Cepat</h3>
                        </div>
                        <div class="p-4">
                            <div class="space-y-2">
                                <a
                                    href="{{ route('frontend.profil-desa.index') }}"
                                    class="flex items-center rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                                    <svg class="me-2 h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                    Semua Halaman
                                </a>
                                <a
                                    href="{{ route('frontend.index') }}"
                                    class="flex items-center rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                                    <svg class="me-2 h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                    </svg>
                                    Kembali ke Beranda
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Main Content Area -->
            <article class="lg:col-span-3">
                <!-- Content Card -->
                <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-md dark:border-gray-700 dark:bg-gray-800">
                    <!-- Featured Image -->
                    @if ($profilePage->featured_image)
                    <div class="relative h-96 overflow-hidden">
                        <img
                            src="{{ asset($profilePage->featured_image) }}"
                            alt="{{ $profilePage->title }}"
                            class="h-full w-full object-cover transition-transform duration-300 hover:scale-105" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                    @endif

                    <!-- Content Body -->
                    <div class="p-8">
                        <!-- Content -->
                        <div class="prose prose-lg max-w-none dark:prose-invert">
                            {!! $profilePage->content !!}
                        </div>
                    </div>

                    <!-- Footer Navigation -->
                    <div class="border-t border-gray-200 bg-gray-50 px-8 py-6 dark:border-gray-700 dark:bg-gray-900">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <!-- Updated Info -->
                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                <svg class="me-2 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="font-medium">Terakhir diperbarui:</span>
                                <span class="ms-1">{{ $profilePage->updated_at->format('d M Y, H:i') }}</span>
                            </div>

                            <!-- Pagination Buttons -->
                            <div class="flex gap-2">
                                @php
                                $prevPage = $profilePages->where('order', '<', $profilePage->order)->sortByDesc('order')->first();
                                    $nextPage = $profilePages->where('order', '>', $profilePage->order)->sortBy('order')->first();
                                    @endphp

                                    @if ($prevPage)
                                    <a
                                        href="{{ route('frontend.profil-desa.show', $prevPage->slug) }}"
                                        class="inline-flex items-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                                        <svg class="me-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                        Sebelumnya
                                    </a>
                                    @endif

                                    @if ($nextPage)
                                    <a
                                        href="{{ route('frontend.profil-desa.show', $nextPage->slug) }}"
                                        class="inline-flex items-center rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Selanjutnya
                                        <svg class="ms-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Share Modal Trigger (Hidden) -->
                <div id="share-modal-trigger" class="hidden"></div>
            </article>
        </div>
    </div>
</section>

<!-- Share Modal (Flowbite Modal) -->
<div id="share-modal" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
    <div class="relative max-h-full w-full max-w-md">
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
            <div class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-5">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Bagikan Halaman
                </h3>
                <button type="button" class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="share-modal">
                    <svg class="h-3 w-3" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <div class="mb-4 grid grid-cols-2 gap-4">
                    <button type="button" onclick="shareToFacebook()" class="flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                        <svg class="me-2 h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                        </svg>
                        Facebook
                    </button>
                    <button type="button" onclick="shareToTwitter()" class="flex items-center justify-center rounded-lg bg-blue-400 px-4 py-2.5 text-sm font-medium text-white hover:bg-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-300">
                        <svg class="me-2 h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                        Twitter
                    </button>
                    <button type="button" onclick="shareToWhatsApp()" class="flex items-center justify-center rounded-lg bg-green-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                        <svg class="me-2 h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                        </svg>
                        WhatsApp
                    </button>
                    <button type="button" onclick="copyLink()" class="flex items-center justify-center rounded-lg bg-gray-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300">
                        <svg class="me-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                        Salin Link
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-styles')
<style>
    .prose {
        color: #374151;
        line-height: 1.75;
    }

    .prose h2 {
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-size: 1.875rem;
        font-weight: 700;
        color: #1f2937;
    }

    .prose h3 {
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
        font-size: 1.5rem;
        font-weight: 600;
        color: #374151;
    }

    .prose h4 {
        margin-top: 1.5rem;
        margin-bottom: 0.5rem;
        font-size: 1.25rem;
        font-weight: 600;
        color: #4b5563;
    }

    .prose p {
        margin-bottom: 1.25rem;
        line-height: 1.75;
    }

    .prose ul,
    .prose ol {
        margin-top: 1.25rem;
        margin-bottom: 1.25rem;
        padding-left: 1.625rem;
    }

    .prose li {
        margin-bottom: 0.5rem;
        line-height: 1.75;
    }

    .prose strong {
        font-weight: 600;
        color: #1f2937;
    }

    .prose a {
        color: #2563eb;
        text-decoration: underline;
    }

    .prose a:hover {
        color: #1d4ed8;
    }

    .prose table {
        width: 100%;
        margin-top: 2rem;
        margin-bottom: 2rem;
        border-collapse: collapse;
    }

    .prose th {
        padding: 0.75rem;
        text-align: left;
        font-weight: 600;
        background-color: #f3f4f6;
        border: 1px solid #e5e7eb;
    }

    .prose td {
        padding: 0.75rem;
        border: 1px solid #e5e7eb;
    }

    /* Iframe/Video responsive styling */
    .prose iframe {
        width: 100%;
        min-height: 400px;
        border: 0;
        border-radius: 0.5rem;
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
    }

    /* Responsive video container */
    .prose .video-container {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
        height: 0;
        overflow: hidden;
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .prose .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        margin: 0;
    }

    @media print {
        .no-print {
            display: none !important;
        }
    }
</style>
@endpush

@push('after-scripts')
<script>
    const pageUrl = "{{ url()->current() }}";
    const pageTitle = "{{ $profilePage->title }}";
    const pageDescription = "{{ $profilePage->meta_description ?? '' }}";

    function shareContent() {
        const modal = FlowbiteInstances.getInstance('Modal', 'share-modal');
        modal.show();
    }

    function shareToFacebook() {
        window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(pageUrl)}`, '_blank', 'width=600,height=400');
    }

    function shareToTwitter() {
        window.open(`https://twitter.com/intent/tweet?url=${encodeURIComponent(pageUrl)}&text=${encodeURIComponent(pageTitle)}`, '_blank', 'width=600,height=400');
    }

    function shareToWhatsApp() {
        window.open(`https://wa.me/?text=${encodeURIComponent(pageTitle + ' - ' + pageUrl)}`, '_blank');
    }

    async function copyLink() {
        try {
            await navigator.clipboard.writeText(pageUrl);
            
            // Show toast notification
            const toast = document.createElement('div');
            toast.className = 'fixed bottom-5 right-5 z-50 flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800';
            toast.innerHTML = `
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ms-3 text-sm font-normal">Link berhasil disalin!</div>
            `;
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.remove();
            }, 3000);
        } catch (err) {
            alert('Gagal menyalin link');
        }
    }

    // Initialize Flowbite Modal
    document.addEventListener('DOMContentLoaded', function() {
        const modalElement = document.getElementById('share-modal');
        const modal = new Modal(modalElement, {
            placement: 'center',
            backdrop: 'dynamic',
            backdropClasses: 'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
            closable: true,
        });

        // Store modal instance globally
        window.FlowbiteInstances = window.FlowbiteInstances || {};
        window.FlowbiteInstances.Modal = window.FlowbiteInstances.Modal || {};
        window.FlowbiteInstances.Modal['share-modal'] = modal;
    });
</script>
@endpush