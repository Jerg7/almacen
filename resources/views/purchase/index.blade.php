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
                    <th scope="col">Factura</th>
                    <th scope="col">Nombres de proveedor</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($purchases as $purchase)
                    <tr>
                        <td>{{$purchase->bill}}</td>
                        <td>{{$purchase->provider->descripcion}}</td>
                        <td>{{$purchase->product->descripcion}}</td>
                        <td>{{$purchase->amount}}</td>
                        <td>

                            {{-- Modal edit --}}
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit{{$purchase->id_purchase}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                              |  
                            {{-- Modal delete --}}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$purchase->id_purchase}}">
                                <i class="fa-solid fa-trash"></i>
                            </button>                            
                            @include('purchase.actions')

                        </td>
                    </tr>
                @endforeach 
            </tbody>
            
        </table>

    </div>
    
@endsection