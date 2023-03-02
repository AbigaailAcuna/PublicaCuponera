<?php
//modelo de la principal
    class Principal_modelo{
        private $db;
        private $cupones;

        public function __construct(){

            //llamamos la conexion
            $this->db=Conectar::conexion();
            $this->cupones=array();

        }

        //método para mostrar los productos
        public function mostrar_cupones(){
            $sql = "SELECT Titulo,PrecioRegular,imagen FROM cuponr";
            $resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->cupones[] = $row;
			}
			return $this->cupones;
          
        }
       //traemos las categorías
       public function get_categorias(){
        $sql = "SELECT NombreCategoria FROM categoria";
        $resultado = $this->db->query($sql);
        while($row = $resultado->fetch_assoc())
        {
            $this->cupones[] = $row;
        }
        return $this->cupones;
    }
}

?>