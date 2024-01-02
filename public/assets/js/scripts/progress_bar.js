$S = jQuery.noConflict();
$S(document).ready(function () {
// Muestra el primer paso
mostrarPaso('#paso1');

// Configura los botones de siguiente y anterior
$S('.siguiente').click(function () {
    var paso = $S(this).data('paso');
    if (validarPaso($S(this).closest('form'))) {
    ocultarPaso($S(this).closest('.tab-pane'));
    mostrarPaso(paso);
    actualizarProgreso();
    }
});

$S('.anterior').click(function () {
    var paso = $S(this).data('paso');
    ocultarPaso($S(this).closest('.tab-pane'));
    mostrarPaso(paso);
    actualizarProgreso();
});

// Actualiza la barra de progreso
function actualizarProgreso() {
    var totalPasos = $S('.nav-pills li').length;
    var pasoActual = $S('.nav-pills li.active').index() + 1;
    var porcentaje = (pasoActual / totalPasos) * 100;
    $S('.progress-bar').css('width', porcentaje + '%');
    $S('.progress-bar').text(porcentaje.toFixed(0) + '% completado');
}

// Muestra un paso
function mostrarPaso(paso) {
    $S(paso).fadeIn();
    $S(paso).addClass('active');
    $S('.nav-pills a[href="' + paso + '"]')
    .parent()
    .addClass('active');
    // Desactivar enlaces de navegación de pasos anteriores
    $S('.nav-pills a').removeClass('disabled');
    $S('.nav-pills a:lt(' + ($S(paso).index() + 1) + ')').addClass('disabled');

    // Activar enlaces de navegación del paso actual
    $S('.nav-pills a[href="' + paso + '"]').removeClass('disabled');
}

// Oculta un paso
function ocultarPaso(paso) {
    $S(paso).fadeOut();
    $S(paso).removeClass('active');
    $S('.nav-pills a[href="#' + $S(paso).attr('id') + '"]')
    .parent()
    .removeClass('active');
}

// Valida un paso
function validarPaso(formulario) {
    var inputs = formulario.find('.active :input');
    var valido = true;
    $S.each(inputs, function (index, input) {
    if (!input.checkValidity()) {
        valido = false;
        $S(input).addClass('is-invalid');
    } else {
        $S(input).removeClass('is-invalid');
    }
    });
    return valido;
}
});
$S(document).ready(function () {
// Inicializa la barra de progreso
var totalPasos = $S('.nav-pills a').length;
var pasoActual = $S('.nav-pills a.active').index() + 1;
var porcentaje = (pasoActual / totalPasos) * 100;
$S('.progress-bar').css('width', porcentaje + '%');
$S('.progress-bar').text(porcentaje.toFixed(0) + '% completado');

// Avanza al siguiente paso
$S('.siguiente').click(function () {
    var pasoActual = $S('.nav-pills a.active').index() + 1;
    var siguientePaso = $S(this).data('paso');
    $S(this).closest('div').hide();
    $S(siguientePaso).show();
    actualizarProgreso(siguientePaso);
});

// Retrocede al paso anterior
$S('.anterior').click(function () {
    var pasoActual = $S('.nav-pills a.active').index() + 1;
    var pasoAnterior = $S(this).data('paso');
    $S(this).closest('div').hide();
    $S(pasoAnterior).show();
    actualizarProgreso(pasoAnterior);
});

// Actualiza la barra de progreso
function actualizarProgreso(paso) {
    var totalPasos = $S('.nav-pills a').length;
    var pasoActual = $S(paso).index() + 1;
    var porcentaje = (pasoActual / totalPasos) * 100;
    $S('.progress-bar').css('width', porcentaje + '%');
    $S('.progress-bar').text(porcentaje.toFixed(0) + '% completado');
}
});