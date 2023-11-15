<?php
// CLASE DERIVADA PIZZA
class Pizza extends Articulo {
    private $ingredientes;

    public function __construct($nombre, $coste, $precio, $contador, $ingredientes)
    {
        parent::__construct($nombre, $coste, $precio, $contador);
        $this->ingredientes = $ingredientes;
    }

}