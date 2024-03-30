<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <title>Llaves</title>
</head>
<body>
<header class="header">
            <nav>   
			    <bottom class="toggle">
        		    <i class="fa-solid fa-bars"></i>
      		    </bottom>   
                <ul class="nav_menu">
                    <li><a href="../../index.php?c=llaves&a=index">Volver</a></li>
                    <li>
                    <?php 
   
   echo"<a href='../../index.php?c=llaves&a=ViewsEmpezarRondas&id=". $data['categoria'] ."' class='btn btn-primary'>Empezar Ronda</a></li>";                    ?>
                    </ul>
            </nav>
            <figure class="container_logo">
		    	<a href="../../index.php?c=juez&a=index">
                    <img src="../../assets/img/logo.svg" class="logo"alt="Logo de la aplicacion web de Testing Dummmies">
                </a>	    
		</figure> 
</header>
<main class="container">
    <div class="table table1">
<h2>Llave Aka</h2>
    <table>
        <thead>
            <tr>
                <th class="red-text">Nombre del Competidor</th>
                <!-- Agrega aquí más columnas si es necesario -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data["grupo1"] as $posicion => $competidor) : ?>
                <tr>
                    <td class="red-text"><?php echo $competidor["Nombre"]; ?></td>
                    <!-- Agrega aquí más celdas si es necesario -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <div class="table table2">
    <?php if (!empty($data["grupo2"])): ?>
        <h2>Llave Ao</h2>
        
        <table>
            <thead>
                <tr>
                    <th class="blue-text">Nombre del Competidor</th>
                    <!-- Agrega aquí más columnas si es necesario -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["grupo2"] as $posicion => $competidor) : ?>
                    <tr>
                        <td class="blue-text"><?php echo $competidor["Nombre"]; ?></td>
                        <!-- Agrega aquí más celdas si es necesario -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    </div>
    </main>
</body>

</html>
