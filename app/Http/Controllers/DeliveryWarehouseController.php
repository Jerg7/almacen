<?php

namespace App\Http\Controllers;

use App\Models\Delivery_warehouse;
use App\Models\Purchase;
use App\Models\PurchasingData;
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
        $purchases = Purchase::select('id_purchase','providers.description as provider', 'purchasing_datas.bill as bill', DB::raw('SUM(purchasing_datas.prices) as total_amount'))
                                ->join('purchasing_datas', 'purchases.bill', '=', 'purchasing_datas.bill')
                                ->join('providers', 'providers.id_provider', '=', 'purchasing_datas.id_provider')
                                ->groupBy('purchasing_datas.id_provider', 'purchasing_datas.bill', 'purchases.id_purchase', 'providers.description')
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
    public function update(Request $request, $bill)
    {
        //

        $purchasing              = Purchase::where('bill', $bill)->get();
        $id_purchasing_data      = $purchasing->id_product_data;

        $purchases              = Purchase::find($id_purchasing_data);
        

        $purchasing->update();
        return response()->json([
            'script' => '<script type="text/javascript">	
                            $S(\'#transparencia\').fadeOut(\'slow\',function(){
                                $S(\'#alerta\').css(\'display\',\'block\');
                                setTimeout(\'window.parent.location.href="/purchases"\', 1000);      
                            });
                        </script>
                        <div class="alert alert-success col-lg-12" id="alerta" style="display:none; margin-bottom:0px; font-size:13px; margin-top:15px;">
                            <i class="fa-sharp fa-thin fa-circle-check"></i>
                            <strong>¡Registro actualizado satisfactoriamente!</strong>
                        </div>'
                    ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery_warehouse $delivery_warehouse)
    {
        //
    }
}
