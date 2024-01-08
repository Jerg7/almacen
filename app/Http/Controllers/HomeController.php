<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


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
        $warehouses = Warehouse::where('stock', '<=', '3')->get();
        $products   = Product::join('products_datas', 'products_datas.id_product_data', '=', 'products.id_product_data')
                                    ->where('id_status', '1')->get();
        return view('home', compact('warehouses', 'products'));
    }
}
