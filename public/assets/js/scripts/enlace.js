$S = jQuery.noConflict();
// USERS
function userCreate(){
  var formId = "#FormCreateUser";
  $S(formId).validationEngine("attach", {
    autoPositionUpdate: true,
    onValidationComplete: function (_form, status) {
      if (status == true) {
        $S('#transparencia').fadeIn('slow');
        $S("#error").hide();
        var dataString = $S(formId).serialize();
        // console.log(dataString);
        $S.ajax({
          url:    "/users",
          method: "POST",
          data:   dataString,
          success: function (response) {
            // Manejar la respuesta del servidor
            $S('#estatus').append(response.script); // Agregar el script al cuerpo del documento
            $S('#alerta').fadeIn('slow');           // Mostrar el mensaje de alerta
          }
        });
      }
    }
  });
}

function userEdit(id){
  var estatus = "#estatusEdit"+id;
  var formId = "#FormEditUser_"+id;
  $S(formId).validationEngine("attach", {
    autoPositionUpdate: true,
    onValidationComplete: function (_form, status) {
      if (status == true) {
        $S('#transparencia').fadeIn('slow');
        $S("#error").hide();
        var dataString = $S(formId).serialize();
        // console.log(dataString);
        $S.ajax({
          url:    "/users/"+id,
          method: "PUT",
          data:   dataString,
          success: function (response) {
            // Manejar la respuesta del servidor
            $S(estatus).append(response.script);    // Agregar el script al cuerpo del documento
            $S('#alerta').fadeIn('slow');           // Mostrar el mensaje de alerta
          }
        });
      }
    }
  });
}

function userDelete(id){
  var estatus = "#estatusDelete"+id;
  var formId = "#FormDeleteUser_"+id;
  $S(formId).validationEngine("attach", {
    autoPositionUpdate: true,
    onValidationComplete: function (_form, status) {
      if (status == true) {
        $S('#transparencia').fadeIn('slow');
        $S("#error").hide();
        var dataString = $S(formId).serialize();
        // console.log(dataString);
        $S.ajax({
          url:    "/users/"+id,
          method: "DELETE",
          data:   dataString,
          success: function (response) {
            // Manejar la respuesta del servidor
            $S(estatus).append(response.script);    // Agregar el script al cuerpo del documento
            $S('#alerta').fadeIn('slow');           // Mostrar el mensaje de alerta
          }
        });
      }
    }
  });
}

// CATEGORIES
function categoryCreate(){
  var formId = "#FormCreateCategory";
  $S(formId).validationEngine("attach", {
    autoPositionUpdate: true,
    onValidationComplete: function (_form, status) {
      if (status == true) {
        $S('#transparencia').fadeIn('slow');
        $S("#error").hide();
        var dataString = $S(formId).serialize();
        // console.log(dataString);
        $S.ajax({
          url:    "/categories",
          method: "POST",
          data:   dataString,
          success: function (response) {
            // Manejar la respuesta del servidor
            $S('#estatus').append(response.script); // Agregar el script al cuerpo del documento
            $S('#alerta').fadeIn('slow');           // Mostrar el mensaje de alerta
          }
        });
      }
    }
  });
}

function categoryEdit(id){
  var estatus = "#estatusEdit"+id;
  var formId = "#FormEditCategory_"+id;
  $S(formId).validationEngine("attach", {
    autoPositionUpdate: true,
    onValidationComplete: function (_form, status) {
      if (status == true) {
        $S('#transparencia').fadeIn('slow');
        $S("#error").hide();
        var dataString = $S(formId).serialize();
        // console.log(dataString);
        $S.ajax({
          url:    "/categories/"+id,
          method: "PUT",
          data:   dataString,
          success: function (response) {
            // Manejar la respuesta del servidor
            $S(estatus).append(response.script);    // Agregar el script al cuerpo del documento
            $S('#alerta').fadeIn('slow');           // Mostrar el mensaje de alerta
          }
        });
      }
    }
  });
}

function categoryDelete(id){
  var estatus = "#estatusDelete"+id;
  var formId = "#FormDeleteCategory_"+id;
  $S(formId).validationEngine("attach", {
    autoPositionUpdate: true,
    onValidationComplete: function (_form, status) {
      if (status == true) {
        $S('#transparencia').fadeIn('slow');
        $S("#error").hide();
        var dataString = $S(formId).serialize();
        // console.log(dataString);
        $S.ajax({
          url:    "/categories/"+id,
          method: "DELETE",
          data:   dataString,
          success: function (response) {
            // Manejar la respuesta del servidor
            $S(estatus).append(response.script);    // Agregar el script al cuerpo del documento
            $S('#alerta').fadeIn('slow');           // Mostrar el mensaje de alerta
          }
        });
      }
    }
  });
}


