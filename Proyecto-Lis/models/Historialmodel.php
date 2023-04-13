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
    public function getCuponesDisponibles($id){
        $query = "SELECT V.IdCuponV, R.Titulo, S.FechaCompra, V.Estado FROM venta S  INNER JOIN cuponv V ON S.IdVenta = V.IdVenta INNER JOIN cuponr R ON S.IdCuponR = R.IdCuponR WHERE V.IdCliente = '$id' AND V.Estado  = 'Disponible'";
        return $this->get($query);
    }

    public function getCuponesVencidos($id){
        $query = "SELECT V.IdCuponV, R.Titulo, S.FechaCompra, V.Estado FROM venta S  INNER JOIN cuponv V ON S.IdVenta = V.IdVenta INNER JOIN cuponr R ON S.IdCuponR = R.IdCuponR WHERE V.IdCliente = '$id' AND V.Estado  = 'Vencido'";
        return $this->get($query);
    }

    public function getCuponesCanjeados($id){
        $query = "SELECT V.IdCuponV, R.Titulo, S.FechaCompra, V.Estado FROM venta S  INNER JOIN cuponv V ON S.IdVenta = V.IdVenta INNER JOIN cuponr R ON S.IdCuponR = R.IdCuponR WHERE V.IdCliente = '$id' AND V.Estado  = 'Canjeado'";
        return $this->get($query);
    }

    public function getCuponDisponibles($id,$id2){
        $query = "SELECT V.IdCuponV, R.Titulo, R.FechaLimiteUso, V.Estado,R.PrecioRegular, R.PrecioOferta FROM venta S  INNER JOIN cuponv V ON S.IdVenta = V.IdVenta INNER JOIN cuponr R ON S.IdCuponR = R.IdCuponR WHERE V.IdCliente = '$id' AND V.IdCuponV = '$id2'";
        return $this->get($query);
    }

       
   
}

?>