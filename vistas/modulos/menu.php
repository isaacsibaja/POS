<aside class="main-sidebar">

	<section class="sidebar">

		<div class="user-panel">
        <div class="pull-left image">

          <?php

if ($_SESSION["foto"] != "") {

    echo '<img src="' . $_SESSION["foto"] . '" class="img-circle">';

} else {

    echo '<img src="vistas/img/usuarios/default/anonymous.png" class="img-circle">';

}

?>
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["nombre"]; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> En Línea</a>

        </div>
      </div>


		<ul class="sidebar-menu">

			<li class="header">MENU NAVEGACIÓN </br>
				<span style="color: white">Perfil: <?php echo $_SESSION["perfil"]; ?></span> </li>



			<li>

				<a href="inicio">
					<i class="fa fa-home"></i>
					<span>Inicio</span>
				</a>
			</li>


			<li>
				<a href="usuarios">
					<i class="fa fa-user"></i>
					<span>Usuarios</span>
				</a>
			</li>


			<li>
				<a href="categorias">
					<i class="fa fa-th"></i>
					<span>Categorías</span>
				</a>
			</li>


			<li>
				<a href="productos">
					<i class="fa fa-product-hunt"></i>
					<span>Productos</span>
				</a>
			</li>


			<li >
				<a href="clientes">
					<i class="fa fa-users"></i>
					<span>Clientes</span>
				</a>
			</li>


			<!--menu desplegable con varios submenu-->
			<li class="treeview">
				<a href="#">
					<i class="fa fa-list-ul"></i>
					<span>Ventas</span>
					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>
				</a>

				<ul class="treeview-menu">

					<li>
						<a href="ventas">
							<i class="fa fa-circle-o text-red"></i>
							<span>Administrar ventas</span>

						</a>
					</li>


					<li>
						<a href="crear-venta">
							<i class="fa fa-circle-o text-yellow"></i>
							<span>Crear venta</span>

						</a>
					</li>


					<li>
						<a href="reportes">
							<i class="fa fa-circle-o text-aqua"></i>
							<span>Reporte ventas</span>

						</a>
					</li>

				</ul>

			</li>

		</ul>

	</section>

</aside>
