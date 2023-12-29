$S = jQuery.noConflict();
/* VALIDACIÓN DE CÉDULA DE IDENTIDAD */
function cedulas(input){
    let valor = input.value.replace(/[^0-9]/g, '');
    valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g,'.');
    input.value = valor;
}

function validarCedula(){
    var cedula = document.getElementById('cedula').value;
    // console.log(cedula);
    $S.ajax({
        url : "../../controller/ingreso/comprobar_cedula_controller.php",
        type : "POST",
        data : {
            cedula
        },
        success : function(response){
            // console.log(response)
            var numero = JSON.parse(response);
            var n_cedula = "";
            numero.forEach(numero => {
                n_cedula += `${numero.ci}`
            });
            if(n_cedula === cedula){
                var mensaje = '<p style="color:red;"><i class="fas fa-times-circle"></i> Cédula de identidad registrada.</p>';
                $S('#respuesta_ci').html(mensaje);
                $S('input').attr('disabled', true);
                $S('select').attr('disabled', true);
                $S('input#cedula').attr('disabled', false);
            }else{
                var mensaje2 = '';
                $S('#respuesta_ci').html(mensaje2);
                $S('input').attr('disabled', false);
                $S('select').attr('disabled', false);
            }
        }
    });
}

function soloNumeros(){
    var input = document.getElementById('cedula');
    input.addEventListener('input', function(event) {
      var valor = this.value;
      // Remover cualquier caracter no numérico
      valor = valor.replace(/[^0-9.]/g, '');
      // Actualizar el valor del campo de entrada
      this.value = valor;
    });
}

/* VALIDACIÓN DE CONTRASEÑAS */
function validarClave(){
    frm=document.reg_usuario;
    if(frm.clave.value!=frm.clave2.value){
        var msg = '<p style="color:red;"><i class="fas fa-times-circle"></i> Las contraseñas no coinciden, verifique.</p>';
        $S("#respuestaclave").html(msg);
    }else{
        var msg2 = '';
        $S("#respuestaclave").html(msg2);
    }
}

/* VALIDACIÓN DE CONTRASEÑAS EDITAR */
function validarClave2(){
    frm=document.edit_usuario;
    if(frm.clave.value!=frm.clave2.value){
        var msg = '<p style="color:red;"><i class="fas fa-times-circle"></i> Las contraseñas no coinciden, verifique.</p>';
        $S("#respuestaclave").html(msg);
    }else{
        var msg2 = '';
        $S("#respuestaclave").html(msg2);
    }
}

/* HABILITACIÓN DE CAMBIO DE CONTRASEÑA EDITAR */
function changeClave(){
    frm = document.edit_usuario;
    frm.clave.disabled=false;
    frm.clave.value='';
    frm.clave.focus();
    frm.clave2.disabled=false;
    frm.clave2.value='';
}

/* VALIDACIÓN DE FORMATO DE CORREO ELECTRÓNICO */
function validarCorreo() {
    const exp_correo = /^[a-zA-Z0-9_.+-]+@[a-zA-z0-9-]+\.[a-zA-Z0-9-.]+$/;
    const correo_input = document.getElementById("correo").value;
    if(correo_input.match(exp_correo)){
        // console.log("bueno");
        var correoOk = '';
        $S("#respuestacorreo").html(correoOk);
    }else{
        // console.log("malo");
        var correoNook = '<p style="color:red;"><i class="fas fa-times-circle"></i> Email inválido, verifique</p>';
        $S("#respuestacorreo").html(correoNook);
    }
}

function ingreso_obrero(obj){
    if(obj.checked){
        document.getElementById('gerencia_label').style.display = "";
        document.getElementById('obreros_select').style.display = "";
        document.getElementById('fecha_label').style.display = "";
        document.getElementById('fecha_input').style.display = "";
        $S('#obreros_select').attr('disabled', false);
        $S('#fecha_input').attr('disabled', false);
        $S('#libre').attr('disabled', true);
        $S('#normal').attr('disabled', true);
    }else{
        document.getElementById('gerencia_label').style.display = "none";
        document.getElementById('obreros_select').style.display = "none";
        document.getElementById('fecha_label').style.display = "none";
        document.getElementById('fecha_input').style.display = "none";
        $S('#obreros_select').attr('disabled', true);
        $S('#fecha_input').attr('disabled', true);
        $S('#libre').attr('disabled', false);
        $S('#normal').attr('disabled', false);
    }
}

/* VALIDAR NÚMEROS DE TELÉFONO */
function validarTelefono() {
    const exp_telefono = /^\d{7,11}$/;
    const tlf_input = document.getElementById("telefono").value;
    if(tlf_input.match(exp_telefono)){
        // console.log("bueno");
        var telefonoOk = '';
        $S("#respuestatelefono").html(telefonoOk);
    }else{
        // console.log("malo");
        var telefonoNook = '<p style="color:red;"><i class="fas fa-times-circle"></i> Número de teléfono inválido, verifique</p>';
        $S("#respuestatelefono").html(telefonoNook);
    }
}

