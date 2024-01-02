@extends('layouts.layout')

@section('content')

    <br>
    <div class="row">
        <div class="col">
            <h3 class="titulo"><strong><i class="fa-solid fa-cart-shopping"></i> Productos</strong></h3>
        </div>

        {{-- Modal create --}}
        <div class="col-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                <span><i class="fa-solid fa-plus"></i></span> Nueva Producto
            </button>
            @include('product.create')
        </div>
        
    </div>

    {{-- Table registers --}}
    <div class="table-responsive">

        <table class="table table-striped table-striped-column" id="tables">

            <thead style="background-color: #125873; color: white;">
                <tr>
                    <th class="col-md-4" scope="col">Proveedor</th>
                    <th class="col-md-4" scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{$product->provider->description}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->amount}}</td>
                        <td>

                            {{-- Modal Edit --}}
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit{{$product->id_product}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            {{-- Modal delete --}}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$product->id_product}}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            @include('product.actions')

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
    
@endsection