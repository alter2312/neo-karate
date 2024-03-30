<?php
	
?>

<!DOCTYPE html>
<html>
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
        <form id="modificar" name="modificar"class="form-small" method="POST" action="index.php?c=dojo&a=actualizar&id='<?php echo $data['dojos']["IDDojo"];?>">
            <input type="hidden" name="idDojo" value="<?php echo $data['dojos']["IDDojo"]; ?>" />

            <div class="form-group">
                <input type="text" class="input-form"   maxlength="20" name="nombre" value="<?php echo $data["dojos"]["NombreDojo"]; ?>" />
                <label for="nombre" class="label-form">Dojo</label>
            </div>
            <div class="form-group">
                <input type="text" class="input-form" name="escuela" maxlength="20" name="escuela"  value="<?php echo $data["dojos"]["Escuela"]; ?>" />
                <label for="escuela" class="label-form">Escuela</label>
            </div>

            <button id="guardar" name="guardar" type="submit" class="btn">
                Guardar
                <span class="bar"></span>
            </button>
         </form>
    </div>
</body>
</html>
