<?php
include_once "Model.php";
//modelo de la principal
     class HistorialModel extends Model{
        private $db;
        private $historial;

        public function __construct(){

            //llamamos la conexion
            $this->db=Conectar::conexion();
            $this->historial=array();

        }

     //método para mostrar los cupones de cada cliente
    public function getCuponesV(){
        $query = "SELECT V.IdCuponV, R.Titulo, S.Cantidad, S.FechaCompra, V.Estado FROM venta S  INNER JOIN cuponv V ON S.IdVenta = V.IdVenta INNER JOIN cuponr R ON S.IdCuponR = R.IdCuponR WHERE V.IdCliente = 1 ";
        return $this->get($query);
    }

       
   
}

?>