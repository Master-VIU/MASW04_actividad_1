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
            require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/NacionalidadController.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/ActorController.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/DirectorController.php');
            
            $nacionalidadId = $_POST['nacionalidadId'];
            
            $nacionalidadEnActores = obtenerActoresPorNacionalidad($nacionalidadId);
            $nacionalidadEnDirectores = obtenerDirectoresPorNacionalidad($nacionalidadId);

        if (count($nacionalidadEnActores) > 0 || count($nacionalidadEnDirectores) > 0) {
            ?>
            <li class="table-warning">
                <div class="item_column">No se puede borrar la nacionalidad, ya que esta vinculado a actores y/o directores.</div>
            </li>
            <?php
        }
        else
        {
            $nacionalidadEliminada = eliminarNacionalidad($nacionalidadId);
            if($nacionalidadEliminada)
            {
                ?>
                <li class="table-success">
                    <div class="item_column">Nacionalidad eliminada con éxito!</div>
                </li>
                <?php
            }
            else
            {
                ?>
                <li class="table-wrong">
                    <div class="item_column">La nacionalidad no se ha borrado correctamente. Inténtalo de nuevo.</div>
                </li>
                <?php
            }
        }
        ?>
        </ul>
    </div>
</div>