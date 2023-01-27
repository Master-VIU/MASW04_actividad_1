<div>
    <link rel="stylesheet" href="../styles/biblioteca.css" type="text/css">
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
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/GeneroController.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/PeliculaController.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/SerieController.php');

            $genero = $_POST['genformId'];

            $generoPeliculas = obtenerPeliculasPorGenero($genero);
            $generoSeries = obtenerSeriesPorGenero($genero);

            if (count($generoPeliculas) > 0 || count($generoSeries) > 0) {
                ?>
                <li class="table-warning">
                    <div class="item_column">No se puede borrar el genero, ya que esta vinculado a series y/o
                        peliculas.
                    </div>
                </li>
                <?php
            } else {
                $generoEliminado = eliminarGenero($genero);
                if ($generoEliminado) {
                    ?>
                    <li class="table-success">
                        <div class="item_column">Género eliminado con éxito!</div>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="table-wrong">
                        <div class="item_column">El género no se ha borrado correctamente. Inténtalo de nuevo.</div>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
</div>