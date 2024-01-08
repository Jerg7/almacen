@extends('layouts.layout')

@section('content')
    
    <div class="caja2">

        <div class="izq2">
            
            @foreach ($warehouses as $warehouse)

                <div class="card w-75">
                    <div class="card-body">
                        @if ($warehouse->stock >= 1)
                            <h5 class="card-title"><strong><span style="color: #E5E100;"><i class="fa-solid fa-triangle-exclamation fa-beat"></i></span></strong> Poca reserva de producto</h5>
                            <p class="card-text"><strong>Producto:</strong> {{$warehouse->product->product_data->description}}</p>
                            <p class="card-text"><strong>Stock:</strong> {{$warehouse->stock}}</p>
                        @else
                            <h5 class="card-title"><strong><span style="color: #E41A1E;"><i class="fa-solid fa-triangle-exclamation fa-beat"></i></span></strong> Sin reservas de producto</h5>
                            <p class="card-text">No existen reservas disponibles en Almacén del producto: <strong>{{$warehouse->product->product_data->description}}</strong></p>
                        @endif    
                        <a data-bs-toggle="modal" href="#fast{{$warehouse->id_product}}" onclick="fastRequirement({{$warehouse->id_product}})" class="btn btn-primary">Requerimiento rápido</a>
                        @include('requirement.fast')
                    </div>
                </div><br>

            @endforeach

        </div>

        <div class="der2">

        </div>

    </div>

@endsection