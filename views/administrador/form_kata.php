<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <h1>Empezar rondas</h1>
    <form action="index.php?c=llaves&a=iniciarRonda" method="post">
        <div class="formgroup">
        <input type="text" name="CIParticipante">
        <label for="">CI del participante</label>
        </div>
        <div class="formgroup">
            <input type="text" name="num_kata">
        <label for="">Numero del kata</label>
        </div>
        <div class="formgroup">
            <input type="text" name="nombre_kata">
        <label for="">Nombre Kata</label>
        </div>
        <input type="submit" value="Inicializar Ronda">
        <a  href="">  </a>
    </form>
</body>
</html>