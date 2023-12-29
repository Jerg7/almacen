@extends('layouts.layout')

@section('content')

    <br>
    <div class="row">

        <div class="col">
            <h3 class="titulo"><strong><i class="fa-solid fa-cart-shopping"></i> Productos</strong></h3>
        </div>
        
    </div>

    {{-- Table registers --}}
    <div class="table-responsive">

        <table class="table table-striped table-striped-column" id="tables">

            <thead style="background-color: #125873; color: white;">
                <tr>
                    <th scope="col">Gerencia</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad requerida</th>
                    <th scope="col">Justificación de requerimiento</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($requirements as $requirement)
                    <tr>
                        <td>{{$requirement->reg_user->user_detail->management->description}}</td>
                        <td>{{$requirement->product->description}}</td>
                        <td>{{$requirement->requested_amount}}</td>
                        <td>{{$requirement->justification}}</td>
                        <td>

                            {{-- Modal Show --}}
                            <a data-bs-toggle="modal" href="#show{{$requirement->id_requirement}}" role="button"><i class="fa-solid fa-eye fa-2x"></i></a>
                            @include('requirement.actions')

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
    
@endsection