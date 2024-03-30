<!DOCTYPE html>
<html>
<head>
    <title>Lista de Equipos</title>
    <style>
        .red-text {
            color: red;
        }
        .blue-text {
            color: blue;
        }
    </style>
</head>
<body>
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

    <?php var_dump($data["grupo2"]);if (!empty($data["grupo2"])): ?>
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
</body>
</html>
