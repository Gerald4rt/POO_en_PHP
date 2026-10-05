<?php
// La clase vive en su propio archivo (organización del proyecto)
require_once __DIR__ . '/clases/Estudiante.php';

include ("GUARDAR_DATOS/Guardar_ejemplo.php");

$resultado = null;   // objeto Estudiante (si el formulario es válido)
$error     = '';     // mensaje si los datos no son válidos

// Procesamiento del formulario enviado por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ESTU_NOMB = trim($_POST['ESTU_NOMB'] ?? '');
    $ESTU_NOTA   = $_POST['ESTU_NOTA'] ?? '';

    if ($ESTU_NOMB === '') {
        $error = 'Debes escribir el nombre del estudiante.';
    } elseif (!is_numeric($ESTU_NOTA) || $ESTU_NOTA < 0 || $ESTU_NOTA > 10) {
        $error = 'La calificación debe ser un número entre 0 y 10.';
    } else {
        // Instanciación: aquí se crea el OBJETO a partir de la clase
        $resultado = new Estudiante($ESTU_NOMB, (float) $ESTU_NOTA);
    }
}

$codigoClase = file_get_contents(__DIR__ . '/clases/Estudiante.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejemplo Práctico - POO PHP</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<header>
    <h1>Sistema de Control de Estudiantes</h1>
    <p>Demostración práctica de clase, atributos, métodos, constructor y objetos</p>
</header>

<nav>
    <a href="index.php">Inicio</a>
    <a href="index.php#que-es">¿Qué es la POO?</a>
    <a href="index.php#conceptos">Conceptos</a>
    <a href="index.php#pilares">Pilares</a>
    <a href="ejemplo.php" class="activo">Ejemplo práctico</a>
    <a href="trivia.php">Trivia</a>
</nav>

<div class="container">
    <h2>Registro de Estudiante</h2>
    <p>Escribe los datos y presiona el botón. PHP crea un <b>objeto</b> de la clase
       <code class="inline">Estudiante</code> y usa su método <code class="inline">ESTU_ESTA()</code>.</p>

    <form action="ejemplo.php" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre del Estudiante:</label>
            <input type="text" id="nombre" name="ESTU_NOMB" required
                   value="<?= htmlspecialchars($_POST['ESTU_NOMB'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label for="nota">Calificación (0 - 10):</label>
            <input type="number" step="0.1" id="nota" name="ESTU_NOTA" min="0" max="10" required
                   value="<?= htmlspecialchars($_POST['ESTU_NOTA'] ?? '') ?>">
        </div>

        <button type="submit">Procesar Datos</button>
    </form>

    <?php if ($error !== ''): ?>
        <div class="resultado error">
            <p><?= htmlspecialchars($error) ?></p>
        </div>
    <?php elseif ($resultado !== null): ?>
        <div class="resultado">
            <h3>Resultado Procesado:</h3>
            <p><b>Estudiante:</b> <?= htmlspecialchars($resultado->getESTU_NOMB()) ?></p>
            <p><b>Calificación:</b> <?= $resultado->getESTU_NOTA() ?></p>
            <p><b>Estado:</b> <?= $resultado->ESTU_ESTA() ?></p>
        </div>
    <?php endif; ?>

    <h2>Código de la clase</h2>
    <p>Este es el archivo <code class="inline">clases/Estudiante.php</code> que usa el formulario:</p>
    <pre><code><?= htmlspecialchars($codigoClase) ?></code></pre>

    <h2>¿Cómo se relaciona con la teoría?</h2>
    <div class="card">
        <p><b>Clase:</b> <code class="inline">Estudiante</code> &nbsp;|&nbsp;
           <b>Atributos:</b> <code class="inline">$ESTU_NOMB</code>, <code class="inline">$ESTU_NOTA</code> &nbsp;|&nbsp;
           <b>Constructor:</b> <code class="inline">__construct()</code></p>
        <p><b>Métodos:</b> <code class="inline">getESTU_NOMB()</code>, <code class="inline">getESTU_NOTA()</code>,
           <code class="inline">ESTU_ESTA()</code> &nbsp;|&nbsp;
           <b>Objeto:</b> <code class="inline">$resultado = new Estudiante(...)</code></p>
    </div>
</div>

<footer>Unidad Educativa Fiscomisional María Auxiliadora | Equipo 6 | POO en PHP</footer>

</body>
</html>
