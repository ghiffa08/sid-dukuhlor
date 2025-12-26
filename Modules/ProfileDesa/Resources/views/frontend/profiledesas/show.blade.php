@extends('frontend.layouts.app')

@section('title')
{{ $profilePage->title }} - {{ __($module_title) }}
@endsection

@section('content')
<!-- Hero Section -->
<section class="relative z-0 bg-gradient-to-br from-blue-900 via-blue-800 to-cyan-800 py-20 text-white overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-20"></div>
    <div class="container relative mx-auto px-4 z-10">
        <!-- Breadcrumb -->
        <nav class="mb-8 flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse opacity-90 hover:opacity-100 transition-opacity">
                <li class="inline-flex items-center">
                    <a href="{{ route('frontend.index') }}" class="inline-flex items-center text-sm font-medium text-white hover:text-blue-200">
                        <i class="fa-solid fa-house mr-2"></i> Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right mx-2 text-xs text-blue-300"></i>
                        <a href="{{ route('frontend.profil-desa.index') }}" class="ms-1 text-sm font-medium text-white hover:text-blue-200 md:ms-2">
                            {{ __($module_title) }}
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right mx-2 text-xs text-blue-300"></i>
                        <span class="ms-1 text-sm font-medium text-blue-200 md:ms-2 truncate max-w-xs">{{ $profilePage->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Page Title -->
        <div class="max-w-4xl">
            <h1 class="mb-4 text-4xl font-extrabold leading-tight tracking-tight md:text-5xl lg:text-6xl drop-shadow-sm">
                {{ $profilePage->title }}
            </h1>
            @if ($profilePage->meta_description)
            <p class="mb-8 text-lg font-light text-blue-100 lg:text-xl leading-relaxed max-w-3xl">
                {{ $profilePage->meta_description }}
            </p>
            @endif

            <!-- Metadata Badges -->
            <div class="flex flex-wrap items-center gap-3">
                <span class="inline-flex items-center rounded-full bg-white/20 backdrop-blur-sm px-4 py-1.5 text-sm font-medium text-white border border-white/20">
                    <i class="fa-regular fa-clock mr-2"></i>
                    Diperbarui {{ $profilePage->updated_at->diffForHumans() }}
                </span>

                <button type="button" onclick="window.print()" class="group inline-flex items-center rounded-full bg-white/10 px-4 py-1.5 text-sm font-medium text-white hover:bg-white/20 transition-all border border-transparent hover:border-white/30">
                    <i class="fa-solid fa-print mr-2 group-hover:scale-110 transition-transform"></i>
                    Cetak
                </button>

                <button type="button" onclick="shareContent()" class="group inline-flex items-center rounded-full bg-white/10 px-4 py-1.5 text-sm font-medium text-white hover:bg-white/20 transition-all border border-transparent hover:border-white/30">
                    <i class="fa-solid fa-share-nodes mr-2 group-hover:scale-110 transition-transform"></i>
                    Bagikan
                </button>
            </div>
        </div>
    </div>
</section>

@include('frontend.includes.messages')

<!-- Main Content -->
<section class="bg-gray-50 py-16 dark:bg-gray-900 relative">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clean-gray-paper.png')] opacity-30"></div>

    <div class="container relative mx-auto px-4 z-10">
        <div class="grid grid-cols-1 gap-10 lg:grid-cols-4">
            <!-- Sidebar Navigation -->
            <aside class="lg:col-span-1">
                <div class="sticky top-24 space-y-8">
                    <!-- Profile Menu Card -->
                    <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-lg dark:border-gray-700 dark:bg-gray-800">
                        <div class="bg-gradient-to-r from-blue-700 to-blue-600 p-5 dark:border-gray-700">
                            <h3 class="flex items-center text-lg font-bold text-white tracking-wide">
                                <i class="fa-solid fa-bars mr-3"></i>
                                Menu {{ __($module_title) }}
                            </h3>
                        </div>
                        <nav class="p-3">
                            <ul class="space-y-1" role="list">
                                @foreach ($profilePages as $page)
                                <li>
                                    <a href="{{ route('frontend.profil-desa.show', $page->slug) }}"
                                        class="group flex items-center justify-between rounded-xl px-4 py-3 text-sm font-medium transition-all duration-200 border border-transparent 
                                        {{ $page->id === $profilePage->id 
                                            ? 'bg-blue-50 text-blue-700 border-blue-100 shadow-sm dark:bg-blue-900/30 dark:text-blue-300 dark:border-blue-800' 
                                            : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-700/50' }}">
                                        <div class="flex items-center gap-3">
                                            <span class="flex h-8 w-8 items-center justify-center rounded-lg {{ $page->id === $profilePage->id ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-400 group-hover:bg-blue-100 group-hover:text-blue-600 dark:bg-gray-700' }} transition-colors">
                                                <i class="fa-solid fa-file-lines"></i>
                                            </span>
                                            <span>{{ $page->title }}</span>
                                        </div>
                                        @if ($page->id === $profilePage->id)
                                        <i class="fa-solid fa-chevron-right text-xs"></i>
                                        @endif
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>

                    <!-- Quick Actions Card -->
                    <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-md dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-100 p-5 dark:border-gray-700">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-gray-900 dark:text-white">Aksi Cepat</h3>
                        </div>
                        <div class="p-3">
                            <div class="space-y-1">
                                <a href="{{ route('frontend.profil-desa.index') }}" class="flex items-center rounded-xl px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-blue-600 dark:text-gray-300 dark:hover:bg-gray-700/50 transition-colors">
                                    <i class="fa-solid fa-list-ul mr-3 text-gray-400"></i>
                                    Semua Halaman
                                </a>
                                <a href="{{ route('frontend.index') }}" class="flex items-center rounded-xl px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-blue-600 dark:text-gray-300 dark:hover:bg-gray-700/50 transition-colors">
                                    <i class="fa-solid fa-house-chimney mr-3 text-gray-400"></i>
                                    Kembali ke Beranda
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Main Content Area -->
            <article class="lg:col-span-3">
                <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-xl dark:border-gray-700 dark:bg-gray-800">
                    <!-- Featured Image -->
                    @if ($profilePage->featured_image)
                    <div class="relative h-64 md:h-96 w-full overflow-hidden group">
                        <img src="{{ asset($profilePage->featured_image) }}" alt="{{ $profilePage->title }}"
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-80"></div>
                        <div class="absolute bottom-6 left-6 md:bottom-8 md:left-8">
                            <span class="rounded-lg bg-blue-600/90 px-3 py-1 text-xs font-bold uppercase tracking-wider text-white backdrop-blur-sm shadow-md">
                                Profil Desa
                            </span>
                        </div>
                    </div>
                    @endif

                    <!-- Content Body -->
                    <div class="p-6 md:p-10">
                        <div class="prose prose-lg max-w-none dark:prose-invert prose-headings:font-bold prose-headings:tracking-tight prose-a:text-blue-600 hover:prose-a:text-blue-800 prose-img:rounded-xl prose-img:shadow-md">
                            {!! $profilePage->content !!}
                        </div>
                    </div>

                    <!-- Footer Navigation -->
                    <div class="border-t border-gray-100 bg-gray-50 px-6 py-8 md:px-10 dark:border-gray-700 dark:bg-gray-900/50">
                        <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
                            <div class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-400">
                                <i class="fa-regular fa-calendar-check mr-2 text-blue-500"></i>
                                Update terakhir: {{ $profilePage->updated_at->format('d M Y') }}
                            </div>

                            <div class="flex flex-wrap gap-3">
                                @php
                                $prevPage = $profilePages->where('order', '<', $profilePage->order)->sortByDesc('order')->first();
                                    $nextPage = $profilePages->where('order', '>', $profilePage->order)->sortBy('order')->first();
                                    @endphp

                                    @if ($prevPage)
                                    <a href="{{ route('frontend.profil-desa.show', $prevPage->slug) }}"
                                        class="inline-flex items-center rounded-xl bg-white border border-gray-200 px-5 py-2.5 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50 hover:text-blue-600 hover:shadow-md transition-all dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                                        <i class="fa-solid fa-arrow-left mr-2"></i>
                                        Sebelumnya
                                    </a>
                                    @endif

                                    @if ($nextPage)
                                    <a href="{{ route('frontend.profil-desa.show', $nextPage->slug) }}"
                                        class="inline-flex items-center rounded-xl bg-gradient-to-r from-blue-600 to-blue-700 px-5 py-2.5 text-sm font-semibold text-white shadow-md hover:shadow-lg hover:to-blue-800 transition-all dark:from-blue-600 dark:to-blue-700">
                                        Selanjutnya
                                        <i class="fa-solid fa-arrow-right ml-2"></i>
                                    </a>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

@include('frontend.includes.messages')

<!-- Share Modal (Flowbite Modal) - Keeps existing logic but ensuring styling matches -->
<div id="share-modal" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0 backdrop-blur-sm bg-gray-900/50">
    <div class="relative max-h-full w-full max-w-md">
        <div class="relative rounded-2xl bg-white shadow-2xl dark:bg-gray-800 ring-1 ring-gray-200 dark:ring-gray-700">
            <div class="flex items-center justify-between rounded-t border-b p-5 dark:border-gray-700">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                    Bagikan Halaman
                </h3>
                <button type="button" class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-700 dark:hover:text-white" data-modal-hide="share-modal">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-5">
                <div class="grid grid-cols-1 gap-3">
                    <!-- Social Buttons with better styling -->
                    <button type="button" onclick="shareToFacebook()" class="flex w-full items-center justify-center rounded-xl bg-[#1877F2] px-5 py-3 text-sm font-bold text-white hover:bg-[#1877F2]/90 transition-colors shadow-sm">
                        <i class="fa-brands fa-facebook mr-2 text-lg"></i> Facebook
                    </button>
                    <button type="button" onclick="shareToTwitter()" class="flex w-full items-center justify-center rounded-xl bg-[#1DA1F2] px-5 py-3 text-sm font-bold text-white hover:bg-[#1DA1F2]/90 transition-colors shadow-sm">
                        <i class="fa-brands fa-twitter mr-2 text-lg"></i> Twitter / X
                    </button>
                    <button type="button" onclick="shareToWhatsApp()" class="flex w-full items-center justify-center rounded-xl bg-[#25D366] px-5 py-3 text-sm font-bold text-white hover:bg-[#25D366]/90 transition-colors shadow-sm">
                        <i class="fa-brands fa-whatsapp mr-2 text-lg"></i> WhatsApp
                    </button>
                    <div class="relative my-2">
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="w-full border-t border-gray-200 dark:border-gray-700"></div>
                        </div>
                        <div class="relative flex justify-center">
                            <span class="bg-white px-2 text-sm text-gray-500 dark:bg-gray-800 dark:text-gray-400">Atau</span>
                        </div>
                    </div>
                    <button type="button" onclick="copyLink()" class="flex w-full items-center justify-center rounded-xl border-2 border-gray-200 bg-white px-5 py-3 text-sm font-bold text-gray-700 hover:bg-gray-50 hover:border-gray-300 transition-all dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:bg-gray-600">
                        <i class="fa-regular fa-copy mr-2 text-lg"></i> Salin Tautan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-styles')
<style>
    /* Typography Improvements */
    .prose {
        color: #374151;
        line-height: 1.8;
        font-size: 1.125rem;
    }

    .prose h1, .prose h2, .prose h3, .prose h4 {
        color: #1e40af;
        font-weight: 800;
        letter-spacing: -0.025em;
        margin-top: 2.5rem;
    }

    .prose h2 {
        font-size: 1.875rem;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #e5e7eb;
        display: inline-block;
        width: 100%;
    }

    .prose h3 {
        font-size: 1.5rem;
        margin-bottom: 0.75rem;
    }

    .prose p {
        margin-bottom: 1.5rem;
        text-align: justify;
    }

    /* STRICT LIST STYLING - FORCED */
    .prose ul, .prose ol {
        margin-top: 1rem;
        margin-bottom: 1.5rem;
        padding-left: 2rem !important; /* Force padding */
        list-style-position: outside !important;
        display: block !important;
    }

    .prose ul {
        list-style-type: disc !important;
    }

    .prose ol {
        list-style-type: decimal !important;
    }

    .prose li {
        margin-bottom: 0.75rem;
        padding-left: 0.5rem;
        display: list-item !important; /* Essential for markers */
    }

    .prose li::marker {
        color: #1e40af;
        font-weight: bold;
    }

    .prose strong {
        color: #111827;
        font-weight: 700;
    }

    .prose blockquote {
        border-left: 4px solid #3b82f6;
        background-color: #eff6ff;
        padding: 1rem 1.5rem;
        font-style: italic;
        border-radius: 0 0.5rem 0.5rem 0;
        color: #1e40af;
        margin-top: 2rem;
        margin-bottom: 2rem;
    }

    .prose a {
        color: #2563eb;
        text-decoration: none;
        border-bottom: 1px solid transparent;
        transition: border-color 0.2s;
    }

    .prose a:hover {
        color: #1d4ed8;
        border-bottom-color: #1d4ed8;
    }

    /* Table styling improvements */
    .prose table {
        width: 100%;
        margin-top: 2rem;
        margin-bottom: 2rem;
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    }

    .prose th {
        background-color: #f3f4f6;
        color: #111827;
        font-weight: 600;
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }

    .prose td {
        padding: 1rem;
        border-bottom: 1px solid #e5e7eb;
        color: #374151;
    }

    .prose tr:last-child td {
        border-bottom: none;
    }

    .prose tr:hover td {
        background-color: #f9fafb;
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

    @media print {
        .no-print { display: none !important; }
        .prose { font-size: 12pt; }
        .prose a { text-decoration: underline; color: #000; }
    }
</style>
@endpush

@push('after-scripts')
<script>
    const pageUrl = "{{ url()->current() }}";
    const pageTitle = "{{ $profilePage->title }}";

    function shareContent() {
        const modalElement = document.getElementById('share-modal');
        const modal = new Modal(modalElement);
        modal.show();
    }

    // ... Other functions remain same, ensure FontAwesome is loaded in app layout ...
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
            // Simple toast logic could be added here
            alert('Link berhasil disalin!');
        } catch (err) {
            console.error('Failed to copy: ', err);
        }
    }

    // Auto init flowbite
    document.addEventListener('DOMContentLoaded', function() {
        const modalElement = document.getElementById('share-modal');
        if (modalElement) {
            const modal = new Modal(modalElement, {
                backdrop: 'dynamic',
                backdropClasses: 'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
                closable: true
            });
            window.shareModal = modal;
        }
    });

    // Override shareContent to use global instance specific logic if needed
    window.shareContent = function() {
        if (window.shareModal) window.shareModal.show();
    }
</script>
@endpush