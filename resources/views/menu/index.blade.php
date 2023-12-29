<!DOCTYPE html>
<html lang="en">
<body>

    {{-- Logo & fecha --}}
    <div id="header">
        <nav><img src="/assets/img/logo_banner_sm.png" height="130" width="190"></nav>
    </div>

    {{-- Bar date --}}
    <div class="container-fluid" style="background-color:#125873; width:100%; color:#FFF; text-align:right; font-size:14px; padding-top:10px;">
        <i class="fa-regular fa-calendar"></i>
        <script>
            var meses = new Array ("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
            var f = new Date();
            document.write("Fecha: "+f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear()) ;
        </script> | 
        <i class="fa-regular fa-clock"></i>
        <script type="text/javascript" src="{{asset('/assets/js/liveclok/liveclock.js')}}"></script>
        <script>
            show_clock();
        </script>
    </div>
    
    {{-- Navbar --}}
    <nav class="navbar navbar-expand navbar-light bg-light">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @switch(Auth::user()->id_role) 

            @case(1) {{-- ADMINISTRADOR --}} 
                {{-- IZQUIERDA --}}
                <ul class="nav navbar-nav me-auto">

                    <li class="nav-item"> {{-- Home --}}
                        <a class="nav-link active" href="{{url('home')}}" aria-current="page"> <i class="fa-solid fa-house"></i> INICIO <span class="visually-hidden">(current)</span></a>
                    </li>
                    
                    <li class="nav-item dropdown" style="text-align:right;"> {{-- Requirement --}}
                        <a class="nav-link dropdown-toggle nav-right" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Requerimientos 
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{route('requirements.create')}}">
                                    Nuevo requerimiento
                                </a>
                            </li>
                            
                            <li>
                                <a class="dropdown-item" href="{{ route('requirements.index') }}"">
                                    Listado de requerimientos
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>

                {{-- DERECHA --}}
                <ul class="nav navbar-nav ms-auto">

                    <li class="nav-item dropdown" style="text-align:right;"> {{-- User --}}
                        <a class="nav-link dropdown-toggle nav-right" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Mantenimiento        
                        </a>
                        <ul class="dropdown-menu">
        
                            <li class="nav-item"> {{-- Category --}}
                                <a class="nav-link" href="{{route('categories.index')}}">Categorías</a>
                            </li>
        
                            <li class="nav-item"> {{-- Product --}}
                                <a class="nav-link" href="{{route('products.index')}}">Productos</a>
                            </li>
        
                            <li class="nav-item"> {{-- Management --}}
                                <a class="nav-link" href="{{route('managements.index')}}">Gerencias</a>
                            </li>
                            
                            <li class="nav-item"> {{-- Job Position --}}
                                <a class="nav-link" href="{{route('job_positions.index')}}">Cargos</a>
                            </li>                        
                        </ul>
                    </li>

                    <li class="nav-item dropdown" style="text-align:right;"> {{-- User --}}
                        <a class="nav-link dropdown-toggle nav-right" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-tie"></i> {{ Auth::user()->username }}        
                        </a>
                        <ul class="dropdown-menu">
                            @include('auth.logout')
                        </ul>
                    </li>

                </ul>
            @break

            @case(2) {{-- OTRO --}} 
                {{-- IZQUIERDA --}}
                <ul class="nav navbar-nav me-auto">

                    <li class="nav-item"> {{-- Home --}}
                        <a class="nav-link active" href="{{url('home')}}" aria-current="page"> <i class="fa-solid fa-house"></i> INICIO <span class="visually-hidden">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown" style="text-align:right;"> {{-- Requirement --}}
                        <a class="nav-link dropdown-toggle nav-right" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Requerimientos 
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{route('requirements.create')}}">
                                    Nuevo requerimiento
                                </a>
                            </li>
                            
                            <li>
                                <a class="dropdown-item" href="{{ route('requirements.index') }}"">
                                    Listado de requerimientos
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>

                {{-- DERECHA --}}
                <ul class="nav navbar-nav ms-auto">

                    <li class="nav-item dropdown" style="text-align:right;"> {{-- User --}}
                        <a class="nav-link dropdown-toggle nav-right" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-tie"></i> {{ Auth::user()->username }}        
                        </a>
                        <ul class="dropdown-menu">
                            @include('auth.logout')
                        </ul>
                    </li>

                </ul>
            @break
            
            @default
                
        @endswitch

    </nav>

</body>
</html>
