<?php

namespace Modules\Transparansi\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Modules\Transparansi\Models\TransparansiBudget;

class TransparansiController extends Controller
{
    public $module_title;

    public $module_name;

    public $module_path;

    public $module_icon;

    public $module_model;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Transparansi';

        // module name
        $this->module_name = 'transparansi';

        // directory path of the module
        $this->module_path = 'transparansi::frontend';

        // module icon
        $this->module_icon = 'fa-solid fa-file-invoice-dollar';

        // module model name, path
        $this->module_model = "Modules\Transparansi\Models\TransparansiBudget";
    }

    public function index(): View
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_action = 'List';

        // Get distinct Years to list as "Pages"
        $years = TransparansiBudget::active()
            ->select('year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->get()
            ->pluck('year');

        return view('transparansi::frontend.transparansi.index', compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'years'));
    }

    public function show(string $slug): View
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_action = 'Detail';

        // Get sidebar years
        $years = TransparansiBudget::active()
            ->select('year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->get()
            ->pluck('year');

        // Check if slug matches Year pattern (apbdes-YYYY)
        if (preg_match('/^apbdes-(\d{4})$/', $slug, $matches)) {
            $year = $matches[1];
            
            // Get all data for this year
            $data = TransparansiBudget::active()
                ->byYear($year)
                ->ordered()
                ->get();
            
            if ($data->isEmpty()) {
                abort(404, 'Data APBDes Tahun ' . $year . ' tidak ditemukan.');
            }

            // Calculations for Summary
            $pendapatan = $data->where('type', 'PENDAPATAN')->sum('budget');
            $belanja = $data->where('type', 'BELANJA')->sum('budget');
            $pembiayaan_masuk = $data->where('type', 'PEMBIAYAAN')->where('category', 'Penerimaan Pembiayaan')->sum('budget');
            $pembiayaan_keluar = $data->where('type', 'PEMBIAYAAN')->where('category', 'Pengeluaran Pembiayaan')->sum('budget');
            
            $surplus_defisit = $pendapatan - $belanja;
            $pembiayaan_netto = $pembiayaan_masuk - $pembiayaan_keluar;
            $silpa = $surplus_defisit + $pembiayaan_netto;

            // Prepare Chart Data
            $chartData = [
                'pendapatan' => [
                     'labels' => $data->where('type', 'PENDAPATAN')->pluck('title')->toArray(), // Or category unique
                     'series' => $data->where('type', 'PENDAPATAN')->pluck('budget')->toArray(),
                ],
                 'belanja' => [
                     'labels' => $data->where('type', 'BELANJA')->pluck('category')->unique()->values()->toArray(),
                     'series' => $data->where('type', 'BELANJA')->groupBy('category')->map->sum('budget')->values()->toArray(),
                ]
            ];

            return view('transparansi::frontend.transparansi.category', compact(
                'module_title', 
                'module_name', 
                'module_path', 
                'module_icon', 
                'module_action', 
                'year', 
                'data', 
                'pendapatan', 
                'belanja', 
                'pembiayaan_masuk', 
                'pembiayaan_keluar',
                'surplus_defisit',
                'pembiayaan_netto',
                'silpa',
                'silpa',
                'chartData',
                'years'
            ));
        }

        // Fallback: Individual Item
        $statistic = TransparansiBudget::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('transparansi::frontend.transparansi.show', compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'statistic'));
    }
}