// JOB POSITION
function jpCreate(){
  var formId = "#FormCreateJP";
  $S(formId).validationEngine("attach", {
    autoPositionUpdate: true,
    onValidationComplete: function (_form, status) {
      if (status == true) {
        $S('#transparencia').fadeIn('slow');
        $S("#error").hide();
        var dataString = $S(formId).serialize();
        // console.log(dataString);
        $S.ajax({
          url:    "/job_positions",
          method: "POST",
          data:   dataString,
          success: function (response) {
            // Manejar la respuesta del servidor
            $S('#estatus').append(response.script); // Agregar el script al cuerpo del documento
            $S('#alerta').fadeIn('slow');           // Mostrar el mensaje de alerta
          }
        });
      }
    }
  });
}

function jpEdit(id){
  var estatus = "#estatusEdit"+id;
  var formId = "#FormEditJP_"+id;
  $S(formId).validationEngine("attach", {
    autoPositionUpdate: true,
    onValidationComplete: function (_form, status) {
      if (status == true) {
        $S('#transparencia').fadeIn('slow');
        $S("#error").hide();
        var dataString = $S(formId).serialize();
        // console.log(dataString);
        $S.ajax({
          url:    "/job_positions/"+id,
          method: "PUT",
          data:   dataString,
          success: function (response) {
            // Manejar la respuesta del servidor
            $S(estatus).append(response.script);    // Agregar el script al cuerpo del documento
            $S('#alerta').fadeIn('slow');           // Mostrar el mensaje de alerta
          }
        });
      }
    }
  });
}

function jpDelete(id){
  var estatus = "#estatusDelete"+id;
  var formId = "#FormDeleteJP_"+id;
  $S(formId).validationEngine("attach", {
    autoPositionUpdate: true,
    onValidationComplete: function (_form, status) {
      if (status == true) {
        $S('#transparencia').fadeIn('slow');
        $S("#error").hide();
        var dataString = $S(formId).serialize();
        // console.log(dataString);
        $S.ajax({
          url:    "/job_positions/"+id,
          method: "DELETE",
          data:   dataString,
          success: function (response) {
            // Manejar la respuesta del servidor
            $S(estatus).append(response.script);    // Agregar el script al cuerpo del documento
            $S('#alerta').fadeIn('slow');           // Mostrar el mensaje de alerta
          }
        });
      }
    }
  });
}


// MANAGEMENTS
function managementCreate(){
  var formId = "#FormCreateManagement";
  $S(formId).validationEngine("attach", {
    autoPositionUpdate: true,
    onValidationComplete: function (_form, status) {
      if (status == true) {
        $S('#transparencia').fadeIn('slow');
        $S("#error").hide();
        var dataString = $S(formId).serialize();
        // console.log(dataString);
        $S.ajax({
          url:    "/managements",
          method: "POST",
          data:   dataString,
          success: function (response) {
            // Manejar la respuesta del servidor
            $S('#estatus').append(response.script); // Agregar el script al cuerpo del documento
            $S('#alerta').fadeIn('slow');           // Mostrar el mensaje de alerta
          }
        });
      }
    }
  });
}

function managementEdit(id){
  var estatus = "#estatusEdit"+id;
  var formId = "#FormEditManagement_"+id;
  $S(formId).validationEngine("attach", {
    autoPositionUpdate: true,
    onValidationComplete: function (_form, status) {
      if (status == true) {
        $S('#transparencia').fadeIn('slow');
        $S("#error").hide();
        var dataString = $S(formId).serialize();
        // console.log(dataString);
        $S.ajax({
          url:    "/managements/"+id,
          method: "PUT",
          data:   dataString,
          success: function (response) {
            // Manejar la respuesta del servidor
            $S(estatus).append(response.script);    // Agregar el script al cuerpo del documento
            $S('#alerta').fadeIn('slow');           // Mostrar el mensaje de alerta
          }
        });
      }
    }
  });
}

function managementDelete(id){
  var estatus = "#estatusDelete"+id;
  var formId = "#FormDeleteManagement_"+id;
  $S(formId).validationEngine("attach", {
    autoPositionUpdate: true,
    onValidationComplete: function (_form, status) {
      if (status == true) {
        $S('#transparencia').fadeIn('slow');
        $S("#error").hide();
        var dataString = $S(formId).serialize();
        // console.log(dataString);
        $S.ajax({
          url:    "/managements/"+id,
          method: "DELETE",
          data:   dataString,
          success: function (response) {
            // Manejar la respuesta del servidor
            $S(estatus).append(response.script);    // Agregar el script al cuerpo del documento
            $S('#alerta').fadeIn('slow');           // Mostrar el mensaje de alerta
          }
        });
      }
    }
  });
}


