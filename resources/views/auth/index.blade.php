@extends('layouts.layout')

@section('content')

    <br>
    <div class="row">
        <div class="col">
            <h3 class="titulo"><strong><i class="fa-solid fa-id-card"></i> Usuarios</strong></h3>
        </div>

        {{-- Modal crear --}}
        <div class="col-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                <span><i class="fa-solid fa-plus"></i></span> Nuevo usuario
            </button>
            @include('auth.create')
        </div>

    </div>

    {{-- Table registers --}}
    <div class="table-responsive">
        <table class="table table-striped table-striped-column" id="tables">

            <thead style="background-color: #125873; color: white;">
                <tr>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Cedula de identidad</th>
                    <th scope="col">Perfil de usuario</th>
                    <th scope="col">Ver más</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->user_detail->names}}</td>
                        <td>{{$user->user_detail->lastnames}}</td>
                        <td>{{$user->user_detail->identification_card}}</td>
                        <td>{{$user->roles->description}}</td>
                        <td>

                            {{-- Modal Show --}}
                            <a data-bs-toggle="modal" href="#show{{$user->id_user}}" role="button"><i class="fa-solid fa-eye fa-2x"></i></a>
                            @include('auth.actions')

                        </td>
                    </tr>
                @endforeach
                
            </tbody>
            
        </table>

    </div>
    
@endsection