<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Reg_user;
use App\Models\Requirement;
use App\Models\Requirement_response;
use App\Models\User_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $requirements   = Requirement::where('id_status', '1')->get();
        $products       = Product::where('id_status', '1')->get();
        $users          = Reg_user::where('id_status', '1')->get();
        $details        = User_detail::all();
        return view('requirement.index', compact('requirements', 'products', 'users', 'details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $products       = Product::where('id_status', '1')->get();
        return view('requirement.create', compact('products'));
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
        $requirements                   = new Requirement();
        $requirements->id_user          = $request->user;
        $requirements->id_product       = $request->product;
        $requirements->id_status        = 1;
        $requirements->requested_amount = $request->requested_amount;
        $requirements->id_response      = $responses->id_response;
        $requirements->save();
        return redirect()->route('requirements.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $requirements = Requirement::find($id);
        return view('requirements.show', compact('requirements'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Requirement $requirement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $requirements   = Requirement::find($id);
        $id_response    = $requirements->id_response;
        $requirements->update();

        $responses                          = Requirement_response::find($id_response);
        $responses->amount_delivery         = $request->amount_delivery;
        $responses->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        //
        $requirements = Requirement::find($id);
        $requirements->id_status = 2;
        $requirements->update();
        return redirect()->back();
    }

    public function RequirementByManagement($user){
        $management = Reg_user::join('user_details', 'user_details.id_detail', '=', 'users.id_detail')
                                    ->join('managements', 'managements.id_management', '=', 'user_details.id_management')
                                    ->select('managements.id_management')->where('users.id_user', '=', $user)->get();
        $managementId = $management->first()->id_management;
        $data = Requirement::join('users', 'users.id_user', '=', 'requirements.id_user')
                                ->join('user_details', 'user_details.id_detail', '=', 'users.id_detail')
                                ->join('managements', 'managements.id_management', '=', 'user_details.id_management')
                                ->join('products', 'products.id_product', '=', 'requirements.id_product')
                                ->select('products.description', 'requirements.justification', 'requirements.requested_amount', 'products.amount', 'requirements.id_requirement')
                                ->where('user_details.id_management', '=', $managementId)->where('requirements.id_status', '=', '1')->get();
        return $data;
    }

    public function byProducts(){
        $data = Product::join('products_datas', 'products.id_product_data', '=', 'products_datas.id_product_data')
                            ->select('products.id_product', 'products_datas.description')->get();
        return $data;
    }
}
