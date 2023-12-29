{{-- Modal show --}}
<div class="modal fade" id="show{{$user->id_user}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Datos del usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <h3 align="center">{{ucwords(strtolower($user->user_detail->names))}} {{ucwords(strtolower($user->user_detail->lastnames))}}</h3>
                <br>
                <p><strong>Cédula: </strong>{{$user->user_detail->identification_card}}</p>
                <p><strong>Correo electrónico: </strong>{{strtolower($user->email)}}</p>
                <p><strong>Extensión: </strong>{{$user->user_detail->extension}}</p>
                <p><strong>Gerencia: </strong>{{$user->user_detail->management->description}}</p>
                <p><strong>Cargo: </strong>{{ucfirst(strtolower($user->user_detail->job_position->description))}}</p>            
            </div>

            <div class="modal-footer">
                <button class="btn btn-success" data-bs-target="#edit{{$user->id_user}}" data-bs-toggle="modal">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
                <button class="btn btn-danger" data-bs-target="#delete{{$user->id_user}}" data-bs-toggle="modal">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>

        </div>
    </div>
</div>


{{-- Modal edit --}}
<div class="modal fade" id="edit{{$user->id_user}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Editar usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{route('users.update', $user->id_user)}}" method="POST">

                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="caja2">

                        {{-- IZQUIERDA --}}
                        <div class="izq2">

                            <br>
                            <h4 class="form-signin-heading span10 titulo" style="text-align:left; ">Datos Personales</h4>
                            <br>

                            <div class="row">
                                <div class="col">
                                    <label class="text-left form-label"> Nombres:</label>
                                    <div class="col-xs-3">
                                        <input onchange="this.value=this.value.toUpperCase()" type="text" class="form-control" name="names" id="names" aria-describedby="helpId" value="{{$user->user_detail->names}}"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="text-left form-label"> Apellidos:</label>
                                    <div class="col-xs-3">
                                        <input onchange="this.value=this.value.toUpperCase()" type="text" class="form-control" name="lastnames" id="lastnames" aria-describedby="helpId" value="{{$user->user_detail->lastnames}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label class="text-left form-label"> Cédula:</label>
                                    <div class="col-xs-3">
                                        <input onchange="this.value=this.value.toUpperCase()" type="text" class="form-control" name="identification_card" id="identification_card" aria-describedby="helpId" value="{{$user->user_detail->identification_card}}"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="text-left form-label"> Correo electrónico:</label>
                                    <div class="col-xs-3">
                                        <input onchange="this.value=this.value.toUpperCase()" type="email" class="form-control" name="email" id="email" aria-describedby="helpId" value="{{$user->email}}"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="text-left form-label"> Extensión:</label>
                                    <div class="col-xs-3">
                                        <input onchange="this.value=this.value.toUpperCase()" type="text" class="form-control" name="extension" id="extension" aria-describedby="helpId" value="{{$user->user_detail->extension}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label class="text-left form-label"> Gerencia:</label>
                                    <div class="col-xs-3">
                                        <select name="management" id="management" class="form-control">
                                            @foreach ($managements as $management)
                                                @if ($management->id_management === $user->user_detail->id_management)
                                                    <option value="{{$management->id_management}}" selected>{{$management->description}}</option>  
                                                @else  
                                                    <option value="{{$management->id_management}}">{{$management->description}}</option>    
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="text-left form-label"> Cargo:</label>
                                    <div class="col-xs-3">
                                        <select name="position" id="position" class="form-control">
                                            @foreach ($positions as $position)
                                            @if ($position->id_position === $user->user_detail->id_position)
                                                <option value="{{$position->id_position}}" selected>{{$position->description}}</option>  
                                            @else  
                                                <option value="{{$position->id_position}}">{{$position->description}}</option>    
                                            @endif
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- DERECHA --}}
                        <div class="der2">

                            <br>
                            <h4 class="form-signin-heading span10 titulo" style="text-align:left;" class="titulo">Datos de Acceso al Sistema</h4>
                            <br>

                            <div class="row">
                                <div class="col">
                                    <label class="text-left form-label"> Perfil de usuario:</label>
                                    <div class="col-xs-3">
                                        <select name="role" id="role" class="form-control">
                                            @foreach ($roles as $role)
                                                @if ($role->id_role === $user->id_role)
                                                    <option value="{{$role->id_role}}" selected>{{$role->description}}</option>  
                                                @else  
                                                    <option value="{{$role->id_role}}">{{$role->description}}</option>    
                                                @endif
                                            @endforeach
                                        </select>                                
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="text-left form-label"> Nomdre de usuario:</label>
                                    <div class="col-xs-3">
                                        <input onchange="this.value=this.value.toUpperCase()" type="text" class="form-control" name="username" id="username" aria-describedby="helpId" value="{{$user->username}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label class="text-left form-label"> Contraseña:</label>
                                    <div class="col-xs-3">
                                        <input onchange="this.value=this.value.toUpperCase()" type="password" class="form-control" name="password" id="password" aria-describedby="helpId" value="{{$user->password}}"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="text-left form-label"> Confirmar contraseña:</label>
                                    <div class="col-xs-3">
                                        <input onchange="this.value=this.value.toUpperCase()" type="password" class="form-control" name="password_confirmed" id="password_confirmed" aria-describedby="helpId" value="{{$user->password}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label class="text-left form-label"> Pregunta de seguridad:</label>
                                    <div class="col-xs-3">
                                        <select name="question" id="question" class="form-control">
                                            @foreach ($questions as $question)
                                                @if ($question->id_question === $user->id_question)
                                                    <option value="{{$question->id_question}}" selected>{{$question->description}}</option>  
                                                @else  
                                                    <option value="{{$question->id_question}}">{{$question->description}}</option>    
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="text-left form-label"> Respuesta de seguridad:</label>
                                    <div class="col-xs-3">
                                        <input onchange="this.value=this.value.toUpperCase()" type="text" class="form-control" name="answer" id="answer" aria-describedby="helpId" value="{{$user->security_answer}}"/>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-target="#show{{$user->id_user}}" data-bs-toggle="modal">Volver</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>

            </form>

        </div>
    </div>
</div>


{{-- Modal delete --}}
<div class="modal fade" id="delete{{$user->id_user}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Eliminar usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{route('users.destroy', $user->id_user)}}" method="POST">

                @csrf
                @method('DELETE')

                <div class="modal-body">
                    ¿Está seguro de que desea eliminar el usuario de <strong><em>{{$user->user_detail->names}} {{$user->user_detail->lastnames}}</em></strong>?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-target="#show{{$user->id_user}}" data-bs-toggle="modal">Volver</button>
                    <button type="submit" class="btn btn-success">Confirmar</button>
                </div>

            </form>

        </div>
    </div>
</div>