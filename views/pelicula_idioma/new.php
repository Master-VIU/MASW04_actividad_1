<div>
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/PeliculaIdiomaController.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/IdiomaController.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/PeliculaController.php'); ?>
    <link rel="stylesheet" href="../styles/biblioteca.css" type="text/css">
    <div class="table_container">
        <ul class="items_table">
            <?php
            if (isset($_GET['id'])) {
            $idPelicula = $_GET['id'];
            $sendData = false;
            $peliculaIdiomaVinculado = false;
            if (isset($_POST['botonVincular'])) {
                $sendData = true;
            }
            if ($sendData) {
                if (isset($_POST['idiomaId']) && isset($_POST['idiomaTipo'])) {
                    $peliculaIdiomaVinculado = crearPeliculaIdioma($idPelicula, $_POST['idiomaId'], $_POST['idiomaTipo']);
                }

                if ($peliculaIdiomaVinculado) {
                    ?>
                    <li class="table-success">
                        <div class="item_column">Idioma
                            <?php echo " (" . $_POST['idiomaTipo'] . ") " ?>
                            vinculado a <?php
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
                            No se ha podido vincular el idioma
                            <?php echo " (" . $_POST['idiomaTipo'] . ") " ?>
                            con <?php
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
                    <a class="btn btn-success" href="<?php
                    if (isset($_GET['id'])) {
                        echo "index.php?id=" . $_GET['id'];
                    }
                    ?>">
                    Volver
                    </a>
                </div>
                <div class="item_column_wide">VINCULAR NUEVO IDIOMA</div>
                <div class="item_column"></div>
            </li>
            <li class="table-header-center">
                <div class="item_column"></div>
                <div class="item_column_wide">IDIOMA</div>
                <div class="item_column"></div>
            </li>
            <form name="nuevo_peliculaIdioma" action="" method="POST">
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="idiomaId" class="form-label">Idioma</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="idiomaId" name="idiomaId" required>
                            <?php
                            $listaIdiomas = listarIdiomas();
                            foreach ($listaIdiomas as $idioma) {
                                ?>
                                <option value="<?php echo $idioma->getId(); ?>"><?php echo $idioma->getNombre(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="idiomaTipo" class="form-label">Tipo</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="idiomaTipo" name="idiomaTipo" required>
                            <option value="AUDIO" selected>AUDIO</option>
                            <option value="SUBTITULO">SUBTITULO</option>
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
                Esta vista se ha abierto incorrectamente. Para acceder, primero entre en "Peliculas", "Idiomas" y en
                "Vincular".
            </div>
            <?php
        }
        ?>
    </div>