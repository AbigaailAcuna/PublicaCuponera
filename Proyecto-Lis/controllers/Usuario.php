<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once './models/UsuarioModel.php';

//interactuamos entre modelo y vista
class UsuarioController
{

    public function validar() {
        
        $userModel = new UsuarioModel(); 
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            
            $email = isset($_POST['correo']) ? $_POST['correo'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            // Validación del correo electrónico y la contraseña
            if (!isset($_POST['correo']) || !filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = 'Ingrese una dirección de correo electrónico válida';
                header('Location:?c=Principal&a=inicio');
                exit;
            } 
            
            if (empty($_POST['password'])) {
                $_SESSION['error'] = 'Ingrese una contraseña';
                header('Location:?c=Principal&a=inicio');
                exit;
            }

            // Verificando usuario
            if ($login_data = $userModel->getUser($email, $password)) {
                if ($login_data = $userModel->validateUser($email)) {
                    $login_data = $login_data[0];
                    $_SESSION['login_data'] = $login_data;
                    header('Location:?c=Principal&a=index');
                } else {
                    $_SESSION['error'] = 'Verifique su correo';
                    header('Location:?c=Principal&a=inicio');
                }
            } else {
                $_SESSION['error'] = 'Datos erroneos o ha sido bloqueado por los administradores';
                header('Location:?c=Principal&a=inicio');
            }
        }
    }


    ////Funciones para crear el token de validación
    public function obtenCaracterAleatorio($arreglo) {
        $clave_aleatoria = array_rand($arreglo, 1);	//obten clave aleatoria
        return $arreglo[ $clave_aleatoria ];	//devolver item aleatorio
    }
    
    public function obtenCaracterMd5($car) {
        $md5Car = md5($car.Time());	//Codificar el caracter y el tiempo POSIX (timestamp) en md5
        $arrCar = str_split(strtoupper($md5Car));	//Convertir a array el md5
        $carToken = $this-> obtenCaracterAleatorio($arrCar);	//obten un item aleatoriamente
        return $carToken;
    }

    public function obtenToken($longitud) {
        ///Array para letras
        $ABC = "ABCDEFGHIJKMNPQRSTUVWXYZ";
        $letras = str_split($ABC);
        ///Array para números
        $numeros = range(0,9);
        shuffle($letras);
        shuffle($numeros);
        
        $arregloTotal = array_merge($letras,$numeros);
        $newToken = "";
        
        for($i=0;$i<=$longitud;$i++) {
            $miCar = $this->obtenCaracterAleatorio($arregloTotal);
            $newToken .= $this->obtenCaracterMd5($miCar);
        }
        return $newToken;
    }

    ///Función para enviar correo
    public function enviarToken($correo, $subject, $body){
        
        require('./recursos/PHPMailer/Exception.php');
        require('./recursos/PHPMailer/SMTP.php');
        require('./recursos/PHPMailer/PHPMailer.php');
        
        $mail = new PHPMailer(true);
        
        try {

            // Envío del correo electrónico con el token
            // Correo: lacuponeraservicios@gmail.com
            // Contraseña: Contra@1                     
            
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'lacuponeraservicios@gmail.com';                   
            $mail->Password   = 'cqdgvpabzbtyfjka';                              
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
            $mail->Port       = 587;
            
            //Recipients
            $mail->setFrom('lacuponeraservicios@gmail.com', 'La cuponera');
            $mail->addAddress($correo);               
                            
            //Content
            $mail->isHTML(true);                                  
            $mail->Subject = $subject;
            $mail->Body    = $body;
            //$mail->Body    = 'Tu Token de verificación es <b>'. $token ;
            
            $mail->send();
        
        } catch (Exception $e) {
            echo 'Mensaje ' . $mail->ErrorInfo;
        }
    }

    //Funciones para validar campos 
    public function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function registrar()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
            $errors = array();
            
            $nombres = isset($_POST['nombres']) ? $_POST['nombres']: '';
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
            $dui = isset($_POST['dui']) ? $_POST['dui'] : '';
            $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
            $estado = "Inactivo";

            if (empty($_POST['nombres']) || !preg_match("/^[a-zA-Z ]*$/", $_POST['nombres'])) {
                $errors['nombres'] = 'Ingrese un nombre válido';
            }
            
            if (empty($_POST['apellidos']) || !preg_match("/^[a-zA-Z ]*$/", $_POST['apellidos'])) {
                $errors['apellidos'] = 'Ingrese un apellido válido';
            } 
            
            if (!isset($_POST['telefono']) || !preg_match("/^[0-9_-]{8,9}$/", $_POST['telefono'])) {
                $errors['telefono'] = 'Ingrese un número de teléfono válido';
            } 
            
            if (!isset($_POST['dui']) || !preg_match("/^[0-9_-]{9,10}$/", $_POST['dui'])) {
                $errors['dui'] = 'Ingrese un número de DUI válido';
            } 
            
            if (!isset($_POST['correo']) || !filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
                $errors['correo'] = 'Ingrese una dirección de correo electrónico válida';
            } 
            
            if (empty($_POST['password'])) {
                $errors['password'] = 'Ingrese una contraseña';
            } 

            if (empty($_POST['direccion'])) {
                $errors['direccion'] = 'Ingrese una direción';
            } 

