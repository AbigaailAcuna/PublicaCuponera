<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if (isset($_SESSION['carrito'])) {
    if ($_GET['id']) {
        $arreglo = $_SESSION['carrito'];
        $encontro = false;
        $numero = 0;
        for ($i = 0; $i < count($arreglo); $i++) {
            if ($arreglo[$i]['Id'] == $_GET['id']) {
                $encontro = true;
                $numero = $i;
            }
        }
        if ($encontro == true) {
            $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad'] + 1;
            $_SESSION['carrito'] = $arreglo;
        } else {
            $nombre = $info["cupones"]["Titulo"];
            $precio = $info["cupones"]["PrecioRegular"];
            $imagen = $info["cupones"]["imagen"];
            $arreglonuevo = array(
                'Id' => $_GET['id'],
                'Nombre' => $nombre,
                'Precio' => $precio,
                'Imagen' => $imagen,
                'Cantidad' => 1
            );
            array_push($arreglo, $arreglonuevo);
            $_SESSION['carrito'] = $arreglo;
        }
        header('Location:?c=Principal&a=carrito');
    }
} else if (isset($_GET['id'])) {
    $nombre = $info["cupones"]["Titulo"];
    $precio = $info["cupones"]["PrecioRegular"];
    $imagen = $info["cupones"]["imagen"];
    $arreglo[] = array(
        'Id' => $_GET['id'],
        'Nombre' => $nombre,
        'Precio' => $precio,
        'Imagen' => $imagen,
        'Cantidad' => 1
    );
    $_SESSION['carrito'] = $arreglo;
    header('Location:?c=Principal&a=carrito');
}
