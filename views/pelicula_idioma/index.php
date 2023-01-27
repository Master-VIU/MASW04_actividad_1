<div>
    <link rel="stylesheet" href="../styles/biblioteca.css" type="text/css">
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/PeliculaIdiomaController.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/PeliculaController.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/IdiomaController.php');
    ?>
    <div class="table_container">
        <ul class="items_table">
            <?php
            if (isset($_GET['id'])) {
            $idPelicula = $_GET['id'];

            $sendData = false;
            $peliculaIdiomaDesvinculado = false;
            if (isset($_POST['botonDesvincular'])) {
                $sendData = true;
            }
            if ($sendData) {
                if (isset($_POST['idiomaId']) && isset($_POST['idiomaTipo'])) {
                    $peliculaIdiomaDesvinculado = eliminarPeliculaIdioma($idPelicula, $_POST['idiomaId'], $_POST['idiomaTipo']);
                    }

                if ($peliculaIdiomaDesvinculado) {
                    ?>
                    <li class="table-success">
                        <div class="item_column">Idioma
                            <?php echo " (" . $_POST['idiomaTipo'] . ") " ?>
                            desvinculado de <?php
                            $pelicula = obtenerPelicula($idPelicula);
                            echo $pelicula->getTitulo();
                            ?> correctamente.
                        </div>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="table-wrong">
                        <div class="item_column">No se ha podido desvincular al idioma
                            <?php echo " (" . $_POST['idiomaTipo'] . ") " ?>
                            de <?php
                            $pelicula = obtenerPelicula($idPelicula);
                            echo $pelicula->getTitulo();
                            ?> correctamente.
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
                <div class="item_column">IDIOMAS de
                    <?php
                    $pelicula = obtenerPelicula($idPelicula);
                    echo $pelicula->getTitulo();
                    ?></div>
                <div class="item_column">
                    <a class="btn btn-success" href="new.php?id=<?php echo $pelicula->getId(); ?>">
                        Añadir Idioma
                    </a>
                </div>
            </li>
            <li class="table-header-center">
                <div class="item_column">IDIOMA</div>
                <div class="item_column">TIPO</div>
                <div class="item_column_wide">Acciones</div>
            </li>
            <?php
            $listaPeliculaIdiomas = listarPeliculaIdiomasAll($idPelicula);

            if (count($listaPeliculaIdiomas) > 0)
            {
            foreach ($listaPeliculaIdiomas as $peliculaIdiomas) {
                ?>
                <li class="table-row-form">
                    <div class="item_column" data-label="Idioma">
                        <?php
                        $idioma = obtenerIdioma($peliculaIdiomas->getIdIdioma());
                        echo $idioma->getNombre();
                        ?></div>
                    <div class="item_column" data-label="Tipo"><?php echo $peliculaIdiomas->getTipo(); ?></div>
                    <div class="item_column_wide" data-label="Acciones">
                        <div class="btn-group" role="group">
                            <form name="desvincular-pelicula-idioma" action="" method="POST" style="...">
                                <input type="hidden" name="idiomaId" value="<?php echo $idioma->getId(); ?>"/>
                                <input type="hidden" name="idiomaTipo" value="<?php echo $peliculaIdiomas->getTipo(); ?>"/>
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
                    <div class="item_column">No hay idiomas vinculados a esta pelicula.</div>
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
        Esta vista se ha abierto incorrectamente. Para acceder, primero entre en "Peliculas" y despues en "Idiomas".
    </div>
    <?php
}
?>
</div>