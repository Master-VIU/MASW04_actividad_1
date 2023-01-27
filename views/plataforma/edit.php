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
                <div class="item_column">EDITAR PLATAFORMA</div>
                <div class="item_column"></div>
            </li>
            <?php
            require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PlataformaController.php');
                $idIPlataforma = $_GET['id'];
                $plataformaObjeto = obtenerPlataforma($idIPlataforma);

                $sendData = false;
                $plataformaEditada = false;
                if(isset($_POST['botonEditar']))
                {
                    $sendData = true;
                }
                if($sendData)
                {
                    if(isset($_POST['editarPlataforma']))
                    {
                        $plataformaEditada = actualizarPlataforma($_POST['platafromaId'], $_POST['editarPlataforma']);
                    }

                    if($plataformaEditada)
                    {
                    ?>
                        <li class="table-success">
                            <div class="item_column">Plataforma editada correctamente.</div>
                        </li>
                    <?php
                    }
                    else
                    {
                    ?>
                        <li class="table-wrong">
                            <div class="item_column">
                                La plataforma no se ha editado correctamente.
                                <a href="edit.php?id=<?php echo $idIPlataforma;?>"> Volver a intentarlo.</a>
                            </div>
                        </li>
                    <?php
                    }
                }
                else
                {
                    ?>
            <form name="editar_plataforma" action="" method="POST">
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="editarPlataforma" class="form-label">Nombre</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="editarPlataforma" name="editarPlataforma" type="text" placeholder="Introduce el nombre de la plataforma" class="form-control"
                               required value="<?php if(isset($plataformaObjeto)) echo $plataformaObjeto->getNombre();?>" />
                        <input type="hidden" name="platafromaId" value="<?php echo $idIPlataforma;?>"/>
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