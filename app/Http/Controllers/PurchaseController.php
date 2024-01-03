<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Provider;
use App\Models\Purchase;
use App\Models\PurchasingData;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $purchases = Purchase::all();
        $providers = Provider::where('id_status', 1)->get();
        $products  = Product::where('id_status', 1)->get();
        return view('purchase.index', compact('purchases', 'providers', 'products'));
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
        $providers  = $request->input('provider');
        $products   = $request->input('product');
        $bills      = $request->input('bill');
        $amounts    = $request->input('amount');
        $prices     = $request->input('price');
        for ($i = 0; $i < count($products); $i++) {
            $purchasing               = new PurchasingData();
            $purchasing->id_provider  = $providers;
            $purchasing->bill         = $bills;
            $purchasing->id_product   = $products[$i];
            $purchasing->amount       = $amounts[$i];
            $purchasing->price        = $prices[$i];
            $purchasing->save(); 

            $purchases                       = new Purchase();
            $purchases->id_status            = 2;
            $purchases->id_purchasing_data   = $purchasing->id_purchasing_data;
            $purchases->save();
        }
        return response()->json([
            'script' => '<script type="text/javascript">	
                            $S(\'#transparencia\').fadeOut(\'slow\',function(){
                                $S(\'#alerta\').css(\'display\',\'block\');
                                setTimeout(\'window.parent.location.href="/purchases"\', 1000);      
                            });
                        </script>
                        <div class="alert alert-success col-lg-12" id="alerta" style="display:none; margin-bottom:0px; font-size:13px; margin-top:15px;">
                            <i class="fa-sharp fa-thin fa-circle-check"></i>
                            <strong>¡Registro almacenado satisfactoriamente!</strong>
                        </div>'
                    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $purchases              = Purchase::find($id);
        $id_purchasing_data     = $purchases->id_purchasing_data;

        $purchasing              = PurchasingData::find($id_purchasing_data);
        $purchasing->id_provider = $request->input('provider');
        $purchasing->id_product  = $request->input('product');
        $purchasing->bill        = $request->input('bill');
        $purchasing->amount      = $request->input('amount');
        $purchasing->price       = $request->input('price');
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
    public function destroy(Request $request, $id)
    {
        //
        $purchases              = Purchase::find($id);
        $purchases->id_status   = 1;
        $purchases->update();
        return response()->json([
            'script' => '<script type="text/javascript">	
                            $S(\'#transparencia\').fadeOut(\'slow\',function(){
                                $S(\'#alerta\').css(\'display\',\'block\');
                                setTimeout(\'window.parent.location.href="/purchases"\', 1000);      
                            });
                        </script>
                        <div class="alert alert-success col-lg-12" id="alerta" style="display:none; margin-bottom:0px; font-size:13px; margin-top:15px;">
                            <i class="fa-sharp fa-thin fa-circle-check"></i>
                            <strong>¡Registro eliminado satisfactoriamente!</strong>
                        </div>'
                    ]);
    }

    public function byProviders()
    {
        return response()->json(Provider::all());
    }
        public function byProducts()
    {
        return response()->json(Product::all());
    }
    public function byPurchase($provider){ 
        return Product::join('products_datas', 'products_datas.id_product_data', '=', 'products.id_product_data')
                            ->where('id_provider', $provider)->get();
    }
}
