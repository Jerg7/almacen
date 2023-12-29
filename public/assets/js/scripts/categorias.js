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
    if (parseInt(input.value) > 0) {
        input.value = parseInt(input.value) - 1;
    }
}

function btn_decrement2() {
    var input = document.getElementById("amount_delivery");
    input.value = parseInt(input.value) - 1;
}

function validarNumero(e) {
    var input = e.target.value;
    // Remover cualquier caracter que no sea un número o un punto
    input = input.replace(/[^0-9.]/g, '');
    // Permitir solo un punto decimal
    input = input.replace(/(\..*)\./g, '$1');
    // Limitar a dos decimales
    var partes = input.split(".");
    if (partes[1] && partes[1].length > 2) {
      partes[1] = partes[1].substring(0, 2);
      input = partes.join(".");
    }
    e.target.value = input;
}

let j = 1;
function aggInput(){
    const div_global = F.create('div');

    const div_principal1 = F.create('div');
            div_principal1.classList.add("row");

    const div_secundario0 = F.create('div');
            div_secundario0.classList.add("col");

    const div_secundario1 = F.create('div');
            div_secundario1.classList.add("col");

        // .col provider
        const label_provider = F.create('label', {innerHTML: 'Proveedor: '});
                label_provider.classList.add("form-label");
    
        const input_provider = F.create('select', {
             name: 'provider[]', id: 'provider_'+j, onclick: 
             function(){
                fetch('/api/purchase/provider')
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    var provider_select = '<option selected disabled>Seleccione...</option>';
                    for (var i=0; i < data.length; ++i) {
                        provider_select += '<option value="'+data[i].id_provider+'">'+data[i].description+'</option>';
                        $S('#provider_'+j).html(provider_select);
                    }                    
                })
            },
        });
        input_provider.classList.add("form-control");
    
        // .col product
        const label_product = F.create('label', {innerHTML: 'Producto: '});
                label_product.classList.add("form-label");
    
        const input_product = F.create('select', {
            name: 'product[]'
        });
        input_product.classList.add("form-control");

        F.append([label_provider, input_provider], div_secundario0);
        F.append([label_product, input_product], div_secundario1);


    const div_principal2 = F.create('div');
            div_principal2.classList.add("row");

    const div_secundario2 = F.create('div');
            div_secundario2.classList.add('col');

    const div_secundario3 = F.create('div');
            div_secundario3.classList.add('col');

        // .col amount
        const label_amount = F.create('label', {innerHTML: 'Cantidad: '});
                label_amount.classList.add("form-label");

        const input_amount = F.create('input', {
            type: 'text', name: 'amount[]'
        });
        input_amount.classList.add("form-control");

        // .col price
        const label_price = F.create('label', {innerHTML: 'Costo (Bs.): '});
                label_price.classList.add("form-label");

        const input_price = F.create('input', {
            type: 'text', name: 'price[]'
        });
        input_price.classList.add("form-control");

        F.append([label_amount, input_amount], div_secundario2);
        F.append([label_price, input_price], div_secundario3);


    const borrar = F.create('a', {href: 'javascript:void(0)', innerHTML: '<i style="color: red;" class="fa-solid fa-xmark"></i>', onclick: function(){F.remove(div_global);}});
        
    F.append([div_secundario0, div_secundario1], div_principal1);
    F.append([div_secundario2, div_secundario3], div_principal2);
    F.append([div_principal1, div_principal2, borrar], div_global);

    F.append(div_global, F.id('aggInput'));
    j++
}
