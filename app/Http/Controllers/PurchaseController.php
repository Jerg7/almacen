<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Provider;
use App\Models\Purchase;
use App\Models\PurchasingData;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $purchases  = Purchase::all();
        $providers  = Provider::where('id_status', 1)->get();
        $products   = Product::where('id_status', 1)->get();
        $purchviews = Purchase::select('providers.description AS provider', 'purchasing_datas.bill AS bill', DB::raw('SUM(purchasing_datas.prices) AS total_prices'), 'status_purchases.description AS status')
                                    ->join('purchasing_datas', 'purchases.id_purchasing_data', '=', 'purchasing_datas.id_purchasing_data')
                                    ->join('providers', 'providers.id_provider', '=', 'purchasing_datas.id_provider')
                                    ->join('status_purchases', 'status_purchases.id_status', '=', 'purchases.id_status')
                                    ->groupBy('purchasing_datas.bill', 'status_purchases.description')
                                    ->get();
        return view('purchase.index', compact('purchases', 'providers', 'products', 'purchviews'));
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
        $prices     = $request->input('prices');
        for ($i = 0; $i < count($products); $i++) {
            $purchasing               = new PurchasingData();
            $purchasing->id_provider  = $providers;
            $purchasing->bill         = $bills;
            $purchasing->id_product   = $products[$i];
            $purchasing->amount       = $amounts[$i];
            $purchasing->prices       = $prices[$i];
            $purchasing->save(); 

            $purchases                       = new Purchase();
            $purchases->id_status            = 1;
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
        $purchasing->prices      = $request->input('prices');
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
    public function destroy(Request $request, $bill)
    {
        //
        Purchase::join('purchasing_datas', 'purchases.id_purchasing_data', '=', 'purchasing_datas.id_purchasing_data')
                                    ->where('purchasing_datas.bill', $bill)->update(['purchases.id_status' => 2]);
        
        $products   = Purchase::select('purchasing_datas.id_product')
                                ->join('purchasing_datas', 'purchases.id_purchasing_data', '=', 'purchasing_datas.id_purchasing_data')
                                ->where('purchasing_datas.bill', $bill)->get();
        $amounts    = Purchase::select('purchasing_datas.amount')
                                ->join('purchasing_datas', 'purchases.id_purchasing_data', '=', 'purchasing_datas.id_purchasing_data')
                                ->where('purchasing_datas.bill', $bill)->get();

        for ($i = 0; $i < count($products); $i++) {
            $exits_product  = Warehouse::select('id_product')->where('id_product', $products[$i])->exists();
            
            if($exits_product == 0){
                $warehouses             = new Warehouse;
                $warehouses->id_product = preg_replace('/[^0-9]/',"", $products[$i]);
                $warehouses->stock      = preg_replace('/[^0-9]/',"", $amounts[$i]);
                $warehouses->save();
            }else{
                $stock_product = Warehouse::select('stock')->where('id_product', $products[$i])->get();
                $stock_product2 = preg_replace('/[^0-9]/',"", $stock_product);
                $new_stock_product = $stock_product2 + preg_replace('/[^0-9]/',"", $amounts[$i]);
                Warehouse::where('id_product', $exits_product)->update(['stock' => $new_stock_product]);
            }
          
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
                            <strong>¡La compra ha sido recibida por Almacén!</strong>
                        </div>',
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

    public function PurchasesByBill($bill){
        $data = Purchase::select('products_datas.description', 'purchasing_datas.amount', 'purchasing_datas.prices', 'purchases.id_purchase')
                            ->join('purchasing_datas', 'purchases.id_purchasing_data', '=', 'purchasing_datas.id_purchasing_data')
                            ->join('products', 'purchasing_datas.id_product', '=', 'products.id_product')
                            ->join('products_datas', 'products_datas.id_product_data', '=', 'products.id_product_data')
                            ->where('purchasing_datas.bill', $bill)->get();
        return $data;
    }
}
