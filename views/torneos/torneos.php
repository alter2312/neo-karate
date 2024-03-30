<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Torneos</title>
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
                <li> <a class="link" href="../../index.php?c=torneo&a=index" class="btn btn-primary">Torneo</a></li>
                <li> <a class="link" href="../../index.php?c=competidores&a=index" class="btn btn-primary">Competidores</a></li>
                <li> <a class="link" href="../../index.php?c=dojo&a=index" class="btn btn-primary">Dojos</a></li>
                <li> <a class="link" href="../../index.php?c=coach&a=index" class="btn btn-primary">Coach</a></li>
                <li> <a class="link" href="../../index.php?c=katas&a=index" class="btn btn-primary">Katas</a></li>
                <li> <a class="link" href="../../index.php?c=llaves&a=index" class="btn btn-primary">Llaves</a></li>
            </ul>
        </nav>
        <div class="container_header">
        <a class="link" href="../../index.php?c=usuarios&a=cerrarsession" class="salir">salir</>
        <figure class="container_logo">

<?php echo "<a href='index.php?c=usuarios&a=inicioAdmin&id=".$_SESSION["nombre"]."'>";
echo "<img src='assets/img/logo.svg' class='logo ' alt='Logo de la aplicacion web de Testing Dummmies'>";
echo "</a>";	
?>
</figure>
	
    </header>



	<main class="container">
			<h1>Tor<span>neos</span></h1>
			<a href="index.php?c=torneo&a=viewFormulario"  class=" btn btn-primary"><span class="text">Agregar</span></a>
			<div class="table-responsive tabla-grande">

			<table  id="example" cellspacing=0 cellpadding=5 width=70 >
				<thead>
					<tr class="table-primary">
						<th>Torneo numero</th>
						<th>Ubicación</th>
						<th>Fecha</th>
						<th>Género</th>
						<th>Tipo</th>
						<th>Estado</th>
						<th>Editar</th>
						<th>Eliminar</th>
                        <th>Finalizar</th>
				</thead>
				<tbody>
					<?php foreach($data["torneo"] as $dato) {
						echo "<tr>";
						echo "<td>".$dato["IDTorneo"]."</td>";
						echo "<td>".$dato["Ubicacion"]."</td>";
						echo "<td>".$dato["Fecha"]."</td>";
						echo "<td>".$dato["Genero"]."</td>";
						echo "<td>".$dato["Tipo"]."</td>";
						echo "<td>".$dato["EstadoTorneo"]."</td>";
						echo "<td><a href='index.php?c=torneo&a=Modificar&id=".$dato["IDTorneo"]."' class='btn'>
						<span class='text'>Modificar</span>
						</a></td>";
						echo "<td><a href='index.php?c=torneo&a=eliminar&id=".$dato["IDTorneo"]."' class='btn'>
						<span class='text'>Eliminar</span>
						</a></td>";
                        echo "<td><a href='index.php?c=torneo&a=finalizarTorneo&id=".$dato["IDTorneo"]."' class='btn'>
                        <span class='text'>Finalizar</span>";
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
		</div>
	</main>
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
