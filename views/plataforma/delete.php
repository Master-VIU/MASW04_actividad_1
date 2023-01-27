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
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/PlataformaController.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/PeliculaController.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/SerieController.php');


            $plataforma = $_POST['platformId'];

            $plataformaPeliculas = obtenerPeliculasPorPlataforma($plataforma);
            $plataformaSeries = obtenerSeriesPorPlataforma($plataforma);

            if (count($plataformaPeliculas) > 0 || count($plataformaSeries) > 0) {
                ?>
                <li class="table-warning">
                    <div class="item_column">No se puede borrar la plataforma, ya que esta vinculada a series y/o
                        peliculas.
                    </div>
                </li>
                <?php
            } else {
                $plataformaEliminada = eliminarPlataforma($plataforma);
                if ($plataformaEliminada) {
                    ?>
                    <li class="table-success">
                        <div class="item_column">Plataforma eliminada con éxito!</div>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="table-wrong">
                        <div class="item_column">La plataforma no se ha borrado correctamente. Intentalo de nuevo.</div>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
</div>