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
            require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/SerieActorController.php');
            $serieActor = $_POST['serieActorformId'];
            $serieActorEliminado = eliminarSerieActor($serieActor);
            if($serieActorEliminado)
            {
                ?>
                <li class="table-success">
                    <div class="item_column">Registro eliminado con éxito!</div>
                </li>
            <?php
            }
            else
            {
                ?>
                <li class="table-wrong">
                    <div class="item_column">El registro no se ha borrado correctamente. Inténtalo de nuevo.</div>
                </li>
                <?php
            }
        ?>
        </ul>
    </div>
</div>