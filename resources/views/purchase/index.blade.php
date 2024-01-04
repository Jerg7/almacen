@extends('layouts.layout')

@section('content')

    <br>
    <div class="row">
        <div class="col">
            <h3 class="titulo"><strong><i class="fa-solid fa-cart-shopping"></i> Compras</strong></h3>
        </div>

        {{-- Modal crear --}}
        <div class="col-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                <span><i class="fa-solid fa-plus"></i></span> Nueva compra
            </button>
            @include('purchase.create')
        </div>

    </div>

    {{-- Table registers --}}
    <div class="table-responsive">

        <table class="table table-striped table-striped-column" id="tables">

            <thead style="background-color: #125873; color: white;">
                <tr>
                    <th class="col-md-3">Factura</th>
                    <th class="col-md-4">Nombres de proveedor</th>
                    <th class="col-md-3">Monto (Bs.)</th>
                    <th class="col-md-2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($purchviews as $purchview)
                    <tr>
                        <td class="col-md-3">{{$purchview->bill}}</td>
                        <td class="col-md-4">{{$purchview->provider}}</td>
                        <td class="col-md-3">{{$purchview->total_prices}}</td>
                        <td class="col-md-2" align="center">
 
                            {{-- Modal Show --}}
                            <a data-bs-toggle="modal" href="#show{{$purchview->bill}}" role="button" onclick="loadPurchase({{$purchview->bill}})"><i class="fa-solid fa-eye fa-2x"></i></a>
                            @include('purchase.actions')

                        </td>
                    </tr>
                @endforeach 
            </tbody>
            
        </table>

    </div>
    
@endsection