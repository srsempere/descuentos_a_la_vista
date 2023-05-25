<?php

function convierte_a_entero($precios, $porcentaje) {
    $precios_con_descuentos = array();

    foreach ($precios as $precio) {
        $precio = trim($precio);
        // var_dump($precio);
        $precio_float = floatval($precio);
        // var_dump($precio_float);
        var_dump($precio_float);
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


// Llamar a la función para aplicar el descuento a cada cantidad.

$array_precios_con_descuento = convierte_a_entero($precios_ArrStr, $descuento);

// var_dump($array_precios_con_descuento);

?>
</br>
</br>
<a href="index.html">Volver a principal</a>