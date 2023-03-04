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
            $sql = "SELECT IdCuponR,Titulo,PrecioRegular,imagen FROM cuponr ";
            $resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->cupones[] = $row;
			}
			return $this->cupones;
          
        }
       

    public function detalle_cupon($id){
        $sql = "SELECT * FROM cuponr WHERE IdCuponR='$id' ";
        $resultado = $this->db->query($sql);
        $row=$resultado->fetch_assoc();

        return $row;
      
    }

    //detalle de productos
   // public function detalle_cupon($id){
     //   $sql = "SELECT IdCuponR,Titulo,PrecioRegular,imagen FROM cuponr WHERE IdCuponR='$id' LIMIT 1";
       // $resultado = $this->db->query($sql);
        //while($row = $resultado->fetch_assoc())
        //{
          //  $this->cupones[] = $row;
        //}
        //return $this->cupones;
    //}
}

?>