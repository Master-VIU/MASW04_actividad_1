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
                <div class="item_column">BORRADO</div>
                <div class="item_column"></div>
            </li>
        <?php
            require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/ActorController.php');
            require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/SerieActorController.php');
            require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PeliculaActorController.php');
            $actorId = $_POST['actformId'];

            $actorSeries = listarSeriesDeActor($actorId);
            $actorIdiomas = listarPeliculasDeActor($actorId);

            if (count($actorSeries) > 0 || count($actorIdiomas) > 0) {
                ?>
                <li class="table-warning">
                    <div class="item_column">No se puede borrar el actor, ya que esta vinculado a series y/o peliculas.</div>
                </li>
                <?php
            }
            else
            {
                $actorEliminado = eliminarActor($actorId);
                if($actorEliminado)
                {
                    ?>
                    <li class="table-success">
                        <div class="item_column">Actor eliminado con éxito!</div>
                    </li>
                    <?php
                }
                else
                {
                    ?>
                    <li class="table-wrong">
                        <div class="item_column">El actor no se ha borrado correctamente. Inténtalo de nuevo.</div>
                    </li>
                    <?php
                }
            }
        ?>
        </ul>
    </div>
</div>