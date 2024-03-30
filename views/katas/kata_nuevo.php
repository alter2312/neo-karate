<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $data["titulo"]; ?></title>
    <link rel="stylesheet" href="../../assets/css/formularios.css">
    <link rel="stylesheet" href="../../assets/css/responiveFormularios.css">

</head>
<body>
    <div class="container">
        <h1>Ka<span>tas</span></h1>
        <form class="form-small" id="nuevo" name="nuevo" method="POST" action="index.php?c=Katas&a=guarda" autocomplete="off">
            <div class="form-group">
                <input type="text" class="input-form" maxlength=1 required  name="NumKata" id="NumKata" />    
                <label for="NumKata" class="label-form">NumKata</label>
            </div>
            <div class="form-group">
                <input type="text" class="input-form" pattern="[A-Za-zÁ-ú\s]{1,30}" required name="nombre" id="nombre" />    
                <label for="nombre" class="label-form">Nombre</label>
            </div>
            <button id="guardar" name="guardar" type="submit" class="btn">Guardar
            <span class="bar"></span>

            </button> 
         </form>
    </div>
</body>
</html>