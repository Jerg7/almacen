{{-- Modal create --}}
<div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Registro de compras de requerimientos: </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="deleteaggInput()"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            <form id="FormCreatePurchase" method="POST">

                @csrf

                <div class="modal-body"> 

                    <div class="row">
                        <div class="col">
                            <label for="provider" class="form-label">Proveedor: </label>
                            <select name="provider[]" id="provider" class="form-control" onclick="selectProvider()">
                                <option selected disabled>Seleccione...</option>
                                @foreach ($providers as $provider)
                                    <option value="{{$provider->id_provider}}">{{$provider->description}}</option>    
                                @endforeach
                            </select>                        
                        </div>
                        <div class="col">
                            <label for="bill" class="form-label">Nº Documento / Factura:</label>
                            <input type="text" class="form-control" name="bill">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="product" class="form-label">Producto: </label>
                            <select name="product[]" id="product_" class="form-control">
                                <option selected disabled>Seleccione...</option>
                            </select>                        
                        </div>
                        <div class="col">
                            <label for="amount" class="form-label">Cantidad: </label>
                            <div class="input-group">
                                <span class="input-group-text boton_span" onclick="btn_decrement()">-</span>
                                <input type="number[]" class="form-control" name="amount" id="requested_amount" value="0">
                                <span class="input-group-text boton_span" onclick="btn_increment()">+</span>
                            </div>
                        </div>
                        <div class="col">
                            <label for="price" class="form-label">Costo (Bs.): </label>
                            <input type="text" class="form-control" name="price[]" oninput="validarNumero(event)">
                        </div>
                    </div>

                    <div id="aggInput_"></div>

                </div>

                <div class="form-group">
                    <div id="estatus"></div>
                </div>

                <div class="modal-footer">
                    <div class="d-flex justify-content-start">
                        <button type="button" class="btn btn-primary" onclick="aggInput()"><i class="fa-solid fa-plus"></i> Añadir producto</button>
                    </div>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="deleteaggInput()">Cerrar</button>
                    <button type="submit" class="btn btn-success" onclick="purchaseCreate()">Guardar</button>
                </div>

            </form>
            
        </div>
    </div>
</div>