// PRODUCTS
function productCreate(){
  var formId = "#FormCreateProduct";
  $S(formId).validationEngine("attach", {
    autoPositionUpdate: true,
    onValidationComplete: function (_form, status) {
      if (status == true) {
        $S('#transparencia').fadeIn('slow');
        $S("#error").hide();
        var dataString = $S(formId).serialize();
        // console.log(dataString);
        $S.ajax({
          url:    "/products",
          method: "POST",
          data:   dataString,
          success: function (response) {
            // Manejar la respuesta del servidor
            $S('#estatus').append(response.script); // Agregar el script al cuerpo del documento
            $S('#alerta').fadeIn('slow');           // Mostrar el mensaje de alerta
          }
        });
      }
    }
  });
} 

function productEdit(id){
  var estatus = "#estatusEdit"+id;
  var formId = "#FormEditProduct_"+id;
  $S(formId).validationEngine("attach", {
    autoPositionUpdate: true,
    onValidationComplete: function (_form, status) {
      if (status == true) {
        $S('#transparencia').fadeIn('slow');
        $S("#error").hide();
        var dataString = $S(formId).serialize();
        // console.log(dataString);
        $S.ajax({
          url:    "/products/"+id,
          method: "PUT",
          data:   dataString,
          success: function (response) {
            // Manejar la respuesta del servidor
            $S(estatus).append(response.script);    // Agregar el script al cuerpo del documento
            $S('#alerta').fadeIn('slow');           // Mostrar el mensaje de alerta
          }
        });
      }
    }
  });
}

function productDelete(id){
  var estatus = "#estatusDelete"+id;
  var formId = "#FormDeleteProduct_"+id;
  $S(formId).validationEngine("attach", {
    autoPositionUpdate: true,
    onValidationComplete: function (_form, status) {
      if (status == true) {
        $S('#transparencia').fadeIn('slow');
        $S("#error").hide();
        var dataString = $S(formId).serialize();
        // console.log(dataString);
        $S.ajax({
          url:    "/products/"+id,
          method: "DELETE",
          data:   dataString,
          success: function (response) {
            // Manejar la respuesta del servidor
            $S(estatus).append(response.script);    // Agregar el script al cuerpo del documento
            $S('#alerta').fadeIn('slow');           // Mostrar el mensaje de alerta
          }
        });
      }
    }
  });
}


// REQUIREMENTS
function requirementCreate(){
  var formId = "#FormCreateRequirement";
  $S(formId).validationEngine("attach", {
    autoPositionUpdate: true,
    onValidationComplete: function (_form, status) {
      if (status == true) {
        $S('#transparencia').fadeIn('slow');
        $S("#error").hide();
        var dataString = $S(formId).serialize();
        // console.log(dataString);
        $S.ajax({
          url:    "/requirements",
          method: "POST",
          data:   dataString,
          success: function (response) {
            // Manejar la respuesta del servidor
            $S('#estatus').append(response.script); // Agregar el script al cuerpo del documento
            $S('#alerta').fadeIn('slow');           // Mostrar el mensaje de alerta
          }
        });
      }
    }
  });
} 

function requirementEdit(id){
  var estatus = "#estatusAccept"+id;
  var formId = "#FormAcceptRequirement_"+id;
  $S(formId).validationEngine("attach", {
    autoPositionUpdate: true,
    onValidationComplete: function (_form, status) {
      if (status == true) {
        $S('#transparencia').fadeIn('slow');
        $S("#error").hide();
        var dataString = $S(formId).serialize();
        // console.log(dataString);
        $S.ajax({
          url:    "/requirements/"+id,
          method: "PUT",
          data:   dataString,
          success: function (response) {
            // Manejar la respuesta del servidor
            $S(estatus).append(response.script);    // Agregar el script al cuerpo del documento
            $S('#alerta').fadeIn('slow');           // Mostrar el mensaje de alerta
          }
        });
      }
    }
  });
}

function requirementDelete(id){
  var estatus = "#estatusDelete"+id;
  var formId = "#FormDeleteRequirement_"+id;
  $S(formId).validationEngine("attach", {
    autoPositionUpdate: true,
    onValidationComplete: function (_form, status) {
      if (status == true) {
        $S('#transparencia').fadeIn('slow');
        $S("#error").hide();
        var dataString = $S(formId).serialize();
        // console.log(dataString);
        $S.ajax({
          url:    "/requirements/"+id,
          method: "DELETE",
          data:   dataString,
          success: function (response) {
            // Manejar la respuesta del servidor
            $S(estatus).append(response.script);    // Agregar el script al cuerpo del documento
            $S('#alerta').fadeIn('slow');           // Mostrar el mensaje de alerta
          }
        });
      }
    }
  });
}
