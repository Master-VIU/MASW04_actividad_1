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
                <div class="item_column">NUEVA CLASIFICACIÓN</div>
                <div class="item_column"></div>
        </li>

    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/ClasificacionController.php');

        $sendData =false;
        $clasificacionCreada = false;

        if(isset($_POST['botonCrear']))
        {
            $sendData = true;
        }
        if($sendData)
        {
            if(isset($_POST['tipo']))
            {
                $clasificacionCreada = crearClasificacion($_POST['tipo']);
            }

            if ($clasificacionCreada)
            {
                ?>
                <li class="table-success">
                    <div class="item_column">Clasificación creada correctamente.</div>
                </li>
                <?php
            }
            else
            {
                ?>
                <li class="table-wrong">
                    <div class="item_column">No se ha podido crear la clasificación. Inténtalo de nuevo.</div>
                </li>
                <?php
            }
        }
    ?>
            <form name="nueva_clasificacion" action="" method="POST">
                <li class="table-row">
                    <div class="item_column">
                        <label for="tipo" class="form-label">Tipo</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="tipo" name="tipo" type="text" placeholder="Introduce el tipo de la clasificacion" class="form-control" required />
                    </div>
                    <div class="item_column"></div>
                </li>
                <input style="float: right;" type="submit" value="Crear" class="btn btn-primary" name="botonCrear" />
            </form>
        </ul>
</div>