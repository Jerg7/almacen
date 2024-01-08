{{-- Modal edit --}}
<div class="modal fade" id="edit{{$position->id_position}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Cargo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            <form id="FormEditJP_{{$position->id_position}}">
                
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="row g-6">
                        <div class="col-auto">
                            <label for="descripcion" class="form-label">Nombre de Cargo</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="" value="{{$position->description}}"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div id="estatusEdit{{$position->id_position}}"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    {{-- <button type="submit" class="btn btn-success">Actualizar</button> --}}
                    <button type="submit" class="btn btn-success" onclick="jpEdit({{$position->id_position}})">Actualizar</button>
                </div>

            </form>

        </div>
    </div>
</div>


{{-- Modal delete --}}
<div class="modal fade" id="delete{{$position->id_position}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminar Cargo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            <form id="FormDeleteJP_{{$position->id_position}}">

                @csrf
                @method('DELETE')

                <div class="modal-body">
                    ¿Está seguro de que desea eliminar la cargo <strong><em>{{$position->description}}</em></strong>?
                </div>

                <div class="form-group">
                    <div id="estatusDelete{{$position->id_position}}"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    {{-- <button type="submit" class="btn btn-success">Confirmar</button> --}}
                    <button type="submit" class="btn btn-success" onclick="jpDelete({{$position->id_position}})">Confirmar</button>
                </div>

            </form>

        </div>
    </div>
</div>