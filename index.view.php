<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Nuestro menú</h1>

    <h2>Pizzas</h2>
    <ul>
        <?php foreach ($pizzas as $pizza) : ?>
            <li> <?= $pizza->nombre ?> </li> 
        <?php endforeach ?>
    </ul>

    <h2>Bebidas</h2>
    <ul>
        <?php foreach ($bebidas as $bebida) : ?>
            <li> <?= $bebida->nombre ?> </li> 
            
        <?php endforeach ?>
    </ul>

    <h2>Otros</h2>
    <ul>
        <?php foreach ($otros as $otro) : ?>
            <li> <?= $otro->nombre ?> </li> 
        <?php endforeach ?>
    </ul>
    <h1>Los más vendidos</h1>

    <h1>¡Los más lucrativos!</h1>
</body>
</html>