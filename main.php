<?php

function descuenta($precios, $porcentaje) {
    $precios_con_descuentos = array();
    // $precios_float = array();

    foreach ($precios as $precio) {
        $precio = trim($precio);
        $precio_float = floatval($precio);
        $descuento = ($precio * $porcentaje)/100;
        $precios_con_descuentos[] = $precio_float - $descuento;
    }
    var_dump($precios_con_descuentos);

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


// Llamar a la función para aplicar el descuento a cada cantidad.

$array_precios_con_descuento = descuenta($precios_ArrStr, $descuento);

// var_dump($array_precios_con_descuento);

?>
</br>
</br>
<a href="index.html">Volver a principal</a>
