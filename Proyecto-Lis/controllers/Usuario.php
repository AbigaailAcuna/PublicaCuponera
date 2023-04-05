<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//interactuamos entre modelo y vista
class UsuarioController
{

    public function validar()
    {   require_once './models/UsuarioModel.php';

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
                echo '<div class="box"><p> Sus credenciales son incorrecta o ha sido bloqueado por los administradores </p></div>';
            
               
            }
        }

    }

    public function registrar()
    {
        
        require_once './models/UsuarioModel.php';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
            
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $dui = $_POST['dui'];
            $correo = $_POST['correo'];
            $password = $_POST['password'];
            $estado = "Inactivo";
        
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
                echo "<div class='box'><p> El correo electronico ya está en uso </p></div>";
            } else {
                //generando el token
                $token = obtenToken(6);
        
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
                        
                        echo '<div class="box"><p>Registro exitoso. Se ha enviado un correo electrónico para verificar su cuenta.</p></div>';
                    
                    } catch (Exception $e) {
                        echo 'Mensaje ' . $mail->ErrorInfo;
                    }
        
                } else {
                    echo '<div class="box"><p>Error al registrar</p></div>';
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
                    echo '<div class="box"><p> Ha verificado su correo </p></div>';
                } else {
                    echo '<div class="box"><p> Ha ocurrido un error al actualizar el estado del registro </p></div>';
                }
            } else 
            {
                echo '<div class="box"><p> Su token es incorrecto </p></div>';
            }
        }  
    }

    public function logout(){
       
        session_unset();
        session_destroy();
        header('Location:?c=Principal&a=index');
    
}

}

?>