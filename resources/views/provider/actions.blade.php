{{-- Modal edit --}}
<div class="modal fade" id="edit{{$provider->id_provider}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Proveedor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            <form id="FormEditProvider_{{$provider->id_provider}}">

                @csrf
                @method('PUT')

                <div class="modal-body">  
                    <div class="row g-6">
                        <div class="col">
                            <label for="description" class="form-label">Nombre del proveedor: </label>
                            <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId" placeholder="" onchange="this.value=this.value.toUpperCase()" value="{{$provider->description}}"/>
                        </div>
                        <div class="col">
                            <label for="rif" class="form-label">Rif: </label>
                            <input type="text" class="form-control" name="rif" id="rif" aria-describedby="helpId" placeholder="" onchange="this.value=this.value.toUpperCase()" value="{{$provider->rif}}"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div id="estatusEdit{{$provider->id_provider}}"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" onclick="providerEdit({{$provider->id_provider}})">Actualizar</button>
                </div>

            </form>

        </div>
    </div>
</div>


{{-- Modal delete --}}
<div class="modal fade" id="delete{{$provider->id_provider}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminar Proveedor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            <form id="FormDeleteProvider_{{$provider->id_provider}}">
                
                @csrf
                @method('DELETE')
                
                <div class="modal-body">
                    ¿Está seguro de que desea eliminar el proveedor <strong><em>{{$provider->description}}</em></strong>?
                </div>

                <div class="form-group">
                    <div id="estatusDelete{{$provider->id_provider}}"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" onclick="providerDelete({{$provider->id_provider}})">Confirmar</button>
                </div>

            </form>

        </div>
    </div>
</div>