
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?php echo $data["titulo"]; ?></title>
		<link rel="stylesheet" href="../../assets/css/formularios.css">
		<link rel="stylesheet" href="../../assets/css/responiveFormularios.css">

	</head>
	
	<body>
		<div class="container">
			
		<h1>Usu<span>arios</span></h1>

			<form class="form-small" id="nuevo" class="form-dojo" name="nuevo" method="POST" action="../../index.php?c=usuarios&a=actualizar&id='<?php echo $data["idUsuario"];?>'" autocomplete="off">
				
				<input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $data['usuarios']["IDUsuario"]; ?>" />
				<div class="form-group">
						<label for="nombre" class="label-form label">User</label>
						<select name="nombre" class="input-form" id="nombre" required value="<?php echo $data["usuarios"]["nombre"]?>" >
						
							<option value=""></option>
							<option value="Juez1" <?php if($data["usuarios"]["Nombre"] == "Juez1") echo "selected"; ?>>Juez1 </option>
							
							<option value="Juez2" <?php if($data["usuarios"]["Nombre"] == "Juez2") echo "selected"; ?>>Juez2</option>
							<option value="Juez3" <?php if($data["usuarios"]["Nombre"] == "Juez3") echo "selected"; ?>>Juez3</option>
							<option value="Juez4" <?php if($data["usuarios"]["Nombre"] == "Juez4") echo "selected"; ?>>Juez4</option>
							<option value="Juez5" <?php if($data["usuarios"]["Nombre"] == "Juez5") echo "selected"; ?>>Juez5</option>
							<option value="Juez6" <?php if($data["usuarios"]["Nombre"] == "Juez6") echo "selected"; ?>>Juez6</option>
							<option value="Juez7" <?php if($data["usuarios"]["Nombre"] == "Juez7") echo "selected"; ?>>Juez7</option>
							<option value="Administrador" <?php if($data["usuarios"]["Nombre"] == "Administrador") echo "selected"; ?>>Administrador</option>
							<option value="AdministradorBDKarate" <?php if($data["usuarios"]["Nombre"] == "AdministradorBDKarate") echo "selected"; ?>>Administrador de usuario</option>
						</select>
				</div>

				<div class="form-group">
					<input type="password" class="input-form" id="contraseña" name="contraseña" pattern="[A-Za-z0-9]*[A-Z]+[A-Za-z0-9]*[A-Za-z0-9]{7,}" title="la contraseña debe de tener 8 minimo caracteres y al menos una mayuscula" required value="<?php echo $data["usuarios"]["Contraseña"]?>" />
					<label for="contraseña" class="label-form ">Contraseña</label>

				</div>

				<div class="form-group">

						<label for="grupo" class="label-form label">Grupo</label>
						<select name="grupoUsuario" class="input-form" id="grupoUsuario" required value="<?php echo $data["usuarios"]["GrupoUsuario"]?>">ç
						
							<option value=""></option>
							<option value="Juez" <?php if($data["usuarios"]["GrupoUsuario"] == "Juez") echo "selected"; ?>>Juez</option>
							<option value="Administrador" <?php if($data["usuarios"]["GrupoUsuario"] == "Administrador") echo "selected"; ?>>Administrador</option>
							<option value="AdministradorBDKarate" <?php if($data["usuarios"]["GrupoUsuario"] == "AdministradorBDKarate") echo "selected"; ?>>Administrador de usuario</option>
						</select>
				</div>
			
				<button name="btn-ingresar" type="submit" class="btn btn-login">
              Guardar
            <span class="bar"></span>

            </button>
				
			</form>
		</body>
	</html>		