<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products   = Product::where('id_status', 1)->get();
        $categories = Category::where('id_status', 1)->get();
        $tiempoRestante = Config::get('session.lifetime') - (time() - session('last_activity'));

        return view('product.index', compact('products', 'categories', 'tiempoRestante'))->with('i');
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
        $products = new Product;
        $products->id_category = $request->input('categoria');
        $products->description = $request->input('descripcion');
        $products->amount      = $request->input('cantidad');
        $products->id_status   = '1';
        $products->save();
        return response()->json([
            'script' => '<script type="text/javascript">	
                            $S(\'#transparencia\').fadeOut(\'slow\',function(){
                                $S(\'#alerta\').css(\'display\',\'block\');
                                setTimeout(\'window.parent.location.href="/products"\', 1000);      
                            });
                        </script>
                        <div class="alert alert-success col-lg-12" id="alerta" style="display:none; margin-bottom:0px; font-size:13px; margin-top:15px;">
                            <i class="fa-sharp fa-thin fa-circle-check"></i>
                            <strong>¡Registro almacenado satisfactoriamente!</strong>
                        </div>'
                    ]);
        // return redirect()->back();    
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $products = Product::find($id);
        $products->id_category = $request->input('categoria');
        $products->description = $request->input('descripcion');
        $products->amount      = $request->input('cantidad');
        $products->update();
        return response()->json([
            'script' => '<script type="text/javascript">	
                            $S(\'#transparencia\').fadeOut(\'slow\',function(){
                                $S(\'#alerta\').css(\'display\',\'block\');
                                setTimeout(\'window.parent.location.href="/products"\', 1000);      
                            });
                        </script>
                        <div class="alert alert-success col-lg-12" id="alerta" style="display:none; margin-bottom:0px; font-size:13px; margin-top:15px;">
                            <i class="fa-sharp fa-thin fa-circle-check"></i>
                            <strong>¡Registro actualizado satisfactoriamente!</strong>
                        </div>'
                    ]);
        // return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        //
        $products = Product::find($id);
        $products->id_status = '2';
        $products->update();
        return response()->json([
            'script' => '<script type="text/javascript">	
                            $S(\'#transparencia\').fadeOut(\'slow\',function(){
                                $S(\'#alerta\').css(\'display\',\'block\');
                                setTimeout(\'window.parent.location.href="/products"\', 1000);      
                            });
                        </script>
                        <div class="alert alert-success col-lg-12" id="alerta" style="display:none; margin-bottom:0px; font-size:13px; margin-top:15px;">
                            <i class="fa-sharp fa-thin fa-circle-check"></i>
                            <strong>¡Registro eliminado satisfactoriamente!</strong>
                        </div>'
                    ]); 
        // return redirect()->back();
    }
}
