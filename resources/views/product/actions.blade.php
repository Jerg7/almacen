{{-- Modal edit --}}
<div class="modal fade" id="edit{{$product->id_product}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header">
                <h1 class="titulo modal-title fs-5" id="staticBackdropLabel">Editar Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            <form id="FormEditProduct_{{$product->id_product}}">

                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="provider" class="form-label" style="text-aling: left;">Proveedor:</label>
                            <select name="provider" class="form-control">
                                @foreach ($providers as $provider)
                                    @if ($provider->id_provider === $product->id_provider)
                                        <option value="{{$provider->id_provider}}" selected>{{$provider->description}}</option>  
                                    @else  
                                        <option value="{{$provider->id_provider}}">{{$provider->description}}</option>    
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="description" class="form-label" style="text-aling: left;">Nombre de producto:</label>
                            <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId" value="{{$product->product_data->description}}"/>
                        </div>
                        <div class="col">
                            <label for="prices" class="form-label" style="text-aling: left;">Costo (Bs.):</label>
                            <input type="text" class="form-control" name="prices" id="prices" aria-describedby="helpId" value="{{$product->product_data->prices}}"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div id="estatusEdit{{$product->id_product}}"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" onclick="productEdit({{$product->id_product}})">Actualizar</button>
                </div>

            </form>

        </div>
    </div>
</div>


{{-- Modal delete --}}
<div class="modal fade" id="delete{{$product->id_product}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="titulo modal-title fs-5" id="staticBackdropLabel">Eliminar producto.</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            <form action="FormDeleteProduct_{{$product->id_product}}">

                @csrf
                @method('DELETE')

                <div class="modal-body">
                    ¿Está seguro de que desea eliminar la producto <strong><em>{{$product->product_data->description}}</em></strong>?
                </div>

                <div class="form-group">
                    <div id="estatusEdit{{$product->id_product}}"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" onclick="productDelete({{$product->id_product}})">Confirmar</button>
                </div>

            </form>

        </div>
    </div>
</div>