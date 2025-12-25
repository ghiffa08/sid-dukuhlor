@extends('frontend.layouts.app')

@section('title') APBDes {{ $year }} - {{ __($module_title) }} @endsection

@section('content')

<!-- Hero Section with Gradient -->
<section class="bg-gradient-to-br from-green-600 via-green-700 to-green-900 py-20 text-white">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <nav class="mb-8 flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('frontend.index') }}" class="inline-flex items-center text-sm font-medium text-white hover:text-green-200">
                        <i class="fa-solid fa-home me-2"></i> Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fa-solid fa-angle-right mx-1 text-white rtl:rotate-180"></i>
                        <a href="{{ route('frontend.transparansi.index') }}" class="ms-1 text-sm font-medium text-white hover:text-green-200 md:ms-2">
                           Transparansi
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fa-solid fa-angle-right mx-1 text-white rtl:rotate-180"></i>
                        <span class="ms-1 text-sm font-medium text-green-200 md:ms-2">APBDes {{ $year }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Page Title -->
        <div class="max-w-4xl">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl lg:text-6xl">
                APBDes Tahun {{ $year }}
            </h1>
            <p class="mb-6 text-lg font-normal text-green-100 lg:text-xl">
                Laporan Realisasi Pelaksanaan Anggaran Pendapatan dan Belanja Desa.
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
                        <div class="border-b border-gray-200 bg-gradient-to-r from-green-600 to-green-700 p-4 dark:border-gray-700">
                            <h3 class="flex items-center text-lg font-semibold text-white">
                                <i class="fa-solid fa-calendar-days me-2"></i> Tahun Anggaran
                            </h3>
                        </div>
                        <nav class="p-2">
                            <ul class="space-y-1" role="list">
                                @foreach($years as $y)
                                <li>
                                    <a href="{{ route('frontend.transparansi.show', 'apbdes-' . $y) }}" wire:navigate
                                       class="group flex items-center rounded-lg px-3 py-2.5 text-sm font-medium transition-all {{ $year == $y ? 'bg-green-600 text-white shadow-sm' : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                                        <i class="fa-solid fa-angle-right me-2.5 {{ $year == $y ? 'text-white' : 'text-gray-400 group-hover:text-green-600' }}"></i>
                                        <span class="flex-1">APBDes {{ $y }}</span>
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
                                <a href="{{ route('frontend.transparansi.index') }}" class="flex items-center rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                                    <i class="fa-solid fa-list me-2 text-gray-500"></i> Lihat Semua Tahun
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
                
                <!-- Summary Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                     <!-- Pendapatan -->
                    <div class="bg-white rounded-lg border-l-4 border-green-500 shadow-sm p-4">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="text-sm font-medium text-gray-500 uppercase">Pendapatan</h4>
                            <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Anggaran</span>
                        </div>
                        <div class="text-xl font-bold text-gray-900">Rp {{ number_format($pendapatan, 0, ',', '.') }}</div>
                    </div>
                     <!-- Belanja -->
                    <div class="bg-white rounded-lg border-l-4 border-red-500 shadow-sm p-4">
                        <div class="flex items-center justify-between mb-2">
                             <h4 class="text-sm font-medium text-gray-500 uppercase">Belanja</h4>
                             <span class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded">Anggaran</span>
                        </div>
                        <div class="text-xl font-bold text-gray-900">Rp {{ number_format($belanja, 0, ',', '.') }}</div>
                    </div>
                     <!-- Surplus/Defisit -->
                    <div class="bg-white rounded-lg border-l-4 {{ $surplus_defisit >= 0 ? 'border-blue-500' : 'border-orange-500' }} shadow-sm p-4">
                         <div class="flex items-center justify-between mb-2">
                             <h4 class="text-sm font-medium text-gray-500 uppercase">Surplus/Defisit</h4>
                         </div>
                        <div class="text-xl font-bold {{ $surplus_defisit >= 0 ? 'text-blue-600' : 'text-orange-600' }}">Rp {{ number_format($surplus_defisit, 0, ',', '.') }}</div>
                    </div>
                     <!-- PEMBIAYAAN NETTO -->
                     <div class="bg-white rounded-lg border-l-4 border-purple-500 shadow-sm p-4">
                         <div class="flex items-center justify-between mb-2">
                             <h4 class="text-sm font-medium text-gray-500 uppercase">Pembiayaan Netto</h4>
                         </div>
                        <div class="text-xl font-bold text-purple-600">Rp {{ number_format($pembiayaan_netto, 0, ',', '.') }}</div>
                    </div>
                </div>

                 <!-- SILPA Card (Prominent) -->
                 <div class="bg-gradient-to-r from-gray-800 to-gray-900 rounded-lg shadow-lg p-6 text-white text-center">
                    <h3 class="text-lg font-medium text-gray-300 mb-2">Sisa Lebih Pembiayaan Anggaran (SiLPA)</h3>
                    <div class="text-3xl font-bold tracking-tight">Rp {{ number_format($silpa, 0, ',', '.') }}</div>
                 </div>

                <!-- Charts Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                     <!-- Chart Pendapatan -->
                     <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-4 relative min-h-[350px]">
                         <h4 class="text-lg font-bold text-gray-900 mb-4 border-l-4 border-green-500 pl-3">Proporsi Pendapatan</h4>
                         
                         <!-- Skeleton -->
                         <div id="pendapatanSkeleton" class="w-full animate-pulse space-y-4 absolute inset-0 p-4 pt-12 z-10 bg-white">
                            <div class="h-60 w-60 rounded-full bg-gray-200 mx-auto"></div>
                            <div class="h-4 w-3/4 rounded bg-gray-200 mx-auto"></div>
                            <div class="h-4 w-1/2 rounded bg-gray-200 mx-auto"></div>
                         </div>

                         <div id="pendapatanChart" class="invisible"></div>
                     </div>
                     <!-- Chart Belanja -->
                     <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-4 relative min-h-[350px]">
                         <h4 class="text-lg font-bold text-gray-900 mb-4 border-l-4 border-red-500 pl-3">Proporsi Belanja</h4>
                         
                         <!-- Skeleton -->
                         <div id="belanjaSkeleton" class="w-full animate-pulse space-y-4 absolute inset-0 p-4 pt-12 z-10 bg-white">
                            <div class="h-60 w-60 rounded-full bg-gray-200 mx-auto"></div>
                            <div class="h-4 w-3/4 rounded bg-gray-200 mx-auto"></div>
                            <div class="h-4 w-1/2 rounded bg-gray-200 mx-auto"></div>
                         </div>

                         <div id="belanjaChart" class="invisible"></div>
                     </div>
                </div>

                <!-- Data Tables -->
                <!-- PENDAPATAN -->
                <div class="rounded-lg border border-gray-200 bg-white shadow-sm">
                    <div class="p-6 border-b border-gray-200 bg-green-50">
                        <h3 class="text-xl font-bold text-green-800">
                            1. PENDAPATAN
                        </h3>
                    </div>
                     <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-500">
                             <thead class="bg-gray-100 text-xs uppercase text-gray-700">
                                <tr>
                                    <th class="px-6 py-3">Uraian</th>
                                    <th class="px-6 py-3 text-right">Anggaran</th>
                                    <th class="px-6 py-3 text-right">Realisasi</th>
                                </tr>
                             </thead>
                             <tbody class="divide-y divide-gray-200">
                                @foreach($data->where('type', 'PENDAPATAN')->groupBy('category') as $category => $items)
                                <tr class="bg-gray-50 font-semibold">
                                     <td class="px-6 py-3 text-gray-900" colspan="3">{{ $category }}</td>
                                </tr>
                                    @foreach($items as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-3 pl-10">{{ $item->title }}</td>
                                        <td class="px-6 py-3 text-right font-medium text-gray-900">Rp {{ number_format($item->budget, 0, ',', '.') }}</td>
                                        <td class="px-6 py-3 text-right text-gray-600">Rp {{ number_format($item->realization, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                @endforeach
                             </tbody>
                             <tfoot class="bg-green-100 font-bold text-gray-900">
                                 <tr>
                                     <td class="px-6 py-3">JUMLAH PENDAPATAN</td>
                                     <td class="px-6 py-3 text-right">Rp {{ number_format($pendapatan, 0, ',', '.') }}</td>
                                     <td class="px-6 py-3 text-right">Rp {{ number_format($data->where('type', 'PENDAPATAN')->sum('realization'), 0, ',', '.') }}</td>
                                 </tr>
                             </tfoot>
                        </table>
                    </div>
                </div>

                <!-- BELANJA -->
                 <div class="rounded-lg border border-gray-200 bg-white shadow-sm">
                    <div class="p-6 border-b border-gray-200 bg-red-50">
                        <h3 class="text-xl font-bold text-red-800">
                            2. BELANJA
                        </h3>
                    </div>
                     <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-500">
                             <thead class="bg-gray-100 text-xs uppercase text-gray-700">
                                <tr>
                                    <th class="px-6 py-3">Uraian</th>
                                    <th class="px-6 py-3 text-right">Anggaran</th>
                                    <th class="px-6 py-3 text-right">Realisasi</th>
                                </tr>
                             </thead>
                             <tbody class="divide-y divide-gray-200">
                                @foreach($data->where('type', 'BELANJA')->groupBy('category') as $category => $items)
                                <tr class="bg-gray-50 font-semibold">
                                     <td class="px-6 py-3 text-gray-900" colspan="3">{{ $category }}</td>
                                </tr>
                                    @foreach($items as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-3 pl-10">{{ $item->title }}</td>
                                        <td class="px-6 py-3 text-right font-medium text-gray-900">Rp {{ number_format($item->budget, 0, ',', '.') }}</td>
                                        <td class="px-6 py-3 text-right text-gray-600">Rp {{ number_format($item->realization, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                @endforeach
                             </tbody>
                             <tfoot class="bg-red-100 font-bold text-gray-900">
                                 <tr>
                                     <td class="px-6 py-3">JUMLAH BELANJA</td>
                                     <td class="px-6 py-3 text-right">Rp {{ number_format($belanja, 0, ',', '.') }}</td>
                                     <td class="px-6 py-3 text-right">Rp {{ number_format($data->where('type', 'BELANJA')->sum('realization'), 0, ',', '.') }}</td>
                                 </tr>
                             </tfoot>
                        </table>
                    </div>
                </div>
                
                 <!-- PEMBIAYAAN -->
                 <div class="rounded-lg border border-gray-200 bg-white shadow-sm">
                    <div class="p-6 border-b border-gray-200 bg-purple-50">
                        <h3 class="text-xl font-bold text-purple-800">
                            3. PEMBIAYAAN
                        </h3>
                    </div>
                     <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-500">
                             <thead class="bg-gray-100 text-xs uppercase text-gray-700">
                                <tr>
                                    <th class="px-6 py-3">Uraian</th>
                                    <th class="px-6 py-3 text-right">Anggaran</th>
                                    <th class="px-6 py-3 text-right">Realisasi</th>
                                </tr>
                             </thead>
                             <tbody class="divide-y divide-gray-200">
                                @foreach($data->where('type', 'PEMBIAYAAN')->groupBy('category') as $category => $items)
                                <tr class="bg-gray-50 font-semibold">
                                     <td class="px-6 py-3 text-gray-900" colspan="3">{{ $category }}</td>
                                </tr>
                                    @foreach($items as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-3 pl-10">{{ $item->title }}</td>
                                        <td class="px-6 py-3 text-right font-medium text-gray-900">Rp {{ number_format($item->budget, 0, ',', '.') }}</td>
                                        <td class="px-6 py-3 text-right text-gray-600">Rp {{ number_format($item->realization, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                @endforeach
                             </tbody>
                             <tfoot class="bg-purple-100 font-bold text-gray-900">
                                 <tr>
                                     <td class="px-6 py-3">PEMBIAYAAN NETTO</td>
                                     <td class="px-6 py-3 text-right">Rp {{ number_format($pembiayaan_netto, 0, ',', '.') }}</td>
                                     <td class="px-6 py-3 text-right">Rp {{ number_format($data->where('type', 'PEMBIAYAAN')->sum('realization'), 0, ',', '.') }}</td>
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
    function initCharts() {
        // Pendapatan Pie Chart
        const pOptions = {
            series: @json($chartData['pendapatan']['series']),
            labels: @json($chartData['pendapatan']['labels']),
            chart: { type: 'pie', height: 350 },
            colors: ['#22c55e', '#16a34a', '#15803d', '#166534'], // Green shades
            legend: { position: 'bottom' },
            dataLabels: { enabled: false }, // Cleaner look
            tooltip: { val: { formatter: (val) => 'Rp ' + new Intl.NumberFormat('id-ID').format(val) } }
        };
        const pChart = new ApexCharts(document.querySelector("#pendapatanChart"), pOptions);
        pChart.render().then(() => {
            document.getElementById('pendapatanSkeleton').classList.add('hidden');
            document.getElementById('pendapatanChart').classList.remove('invisible');
        });

        // Belanja Pie Chart
        const bOptions = {
            series: @json($chartData['belanja']['series']),
            labels: @json($chartData['belanja']['labels']),
            chart: { type: 'pie', height: 350 },
            colors: ['#ef4444', '#dc2626', '#b91c1c', '#991b1b', '#7f1d1d'], // Red shades
            legend: { position: 'bottom' },
             dataLabels: { enabled: false },
            tooltip: { val: { formatter: (val) => 'Rp ' + new Intl.NumberFormat('id-ID').format(val) } }
        };
        const bChart = new ApexCharts(document.querySelector("#belanjaChart"), bOptions);
        bChart.render().then(() => {
            document.getElementById('belanjaSkeleton').classList.add('hidden');
            document.getElementById('belanjaChart').classList.remove('invisible');
        });
    }

    document.addEventListener('DOMContentLoaded', initCharts);
    document.addEventListener('livewire:navigated', initCharts);
</script>
@endpush

@endsection
