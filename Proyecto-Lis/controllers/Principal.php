<?php
//interactuamos entre modelo y vista
class PrincipalController{
    
    public function index(){
        //traemos el modelo
        require_once "./models/CuponesModel.php";
        //instanciamos el modelo
        $cupones=new CuponesModel();
        //traemos el método del modelo
        $info["cupones"]=$cupones->getCupones();
        require_once "views/cliente/Principal.php";
        
    }

    //mostrando la página de inicio de sesión
    public function inicio(){
        require_once "views/cliente/InicioSesion.php";
    }
    //mostrando página de registro
    public function registro(){
        require_once "views/cliente/Registro.php";
    }
    //pagina para detalle de productos
    public function detalle($id){

        require_once "models/PrincipalModel.php";
        $cupones=new CuponesModel();
        $info["id"]=$id;
        $info["cupones"]=$cupones->getCupon($id);
        require_once "views/cliente/Detalle.php";      
    }
     public function carrito($id=null){
        require_once "models/CuponesModel.php";
        $cupones=new CuponesModel();
        $info["id"]=$id;
        $info["cupones"]=$cupones->getCupon($id);
        require_once "views/cliente/Agregar.php";
       require_once "views/cliente/Carrito.php";     
          
    }
    public function borrar($id=null){
        //require_once "views/cliente/Carrito.php";
        require_once "views/cliente/Borrar.php";
    }
    public function sumar(){
        require_once "views/cliente/Cantidad.php";
    }
    public function restar(){
        require_once "views/cliente/Cantidad.php";
    }
  

}

?>