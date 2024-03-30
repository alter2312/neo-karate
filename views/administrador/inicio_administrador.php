


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/inicio-administrador.css">
    <link rel="stylesheet" href="../../assets/css/responsiveInicioAdmin.css">
    <script src="https://kit.fontawesome.com/cea33d77ef.js" crossorigin="anonymous"></script>

    <title>Landing Page - Neo Karate</title>
</head>

<body>

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

    <main class="container">

        <!-- Section 1: Introduction -->
        <section class="presentacion">
            <div class="fondo"><img src="assets/img/imagen_pantalla_admin/img5.jpg" alt=""></div>

            <h1 class="title">Neo <span>Karate</span></h1>
            <h3 class="nombre_user"><?php echo $_SESSION["nombre"]?></span></h3>
            <a class="LinkJuez btn-torneo" href="../../index.php?c=juez&a=index">Crear Torneo</a>
            <a href="#session1" class="btn-arrow"><img src="../../assets/img/arrow-down.png" alt=""></a>

        </section>

        <!-- Section 2: About Neo Karate -->
        <section id="session1" class="about-section">
            <div class="container-text">
                <h2 class="nombre-app">NEO <span>KARATE</span></h2>
                <p class="parrafo">Bienvenido a Neo Karate, la aplicación web diseñada para mejorar la creación de torneos de Kata. Simplificamos el proceso para que sea rápido y eficiente.</p>
            </div>
         
                <div class="container-img">
                    <img src="../../assets/img/imagen_pantalla_admin/img1.jpg" alt="">
                </div>
        
        </section>

        <!-- Section 3: Juez Section -->
        <section id="session2" class="juez-section">
            <div class="slider2">
                <div class="container-img container-img2">
                <img src="../../assets/img/imagen_pantalla_admin/img6.jpg" alt="">

                </div>
            </div>
            <div class="container-text">
                <h2>Bienvenido <span><?php echo $_SESSION["nombre"]?></span></h2>
                <p class="parrafo">Administrador, aquí podrás crear torneos, llaves, y rondas.
                Además podrás gestionar la pantalla de espectadores, registrar Coach de sus respectivos Dojos, y a su vez registrar estos mismos Dojos.</p>

            </div>
        </section>

    </main>

    <script src="../../assets/js/menu.js"></script>

</body>

</html>