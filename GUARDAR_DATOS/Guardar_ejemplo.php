<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GUARDAR ESTUDIANTE</title>
</head>
<body>

    <?php

    include(__DIR__ . '/../CONEXION/Conexion.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ESTU_NOMB = $_POST['ESTU_NOMB'];
    $ESTU_NOTA = $_POST['ESTU_NOTA'];

    $DATOS = "INSERT INTO `estudiante`(`ESTU_NOMB`, `ESTU_NOTA`) 
    VALUES ('$ESTU_NOMB','$ESTU_NOTA')";

    $REGISTRO = mysqli_query($CONEXION, $DATOS);

    if ($REGISTRO) {
        echo "";
    } else {
        echo "Hubo un error al intentar enviar los datos".mysqli_error($CONEXION);
    }

    mysqli_close($CONEXION);

    }

    ?>

</body>
</html>