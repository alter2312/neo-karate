<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Katas</title>
    <link rel="stylesheet" href="../../assets/css/formularios.css">
    <link rel="stylesheet" href="../../assets/css/responiveFormularios.css">
    <script src="assets/js/bootstrap.min.js" ></script>
</head>
<body>
    <div class="container">
        <h1>Ka<span>tas<span></h1>
        <form class="form-small" id="modificar" name="modificar" method="POST" action="index.php?c=katas&a=actualizar" autocomplete="off">
            <input type="hidden" name="NumKata" value="<?php echo $data["katas"]["NumKata"];?>">

            <div class="form-group">
                <input type="text" class="input-form input-dojo" pattern="[A-Za-zÁ-ú\s]{1,30}" maxlength="20" required name="nombre" id="nombre" value="<?php echo $data["katas"]["Nombre"]; ?>" />    
                <label for="nombre" class="label-form">Nombre</label>
            </div>
            <button id="guardar" name="guardar" type="submit" class="btn">Guardar
            <span class="bar"></span>

            </button>
        </form>
    </div>
</body>
</html>