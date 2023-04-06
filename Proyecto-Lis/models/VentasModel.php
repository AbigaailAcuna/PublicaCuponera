<?php

include_once("./config/bd.php");
include 'Model.php';

class VentasModel extends Model
{
      private $db;
      private $venta;

      public function __construct()
      {
            $this->db = Conectar::conexion();
            $this->venta=array();
      
              
      }

      /*public function insert($venta)
      {
            extract($venta);
            $sql = "INSERT INTO cuponv (IdVenta,IdCupon, IdCliente, Estado) 
                  VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('ssss', $IdVenta, $IdCupon, $IdCliente, $Estado);
            return $stmt->execute();
      }

      public function updateCant($id, $cantVendidos)
      {
            $sql = "UPDATE cuponr SET Disponibilidad = Disponibilidad - ?, CantidadVendido = ?
                  WHERE IdCuponR = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('sss', $cantVendidos, $cantVendidos, $id);
            return $stmt->execute();
      }*/

      public function insert($venta)
      {
            extract($venta);
            $sql = "INSERT INTO venta (IdCuponR,IdCliente, Cantidad, FechaCompra) 
                  VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('ssss', $IdCuponR, $IdCliente, $Cantidad, $FechaCompra);
            return $stmt->execute();
      }

      

      public function insertCuponV($venta)
      {
            extract($venta);
           
            $sql = "INSERT INTO cuponv (IdCuponV,IdVenta,IdCupon, IdCliente, Estado) 
                  VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('sssss',$IdCuponV, $IdVenta, $IdCupon, $IdCliente, $Estado);
            return $stmt->execute();
      }

      public function getIdVenta(){
            $sql2 = "SELECT IdVenta FROM venta ORDER BY IdVenta DESC limit 1";
            return  $this->get($sql2);
      }

      public function updateCant($id, $cantVendidos)
      {
            $sql = "UPDATE cuponr SET Disponibilidad = Disponibilidad - ?, CantidadVendido = ?
                  WHERE IdCuponR = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('sss', $cantVendidos, $cantVendidos, $id);
            return $stmt->execute();
      }

}
