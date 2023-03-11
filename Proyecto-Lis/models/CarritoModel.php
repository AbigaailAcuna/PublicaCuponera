<?php
include 'Model.php';

    class Carrito_modelo extends Modelo {
        private $db;
        private $cupones;

        public function __construct(){

            //llamamos la conexion
            $this->db=Conectar::conexion();
            $this->cupones=array();

        }
    //productos seleccionados para carrito
        public function carrito_cupones($id){
            $query = "SELECT * FROM cuponr WHERE IdCuponR = ?";
             return $this->mostrar_seleccionado($query,$id);
        }
    }
?>