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
                <div class="item_column">EDITAR REGISTRO</div>
                <div class="item_column"></div>
            </li>
            <?php
            require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PeliculaActorController.php');
            require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/ActorController.php');
            require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PeliculaController.php');
                $idPeliculaActor = $_GET['id'];
                $peliculaActorObjeto = obtenerPeliculaActor($idPeliculaActor);

                $sendData = false;
                $peliculaActorEditada = false;
                if(isset($_POST['botonEditar']))
                {
                    $sendData = true;
                }
                if($sendData)
                {
                    if(isset($_POST['editarPelicula']) && isset($_POST['editarActor']))
                    {
                        $peliculaActorEditada = actualizarPeliculaActor($_POST['editarPelicula'], $_POST['editarActor']);
                    }

                    if($peliculaActorEditada)
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
                                <a href="edit.php?id=<?php echo $idPeliculaActor;?>"> Volver a intentarlo.</a>
                            </div>
                        </li>
                    <?php
                    }
                }
                else
                {
                ?>
            <form name="editar_peliculaActor" action="" method="POST">
            <li class="table-row">
                    <div class="item_column">
                        <label for="editarPelicula" class="form-label">Pelicula</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="editarPelicula" name="editarPelicula" required>
                            <?php
                            $listaPeliculas = listarPeliculas();
                            foreach ($listaPeliculas as $pelicula)
                            {
                                ?>
                                <option value="<?php echo $pelicula->getId(); ?>"
                                        <?php
                                        if(isset($peliculaActorObjeto))
                                        {
                                            $peliculaSeleccionada = $peliculaActorObjeto->getIdPelicula();
                                            if ($pelicula->getId() == $peliculaSeleccionada)
                                            {
                                                echo "selected";
                                            }
                                        }
                                        ?>>
                                    <?php echo $pelicula->getTitulo(); ?></option>
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
                                        if(isset($peliculaActorObjeto))
                                        {
                                            $actorSeleccionada = $peliculaActorObjeto->getIdActor();
                                            if ($actor->getId() == $actorSeleccionada)
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