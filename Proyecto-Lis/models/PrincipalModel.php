<?php
include 'Model.php';
//modelo de la principal
     class Principal_modelo extends Modelo{
        private $db;
        private $cupones;

        public function __construct(){

            //llamamos la conexion
            $this->db=Conectar::conexion();
            $this->cupones=array();

        }

     //método para mostrar los productos
    public function mostrar_cupones(){
        $query = "SELECT IdCuponR, Titulo, PrecioRegular, imagen FROM cuponr WHERE Estado = 'Activo'";
        return $this->mostrar($query);
    }

       
    public function detalle_cupon($id){
        $query = "SELECT * FROM cuponr WHERE IdCuponR = ?";
        return $this->mostrar_seleccionado($query,$id);
    }

    
    

    
}

?>
