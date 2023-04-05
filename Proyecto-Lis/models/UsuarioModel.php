<?php

include_once ("./config/bd.php");

class UsuarioModel {
    private $db;
  
    public function __construct() {
        $this->db = Conectar::conexion();
    }

    public function insert($nombres, $apellidos, $dui, $telefono, $correo, $direccion, $password, $estado, $token) {
        $sql = "INSERT INTO cliente (Nombres, Apellidos, Dui, Telefono, Correo, Direccion, Clave, Estado, Token) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('sssssssss', $nombres, $apellidos, $dui, $telefono, $correo, $direccion, $password, $estado, $token);
        return $stmt->execute();
    }

    public function existeUsuario($correo){
        $sql = "SELECT * FROM cliente WHERE Correo='$correo'";
        $result = $this->db->query($sql);
        return ($result->num_rows > 0);
    }

    public function getUser($email, $password){
        $sql = "SELECT * FROM cliente WHERE Correo='$email' AND Clave = '$password' AND Estado='Activo'";
        $result = $this->db->query($sql);
        return ($result->num_rows > 0);
    }

    public function getToken($correo, $token){
        $sql = "SELECT * FROM cliente WHERE Correo='$correo' AND Token = '$token'";
        $result = $this->db->query($sql);
        return ($result->num_rows > 0);
    }

    public function CambiarEstado($correo, $token){
        $stmt = $this->db->prepare("UPDATE cliente SET estado='Activo' WHERE correo=? AND token=?");
        $stmt->bind_param("ss", $correo, $token);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
?>