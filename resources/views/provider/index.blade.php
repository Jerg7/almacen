@extends('layouts.layout')

@section('content')

    <br>
    <div class="row">
        <div class="col">
            <h3 class="titulo"><strong><i class="fa-solid fa-id-card"></i> Proveedores</strong></h3>
        </div>

        {{-- Modal crear --}}
        <div class="col-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                <span><i class="fa-solid fa-plus"></i></span> Nuevo proveedor
            </button>
            @include('provider.create')
        </div>

    </div>

    {{-- Table registers --}}
    <div class="table-responsive">

        <table class="table table-striped table-striped-column" id="tables">

            <thead style="background-color: #125873; color: white;">
                <tr>
                    <th scope="col">Nombres de proveedor</th>
                    <th scope="col">Rif</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($providers as $provider)
                    <tr>
                        <td>{{$provider->description}}</td>
                        <td>{{$provider->rif}}</td>
                        <td>

                            {{-- Modal edit --}}
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit{{$provider->id_provider}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                              |  
                            {{-- Modal delete --}}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$provider->id_provider}}">
                                <i class="fa-solid fa-trash"></i>
                            </button>                            
                            @include('provider.actions')

                        </td>
                    </tr>
                @endforeach 
            </tbody>
            
        </table>

    </div>
    
@endsection