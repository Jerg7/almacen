{{-- Modal fast --}}
<div class="modal fade" id="fast{{$warehouse->id_product}}" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Solicitud de requerimiento rápido</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            <form id="FormCreateRequirement" method="POST">

                @csrf

                <div class="modal-body">

                    <input type="hidden" name="user" value="{{ Auth::user()->id_user }}">
                    <div class="row">
                        <div class="col">
                            <label for="product" class="form-label">Producto: </label>
                            <select name="product" class="form-control form-select">
                                @foreach ($products as $product)
                                    @if ($product->id_product === $warehouse->id_product)
                                        <option value="{{$product->id_product}}" selected>{{$product->product_data->description}}</option>  
                                    @else  
                                        <option value="{{$product->id_product}}">{{$product->product_data->description}}</option>    
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="amount" class="form-label">Cantidad: </label>
                            <div class="input-group">
                                <span class="input-group-text boton_span" onclick="btn_decrement({{$warehouse->id_warehouse}})">-</span>
                                <input type="number" class="form-control" name="requested_amount" id="requested_amount{{$warehouse->id_warehouse}}" value="0">
                                <span class="input-group-text boton_span" onclick="btn_increment({{$warehouse->id_warehouse}})">+</span>
                            </div>
                        </div>
                    </div>
    
                </div>
    
                <div class="form-group">
                    <div id="estatus"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" onclick="fastrequirementCreate()">Enviar solicitud</button>
                </div>

            </form>

        </div>
    </div>
</div>