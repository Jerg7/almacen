<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Almacén - Seguros Miranda, C.A.</title>
    <meta name="viewport" content="width=1000, initial-scale=1.0, maximun-scale=1.0">

    @include('header.headerCSS')
</head>
<section class="vh-100">
    
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
          
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('assets/img/logo_banner_sm.png')}}">
                        </div>
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

            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

                <form action="{{route('login')}}" method="POST">
                    @csrf

                    <div class="d-flex flex-row align-items-center">
                        <center><h2 class="titulo"><strong>Sistema de Gestión de Almacén</strong></h2></center>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        <center><h2 class="titulo"><strong>Seguros Miranda, C.A.</strong></h2></center>
                    </div>
                    <br>
                    <div class="d-flex flex-row align-items-center text-center">
                        <h3 class="titulo">Iniciar sesión</h3>
                    </div>
  
                    <!-- Usuario input -->
                    <div class="form-outline mb-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="text" id="form3Example3" name="username" class="form-control form-control-lg @error('username') is-invalid @enderror" placeholder="Nombre de usuario" value="{{old('username')}}" required autofocus>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <!-- Contraseña input -->
                    <div class="form-outline mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" id="form3Example4" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Contraseña" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div>
                        @error('error')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> --}}
  
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Ingresar</button>
                        {{-- <p class="small fw-bold mt-2 pt-1 mb-0">¿No tienes cuenta? <a href="" class="link-danger">Registrar</a></p> --}}
                    </div>
  
                </form>

            </div>
        </div>
    </div>

    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
            <p class="footer-title" style="color:#FFF;">Contacto</p>
            <p style="color:#FFF;">Avenida Francisco de Miranda, Centro Plaza piso 17 Torre D, Caracas 1071, Miranda</p>
        </div>
        <!-- Copyright -->
    </div>

</section>
@include('footer.footerJS')