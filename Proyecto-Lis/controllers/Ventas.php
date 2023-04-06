<?php
require_once "models/VentasModel.php";

class VentasController
{

      public function insertSale()
      {
            $ventasModel = new VentasModel();
            var_dump($_SESSION);
            if (isset($_SESSION['login_data'])) {
                  foreach ($_SESSION['carrito'] as $cupon) {
                        for ($i = 0; $i < $cupon['Cantidad']; $i++) {
                              $idCuponV= $cupon['IdEmpresa'] . substr(str_repeat(0, 7) . rand(0, 9999999), -7);
                              var_dump($idCuponV);
                              $Venta = [
                                    'IdCuponR' => $cupon['Id'],
                                    'IdCliente' => $_SESSION['login_data']['IdCliente'],
                                    'Cantidad' => $cupon['Cantidad'],
                                    'FechaCompra' => date("Y-m-d")
                              ];
                              $ventasModel->insert($Venta);
                              

                              $CuponV=[
                                    'IdCuponV' => $idCuponV,
                                    'IdVenta' => $ventasModel->getIdVenta()[0]['IdVenta'],
                                    'IdCupon'  => $cupon['Id'],
                                    'IdCliente' => $_SESSION['login_data']['IdCliente'],
                                    'Estado' => "disponible"
                                    

                              ];
                              $ventasModel->insertCuponV($CuponV);
                        }
                        $ventasModel->updateCant($cupon['Id'], $cupon['Cantidad']);
                  }
            }
            
            unset($_SESSION['carrito']);
            header('location:index.php');


      }
}
