<?php
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Coach</title>
		<link rel="stylesheet" href="../../assets/css/formularios.css">
		<link rel="stylesheet" href="../../assets/css/responiveFormularios.css">

		<script src="assets/js/bootstrap.min.js" ></script>
	</head>
	
	<body>
		<div class="container">
		<h1>Co<span>ach</span></h1>

			
			<form id="nuevo" name="nuevo" method="POST" action="index.php?c=coach&a=actualizar" autocomplete="off">
				
			<input type="hidden" id="CI" name="CI" value="<?php echo $data["CI"]; ?>" />
				
			<div class="box-form">
				<div class="form-group">
					<input type="text" class="input-form" id="CI" name="CI" pattern="[0-9]{8}" title="Tu cedula deben ser los 8 digitos sin la barra" value="<?php echo $data["coach"]["CI"]?>" />
					<label for="CI" class="label-form "> CI</label>
				</div>
				
				<div class="form-group">
					<input type="text" class="input-form" id="nombre" name="nombre" pattern="[A-Za-zÁ-ú\s]{1,30}"  value="<?php echo $data["coach"]["Nombre"]?>" />
					<label for="nombre"class="label-form ">Nombre</label>
				</div>
				
				<div class="form-group">
					<input type="text" class="input-form" id="apellido" name="apellido" pattern="[A-Za-zÁ-ú\s]{1,30}"  value="<?php echo $data["coach"]["Apellido"]?>" />
					<label for="apellido" class="label-form ">Apellido</label>
				</div>
				
			</div>

			<div class="box-form box-form-right">

				<div class="form-group">
                    <input type="text" class="input-form" id="telefono" name="telefono" value="<?php echo $data["coach"]["Telefono"]?>" />
					<label for="telefono" class="label-form label">Telefono</label>
				</div>

				
				<div class="form-group">
					<input type="text" class="input-form" id="nombre" name="dojo" value ="<?php echo $data["coach"]["dojo"]?>">
					<label for="dojo" class="label-form">Dojo</label>
				</div>
					
			</div>
			<button id="guardar" name="guardar" type="submit" class="btn">Guardar
            <span class="bar"></span>

            </button>				
			</form>
		</body>
	</html>		