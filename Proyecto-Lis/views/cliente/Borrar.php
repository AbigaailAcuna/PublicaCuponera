<?php
session_start();
$arreglo=$_SESSION['carrito'];

    if(isset($_SESSION['carrito'])){
        if($_GET['id']){
        $arreglo=$_SESSION['carrito'];   
        for($i=0;$i<count($arreglo);$i++){
            if($arreglo[$i]['Id']==$_GET['id']){
              $numero=$i;
              //vamos eliminando decreciente
              $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']-1;
              $_SESSION['carrito']=$arreglo;

              //lo eliminamos completamente
             if($arreglo[$i]['Cantidad']==0){
             unset($arreglo[$i]);
             //ordenamos el arreglo
             $arreglo=array_values($arreglo);
             $_SESSION['carrito']=$arreglo;
             
            }

            }
        }   
    }
}
header('Location:?c=Principal&a=carrito');
//var_dump($arreglo);
?>