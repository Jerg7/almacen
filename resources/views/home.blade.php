@extends('layouts.layout')

@section('content')
    
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">

            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('assets/img/almacen1.png')}}">
            </div>

            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('assets/img/almacen2.png')}}">
            </div>
            
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>

    </div>

@endsection