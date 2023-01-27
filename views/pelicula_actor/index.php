<div>
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/PeliculaActorController.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/PeliculaController.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/ActorController.php');
    ?>
    <link rel="stylesheet" href="../styles/biblioteca.css" type="text/css">
    <link rel="stylesheet" href="../styles/bootstrap.css" type="text/css">
    <div class="table_container">
        <ul class="items_table">
            <?php
            if (isset($_GET['id'])) {
            $idPelicula = $_GET['id'];

            $sendData = false;
            $peliculaActorDesvinculado = false;
            if (isset($_POST['botonDesvincular'])) {
                $sendData = true;
            }
            if ($sendData)
            {
                if (isset($_POST['actorId'])) {
                    $peliculaActorDesvinculado = eliminarPeliculaActor($idPelicula, $_POST['actorId']);
                }

                if ($peliculaActorDesvinculado) {
                    ?>
                    <li class="table-success">
                        <div class="item_column">Actor desvinculado de <?php
                            $pelicula = obtenerPelicula($idPelicula);
                            echo $pelicula->getTitulo();
                            ?> correctamente.
                        </div>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="table-wrong">
                        <div class="item_column">
                            No se ha podido desvincular al actor de <?php
                            $pelicula = obtenerPelicula($idPelicula);
                            echo $pelicula->getTitulo();
                            ?>.
                        </div>
                    </li>
                    <?php
                }
            }
            ?>
            <li class="table-title">
                <div class="item_column">
                    <a class="btn btn-success" href="../pelicula/index.php">
                        Volver
                    </a>
                </div>
                <div class="item_column_wide">ACTORES de
                    <?php
                    $pelicula = obtenerPelicula($idPelicula);
                    echo $pelicula->getTitulo();
                    ?></div>
                <div class="item_column">
                    <a class="btn btn-success" href="new.php?id=<?php echo $pelicula->getId(); ?>">
                        Añadir Actor
                    </a>
                </div>
            </li>
            <li class="table-header-center">
                <div class="item_column">ACTOR</div>
                <div class="item_column_wide">Acciones</div>
            </li>
            <?php
            $listaPeliculaActores = listarActoresDePelicula($idPelicula);

            if (count($listaPeliculaActores) > 0) {
                foreach ($listaPeliculaActores as $peliculaActores) {
                    ?>
                    <li class="table-row-form">
                        <div class="item_column" data-label="Actor">
                            <?php
                            $actorPelicula = obtenerActor($peliculaActores->getIdActor());
                            echo $actorPelicula->getNombre() . " " . $actorPelicula->getApellidos();
                            ?></div>
                        <div class="item_column"></div>
                        <div class="item_column_wide" data-label="Acciones">
                            <div class="btn-group" role="group">
                                <form name="desvincular-pelicula-actor" action="" method="POST" style="...">
                                    <input type="hidden" name="actorId" value="<?php echo $actorPelicula->getId(); ?>"/>
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
                    <div class="item_column">No hay actores vinculados a esta pelicula.</div>
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
        Esta vista se ha abierto incorrectamente. Para acceder, primero entre en "Peliculas" y despues en "Actores".
    </div>
    <?php
}
?>
</div>