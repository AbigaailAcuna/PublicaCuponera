<?php
//conexión a mysql
    class Conectar{

      public static function conexion(){
        try{
          $conexion=new mysqli("localhost","root","","cuponeralis");
        }
       catch(Exception $e){
        echo 'Error de conexión';

       }
        return $conexion;
      }
    }
   
?>

<!--
     abstract class Conexion{

        private $server="localhost";
        private $user="root";
        private $pass="";
        private $bd="cuponeralis";
        protected $conn;

        //abrimos la conexión
        private function abrirConexion(){
            $this->conn=new mysqli($this->server,$this->user,$this->pass,$this->bd); 
            
        }
        //cerramos la conexión
        private function cerrarConexion(){
            $this->conn->close();
        }
        
      
    }
-->
        