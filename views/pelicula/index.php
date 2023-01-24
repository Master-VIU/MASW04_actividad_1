<div>
    <link rel="stylesheet" href="../styles/main.css" type="text/css">
    <?php
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PeliculaController.php');
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
                        <div class="item_column">Id</div>
                        <div class="item_column">Titulo</div>
                        <div class="item_column">Plataforma Id</div>
                        <div class="item_column">Director Id</div>
                        <div class="item_column">Puntuacion</div>
                        <div class="item_column">Clasificacion Id</div>
                        <div class="item_column">Genero Id</div>
                        <div class="item_column">Portada Id</div>
                        <div class="item_column">Duracion</div>
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
                                <div class="item_column" data-label="Id"><?php echo $pelicula->getId(); ?></div>
                                <div class="item_column" data-label="Titulo"><?php echo $pelicula->getTitulo(); ?></div>
                                <div class="item_column" data-label="PlataformaId"><?php echo $pelicula->getPlataformaId(); ?></div>
                                <div class="item_column" data-label="DirectorId"><?php echo $pelicula->getDirectorId(); ?></div>
                                <div class="item_column" data-label="Puntuacion"><?php echo $pelicula->getPuntuacion(); ?></div>
                                <div class="item_column" data-label="ClasificacionId"><?php echo $pelicula->getClasificacionId(); ?></div>
                                <div class="item_column" data-label="GeneroId"><?php echo $pelicula->getGeneroId(); ?></div>
                                <div class="item_column" data-label="PortadaId"><?php echo $pelicula->getPortadaId(); ?></div>
                                <div class="item_column" data-label="Duracion"><?php echo $pelicula->getDuracion(); ?></div>
                                <div class="item_column" data-label="Acciones">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-success" href="edit.php?id=<?php echo $pelicula->getId(); ?>">
                                            Editar
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