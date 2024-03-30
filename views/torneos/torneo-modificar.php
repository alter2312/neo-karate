<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Torneo</title>
		<link rel="stylesheet" href="../../assets/css/formularios.css">
		<link rel="stylesheet" href="../../assets/css/responiveFormularios.css">

	</head>
	<body>
	<main class="container">
		<h1>Torneo</h1>
		<form id="nuevo" name="nuevo" method="POST" action="index.php?c=torneo&a=actualizar" autocomplete="off">
			<input type="hidden" id="idTorneo" name="idTorneo" value="<?php echo $data["torneo"]["IDTorneo"]; ?>" />
			<div class="box-form">
			<div class="form-group">
    <input type="text" class="input-form" id="ubicacion" name="ubicacion" value="<?php echo $data["torneo"]["Ubicacion"]?>" />
    <label for="ubicacion" class="label-form">Ubicación</label>
</div>

<div class="form-group">
    <input type="date" class="input-form" id="fecha" name="fecha" value="<?php echo $data["torneo"]["Fecha"]?>" />
    <label for="fecha" class="label-form">Fecha</label>
</div>
			
				<div class="form-group">
					<label for="genero" class="label-form label">Género</label>
					<select class="input-form" id="genero" name="genero">
						<option value="Masculino" <?php if($data["torneo"]["Genero"] == "Masculino") echo "selected"; ?>>Masculino</option>
						<option value="Femenino" <?php if($data["torneo"]["Genero"] == "Femenino") echo "selected"; ?>>Femenino</option>
					</select>

				</div>
			</div>
			<div class="box-form box-form-right">
				<div class="form-group">
					<label for="tipo" class="label-form label">Tipo</label>
					<select class="input-form" id="tipo" name="tipo">
						<option value="Individual" <?php if($data["torneo"]["Tipo"] == "Individual") echo "selected"; ?>>Individual</option>
						<option value="Grupal" <?php if($data["torneo"]["Tipo"] == "Grupal") echo "selected"; ?>>Grupal</option>
					</select>
				</div>
				<div class="form-group">
					<label for="estado" class="label-form  label">Estado</label>
					<select class="input-form" id="estado" name="estado">
						<option value="Inicializado" <?php if($data["torneo"]["EstadoTorneo"] == "Inicializado") echo "selected"; ?>>Inicializado</option>
						<option value="Finalizado" <?php if($data["torneo"]["EstadoTorneo"] == "Finalizado") echo "selected"; ?>>Finalizado</option>
					</select>
				</div>

			</div>
</div>
			<div class="container-btn">
            	<button id="guardar" name="guardar" type="submit" class="btn">Guardar
            <span class="bar"></span>

            </button>

        </div>
	
	</form>
	</main>

	</body>
</html>
