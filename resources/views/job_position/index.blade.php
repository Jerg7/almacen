@extends('layouts.layout')

@section('content')

    <br>
    <div class="row">
        <div class="col">
            <h3 class="titulo"><strong>Cargos</strong></h3>
        </div>

        {{-- Modal create --}}
        <div class="col-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                <span><i class="fa-solid fa-plus"></i></span> Nueva cargo
            </button>
            @include('job_position.create')
        </div>

    </div>

    {{-- Table registers --}}
    <div class="table-responsive">

        <table class="table table-striped table-striped-column" id="tables">

            <thead style="background-color: #125873; color: white;">
                <tr>
                    <th class="col-md-10" scope="col">Nombre del cargo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($positions as $position)
                    <tr class="">
                        <td class="col-md-10">{{$position->description}}</td>
                        <td>

                            {{-- Modal Edit --}}
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit{{$position->id_position}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            {{-- Modal Delete --}}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$position->id_position}}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            @include('job_position.actions')

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        
    </div>

@endsection