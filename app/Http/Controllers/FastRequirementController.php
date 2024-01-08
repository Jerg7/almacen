<?php

namespace App\Http\Controllers;

use App\Models\FastRequirement;
use App\Models\Product;
use App\Models\Requirement_response;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class FastRequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $warehouses = Warehouse::where('stock', '<=', '3')->get();
        $products   = Product::join('products_datas', 'products_datas.id_product_data', '=', 'products.id_product_data')
                                    ->where('id_status', '1')->get();
        return view('home', compact('warehouses', 'products'));
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
        $responses                          = new Requirement_response;
        $responses->amount_delivery         = null;
        $responses->save();

        //
        $requirements                   = new FastRequirement();
        $requirements->id_user          = $request->user;
        $requirements->id_product       = $request->product;
        $requirements->id_status        = 1;
        $requirements->requested_amount = $request->requested_amount;
        $requirements->id_response      = $responses->id_response;
        $requirements->save();
        // return redirect()->back();
        return response()->json([
            'script' => '<script type="text/javascript">	
                            $S(\'#transparencia\').fadeOut(\'slow\',function(){
                                $S(\'#alerta\').css(\'display\',\'block\');
                                setTimeout(\'window.parent.location.href="/home"\', 1000);      
                            });
                        </script>
                        <div class="alert alert-success col-lg-12" id="alerta" style="display:none; margin-bottom:0px; font-size:13px; margin-top:15px;">
                            <i class="fa-sharp fa-thin fa-circle-check"></i>
                            <strong>¡Solicitud realizada satisfactoriamente!</strong>
                        </div>'
                    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(FastRequirement $fastRequirement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FastRequirement $fastRequirement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FastRequirement $fastRequirement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FastRequirement $fastRequirement)
    {
        //
    }
}
