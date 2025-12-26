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
                        <span class="ms-1 text-sm font-medium text-blue-200 md:ms-2">Transparansi</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="text-center md:text-left max-w-4xl">
            <h1 class="mb-4 text-4xl font-extrabold leading-tight tracking-tight md:text-5xl lg:text-6xl drop-shadow-sm">
                <i class="fa-solid fa-file-invoice-dollar mr-3 opacity-80"></i>{{ __($module_title) }} Desa
            </h1>
            <p class="text-lg font-light text-blue-100 max-w-2xl leading-relaxed">
                Wujud komitmen pemerintah desa dalam pengelolaan anggaran yang terbuka, akuntabel, dan partisipatif.
            </p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="bg-gray-50 py-16 dark:bg-gray-900 relative min-h-screen">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clean-gray-paper.png')] opacity-30"></div>
    
    <div class="container relative mx-auto px-4 z-10">
        <h2 class="mb-8 text-2xl font-bold text-gray-800 dark:text-white border-l-4 border-blue-600 pl-4">
            Arsip Laporan APBDes
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($years as $year)
            <a href="{{ route('frontend.transparansi.show', 'apbdes-' . $year) }}" wire:navigate class="group relative flex flex-col overflow-hidden rounded-2xl bg-white shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-xl dark:bg-gray-800 border border-gray-100 dark:border-gray-700">
                <div class="p-6 flex flex-row items-center gap-4">
                    <!-- Icon Bubble -->
                    <div class="inline-flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-2xl bg-blue-50 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300 dark:bg-gray-700 dark:text-blue-400">
                        <i class="fa-solid fa-folder-open text-3xl"></i>
                    </div>
                    
                    <div class="flex-1">
                        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white group-hover:text-blue-600 transition-colors">
                            {{ $year }}
                        </h5>
                        <p class="text-xs text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wide">
                            Tahun Anggaran
                        </p>
                    </div>
                    
                     <div class="text-gray-300 group-hover:text-blue-500 transition-colors">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </div>
                <div class="bg-blue-50/50 px-6 py-3 border-t border-gray-100 dark:border-gray-700 dark:bg-gray-800/50">
                    <span class="text-xs font-semibold text-blue-600 dark:text-blue-400 flex items-center">
                        Buka Laporan <i class="fa-solid fa-arrow-right ml-2 text-[10px] transition-transform group-hover:translate-x-1"></i>
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
