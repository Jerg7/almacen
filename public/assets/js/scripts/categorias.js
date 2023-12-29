$S = jQuery.noConflict();

function selectCategory(){
    var category = $S("#category").val();
    $S.get('/api/requirement/'+category+'/productByCategory', function(data){
        var product_select = '<option value="" selected disabled>Seleccione...</option>';
        for (var i=0; i < data.length; ++i) {
            product_select += '<option value="'+data[i].id_product+'">'+data[i].description+'</option>';
            $S("#product").html(product_select);
        }
    });
}

function loadHistory(id){
    $S.ajax({
      url:  'requirements/historic/'+id,
      type: 'GET',
      success: function(response) {
          var tableHtml =  '<table class="table table-striped table-striped-column">';
              tableHtml += '<thead style="background-color: #125873; color: white;"><tr>';
              tableHtml += '<th>Producto</th>';
              tableHtml += '<th>Cantidad Solicitada</th>';
              tableHtml += '<th>Cantidad Disponible</th>';
              tableHtml += '<th>Justificación de solicitud</th>';
              tableHtml += '<th>Acciones</th>';
              tableHtml += '</tr></thead>';
              tableHtml += '<tbody>';
  
          response.forEach(function(item) {
              tableHtml += '<tr>';
              tableHtml += '<td>' + item.description + '</td>';
              tableHtml += '<td>' + item.justification + '</td>';
              tableHtml += '<td>' + item.requested_amount + '</td>';
              tableHtml += '<td>' + item.amount + '</td>';
              tableHtml += '<td><button type="button" class="btn btn-primary" data-bs-target="#accept'+item.id_requirement+'" data-bs-toggle="modal"><i class="fa-solid fa-circle-check"></i></button> | '
              tableHtml += '<button type="button" class="btn btn-danger" data-bs-target="#decline'+item.id_requirement+'" data-bs-toggle="modal"><i class="fa-solid fa-ban"></i></button></td>'
              tableHtml += '</tr>';
          });
          tableHtml += '</tbody></table>';
  
          $S('.table-responsive #historic_table').html(tableHtml);
      }
    });
}

function requirementCondition(obj){
    if(obj.checked){
        document.getElementById('amount_delivery_label').style.display = "";
        document.getElementById('amount_delivery_input').style.display = "";
        document.getElementById('modified_justification_label').style.display = "";
        document.getElementById('modified_justification_input').style.display = "";
        $S('#amount_delivery_input').attr('disabled', false);
        $S('#modified_justification_input').attr('disabled', false);
    }else{
        document.getElementById('amount_delivery_label').style.display = "none";
        document.getElementById('amount_delivery_input').style.display = "none";
        document.getElementById('modified_justification_label').style.display = "none";
        document.getElementById('modified_justification_input').style.display = "none";
        $S('#amount_delivery_input').attr('disabled', true);
        $S('#modified_justification_input').attr('disabled', true);
    }
}

function btn_increment() {
    var input = document.getElementById("requested_amount");
    input.value = parseInt(input.value) + 1;
}

function btn_increment2(){
    var input = document.getElementById("amount_delivery");
    input.value = parseInt(input.value) + 1;
}

function btn_decrement() {
    var input = document.getElementById("requested_amount");
    input.value = parseInt(input.value) - 1;
}

function btn_decrement2() {
    var input = document.getElementById("amount_delivery");
    input.value = parseInt(input.value) - 1;
}