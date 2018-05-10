<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Clientes

      <small>Todos los clientes</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Clientes</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">

          Agregar Cliente

        </button>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Cédula</th>
           <th>Email</th>
           <th>Teléfono</th>
           <th>Dirección</th>
           <th>Fecha Nacimiento</th>
           <th>Total Compras</th>
           <th>Última Compra</th>
           <th>Ingreso al sistema</th>
           <th>Acciones</th>

         </tr>

        </thead>

        <tbody>

          <?php

$item  = null;
$valor = null;

$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
//var_dump($clientes);

foreach ($clientes as $key => $value) {

    echo '<tr>

            <td>' . ($key + 1) . '</td>

            <td>' . $value["nombre"] . '</td>

            <td>' . $value["documento"] . '</td>

            <td>' . $value["email"] . '</td>

            <td>' . $value["telefono"] . '</td>

            <td>' . $value["direccion"] . '</td>

            <td>' . $value["fecha_nacimiento"] . '</td>

            <td>' . $value["compras"] . '</td>

            <td>2018-04-05 19:05:06</td>

            <td>' . $value["fecha"] . '</td>


            <td>

              <div class="btn-group">

                <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente"
                idCliente= "' . $value["id"] . '"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger btnEliminarCliente" idCliente= "' . $value["id"] . '"><i class="fa fa-times"></i></button>

              </div>

            </td>

          </tr>';
}

?>


        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>





<!--=====================================
MODAL AGREGAR CLIENTES
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

          <h4 class="modal-title">Agregar Cliente</h4>

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


            <!-- ENTRADA PARA EL CEDULA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar cédula" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL TELEFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono"  data-inputmask="'mask':'(999) 9999-9999.'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

              </div>

            </div>

            <!-- ENTRADA PARA FECHA NACIMIENTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias':'yyyy/mm/dd'" data-mask required>

              </div>

            </div>




          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Cliente</button>

        </div>

        <?php

$crearCliente = new ControladorClientes();
$crearCliente->ctrCrearCliente();

?>

      </form>

    </div>

  </div>

</div>







<!--=====================================
MODAL EDITAR CLIENTES
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Cliente</h4>

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

                <!--id="editarCliente" es para traerlo de la BD desde el js-->

                <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" placeholder="Editar nombre" required>

                <input type="hidden" id="idCliente" name="idCliente">

              </div>

            </div>


            <!-- ENTRADA PARA EL CEDULA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="number" min="0" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" placeholder="Editar cédula" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" placeholder="Editar email" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL TELEFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" placeholder="Editar teléfono"  data-inputmask="'mask':'(999) 9999-9999.'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion"  placeholder="Editar dirección" required>

              </div>

            </div>

            <!-- ENTRADA PARA FECHA NACIMIENTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" name="editarFechaNacimiento" id="editarFechaNacimiento" placeholder="Editar fecha nacimiento" data-inputmask="'alias':'yyyy/mm/dd'" data-mask required>

              </div>

            </div>




          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Cliente</button>

        </div>

      </form>

      <?php

$editarCliente = new ControladorClientes();
$editarCliente->ctrEditarCliente();

?>

    </div>

  </div>

</div>


 <?php

$eliminarCliente = new ControladorClientes();
$eliminarCliente->ctrEliminarCliente();

?>