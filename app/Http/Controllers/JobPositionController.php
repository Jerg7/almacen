<?php

namespace App\Http\Controllers;

use App\Models\Job_position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


class JobPositionController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tiempoRestante = Config::get('session.lifetime') - (time() - session('last_activity'));
        $positions = Job_position::where('id_status', 1)->where('id_position', '!=', '1')->get();
        return view('job_position.index', compact('positions', 'tiempoRestante'))->with('i');
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
        $positions = new Job_position;
        $positions->description = $request->input('descripcion');
        $positions->id_status  = '1';
        $positions->save();
        return response()->json([
            'script' => '<script type="text/javascript">	
                            $S(\'#transparencia\').fadeOut(\'slow\',function(){
                                $S(\'#alerta\').css(\'display\',\'block\');
                                setTimeout(\'window.parent.location.href="/job_positions"\', 1000);      
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
    public function show(Job_position $cargo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job_position $cargo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $positions = Job_position::find($id);
        $positions->description = $request->input('descripcion');
        $positions->update();
        return response()->json([
            'script' => '<script type="text/javascript">	
                            $S(\'#transparencia\').fadeOut(\'slow\',function(){
                                $S(\'#alerta\').css(\'display\',\'block\');
                                setTimeout(\'window.parent.location.href="/job_positions"\', 1000);      
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
        $positions = Job_position::find($id);
        $positions->id_status = '2';
        $positions->update();
        return response()->json([
            'script' => '<script type="text/javascript">	
                            $S(\'#transparencia\').fadeOut(\'slow\',function(){
                                $S(\'#alerta\').css(\'display\',\'block\');
                                setTimeout(\'window.parent.location.href="/job_positions"\', 1000);      
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
