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
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/IdiomaController.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/SerieIdiomaController.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/PeliculaIdiomaController.php');

            $idiomaId = $_POST['idiomaId'];

            $idiomaSeries = listarSeriesDeIdioma($idiomaId);
            $idiomaPeliculas = listarPeliculasDeIdioma($idiomaId);

            if (count($idiomaSeries) > 0 || count($idiomaPeliculas) > 0) {
                ?>
                <li class="table-warning">
                    <div class="item_column">No se puede borrar el idioma, ya que esta vinculado a series y/o peliculas.</div>
                </li>
                <?php
            }
            else
            {
                $idiomaEliminado = eliminarIdioma($idiomaId);
                if ($idiomaEliminado) {
                    ?>
                    <li class="table-success">
                        <div class="item_column">Idioma eliminado con éxito!</div>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="table-wrong">
                        <div class="item_column">El idioma no se ha borrado correctamente. Inténtalo de nuevo.</div>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
</div>