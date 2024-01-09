<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Requirement;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $warehouses         = Warehouse::where('stock', '<=', '3')->get();
        $products           = Product::join('products_datas', 'products_datas.id_product_data', '=', 'products.id_product_data')
                                    ->where('id_status', '1')->get();
        $chart = Requirement::select('products_datas.description as product', DB::raw('count(*) as total'))
                                    ->join('products', 'products.id_product', '=', 'requirements.id_product')
                                    ->join('products_datas', 'products_datas.id_product_data', '=', 'products.id_product_data')
                                    ->groupBy('requirements.id_product')->get();
        
        return view('home', compact('chart', 'warehouses', 'products'));
    }
}
