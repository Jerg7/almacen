$S = jQuery.noConflict();
// Valida que los campos estén completos antes de avanzar al siguiente paso
function habilitarBotonSiguiente1() {
    // Obtener los elementos del formulario y el botón "Siguiente"
    const formulario = document.getElementById('formulario');
    const camposPaso1 = document.querySelectorAll('#paso1 input, #paso1 select');
    const botonSiguiente = document.getElementById('siguiente1');
  
    // Función para comprobar si los campos del paso 1 están llenos
    function verificarCamposPaso1() {
      let camposLlenos = true;
      camposPaso1.forEach(campo => {
        if (campo.value === '' || campo.value === null) {
          camposLlenos = false;
        }
      });
      return camposLlenos;
    }
  
    // Habilitar o deshabilitar el botón "Siguiente" al cargar la página
    botonSiguiente.disabled = !verificarCamposPaso1();
  
    // Habilitar o deshabilitar el botón "Siguiente" al cambiar los valores de los campos del paso 1
    camposPaso1.forEach(campo => {
      campo.addEventListener('change', () => {
        botonSiguiente.disabled = !verificarCamposPaso1();
      });
    });
}
  window.addEventListener('load', habilitarBotonSiguiente1);
function habilitarBotonSiguiente2() {
    // Obtener los elementos del formulario y el botón "Siguiente"
    const formulario = document.getElementById('formulario');
    const camposPaso2 = document.querySelectorAll('#paso2 input, #paso2 select');
    const botonSiguiente = document.getElementById('siguiente2');
  
    // Función para comprobar si los campos del paso 1 están llenos
    function verificarCamposPaso2() {
      let camposLlenos = true;
      camposPaso2.forEach(campo => {
        if (campo.value === '' || campo.value === null) {
          camposLlenos = false;
        }
      });
      return camposLlenos;
    }
  
    // Habilitar o deshabilitar el botón "Siguiente" al cargar la página
    botonSiguiente.disabled = !verificarCamposPaso2();
  
    // Habilitar o deshabilitar el botón "Siguiente" al cambiar los valores de los campos del paso 1
    camposPaso2.forEach(campo => {
      campo.addEventListener('change', () => {
        botonSiguiente.disabled = !verificarCamposPaso2();
      });
    });
}
  window.addEventListener('load', habilitarBotonSiguiente2);
function habilitarBotonSiguiente3() {
    // Obtener los elementos del formulario y el botón "Siguiente"
    const formulario = document.getElementById('formulario');
    const camposPaso3 = document.querySelectorAll('#paso3 input, #paso3 select');
    const botonSiguiente = document.getElementById('siguiente3');
  
    // Función para comprobar si los campos del paso 1 están llenos
    function verificarCamposPaso3() {
      let camposLlenos = true;
      camposPaso3.forEach(campo => {
        if (campo.value === '' || campo.value === null) {
          camposLlenos = false;
        }
      });
      return camposLlenos;
    }
  
    // Habilitar o deshabilitar el botón "Siguiente" al cargar la página
    botonSiguiente.disabled = !verificarCamposPaso3();
  
    // Habilitar o deshabilitar el botón "Siguiente" al cambiar los valores de los campos del paso 1
    camposPaso3.forEach(campo => {
      campo.addEventListener('change', () => {
        botonSiguiente.disabled = !verificarCamposPaso3();
      });
    });
}
  window.addEventListener('load', habilitarBotonSiguiente3);
function habilitarBotonSiguiente4() {
    // Obtener los elementos del formulario y el botón "Siguiente"
    const formulario = document.getElementById('formulario');
    const camposPaso4 = document.querySelectorAll('#paso4 input, #paso4 select');
    const botonSiguiente = document.getElementById('siguiente4');
  
    // Función para comprobar si los campos del paso 1 están llenos
    function verificarCamposPaso4() {
      let camposLlenos = true;
      camposPaso4.forEach(campo => {
        if (campo.value === '' || campo.value === null) {
          camposLlenos = false;
        }
      });
      return camposLlenos;
    }
  
    // Habilitar o deshabilitar el botón "Siguiente" al cargar la página
    botonSiguiente.disabled = !verificarCamposPaso4();
  
    // Habilitar o deshabilitar el botón "Siguiente" al cambiar los valores de los campos del paso 1
    camposPaso4.forEach(campo => {
      campo.addEventListener('change', () => {
        botonSiguiente.disabled = !verificarCamposPaso4();
      });
    });
}
  window.addEventListener('load', habilitarBotonSiguiente4);
function habilitarBotonSiguiente5() {
    // Obtener los elementos del formulario y el botón "Siguiente"
    const formulario = document.getElementById('formulario');
    const camposPaso5 = document.querySelectorAll('#paso5 input, #paso5 select');
    const botonSiguiente = document.getElementById('siguiente5');
  
    // Función para comprobar si los campos del paso 1 están llenos
    function verificarCamposPaso5() {
      let camposLlenos = true;
      camposPaso5.forEach(campo => {
        if (campo.value === '' || campo.value === null) {
          camposLlenos = false;
        }
      });
      return camposLlenos;
    }
  
    // Habilitar o deshabilitar el botón "Siguiente" al cargar la página
    botonSiguiente.disabled = !verificarCamposPaso5();
  
    // Habilitar o deshabilitar el botón "Siguiente" al cambiar los valores de los campos del paso 1
    camposPaso5.forEach(campo => {
      campo.addEventListener('change', () => {
        botonSiguiente.disabled = !verificarCamposPaso5();
      });
    });
}
  window.addEventListener('load', habilitarBotonSiguiente5);