var meses = new Array ("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
var f = new Date();
document.write("Fecha: "+f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear()) ;