<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Crear Llave</title>
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="../../assets/css/normalize.css">
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

<body>
    <main class="container">
        <h1><?php echo $data["title"] ?></h1>
        <div class="categoria">
            <?php
            foreach ($cantidad as $categoria) {
                echo "<div class=''cant_competidores'>Cantidad de competidores en la categoría " . $categoria['Categoria'] . "<br> " . $categoria['cantidad'] . "<br>" . "</div>";
                echo "<a href='index.php?c=llaves&a=mostrarEquipos&id=". $categoria["Categoria"]."'>ver llave</a>";
            }

            ?>
        </div>
        <div class="formulario">
            <h2>Crear llave</h2>
            <form method="post" action="index.php?c=llaves&a=crearLlave">
                <input type="text" name="categoria">
                <label for="categoria">Categoría</label>
                <input type="submit" value="Crear Llave">
            </form>
        </div>
    </main>
    <script src="../../assets/js/menu.js"></script>

</body>

</html>
