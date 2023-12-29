@extends('layouts.layout')

@section('content')
    <br>

    <div id="transparencia" style="display:none"></div>

    {{-- Form --}}
    <form id="FormCreateRequirement" method="POST" >

        @csrf

        <input type="hidden" name="user" value="{{ Auth::user()->id_user }}">
        <br>
            <h4 class="titulo" style="text-align: center;">Requerimientos</h4>
        <br>

        <div class="row">

            <div class="col">
                <label for="category" class="form-label" style="text-aling: left;">Categoría: </label>
                <select name="category" id="category" class="form-control" onchange="selectCategory()">
                    <option selected disabled>Seleccione...</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id_category}}">{{$category->description}}</option>    
                    @endforeach
                </select>            
            </div>
            <div class="col">
                <label for="product" class="form-label" style="text-aling: left;">Producto: </label>
                <select name="product" id="product" class="form-control">
                    <option selected disabled>Seleccione...</option>
                </select>            
            </div>
            <div class="col">
                <label for="requested_amount" class="form-label" style="text-aling: left;">Cantidad requerida: </label>
                <div class="input-group">
                    <span class="input-group-text boton_span" onclick="btn_decrement()">-</span>
                    <input type="number" class="form-control" name="requested_amount" id="requested_amount" value="0">
                    <span class="input-group-text boton_span" onclick="btn_increment()">+</span>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col">
                <label for="justification" class="form-label" style="text-aling: left;">Justificación de requerimiento: </label>
                <textarea name="justification" id="justification" class="form-control" cols="30" rows="3"></textarea>
            </div>

        </div>

        <div class="form-group">
            <div id="estatus"></div>
        </div>

        <br>
        <div style="text-align: center;">
            {{-- <button type="submit" class="btn btn-primary">Guardar</button> --}}
            <button type="submit" class="btn btn-primary" onclick="requirementCreate()">Guardar</button>
        </div>

    </form>

@endsection