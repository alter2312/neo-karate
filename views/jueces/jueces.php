<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUK | Jueces</title>
    <!-- <link rel="shortcut icon" href="../../assets/img/Logotype.svg" type="image/x-icon"> -->
    <link rel="stylesheet" href="../../assets/css/jueces.css">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <script src="https://kit.fontawesome.com/cea33d77ef.js" crossorigin="anonymous"></script>
    <style media="all" id="fa-v4-font-face"></style>
    <link href="/dist/output.css" rel="stylesheet">

</head>

<body class="bg-gray-800">


        <main class="">
            <form action="../../index.php?c=jueces&a=enviarPuntaje" method="POST" class="">
                <div class="">
                    <input type="number" id="puntaje-input" name="puntaje" step="0.1" placeholder="5.0" max="10.0" min="5.0" class="">

                    <div class="custom-button restar " onclick="decrementNumber()"><i class="fa-solid fa-minus"></i></div>
                    <div class="custom-button sumar " onclick="incrementNumber()"><i class="fa-solid fa-plus"></i></div>
                </div>

                <div class="">
                    <input type="submit" value="Enviar" class="">
                    <input type="reset" value="Borrar" class="">
                </div>
              
            </form> 
            <div class="container-info_competidor">
            <?php 
            // foreach($data["competidor"] as $value){
            // 	echo $dato["CI"];
            //     echo $dato["nombre"];
            //     echo $dato["apellido"];
            //     echo $dato["fecha_nac"];
            //     echo $dato["genero"];
            // }
            ?>
            </div>
           
        </main>

    </div>


    <script src="../../assets/js/jueces.js"></script>
</body>

</html>