<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//interactuamos entre modelo y vista
class UsuarioController
{

    public function validar()
    {   
        require_once './models/UsuarioModel.php';
        $userModel = new UsuarioModel(); 
        
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            
            $email = $_POST['correo'];
            $password = $_POST['clave'];
            
            if($login_data=$userModel->getUser($email, $password)){
                $login_data=$login_data[0];
                $_SESSION['login_data']=$login_data;
                header('Location:?c=Principal&a=index');
            } 
            else 
            {
                $_SESSION['error'] = 'Verifique sus credenciales. O ha sido bloqueado por los administradores';
                header('Location:?c=Principal&a=inicio');  
            }
        }
    }

    public function registrar()
    {
        
        require_once './models/UsuarioModel.php';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
            
            isset($_POST['monto']) && is_numeric($_POST['monto']) ? $_POST['monto'] : "";

            $nombres = isset($_POST['nombres']) || !preg_match("/^[a-zA-Z ]*$/",$_POST['nombres'] ) ? $_POST['nombres'] : "";
            $apellidos = isset($_POST['apellidos']) || !preg_match("/^[a-zA-Z ]*$/",$_POST['apellidos'] ) ? $_POST['apellidos'] : "";
            $telefono = isset($_POST['telefono']) || !preg_match("/^[0-9_-]{8,9}$/",$_POST['telefono']) ? $_POST['telefono'] : "";
            $direccion = $_POST['direccion'];
            $dui = isset($_POST['dui']) || !preg_match("/^[0-9_-]{9,10}$/",$_POST['dui']) ? $_POST['dui'] : "";
            $correo = isset($_POST['correo']) || !filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL) ? $_POST['correo'] : "";
            $password = $_POST['password'];
            $estado = "Inactivo";

            //validaciones 

            if($nombres=="" || $apellidos=="" || $telefono=="" || $direccion=="" || $dui=="" || $correo=="" || $password=="" ){
                
                $_SESSION['error'] = 'Por favor complete los campos correctamente';
                header('Location:?c=Principal&a=registro');

            } else 
            {
                // Insertar datos en la base de datos
                $model = new UsuarioModel();
                
                ///Generando el token
                function obtenCaracterAleatorio($arreglo) {
                    $clave_aleatoria = array_rand($arreglo, 1);	//obten clave aleatoria
                    return $arreglo[ $clave_aleatoria ];	//devolver item aleatorio
                }
                
                function obtenCaracterMd5($car) {
                    $md5Car = md5($car.Time());	//Codificar el caracter y el tiempo POSIX (timestamp) en md5
                    $arrCar = str_split(strtoupper($md5Car));	//Convertir a array el md5
                    $carToken = obtenCaracterAleatorio($arrCar);	//obten un item aleatoriamente
                    return $carToken;
                }
                
                function obtenToken($longitud) {
                    ///Array para letras
                    $mayus = "ABCDEFGHIJKMNPQRSTUVWXYZ";
                    $mayusculas = str_split($mayus);
                    ///Array para números
                    $numeros = range(0,9);
                    shuffle($mayusculas);
                    shuffle($numeros);
                    
                    $arregloTotal = array_merge($mayusculas,$numeros);
                    $newToken = "";
                    
                    for($i=0;$i<=$longitud;$i++) {
                        $miCar = obtenCaracterAleatorio($arregloTotal);
                        $newToken .= obtenCaracterMd5($miCar);
                    }
                    
                    return $newToken;
                }
                
                // Verificar si el usuario ya está registrado
                if ($model->existeUsuario($correo)) {
                    
                    $_SESSION['error'] = 'El correo electronico ya está en uso';
                    header('Location:?c=Principal&a=registro');
                
                } else {
                    //generando el token
                    $token = obtenToken(5);
        
                    // Insertar datos en la base de datos
                    if ($model->insert($nombres, $apellidos, $dui, $telefono, $correo, $direccion, $password, $estado, $token)) {
                        
                        require('./recursos/PHPMailer/Exception.php');
                        require('./recursos/PHPMailer/SMTP.php');
                        require('./recursos/PHPMailer/PHPMailer.php');
                        
                        $mail = new PHPMailer(true);
                        
                        try {
                            // Envío del correo electrónico con el token
                            /// Correo: lacuponeraservicios@gmail.com
                            /// Contraseña: Contra@1
                            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
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
                            $mail->Subject = 'Codigo de verificacion';
                            $mail->Body    = 'Tu Token de verificación es <b>'. $token .'</b>. Verifica tu correo <a href="http://localhost/Proyecto-Lis/?c=Usuario&a=validarCorreo">Aquí</a>';
                            
                            $mail->send();
                            
                            $_SESSION['message'] = 'Registro exitoso. Se ha enviado un correo electrónico para verificar su cuenta';
                            header('Location:?c=Principal&a=registro');
                        
                        } catch (Exception $e) {
                            echo 'Mensaje ' . $mail->ErrorInfo;
                        }
            
                    } else {
                        $_SESSION['error'] = 'Error al registrar';
                        header('Location:?c=Principal&a=registro');
                    }
                }
            }
        }
        
    }

    public function validarCorreo()
    {
        require_once "views/cliente/ValidarCorreo.php";
    }

    public function validarRegistro()
    {
        require_once './models/UsuarioModel.php';
        $userModel = new UsuarioModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['validar'])) {

            $correo = $_POST['correo'];
            $token = $_POST['token'];

            if($userModel->getToken($correo, $token)){
                if($userModel->CambiarEstado($correo, $token)){
                    $_SESSION['message'] = 'Ha verificado su correo';
                    header('Location:?c=Usuario&a=validarCorreo');
                } else {
                    $_SESSION['error'] = 'Error al registrar';
                    header('Location:?c=Usuario&a=validarCorreo');       
                }
            } else 
            {
                $_SESSION['error'] = 'Su token es incorrecto';
                header('Location:?c=Usuario&a=validarCorreo');
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

        if ($password2 == $password3){
            if($userModel->getUserpass($email, $password)){
                if($userModel->CambiarClave($email, $password2)){
                    $_SESSION['message'] = 'Se ha cambiado su contraseña';
                    header('Location:?c=Principal&a=cambiarClave');
                    
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

    public function logout(){
        session_unset();
        session_destroy();
        header('Location:?c=Principal&a=index');   
    }

}
?>
