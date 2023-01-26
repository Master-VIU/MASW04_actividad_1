<div>
    <link rel="stylesheet" href="../styles/main.css" type="text/css">
    <?php
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/SerieActorController.php');
       // require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/SerieController.php');
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
                        <div class="item_column">SERIE - ACTORES</div>
                        <div class="item_column">
                            <a class="btn btn-success" href="new.php">
                                Crear
                            </a>
                        </div>
                    </li>
                    <li class="table-header">
                        <div class="item_column">SERIE</div>
                        <div class="item_column">ACTOR</div>
                        <div class="item_column_wide">Acciones</div>
                    </li>
                    <?php
                    $listaSerieActor = listarSerieActores();

                    if (count($listaSerieActor) > 0)
                    {
                    foreach($listaSerieActor as $serieActor)
                        {
                        ?>
                            <li class="table-row">
                                <div class="item_column" data-label="Serie">
                                <?php
                               // echo obtenerSerie($serieActor->getIdSerie())->getTitulo();
                                ?></div>                                
                                <div class="item_column" data-label="Actor">
                                    <?php 
                                    echo obtenerActor($serieActor->getIdActor())->getNombre() ." ".obtenerActor($serieActor->getIdActor())->getApellidos(); 
                                    ?></div>
                                <div class="item_column_wide" data-label="Acciones">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-success" href="edit.php?id=<?php echo $serieActor->getIdSerie(); ?>">
                                            Editar
                                        </a>
                                        <form name="delete-serieActor" action="delete.php" method="POST" style="...">
                                            <input type="hidden" name="serieActorformId" value="<?php echo $serieActor->getIdSerie();?>"/>
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