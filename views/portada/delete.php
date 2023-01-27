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
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/PortadaController.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/PeliculaController.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/SerieController.php');

            $portada_eliminar = $_POST['idiomaId'];

            $portadaEnPeliculas = obtenerPeliculasPorPortada($portada_eliminar);
            $portadaEnSeries = obtenerSeriesPorPortada($portadaEnPeliculas);

            if (count($portadaEnPeliculas) > 0 || count($portadaEnSeries) > 0) {
                ?>
                <li class="table-warning">
                    <div class="item_column">No se puede borrar la portada, ya que esta vinculada a series y/o peliculas.</div>
                </li>
                <?php
            }
            else
            {
                $PortadaEliminada = eliminarPortada($portada_eliminar);
                if ($PortadaEliminada) {
                    ?>
                    <li class="table-success">
                        <div class="item_column">Portada eliminada con éxito!</div>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="table-wrong">
                        <div class="item_column">La portada no se ha borrado correctamente. Inténtalo de nuevo.</div>
                    </li>
                    <?php
                }
            }

            ?>


    </div>