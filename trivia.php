<?php
// Banco de preguntas. Las respuestas correctas se guardan aquí, en el servidor,
// para que no se puedan ver desde el código HTML de la página.
$preguntas = [
    'p1' => [
        'texto'    => '¿Qué es una clase en POO?',
        'opciones' => [
            'a' => 'Una variable global.',
            'b' => 'El molde o plantilla para crear objetos.',
            'c' => 'Una función del sistema.',
        ],
        'correcta' => 'b',
        'explica'  => 'La clase define cómo serán los objetos; el objeto es la copia concreta creada con "new".',
    ],
    'p2' => [
        'texto'    => '¿Qué método se ejecuta automáticamente al crear un objeto?',
        'opciones' => [
            'a' => '__construct()',
            'b' => '$this',
            'c' => 'get_class()',
        ],
        'correcta' => 'a',
        'explica'  => '__construct() es el constructor: se ejecuta solo, en el momento de usar "new".',
    ],
    'p3' => [
        'texto'    => 'Verdadero o falso: $this hace referencia al objeto actual dentro de la clase.',
        'opciones' => [
            'a' => 'Verdadero',
            'b' => 'Falso',
        ],
        'correcta' => 'a',
        'explica'  => 'Con $this un objeto accede a sus propios atributos y métodos.',
    ],
    'p4' => [
        'texto'    => 'En el código  $auto = new Vehiculo("Rojo");  ¿qué es $auto?',
        'opciones' => [
            'a' => 'Una clase',
            'b' => 'Un objeto',
            'c' => 'Un método',
        ],
        'correcta' => 'b',
        'explica'  => '$auto guarda un objeto: una instancia de la clase Vehiculo.',
    ],
    'p5' => [
        'texto'    => '¿Qué pilar de la POO protege los datos usando private o protected?',
        'opciones' => [
            'a' => 'Herencia',
            'b' => 'Polimorfismo',
            'c' => 'Encapsulamiento',
            'd' => 'Abstracción',
        ],
        'correcta' => 'c',
        'explica'  => 'El encapsulamiento restringe el acceso directo a los atributos.',
    ],
];

$enviado    = ($_SERVER['REQUEST_METHOD'] === 'POST');
$respuestas = $enviado ? $_POST : [];
$puntos     = 0;
$valor      = 10 / count($preguntas);   // cada pregunta vale lo mismo (2 puntos)
$sinResponder = [];

if ($enviado) {
    foreach ($preguntas as $id => $p) {
        $marcada = $respuestas[$id] ?? '';
        if ($marcada === '') {
            $sinResponder[] = $id;
        } elseif ($marcada === $p['correcta']) {
            $puntos += $valor;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trivia Interactiva POO</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<header>
    <h1>Trivia Interactiva de POO</h1>
    <p>Pon a prueba tus conocimientos</p>
</header>

<nav>
    <a href="index.php">Inicio</a>
    <a href="index.php#que-es">¿Qué es la POO?</a>
    <a href="index.php#conceptos">Conceptos</a>
    <a href="index.php#pilares">Pilares</a>
    <a href="ejemplo.php">Ejemplo práctico</a>
    <a href="trivia.php" class="activo">Trivia</a>
</nav>

<div class="container">
    <h2>Responde a las siguientes preguntas</h2>

    <?php if ($enviado): ?>
        <div class="resultado <?= $puntos >= 7 ? '' : 'aviso' ?>">
            <h3>Resultado de la Trivia:</h3>
            <p>Tu puntuación es: <b><?= round($puntos, 1) ?> / 10 puntos</b>.</p>
            <?php if (count($sinResponder) > 0): ?>
                <p>Dejaste <?= count($sinResponder) ?> pregunta(s) sin responder.</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <form action="trivia.php" method="POST">
        <?php $n = 1; foreach ($preguntas as $id => $p): ?>
            <?php $marcada = $respuestas[$id] ?? ''; ?>
            <div class="card pregunta">
                <p><b><?= $n ?>. <?= htmlspecialchars($p['texto']) ?></b></p>

                <?php foreach ($p['opciones'] as $clave => $texto): ?>
                    <label class="opcion">
                        <input type="radio" name="<?= $id ?>" value="<?= $clave ?>"
                               <?= $marcada === $clave ? 'checked' : '' ?>>
                        <?= htmlspecialchars($texto) ?>
                    </label>
                <?php endforeach; ?>

                <?php if ($enviado): ?>
                    <?php if ($marcada === $p['correcta']): ?>
                        <p class="acierto">✔ Correcto. <?= htmlspecialchars($p['explica']) ?></p>
                    <?php elseif ($marcada === ''): ?>
                        <p class="fallo">Sin responder. Respuesta correcta: <?= htmlspecialchars($p['opciones'][$p['correcta']]) ?></p>
                    <?php else: ?>
                        <p class="fallo">✘ Incorrecto. Respuesta correcta: <?= htmlspecialchars($p['opciones'][$p['correcta']]) ?></p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php $n++; endforeach; ?>

        <button type="submit">Enviar Cuestionario</button>
    </form>
</div>

<footer>Unidad Educativa Fiscomisional María Auxiliadora | Equipo 6 | POO en PHP</footer>

</body>
</html>
