{{-- Modal edit --}}
<div class="modal fade" id="edit{{$purchase->id_purchase}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Categoría</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            <form id="FormAcceptPurchase_{{$purchase->id_purchase}}">

                @csrf
                @method('PUT')

                <div class="modal-body"> 

                    <div class="row">
                        <div class="col">
                            <label for="provider" class="form-label">Proveedor: </label>
                            <select name="provider" id="provider" class="form-control" onclick="selectProvider()">
                                <option selected disabled>Seleccione...</option>
                                @foreach ($providers as $provider)
                                    @if ($provider->id_provider === $purchase->id_provider)
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
                            <label for="product" class="form-label">Producto: </label>
                            <select name="product" id="product_" class="form-control">
                                <option selected disabled>Seleccione...</option>
                                @foreach ($products as $product)
                                    @if ($product->id_product === $purchase->id_product)
                                        <option value="{{$product->id_product}}" selected>{{$product->description}}</option>  
                                    @else  
                                        <option value="{{$product->id_product}}">{{$product->description}}</option>    
                                    @endif
                                @endforeach
                            </select>                        
                        </div>
                        <div class="col">
                            <label for="amount" class="form-label">Cantidad: </label>
                            <div class="input-group">
                                <span class="input-group-text boton_span" onclick="btn_decrement()">-</span>
                                <input type="number" class="form-control" name="amount" id="requested_amount" value="{{$purchase->amount}}">
                                <span class="input-group-text boton_span" onclick="btn_increment()">+</span>
                            </div>
                        </div>
                        <div class="col">
                            <label for="price" class="form-label">Costo (Bs.): </label>
                            <input type="text" class="form-control" name="price" oninput="validarNumero(event)" value="{{$purchase->price}}">
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <div id="estatusEdit{{$purchase->id_purchase}}"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" onclick="purchaseEdit({{$purchase->id_purchase}})">Actualizar</button>
                </div>

            </form>

        </div>
    </div>
</div>


{{-- Modal delete --}}
<div class="modal fade" id="delete{{$purchase->id_purchase}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Categoría</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            <form id="FormDeleteCategory_{{$purchase->id_purchase}}">
                
                @csrf
                @method('DELETE')
                
                <div class="modal-body">
                    ¿Está seguro de que desea eliminar la compra del producto <strong><em>{{$purchase->product->description}}</em></strong>?
                </div>

                <div class="form-group">
                    <div id="estatusDelete{{$purchase->id_purchase}}"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" onclick="purchaseDelete({{$purchase->id_purchase}})">Confirmar</button>
                </div>

            </form>

        </div>
    </div>
</div>