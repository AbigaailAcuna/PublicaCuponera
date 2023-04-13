<?php
include 'Model.php';
//modelo de la principal
     class CuponesModel extends Model{
        private $db;
        private $cupones;

        public function __construct(){

            //llamamos la conexion
            $this->db=Conectar::conexion();
            $this->cupones=array();

        }

     //método para mostrar los productos
    public function getCupones(){
        $query = "SELECT IdCuponR, Titulo, PrecioRegular, imagen FROM cuponr WHERE Estado = 'Activo'";
        return $this->get($query);
    }

       
    public function getCupon($id){
        $query = "SELECT * FROM cuponr WHERE IdCuponR = ?";
        return $this->getOne($query,$id);
    }    

    public function getCategorias(){
        $query = "SELECT*FROM categoria";
        return $this->get($query);
    }

    public function getCuponCat($id){
        $query = "SELECT R.IdCuponR, R.Titulo, R.PrecioRegular, R.imagen, E.IdCategeoria FROM cuponr R INNER JOIN empresar E WHERE E.IdCategeoria = '$id'";
        return $this->get($query);
    }
}

?>
