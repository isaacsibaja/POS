<?php

/**
 *
 */
class ControladorVentas
{

    /*======================================
    =            MOSTRAR VENTAS            =
    ======================================*/

    public static function ctrMostrarVentas($item, $valor)
    {

        $tabla = "ventas";

        $respuesta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);

        return $respuesta;
    }

    /*=====  End of MOSTRAR VENTAS  ======*/

}
