<div>
    <link rel="stylesheet" href="../styles/biblioteca.css" type="text/css">
    <?php
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PeliculaController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PlataformaController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/ClasificacionController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/DirectorController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/GeneroController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PortadaController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PeliculaIdiomaController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/IdiomaController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PeliculaActorController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/ActorController.php');
    ?>
            <div class="table_container">
                <ul class="items_table">
                    <li class="table-title">
                        <div class="item_column">
                            <a class="btn btn-success" href="../">
                                Volver
                            </a>
                        </div>
                        <div class="item_column">PELICULAS</div>
                        <div class="item_column">
                            <a class="btn btn-success" href="new.php">
                                Crear
                            </a>
                        </div>
                    </li>
                    <li class="table-header">
                        <div class="item_column_small">Id</div>
                        <div class="item_column">Titulo</div>
                        <div class="item_column">Plataforma</div>
                        <div class="item_column">Director</div>
                        <div class="item_column">Puntuacion</div>
                        <div class="item_column">Clasificacion</div>
                        <div class="item_column">Genero</div>
                        <div class="item_column">Portada</div>
                        <div class="item_column">Duracion</div>
                        <div class="item_column">Idiomas</div>
                        <div class="item_column">Actores</div>
                        <div class="item_column">Acciones</div>
                    </li>
                    <?php
                    $listaPeliculas = listarPeliculas();

                    if (count($listaPeliculas) > 0)
                    {
                    foreach($listaPeliculas as $pelicula)
                        {
                        ?>
                            <li class="table-row">
                                <div class="item_column_small" data-label="Id"><?php echo $pelicula->getId(); ?></div>
                                <div class="item_column" data-label="Titulo"><?php echo $pelicula->getTitulo(); ?></div>
                                <div class="item_column" data-label="PlataformaId">
                                    <?php echo obtenerPlataforma($pelicula->getPlataformaId())->getNombre(); ?>
                                </div>
                                <div class="item_column" data-label="DirectorId">
                                    <?php $director = obtenerDirector($pelicula->getDirectorId());
                                    echo $director->getNombre()." ".$director->getApellidos(); ?>
                                </div>
                                <div class="item_column" data-label="Puntuacion"><?php echo $pelicula->getPuntuacion(); ?></div>
                                <div class="item_column" data-label="ClasificacionId">
                                    <?php echo obtenerClasificacion($pelicula->getClasificacionId())->getTipo(); ?>
                                </div>
                                <div class="item_column" data-label="GeneroId">
                                    <?php echo obtenerGenero($pelicula->getGeneroId())->getNombre(); ?>
                                </div>
                                <div class="item_column" data-label="PortadaId">
                                    <?php $portada = obtenerPortada($pelicula->getPortadaId()); ?>
                                    <img src="http://localhost:8888/MASW04_actividad_1<?php echo $portada->getImagen(); ?>"
                                    width="150" height="150"/>
                                </div>
                                <div class="item_column" data-label="Duracion">
                                    <?php echo gmdate("H:i:s", $pelicula->getDuracion()); ?>
                                </div>
                                <div class="item_column" data-label="Idiomas">
                                    <?php
                                        $listaIdiomasPelicula = "";

                                        $listaIdiomasPelicula .= "AUDIO"."<br/>";
                                        $listaAudio = listarPeliculaIdiomasTipo($pelicula->getId(), "AUDIO");

                                        if (count($listaAudio) > 0)
                                        {
                                            foreach ($listaAudio as $audio)
                                            {
                                                $listaIdiomasPelicula .= obtenerIdioma($audio->getIdIdioma())->getNombre()."<br/>";
                                            }
                                            $listaIdiomasPelicula .="<br/>";
                                        }
                                        else
                                        {
                                            $listaIdiomasPelicula .= "-<br/><br/>";
                                        }

                                        $listaIdiomasPelicula .= "SUBTITULO"."<br/>";
                                        $listaSubtitulo = listarPeliculaIdiomasTipo($pelicula->getId(), "SUBTITULO");

                                        if (count($listaSubtitulo) > 0)
                                        {
                                            foreach ($listaSubtitulo as $subtitulo)
                                            {
                                                $listaIdiomasPelicula .= obtenerIdioma($subtitulo->getIdIdioma())->getNombre()."<br/>";
                                            }
                                            $listaIdiomasPelicula .= "<br/>";
                                        }
                                        else
                                        {
                                            $listaIdiomasPelicula .= "-<br/><br/>";
                                        }


                                        echo $listaIdiomasPelicula;
                                    ?>
                                </div>
                                <div class="item_column" data-label="Actores">
                                    <?php
                                    $listaActoresPelicula = "";

                                    $listaActores = listarActoresDePelicula($pelicula->getId());

                                    if (count($listaActores) > 0)
                                    {
                                        foreach ($listaActores as $actorPelicula)
                                        {
                                            $actor = obtenerActor($actorPelicula->getIdActor());
                                            $listaActoresPelicula .= $actor->getNombre()." ".$actor->getApellidos()."<br/>";
                                        }
                                        $listaActoresPelicula .="<br/>";
                                    }
                                    else
                                    {
                                        $listaActoresPelicula .= "-<br/><br/>";
                                    }

                                    echo $listaActoresPelicula;
                                    ?>
                                </div>
                                <div class="item_column" data-label="Acciones">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-success" href="edit.php?id=<?php echo $pelicula->getId(); ?>">
                                            Editar
                                        </a>
                                        <a class="btn btn-success" href="../pelicula_actor/index.php?id=<?php echo $pelicula->getId(); ?>">
                                            Actores
                                        </a>
                                        <a class="btn btn-success" href="../pelicula_idioma/index.php?id=<?php echo $pelicula->getId(); ?>">
                                            Idiomas
                                        </a>
                                        <form name="delete-pelicula" action="delete.php" method="POST" style="...">
                                            <input type="hidden" name="peliculaId" value="<?php echo $pelicula->getId();?>"/>
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <li class="table-wrong">
                        <div class="item_column">Aun no existen peliculas.</div>
                    </li>
                    <?php
                }
                ?>
                </ul>
            </div>
</div>