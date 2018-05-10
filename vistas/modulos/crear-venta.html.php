<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crear Venta
        <small>crear venta</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Crear Venta</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">

      <div class="row">

        <!--=================================================
        =            FORMULARIO PARA CRER VENTAS            =
        ==================================================-->

        <div class="col-lg-5 col-xs-12">

          <div class="box box-success">

            <div class="box-header with-border"></div>

            <form class="form" method="post">

            <div class="box-body">



                <div class="box">

                  <!--=========================================
                  =            ENTRADA VENDEDOR            =
                  ==========================================-->

                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>

                      <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="Usuario Administrador" readonly>

                    </div>

                  </div>

                  <!--====  End of ENTRADA DEL VENDEDOR  ====-->


                  <!--==========================================
                  =            ENTRADA DEL VENDEDOR            =
                  ===========================================-->


                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-key"></i></span>

                      <input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10002343" readonly>

                    </div>

                  </div>

                  <!--====  End of ENTRADA DEL VENDEDOR  ====-->


                  <!--=========================================
                  =            ENTRADA DEL CLIENTE            =
                  ==========================================-->

                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select type="text" class="form-control" id="agregarCliente" name="agregarCliente" placeholder="Agregar Cliente" required>

                        <option value="">Seleccionar Cliente</option>

                      </select>

                      <span class="input-group-addon"> <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar Cliente</button></span>

                    </div>

                  </div>



                  <!--====  End of ENTRADA DEL CLIENTE  ====-->



                  <!--===================================================
                  =            ENTRADA PARA AGREGAR PRODUCTO            =
                  ====================================================-->

                  <div class="form-group row nuevoProducto">

                    <!-- descripcion del producto -->


                    <div class="col-xs-6" style="padding-right: 0px">

                      <div class="input-group">

                        <span class="input-group-addon"> <button type="button" class="btn btn-danger btn-xs"> <i class="fa fa-times"></i></button></span>

                        <input type="text" class="form-control" id="agregarProducto" name="agregarProducto" placeholder="Descripción del producto" required>

                      </div>

                    </div>

                    <!-- cantidad del producto -->


                    <div class="col-xs-3">

                      <input type="number" class="form-control" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" placeholder="0" required>

                    </div>

                    <!-- precio del producto -->


                    <div class="col-xs-3" style="padding-left: 0px">

                      <div class="input-group">

                        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                        <input type="number" class="form-control" id="nuevoPrecioProducto" name="nuevoPrecioProducto" placeholder="0000000" readonly required>


                      </div>

                    </div>

                  </div>

                  <!--====================================================
                  =            BOTON PARA AGREGAR UN PRODUCTO            =
                  =====================================================-->

                  <!-- este boton solo para dispositivos pequeños -->


                  <button type="button" class="btn btn-default hidden-lg"> Agregar Producto</button>

                  <hr>

                  <!--====  End of BOTON PARA AGREGAR UN PRODUCTO  ====-->


                  <!--======================================
                  =            IMPUESTO Y TOTAL            =
                  =======================================-->


                  <div class="row">

                    <div class="col-xs-8 pull-right">

                      <table class="table">

                        <thead>

                          <tr>
                            <th>Impuesto</th>
                            <th>Total</th>
                          </tr>

                        </thead>


                        <tbody>

                          <tr>

                            <td style="width: 50%">

                              <div class="input-group">

                                <input type="number" class="form-control" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>
                            <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                              </div>

                            </td>

                            <td style="width: 50%">

                              <div class="input-group">

                                <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                                <input type="number" class="form-control" min="1" id="nuevoTotalVenta" name="nuevoTotalVenta" placeholder="00000" readonly required>

                              </div>

                            </td>

                          </tr>

                        </tbody>

                      </table>

                    </div>


                  </div>

                  <!--====  End of ENTRADA PARA AGREGAR PRODUCTO  ====-->

                  <hr>

                  <!--====================================
                  =            METODO DE PAGO            =
                  =====================================-->

                  <div class="form-group row">

                    <div class="col-xs-6" style="padding-right: 0px">

                      <div class="input-group">

                        <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>

                          <option value="">Seleccione método de pago</option>
                          <option value="efectivo">Efectivo</option>
                          <option value="tarjetaCredito">Tarjeta Crédito</option>
                          <option value="tarjetaDebito">Tarjeta Débito</option>

                        </select>

                      </div>

                    </div>

                    <div class="col-xs-6" style="padding-left: 0px">

                      <div class="input-group">

                        <input type="text" class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" placeholder="Código transacción" required>

                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                      </div>

                    </div>

                  </div>

                  <br>

                  <!--====  End of METODO DE PAGO  ====-->

                </div>

            </div>

            <div class="box-footer">

              <button type="submit" class="btn btn-success pull-right">Guardar Venta</button>

            </div>

            </form>

          </div>

        </div>



        <!--====  End of FORMULARIO PARA CRER VENTAS  ====-->



        <!--===========================================
        =            LA TABLA DE PRODUCTOS            =
        ============================================-->

        <div class="col-lg-7 hidden-md hidden-sm hidden-xs">

          <div class="box box-warning">

            <div class="box-header with-border"></div>

            <div class="box-body">

              <table class="table table-bordered table-striped dt-responsive tablas">

                <thead>

                  <tr>

                    <th style="width: 10px">#</th>
                    <th>Imágen</th>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Stock</th>
                    <th>Acciones</th>

                  </tr>

                </thead>

                <tbody>

                  <tr>

                    <td>1</td>
                    <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                    <td>00123</td>
                    <td>Lorem ipsum</td>
                    <td>20</td>
                    <td>

                      <div class="btn-group">
                        <button type="button" class="btn btn-success"> Agregar</button>
                      </div>

                    </td>


                  </tr>

                </tbody>

              </table>


            </div>

          </div>

        </div>



        <!--====  End of LA TABLA DE PRODUCTOS  ====-->



      </div>



    </section>

  </div>








<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar documento" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

              </div>

            </div>

             <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cliente</button>

        </div>

      </form>

      <?php

$crearCliente = new ControladorClientes();
$crearCliente->ctrCrearCliente();

?>

    </div>

  </div>

</div>