/* HABILITAR BOTÓN DE REGISTRO */
function habilitarBoton(){
    const campos     = document.querySelectorAll('input, select');
    const boton      = document.getElementById('boton');
    // console.warn(campos);

    function verificarCampos(){
        let camposLlenos = true;
        campos.forEach(campo => {
            if(campo.value === '' || campo.value === null){
                camposLlenos = false;
            }
        });
        return camposLlenos;
    }

    boton.disabled = !verificarCampos();

    campos.forEach(campo => {
        campo.addEventListener('change', () => {
            boton.disabled = !verificarCampos();
        });
    });
}
window.addEventListener('load', habilitarBoton);

/* AGREGAR INPUTS */
function aggInput(){
    const div_principal = F.create('div');
    div_principal.classList.add("row");

    const div_secundario = F.create('div');
    div_secundario.classList.add("col-md-6");

    const label = F.create('label', {innerHTML: ' '});
    label.classList.add("control-label");

    const input = F.create('input', {
        type: 'text', name: 'mantenimiento[]', autocomplete: 'off', placeholder: 'Insertar el siguiente item...'
    });
    input.classList.add("form-control");
    input.classList.add("formulario__input");

    const borrar = F.create('a', {href: 'javascript:void(0)', innerHTML: '<i style="color: red;" class="fa-solid fa-xmark"></i>', onclick: function(){F.remove(div_principal);}});
    
    F.append([label, input], div_secundario);
    
    F.append([div_secundario, borrar], div_principal);

    F.append(div_principal, F.id('aggInput'));
}

/* AGREGAR FILES */
function aggInputFile(){
    const div_principal = F.create('div');
    div_principal.classList.add("row");

    const div_secundario = F.create('div');
    div_secundario.classList.add("col-md-6");

    const label = F.create('label', {innerHTML: 'Cursos:'});
    label.classList.add("control-label");

    const input = F.create('input', {
        type: 'file', name: 'mantenimiento[]'
    });
    input.classList.add("form-control");
    input.classList.add("formulario__input");

    const borrar = F.create('a', {href: 'javascript:void(0)', innerHTML: '<i style="color: red;" class="fa-solid fa-xmark"></i>', onclick: function(){F.remove(div_principal);}});
    
    F.append([label, input], div_secundario);
    
    F.append([div_secundario, borrar], div_principal);

    F.append(div_principal, F.id('filesInput'));
}

function lupa(obj){
    if(obj.classList.contains('active')){
        document.getElementById('hidden').style.display = "";
        obj.classList.remove('active');
    }else{
        document.getElementById('hidden').style.display = "none";
        obj.classList.add('active');
    }
};

function agginputCatalogo(){
    // div principal
    const div_principal = F.create('div');
    div_principal.classList.add("row");
    // div Catalogo
    const div_catalogo = F.create('div');
    div_catalogo.classList.add("col");
    // label Catalogo
    const label_catalogo = F.create('label', {innerHTML: 'Nombre del activo:'});
    label_catalogo.classList.add("control-label");
    // input Catalogo
    const input_catalogo = F.create('input', {
        type: 'text', name: 'mantenimiento4[]', autocomplete: 'off', placeholder: 'Indique el Activo'
    });
    input_catalogo.classList.add("form-control");
    input_catalogo.classList.add("formulario__input");
    // agregar cada etiqueta a su nodo padre
    F.append([label_catalogo, input_catalogo], div_catalogo);
    // boton de borrar
    const borrar = F.create('a', {href: 'javascript:void(0)', innerHTML: '<i style="color:red;" class="fa-solid fa-xmark"></i>', onclick: function(){F.remove(div_principal);}});
    F.append([div_catalogo, borrar], div_principal);
    // agregar a la vista
    F.append(div_principal, F.id('manten'));
}

  /* FUNCION PARA INICIALIZAR EL DATATABLE Y PERSONALIZARLO AL ESPAÑOL */    
  $S(document).ready(function () {
    // Setup - add a text input to each footer cell
    $S('#tables thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#tables thead');

    var table = $S('#tables').DataTable({
        scrollY: 200,
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();

            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $S('.filters th').eq(
                        $S(api.column(colIdx).header()).index()
                    );
                    var title = $S(cell).text();
                    $S(cell).html('<input type="text" placeholder="' + title + '" />');

                    // On every keypress in this input
                    $S(
                        'input',
                        $S('.filters th').eq($S(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $S(this).attr('title', $S(this).val());
                            var regexr = '({search})';

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $S(this).trigger('change');
                            $S(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
    });
  });