{{-- Modal edit --}}
<div class="modal fade" id="edit{{$management->id_management}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Categoría</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            <form id="FormEditManagement_{{$management->id_management}}">

                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="row g-6">
                        <div class="col-auto">
                            <label for="description" class="form-label">Nombre de categoría</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId" placeholder="" value="{{$management->description}}"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div id="estatusEdit{{$management->id_management}}"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    {{-- <button type="submit" class="btn btn-success">Actualizar</button> --}}
                    <button type="submit" class="btn btn-success" onclick="managementEdit({{$management->id_management}})">Actualizar</button>
                </div>
                
            </form>

        </div>
    </div>
</div>


{{-- Modal delete --}}
<div class="modal fade" id="delete{{$management->id_management}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Categoría</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            {{-- <form action="{{route('managements.destroy', $management->id_management)}}" method="POST"> --}}
            <form id="FormDeleteManagement_{{$management->id_management}}">
                
                @csrf
                @method('DELETE')

                <div class="modal-body">
                    ¿Está seguro de que desea eliminar la management <strong><em>{{$management->description}}</em></strong>?
                </div>

                <div class="form-group">
                    <div id="estatusDelete{{$management->id_management}}"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    {{-- <button type="submit" class="btn btn-success">Confirmar</button> --}}
                    <button type="submit" class="btn btn-success" onclick="managementDelete({{$management->id_management}})">Confirmar</button>
                </div>

            </form>

        </div>
    </div>
</div>