@extends('layouts.layout')

@section('content')

    <br>
    <div class="row">
        <div class="col">
            <h3 class="titulo"><strong>Gerencias</strong></h3>
        </div>

        {{-- Modal create --}}
        <div class="col-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                <span><i class="fa-solid fa-plus"></i></span> Nueva gerencia
            </button>
            @include('management.create')
        </div>

    </div>

    {{-- Table registers --}}
    <div class="table-responsive">

        <table class="table table-striped table-striped-column" id="tables">

            <thead style="background-color: #125873; color: white;">
                <tr>
                    <th class="col-md-10" scope="col">Categoría</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($managements as $management)
                    <tr class="">
                        <td class="col-md-10">{{$management->description}}</td>
                        <td>

                            {{-- Modal edit --}}
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit{{$management->id_management}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            {{-- Modal delete --}}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$management->id_management}}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            @include('management.actions')

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>

@endsection