@switch(Auth::user()->id_role)
    @case(1)
        <li>
            <a class="dropdown-item" href="{{route('users.index')}}">
                <i class="fa-solid fa-user-plus"></i> Nuevo Usuario
            </a>
        </li>
    @break
        
@endswitch
    <li>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar sesión
        </a>
    </li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none; ">
    @csrf
    </form>

