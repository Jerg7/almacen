{{-- Modal reception --}}
<div class="modal fade" id="reception{{$purchase->bill}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Categoría</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="transparencia" style="display:none"></div>

            <form id="FormReceptionPurchase_{{$purchase->bill}}">
                
                @csrf
                @method('PUT')
                
                <div class="modal-body">
                    ¿El pedido con Factura <strong><em>{{$purchase->bill}}</em></strong> procedente del Proveedor <strong><em>{{$purchase->provider}}</em></strong> ha sido recibido?
                </div>

                <div class="form-group">
                    <div id="estatusReception{{$purchase->bill}}"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" onclick="purchaseReception({{$purchase->bill}})">Confirmar</button>
                </div>

            </form>

        </div>
    </div>
</div>