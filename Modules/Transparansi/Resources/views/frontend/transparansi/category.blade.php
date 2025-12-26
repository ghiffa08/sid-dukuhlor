@extends('frontend.layouts.app')

@section('title') APBDes {{ $year }} - {{ __($module_title) }} @endsection

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
                            Transparansi
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right mx-2 text-xs text-blue-300"></i>
                        <span class="ms-1 text-sm font-medium text-blue-200 md:ms-2">APBDes {{ $year }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="max-w-4xl">
             <div class="mb-4 inline-flex items-center rounded-full bg-green-500/20 px-3 py-1 text-xs font-medium text-green-200 ring-1 ring-inset ring-green-500/40 backdrop-blur-sm">
                <i class="fa-solid fa-check-circle mr-2"></i> Tahun Anggaran Aktif
            </div>
            <h1 class="mb-4 text-4xl font-extrabold leading-tight tracking-tight md:text-5xl lg:text-6xl drop-shadow-sm">
                APBDes Tahun {{ $year }}
            </h1>
            <p class="text-lg font-light text-blue-100 max-w-2xl leading-relaxed">
                Laporan Realisasi Pelaksanaan Anggaran Pendapatan dan Belanja Desa.
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
            <aside class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    <!-- Menu Card -->
                    <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-md dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-100 p-5 dark:border-gray-700">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-gray-900 dark:text-white">Arsip Tahun Anggaran</h3>
                        </div>
                        <div class="p-3">
                            <ul class="space-y-1" role="list">
                                @foreach($years as $y)
                                <li>
                                    <a href="{{ route('frontend.transparansi.show', 'apbdes-' . $y) }}" wire:navigate
                                       class="group flex items-center rounded-xl px-4 py-3 text-sm font-medium transition-all {{ $year == $y ? 'bg-blue-600 text-white shadow-md' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600 dark:text-gray-300 dark:hover:bg-gray-700' }}">
                                        <i class="fa-solid fa-folder-open me-3 text-lg {{ $year == $y ? 'text-blue-200' : 'text-gray-400 group-hover:text-blue-500' }}"></i>
                                        <span class="flex-1">APBDes {{ $y }}</span>
                                        @if($year == $y) <i class="fa-solid fa-chevron-right text-xs text-blue-200"></i> @endif
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                     <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-md dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-100 p-5 dark:border-gray-700">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-gray-900 dark:text-white">Aksi Cepat</h3>
                        </div>
                        <div class="p-3">
                            <div class="space-y-1">
                                <a href="{{ route('frontend.transparansi.index') }}" class="flex items-center rounded-xl px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-blue-600 transition-colors">
                                    <i class="fa-solid fa-list mr-3 text-gray-400 group-hover:text-blue-500"></i> Lihat Semua Tahun
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
            <article class="lg:col-span-3 space-y-8">
                
                <!-- Summary Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                     <!-- Pendapatan -->
                    <div class="group relative overflow-hidden rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-200 transition-all hover:shadow-md dark:bg-gray-800 dark:ring-gray-700">
                        <div class="absolute right-0 top-0 -mt-4 -mr-4 h-24 w-24 rounded-full bg-green-50 transition-all group-hover:scale-110 dark:bg-green-900/20"></div>
                        <div class="relative">
                            <div class="flex items-center justify-between mb-4">
                                <div class="rounded-lg bg-green-100 p-2 text-green-600 dark:bg-green-900/30 dark:text-green-400">
                                    <i class="fa-solid fa-hand-holding-dollar text-xl"></i>
                                </div>
                                <span class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Pendapatan</span>
                            </div>
                            <div class="text-2xl font-bold text-gray-900 dark:text-white">Rp {{ number_format($pendapatan, 0, ',', '.') }}</div>
                            <div class="mt-1 text-xs text-gray-500">Total Anggaran</div>
                        </div>
                    </div>

                     <!-- Belanja -->
                    <div class="group relative overflow-hidden rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-200 transition-all hover:shadow-md dark:bg-gray-800 dark:ring-gray-700">
                        <div class="absolute right-0 top-0 -mt-4 -mr-4 h-24 w-24 rounded-full bg-red-50 transition-all group-hover:scale-110 dark:bg-red-900/20"></div>
                        <div class="relative">
                            <div class="flex items-center justify-between mb-4">
                                <div class="rounded-lg bg-red-100 p-2 text-red-600 dark:bg-red-900/30 dark:text-red-400">
                                    <i class="fa-solid fa-cart-shopping text-xl"></i>
                                </div>
                                <span class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Belanja</span>
                            </div>
                            <div class="text-2xl font-bold text-gray-900 dark:text-white">Rp {{ number_format($belanja, 0, ',', '.') }}</div>
                             <div class="mt-1 text-xs text-gray-500">Total Anggaran</div>
                        </div>
                    </div>

                     <!-- Surplus/Defisit -->
                    <div class="group relative overflow-hidden rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-200 transition-all hover:shadow-md dark:bg-gray-800 dark:ring-gray-700">
                         <div class="absolute right-0 top-0 -mt-4 -mr-4 h-24 w-24 rounded-full {{ $surplus_defisit >= 0 ? 'bg-blue-50 dark:bg-blue-900/20' : 'bg-orange-50 dark:bg-orange-900/20' }} transition-all group-hover:scale-110"></div>
                        <div class="relative">
                            <div class="flex items-center justify-between mb-4">
                                <div class="rounded-lg {{ $surplus_defisit >= 0 ? 'bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400' : 'bg-orange-100 text-orange-600 dark:bg-orange-900/30 dark:text-orange-400' }} p-2">
                                     <i class="fa-solid {{ $surplus_defisit >= 0 ? 'fa-arrow-trend-up' : 'fa-arrow-trend-down' }} text-xl"></i>
                                </div>
                                <span class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Surplus/Defisit</span>
                            </div>
                            <div class="text-2xl font-bold {{ $surplus_defisit >= 0 ? 'text-blue-600' : 'text-orange-600' }}">Rp {{ number_format($surplus_defisit, 0, ',', '.') }}</div>
                        </div>
                    </div>

                     <!-- PEMBIAYAAN NETTO -->
                     <div class="group relative overflow-hidden rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-200 transition-all hover:shadow-md dark:bg-gray-800 dark:ring-gray-700">
                         <div class="absolute right-0 top-0 -mt-4 -mr-4 h-24 w-24 rounded-full bg-purple-50 transition-all group-hover:scale-110 dark:bg-purple-900/20"></div>
                        <div class="relative">
                            <div class="flex items-center justify-between mb-4">
                                <div class="rounded-lg bg-purple-100 p-2 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400">
                                    <i class="fa-solid fa-scale-balanced text-xl"></i>
                                </div>
                                <span class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Pembiayaan Netto</span>
                            </div>
                            <div class="text-2xl font-bold text-gray-900 dark:text-white">Rp {{ number_format($pembiayaan_netto, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>

                 <!-- SILPA Card (Prominent) -->
                 <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-slate-800 to-slate-900 p-8 text-center text-white shadow-lg ring-1 ring-white/10">
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                    <div class="relative z-10">
                        <h3 class="mb-2 text-sm font-medium uppercase tracking-widest text-slate-400">Sisa Lebih Pembiayaan Anggaran (SiLPA)</h3>
                        <div class="text-4xl font-extrabold tracking-tight md:text-5xl">Rp {{ number_format($silpa, 0, ',', '.') }}</div>
                    </div>
                 </div>

                <!-- Charts Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                     <!-- Chart Pendapatan -->
                     <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-lg dark:border-gray-700 dark:bg-gray-800 min-h-[400px]">
                         <div class="border-b border-gray-100 bg-gray-50/50 p-6 dark:border-gray-700 dark:bg-gray-900/50">
                             <h4 class="flex items-center text-lg font-bold text-gray-900 dark:text-white">
                                <span class="mr-3 flex h-8 w-8 items-center justify-center rounded-full bg-green-100 text-green-600">
                                    <i class="fa-solid fa-chart-pie text-sm"></i>
                                </span> 
                                Proporsi Pendapatan
                            </h4>
                         </div>
                         
                         <div class="relative p-6">
                             <!-- Skeleton -->
                             <div id="pendapatanSkeleton" class="w-full animate-pulse space-y-4 absolute inset-0 p-6 pt-12 z-10 bg-white">
                                <div class="h-48 w-48 rounded-full bg-gray-200 mx-auto"></div>
                                <div class="h-4 w-3/4 rounded bg-gray-200 mx-auto mt-8"></div>
                                <div class="h-4 w-1/2 rounded bg-gray-200 mx-auto"></div>
                             </div>
    
                             <div id="pendapatanChart" class="invisible"></div>
                         </div>
                     </div>
                     <!-- Chart Belanja -->
                     <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-lg dark:border-gray-700 dark:bg-gray-800 min-h-[400px]">
                         <div class="border-b border-gray-100 bg-gray-50/50 p-6 dark:border-gray-700 dark:bg-gray-900/50">
                             <h4 class="flex items-center text-lg font-bold text-gray-900 dark:text-white">
                                <span class="mr-3 flex h-8 w-8 items-center justify-center rounded-full bg-red-100 text-red-600">
                                    <i class="fa-solid fa-chart-pie text-sm"></i>
                                </span> 
                                Proporsi Belanja
                            </h4>
                         </div>
                         
                         <div class="relative p-6">
                             <!-- Skeleton -->
                             <div id="belanjaSkeleton" class="w-full animate-pulse space-y-4 absolute inset-0 p-6 pt-12 z-10 bg-white">
                                <div class="h-48 w-48 rounded-full bg-gray-200 mx-auto"></div>
                                <div class="h-4 w-3/4 rounded bg-gray-200 mx-auto mt-8"></div>
                                <div class="h-4 w-1/2 rounded bg-gray-200 mx-auto"></div>
                             </div>
    
                             <div id="belanjaChart" class="invisible"></div>
                         </div>
                     </div>
                </div>

                <!-- Data Tables -->
                <!-- PENDAPATAN -->
                <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-md dark:border-gray-700 dark:bg-gray-800">
                    <div class="border-b border-gray-100 bg-green-50/50 p-6 dark:border-gray-700 dark:bg-green-900/20">
                        <h3 class="flex items-center text-xl font-bold text-green-700 dark:text-green-400">
                            <span class="mr-3 flex h-10 w-10 items-center justify-center rounded-lg bg-green-100 text-green-600 border border-green-200 dark:border-green-800 dark:bg-green-900/50 dark:text-green-400">1</span>
                            PENDAPATAN
                        </h3>
                    </div>
                     <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-500">
                             <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-6 py-4 font-semibold">Uraian</th>
                                    <th class="px-6 py-4 text-right font-semibold">Anggaran</th>
                                    <th class="px-6 py-4 text-right font-semibold">Realisasi</th>
                                </tr>
                             </thead>
                             <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                                @foreach($data->where('type', 'PENDAPATAN')->groupBy('category') as $category => $items)
                                <tr class="bg-gray-50/80 font-semibold dark:bg-gray-700/50">
                                     <td class="px-6 py-3 text-gray-900 dark:text-white" colspan="3">{{ $category }}</td>
                                </tr>
                                    @foreach($items as $item)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/80 transition-colors">
                                        <td class="px-6 py-3 pl-10 dark:text-gray-300">{{ $item->title }}</td>
                                        <td class="px-6 py-3 text-right font-medium text-gray-900 dark:text-white">Rp {{ number_format($item->budget, 0, ',', '.') }}</td>
                                        <td class="px-6 py-3 text-right text-gray-600 dark:text-gray-400">Rp {{ number_format($item->realization, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                @endforeach
                             </tbody>
                             <tfoot class="bg-green-50 font-bold text-gray-900 dark:bg-green-900/20 dark:text-white border-t border-green-100">
                                 <tr>
                                     <td class="px-6 py-4">JUMLAH PENDAPATAN</td>
                                     <td class="px-6 py-4 text-right">Rp {{ number_format($pendapatan, 0, ',', '.') }}</td>
                                     <td class="px-6 py-4 text-right">Rp {{ number_format($data->where('type', 'PENDAPATAN')->sum('realization'), 0, ',', '.') }}</td>
                                 </tr>
                             </tfoot>
                        </table>
                    </div>
                </div>

                <!-- BELANJA -->
                 <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-md dark:border-gray-700 dark:bg-gray-800">
                    <div class="border-b border-gray-100 bg-red-50/50 p-6 dark:border-gray-700 dark:bg-red-900/20">
                        <h3 class="flex items-center text-xl font-bold text-red-700 dark:text-red-400">
                             <span class="mr-3 flex h-10 w-10 items-center justify-center rounded-lg bg-red-100 text-red-600 border border-red-200 dark:border-red-800 dark:bg-red-900/50 dark:text-red-400">2</span>
                            BELANJA
                        </h3>
                    </div>
                     <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-500">
                             <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-6 py-4 font-semibold">Uraian</th>
                                    <th class="px-6 py-4 text-right font-semibold">Anggaran</th>
                                    <th class="px-6 py-4 text-right font-semibold">Realisasi</th>
                                </tr>
                             </thead>
                             <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                                @foreach($data->where('type', 'BELANJA')->groupBy('category') as $category => $items)
                                <tr class="bg-gray-50/80 font-semibold dark:bg-gray-700/50">
                                     <td class="px-6 py-3 text-gray-900 dark:text-white" colspan="3">{{ $category }}</td>
                                </tr>
                                    @foreach($items as $item)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/80 transition-colors">
                                        <td class="px-6 py-3 pl-10 dark:text-gray-300">{{ $item->title }}</td>
                                        <td class="px-6 py-3 text-right font-medium text-gray-900 dark:text-white">Rp {{ number_format($item->budget, 0, ',', '.') }}</td>
                                        <td class="px-6 py-3 text-right text-gray-600 dark:text-gray-400">Rp {{ number_format($item->realization, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                @endforeach
                             </tbody>
                             <tfoot class="bg-red-50 font-bold text-gray-900 dark:bg-red-900/20 dark:text-white border-t border-red-100">
                                 <tr>
                                     <td class="px-6 py-4">JUMLAH BELANJA</td>
                                     <td class="px-6 py-4 text-right">Rp {{ number_format($belanja, 0, ',', '.') }}</td>
                                     <td class="px-6 py-4 text-right">Rp {{ number_format($data->where('type', 'BELANJA')->sum('realization'), 0, ',', '.') }}</td>
                                 </tr>
                             </tfoot>
                        </table>
                    </div>
                </div>
                
                 <!-- PEMBIAYAAN -->
                 <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-md dark:border-gray-700 dark:bg-gray-800">
                    <div class="border-b border-gray-100 bg-purple-50/50 p-6 dark:border-gray-700 dark:bg-purple-900/20">
                        <h3 class="flex items-center text-xl font-bold text-purple-700 dark:text-purple-400">
                             <span class="mr-3 flex h-10 w-10 items-center justify-center rounded-lg bg-purple-100 text-purple-600 border border-purple-200 dark:border-purple-800 dark:bg-purple-900/50 dark:text-purple-400">3</span>
                            PEMBIAYAAN
                        </h3>
                    </div>
                     <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-500">
                             <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-6 py-4 font-semibold">Uraian</th>
                                    <th class="px-6 py-4 text-right font-semibold">Anggaran</th>
                                    <th class="px-6 py-4 text-right font-semibold">Realisasi</th>
                                </tr>
                             </thead>
                             <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                                @foreach($data->where('type', 'PEMBIAYAAN')->groupBy('category') as $category => $items)
                                <tr class="bg-gray-50/80 font-semibold dark:bg-gray-700/50">
                                     <td class="px-6 py-3 text-gray-900 dark:text-white" colspan="3">{{ $category }}</td>
                                </tr>
                                    @foreach($items as $item)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/80 transition-colors">
                                        <td class="px-6 py-3 pl-10 dark:text-gray-300">{{ $item->title }}</td>
                                        <td class="px-6 py-3 text-right font-medium text-gray-900 dark:text-white">Rp {{ number_format($item->budget, 0, ',', '.') }}</td>
                                        <td class="px-6 py-3 text-right text-gray-600 dark:text-gray-400">Rp {{ number_format($item->realization, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                @endforeach
                             </tbody>
                             <tfoot class="bg-purple-50 font-bold text-gray-900 dark:bg-purple-900/20 dark:text-white border-t border-purple-100">
                                 <tr>
                                     <td class="px-6 py-4">PEMBIAYAAN NETTO</td>
                                     <td class="px-6 py-4 text-right">Rp {{ number_format($pembiayaan_netto, 0, ',', '.') }}</td>
                                     <td class="px-6 py-4 text-right">Rp {{ number_format($data->where('type', 'PEMBIAYAAN')->sum('realization'), 0, ',', '.') }}</td>
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
