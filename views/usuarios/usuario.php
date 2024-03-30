<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?php echo $data["titulo"]; ?></title>
		<link rel="stylesheet" href="../../assets/css/styles-competidores-dojos.css">
		<link rel="stylesheet" href="../../assets/css/responsiveTablas.css">

		<script src="https://kit.fontawesome.com/cea33d77ef.js" crossorigin="anonymous"></script>

	</head>
	
	<body>
	<header class="header">
        <nav>
			<bottom class="toggle">
        		<i class="fa-solid fa-bars"></i>
      		</bottom>
            <ul class="nav_menu">
              
                <li> <a class="link" href="../../index.php?c=usuarios&a=InicioAdminUser" class="btn btn-primary">Usuarios</a></li>
				<li><a class="link" href="../../index.php?c=usuarios&a=cerrarsession" class="salir">salir</a></li>

            </ul>
        </nav>
        <figure class="container_logo">
			<a href="../../index.php?c=usuarios&a=inicio">
            <img src="../../assets/img/logo.svg" class="logo"alt="Logo de la aplicacion web de Testing Dummmies">
			</a>	
		</figure>
    </header>


		<section class="container">
			<h1><?php echo $data["titulo"]; ?></h1>
			
			<a href="../../index.php?c=usuarios&a=nuevo" class="btn btn-primary"><span class="text">Agregar</span></a>

			
			
			<div class="table-responsive">
				<table class="table" id="example" cellspacing=0 cellpadding=5 >
					<thead>
						<tr class="table-primary">
							<th>Nombre</th>
							<th>Contraseña</th>
							<th>Grupo</th>
							<th>Editar</th>
							<th>Eliminar</th>
					<tbody>
						<?php foreach($data["usuarios"] as $dato) {
							echo "<tr>";
							echo "<td>".$dato["Nombre"]."</td>";
							echo "<td>".$dato["Contraseña"]."</td>";
							echo "<td>".$dato["GrupoUsuario"]."</td>";
							echo "<td><a href='../../index.php?c=usuarios&a=modificar&id=".$dato["IDUsuario"]."' class='btn'>
    						<span class='text'>Modificar</span>
  							</a></td>"
						
							;
							echo "<td><a href='../../index.php?c=usuarios&a=eliminar&id=".$dato["IDUsuario"]."' class='btn'>
    						<span class='text'>Eliminar</span>
  							</a></td>";
							echo "</tr>";
						}
						?>
					</tbody>
					
				</table>
			</div>
		</section>
		<script src="assets/js/menu.js"></script>
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script>
        new DataTable('#example', {
            responsive: true
        });
    </script>
	</body>
</html>