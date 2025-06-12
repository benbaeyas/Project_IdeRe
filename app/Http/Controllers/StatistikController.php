<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatistikController extends Controller
{
    public function index()
    {
        $totalInvestasiPerBulan = DB::table('investments')
            ->select(
                DB::raw("DATE_FORMAT(tanggal_investasi, '%Y-%m') as bulan"),
                DB::raw('SUM(jumlah_investasi) as total_investasi')
            )
            ->groupBy(DB::raw("DATE_FORMAT(tanggal_investasi, '%Y-%m')"))
            ->orderBy('bulan', 'asc')
            ->get();

        // Inisialisasi variabel awal
        $labels = [];
        $data = [];

        if ($totalInvestasiPerBulan->isEmpty()) {
            // Jika tidak ada data investasi
            $labels = ['Tidak Ada Data'];
            $data = [0];
        } else {
            foreach ($totalInvestasiPerBulan as $item) {
                $labels[] = Carbon::parse($item->bulan)->format('F Y');
                $data[] = (float)$item->total_investasi;
            }
        }

        return view('statistik', compact('labels', 'data'));
    }
}