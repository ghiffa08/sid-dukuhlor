@extends('frontend.layouts.app')

@section('title') {{$statistic->title}} - {{ __($module_title) }} @endsection

@section('content')

<section class="bg-gray-100 text-gray-600 py-10 sm:py-20">
    <div class="container mx-auto flex px-5 items-center justify-center flex-col">
        <div class="text-center lg:w-2/3 w-full">
            <p class="mb-8 leading-relaxed">
                <a href="{{route('frontend.'.$module_name.'.index')}}" class="outline outline-1 outline-gray-800 bg-gray-200 hover:bg-gray-100 text-gray-800 text-sm font-semibold mr-2 px-3 py-1 rounded dark:bg-gray-700 dark:text-gray-300">
                    {{ __($module_title) }}
                </a>
            </p>
            <h1 class="text-3xl sm:text-4xl mb-4 font-medium text-gray-800">
                {{$statistic->title}}
            </h1>
            <div class="mb-8 leading-relaxed text-left">
                {!! $statistic->description !!}
            </div>

            @include('frontend.includes.messages')
        </div>
    </div>
</section>


<!-- Chart Section -->
<section class="py-12 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <h3 class="mb-6 text-xl font-bold text-gray-900 dark:text-white border-l-4 border-blue-600 pl-3">
                Grafik Statistik Kategori {{ $statistic->category }}
            </h3>
            <div id="chart" class="w-full"></div>
        </div>
    </div>
</section>

@push('after-scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var relatedStats = @json($statistics);
        
        var labels = relatedStats.map(item => item.title);
        var data = relatedStats.map(item => item.value);
        var colors = relatedStats.map(item => item.color || '#3B82F6');

        var options = {
            series: [{
                name: 'Jumlah',
                data: data
            }],
            chart: {
                type: 'bar',
                // Dynamic height
                height: Math.max(400, labels.length * 50 + 100),
                fontFamily: 'Inter, sans-serif',
                toolbar: { show: false }
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
            colors: colors,
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
                categories: labels,
                labels: { style: { fontSize: '12px' } }
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
                xaxis: { lines: { show: true } }
            },
            tooltip: {
                theme: 'light'
            },
            legend: { show: false }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
</script>
@endpush

@endsection