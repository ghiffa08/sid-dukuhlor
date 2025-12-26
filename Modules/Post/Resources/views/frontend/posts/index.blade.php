@extends('frontend.layouts.app')

@section('title')
    {{ __($module_title) }} - Website Desa
@endsection

@section('content')
<!-- Hero Section -->
<section class="relative z-0 bg-gradient-to-br from-blue-900 via-blue-800 to-cyan-800 py-20 text-white overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-20"></div>
    <div class="container relative mx-auto px-4 z-10">
        <!-- Breadcrumb -->
        <nav class="mb-4 flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse opacity-90 hover:opacity-100 transition-opacity">
                <li class="inline-flex items-center">
                    <a href="{{ route('frontend.index') }}" class="inline-flex items-center text-sm font-medium text-white hover:text-blue-200">
                        <i class="fa-solid fa-house mr-2"></i> Beranda
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right mx-2 text-xs text-blue-300"></i>
                        <span class="ms-1 text-sm font-medium text-blue-200 md:ms-2">Berita</span>
                    </div>
                </li>
            </ol>
        </nav>

        <h1 class="mb-4 text-4xl font-extrabold leading-tight tracking-tight md:text-5xl drop-shadow-sm">
            Berita & Artikel
        </h1>
        <p class="text-lg font-light text-blue-100 max-w-2xl">
            Informasi terbaru, kegiatan, dan pengumuman penting seputar desa kami.
        </p>
    </div>
</section>

<!-- Main Content -->
<section class="bg-gray-50 py-16 dark:bg-gray-900 relative min-h-screen">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clean-gray-paper.png')] opacity-30"></div>
    
    <div class="container relative mx-auto px-4 z-10">
        <!-- Posts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($$module_name as $$module_name_singular)
                @php
                    $details_url = route("frontend.$module_name.show", [
                        encode_id($$module_name_singular->id),
                        $$module_name_singular->slug,
                    ]);
                    $hasImage = !empty($$module_name_singular->image) && file_exists(public_path($$module_name_singular->image));
                    // Fallback to simple check if file existence check fails or if it's an external URL (though unlikely for local)
                    if(!empty($$module_name_singular->image) && filter_var($$module_name_singular->image, FILTER_VALIDATE_URL)) {
                        $hasImage = true;
                    } elseif(!empty($$module_name_singular->image)) {
                         // Assume it works if string is not empty, usually handled by accessor
                         $hasImage = true;
                    }
                @endphp

                <article class="group relative flex flex-col rounded-2xl bg-white shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-xl dark:bg-gray-800 dark:border-gray-700 overflow-hidden border border-gray-100">
                    
                    <!-- Image / Fallback -->
                    <a href="{{ $details_url }}" class="relative block overflow-hidden aspect-video">
                        @if ($$module_name_singular->image)
                             <img src="{{ $$module_name_singular->image }}" 
                                 alt="{{ $$module_name_singular->name }}" 
                                 class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                             />
                             <!-- Fallback if specific image fails load -->
                             <div class="hidden absolute inset-0 bg-gradient-to-br from-blue-400 to-cyan-300 items-center justify-center">
                                <i class="fa-regular fa-newspaper text-5xl text-white/50"></i>
                             </div>
                        @else
                            <!-- Default Fallback Pattern -->
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-cyan-500 flex items-center justify-center group-hover:from-blue-700 group-hover:to-cyan-600 transition-colors">
                                <i class="fa-regular fa-newspaper text-5xl text-white/30 group-hover:text-white/50 transition-colors group-hover:scale-110 duration-500"></i>
                            </div>
                        @endif

                        <!-- Category Badge -->
                        @if($$module_name_singular->category)
                        <div class="absolute top-4 left-4 z-10">
                            <span class="rounded-lg bg-blue-600/90 px-3 py-1 text-xs font-bold uppercase tracking-wider text-white backdrop-blur-sm shadow-sm">
                                {{ $$module_name_singular->category->name }}
                            </span>
                        </div>
                        @endif
                    </a>

                    <!-- Content -->
                    <div class="flex flex-1 flex-col p-6">
                        <!-- Metadata -->
                        <div class="mb-4 flex items-center gap-4 text-xs font-medium text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-1">
                                <i class="fa-regular fa-calendar text-blue-500"></i>
                                <span>{{ $$module_name_singular->created_at->isoFormat('D MMM Y') }}</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <i class="fa-regular fa-user text-blue-500"></i>
                                <span class="truncate max-w-[100px]">{{ $$module_name_singular->created_by_alias ?? $$module_name_singular->created_by_name }}</span>
                            </div>
                        </div>

                        <!-- Title -->
                        <h2 class="mb-3 text-xl font-bold leading-tight text-gray-900 group-hover:text-blue-600 dark:text-white transition-colors line-clamp-2">
                            <a href="{{ $details_url }}">
                                {{ $$module_name_singular->name }}
                            </a>
                        </h2>

                        <!-- Excerpt -->
                        <p class="mb-4 flex-1 text-sm text-gray-600 dark:text-gray-300 line-clamp-3">
                            {{ Str::limit(strip_tags($$module_name_singular->intro ?? $$module_name_singular->content), 120) }}
                        </p>

                        <!-- Footer / Link -->
                        <div class="mt-auto flex items-center justify-between border-t border-gray-100 pt-4 dark:border-gray-700">
                             <a href="{{ $details_url }}" class="inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors group-hover:underline decoration-blue-300 underline-offset-4">
                                Baca Selengkapnya <i class="fa-solid fa-arrow-right ml-2 text-xs transition-transform group-hover:translate-x-1"></i>
                            </a>
                            
                            <!-- Tags Count or Icon -->
                            @if(count($$module_name_singular->tags))
                                <span class="text-xs text-gray-400" title="Tags">
                                    <i class="fa-solid fa-tags mr-1"></i> {{ count($$module_name_singular->tags) }}
                                </span>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12 w-full flex justify-center">
            {{ $$module_name->onEachSide(1)->links('pagination::tailwind') }}
        </div>
    </div>
</section>
@endsection



