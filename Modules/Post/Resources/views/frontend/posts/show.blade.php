@extends('frontend.layouts.app')

@section('title')
    {{ $$module_name_singular->name }} - Berita Desa
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
                        <a href="{{ route('frontend.posts.index') }}" class="ms-1 text-sm font-medium text-white hover:text-blue-200 md:ms-2">
                            Berita
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right mx-2 text-xs text-blue-300"></i>
                        <span class="ms-1 text-sm font-medium text-blue-200 md:ms-2 truncate max-w-xs">{{ $$module_name_singular->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Page Title -->
        <div class="max-w-4xl">
            <h1 class="mb-4 text-4xl font-extrabold leading-tight tracking-tight md:text-5xl lg:text-6xl drop-shadow-sm">
                {{ $$module_name_singular->name }}
            </h1>
            
            <!-- Metadata Badges -->
            <div class="flex flex-wrap items-center gap-3 mt-6">
                <!-- Date -->
                <span class="inline-flex items-center rounded-full bg-white/20 backdrop-blur-sm px-4 py-1.5 text-sm font-medium text-white border border-white/20">
                    <i class="fa-regular fa-calendar mr-2"></i>
                    {{ $$module_name_singular->created_at->isoFormat('D MMMM Y') }}
                </span>

                <!-- Author -->
                <span class="inline-flex items-center rounded-full bg-white/20 backdrop-blur-sm px-4 py-1.5 text-sm font-medium text-white border border-white/20">
                    <i class="fa-regular fa-user mr-2"></i>
                    {{ $$module_name_singular->created_by_alias ?? $$module_name_singular->created_by_name }}
                </span>

                <!-- Category -->
                @if($$module_name_singular->category)
                <a href="{{ route('frontend.categories.show', [encode_id($$module_name_singular->category_id), $$module_name_singular->category->slug]) }}" 
                   class="inline-flex items-center rounded-full bg-blue-500/80 hover:bg-blue-600/80 backdrop-blur-sm px-4 py-1.5 text-sm font-medium text-white border border-blue-400/30 transition-colors">
                    <i class="fa-solid fa-folder-open mr-2"></i>
                    {{ $$module_name_singular->category->name }}
                </a>
                @endif
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
            
            <!-- Sidebar Navigation (Recent News) -->
            <aside class="lg:col-span-1 order-2 lg:order-1">
                <div class="sticky top-24 space-y-8">
                    <!-- Recent Posts Card -->
                    <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-lg dark:border-gray-700 dark:bg-gray-800">
                        <div class="bg-gradient-to-r from-blue-700 to-blue-600 p-5 dark:border-gray-700">
                            <h3 class="flex items-center text-lg font-bold text-white tracking-wide">
                                <i class="fa-solid fa-newspaper mr-3"></i>
                                Berita Terbaru
                            </h3>
                        </div>
                        <div class="p-4">
                            <!-- Using Recent Posts Component -->
                            <livewire:frontend.recent-posts /> 
                        </div>
                    </div>

                    <!-- Tags Card (if exists) -->
                    @if(count($$module_name_singular->tags))
                    <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-md dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-100 p-5 dark:border-gray-700">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-gray-900 dark:text-white">Tags</h3>
                        </div>
                        <div class="p-4 flex flex-wrap gap-2">
                            @foreach($$module_name_singular->tags as $tag)
                                <a href="{{ route('frontend.tags.show', [encode_id($tag->id), $tag->slug]) }}" 
                                   class="inline-flex items-center rounded-lg bg-gray-100 px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-blue-100 hover:text-blue-700 transition-colors dark:bg-gray-700 dark:text-gray-300">
                                    #{{ $tag->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </aside>

            <!-- Main Content Area -->
            <article class="lg:col-span-3 order-1 lg:order-2">
                <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-xl dark:border-gray-700 dark:bg-gray-800">
                    <!-- Featured Image -->
                    @if ($$module_name_singular->image)
                    <div class="relative h-64 md:h-96 w-full overflow-hidden group">
                        <img src="{{ $$module_name_singular->image }}" alt="{{ $$module_name_singular->name }}"
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-80"></div>
                        <div class="absolute bottom-6 left-6 md:bottom-8 md:left-8">
                             <button type="button" onclick="shareContent()" class="group inline-flex items-center rounded-lg bg-white/20 px-4 py-2 text-sm font-bold text-white hover:bg-white/30 backdrop-blur-md transition-all">
                                <i class="fa-solid fa-share-nodes mr-2"></i> Bagikan
                            </button>
                        </div>
                    </div>
                    @endif

                    <!-- Content Body -->
                    <div class="p-6 md:p-10">
                        <!-- Intro/Excerpt if exists -->
                        @if($$module_name_singular->intro)
                            <div class="mb-8 p-6 bg-blue-50 border-l-4 border-blue-500 rounded-r-lg dark:bg-blue-900/20 dark:border-blue-700">
                                <p class="text-lg font-medium text-blue-900 dark:text-blue-100 italic leading-relaxed">
                                    "{{ $$module_name_singular->intro }}"
                                </p>
                            </div>
                        @endif

                        <!-- Main Content with Strict Typography -->
                        <div class="prose prose-lg max-w-none dark:prose-invert">
                            {!! $$module_name_singular->content !!}
                        </div>
                    </div>

                    <!-- Footer Navigation / Author Box -->
                    <div class="border-t border-gray-100 bg-gray-50 px-6 py-8 md:px-10 dark:border-gray-700 dark:bg-gray-900/50">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-xl font-bold">
                                    {{ substr($$module_name_singular->created_by_alias ?? $$module_name_singular->created_by_name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">Penulis</p>
                                    <p class="text-base font-bold text-gray-700 dark:text-gray-300">
                                        {{ $$module_name_singular->created_by_alias ?? $$module_name_singular->created_by_name }}
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Share Buttons (Small) -->
                            <div class="flex gap-2">
                                <button onclick="shareToWhatsApp()" class="h-10 w-10 rounded-full bg-[#25D366] text-white flex items-center justify-center hover:scale-110 transition-transform shadow-sm">
                                    <i class="fa-brands fa-whatsapp text-lg"></i>
                                </button>
                                <button onclick="shareToFacebook()" class="h-10 w-10 rounded-full bg-[#1877F2] text-white flex items-center justify-center hover:scale-110 transition-transform shadow-sm">
                                    <i class="fa-brands fa-facebook-f text-lg"></i>
                                </button>
                                <button onclick="shareToTwitter()" class="h-10 w-10 rounded-full bg-[#1DA1F2] text-white flex items-center justify-center hover:scale-110 transition-transform shadow-sm">
                                    <i class="fa-brands fa-twitter text-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Comments Section (Placeholder/Component) -->
                @if(config('app.comments_enabled', false))
                <div class="mt-8">
                     @include('post::frontend.posts.blocks.comments')
                </div>
                @endif
            </article>
        </div>
    </div>
</section>

<!-- Share Modal (Copied from ProfileDesa for consistency) -->
<div id="share-modal" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0 backdrop-blur-sm bg-gray-900/50">
    <div class="relative max-h-full w-full max-w-md">
        <div class="relative rounded-2xl bg-white shadow-2xl dark:bg-gray-800 ring-1 ring-gray-200 dark:ring-gray-700">
            <div class="flex items-center justify-between rounded-t border-b p-5 dark:border-gray-700">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                    Bagikan Berita
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
        padding-left: 2rem !important;
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
        display: list-item !important;
    }

    .prose li::marker {
        color: #1e40af;
        font-weight: bold;
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
    
    .prose iframe {
        width: 100%;
        min-height: 400px;
        border: 0;
        border-radius: 0.5rem;
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
    }
</style>
@endpush

@push('after-scripts')
<script>
    const pageUrl = "{{ url()->current() }}";
    const pageTitle = "{{ $$module_name_singular->name }}";

    function shareContent() {
        const modalElement = document.getElementById('share-modal');
        if(typeof Modal !== 'undefined') {
            const modal = new Modal(modalElement);
            modal.show();
            window.shareModal = modal;
        } else {
            // Fallback if Flowbite Modal js isn't loaded yet?
            document.getElementById('share-modal').classList.remove('hidden');
        }
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
            alert('Link berhasil disalin!');
        } catch (err) {
            console.error('Failed to copy: ', err);
        }
    }
    
    // Auto init for Flowbite
    document.addEventListener('DOMContentLoaded', function() {
        const modalElement = document.getElementById('share-modal');
        if (modalElement && typeof Modal !== 'undefined') {
            const modal = new Modal(modalElement, {
                backdrop: 'dynamic',
                backdropClasses: 'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
                closable: true
            });
            window.shareModal = modal;
        }
    });
</script>
@endpush


