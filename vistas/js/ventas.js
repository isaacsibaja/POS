/*=============================================
CARGAR LA TABLA DINÁMICA
=============================================*/

var table2 = $('.tablaVentas').DataTable({

    "ajax":"ajax/datatable-ventas.ajax.php",
    "columnDefs": [

        {
            "targets": -5,
             "data": null,
             "defaultContent": '<img class="img-thumbnail imgTablaVenta" width="40px">'

        },

        {
            "targets": -2,
             "data": null,
             "defaultContent": '<div class="btn-group"><button class="btn btn-success limiteStock"></button></div>'

        },

        {
            "targets": -1,
             "data": null,
             "defaultContent": '<div class="btn-group"><button class="btn btn-primary agregarProducto recuperarBoton" idProducto>Agregar</button></div>'

        }

    ],

    "language": {

        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

    }

})

/*=============================================
ACTIVAR LOS BOTONES CON LOS ID CORRESPONDIENTES
=============================================*/

$(".tablaVentas tbody").on( 'click', 'button.agregarProducto', function () {

    var data = table2.row( $(this).parents('tr') ).data();

    $(this).attr("idProducto",data[5]);

})

/*=============================================
FUNCIÓN PARA CARGAR LAS IMÁGENES CON EL PAGINADOR Y EL FILTRO
=============================================*/

function cargarImagenesProductos(){

     var imgTabla = $(".imgTablaVenta");

     var limiteStock = $(".limiteStock");

     for(var i = 0; i < imgTabla.length; i ++){

        var data = table2.row( $(imgTabla[i]).parents('tr') ).data();
        
        $(imgTabla[i]).attr("src",data[1]);

        if(data[4] <= 10){

            $(limiteStock[i]).addClass("btn-danger");
            $(limiteStock[i]).html(data[4]);

        }else if(data[4] > 11 && data[4] <= 15){

            $(limiteStock[i]).addClass("btn-warning");
            $(limiteStock[i]).html(data[4]);
        
        }else{

            $(limiteStock[i]).addClass("btn-success");
            $(limiteStock[i]).html(data[4]);
        }

    }


}

setTimeout(function(){

  cargarImagenesProductos()

},300);

/*=============================================
CARGAMOS LAS IMÁGENES CUANDO INTERACTUAMOS CON EL PAGINADOR
=============================================*/

$(".dataTables_paginate").click(function(){

    cargarImagenesProductos()
})

/*=============================================
CARGAMOS LAS IMÁGENES CUANDO INTERACTUAMOS CON EL BUSCADOR
=============================================*/
$("input[aria-controls='DataTables_Table_0']").focus(function(){

    $(document).keyup(function(event){

        event.preventDefault();

        cargarImagenesProductos()

    })


})

/*=============================================
CARGAMOS LAS IMÁGENES CUANDO INTERACTUAMOS CON EL FILTRO DE CANTIDAD
=============================================*/

$("select[name='DataTables_Table_0_length']").change(function(){

    cargarImagenesProductos()

})

/*=============================================
CARGAMOS LAS IMÁGENES CUANDO INTERACTUAMOS CON EL FILTRO DE ORDENAR
=============================================*/

$(".sorting").click(function(){

    cargarImagenesProductos()

})

/*=============================================
AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA
=============================================*/

