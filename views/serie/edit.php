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
                <div class="item_column">EDITAR SERIE</div>
                <div class="item_column"></div>
            </li>
            <?php
                require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PlataformaController.php');
                require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/SerieController.php');
                require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/ClasificacionController.php');
                require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/DirectorController.php');
                require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/GeneroController.php');
                require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PortadaController.php');
                $idISerie = $_GET['id'];
                $serieObjeto = obtenerSerie($idISerie);

                $sendData = false;
                $serieEditada = false;
                if(isset($_POST['botonEditar']))
                {
                    $sendData = true;
                }
                if($sendData)
                {
                    if(isset($_POST['titulo']) &&
                        isset($_POST['plataforma']) &&
                        isset($_POST['director']) &&
                        isset($_POST['clasificacion']) &&
                        isset($_POST['genero']) &&
                        isset($_POST['portada']))
                    {
                        $serieEditada = actualizarSerie(
                            $idISerie,
                            $_POST['titulo'],
                            $_POST['plataforma'],
                            $_POST['director'],
                            $_POST['clasificacion'],
                            $_POST['genero'],
                            $_POST['portada']
                        );
                    }

                    if($serieEditada)
                    {
                    ?>
                        <li class="table-success">
                            <div class="item_column">Serie editada correctamente.</div>
                        </li>
                    <?php
                    }
                    else
                    {
                    ?>
                        <li class="table-wrong">
                            <div class="item_column">
                                La serie no se ha editado correctamente.
                                <a href="edit.php?id=<?php echo $idISerie;?>"> Volver a intentarlo.</a>
                            </div>
                        </li>
                    <?php
                    }
                }
                else
                {
                    ?>
            <form name="editar_serie" action="" method="POST">
                <li class="table-row">
                    <div class="item_column">
                        <label for="titulo" class="form-label">Título</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="titulo" name="titulo" type="text" placeholder="Introduce el título de la serie" class="form-control" required
                        value="<?php if(isset($serieObjeto)) echo $serieObjeto->getTitulo(); ?>" />
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row">
                    <div class="item_column">
                        <label for="plataforma" class="form-label">Plataforma</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="plataforma" name="plataforma" required>
                            <?php
                            $listaPlataformas = listarPlataformas();
                            foreach ($listaPlataformas as $plataforma)
                            {
                                ?>
                                <option value="<?php echo $plataforma->getId(); ?>"
                                    <?php
                                    if(isset($serieObjeto))
                                    {
                                        $plataformaSeleccionada = $serieObjeto->getPlataformaId();
                                        if ($plataforma->getId() == $plataformaSeleccionada)
                                        {
                                            echo "selected";
                                        }
                                    }
                                    ?>>
                                    <?php echo $plataforma->getNombre(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row">
                    <div class="item_column">
                        <label for="director" class="form-label">Director</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="director" name="director" required>
                            <?php
                            $listaDirectores = listarDirectores();
                            foreach ($listaDirectores as $director)
                            {
                                ?>
                                <option value="<?php echo $director->getId(); ?>"
                                    <?php
                                    if(isset($serieObjeto))
                                    {
                                        $directorSeleccionado = $serieObjeto->getDirectorId();
                                        if ($director->getId() == $directorSeleccionado)
                                        {
                                            echo "selected";
                                        }
                                    }
                                    ?>>
                                    <?php echo $director->getNombre()." ".$director->getApellidos(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row">
                    <div class="item_column">
                        <label for="clasificacion" class="form-label">Clasificación</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="clasificacion" name="clasificacion" required>
                            <?php
                            $listaClasificaciones = listarClasificaciones();
                            foreach ($listaClasificaciones as $clasificacion)
                            {
                                ?>
                                <option value="<?php echo $clasificacion->getId(); ?>"
                                    <?php
                                    if(isset($serieObjeto))
                                    {
                                        $clasificacionSeleccionada = $serieObjeto->getClasificacionId();
                                        if ($clasificacion->getId() == $clasificacionSeleccionada)
                                        {
                                            echo "selected";
                                        }
                                    }
                                    ?>>
                                    <?php echo $clasificacion->getTipo(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row">
                    <div class="item_column">
                        <label for="genero" class="form-label">Género</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="genero" name="genero" required>
                            <?php
                            $listaGeneros = listarGeneros();
                            foreach ($listaGeneros as $genero)
                            {
                                ?>
                                <option value="<?php echo $genero->getId(); ?>"
                                    <?php
                                    if(isset($serieObjeto))
                                    {
                                        $generoSeleccionado = $serieObjeto->getGeneroId();
                                        if ($genero->getId() == $generoSeleccionado)
                                        {
                                            echo "selected";
                                        }
                                    }
                                    ?>>
                                <?php echo $genero->getNombre(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row">
                    <div class="item_column">
                        <label for="portada" class="form-label">Portada</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="portada" name="portada" required>
                            <?php
                            $listaPortadas = listarPortada();
                            foreach ($listaPortadas as $portada)
                            {
                                ?>
                                <option value="<?php echo $portada->getId(); ?>"
                                    <?php
                                    if(isset($serieObjeto))
                                    {
                                        $portadaSeleccionada = $serieObjeto->getPortadaId();
                                        if ($portada->getId() == $portadaSeleccionada)
                                        {
                                            echo "selected";
                                        }
                                    }
                                    ?>>
                                    <?php echo $portada->getId(); ?></option>
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