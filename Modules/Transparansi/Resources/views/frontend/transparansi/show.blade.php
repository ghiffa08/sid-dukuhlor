@extends('frontend.layouts.app')

@section('title') {{$statistic->title}} - {{ __($module_title) }} @endsection

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
                 <li>
                    <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right mx-2 text-xs text-blue-300"></i>
                        <a href="{{ route('frontend.transparansi.index') }}" class="ms-1 text-sm font-medium text-white hover:text-blue-200 md:ms-2">
                             {{ __($module_title) }}
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right mx-2 text-xs text-blue-300"></i>
                        <span class="ms-1 text-sm font-medium text-blue-200 md:ms-2 line-clamp-1">{{$statistic->title}}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="max-w-4xl">
            <div class="mb-4 inline-flex items-center rounded-full bg-blue-500/20 px-3 py-1 text-xs font-medium text-blue-200 ring-1 ring-inset ring-blue-500/40 backdrop-blur-sm">
                <i class="fa-solid fa-tag mr-2"></i> {{ $statistic->category }}
            </div>
            <h1 class="mb-4 text-4xl font-extrabold leading-tight tracking-tight md:text-5xl lg:text-6xl drop-shadow-sm">
                {{$statistic->title}}
            </h1>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="bg-gray-50 py-12 dark:bg-gray-900 min-h-screen relative">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clean-gray-paper.png')] opacity-30"></div>

    <div class="container relative mx-auto px-4 z-10">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-4">
             <!-- Sidebar Navigation (Reusable) -->
            <aside class="lg:col-span-1 order-2 lg:order-1">
                <div class="sticky top-24 space-y-6">
                    <!-- Quick Actions -->
                     <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-md dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-100 p-5 dark:border-gray-700">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-gray-900 dark:text-white">Navigasi</h3>
                        </div>
                        <div class="p-3">
                            <div class="space-y-1">
                                <a href="{{ route('frontend.transparansi.index') }}" class="flex items-center rounded-xl px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-blue-600 transition-colors">
                                    <i class="fa-solid fa-list mr-3 text-gray-400 group-hover:text-blue-500"></i> Semua Data Transparansi
                                </a>
                                 <a href="{{ route('frontend.transparansi.show', Str::slug($statistic->category)) }}" class="flex items-center rounded-xl px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-blue-600 transition-colors">
                                    <i class="fa-solid fa-arrow-left mr-3 text-gray-400 group-hover:text-blue-500"></i> Kembali ke Kategori
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Main Content Area -->
            <article class="lg:col-span-3 space-y-8 order-1 lg:order-2">
                 <!-- Description Card -->
                <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-lg dark:border-gray-700 dark:bg-gray-800">
                     <div class="p-8">
                        <div class="prose prose-lg old-reset max-w-none text-gray-600 dark:prose-invert dark:text-gray-300">
                            {!! $statistic->description !!}
                        </div>
                    </div>
                </div>

                <!-- Chart Card -->
                <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-xl dark:border-gray-700 dark:bg-gray-800 min-h-[450px]">
                    <div class="border-b border-gray-100 bg-gray-50/50 p-6 dark:border-gray-700 dark:bg-gray-900/50">
                        <h3 class="flex items-center text-xl font-bold text-gray-900 dark:text-white">
                            <span class="mr-3 flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 text-blue-600">
                                <i class="fa-solid fa-chart-bar text-sm"></i>
                            </span>
                            Visualisasi Data
                        </h3>
                    </div>
                    <div class="p-6">
                        <div id="chart" class="w-full"></div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

@push('after-scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var relatedStats = @json($statistics);
        
        var labels = relatedStats.map(item => item.title);
        var data = relatedStats.map(item => item.budget);
        var colors = relatedStats.map(item => item.color || '#3B82F6');

        var options = {
            series: [{
                name: 'Jumlah',
                data: data
            }],
            chart: {
                type: 'bar',
                height: Math.max(400, labels.length * 50 + 100),
                fontFamily: 'Inter, sans-serif',
                toolbar: { show: false },
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 800,
                     animateGradually: {
                        enabled: true,
                        delay: 150
                    },
                    dynamicAnimation: {
                        enabled: true,
                        speed: 350
                    }
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                    barHeight: '60%',
                    distributed: true,
                    dataLabels: { position: 'bottom' },
                }
            },
            colors: colors,
            dataLabels: {
                enabled: true,
                textAnchor: 'start',
                style: {
                    colors: ['#fff'],
                    fontSize: '12px',
                    fontFamily: 'Inter, sans-serif'
                },
                formatter: function (val, opt) {
                     return opt.w.globals.labels[opt.dataPointIndex] + ": " + val
                },
                offsetX: 0,
            },
            stroke: {
                width: 0,
            },
            xaxis: {
                categories: labels,
                labels: { 
                    style: { fontSize: '12px', fontFamily: 'Inter, sans-serif' } 
                },
                axisBorder: { show: false },
                axisTicks: { show: false }
            },
            yaxis: {
                labels: {
                   show: true,
                   style: {
                       fontSize: '13px',
                       fontWeight: 600,
                       fontFamily: 'Inter, sans-serif',
                       colors: ['#64748b']
                   },
                   maxWidth: 200
                }
            },
            grid: {
                borderColor: '#f1f5f9',
                strokeDashArray: 4,
                xaxis: { lines: { show: true } },
                yaxis: { lines: { show: false } },
                 padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 10
                }
            },
            tooltip: {
                theme: 'light',
            },
            legend: { show: false }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
</script>
@endpush

@endsection
