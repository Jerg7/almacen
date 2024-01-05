@extends('layouts.layout')

@section('content')

    <br>
    <div class="row">
        <div class="col">
            <h3 class="titulo"><strong><i class="fa-solid fa-id-card"></i> Almacén</strong></h3>
        </div>

    </div>

    {{-- Table registers --}}
    <div class="table-responsive">

        <table class="table table-striped table-striped-column" id="tables">

            <thead style="background-color: #125873; color: white;">
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($warehouses as $warehouse)
                    <tr>
                        <td>{{$warehouse->product->description}}</td>
                        <td>{{$warehouse->stock}}</td>
                    </tr>
                @endforeach 
            </tbody>
            
        </table>

    </div>
    
@endsection