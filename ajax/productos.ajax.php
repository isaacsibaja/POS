<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxProductos
{

    /*=============================================
    GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
    =============================================*/
    public $idCategoria;

    public function ajaxCrearCodigoProducto()
    {

        $item  = "id_categoria";
        $valor = $this->idCategoria;

        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

        echo json_encode($respuesta);

    }

    /*=============================================
    EDITAR PRODUCTO
    =============================================*/

    public $idProducto;

    public $traerProductos;

    public $nombreProducto;

    public function ajaxEditarProducto()
    {

        if ($this->traerProductos == "ok") {
            //dejamos item y valor null para que los traiga todos

            $item  = null;
            $valor = null;

            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

            echo json_encode($respuesta);

        } else if ($this->nombreProducto != "") {

            $item  = "descripcion";
            $valor = $this->nombreProducto;

            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

            echo json_encode($respuesta);

        } else {

            //recibe el id producto
            $item  = "id";
            $valor = $this->idProducto;

            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

            echo json_encode($respuesta);

        }

    }

}

/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/

if (isset($_POST["idCategoria"])) {

    $codigoProducto              = new AjaxProductos();
    $codigoProducto->idCategoria = $_POST["idCategoria"];
    $codigoProducto->ajaxCrearCodigoProducto();

}
/*=============================================
EDITAR PRODUCTO
=============================================*/
//si viene una variable post

if (isset($_POST["idProducto"])) {

    $editarProducto             = new AjaxProductos();
    $editarProducto->idProducto = $_POST["idProducto"];
    $editarProducto->ajaxEditarProducto();

}

/*=============================================
TRAER PRODUCTOS
trae todos los productos lo agregamos en AGREGANDO PRODUCTOS DESDE EL BOTON PARA DISPOSITIVOS ventas.js
=============================================*/
//si viene una variable post

if (isset($_POST["traerProductos"])) {

    $traerProductos                 = new AjaxProductos();
    $traerProductos->traerProductos = $_POST["traerProductos"];
    $traerProductos->ajaxEditarProducto();

}

/*=============================================
TRAER NOMBRE PRODUCTO
=============================================*/
//si viene una variable post

if (isset($_POST["nombreProducto"])) {

    $traerProductos                 = new AjaxProductos();
    $traerProductos->nombreProducto = $_POST["nombreProducto"];
    $traerProductos->ajaxEditarProducto();

}
