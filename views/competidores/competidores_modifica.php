<?php
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?php echo $data["titulo"]; ?></title>
		<link rel="stylesheet" href="../../assets/css/formularios.css">
    <link rel="stylesheet" href="../../assets/css/responiveFormularios.css">		
		<script src="assets/js/bootstrap.min.js" ></script>
	</head>
	
	<body>
		<div class="container">
		<h1>Compe<span>tidores</span></h1>

			
			<form id="nuevo" name="nuevo" method="POST" action="index.php?c=competidores&a=actualizar&id='<?php echo $data["idcompetidor"];?>'" autocomplete="off">
				
			<input type="hidden" id="idcompetidor" name="idcompetidor" value="<?php echo $data["idcompetidor"]; ?>" />
				
			<div class="box-form">
				<div class="form-group">
					<input type="text" class="input-form" id="CI" name="CI" maxlength="8" minlength="8" pattern="[0-9]{8}" title="Tu cedula deben ser los 8 digitos sin la barra" value="<?php echo $data["competidores"]["CI"]?>" />
					<label for="CI" class="label-form "> CI</label>
				</div>
				
				<div class="form-group">
					<input type="text" class="input-form" id="nombre" name="nombre" maxlength="20"  pattern="[A-Za-zÁ-ú\s]{1,30}"  value="<?php echo $data["competidores"]["nombre"]?>" />
					<label for="nombre"class="label-form ">Nombre</label>
				</div>
				
				<div class="form-group">
					<input type="text" class="input-form" id="apellido" name="apellido" maxlength="20"  pattern="[A-Za-zÁ-ú\s]{1,30}"  value="<?php echo $data["competidores"]["apellido"]?>" />
					<label for="apellido" class="label-form ">Apellido</label>
				</div>
				
			</div>

			<div class="box-form box-form-right">

				<div class="form-group">
					<label for="fecha_nac" class="label-form label">fecha de nacimiento</label>
					<input type="date" class="input-form" id="fecha_nac" name="fecha_nac" value="<?php echo $data["competidores"]["fecha_nac"]?>" />
				</div>

				<div class="form-group">
					<label for="genero" class="label-form label">Género</label>
						<select name="genero" class="input-form" id="genero" value="<?php echo $data["competidores"]["genero"]?>">
							<option value="Masculino">Masculino</option>
							<option value="Femenino">Femenino</option>
						</select>
				</div>
				<div class="form-group">
					<input type="text" class="input-form" id="nombre" name="Dojo "  maxlength="20" value ="<?php echo $data["competidores"]["dojo"]?>">
					<label for="Dojo" class="label-form">Dojo</label>
				</div>
					
			</div>
			<button id="guardar" name="guardar" type="submit" class="btn">Guardar
            <span class="bar"></span>

            </button>				
			</form>
		</body>
	</html>		