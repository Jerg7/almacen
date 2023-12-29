{{-- Modal show --}}
<div class="modal fade" id="show{{$requirement->id_requirement}}" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Datos del usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <h3 align="center">{{ucwords(strtolower($requirement->reg_user->user_detail->management->description))}}</h3>
                <br>
                <p><strong>Categoria: </strong>{{$requirement->product->category->description}}</p>
                <p><strong>Producto: </strong>{{$requirement->product->description}}</p>
                <p><strong>Cantidad en stock: </strong>{{$requirement->product->amount}}</p>
                <p><strong>Cantidad requerida: </strong>{{$requirement->requested_amount}}</p>
            </div>

            <div class="modal-footer">
                <button class="btn btn-success" data-bs-target="#historic{{$requirement->id_requirement}}" data-bs-toggle="modal" onclick="loadHistory({{$requirement->id_user}})">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
                <button class="btn btn-danger" data-bs-target="#delete{{$requirement->id_requirement}}" data-bs-toggle="modal">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>

        </div>
    </div>
</div>


{{-- Modal historic --}}
<div class="modal fade" id="historic{{$requirement->id_requirement}}" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Historico de requerimientos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="table-responsive" id="historic_table">
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-target="#show{{$requirement->id_requirement}}" data-bs-toggle="modal">Volver</button>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>

        </div>
    </div>
</div>


{{-- Modal accept --}}
<div class="modal fade" id="accept{{$requirement->id_requirement}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            
            <div class="modal-header">
                <h1 class="titulo modal-title fs-5" id="staticBackdropLabel">Aceptar requerimiento.</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            <form id="FormAcceptRequirement_{{$requirement->id_requirement}}">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="row">

                        <div class="col">
                            <label for="category" class="form-label" style="text-aling: left;">Categoría: </label>
                            <input type="text" class="form-control" value="{{$requirement->category->description}}" disabled>  
                            <input type="hidden" name="category" id="category" value="{{$requirement->id_category}}">      
                        </div>
                        <div class="col">
                            <label for="product" class="form-label" style="text-aling: left;">Producto: </label>
                            <input type="text" class="form-control" value="{{$requirement->product->description}}" disabled>   
                            <input type="hidden" name="product" id="product" value="{{$requirement->id_product}}">             
                        </div>
                        <div class="col">
                            <label for="requested_amount" class="form-label" style="text-aling: left;">Cantidad requerida: </label>
                            <input type="text" class="form-control" name="requested_amount" id="requested_amount" value="{{$requirement->requested_amount}}" disabled>
                        </div>
                        <div class="col">
                            <label for="amount" class="form-label" style="text-aling: left;">Cantidad de existencia: </label>
                            <input type="text" class="form-control" name="amount" id="amount" value="{{$requirement->product->amount}}" disabled>
                        </div>
            
                    </div>
            
                    <div class="row">
            
                        <div class="col">
                            <label for="justification" class="form-label" style="text-aling: left;">Justificación de requerimiento: </label>
                            <textarea name="justification" id="justification" class="form-control" cols="30" rows="3">{{$requirement->justification}}</textarea>
                        </div>
            
                    </div>

                    <div class="row"> 
                        <div class="col form-check form-switch">
                            <br>
                            <input class="form-check-input" type="checkbox" role="switch" value="1" name="condition" id="condition" onchange="requirementCondition(this)"> Modificar cantidad.
                        </div>
                    </div>

                    <div class="row"> 
                        <div class="col-md-3">
                            <label for="amount_delivery" id="amount_delivery_label" class="form-label" style="text-align: left;display: none;">Cantidad entregada: </label>
                            <div class="input-group" id="amount_delivery_input" style="display: none;">
                                <span class="input-group-text boton_span" onclick="btn_decrement2()">-</span>
                                <input type="number" id="amount_delivery" name="amount_delivery" class="form-control" value="{{$requirement->requested_amount}}">
                                <span class="input-group-text boton_span" onclick="btn_increment2()">+</span>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <label for="modified_justification" id="modified_justification_label" class="form-label" style="text-align: left;display: none;">Justificación de modificación: </label>
                            <textarea name="modified_justification" id="modified_justification_input" class="form-control" cols="30" rows="3" style="display: none;" disabled></textarea>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <div id="estatusAccept{{$requirement->id_requirement}}"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-target="#historic{{$requirement->id_requirement}}" data-bs-toggle="modal">Volver</button>
                    <button type="submit" class="btn btn-success" onclick="requirementEdit({{$requirement->id_requirement}})">Aceptar</button>
                </div>

            </form>

        </div>
    </div>
</div>


{{-- Modal decline --}}
<div class="modal fade" id="decline{{$requirement->id_requirement}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Rechazar solicitud</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            <form id="FormDeleteRequirement_{{$requirement->id_requirement}}">

                @csrf
                @method('DELETE')

                <div class="modal-body">
                    ¿Está seguro de que desea rechazar el requerimiento por parte de la Gerencia de <strong><em>{{$requirement->reg_user->user_detail->management->description}}</em></strong> de <strong><em>{{$requirement->requested_amount}} unidades de {{$requirement->product->description}}</em></strong>?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-target="#historic{{$requirement->id_requirement}}" data-bs-toggle="modal">Volver</button>
                    <button type="submit" class="btn btn-success">Confirmar</button>
                </div>

            </form>

        </div>
    </div>
</div>