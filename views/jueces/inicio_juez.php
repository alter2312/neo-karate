
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../assets/css/inicio-juez.css">
        <link rel="stylesheet" href="../../assets/css/responisveInicioJuez.css">
        <script src="https://kit.fontawesome.com/cea33d77ef.js" crossorigin="anonymous"></script>

        <title>Jueces</title>
    </head> 
    <body>  
        <header class="header">
            <nav>   
			    <bottom class="toggle">
        		    <i class="fa-solid fa-bars"></i>
      		    </bottom>   
                <ul class="nav_menu">
                    <li> <a href="../../index.php?c=usuarios&a=index" class="btn btn-primary">Puntuar</a></li>
                    <a href="../../index.php?c=usuarios&a=cerrarsession">salir</a>

    
                </ul>
            </nav>
            <figure class="container_logo">
		    	<a href="../../index.php?c=juez&a=index">
                    <img src="../../assets/img/logo.svg" class="logo"alt="Logo de la aplicacion web de Testing Dummmies">
                </a>	    
		</figure> 
</header>  
        <main class="container">
        <section class="presentacion">
        <div class="fondo"></div>

            <h1 class="title">Neo <span>Karate</span></h1>
            <h3 class="nombre_user"><?php echo $_SESSION["nombre"]?></h3>
            <a class="LinkJuez puntuar" href="../../index.php?c=juez&a=index">Puntar</a>
         <a href="#session1" class="btn-arrow"><img src="../../assets/img/arrow-down.png" alt=""></a>

        </section>
        <section id="session1">
            <div class="container-text">
                <h2 class="nombre-app">NEO <span> KARATE</span></h2>
                <p class="parrafo">Esta aplicación web fue creada para mejorar el estilo actual de la creación de torneo de Kata.
Para pasar de la forma tradicional, poco eficaz, a una simple y  rápida.
 </p>
 
            </div>
                <div class="slider">
                    <div class="container-img">
                        <img src="../../assets/img/imagenes_pantalla_juez/img4.jpg" alt="" class="item">
                        <img src="../../assets/img/imagenes_pantalla_juez/img2.jpg" alt="" class="item">
                        <img src="../../assets/img/imagenes_pantalla_juez/img3.jpg" alt="" class="item">
                        <img src="../../assets/img/imagenes_pantalla_juez/img1.jpg" alt="" class="item">
     
                    </div>
                </div>
        </section>  
        <section id="session2">    
            <div class="slider">
                    <div class="container-img container-img2">
                        <img src="../../assets/img/imagenes_pantalla_juez/img5.jpg" alt="" class="item">
                        <img src="../../assets/img/imagenes_pantalla_juez/img7.jpg" alt="" class="item">
                        <img src="../../assets/img/imagenes_pantalla_juez/img6.jpg" alt="" class="item">
                        <img src="../../assets/img/imagenes_pantalla_juez/img8.jpg" alt="" class="item">
                    </div>
            </div>
            <div class="container-text">
                <h2>Bienvenido  <a href="../../index.php?c=juez&a=index" ><span><?php echo $_SESSION["nombre"]?></span></a> </h2>
                <p>En este apartado de la aplicación web "Neo Karate" podrás Descalificar, Calificar e Sancionar a los competidores que participan en el torneo.</p>
                <p>Y si tienes algún problema la aplicación web cuenta con una opción para pedir ayuda a tu/s administrador/es.</p>
            </div>
        </section>
        </main>
    </body>
</html>