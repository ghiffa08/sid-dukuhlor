@extends('frontend.layouts.app')

@section('title') {{ $chartData['category_name'] }} - {{ __($module_title) }} @endsection

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
                        <a href="{{ route('frontend.statistik.index') }}" class="ms-1 text-sm font-medium text-white hover:text-blue-200 md:ms-2">
                             {{ __($module_title) }}
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right mx-2 text-xs text-blue-300"></i>
                        <span class="ms-1 text-sm font-medium text-blue-200 md:ms-2">{{ $chartData['category_name'] }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="max-w-4xl">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl lg:text-6xl drop-shadow-sm">
                {{ $chartData['category_name'] }}
            </h1>
            <p class="text-lg font-light text-blue-100 max-w-2xl">
                Data statistik detail untuk kategori {{ strtolower($chartData['category_name']) }}.
            </p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="bg-gray-50 py-12 dark:bg-gray-900 min-h-screen relative">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clean-gray-paper.png')] opacity-30"></div>

    <div class="container relative mx-auto px-4 z-10">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-4">
            <!-- Sidebar Navigation -->
            <aside class="lg:col-span-1 order-2 lg:order-1">
                <div class="sticky top-24 space-y-6">
                    <!-- Menu Card -->
                    <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-lg dark:border-gray-700 dark:bg-gray-800">
                        <div class="bg-gradient-to-r from-blue-700 to-blue-600 p-5 dark:border-gray-700">
                            <h3 class="flex items-center text-lg font-bold text-white tracking-wide">
                                <i class="fa-solid fa-chart-pie mr-3"></i> Menu Statistik
                            </h3>
                        </div>
                        <nav class="p-3">
                            <ul class="space-y-1" role="list">
                                @foreach($categories as $cat)
                                <li>
                                    <a href="{{ route('frontend.statistik.show', Str::slug($cat)) }}" wire:navigate
                                       class="group flex items-center rounded-xl px-4 py-3 text-sm font-medium transition-all {{ $chartData['category_name'] === $cat ? 'bg-blue-50 text-blue-700 shadow-sm ring-1 ring-blue-200' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                                        <i class="fa-solid fa-angle-right mr-3 {{ $chartData['category_name'] === $cat ? 'text-blue-600' : 'text-gray-300 group-hover:text-blue-500' }}"></i>
                                        <span class="flex-1">{{ $cat }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>

                    <!-- Quick Actions -->
                    <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-md dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-100 p-5 dark:border-gray-700">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-gray-900 dark:text-white">Navigasi</h3>
                        </div>
                        <div class="p-3">
                            <div class="space-y-1">
                                <a href="{{ route('frontend.statistik.index') }}" class="flex items-center rounded-xl px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-blue-600 transition-colors">
                                    <i class="fa-solid fa-list mr-3 text-gray-400 group-hover:text-blue-500"></i> Semua Kategori
                                </a>
                                <a href="{{ route('frontend.index') }}" class="flex items-center rounded-xl px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-blue-600 transition-colors">
                                    <i class="fa-solid fa-house mr-3 text-gray-400 group-hover:text-blue-500"></i> Kembali ke Beranda
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Main Content Area -->
            <article class="lg:col-span-3 space-y-8 order-1 lg:order-2">
                <!-- Chart Card -->
                <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-xl dark:border-gray-700 dark:bg-gray-800 min-h-[450px]">
                    <div class="border-b border-gray-100 bg-gray-50/50 p-6 dark:border-gray-700 dark:bg-gray-900/50">
                        <h3 class="flex items-center text-xl font-bold text-gray-900 dark:text-white">
                            <span class="mr-3 flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 text-blue-600">
                                <i class="fa-solid fa-chart-column text-sm"></i>
                            </span>
                            Grafik Data
                        </h3>
                    </div>
                    
                    <div class="p-6">
                        <!-- Skeleton Loader -->
                        <div id="chartSkeleton" class="w-full animate-pulse space-y-4">
                            <div class="h-8 w-full rounded bg-gray-200 dark:bg-gray-700"></div>
                            <div class="h-8 w-3/4 rounded bg-gray-200 dark:bg-gray-700"></div>
                            <div class="h-8 w-5/6 rounded bg-gray-200 dark:bg-gray-700"></div>
                            <div class="h-8 w-2/3 rounded bg-gray-200 dark:bg-gray-700"></div>
                            <div class="h-8 w-4/5 rounded bg-gray-200 dark:bg-gray-700"></div>
                        </div>

                        <!-- Chart Container -->
                        <div id="categoryChart" class="w-full invisible"></div>
                    </div>
                </div>

                <!-- Data Table Card -->
                <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-xl dark:border-gray-700 dark:bg-gray-800">
                    <div class="border-b border-gray-100 bg-gray-50/50 p-6 dark:border-gray-700 dark:bg-gray-900/50">
                        <h3 class="flex items-center text-xl font-bold text-gray-900 dark:text-white">
                             <span class="mr-3 flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 text-blue-600">
                                <i class="fa-solid fa-table text-sm"></i>
                            </span>
                            Tabel Data Rinci
                        </h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                            <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400 border-b border-gray-200">
                                <tr>
                                    <th scope="col" class="px-6 py-4 w-16 text-center">No</th>
                                    <th scope="col" class="px-6 py-4">Kelompok</th>
                                    <th scope="col" class="px-6 py-4 text-right">Jumlah</th>
                                    <th scope="col" class="px-6 py-4 text-right">%</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                                @php $total = $statistics->sum('value'); @endphp
                                @foreach($statistics as $item)
                                <tr class="bg-white hover:bg-blue-50/50 transition-colors dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 text-center font-medium text-gray-400">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                        {{ $item->title }}
                                    </td>
                                    <td class="px-6 py-4 text-right font-medium text-gray-700 dark:text-gray-300">
                                        {{ number_format($item->value, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-right text-gray-600 dark:text-gray-400">
                                        {{ $total > 0 ? number_format(($item->value / $total) * 100, 2, ',', '.') : 0 }}%
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="bg-blue-50/50 font-bold text-gray-900 dark:bg-gray-700 dark:text-white border-t border-gray-200">
                                <tr>
                                    <th scope="row" colspan="2" class="px-6 py-4 text-center uppercase tracking-wider text-xs text-gray-600">Total Keseluruhan</th>
                                    <td class="px-6 py-4 text-right">{{ number_format($total, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 text-right">100%</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

@push('after-scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    function initCategoryChart() {
        const chartContainer = document.querySelector("#categoryChart");
        if (!chartContainer) return;

        if (chartContainer.innerHTML !== '') {
            chartContainer.innerHTML = ''; 
        }

        var options = {
            series: [{
                name: 'Jumlah',
                data: @json($chartData['series'])
            }],
            chart: {
                type: 'bar',
                height: Math.max(450, {{ count($chartData['labels']) }} * 40 + 100),
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
                },
                background: 'transparent'
            },
            plotOptions: {
                bar: {
                    borderRadius: 6,
                    horizontal: true,
                    barHeight: '60%',
                    distributed: true, // Colorful bars
                    dataLabels: { position: 'bottom' },
                }
            },
            colors: @json($chartData['colors']),
            dataLabels: {
                enabled: true,
                textAnchor: 'start',
                style: {
                    colors: ['#fff'],
                    fontSize: '12px',
                    fontFamily: 'Inter, sans-serif',
                },
                formatter: function (val, opt) {
                    return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
                },
                offsetX: 0,
            },
            stroke: {
                width: 0,
            },
            xaxis: {
                categories: @json($chartData['labels']),
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
                       colors: ['#64748b'] // slate-500
                   },
                   maxWidth: 250
                }
            },
            grid: {
                borderColor: '#f1f5f9',
                strokeDashArray: 4,
                xaxis: {
                    lines: { show: true }
                },
                yaxis: {
                    lines: { show: false }
                },
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 10
                }  
            },
            tooltip: {
                theme: 'light',
                y: {
                    formatter: function (val) {
                        return val;
                    }
                }
            },
            legend: {
                show: false
            }
        };

        var chart = new ApexCharts(chartContainer, options);
        chart.render().then(() => {
            const skeleton = document.getElementById('chartSkeleton');
            const chartDiv = document.getElementById('categoryChart');
            
            if(skeleton) skeleton.classList.add('hidden');
            if(chartDiv) chartDiv.classList.remove('invisible');
        });
    }

    // Run on initial load
    document.addEventListener('DOMContentLoaded', initCategoryChart);
    // Run on Livewire navigation
    document.addEventListener('livewire:navigated', initCategoryChart);
</script>
@endpush

@endsection


