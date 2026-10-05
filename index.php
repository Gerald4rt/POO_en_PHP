<?php
// Muestra un bloque de código PHP en pantalla (sin ejecutarlo)
function codigo($texto)
{
    echo '<pre><code>' . htmlspecialchars($texto) . '</code></pre>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POO en PHP - Equipo 6</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<header>
    <h1>Programación Orientada a Objetos en PHP</h1>
    <p>Unidad Educativa Fiscomisional María Auxiliadora | Equipo 6</p>
</header>

<nav>
    <a href="index.php" class="activo">Inicio</a>
    <a href="#que-es">¿Qué es la POO?</a>
    <a href="#conceptos">Conceptos</a>
    <a href="#pilares">Pilares</a>
    <a href="ejemplo.php">Ejemplo práctico</a>
    <a href="trivia.php">Trivia</a>
</nav>

<div class="container">

    <figure class="diagrama">
        <img src="img/poo.png" alt="Diagrama de clases: Persona, Estudiante, Profesor y Address">
        <figcaption>Diagrama de clases: Estudiante y Profesor heredan de Persona, y Persona se relaciona con Address.</figcaption>
    </figure>

    <!-- ===================== ¿QUÉ ES LA POO? ===================== -->
    <h2 id="que-es">1. ¿Qué es la POO en PHP?</h2>

    <div class="card">
        <h3>Concepto</h3>
        <p>La Programación Orientada a Objetos (POO) es una forma de programar en la que el código se organiza en <b>objetos</b>, que representan cosas del mundo real (un estudiante, un auto, una cuenta bancaria), en lugar de escribir solo funciones sueltas.</p>
    </div>

    <div class="card">
        <h3>¿Para qué se utiliza?</h3>
        <p>Se utiliza para construir programas ordenados y fáciles de mantener, donde cada objeto guarda sus propios datos y sabe realizar sus propias acciones. Es la base de muchos sistemas web, tiendas en línea y aplicaciones.</p>
    </div>

    <div class="card">
        <h3>Ventajas de trabajar con objetos</h3>
        <ul>
            <li><b>Reutilización:</b> una clase se puede usar muchas veces.</li>
            <li><b>Orden:</b> cada cosa del programa vive en su propia clase.</li>
            <li><b>Mantenimiento:</b> un cambio en una clase se hace en un solo lugar.</li>
            <li><b>Seguridad:</b> los datos se pueden proteger del acceso directo.</li>
        </ul>
    </div>

    <!-- ===================== CONCEPTOS ===================== -->
    <h2 id="conceptos">2. Conceptos fundamentales</h2>

    <div class="card" id="clase">
        <h3>Clase</h3>
        <p><b>¿Qué es?</b> Es la plantilla o molde que describe cómo será un tipo de objeto.</p>
        <p><b>¿Para qué sirve?</b> Para definir una sola vez las características y acciones, y luego crear tantos objetos como se necesiten. En PHP se escribe con la palabra <code class="inline">class</code>.</p>
        <?php codigo(<<<'CODIGO'
<?php
class Auto
{
    // aquí van los atributos y los métodos
}
CODIGO
); ?>
    </div>

    <div class="card" id="objeto">
        <h3>Objeto</h3>
        <p><b>¿Qué es?</b> Es un elemento concreto creado a partir de una clase (una instancia). Se crea con la palabra <code class="inline">new</code>.</p>
        <p><b>Relación clase - objeto:</b> la clase es el molde y el objeto es lo que sale del molde. De una misma clase pueden salir muchos objetos, cada uno con sus propios datos.</p>
        <?php codigo(<<<'CODIGO'
<?php
$miAuto   = new Auto();   // objeto 1
$otroAuto = new Auto();   // objeto 2, independiente del anterior
CODIGO
); ?>
    </div>

    <div class="card" id="atributos">
        <h3>Atributos</h3>
        <p><b>¿Qué son?</b> Son las variables que se declaran dentro de una clase.</p>
        <p><b>¿Qué información almacenan?</b> Las características del objeto: por ejemplo, la marca, el color o la velocidad de un auto. Se leen con la flecha <code class="inline">-&gt;</code>.</p>
        <?php codigo(<<<'CODIGO'
<?php
class Auto
{
    public $marca;            // guarda un texto
    public $color;            // guarda un texto
    public $velocidad = 0;    // guarda un número
}

$miAuto = new Auto();
$miAuto->marca = "Toyota";
echo $miAuto->marca;          // Toyota
CODIGO
); ?>
    </div>

    <div class="card" id="metodos">
        <h3>Métodos</h3>
        <p><b>¿Qué son?</b> Son las funciones que se escriben dentro de una clase.</p>
        <p><b>¿Qué acciones puede realizar un objeto?</b> Todas las que programemos: acelerar, frenar, depositar dinero, calcular un promedio, etc.</p>
        <?php codigo(<<<'CODIGO'
<?php
class Auto
{
    public $velocidad = 0;

    public function acelerar()
    {
        $this->velocidad += 10;
    }

    public function frenar()
    {
        $this->velocidad = 0;
    }
}

$miAuto = new Auto();
$miAuto->acelerar();
echo $miAuto->velocidad;      // 10
CODIGO
); ?>
    </div>

    <div class="card" id="constructor">
        <h3>Constructor (__construct)</h3>
        <p><b>¿Qué es?</b> Es un método especial llamado <code class="inline">__construct()</code>.</p>
        <p><b>¿Para qué sirve?</b> Para darle valores iniciales al objeto en el momento en que se crea.</p>
        <p><b>¿Cuándo se ejecuta?</b> Automáticamente, justo cuando se escribe <code class="inline">new</code>. No hace falta llamarlo.</p>
        <?php codigo(<<<'CODIGO'
<?php
class Auto
{
    public $marca;
    public $color;

    public function __construct($marca, $color)
    {
        $this->marca = $marca;
        $this->color = $color;
    }
}

// El constructor se ejecuta aquí, al crear el objeto:
$miAuto = new Auto("Toyota", "Rojo");
CODIGO
); ?>
    </div>

    <div class="card" id="this">
        <h3>Uso de $this</h3>
        <p>La variable <code class="inline">$this</code> representa al objeto actual, es decir, "este mismo objeto". Se usa dentro de la clase para acceder a sus propios atributos y métodos.</p>
        <?php codigo(<<<'CODIGO'
<?php
class Auto
{
    private $marca;

    public function __construct($marca)
    {
        // $this->marca es el atributo; $marca es el dato recibido
        $this->marca = $marca;
    }

    public function describir()
    {
        return "Este auto es un " . $this->marca;
    }
}
CODIGO
); ?>
    </div>

    <!-- ===================== PILARES ===================== -->
    <h2 id="pilares">3. Los cuatro pilares de la POO</h2>

    <div class="card" id="encapsulamiento">
        <h3>1. Encapsulamiento</h3>
        <p>Consiste en proteger los datos de un objeto para que no se cambien de cualquier forma. Se logra con la visibilidad: <code class="inline">public</code>, <code class="inline">private</code> y <code class="inline">protected</code>. Los datos privados solo se modifican con métodos de la clase.</p>
        <?php codigo(<<<'CODIGO'
<?php
class CuentaBancaria
{
    private $saldo = 0;

    public function depositar($monto)
    {
        if ($monto > 0) {
            $this->saldo += $monto;
        }
    }

    public function getSaldo()
    {
        return $this->saldo;
    }
}

$cuenta = new CuentaBancaria();
$cuenta->depositar(50);
echo $cuenta->getSaldo();     // 50
// echo $cuenta->saldo;       // ERROR: saldo es privado
CODIGO
); ?>
    </div>

    <div class="card" id="herencia">
        <h3>2. Herencia</h3>
        <p>Permite que una clase hija reciba los atributos y métodos de una clase padre, y así no se repite código. En PHP se usa <code class="inline">extends</code>.</p>
        <?php codigo(<<<'CODIGO'
<?php
class Persona
{
    public $nombre;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    public function saludar()
    {
        return "Hola, soy " . $this->nombre;
    }
}

class Estudiante extends Persona
{
    public $curso;
}

$e = new Estudiante("Ana");
echo $e->saludar();           // Hola, soy Ana (método heredado)
CODIGO
); ?>
    </div>

    <div class="card" id="polimorfismo">
        <h3>3. Polimorfismo</h3>
        <p>Significa "muchas formas": clases distintas pueden tener un método con el mismo nombre, pero cada una lo realiza a su manera.</p>
        <?php codigo(<<<'CODIGO'
<?php
class Animal
{
    public function hacerSonido()
    {
        return "...";
    }
}

class Perro extends Animal
{
    public function hacerSonido()
    {
        return "Guau";
    }
}

class Gato extends Animal
{
    public function hacerSonido()
    {
        return "Miau";
    }
}

$animales = [new Perro(), new Gato()];
foreach ($animales as $animal) {
    echo $animal->hacerSonido();   // Guau, luego Miau
}
CODIGO
); ?>
    </div>

    <div class="card" id="abstraccion">
        <h3>4. Abstracción</h3>
        <p>Consiste en mostrar solo lo esencial y ocultar los detalles internos. Con una clase <code class="inline">abstract</code> se define qué debe hacer una clase, y cada clase hija decide cómo hacerlo.</p>
        <?php codigo(<<<'CODIGO'
<?php
abstract class Figura
{
    // solo se declara; las clases hijas la implementan
    abstract public function area();
}

class Cuadrado extends Figura
{
    private $lado;

    public function __construct($lado)
    {
        $this->lado = $lado;
    }

    public function area()
    {
        return $this->lado * $this->lado;
    }
}

$c = new Cuadrado(4);
echo $c->area();              // 16
CODIGO
); ?>
    </div>

    <div class="resultado aviso">
        <p>¿Quieres verlo funcionando? Ve al <a href="ejemplo.php">Ejemplo práctico</a> o pon a prueba lo aprendido en la <a href="trivia.php">Trivia</a>.</p>
    </div>

</div>

<footer>Unidad Educativa Fiscomisional María Auxiliadora | Equipo 6 | POO en PHP</footer>

</body>
</html>
