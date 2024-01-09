<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requirement;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{    
    public function showChart()
    {
        $requirements_chart = Requirement::select('id_product', DB::raw('count(*) as total'))
            ->groupBy('id_product')
            ->get();
    
        return view('home', compact('requirements_chart'));
    }
}
