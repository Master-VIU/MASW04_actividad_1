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
            require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/ClasificacionController.php');
            $clasificacion = $_POST['clasformId'];
            $clasificacionEliminada = eliminarClasificacion($clasificacion);
            if($clasificacionEliminada)
            {
                ?>
                <li class="table-success">
                    <div class="item_column">Clasificación eliminada con éxito!</div>
                </li>
            <?php
            }
            else
            {
                ?>
                <li class="table-wrong">
                    <div class="item_column">La clasificación no se ha borrado correctamente. Inténtalo de nuevo.</div>
                </li>
                <?php
            }
        ?>
        </ul>
    </div>
</div>