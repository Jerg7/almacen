<?php

namespace App\Http\Controllers;

use App\Models\Delivery_warehouse;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryWarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $purchases = Purchase::select('providers.description', 'bill', DB::raw('SUM(price) as total_amount'))
                                ->join('providers', 'providers.id_provider', '=', 'purchases.id_provider')
                                ->groupBy('purchases.id_provider', 'bill')
                                ->get();
        return view('delivery_warehouse.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery_warehouse $delivery_warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery_warehouse $delivery_warehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Delivery_warehouse $delivery_warehouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery_warehouse $delivery_warehouse)
    {
        //
    }
}
