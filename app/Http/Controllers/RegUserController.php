<?php

namespace App\Http\Controllers;

use App\Models\Job_position;
use App\Models\Management;
use App\Models\Reg_user;
use App\Models\Roles;
use App\Models\Security_question;
use App\Models\User_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class RegUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users          = Reg_user::where('id_status', 1)->where('id_role', '!=', 1)->get();
        $managements    = Management::where('id_management', '!=', '16')->get();
        $positions      = Job_position::where('id_position', '!=', '1')->get();
        $roles          = Roles::all();
        $questions      = Security_question::all();
        $details        = User_detail::all();
        $tiempoRestante = Config::get('session.lifetime') - (time() - session('last_activity'));

        return view('auth.index', compact('users', 'managements', 'positions', 'roles', 'questions', 'details', 'tiempoRestante'));
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
        // INSERTA DATOS DEL REGISTRO EN LA TABLA detalle_usuarios
        $details                       = new User_detail;
        $details->names                = $request->input('names');
        $details->lastnames            = $request->input('lastnames');
        $details->identification_card  = $request->input('identification_card');
        $details->extension            = $request->input('extension');
        $details->id_management        = $request->input('management');
        $details->id_position          = $request->input('position');
        $details->save();

        // INSERTA LOS IDS DE LAS ÚLTIMAS INSERCIONES DEL REGISTRO EN LA TABLA usuarios
        $users                   = new Reg_user;
        $users->id_detail        = $details->id_detail;
        $users->id_status        = '1';
        $users->id_role          = $request->input('role');
        $users->username         = $request->input('username');
        $users->email            = $request->input('email');
        $users->password         = $request->input('password');
        $users->id_question      = $request->input('question');
        $users->security_answer  = $request->input('answer');
        $users->save();

        return redirect()->back();  
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario = Reg_user::find($id);
        return view('auth.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reg_user $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // INSERTA DATOS DEL REGISTRO EN LA TABLA detalle_usuarios
        $users                   = Reg_user::find($id);
        $id_details              = $users->id_detail;
        $users->id_status        = '1';
        $users->id_role          = $request->input('role');
        $users->username         = $request->input('username');
        $users->email            = $request->input('email');
        $users->password         = $request->input('password');
        $users->id_question      = $request->input('question');
        $users->security_answer  = $request->input('answer');        
        $users->update();

        // INSERTA LOS IDS DE LAS ÚLTIMAS INSERCIONES DEL REGISTRO EN LA TABLA usuarios
        $details                       = User_detail::find($id_details);
        $details->names                = $request->input('names');
        $details->lastnames            = $request->input('lastnames');
        $details->identification_card  = $request->input('identification_card');
        $details->extension            = $request->input('extension');
        $details->id_management        = $request->input('management');
        $details->id_position          = $request->input('position');
        $details->update();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        //
        $users = Reg_user::find($id);
        $users->id_status = '2';
        $users->update();
        return redirect()->back();
    }}
