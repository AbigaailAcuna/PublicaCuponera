<?php
//interactuamos entre modelo y vista
class PrincipalController
{

      public function index()
      {
            //traemos el modelo
            require_once "./models/CuponesModel.php";
            require_once "./models/Historialmodel.php";
            //instanciamos el modelo
            $cupones = new CuponesModel();
            $historial = new HistorialModel();
            //traemos el método del modelo
            $info["cupones"] = $cupones->getCupones();
            if(isset($_SESSION['login_data'])){
            $info["historial"]['Canjeados'] = $historial->getCuponesCanjeados($_SESSION['login_data']['IdCliente']);
            $info["historial"]['Vencidos'] = $historial->getCuponesVencidos($_SESSION['login_data']['IdCliente']);
            $info["historial"]['Disponibles'] = $historial->getCuponesDisponibles($_SESSION['login_data']['IdCliente']);
            }
           
            require_once "views/cliente/Principal.php";
      }

      //mostrando la página de inicio de sesión
      public function inicio()
      {
            require_once "views/cliente/InicioSesion.php";
      }
      //mostrando página de registro
      public function registro()
      {
            require_once "views/cliente/Registro.php";
      }
      //mostrando pagina de cambio de contraseña
      public function cambiarClave()
      {
            require_once "views/cliente/CambioClave.php";
      }




      //pagina para detalle de productos
      public function detalle($id)
      {

            require_once "models/CuponesModel.php";
            $cupones = new CuponesModel();
            $info["id"] = $id;
            $info["cupones"] = $cupones->getCupon($id);
            require_once "views/cliente/Detalle.php";
      }
      public function carrito()
      {
            $validate = -1;
            $carrito = $_SESSION['carrito'];
            $errors = [];

            if (isset($_POST['pagar'])) {
                  extract($_POST);
                  validateCreditCard($numTarjeta, $validate, $errors);
                  validateText($nombre, $validate, $errors, 'nombre');
                  validateText($apellido, $validate, $errors, 'apellido');
                  validateCVV($cvv, $validate, $errors);
                  validateDate($fechaExp, $validate, $errors);
            }
            if(!is_null($_SESSION['login_data'])){
                  require_once "views/cliente/Carrito.php"; 
                  }
                  else{
                      require_once "views/Cliente/InicioSesion.php";  
                  }
            
      }
}
