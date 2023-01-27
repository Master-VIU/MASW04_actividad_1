<div>
    <link rel="stylesheet" href="../styles/biblioteca.css" type="text/css">
    <div class="table_container">
        <ul class="items_table">
            <li class="table-title">
                <div class="item_column">
                    <a class="btn btn-success" href="index.php">
                        Volver
                    </a>
                </div>
                <div class="item_column">EDITAR GÉNERO</div>
                <div class="item_column"></div>
            </li>
            <?php
            require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/GeneroController.php');
                $idGenero = $_GET['id'];
                $generoObjeto = obtenerGenero($idGenero);

                $sendData = false;
                $generoEditado = false;
                if(isset($_POST['botonEditar']))
                {
                    $sendData = true;
                }
                if($sendData)
                {
                    if(isset($_POST['genero']))
                    {
                        $generoEditado = actualizarGenero($_POST['genformId'], $_POST['genero']);
                    }

                    if($generoEditado)
                    {
                    ?>
                        <li class="table-success">
                            <div class="item_column">Género editado correctamente.</div>
                        </li>
                    <?php
                    }
                    else
                    {
                    ?>
                        <li class="table-wrong">
                            <div class="item_column">
                                El género no se ha editado correctamente.
                                <a href="edit.php?id=<?php echo $idGenero;?>"> Volver a intentarlo.</a>
                            </div>
                        </li>
                    <?php
                    }
                }
                else
                {
                    ?>
            <form name="editar_genero" action="" method="POST">
                <li class="table-row">
                    <div class="item_column">
                        <label for="genero" class="form-label">Nombre</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="genero" name="genero" type="text" placeholder="Introduce el genero" class="form-control"
                               required value="<?php if(isset($generoObjeto)) echo $generoObjeto->getNombre();?>" />
                        <input type="hidden" name="genformId" value="<?php echo $idGenero;?>"/>
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