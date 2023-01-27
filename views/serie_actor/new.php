<div>
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/SerieActorController.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/ActorController.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/SerieController.php');
    ?>
    <link rel="stylesheet" href="../styles/biblioteca.css" type="text/css">
    <link rel="stylesheet" href="../styles/bootstrap.css" type="text/css">
    <div class="table_container">
        <ul class="items_table">
            <?php
            if (isset($_GET['id'])) {
            $idSerie = $_GET['id'];
            $sendData = false;
            $serieActorVinculado = false;
            if (isset($_POST['botonVincular'])) {
                $sendData = true;
            }
            if ($sendData) {
                if (isset($_POST['actorId'])) {
                    $serieActorVinculado = crearSerieActor($idSerie, $_POST['actorId']);
                }

                if ($serieActorVinculado) {
                    ?>
                    <li class="table-success">
                        <div class="item_column">Actor vinculado a <?php
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
                            No se ha podido vincular al actor con <?php
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
                    <a class="btn btn-success" href="<?php
                    if (isset($_GET['id'])) {
                        echo "index.php?id=" . $_GET['id'];
                    }
                    ?>">
                        Volver
                    </a>
                </div>
                <div class="item_column_wide">VINCULAR NUEVO ACTOR</div>
                <div class="item_column"></div>
            </li>
            <li class="table-header-center">
                <div class="item_column"></div>
                <div class="item_column_wide">ACTOR</div>
                <div class="item_column"></div>
            </li>
            <form name="nuevo_serieActor" action="" method="POST">
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="actor" class="form-label">Actor</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="actorId" name="actorId" required>
                            <?php
                            $listaActores = listarActores();
                            foreach ($listaActores as $actor) {
                                ?>
                                <option value="<?php echo $actor->getId(); ?>">
                                    <?php echo $actor->getNombre()." ".$actor->getApellidos(); ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="item_column"></div>
                </li>
                <input style="float: right;" type="submit" value="Vincular" class="btn btn-primary"
                       name="botonVincular"/>
            </form>
        </ul>
        <?php
        }
        else {
            ?>
            <div class="alerta alerta-warning" role="alert">
                Esta vista se ha abierto incorrectamente. Para acceder, primero entre en "Series", "Actores" y en
                "Vincular".
            </div>
            <?php
        }
        ?>
    </div>