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
                <div class="item_column">EDITAR PELICULA</div>
                <div class="item_column"></div>
            </li>
            <?php
                require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PlataformaController.php');
                require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PeliculaController.php');
                require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/ClasificacionController.php');
                require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/DirectorController.php');
                require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/GeneroController.php');
                require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PortadaController.php');
                $idIPelicula = $_GET['id'];
                $peliculaObjeto = obtenerPelicula($idIPelicula);

                $sendData = false;
                $peliculaEditada = false;
                if(isset($_POST['botonEditar']))
                {
                    $sendData = true;
                }
                if($sendData)
                {
                    if(isset($_POST['titulo']) &&
                        isset($_POST['plataforma']) &&
                        isset($_POST['director']) &&
                        isset($_POST['puntuacion']) &&
                        isset($_POST['clasificacion']) &&
                        isset($_POST['genero']) &&
                        isset($_POST['portada']) &&
                        isset($_POST['horas']) &&
                        isset($_POST['minutos']) &&
                        isset($_POST['segundos']))
                    {
                        $duracion = intval($_POST['segundos']) + intval($_POST['minutos'])*60 + intval($_POST['horas']*3600);
                        $peliculaEditada = actualizarPelicula(
                            $idIPelicula,
                            $_POST['titulo'],
                            $_POST['plataforma'],
                            $_POST['director'],
                            intval($_POST['puntuacion']),
                            $_POST['clasificacion'],
                            $_POST['genero'],
                            $_POST['portada'],
                            $duracion
                        );
                    }

                    if($peliculaEditada)
                    {
                    ?>
                        <li class="table-success">
                            <div class="item_column">Pelicula editada correctamente.</div>
                        </li>
                    <?php
                    }
                    else
                    {
                    ?>
                        <li class="table-wrong">
                            <div class="item_column">
                                La pelicula no se ha editado correctamente.
                                <a href="edit.php?id=<?php echo $idIPelicula;?>"> Volver a intentarlo.</a>
                            </div>
                        </li>
                    <?php
                    }
                }
                else
                {
                    ?>
            <form name="editar_pelicula" action="" method="POST">
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="titulo" class="form-label">Título</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="titulo" name="titulo" type="text" placeholder="Introduce el título de la pelicula" class="form-control" required
                        value="<?php if(isset($peliculaObjeto)) echo $peliculaObjeto->getTitulo(); ?>" />
                    </div>
                </li>
                <li class="table-row-form">
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
                                    if(isset($peliculaObjeto))
                                    {
                                        $plataformaSeleccionada = $peliculaObjeto->getPlataformaId();
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
                </li>
                <li class="table-row-form">
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
                                    if(isset($peliculaObjeto))
                                    {
                                        $directorSeleccionado = $peliculaObjeto->getDirectorId();
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
                </li>
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="puntuacion" class="form-label">Puntuacion</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="puntuacion" name="puntuacion" type="number" min="0" max="10" placeholder="Introduce la puntuación de la pelicula" class="form-control" required
                        value="<?php if(isset($peliculaObjeto)) echo $peliculaObjeto->getPuntuacion(); ?>" />
                    </div>
                    
                </li>
                <li class="table-row-form">
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
                                    if(isset($peliculaObjeto))
                                    {
                                        $clasificacionSeleccionada = $peliculaObjeto->getClasificacionId();
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
                </li>
                <li class="table-row-form">
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
                                    if(isset($peliculaObjeto))
                                    {
                                        $generoSeleccionado = $peliculaObjeto->getGeneroId();
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
                </li>
                <li class="table-row-form">
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
                                    if(isset($peliculaObjeto))
                                    {
                                        $portadaSeleccionada = $peliculaObjeto->getPortadaId();
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
                </li>
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="duracion" class="form-label">Duración</label>
                    </div>
                    <?php if(isset($peliculaObjeto)) {
                        $duracionTotal = $peliculaObjeto->getDuracion();
                        $duracionHoras = floor($duracionTotal/3600);
                        $duracionMinutos = floor(($duracionTotal-$duracionHoras*3600)/60);
                        $duracionSegundos = floor(($duracionTotal-($duracionHoras*3600)-($duracionMinutos*60)));
                    } ?>
                    <div class="item_column_wide">
                        <input id="horas" name="horas" type="number" value="<?php echo $duracionHoras; ?>" placeholder="Introduce horas" min="0" class="form-control" required/>
                        <input id="minutos" name="minutos" type="number" value="<?php echo $duracionMinutos; ?>" placeholder="Introduce minutos" min="0" max="59" class="form-control" required/>
                        <input id="segundos" name="segundos" type="number" value="<?php echo $duracionSegundos; ?>" placeholder="Introduce segundos" min="0" max="59" class="form-control" required/>
                    </div>
                    
                </li>
                <input style="float: right;" type="submit" value="Editar" class="btn btn-primary" name="botonEditar" />
            </form>
                    <?php
                }
            ?>
        </ul>
    </div>
</div>