{{-- Modal create --}}
<div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Proveedor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            <form id="FormProviderCreate" method="POST">

                @csrf

                <div class="modal-body">  
                    <div class="row g-6">
                        <div class="col">
                            <label for="description" class="form-label">Nombre del proveedor: </label>
                            <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId" placeholder="" onchange="this.value=this.value.toUpperCase()"/>
                        </div>
                        <div class="col">
                            <label for="rif" class="form-label">Rif: </label>
                            <input type="text" class="form-control" name="rif" id="rif" aria-describedby="helpId" placeholder="" onchange="this.value=this.value.toUpperCase()"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div id="estatus"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" onclick="providerCreate()">Guardar</button>
                </div>

            </form>
            
        </div>
    </div>
</div>