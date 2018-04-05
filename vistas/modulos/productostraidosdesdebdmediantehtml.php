<tbody>

<?php

//null por que se va a traer todos los productos

$item = null;

$valor = null;

$productos = ControladorProductos::ctrMostrarProductos($item, $valor);

//var_dump($productos);

foreach ($productos as $key => $value) {
    echo '<tr>
            <td>' . ($key + 1) . '</td>
            <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="50px"></td>
            <td>' . $value["codigo"] . '</td>
            <td>' . $value["descripcion"] . '</td>';

    $item      = "id";
    $valor     = $value["id_categoria"];
    $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);

    echo '<td>' . $categoria["categoria"] . '</td>
            <td>' . $value["stock"] . '</td>
            <td>' . $value["precio_compra"] . '</td>
            <td>' . $value["precio_venta"] . '</td>
            <td>' . $value["fecha"] . '</td>

            <td>

              <div class="btn-group">

                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

              </div>

            </td>

          </tr>';
}

?>


        </tbody>









        {
            "data": [
            [
              "1",
              "vistas/img/productos/default/anonymous.png",
              "0001",
              "Aspiradora Industrial",
              "EQUIPOS ELECTROMECÁNICOS",
              "20",
              "$ 5.00",
              "$ 10.00",
              "2018-03-22 10:07:15",
              "1"
            ],
            [
              "2",
              "vistas/img/productos/default/anonymous.png",
              "0001",
              "Aspiradora Industrial",
              "EQUIPOS ELECTROMECÁNICOS",
              "20",
              "$ 5.00",
              "$ 10.00",
              "2018-03-22 10:07:15",
              "2"
            ]
        }






        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": '<div class="btn-group"><button class="btn btn-warning btnEditarProducto" idProducto><i class="fa fa-pencil"></i></button><button class="btn btn-danger btnEliminarProducto" idProducto><i class="fa fa-times"></i></button></div>'
        }]
    })

    $('.tablaProductos tbody').on( 'click', 'btnEditarProducto', function () {
        var data = table.row( $(this).parents('tr') ).data();
        //console.log("data", data[5]); se le agrega el data 5 de cada linea json empezando a contar desde el 0
        $(this).attr("idProducto", data[9]);
        //alert( data[0] +"'s salary is: "+ data[ 5 ] );
    //} );




    <?php

/**
 *
 */
class ControladorProductos
{
    /*=============================================
    =            MOSTRAR PRODUCTOS            =
    =============================================*/

    public static function ctrMostrarProductos($item, $valor)
    {

        $tabla = "productos";

        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);

        return $respuesta;

    }

    public static function crtCrearProducto()
    {
        if (isset($_POST["nuevaDescripcion"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáÄéËíÍóÓúÚ ]+$/', $_POST["nuevaDescripcion"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoPrecioCompra"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoPrecioVenta"])) {

                $ruta = "vistas/img/productos/default/anonymous.png";

                $tabla = "productos";

                $datos = array("id_categoria" => $_POST["nuevaCategoria"],
                    "codigo"                      => $_POST["nuevoCodigo"],
                    "descripcion"                 => $_POST["nuevaDescripcion"],
                    "stock"                       => $_POST["nuevoStock"],
                    "precio_compra"               => $_POST["nuevoPrecioCompra"],
                    "precio_venta"                => $_POST["nuevoPrecioVenta"],
                    "imagen"                      => $ruta);

                $respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

          swal({

            type: "success",
            title: "¡El producto ha sido guardado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

          }).then(function(result){

            if(result.value){

              window.location = "productos";

            }

          });


          </script>';

                }

            } else {

                echo '<script>

          swal({

            type: "error",
            title: "¡El producto no puede ir vacíos o llevar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

          }).then(function(result){

            if(result.value){

              window.location = "productos";

            }

          });

        </script>';

            }

        }

    }
}
