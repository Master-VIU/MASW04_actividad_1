<div>
    <link rel="stylesheet" href="../styles/biblioteca.css" type="text/css">
    <link rel="stylesheet" href="../styles/bootstrap.css" type="text/css">
    <div class="table_container">
        <ul class="items_table">
            <li class="table-title">
                <div class="item_column">
                    <a class="btn btn-success" href="index.php">
                        Volver
                    </a>
                </div>
                <div class="item_column">EDITAR CLASIFICACIÓN</div>
                <div class="item_column"></div>
            </li>
            <?php
            require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/ClasificacionController.php');
                $idClasificacion = $_GET['id'];
                $clasificacionObjeto = obtenerClasificacion($idClasificacion);

                $sendData = false;
                $clasificacionEditada = false;
                if(isset($_POST['botonEditar']))
                {
                    $sendData = true;
                }
                if($sendData)
                {
                    if(isset($_POST['tipo']))
                    {
                        $clasificacionEditada = actualizarClasificacion($_POST['clasformId'], $_POST['tipo']);
                    }

                    if($clasificacionEditada)
                    {
                    ?>
                        <li class="table-success">
                            <div class="item_column">Clasificación editada correctamente.</div>
                        </li>
                    <?php
                    }
                    else
                    {
                    ?>
                        <li class="table-wrong">
                            <div class="item_column">
                                La clasificación no se ha editado correctamente.
                                <a href="edit.php?id=<?php echo $idClasificacion;?>"> Volver a intentarlo.</a>
                            </div>
                        </li>
                    <?php
                    }
                }
                else
                {
                    ?>
            <form name="editar_clasificacion" action="" method="POST">
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="tipo" class="form-label">Nombre</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="tipo" name="tipo" type="text" placeholder="Introduce el tipo de clasificacion" class="form-control"
                               required value="<?php if(isset($clasificacionObjeto)) echo $clasificacionObjeto->getTipo();?>" />
                        <input type="hidden" name="clasformId" value="<?php echo $idClasificacion;?>"/>
                    </div>
                    <div class="item_column"></div>
                </li>
                <input style="float: right;" type="submit" value="Editar" class="btn btn-primary" name="botonEditar" />
            </form>

                    <?php
                }
            ?>
        </ul>
    </div>
</div>