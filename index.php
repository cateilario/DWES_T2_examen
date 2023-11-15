<?php
/**
 * GitHub: https://github.com/cateilario/DWES_T2_examen.git
 */

include('Articulo.php');
include('Pizza.php');
include('Bebida.php');

// Inicialización de los artículos
$articulos = [
    new Articulo("Lasagna", 3.50, 7.00, 20),
    new Articulo("Pan de ajo y mozzarella", 2.00, 4.50, 15),
    new Pizza("Pizza Margarita", 4.00, 8.00, 30, ["Tomate", "Mozzarella", "Albahaca"]),
    new Pizza("Pizza Pepperoni", 5.00, 10.00, 25, ["Tomate", "Mozzarella", "Pepperoni"]),
    new Pizza("Pizza Vegetal", 4.50, 9.00, 18, ["Tomate", "Mozzarella", "Verduras Variadas"]),
    new Pizza("Pizza 4 quesos", 5.50, 11.00, 20, ["Mozzarella", "Gorgonzola", "Parmesano", "Fontina"]),
    new Bebida("Refresco", 1.00, 2.00, 50, false),
    new Bebida("Cerveza", 1.50, 3.00, 40, true)
];

// Ejemplo de uso


showMenu($articulos);
showTopSold($articulos);
showTopProfitable($articulos);

function showMenu($articulos) {
    $pizzas = array_filter($articulos, fn($articulo) => $articulo instanceof Pizza);

    $bebidas = array_filter($articulos, fn($articulo) => $articulo instanceof Bebida);

    $otros = array_filter($articulos, fn($articulo) => !($articulo instanceof Pizza) && !($articulo instanceof Bebida));

    echo "<h1>Nuestro menú</h1>";
    echo "<h2>Pizzas</h2>";
    foreach ($pizzas as $pizza) {
        echo $pizza->nombre . "<br>";
    }

    echo "<h2>Bebidas</h2>";
    foreach ($bebidas as $bebida) {
        echo $bebida->nombre . "<br>";
    }

    echo "<h2>Otros</h2>";
    foreach ($otros as $otro) {
        echo $otro->nombre . "<br>";
    }
    echo "<hr>";
}

function showTopSold($articulos) {

    usort($articulos, function($a, $b) {
        return $b->contador - $a->contador;
    });

    echo "<h1>Los más vendidos</h1>";
    $top3 = array_slice($articulos,0,3);
    foreach ($top3 as $articulo) {
        echo $articulo->nombre . " - Vendidos: " . $articulo->contador . "<br>";
    }

    echo "<hr>";
}

function showTopProfitable($articulos) {
    
    // Obtener el beneficio de cada artículo
    foreach ($articulos as $articulo) {
        $articulo->beneficio = ($articulo->precio - $articulo->coste) * $articulo->contador;
    }

    // Ordenarlos según el beneficio
    usort($articulos, function($a, $b) {
        return $b->beneficio - $a->beneficio;
    });

    echo "<h1>Los más lucrativos</h1>";
    $topLucrativos = array_slice($articulos, 0, 3); // Select the top 3 most profitable items
    foreach ($articulos as $articulo) {
        echo $articulo->nombre . " - Beneficio total: " . $articulo->beneficio . "€" . "<br>";
    }
}

//include 'index.view.php';