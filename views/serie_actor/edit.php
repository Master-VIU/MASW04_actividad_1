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
                <div class="item_column">EDITAR REGISTRO</div>
                <div class="item_column"></div>
            </li>
            <?php
             require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/SerieActorController.php');
             // require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/SerieController.php');
             require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/ActorController.php');
                $idSerieActor = $_GET['id'];
                $serieActorObjeto = obtenerSerieActor($idSerieActor);

                $sendData = false;
                $serieActorEditada = false;
                if(isset($_POST['botonEditar']))
                {
                    $sendData = true;
                }
                if($sendData)
                {
                    if(isset($_POST['editarSerie']) && isset($_POST['editarActor']))
                    {
                        $serieActorEditada = actualizarSerieActor($_POST['editarSerie'], $_POST['editarActor']);
                    }

                    if($serieActorEditada)
                    {
                    ?>
                        <li class="table-success">
                            <div class="item_column">Registro editado correctamente.</div>
                        </li>
                    <?php
                    }
                    else
                    {
                    ?>
                        <li class="table-wrong">
                            <div class="item_column">
                                El registro no se ha editado correctamente.
                                <a href="edit.php?id=<?php echo $idSerieActor;?>"> Volver a intentarlo.</a>
                            </div>
                        </li>
                    <?php
                    }
                }
                else
                {
                ?>
            <form name="editar_serieActor" action="" method="POST">
            <li class="table-row">
                    <div class="item_column">
                        <label for="editarSerie" class="form-label">Serie</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="editarSerie" name="editarSerie" required>
                            <?php
                            //$listaSeries = listarSeries();
                           // foreach ($listaSeries as $serie)
                            {
                                ?>
                                <option value="<!?php echo $serie->getId(); ?>"
                                        <?php
                                       // if(isset($serieActorObjeto))
                                        {
                                          //  $serieSeleccionada = $serieActorObjeto->getIdSerie();
                                          //  if ($serie->getId() == $serieSeleccionada)
                                            {
                                                echo "selected";
                                            }
                                        }
                                        ?>>
                                   <!-- <!?php echo $serie->getTitulo(); ?></option>-->
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row">
                    <div class="item_column">
                        <label for="editarActor" class="form-label">Actor</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="editarActor" name="editarActor" required>
                            <?php
                            $listaActores = listarActores();
                            foreach ($listaActores as $actor)
                            {
                                ?>
                                <option value="<?php echo $actor->getId(); ?>"
                                        <?php
                                        if(isset($serieActorObjeto))
                                        {
                                            $actorSeleccionado = $serieActorObjeto->getIdActor();
                                            if ($actor->getId() == $actorSeleccionado)
                                            {
                                                echo "selected";
                                            }
                                        }
                                        ?>>
                                    <?php echo $actor->getNombre() ." ".$actor->getApellidos(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
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