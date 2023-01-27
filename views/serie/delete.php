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
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/SerieController.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/SerieIdiomaController.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/SerieActorController.php');
            $serieId = $_POST['serieId'];

            $serieActores = listarActoresDeSerie($serieId);
            if (count($serieActores)) {
            $serieActorEliminados = eliminarSerieActorAll($serieId);
            if($serieActorEliminados)
            {
            ?>
            <li class="table-success">
                <div class="item_column">Eliminado vinculo de actores y serie</div>
            </li>
            <?php
            }
            else
            {
            ?>
            <li class="table-wrong">
                <div class="item_column">No se han borrado correctamente los vinculos entre actores y serie.</div>
            </li>
            <?php
            }
            } else {
            ?>
            <li class="table-warning">
                <div class="item_column">La serie no tenia actores vinculados.</div>
            </li>
            <?php
            }

            $serieIdioma = listarIdiomasAll($serieId);
            if (count($serieIdioma)) {
            $serieIdiomaEliminados = eliminarSerieIdiomaAll($serieId);
            if($serieIdiomaEliminados)
            {
            ?>
            <li class="table-success">
                <div class="item_column">Eliminado vinculo de idiomas y serie.</div>
            </li>
            <?php
            }
            else
            {
            ?>
            <li class="table-wrong">
                <div class="item_column">No se han borrado correctamente los vinculos entre idiomas y serie.</div>
            </li>
            <?php
            }
            } else {
            ?>
            <li class="table-warning">
                <div class="item_column">La serie no tenia idiomas vinculados.</div>
            </li>
            <?php
            }

            $serieEliminada = eliminarSerie($serieId);
            if($serieEliminada)
            {
            ?>
            <li class="table-success">
                <div class="item_column">Serie eliminada con éxito! (Con sus actores e idiomas vinculados)</div>
            </li>
            <?php
            }
            else
            {
            ?>
            <li class="table-wrong">
                <div class="item_column">La serie no se ha borrado correctamente. Intentalo de nuevo.</div>
            </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>