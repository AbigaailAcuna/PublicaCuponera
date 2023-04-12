<?php

include_once ("./config/bd.php");
include 'Model.php';

class UsuarioModel extends Model {
    private $db;
  
    public function __construct() {
        $this->db = Conectar::conexion();
    }

    public function insert($nombres, $apellidos, $dui, $telefono, $correo, $direccion, $password, $estado, $token) {
        $sql = "INSERT INTO cliente (Nombres, Apellidos, Dui, Telefono, Correo, Direccion, Clave, Estado, Token) 
                VALUES (?, ?, ?, ?, ?, ?, SHA2(?,256), ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('sssssssss', $nombres, $apellidos, $dui, $telefono, $correo, $direccion, $password, $estado, $token);
        return $stmt->execute();
    }

    public function validarToken($token){
        $sql = "SELECT * FROM cliente WHERE Token =$token";
        $result = $this->db->query($sql);
        return ( $result->num_rows > 0);
    }

    public function existeUsuario($correo){
        $sql = "SELECT * FROM cliente WHERE Correo='$correo'";
        $result = $this->db->query($sql);
        return ($result->num_rows > 0);
    }

    public function getUser($correo, $password){
        $sql = "SELECT * FROM cliente WHERE Correo='$correo' AND Clave = SHA2('$password',256)";
        return $this->get($sql);
    }

    public function validateUser($correo ){
        $sql = "SELECT * FROM cliente WHERE Correo='$correo' and Estado='Activo'";
        return $this->get($sql);
    }

    public function cambiarToken($correo, $token){
        $stmt = $this->db->prepare("UPDATE cliente SET Token=? WHERE correo=?");
        $stmt->bind_param("ss", $token, $correo);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function cambiarClaveO($token, $password){
        $stmt = $this->db->prepare("UPDATE cliente SET Clave=SHA2(?,256) WHERE Token=?");
        $stmt->bind_param("ss", $password, $token);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function getUserpass($correo, $password){
        $sql = "SELECT * FROM cliente WHERE Correo='$correo' AND Clave = SHA2('$password',256) AND Estado='Activo'";
        $result = $this->db->query($sql);
        return ($result->num_rows > 0);
    }

    public function getToken($correo, $token){
        $sql = "SELECT * FROM cliente WHERE Correo='$correo' AND Token = '$token'";
        $result = $this->db->query($sql);
        return ($result->num_rows > 0);
    }

    public function cambiarClave($correo, $password){
        $stmt = $this->db->prepare("UPDATE cliente SET Clave = SHA2(?,256) WHERE correo=?");
        $stmt->bind_param("ss", $password, $correo);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function cambiarEstado($correo, $token){
        $stmt = $this->db->prepare("UPDATE cliente SET estado='Activo' WHERE correo=? AND token=?");
        $stmt->bind_param("ss", $correo, $token);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
?>
