<?php
include('views/layouts/header.php');
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
                                        if (isset($_SESSION['carrito'])) {
                                            $arreglocarrito = $_SESSION['carrito'];
                                            for ($i = 0; $i < count($arreglocarrito); $i++) {

                                        ?>
                                                <div class="card-body">
                                                    <div class="row">

                                                        <div class="col-sm-2 align-self-center d-flex justify-content-center">
                                                            <!--imagen-->
                                                            <img class="rounded" src="<?php echo './recursos/img/' . $arreglocarrito[$i]['Imagen'] ?>" style="width:100px;height:100px" />
                                                        </div>

                                                        <div class="col-sm-4 align-self-center">
                                                            <span class="font-wight-bold d-block"></span>
                                                            <span><?php echo $arreglocarrito[$i]['Nombre'] ?></span>
                                                        </div>

                                                        <div class="col-sm-2 align-self-center">
                                                            <span>$<?php echo  $arreglocarrito[$i]['Precio'] ?></span>
                                                        </div>

                                                        <div class="col-sm-2 align-self-center">
                                                            <div class="d-flex">
                                                                <a class="btn btn-outline-secondary btn-restar rounded-0" href="?c=Principal&a=restar&id=<?php echo $arreglocarrito[$i]['Id']; ?>"><i class="bi bi-dash"></i></a>
                                                                <input class="form-control input-cantidad p-1 text-center rounded-0" disabled style="width:40px" value="<?php echo $arreglocarrito[$i]['Cantidad'] ?>" />
                                                                <a class="btn btn-outline-secondary btn-sumar rounded-0" href="?c=Principal&a=sumar&id=<?php echo $arreglocarrito[$i]['Id']; ?>"><i class="bi bi-plus"></i></a>
                                                            </div>


                                                        </div>
                                                        <div class="col-sm-2 align-self-center">
                                                            <a class="btn btn-outline-danger " href="?c=Principal&a=borrar&id=<?php echo $arreglocarrito[$i]['Id']; ?>"><i class="bi bi-trash"></i></a>
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
                            $suma = 0;
                            if ($arreglocarrito > 0) {
                                for ($i = 0; $i < count($arreglocarrito); $i++) {
                                    $subtotal = $arreglocarrito[$i]['Precio'] * $arreglocarrito[$i]['Cantidad'];
                                    $suma = $suma + $subtotal;
                                }
                            }
                            // var_dump($arreglocarrito);


                            ?>
                            <h5>Precio Total: </h5>
                            <?= '$' . number_format($suma, 2) ?>
                        </div>
                        <!--Pago-->
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body bg-light">
                                    <h5 class="card-title">Datos de Pago</h5>
                                    <?php
                                    $errors = [];
                                    $validate = -1;
                                    include_once '../../helpers/validate.php';
                                    ?>

                                    <form action="<?= $_SERVER['PHP_SELF']. '?c=Principal&a=carrito' ?>" method="POST">
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre: </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                <input type="text" class="form-control form-control-sm" name="nombre" value="<?= $validate == -1 ? '' : $_POST["nombre"] ?>">
                                            </div>
                                            <?= $validate == 0 ? "<p class='text-danger'>" . $errors['nombre'] . "</p>" : "" ?>
                                        </div>

                                        <div class="mb-3">
                                            <label for="apellido" class="form-label">Apellido: </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                <input type="text" class="form-control form-control-sm" name="apellido" value="<?= $validate == -1 ? '' : $_POST["apellido"] ?>">
                                            </div>
                                            <?= $validate == 0 ? "<p class='text-danger'>" . $errors['apellido'] . "</p>" : "" ?>
                                        </div>

                                        <div class="mb-3">
                                            <label for="cnumero" class="form-label">Número de tarjeta: </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-credit-card"></i></span>
                                                <input type="text" class="form-control form-control-sm" name="numTarjeta" value="<?= $validate == -1 ? '' : $_POST["numTarjeta"] ?>" id="credit-num">
                                            </div>
                                            <?= $validate == 0 ? "<p class='text-danger'>" . $errors['numTarjeta'] . "</p>" : "" ?>
                                            <script src="./recursos/js/inputCreditCard.js"></script>
                                        </div>

                                        <div class="mb-3">
                                            <label for="fecha" class="form-label">Fecha Expiración: </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                                <input type="date" class="form-control form-control-sm" name="fechaExp" value="<?= $validate == -1 ? '' : $_POST["fechaExp"] ?>">
                                            </div>
                                            <?= $validate == 0 ? "<p class='text-danger'>" . $errors['fechaExp'] . "</p>" : "" ?>
                                        </div>

                                        <div class="mb-3">
                                            <label for="cvv" class="form-label">CVV: </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-credit-card-2-back"></i></span>
                                                <input type="text" class="form-control form-control-sm" name="cvv" value="<?= $validate == -1 ? '' : $_POST["cvv"] ?>">
                                            </div>
                                            <?= $validate == 0 ? "<p class='text-danger'>" . $errors['cvv'] . "</p>" : "" ?>
                                        </div>

                                        <div class="d-grid">
                                            <button class="btn btn-success" type="submit" name="pagar"><i class="bi bi-credit-card-2-front"> Procesar Pago</i></button>
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