            if(!empty($errors)){
                $_SESSION['errors'] = $errors;
                $_SESSION['nombres'] = $nombres;
                $_SESSION['apellidos'] = $apellidos;
                $_SESSION['telefono'] = $telefono;
                $_SESSION['dui'] = $dui;
                $_SESSION['direccion'] = $direccion;
                $_SESSION['correo'] = $correo;
                $_SESSION['password'] = $password;
                header('Location:?c=Principal&a=registro');
            }else{
            
            $userModel = new UsuarioModel(); 

            if ($userModel->existeUsuario($correo)) {
                
                $_SESSION['error'] = 'El correo electronico ya está en uso';
                header('Location:?c=Principal&a=registro');
            
            } else {
                //generando el token
                do{
                    $token = $this-> obtenToken(5);
                }while($userModel->validarToken($token));
                
                if ($userModel->insert($nombres, $apellidos, $dui, $telefono, $correo, $direccion, $password, $estado, $token)) {
                    
                    $subject= "Código de verificación";
                    $subject = utf8_decode($subject);
                    $body= 'Tu Token de verificación es <b>'. $token ;
                    $this->enviarToken($correo, $subject, $body);
                    header('Location:?c=Principal&a=validarCorreo');
                
                } else {
                    $_SESSION['error'] = 'Error al registrar';
                    header('Location:?c=Principal&a=registro');
                }
            }
        }
        }
        
    }

    public function validarRegistro()
    {
        require_once './models/UsuarioModel.php';
        $userModel = new UsuarioModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['validar'])) {

            $correo = $_POST['correo'];
            $token = $_POST['token'];

            if (empty($correo) || empty($token)) {
                $_SESSION['error'] = 'Por favor ingrese su correo y el token enviado a su correo';
                header('Location:?c=Principal&a=validarCorreo');
                exit;
            }

            if($userModel->getToken($correo, $token)){
                if($userModel->cambiarEstado($correo, $token)){
                    $_SESSION['message'] = 'Ha verificado su correo';
                    header('Location:?c=Principal&a=inicio'); 
                } else {
                    $_SESSION['error'] = 'Error al validar su token';
                    header('Location:?c=Principal&a=validarCorreo');       
                }
            } else 
            {
                $_SESSION['error'] = 'Su token es incorrecto';
                header('Location:?c=Principal&a=validarCorreo');
            }
        }  
    }

    public function cambiarClave(){
        
        require_once './models/UsuarioModel.php';
        $userModel = new UsuarioModel();

        $email = $_POST['correo'];
        $password = $_POST['clave1'];
        $password2 = $_POST['clave2'];
        $password3 = $_POST['clave3'];

        if (empty($email) || empty($password) || empty($password2) || empty($password3)) {
            $_SESSION['error'] = 'Por favor ingrese su correo y contraseña';
            header('Location:?c=Principal&a=cambiarClave');
            exit;
        }

        if ($password2 == $password3){
            if($userModel->getUserpass($email, $password)){
                if($userModel->cambiarClave($email, $password2)){
                    
                    session_unset();
                    session_destroy();
                    header('Location:?c=Principal&a=inicio');
                    
                } else {
                    $_SESSION['error'] = 'Error al cambiar su contraseña';
                    header('Location:?c=Principal&a=cambiarClave');       
                }
            } 
            else 
            {
                $_SESSION['error'] = 'Error. Verifique su correo o su contraseña';
                header('Location:?c=Principal&a=cambiarClave');
            }
        }
        else 
        {
            $_SESSION['error'] = 'Los campos deben coincidir';
            header('Location:?c=Principal&a=cambiarClave');
        }
    }

    

    public function claveOlvidada (){

        $userModel = new UsuarioModel(); 
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])){
            $email = $_POST['correo'];

            if (empty($email)) {
                $_SESSION['error'] = 'Por favor ingrese su correo';
                header('Location:?c=Principal&a=cambiarClaveOT');
                exit;
            }

            if($login_data=$userModel->validateUser($email)){

                do{
                    $token = $this-> obtenToken(5);

                }while($userModel->validarToken($token));
                
                if($userModel->cambiarToken($email, $token)){
                    
                    $subject= "¿Olvidaste tu contraseña?";
                    $subject = utf8_decode($subject);
                    $body='Enviamos tu código de verificación para cambiar tu contraseña: <b>'. $token .'</b>.';
                    $this->enviarToken($email, $subject, $body);
                    header('Location:?c=Principal&a=cambiarClaveO');

                }else {
                    $_SESSION['error'] = 'Error';
                    header('Location:?c=Principal&a=cambiarClaveOT');  
                }

            } else{
                $_SESSION['error'] = 'Correo no encontrado';
                header('Location:?c=Principal&a=cambiarClaveOT');  
            }
        }  
    }

    public function cambiarClaveOlvidada () {
        
        $userModel = new UsuarioModel(); 

        $token = $_POST['token'];
        $password = $_POST['clave1'];
        $password2 = $_POST['clave2'];

        if (empty($token) || empty($password) || empty($password2)) {
            $_SESSION['error'] = 'Por favor ingrese el token y la nueva contraseña';
            header('Location:?c=Principal&a=cambiarClaveO');
            exit;
        }

        if ($password == $password2){
            if($userModel->validarToken($token)){
                $_SESSION['error'] = 'El token no coincide';
                header('Location:?c=Principal&a=cambiarClaveO');
            } else{
                if ($userModel->cambiarClaveO($token, $password)) {
                    $_SESSION['message'] = 'Se ha cambiado su contraseña';
                    header('Location:?c=Principal&a=inicio');   
                } else {
                    $_SESSION['error'] = 'Error al cambiar su contraseña';
                    header('Location:?c=Principal&a=cambiarClaveO'); 
                }
            }
        }
        else 
        {
            $_SESSION['error'] = 'Las contraseñas no coinciden';
            header('Location:?c=Principal&a=cambiarClaveO');
        }

    }

    public function logout(){
        session_unset();
        session_destroy();
        header('Location:?c=Principal&a=index');   
    }

}
?>
