<?php
include ('views/layouts/header.php');
?>
<div class="container my-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!--Productos-->
                        <div class="col-sm-9">
                        <div class="me-2">
                            <div class="d-flex justify-content-between">
                                <h5 class="ms-2 mt-2">Detalle de Carrito</h5>
                                <a class="btn btn-primary" href="?c=Principal&a=index"><i class="bi bi-cart-plus"></i> Seguir Comprando</a>   
                            </div>
                            <hr class="mt-2 mb-2">
                            <div id="productos-carrito">
                                <div class="card mb-2 card-producto">
                                <!--acá productos agregados-->
                                <?php
                                            if(isset($_SESSION['carrito'])){
                                             $arreglocarrito=$_SESSION['carrito'];
                                            for($i=0;$i<count($arreglocarrito);$i++){
                                            
                                        ?>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-sm-2 align-self-center d-flex justify-content-center">
                                            <!--imagen-->
                                            <img class="rounded" src="<?php echo 'http://localhost/Proyecto-Lis/recursos/img/'.$arreglocarrito[$i]['Imagen']?>" style="width:100px;height:100px"/>
                                        </div>

                                        <div class="col-sm-4 align-self-center">
                                            <span class="font-wight-bold d-block"></span>
                                            <span><?php echo $arreglocarrito[$i]['Nombre']?></span>
                                        </div>

                                        <div class="col-sm-2 align-self-ceter">
                                            <span>$<?php echo  $arreglocarrito[$i]['Precio']?></span>
                                        </div>
      
                                        <div class="col-sm-2 align-self-center">
                                            <div class="d-flex">
                                                <button class="btn btn-outline-secondary btn-restar rounded-0" onclick="location.href='?c=Principal&a=restar';"><i class="bi bi-dash"></i></button>
                                                <input class="form-control input-cantidad p-1 text-center rounded-0" disabled style="width:40px" value="<?php echo $arreglocarrito[$i]['Cantidad']?>"/>  
                                                <button class="btn btn-outline-secondary btn-sumar rounded-0" onclick="location.href='?c=Principal&a=sumar';"><i class="bi bi-plus"></i></button>
                                            </div>
                                            
                                            
                                        </div>
                                          <div class="col-sm-2 align-self-center">                          
                                          <a href="?c=Principal&a=borrar&id=<?php echo $arreglocarrito[$i]['Id'];?>" class="eliminar">Eliminar</a>
                                          <!-- <a href="?c=Principal&a=borrar&id=" class="btn btn-danger btn-sm btnEliminar" data-id=""><i class="bi bi-trash"></i></a>-->
                                          </div>        
                                          
                                           
                                    </div>
                                </div>
                                
                                <?php          
                                    }
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                        <?php
                        $suma=0;
                        if($arreglocarrito>0){
                            for($i=0;$i<count($arreglocarrito);$i++){
                                $subtotal= $arreglocarrito[$i]['Precio']*$arreglocarrito[$i]['Cantidad'];
                                $suma=$suma+$subtotal;
                                }
                        }
                       // var_dump($arreglocarrito);
                      
                       
                      ?>
                      <h5>Precio Total: </h5>
                      <?php echo '$'. number_format($suma,2)?>
                        </div>
                        <!--Pago-->
                        <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body bg-light">
                                <h5 class="card-title">Datos de Pago</h5>
                                <form>
                                    <div class="mb-2">
                                        <label for="nombre" class="form-label">Nombre: </label>
                                        <input type="text" class="form-control form-control-sm" id="txtnombre" autocomplete="off">
                                    </div>
                                    <div class="mb-2">
                                        <label for="apellido" class="form-label">Apellido: </label>
                                        <input type="text" class="form-control form-control-sm" id="textapellido" autocomplete="off">
                                    </div>
                                    <div class="mb-2">
                                        <label for="cnumero" class="form-label">Número de tarjeta: </label>
                                        <input type="text" class="form-control form-control-sm" id="txtnum" autocomplete="off">
                                    </div>
                                    <div class="mb-2">
                                        <label for="fecha" class="form-label">Fecha Expiración: </label>
                                        <input type="date" class="form-control form-control-sm" id="txtfecha" autocomplete="off">
                                        <label for="cvv" class="form-label">CVV: </label>
                                        <input type="text" class="form-control form-control-sm" id="txtcvv" autocomplete="off">
                                    </div>
                                    <div class="d-grid">
                                       <button class="btn btn-success" type="button" onclick=""><i class="bi bi-credit-card-2-front"> Procesar Pago</i></button>
                                       
                                    </div>

                                </form>

                            </div>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                        
