<div>
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/SerieActorController.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/SerieController.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/ActorController.php');
    ?>
    <link rel="stylesheet" href="../styles/biblioteca.css" type="text/css">
    <link rel="stylesheet" href="../styles/bootstrap.css" type="text/css">
    <div class="table_container">
        <ul class="items_table">
            <?php
            if (isset($_GET['id'])) {
            $idSerie = $_GET['id'];

            $sendData = false;
            $serieActorDesvinculado = false;
            if (isset($_POST['botonDesvincular'])) {
                $sendData = true;
            }
            if ($sendData)
            {
                if (isset($_POST['actorId'])) {
                    $serieActorDesvinculado = eliminarSerieActor($idSerie, $_POST['actorId']);
                }

                if ($serieActorDesvinculado) {
                    ?>
                    <li class="table-success">
                        <div class="item_column">Actor desvinculado de <?php
                            $serie = obtenerSerie($idSerie);
                            echo $serie->getTitulo();
                            ?> correctamente.
                        </div>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="table-wrong">
                        <div class="item_column">
                            No se ha podido desvincular al actor de <?php
                            $serie = obtenerSerie($idSerie);
                            echo $serie->getTitulo();
                            ?>.
                        </div>
                    </li>
                    <?php
                }
            }
            ?>
            <li class="table-title">
                <div class="item_column">
                    <a class="btn btn-success" href="../serie/index.php">
                        Volver
                    </a>
                </div>
                <div class="item_column_wide">ACTORES de
                    <?php
                    $serie = obtenerSerie($idSerie);
                    echo $serie->getTitulo();
                    ?></div>
                <div class="item_column">
                    <a class="btn btn-success" href="new.php?id=<?php echo $serie->getId(); ?>">
                        Añadir Actor
                    </a>
                </div>
            </li>
            <li class="table-header-center">
                <div class="item_column">ACTOR</div>
                <div class="item_column_wide">Acciones</div>
            </li>
            <?php
            $listaSerieActores = listarActoresDeSerie($idSerie);

            if (count($listaSerieActores) > 0) {
                foreach ($listaSerieActores as $serieActores) {
                    ?>
                    <li class="table-row-form">
                        <div class="item_column" data-label="Actor">
                            <?php
                            $actorSerie = obtenerActor($serieActores->getIdActor());
                            echo $actorSerie->getNombre() . " " . $actorSerie->getApellidos();
                            ?></div>
                        <div class="item_column"></div>
                        <div class="item_column_wide" data-label="Acciones">
                            <div class="btn-group" role="group">
                                <form name="desvincular-serie-actor" action="" method="POST" style="...">
                                    <input type="hidden" name="actorId" value="<?php echo $actorSerie->getId(); ?>"/>
                                    <input style="float: right;" type="submit" value="Desvincular"
                                           class="btn btn-primary" name="botonDesvincular"/>
                                </form>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            } else {
                ?>
                <li class="table-warning">
                    <div class="item_column">No hay actores vinculados a esta serie.</div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
<?php
}
else {
    ?>
    <div class="alerta alerta-warning" role="alert">
        Esta vista se ha abierto incorrectamente. Para acceder, primero entre en "Series" y despues en "Actores".
    </div>
    <?php
}
?>
</div>