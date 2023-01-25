<div>
    <link rel="stylesheet" href="../styles/main.css" type="text/css">
    <div class="table_container">
        <ul class="items_table">
            <li class="table-title">
                <div class="item_column">
                    <a class="btn btn-success" href="index.php">
                        Volver
                    </a>
                </div>
                <div class="item_column">EDITAR NACIONALIDAD</div>
                <div class="item_column"></div>
            </li>
            <?php
            require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/NacionalidadController.php');
                $idNacionalidad = $_GET['id'];
                $nacionalidadObjeto = obtenerNacionalidad($idNacionalidad);

                $sendData = false;
                $nacionalidadEditada = false;
                if(isset($_POST['botonEditar']))
                {
                    $sendData = true;
                }
                if($sendData)
                {
                    if(isset($_POST['editarNacionalidad']))
                    {
                        $nacionalidadEditada = actualizarNacionalidad($_POST['nacformId'], $_POST['editarNacionalidad']);
                    }

                    if($nacionalidadEditada)
                    {
                    ?>
                        <li class="table-success">
                            <div class="item_column">Nacionalidad editada correctamente.</div>
                        </li>
                    <?php
                    }
                    else
                    {
                    ?>
                        <li class="table-wrong">
                            <div class="item_column">
                                La nacionalidad no se ha editado correctamente.
                                <a href="edit.php?id=<?php echo $idNacionalidad;?>"> Volver a intentarlo.</a>
                            </div>
                        </li>
                    <?php
                    }
                }
                else
                {
                    ?>
            <form name="editar_nacionalidad" action="" method="POST">
                <li class="table-row">
                    <div class="item_column">
                        <label for="editarNacionalidad" class="form-label">País</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="editarNacionalidad" name="editarNacionalidad" type="text" placeholder="Introduce el nombre del país" class="form-control"
                               required value="<?php if(isset($nacionalidadObjeto)) echo $nacionalidadObjeto->getPais();?>" />
                        <input type="hidden" name="nacformId" value="<?php echo $idNacionalidad;?>"/>
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