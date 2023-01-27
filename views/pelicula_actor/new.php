<div>
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/PeliculaActorController.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/ActorController.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/PeliculaController.php');
    ?>
    <link rel="stylesheet" href="../styles/main.css" type="text/css">
    <div class="table_container">
        <ul class="items_table">
            <?php
            if (isset($_GET['id'])) {
            $idPelicula = $_GET['id'];
            $sendData = false;
            $peliculaActorVinculado = false;
            if (isset($_POST['botonVincular'])) {
                $sendData = true;
            }
            if ($sendData) {
            if (isset($_POST['actorId'])) {
                $peliculaActorVinculado = crearPeliculaActor($idPelicula, $_POST['actorId']);
            }

            if ($peliculaActorVinculado) {
            ?>
            <li class="table-success">
                <div class="item_column">Actor vinculado a <?php
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
                    No se ha podido vincular al actor con <?php
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
                    <a class="btn btn-success" href="index.php?id=<?php echo $pelicula->getId(); ?>">
                        Volver
                    </a>
                </div>
                <div class="item_column">VINCULAR NUEVO ACTOR</div>
                <div class="item_column"></div>
            </li>
            <li class="table-header-center">
                <div class="item_column"></div>
                <div class="item_column_wide">ACTOR</div>
                <div class="item_column"></div>
            </li>
            <form name="nuevo_peliculaActor" action="" method="POST">
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="actor" class="form-label">Actor</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="actor" name="actor" required>
                            <?php
                            $listaActores = listarActores();
                            foreach ($listaActores as $actor) {
                            ?>
                            <option value="<?php echo $actor->getId(); ?>"><?php echo $actor->getNombre(); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="item_column"></div>
                </li>
                <input style="float: right;" type="submit" value="vincular" class="btn btn-primary" name="botonVincular"/>
            </form>
        </ul>
        <?php
        }
        else {
        ?>
            <div class="alerta alerta-warning" role="alert">
                Esta vista se ha abierto incorrectamente. Para acceder, primero entre en "Peliculas", "Actores" y en
                "Vincular".
            </div>
        <?php
        }
        ?>
    </div>