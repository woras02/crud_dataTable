$(document).ready(function () {
  tablaPersonas = $("#tablaPersonas").DataTable({
    columnDefs: [
      {
        targets: -1,
        data: null,
        defaultContent:
          "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>",
      },
    ],

    //Para cambiar el lenguaje a español
    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
  });

  $("#btnNuevo").click(function () {
    $("#formPersonas").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Persona");
    $("#modalCRUD").modal("show");
    id = null;
    opcion = 1; //alta
  });

  var fila; //capturar la fila para editar o borrar el registro

  //botón EDITAR
  $(document).on("click", ".btnEditar", function () {
    fila = $(this).closest("tr");
    id = parseInt(fila.find("td:eq(0)").text());
    dni = fila.find("td:eq(1)").text();
    nombre = fila.find("td:eq(2)").text();
    apellido = fila.find("td:eq(3)").text();
    edad = parseInt(fila.find("td:eq(4)").text());
    fecha_nac = fila.find("td:eq(5)").text();

    $("#dni").val(dni);
    $("#nombre").val(nombre);
    $("#apellido").val(apellido);
    $("#edad").val(edad);
    $("#fecha_nac").val(fecha_nac);

    opcion = 2;
    //editar

    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Persona");
    $("#modalCRUD").modal("show");
  });

  //botón BORRAR
  $(document).on("click", ".btnBorrar", function () {
    fila = $(this);
    id = parseInt($(this).closest("tr").find("td:eq(0)").text());
    opcion = 3; //borrar
    var respuesta = confirm(
      "¿Está seguro de eliminar el registro: " + id + "?"
    );
    if (respuesta) {
      $.ajax({
        url: "crud.php",
        type: "POST",
        dataType: "json",
        data: { opcion: opcion, id: id },
        success: function () {
          tablaPersonas.row(fila.parents("tr")).remove().draw();
        },
      });
    }
  });
  //botón guardar
  $("#btnGuardar").on("click", function () {
    e.preventDefault();
     let dni = $.trim($("#dni").val());
     let nombre = $.trim($("#nombre").val());
     let apellido = $.trim($("#apellido").val());
     let edad = $.trim($("#edad").val());
     let fecha_nac = $.trim($("#fecha_nac").val());

   
      $.ajax({
        url: "crud.php",
        type: "POST",
        data: {
          id: id,
          dni: dni,
          nombre: nombre,
          apellido: apellido,
          edad: edad,
          fecha_nac: fecha_nac,
          opcion: opcion,
        },
        success:function(respuesta){
          alert(respuesta);
        }
      });
  });

  $("#formPersonas").submit(function (e) {
    e.preventDefault();
    dni = $.trim($("#dni").val());
    nombre = $.trim($("#nombre").val());
    apellido = $.trim($("#apellido").val());
    edad = $.trim($("#edad").val());
    fecha_nac = $.trim($("#fecha_nac").val());

    $.ajax({
      url: "guardar.php",
      type: "POST",
      dataType: "json",
      data: {
        id: id,
        dni: dni,
        nombre: nombre,
        apellido: apellido,
        edad: edad,
        fecha_nac: fecha_nac,
        opcion: opcion,
      },
      success: function (data) {
        console.log(data);
        id = data[0].id;
        nombre = data[0].nombre;
        apellido = data[0].apellido;
        edad = data[0].edad;
        fecha_nac = data[0].fecha_nac;
        if (opcion == 1) {
          tablaPersonas.row
            .add([id, dni, nombre, apellido, edad, fecha_nac])
            .draw();
        } else {
          tablaPersonas
            .row(fila)
            .data([id, dni, nombre, apellido, edad, fecha_nac])
            .draw();
        }
      },
    });
    $("#modalCRUD").modal("hide");
  });
});
