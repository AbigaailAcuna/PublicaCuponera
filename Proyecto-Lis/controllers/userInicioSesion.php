<?php

require_once '../models/UsuarioModel.php';

$userModel = new UsuarioModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {

    $email = $_POST['correo'];
    $password = $_POST['clave'];


    if($userModel->getUser($email, $password)){
        session_start();
        $_SESSION['user'] = $user;
        header('Location: ../index.php');
    } else 
    {
        echo '<div class="box"><p> No ha validado su correo o su contraseña es incorrecta </p></div>';
    }
}

?>