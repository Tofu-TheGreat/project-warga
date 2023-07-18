<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Warga;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //Chart untuk menampilkan jumlah warga 
    public function getChartData()
    {
        $data = Warga::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->pluck('count', 'date')
            ->toArray();
        
        $chartData = [];
        $currentCount = 0;
        
        foreach ($data as $date => $count) {
            $currentCount += $count;
            $chartData[] = ['date' => $date, 'count' => $currentCount];
        }
        
        return response()->json($chartData);
    }
    
    //END
}
