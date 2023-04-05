<?php

include_once("./config/bd.php");

class VentasModel
{
      private $db;

      public function __construct()
      {
            $this->db = Conectar::conexion();
      }

      public function insert($venta)
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
      }
}
