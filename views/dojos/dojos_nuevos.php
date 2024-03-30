<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Dojos</title>
		<link rel="stylesheet" href="../../assets/css/formularios.css">
    <link rel="stylesheet" href="../../assets/css/responiveFormularios.css">
			<script src="assets/js/bootstrap.min.js" ></script>
	</head>
	
	<body>
		<div class="container">
			
			<h1>Do<span>jo</span></h1>
			<form class="form-small" id="nuevo" name="nuevo" method="POST" action="index.php?c=dojo&a=guarda" autocomplete="off">

            <div class="form-group">
			<input type="text" class="input-form" pattern="[A-Za-zÁ-ú0-9\s]{1,30}"  maxlength="20" required  name="nombre" id="nombre" />	
						<label for="nombre" class="label-form">Dojo</label>
				</div>
                <div class="form-group">
				<input type="text" class="input-form input-dojo" pattern="[A-Za-zÁ-ú\s]{1,30}" maxlength="20" required name="escuela" id="escuela" />    
				<label for="escuela" class="label-form">Escuela</label>
				</div>
                
				<button id="guardar" name="guardar" type="submit" class="btn">Guardar
            <span class="bar"></span>

            </button>				
			</form>
		</div>
	</body>
</html>