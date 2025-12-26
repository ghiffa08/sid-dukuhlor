@extends('frontend.layouts.app')

@section('title') {{ __($module_title) }} - Website Desa @endsection

@section('content')
<!-- Hero Section -->
<section class="relative z-0 bg-gradient-to-br from-blue-900 via-blue-800 to-cyan-800 py-20 text-white overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-20"></div>
    <div class="container relative mx-auto px-4 z-10">
        <!-- Breadcrumb -->
        <nav class="mb-6 flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse opacity-90 hover:opacity-100 transition-opacity">
                <li class="inline-flex items-center">
                    <a href="{{ route('frontend.index') }}" class="inline-flex items-center text-sm font-medium text-white hover:text-blue-200">
                        <i class="fa-solid fa-house mr-2"></i> Beranda
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right mx-2 text-xs text-blue-300"></i>
                        <span class="ms-1 text-sm font-medium text-blue-200 md:ms-2">Statistik</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="text-center md:text-left max-w-4xl">
            <h1 class="mb-4 text-4xl font-extrabold leading-tight tracking-tight md:text-5xl lg:text-6xl drop-shadow-sm">
                <i class="fa-solid fa-chart-pie mr-3 opacity-80"></i>{{ __($module_title) }} Desa
            </h1>
            <p class="text-lg font-light text-blue-100 max-w-2xl leading-relaxed">
                Transparansi data dan informasi statistik desa untuk pembangunan yang lebih terukur. Pilih kategori di bawah untuk melihat detail.
            </p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="bg-gray-50 py-16 dark:bg-gray-900 relative min-h-screen">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clean-gray-paper.png')] opacity-30"></div>
    
    <div class="container relative mx-auto px-4 z-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($categories as $category)
            @php
                $slug = Str::slug($category);
                $icon = match($category) {
                    'Kependudukan', 'Penduduk', 'Populasi' => 'fa-users',
                    'Pendidikan' => 'fa-graduation-cap',
                    'Kesehatan' => 'fa-briefcase-medical',
                    'Ekonomi' => 'fa-coins',
                    'Pekerjaan', 'Profesi' => 'fa-briefcase',
                    'Perumahan' => 'fa-house-chimney',
                    'Pertanian' => 'fa-wheat-awn',
                    'Wilayah', 'Geografis' => 'fa-map-location-dot',
                    'Agama' => 'fa-mosque',
                    'Umur', 'Usia' => 'fa-child-reaching',
                    default => 'fa-chart-simple'
                };
                
                // Colors for variety (optional, can stick to blue)
                $gradient = match($loop->iteration % 4) {
                    1 => 'from-blue-500 to-blue-700',
                    2 => 'from-cyan-500 to-blue-600',
                    3 => 'from-indigo-500 to-purple-700',
                    0 => 'from-teal-500 to-emerald-700',
                    default => 'from-blue-500 to-blue-700'
                };
            @endphp
            
            <a href="{{ route('frontend.statistik.show', $slug) }}" class="group relative flex flex-col overflow-hidden rounded-2xl bg-white shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-xl dark:bg-gray-800 border border-gray-100 dark:border-gray-700 h-full">
                <div class="p-6 flex flex-col items-center text-center flex-grow">
                    <!-- Icon Bubble -->
                    <div class="mb-6 inline-flex h-20 w-20 items-center justify-center rounded-2xl bg-gradient-to-br {{ $gradient }} shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300 ring-4 ring-white dark:ring-gray-800">
                        <i class="fa-solid {{ $icon }} text-3xl text-white"></i>
                    </div>
                    
                    <h5 class="mb-3 text-xl font-bold tracking-tight text-gray-900 dark:text-white group-hover:text-blue-600 transition-colors">
                        {{ $category }}
                    </h5>
                    
                    <p class="mb-4 text-sm text-gray-500 dark:text-gray-400 line-clamp-3">
                        Lihat data statistik lengkap mengenai {{ strtolower($category) }}.
                    </p>
                    
                    <div class="mt-auto pt-4 border-t border-gray-50 w-full dark:border-gray-700">
                         <span class="inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors">
                            Buka Data <i class="fa-solid fa-arrow-right ml-2 text-xs transition-transform group-hover:translate-x-1"></i>
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
