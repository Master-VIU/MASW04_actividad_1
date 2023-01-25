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
                <div class="item_column">NUEVO GENERO</div>
                <div class="item_column"></div>
        </li>

    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/GeneroController.php');

        $sendData =false;
        $generoCreado = false;

        if(isset($_POST['botonCrear']))
        {
            $sendData = true;
        }
        if($sendData)
        {
            if(isset($_POST['genero']))
            {
                $generoCreado = crearGenero($_POST['genero']);
            }

            if ($generoCreado)
            {
                ?>
                <li class="table-success">
                    <div class="item_column">Género creado correctamente.</div>
                </li>
                <?php
            }
            else
            {
                ?>
                <li class="table-wrong">
                    <div class="item_column">No se ha podido crear el género. Inténtalo de nuevo.</div>
                </li>
                <?php
            }
        }
    ?>
            <form name="nueva_genero" action="" method="POST">
                <li class="table-row">
                    <div class="item_column">
                        <label for="genero" class="form-label">Genero</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="genero" name="genero" type="text" placeholder="Introduce el genero" class="form-control" required />
                    </div>
                    <div class="item_column"></div>
                </li>
                <input style="float: right;" type="submit" value="Crear" class="btn btn-primary" name="botonCrear" />
            </form>
        </ul>
</div>