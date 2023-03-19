<?php

require_once '../models/UsuarioModel.php';

$userModel = new UsuarioModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['validar'])) {

    $correo = $_POST['correo'];
    $token = $_POST['token'];


    if($userModel->getToken($correo, $token)){
        if($userModel->CambiarEstado($correo, $token)){
            echo '<div class="box"><p> Ha verificado su correo </p></div>';
        } else {
            echo '<div class="box"><p> Ha ocurrido un error al actualizar el estado del registro </p></div>';
        }
    } else 
    {
        echo '<div class="box"><p> Su token es incorrecto </p></div>';
    }
}   
?>