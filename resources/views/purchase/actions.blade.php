{{-- Modal show --}}
<div class="modal fade" id="show{{$purchview->bill}}" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Datos de la compra efectuada:</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div id="transparencia" style="display:none"></div>

            <form id="FormReceptionPurchase_{{$purchview->bill}}">

                @csrf
                @method('DELETE')

                <div class="modal-body">
                    <div class="row" style="text-align: left;">
                        <div class="col-md-5">
                            <label>Proveedor:</label>
                            <input type="text" class="form-control" value="{{$purchview->provider}}" disabled>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-4">
                            <label>Nº Factura / Documento:</label>
                            <input type="text" class="form-control" value="{{$purchview->bill}}" disabled>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="table-responsive" id="bill_table">
                    </div>
                    <div class="row">
                        <div class="col-md-7"></div>
                        <div class="col-md-2"><strong>Total (Bs.): </strong></div>
                        <div class="col-md-3" align="center">{{$purchview->total_prices}}</div>
                    </div>           
                </div>

                <div class="form-group">
                    <div id="estatusReception{{$purchview->bill}}"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" onclick="purchaseReception({{$purchview->bill}})">Marcar como recibido</button>
                </div>

            </form>

        </div>
    </div>
</div>