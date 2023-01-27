<div>
    <link rel="stylesheet" href="../styles/main.css" type="text/css">
    <?php
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PeliculaActorController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PeliculaController.php');
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
                        <div class="item_column">PELICULA ACTORES</div>
                        <div class="item_column">
                            <a class="btn btn-success" href="new.php">
                                Crear
                            </a>
                        </div>
                    </li>
                    <li class="table-header">
                        <div class="item_column">PELICULA</div>
                        <div class="item_column">ACTOR</div>
                        <div class="item_column_wide">Acciones</div>
                    </li>
                    <?php
                    $listaPeliculaActores = listarPeliculaActores();

                    if (count($listaPeliculaActores) > 0)
                    {
                    foreach($listaPeliculaActores as $peliculaActores)
                        {
                        ?>
                            <li class="table-row">
                                <div class="item_column" data-label="Pelicula">
                                <?php
                                echo obtenerPelicula($peliculaActores->getIdPelicula())->getTitulo();
                                ?></div>                                
                                <div class="item_column" data-label="Actor">
                                    <?php 
                                    echo obtenerActor($peliculaActores->getIdActor())->getNombre() ." " . obtenerActor($peliculaActores->getIdActor())->getApellidos(); 
                                    ?></div>
                                <div class="item_column_wide" data-label="Acciones">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-success" href="edit.php?id=<?php echo $peliculaActores->getIdPelicula(); ?>">
                                            Editar
                                        </a>
                                        <form name="delete-peliculaActores" action="delete.php" method="POST" style="...">
                                            <input type="hidden" name="peliActformId" value="<?php echo $peliculaActores->getIdPelicula();?>"/>
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
    <?php
        }
        else
        {
    ?>
            <div class="alerta alerta-warning" role="alert">
                Aun no existen registros.
            </div>
    <?php
        }
    ?>
</div>