@extends('frontend.layouts.app')

@section('title') {{ __($module_title) }} @endsection

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 py-20 text-white">
    <div class="absolute inset-0 bg-[url('/images/pattern.svg')] opacity-10"></div>

    <div class="container relative mx-auto px-4">
        <div class="text-center">
            <h1 class="mb-4 text-4xl font-bold md:text-5xl">
                <i class="fa-solid fa-chart-line mr-2"></i>
                {{ __($module_title) }} Desa
            </h1>
            <p class="mx-auto max-w-2xl text-lg text-blue-100 md:text-xl">
            <p class="mx-auto max-w-2xl text-lg text-blue-100">
                Pilih kategori statistik untuk melihat detail data.
            </p>
        </div>
    </div>
</section>
<section class="py-12 bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($categories as $category)
            <div class="max-w-sm w-full bg-white rounded-lg border border-gray-200 shadow-sm transition-all duration-300 hover:shadow-lg hover:-translate-y-1 dark:bg-gray-800 dark:border-gray-700">
                <a href="{{ route('frontend.statistik.show', Str::slug($category)) }}">
                    <div class="p-6">
                        <!-- Icon with gradient background -->
                        <div class="mb-4 inline-flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 to-blue-700 shadow-md">
                            @php
                                $icon = match($category) {
                                    'Kependudukan' => 'fa-users',
                                    'Pendidikan' => 'fa-graduation-cap',
                                    'Kesehatan' => 'fa-briefcase-medical',
                                    'Ekonomi' => 'fa-chart-line',
                                    'Pekerjaan' => 'fa-briefcase',
                                    'Perumahan' => 'fa-home',
                                    default => 'fa-chart-pie'
                                };
                            @endphp
                            <i class="fa-solid {{ $icon }} text-2xl text-white"></i>
                        </div>
                        
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white group-hover:text-blue-600">
                            {{ $category }}
                        </h5>
                        
                        <p class="mb-5 font-normal text-gray-700 dark:text-gray-400">
                            Data statistik lengkap mengenai {{ strtolower($category) }} desa.
                        </p>
                        
                        <div class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Lihat Data
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection