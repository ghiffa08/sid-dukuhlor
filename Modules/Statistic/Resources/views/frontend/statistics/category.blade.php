@extends('frontend.layouts.app')

@section('title') {{ $chartData['category_name'] }} - {{ __($module_title) }} @endsection

@section('content')

<!-- Hero Section with Gradient -->
<section class="bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 py-20 text-white">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <nav class="mb-8 flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('frontend.index') }}" class="inline-flex items-center text-sm font-medium text-white hover:text-blue-200">
                        <svg class="me-2.5 h-3 w-3" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="mx-1 h-3 w-3 text-white rtl:rotate-180" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" /></svg>
                        <a href="{{ route('frontend.statistik.index') }}" class="ms-1 text-sm font-medium text-white hover:text-blue-200 md:ms-2">
                            {{ __($module_title) }}
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="mx-1 h-3 w-3 text-white rtl:rotate-180" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" /></svg>
                        <span class="ms-1 text-sm font-medium text-blue-200 md:ms-2">{{ $chartData['category_name'] }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Page Title -->
        <div class="max-w-4xl">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl lg:text-6xl">
                {{ $chartData['category_name'] }}
            </h1>
            <p class="mb-6 text-lg font-normal text-blue-100 lg:text-xl">
                Data Statistik Kategori {{ $chartData['category_name'] }}
            </p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="bg-gray-50 py-12 dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-4">
            <!-- Sidebar Navigation -->
            <aside class="lg:col-span-1">
                <div class="sticky top-24">
                    <!-- Menu Card -->
                    <div class="mb-6 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-200 bg-gradient-to-r from-blue-600 to-blue-700 p-4 dark:border-gray-700">
                            <h3 class="flex items-center text-lg font-semibold text-white">
                                <i class="fa-solid fa-chart-pie me-2"></i> Menu Statistik
                            </h3>
                        </div>
                        <nav class="p-2">
                            <ul class="space-y-1" role="list">
                                @foreach($categories as $cat)
                                <li>
                                    <a href="{{ route('frontend.statistik.show', Str::slug($cat)) }}" wire:navigate
                                       class="group flex items-center rounded-lg px-3 py-2.5 text-sm font-medium transition-all {{ $chartData['category_name'] === $cat ? 'bg-blue-600 text-white shadow-sm' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                                        <i class="fa-solid fa-angle-right me-2.5 {{ $chartData['category_name'] === $cat ? 'text-white' : 'text-gray-400 group-hover:text-blue-600' }}"></i>
                                        <span class="flex-1">{{ $cat }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>

                    <!-- Quick Actions -->
                    <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-200 p-4 dark:border-gray-700">
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Aksi Cepat</h3>
                        </div>
                        <div class="p-4">
                            <div class="space-y-2">
                                <a href="{{ route('frontend.statistik.index') }}" class="flex items-center rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                                    <i class="fa-solid fa-list me-2 text-gray-500"></i> Semua Kategori
                                </a>
                                <a href="{{ route('frontend.index') }}" class="flex items-center rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                                    <i class="fa-solid fa-home me-2 text-gray-500"></i> Kembali ke Beranda
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Main Content Area -->
            <article class="lg:col-span-3 space-y-8">
                <!-- Chart Card -->
                <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800 relative min-h-[400px]">
                    <h3 class="mb-6 text-xl font-bold text-gray-900 dark:text-white border-l-4 border-blue-600 pl-3">
                        Grafik
                    </h3>
                    
                    <!-- Skeleton Loader -->
                    <div id="chartSkeleton" class="w-full animate-pulse space-y-4">
                        <div class="h-8 w-full rounded bg-gray-200 dark:bg-gray-700"></div>
                        <div class="h-8 w-3/4 rounded bg-gray-200 dark:bg-gray-700"></div>
                        <div class="h-8 w-5/6 rounded bg-gray-200 dark:bg-gray-700"></div>
                        <div class="h-8 w-2/3 rounded bg-gray-200 dark:bg-gray-700"></div>
                        <div class="h-8 w-4/5 rounded bg-gray-200 dark:bg-gray-700"></div>
                        <div class="h-8 w-full rounded bg-gray-200 dark:bg-gray-700"></div>
                    </div>

                    <!-- Chart Container (hidden initially) -->
                    <div id="categoryChart" class="w-full invisible"></div>
                </div>

                <!-- Data Table Card -->
                <div class="rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white border-l-4 border-blue-600 pl-3">
                            Tabel Data
                        </h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                            <thead class="bg-gray-100 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 w-16 text-center">No</th>
                                    <th scope="col" class="px-6 py-3">Kelompok</th>
                                    <th scope="col" class="px-6 py-3 text-right">Jumlah</th>
                                    <th scope="col" class="px-6 py-3 text-right">%</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = $statistics->sum('value'); @endphp
                                @foreach($statistics as $item)
                                <tr class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 text-center">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $item->title }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        {{ number_format($item->value, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        {{ $total > 0 ? number_format(($item->value / $total) * 100, 2, ',', '.') : 0 }}%
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="bg-gray-100 font-semibold text-gray-900 dark:bg-gray-700 dark:text-white">
                                <tr>
                                    <th scope="row" colspan="2" class="px-6 py-3 text-center">JUMLAH</th>
                                    <td class="px-6 py-3 text-right">{{ number_format($total, 0, ',', '.') }}</td>
                                    <td class="px-6 py-3 text-right">100%</td>
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
        // Destroy existing chart if it exists to prevent duplicates/memory leaks
        // However, since wire:navigate replaces the DOM, the old container is gone. 
        // We just need to ensure we don't render into a null container or double render.
        const chartContainer = document.querySelector("#categoryChart");
        if (!chartContainer) return;

        // Check if chart is already initialized on this element to avoid double render
        // (Though with wire:navigate replacing DOM, it's usually a fresh element)
        if (chartContainer.innerHTML !== '') {
            chartContainer.innerHTML = ''; // safe clear
        }

        var options = {
            series: [{
                name: 'Jumlah',
                data: @json($chartData['series'])
            }],
            chart: {
                type: 'bar',
                height: Math.max(400, {{ count($chartData['labels']) }} * 50 + 100),
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
                    barHeight: '70%',
                    distributed: true,
                    dataLabels: { position: 'bottom' },
                }
            },
            colors: @json($chartData['colors']),
            dataLabels: {
                enabled: true,
                textAnchor: 'start',
                style: {
                    colors: ['#fff']
                },
                formatter: function (val, opt) {
                    return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
                },
                offsetX: 0,
            },
            stroke: {
                width: 1,
                colors: ['#fff']
            },
            xaxis: {
                categories: @json($chartData['labels']),
                labels: {
                    style: { fontSize: '12px' }
                }
            },
            yaxis: {
                labels: {
                   show: true,
                   style: {
                       fontSize: '13px',
                       fontWeight: 500,
                   },
                   maxWidth: 200
                }
            },
            grid: {
                strokeDashArray: 4,
                xaxis: {
                    lines: {
                        show: true
                    }
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
