 {{-- Modal create --}}
 <div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Productos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            {{-- <form action="{{route('users.store')}}" method="POST"> --}}
            <form id="FormCreateUser" method="POST">

                @csrf

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
                                        <input onchange="this.value=this.value.toUpperCase()" type="text" class="form-control @error('names') is-invalid @enderror" name="names" id="names" aria-describedby="helpId" placeholder=""/>
                                        @error('names')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="text-left form-label"> Apellidos:</label>
                                    <div class="col-xs-3">
                                        <input onchange="this.value=this.value.toUpperCase()" type="text" class="form-control @error('lastnames') is-invalid @enderror" name="lastnames" id="lastnames" aria-describedby="helpId" placeholder=""/>
                                        @error('lastnames')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label class="text-left form-label"> Cédula:</label>
                                    <div class="col-xs-3">
                                        <input onchange="this.value=this.value.toUpperCase()" type="text" class="form-control @error('identification_card') is-invalid @enderror" name="identification_card" id="identification_card" aria-describedby="helpId" placeholder=""/>
                                        @error('identification_card')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="text-left form-label"> Correo electrónico:</label>
                                    <div class="col-xs-3">
                                        <input onchange="this.value=this.value.toUpperCase()" type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="helpId" placeholder=""/>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="text-left form-label"> Extensión:</label>
                                    <div class="col-xs-3">
                                        <input onchange="this.value=this.value.toUpperCase()" type="text" class="form-control @error('extension') is-invalid @enderror" name="extension" id="extension" aria-describedby="helpId" placeholder=""/>
                                        @error('extension')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label class="text-left form-label"> Gerencia:</label>
                                    <div class="col-xs-3">
                                        <select name="management" id="management" class="form-control @error('management') is-invalid @enderror">
                                            <option selected disabled>Seleccione...</option>
                                            @foreach ($managements as $management)
                                                <option value="{{$management->id_management}}">{{$management->description}}</option>
                                            @endforeach
                                        </select>
                                        @error('management')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="text-left form-label"> Cargo:</label>
                                    <div class="col-xs-3">
                                        <select name="position" id="position" class="form-control @error('position') is-invalid @enderror">
                                            <option selected disabled>Seleccione...</option>
                                            @foreach ($positions as $position)
                                                <option value="{{$position->id_position}}">{{$position->description}}</option>
                                            @endforeach
                                        </select>
                                        @error('position')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                                        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                                            <option selected disabled>Seleccione...</option>
                                            @foreach ($roles as $role)
                                                <option value="{{$role->id_role}}">{{$role->description}}</option>
                                            @endforeach
                                        </select> 
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror                               
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="text-left form-label"> Nomdre de usuario:</label>
                                    <div class="col-xs-3">
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" aria-describedby="helpId" placeholder=""/>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror   
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label class="text-left form-label"> Contraseña:</label>
                                    <div class="col-xs-3">
                                        <input onchange="this.value=this.value.toUpperCase()" type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" aria-describedby="helpId" placeholder=""/>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror   
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="text-left form-label"> Confirmar contraseña:</label>
                                    <div class="col-xs-3">
                                        <input onchange="this.value=this.value.toUpperCase()" type="password" class="form-control @error('password_confirmed') is-invalid @enderror" name="password_confirmed" id="password_confirmed" aria-describedby="helpId" placeholder=""/>
                                        @error('password_confirmed')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror   
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label class="text-left form-label"> Pregunta de seguridad:</label>
                                    <div class="col-xs-3">
                                        <select name="question" id="question" class="form-control @error('question') is-invalid @enderror">
                                            <option selected disabled>Seleccione...</option>
                                            @foreach ($questions as $question)
                                                <option value="{{$question->id_question}}">{{$question->description}}</option>
                                            @endforeach
                                        </select>
                                        @error('question')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror   
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="text-left form-label"> Respuesta de seguridad:</label>
                                    <div class="col-xs-3">
                                        <input onchange="this.value=this.value.toUpperCase()" type="text" class="form-control @error('asnwer') is-invalid @enderror" name="answer" id="answer" aria-describedby="helpId" placeholder=""/>
                                        @error('asnwer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror   
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <div id="estatus"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    {{-- <button type="submit" class="btn btn-success">Guardar</button> --}}
                    <button type="submit" class="btn btn-success" onclick="userCreate()">Guardar</button>
                </div>

            </form>

        </div>
    </div>
</div>