$(".tablaVentas tbody").on("click", "button.agregarProducto", function(){

    var idProducto = $(this).attr("idProducto");

    $(this).removeClass("btn-primary agregarProducto");

    $(this).addClass("btn-default");

    var datos = new FormData();
    datos.append("idProducto", idProducto);

     $.ajax({

        url:"ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){

            var descripcion = respuesta["descripcion"];
            var stock = respuesta["stock"];
            var precio = respuesta["precio_venta"];

            $(".nuevoProducto").append(

            '<div class="row" style="padding:5px 15px">'+

              '<!-- Descripción del producto -->'+
              
              '<div class="col-xs-6" style="padding-right:0px">'+
              
                '<div class="input-group">'+
                  
                  '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'
                  +idProducto+'"><i class="fa fa-times"></i></button></span>'+

                  '<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+idProducto+'" name="agregarProducto" value="'
                  +descripcion+'" readonly required>'+

                '</div>'+

              '</div>'+

              '<!-- Cantidad del producto -->'+

              '<div class="col-xs-3">'+
                
                 '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock="'
                 +stock+'" nuevoStock="'+Number(stock-1)+'" required>'+

              '</div>' +

              '<!-- Precio del producto -->'+

              '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">'+

                '<div class="input-group">'+

                  '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
                     
                  '<input type="text" class="form-control nuevoPrecioProducto" precioReal="'+precio+'" name="nuevoPrecioProducto" value="'
                  +precio+'" readonly required>'+
     
                '</div>'+
                 
              '</div>'+

            '</div>') 

            // SUMAR TOTAL DE PRECIOS

            sumarTotalPrecios()

            // AGREGAR IMPUESTO

            agregarImpuesto()

            // AGRUPAR PRODUCTOS EN FORMATO JSON

            listarProductos()

            // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

            $(".nuevoPrecioProducto").number(true, 2);

        }

     })

});

/*=============================================
QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN
=============================================*/

$(".formularioVenta").on("click", "button.quitarProducto", function(){

    $(this).parent().parent().parent().parent().remove();

    var idProducto = $(this).attr("idProducto");

    $("button.recuperarBoton[idProducto='"+idProducto+"']").removeClass('btn-default');

    $("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');

    if($(".nuevoProducto").children().length == 0){

        $("#nuevoImpuestoVenta").val(0);
        $("#nuevoTotalVenta").val(0);
        $("#totalVenta").val(0);
        $("#nuevoTotalVenta").attr("total",0);

    }else{

        // SUMAR TOTAL DE PRECIOS

        sumarTotalPrecios()

        // AGREGAR IMPUESTO
            
        agregarImpuesto()

        // AGRUPAR PRODUCTOS EN FORMATO JSON

        listarProductos()

    }

})

/*=============================================
AGREGANDO PRODUCTOS DESDE EL BOTÓN PARA DISPOSITIVOS
=============================================*/

$(".btnAgregarProducto").click(function(){

    var datos = new FormData();
    datos.append("traerProductos", "ok");

    $.ajax({

        url:"ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){
            
                $(".nuevoProducto").append(

            '<div class="row" style="padding:5px 15px">'+

              '<!-- Descripción del producto -->'+
              
              '<div class="col-xs-6" style="padding-right:0px">'+
              
                '<div class="input-group">'+
                  
                  '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto><i class="fa fa-times"></i></button></span>'+

                  '<select class="form-control nuevaDescripcionProducto" idProducto name="nuevaDescripcionProducto" required>'+

                  '<option>Seleccione el producto</option>'+

                  '</select>'+  

                '</div>'+

              '</div>'+

              '<!-- Cantidad del producto -->'+

              '<div class="col-xs-3 ingresoCantidad">'+
                
                 '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock nuevoStock required>'+

              '</div>' +

              '<!-- Precio del producto -->'+

              '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">'+

                '<div class="input-group">'+

                  '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
                     
                  '<input type="text" class="form-control nuevoPrecioProducto" precioReal="" name="nuevoPrecioProducto" readonly required>'+
     
                '</div>'+
                 
              '</div>'+

            '</div>');


            // AGREGAR LOS PRODUCTOS AL SELECT 

             respuesta.forEach(funcionForEach);

             function funcionForEach(item, index){

                $(".nuevaDescripcionProducto").append(

                    '<option idProducto="'+item.id+'" value="'+item.descripcion+'">'+item.descripcion+'</option>'
                )

             }

             // SUMAR TOTAL DE PRECIOS

            sumarTotalPrecios()

            // AGREGAR IMPUESTO
            
            agregarImpuesto()


            // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

            $(".nuevoPrecioProducto").number(true, 2);

        }


    })

})

/*=============================================
SELECCIONAR PRODUCTO
=============================================*/

