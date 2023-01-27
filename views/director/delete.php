<div>
    <link rel="stylesheet" href="../styles/biblioteca.css" type="text/css">
    <link rel="stylesheet" href="../styles/bootstrap.css" type="text/css">
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
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/DirectorController.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/SerieController.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/PeliculaController.php');

            $director = $_POST['dirformId'];

            $directorSeries = obtenerSeriesPorDirector($director);
            $directorPeliculas = obtenerPeliculasPorDirector($director);

            if (count($directorSeries) > 0 || count($directorPeliculas) > 0) {
                ?>
                <li class="table-warning">
                    <div class="item_column">No se puede borrar el director, ya que esta vinculado a series y/o
                        peliculas.
                    </div>
                </li>
                <?php
            } else {
                $directorEliminado = eliminarDirector($director);
                if ($directorEliminado) {
                    ?>
                    <li class="table-success">
                        <div class="item_column">Director eliminado con éxito!</div>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="table-wrong">
                        <div class="item_column">El director no se ha borrado correctamente. Inténtalo de nuevo.</div>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
</div>