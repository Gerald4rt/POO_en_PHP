<?php
// Clase: molde que describe a cualquier estudiante del sistema
class Estudiante
{
    // Atributos (privados: solo se leen mediante métodos)
    private $ESTU_NOMB;
    private $ESTU_NOTA;

    // Constructor: se ejecuta automáticamente con "new Estudiante(...)"
    public function __construct($ESTU_NOMB, $ESTU_NOTA)
    {
        $this->ESTU_NOMB = $ESTU_NOMB;
        $this->ESTU_NOTA   = $ESTU_NOTA;
    }

    // Métodos "getter": permiten leer los atributos privados
    public function getESTU_NOMB()
    {
        return $this->ESTU_NOMB;
    }

    public function getESTU_NOTA()
    {
        return $this->ESTU_NOTA;
    }

    // Método con una acción: decide la condición del estudiante
    public function ESTU_ESTA()
    {
        if ($this->ESTU_NOTA >= 7) {
            return "Aprobado";
        }
        return "En estado Remedial";
    }
}
