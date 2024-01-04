@extends('layouts.layout')

@section('content')

    <br>
    <div class="row">
        <div class="col">
            <h3 class="titulo"><strong><i class="fa-solid fa-id-card"></i> Almacén de entradas.</strong></h3>
        </div>

    </div>

    {{-- Table registers --}}
    <div class="table-responsive">

        <table class="table table-striped table-striped-column" id="tables">

            <thead style="background-color: #125873; color: white;">
                <tr>
                    <th scope="col">Nombre de proveedor</th>
                    <th scope="col">Factura</th>
                    <th scope="col">Monto (Bs.)</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($purchases as $purchase)
                    <tr>
                        <td>{{$purchase->provider}}</td>
                        <td>{{$purchase->bill}}</td>
                        <td>{{$purchase->total_amount}}</td>
                        <td>

                            {{-- Modal reception --}}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#reception{{$purchase->bill}}">
                                <i class="fa-solid fa-trash"></i>
                            </button>                            
                            @include('delivery_warehouse.actions')

                        </td>
                    </tr>
                @endforeach 
            </tbody>
            
        </table>

    </div>
    
@endsection