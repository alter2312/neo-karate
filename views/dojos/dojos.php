<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?php echo $data["titulo"]; ?></title>
		<link rel="stylesheet" href="assets/css/styles-competidores-dojos.css">
		<script src="https://kit.fontawesome.com/cea33d77ef.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../../assets/css/responsiveTablas.css">
		<script src="https://kit.fontawesome.com/cea33d77ef.js" crossorigin="anonymous"></script>


	</head>
	
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

	
    </header>
	
	

		<div class="container">
			<h1>Dojos</h1>
			
			<a href="index.php?c=dojo&a=nuevo" class="btn btn-primary"><span class='text'>Agregar</span></a>
  						
			
			<br />
			<br />
			<div class="table-responsive" >
				<table  class="table" id="example"cellspacing=0 cellpadding=5>
					<thead>
						<tr class="table-primary">
							
							<th>Dojo</th>
							<th>Escuela</th>
							<th>Modificar</th>
							<th>Eliminar</th>
                            
							
						</tr>
					</thead>
					
					<tbody>
						<?php foreach($data["dojos"] as $dato) {
							echo "<td>".$dato["NombreDojo"]."</td>";
                            echo "<td>".$dato["Escuela"]."</td>";
                            echo "<td><a href='index.php?c=dojo&a=modificar&id=".$dato["IDDojo"]."' class='btn btn-warning'>
							<span class='text'>Modificar</span>
							</a></td>";

                            echo "<td><a href='index.php?c=dojo&a=eliminar&id=".$dato["IDDojo"]."' class='btn btn-danger'>
							<span class='text'>Eliminar</span>
							</a></td>";
                    		echo "</tr>";
						}
						?>
					</tbody>
					
				</table>
			</div>
		</div>
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