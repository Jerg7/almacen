{{-- Modal create --}}
<div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Categoría</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            {{-- <form action="{{route('managements.store')}}" method="POST"> --}}
            <form id="FormCreateManagement" method="POST">
                @csrf

                <div class="modal-body">
                    <div class="row g-6">
                        <div class="col-auto">
                            <label for="descripcion" class="form-label">Nombre de gerencia</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder=""/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div id="estatus"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    {{-- <button type="submit" class="btn btn-success">Guardar</button> --}}
                    <button type="submit" class="btn btn-success" onclick="managementCreate()">Guardar</button>
                </div>

            </form>

        </div>
    </div>
</div>