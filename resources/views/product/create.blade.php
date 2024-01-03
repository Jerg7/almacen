{{-- Modal create --}}
<div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Productos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            <form id="FormCreateProduct" method="POST">

                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="provider" class="form-label" style="text-aling: left;">Proveedor: </label>
                            <select name="provider" class="form-control">
                                <option selected disabled>Seleccione...</option>
                                @foreach ($providers as $provider)
                                    <option value="{{$provider->id_provider}}">{{$provider->description}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="description" class="form-label" style="text-aling: left;">Nombre de producto:</label>
                            <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId" placeholder=""/>
                        </div>
                        <div class="col">
                            <label for="prices" class="form-label" style="text-aling: left;">Costo (Bs.):</label>
                            <input type="text" class="form-control" name="prices" id="prices" aria-describedby="helpId" placeholder=""/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div id="estatus"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    {{-- <button type="submit" class="btn btn-success">Guardar</button> --}}
                    <button type="submit" class="btn btn-success" onclick="productCreate()">Guardar</button>
                </div>
                
            </form>

        </div>
    </div>
</div>