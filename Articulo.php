<?php

// CLASE BASE
class Articulo {

    public function __construct(
        public $nombre, 
        public $coste, 
        public $precio,
        public $contador)
        {}
    
}