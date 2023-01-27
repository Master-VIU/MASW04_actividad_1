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
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/PeliculaController.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/PeliculaIdiomaController.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/PeliculaActorController.php');
            $peliculaId = $_POST['peliculaId'];

            $peliculaActores = listarActoresDePelicula($peliculaId);
            if (count($peliculaActores)) {
            $peliculaActorEliminados = eliminarPeliculaActorAll($peliculaId);
            if($peliculaActorEliminados)
            {
            ?>
            <li class="table-success">
                <div class="item_column">Eliminado vinculo de actores y pelicula</div>
            </li>
            <?php
            }
            else
            {
            ?>
            <li class="table-wrong">
                <div class="item_column">No se han borrado correctamente los vinculos entre actores y pelicula.</div>
            </li>
            <?php
            }
            } else {
            ?>
            <li class="table-warning">
                <div class="item_column">La pelicula no tenia actores vinculados.</div>
            </li>
            <?php
            }

            $peliculaIdioma = listarPeliculaIdiomasAll($peliculaId);
            if (count($peliculaIdioma)) {
            $peliculaIdiomaEliminados = eliminarPeliculaIdiomaAll($peliculaId);
            if($peliculaIdiomaEliminados)
            {
            ?>
            <li class="table-success">
                <div class="item_column">Eliminado vinculo de idiomas y pelicula.</div>
            </li>
            <?php
            }
            else
            {
            ?>
            <li class="table-wrong">
                <div class="item_column">No se han borrado correctamente los vinculos entre idiomas y pelicula.</div>
            </li>
            <?php
            }
            } else {
            ?>
            <li class="table-warning">
                <div class="item_column">La pelicula no tenia idiomas vinculados.</div>
            </li>
            <?php
            }

            $peliculaEliminada = eliminarPelicula($peliculaId);
            if($peliculaEliminada)
            {
            ?>
            <li class="table-success">
                <div class="item_column">Pelicula eliminada con éxito! (Con sus actores e idiomas vinculados)</div>
            </li>
            <?php
            }
            else
            {
            ?>
            <li class="table-wrong">
                <div class="item_column">La pelicula no se ha borrado correctamente. Intentalo de nuevo.</div>
            </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>