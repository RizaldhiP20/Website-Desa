<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TablePendudukModel;
use App\Models\TableKartuKeluargaModel;
use App\Models\TableSuratPermohonanModel;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function statistik()
    {
        // 1. Summary Cards
        $total_penduduk = TablePendudukModel::hidup()->count();
        $total_kk = TableKartuKeluargaModel::count();
        $total_laki = TablePendudukModel::hidup()->lakiLaki()->count();
        $total_perempuan = TablePendudukModel::hidup()->perempuan()->count();

        // 2. Pyramid Chart (Penduduk by Age & Gender)
        // Grouping: 0-4, 5-9, 10-14, ..., 70-74, 75+
        $ranges = [
            '0-4' => [0, 4],
            '5-9' => [5, 9],
            '10-14' => [10, 14],
            '15-19' => [15, 19],
            '20-24' => [20, 24],
            '25-29' => [25, 29],
            '30-34' => [30, 34],
            '35-39' => [35, 39],
            '40-44' => [40, 44],
            '45-49' => [45, 49],
            '50-54' => [50, 54],
            '55-59' => [55, 59],
            '60-64' => [60, 64],
            '65-69' => [65, 69],
            '70-74' => [70, 74],
            '75+' => [75, 150],
        ];

        $penduduk_usia = [
            'categories' => array_keys($ranges),
            'male' => [],
            'female' => []
        ];

        foreach ($ranges as $range) {
            $penduduk_usia['male'][] = TablePendudukModel::hidup()
                ->lakiLaki()
                ->whereRaw("EXTRACT(YEAR FROM age(tanggal_lahir)) BETWEEN ? AND ?", $range)
                ->count();

            $penduduk_usia['female'][] = TablePendudukModel::hidup()
                ->perempuan()
                ->whereRaw("EXTRACT(YEAR FROM age(tanggal_lahir)) BETWEEN ? AND ?", $range)
                ->count();
        }

        // Calculate Max Value for Pyramid Chart Axis
        $max_male = max($penduduk_usia['male']);
        $max_female = max($penduduk_usia['female']);
        $max_age_pop = max($max_male, $max_female) + 5; // Add buffer

        // 3. Pie Chart (Layanan Administrasi)
        $surat_stats = TableSuratPermohonanModel::select('surat_jenis_id', DB::raw('count(*) as total'))
            ->groupBy('surat_jenis_id')
            ->with('suratJenis')
            ->get()
            ->map(function($item) {
                return [
                    'label' => $item->suratJenis->nama_surat ?? 'Unknown',
                    'total' => $item->total
                ];
            });

        // 4. Bar Chart (Pendidikan)
        $pendidikan_stats = TablePendudukModel::hidup()
            ->select('pendidikan_terakhir', DB::raw('count(*) as total'))
            ->whereNotNull('pendidikan_terakhir')
            ->where('pendidikan_terakhir', '!=', '-')
            ->groupBy('pendidikan_terakhir')
            ->orderBy('total', 'desc')
            ->get();

        // 5. Bar Chart (Pekerjaan)
        $pekerjaan_stats = TablePendudukModel::hidup()
            ->select('pekerjaan', DB::raw('count(*) as total'))
            ->whereNotNull('pekerjaan')
            ->where('pekerjaan', '!=', '-')
            ->groupBy('pekerjaan')
            ->orderBy('total', 'desc')
            ->limit(10)
            ->get();

        return view('public.statistik', compact(
            'total_penduduk', 
            'total_kk', 
            'total_laki', 
            'total_perempuan',
            'penduduk_usia',
            'surat_stats',
            'pendidikan_stats',
            'pekerjaan_stats',
            'max_age_pop'
        ));
    }
}
