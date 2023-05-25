<?php

function descuenta($precios, $porcentaje)
{
    $precios_con_descuentos = array();
    // $precios_float = array();

    foreach ($precios as $precio) {
        $precio = trim($precio);
        $precio_float = floatval($precio);
        $descuento = ($precio * $porcentaje) / 100;
        $precios_con_descuentos[] = $precio_float - $descuento;
    }
    return $precios_con_descuentos;
}

$precios_ArrStr;
$precios_str = array();
$precios = array();


$descuento = (int) $_REQUEST['descuento'];

// Leer el contenido del archivo html
$html = file_get_contents('index.html');

// Extraer los precios de los artículos utilziando una expresión regular.
$pattern = '/<td id="precio_\d+">(\d+\.\d+)/';
preg_match_all($pattern, $html, $matches);


// Obtener los precios encontrados
$precios_ArrStr = $matches[1];


// Extraer los nombres de los artículos utilziando una expresión regular.
$pattern = '/<td>([^<]+)<\/td>\s*<td id="precio_\d+">/';
preg_match_all($pattern, $html, $matches);

// Obtener los nombres encontrados
$nombres = $matches[1];


// Llamar a la función para aplicar el descuento a cada cantidad.

$precios_con_descuentos = descuenta($precios_ArrStr, $descuento);

?>
</br>
</br>

<table border="1">
    <tr>
        <th>Precio final <?= $nombres[0] ?></th>
        <th>Precio final <?= $nombres[1] ?></th>
        <th>Precio final <?= $nombres[2] ?></th>
    </tr>
    <tr>
        <td><?= $precios_con_descuentos[0] ?> €</td>
        <td><?= $precios_con_descuentos[1] ?> €</td>
        <td><?= $precios_con_descuentos[2] ?> €</td>
    </tr>
</table>
<a href="index.html">Volver a principal</a>
