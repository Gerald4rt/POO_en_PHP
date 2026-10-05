<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONEXION A LA BDD EJEMPLO</title>
</head>
<body>

    <?php

    $Servidor = "Localhost";
    $Usuario = "root";
    $Contraseña = "";
    $BDD = "EJEMPLO";

    $CONEXION = mysqli_connect($Servidor, $Usuario, $Contraseña, $BDD);

    if (!$CONEXION) {
        die ("Error de conexion: " . mysqli_connect_error());
    }

    ?>

</body>
</html>