$(".formularioVenta").on("change", "select.nuevaDescripcionProducto", function(){

    var nombreProducto = $(this).val();

    var nuevaDescripcionProducto = $(this).parent().parent().parent().children().children().children(".nuevaDescripcionProducto");

    var nuevoPrecioProducto = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");

    var nuevaCantidadProducto = $(this).parent().parent().parent().children(".ingresoCantidad").children(".nuevaCantidadProducto");

    var datos = new FormData();
    datos.append("nombreProducto", nombreProducto);


      $.ajax({

        url:"ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){
            
            $(nuevaDescripcionProducto).attr("idProducto", respuesta["id"]);
            $(nuevaCantidadProducto).attr("stock", respuesta["stock"]);
            $(nuevaCantidadProducto).attr("nuevoStock", Number(respuesta["stock"])-1);
            $(nuevoPrecioProducto).val(respuesta["precio_venta"]);
            $(nuevoPrecioProducto).attr("precioReal", respuesta["precio_venta"]);


          // AGRUPAR PRODUCTOS EN FORMATO JSON

            listarProductos()

          // AGREGAR IMPUESTO
            
            agregarImpuesto()


        }

      })
})


/*=============================================
=            MODIFICAR LA CANTIDAD            =
=============================================*/

$(".formularioVenta").on("change", "input.nuevaCantidadProducto", function(){

  var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
  //console.log("precio", precio.val());

  var precioFinal = $(this).val() * precio.attr("precioReal");
  //console.log("$(this).val()", $(this).val());

  precio.val(precioFinal);

  var nuevoStock = Number($(this).attr("stock")) - $(this).val();

  $(this).attr("nuevoStock", nuevoStock);

  if (Number($(this).val()) > Number($(this).attr("stock"))) {

    //el valor de cantidad le asignamos 1
    $(this).val(1);

    swal({
      title: 'La cantidad supera el Stock',
      text: "Solo hay "+$(this).attr("stock")+" unidades!",
      type: 'error',
      confirmButtonText: "Cerrar"
    });

  }

  // SUMAR TOTAL DE PRECIOS

  sumarTotalPrecios()

  // AGREGAR IMPUESTO
            
  agregarImpuesto()

  // AGRUPAR PRODUCTOS EN FORMATO JSON

  listarProductos()


})
/*=====  End of MODIFICAR LA CANTIDAD  ======*/



/*===============================================
=            SUMAR TODOS LOS PRECIOS            =
===============================================*/

function sumarTotalPrecios(){

  var precioItem = $(".nuevoPrecioProducto");
  var arraySumaPrecio = [];

  for (var i = 0; i < precioItem.length; i++) {

    arraySumaPrecio.push(Number($(precioItem[i]).val()));

  }
  //console.log("arraySumaPrecio", arraySumaPrecio);

  function sumaArrayPrecios(total, numero){
    //retornar la suma del total mas el nuevo numero
    return total + numero;

  }

  var sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);
  //console.log("sumaTotalPrecio", sumaTotalPrecio);

  $("#nuevoTotalVenta").val(sumaTotalPrecio);

  //ocupamos el total de las ventas para asignar el impuesto almacenado en total, crear-venta.php input linea 205
  $("#nuevoTotalVenta").attr("total", sumaTotalPrecio);


}

/*=====  End of SUMAR TODOS LOS PRECIOS  ======*/


/*=================================================
=            FUNCTION AGREGAR IMPUESTO            =
=================================================*/


function agregarImpuesto(){

  //nuevoImpuestoVenta esta en crear-venta.php input linea 205
  var impuesto = $("#nuevoImpuestoVenta").val();

  var precioTotal = $("#nuevoTotalVenta").attr("total");

  var precioImpuesto = Number(precioTotal * impuesto/100);

  var totalConImpuesto = Number(precioImpuesto) + Number(precioTotal);

  //console.log("totalConImpuesto",totalConImpuesto);

  $("#nuevoTotalVenta").val(totalConImpuesto);


  //para asignar el precio impuesto a la bd
  $("#nuevoPrecioImpuesto").val(precioImpuesto);

  //para asignar el precio neto a la bd
  $("#nuevoPrecioNeto").val(precioTotal);

}

