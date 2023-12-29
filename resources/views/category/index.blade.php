@extends('layouts.layout')

@section('content')
    
    <br>
    <div class="row">
        <div class="col">
            <h3 class="titulo"><strong>Categoría</strong></h3>
        </div>

        {{-- Modal create --}}
        <div class="col-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                <span><i class="fa-solid fa-plus"></i></span> Nueva categoría
            </button>
            @include('category.create')
        </div>

    </div>

    {{-- Table registers --}}
    <div class="table-responsive">

        <table class="table table-striped table-striped-column" id="tables">

            <thead style="background-color: #125873; color: white;">
                <tr>
                    <th id="filtro" class="col-md-10" scope="col">Categoría</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    <tr class="">
                        <td class="col-md-10">{{$category->description}}</td>
                        <td>

                            {{-- Modal edit --}}
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit{{$category->id_category}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            {{-- Modal delete --}}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$category->id_category}}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            @include('category.actions')

                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>

    </div>

@endsection