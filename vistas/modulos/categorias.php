<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>
        Administrar Categorías
        <small>Todas las categorías</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href=""><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Administrar Categorías</li>

      </ol>

    </section>



    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">

          <button  class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
            Agregar Categoría
          </button>


        </div>

        <div class="box-body">

          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

            <thead>

              <tr>

                <th style="width: 10px">#</th>

                <th>Categoría</th>
                <th>Acciones</th>

              </tr>

            </thead>

            <tbody>

              <?php
$item  = null;
$valor = null;

$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
//var_dump($categorias);

foreach ($categorias as $key => $value) {
    echo '<tr>

                <td>' . ($key + 1) . '</td>

                <td class="text-uppercase">' . $value["categoria"] . '</td>

                <td>

                  <div class="btn-group">

                    <button class="btn btn-warning btnEditarCategoria" idCategoria="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>

                    <button class="btn btn-danger btnEliminarCategoria" idCategoria="' . $value["id"] . '"><i class="fa fa-times"></i></button>

                  </div>

                </td>

              </tr>';
}
?>

            </tbody>

          </table>

        </div>

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





<!-- MODAL AGREGAR CATEGORIA-->

  <!-- Modal -->
<div id="modalAgregarCategoria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- CABEZA DEL MODAL-->

    <form role="form" method="post" enctype="multipart/form-data">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post">

        <div class="modal-header" style="background: #3c8dbc ; color: white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Categoría</h4>

        </div>


        <!-- BODY DEL MODAL-->
        <div class="modal-body">

          <div class="box-body">

            <!-- ingresar nombre usuario -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Nueva Categoría" required>

              </div>

            </div>

          </div>

        </div>

        <!-- PIE DEL MODAL-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Categoría</button>

        </div>

        <?php
$crearCategoria = new ControladorCategorias();
$crearCategoria->ctrCrearCategoria();

?>

      </form>

    </div>

  </div>

</div>




<!-- MODAL EDITAR CATEGORIA-->

  <!-- Modal -->
<div id="modalEditarCategoria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- CABEZA DEL MODAL-->

    <form role="form" method="post" enctype="multipart/form-data">

      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header" style="background: #3c8dbc ; color: white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Categoría</h4>

        </div>


        <!-- BODY DEL MODAL-->
        <div class="modal-body">

          <div class="box-body">

            <!-- ingresar nombre usuario -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarCategoria" name="editarCategoria" placeholder="Editar Categoría" required>

                <input type="hidden" id="idCategoria" name="idCategoria" required>

              </div>

            </div>

          </div>

        </div>

        <!-- PIE DEL MODAL-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Categoría</button>

        </div>

        <?php

$editarCategoria = new ControladorCategorias();
$editarCategoria->ctrEditarCategoria();

?>

      </form>

    </div>

  </div>

</div>

<?php

$borrarCategoria = new ControladorCategorias();
$borrarCategoria->ctrBorrarCategoria();

?>