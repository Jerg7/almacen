@extends('layouts.layout')

@section('content')
    <br>

    <div id="transparencia" style="display:none"></div>

    {{-- Form --}}
    <form id="FormCreateRequirement" method="POST" >

        @csrf

        <input type="hidden" name="user" value="{{ Auth::user()->id_user }}">
        <br>
        <div class="row">
            <div class="col-md-10">
                <h4 class="titulo">Requerimientos</h4>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-primary" onclick="aggRequirement()"><i class="fa-solid fa-plus"></i> Añadir</button>
            </div>
        </div>
        <br>

        <div class="row">

            <div class="col">
                <label for="product" class="form-label" style="text-aling: left;">Producto: </label>
                <select name="product" id="product" class="form-control">
                    <option selected disabled>Seleccione...</option>
                    @foreach ($products as $product)
                    <option value="{{$product->id_product}}">{{$product->product_data->description}}</option>    
                @endforeach
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

        <div id="aggInput_"></div>

        <div class="form-group">
            <div id="estatus"></div>
        </div>

        <br>
        <div style="text-align: center;">
            {{-- <button type="submit" class="btn btn-primary">Guardar</button> --}}
            <button type="submit" class="btn btn-success" onclick="fastrequirementCreate()">Guardar</button>
        </div>

    </form>

@endsection