/*=====  End of FUNCTION AGREGAR IMPUESTO  ======*/


/*=================================================
=            CUANDO CAMBIA EL IMPUESTO            =
=================================================*/

$("#nuevoImpuestoVenta").change(function(){

  agregarImpuesto();

});
/*=====  End of CUANDO CAMBIA EL IMPUESTO  ======*/




/*===============================================
=            FORMATO AL PRECIO FINAL            =
===============================================*/

$("#nuevoTotalVenta").number(true, 2);

/*=====  End of FORMATO AL PRECIO FINAL  ======*/


/*==================================================
=            SELECCIONAR METODO DE PAGO            =
==================================================*/

$("#nuevoMetodoPago").change(function(){

  var metodo = $(this).val();

  if(metodo == "Efectivo"){

    $(this).parent().parent().removeClass("col-xs-6");

    $(this).parent().parent().addClass("col-xs-4");

    $(this).parent().parent().parent().children(".cajasMetodoPago").html(

       '<div class="col-xs-4">'+ 

        '<div class="input-group">'+ 

          '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+ 

          '<input type="text" class="form-control" id="nuevoValorEfectivo" placeholder="000000" required>'+

        '</div>'+

       '</div>'+

       '<div class="col-xs-4" id="capturarCambioEfectivo" style="padding-left:0px">'+

        '<div class="input-group">'+

          '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+

          '<input type="text" class="form-control" id="nuevoCambioEfectivo" placeholder="000000" readonly required>'+

        '</div>'+

       '</div>'

     )

    //agregar formato de moneda al precio

    $('#nuevoValorEfectivo').number( true, 2);
    $('#nuevoCambioEfectivo').number( true, 2);

  }else{

    $(this).parent().parent().removeClass('col-xs-4');

    $(this).parent().parent().addClass('col-xs-6');

    //comillas simples preferiblemente al usar html

    $(this).parent().parent().parent().children(".cajasMetodoPago").html(

      '<div class="col-xs-6" style="padding-left: 0px">'+

        '<div class="input-group">'+

          '<input type="text" class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" placeholder="Código transacción" required>'+

          '<span class="input-group-addon"><i class="fa fa-lock"></i></span>'+

        '</div>'+

      '</div>'
      )


  }

})

/*=====  End of SELECCIONAR METODO DE PAGO  ======*/



/*==========================================
=            CAMBIO EN EFECTIVO            =
==========================================*/
//Utilizamos formularioVenta ya que este no aparece cuando entramos a la pagina, aparece cuando cambia el select

$(".formularioVenta").on("change", "input#nuevoValorEfectivo", function(){

  var efectivo = $(this).val();

  var cambio = Number(efectivo) - Number($('#nuevoTotalVenta').val());

  var nuevoCambioEfectivo = $(this).parent().parent().parent().children('#capturarCambioEfectivo').children().children('#nuevoCambioEfectivo');

  nuevoCambioEfectivo.val(cambio);

})

/*=====  End of CAMBIO EN EFECTIVO  ======*/



/*==================================================
=            LISTAR TODOS LOS PRODUCTOS            =
==================================================*/

function listarProductos(){

  var listaProductos = [];

  var descripcion = $(".nuevaDescripcionProducto");

  var cantidad = $(".nuevaCantidadProducto");

  var precio = $(".nuevoPrecioProducto");

  for(var i = 0; i < descripcion.length; i++){

                listaProductos.push({ "id" : $(descripcion[i]).attr("idProducto"), 
                "descripcion" : $(descripcion[i]).val(),
                "cantidad" : $(cantidad[i]).val(),
                "stock" : $(cantidad[i]).attr("nuevoStock"),
                "precio" : $(precio[i]).attr("precioReal"),
                "total" : $(precio[i]).val()})

  }

  $("#listaProductos").val(JSON.stringify(listaProductos)); 
  //console.log("listaProductos", JSON.stringify(listaProductos)); 


}
/*=====  End of LISTAR TODOS LOS PRODUCTOS  ======*/