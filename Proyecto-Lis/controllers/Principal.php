<?php
//interactuamos entre modelo y vista
class PrincipalController{
    
    public function index(){
       //traemos el modelo
       require_once "./models/CuponesModel.php";
       require_once "./models/Historialmodel.php";
       //instanciamos el modelo
       $cupones=new CuponesModel();
       $historial=new HistorialModel();
       //traemos el método del modelo
       $info["cupones"]=$cupones->getCupones();
       $info["historial"]=$historial->getCuponesV();

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

        require_once "models/CuponesModel.php";
        $cupones=new CuponesModel();
        $info["id"]=$id;
        $info["cupones"]=$cupones->getCupon($id);
        require_once "views/cliente/Detalle.php";      
    }
     public function carrito(){
      
       require_once "views/cliente/Carrito.php";     
          
    }
   
}

?>