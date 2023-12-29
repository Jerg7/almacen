{{-- Modal create --}}
<div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Productos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            {{-- <form action="{{route('products.store')}}" method="POST"> --}}
            <form id="FormCreateProduct" method="POST">

                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="descripcion" class="form-label" style="text-aling: left;">Categoria:</label>
                            <select name="categoria" id="" class="form-control">
                                <option selected disabled>Seleccione...</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id_category}}">{{$category->description}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="descripcion" class="form-label" style="text-aling: left;">Nombre de producto:</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder=""/>
                        </div>
                        <div class="col">
                            <label for="cantidad" class="form-label" style="text-aling: left;">Cantidad:</label>
                            <input type="text" class="form-control" name="cantidad" id="cantidad" aria-describedby="helpId" placeholder=""/>
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