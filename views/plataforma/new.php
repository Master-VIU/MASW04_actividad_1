<div class="row">
    <link rel="stylesheet" href="../styles/main.css" type="text/css">
    <?php
        include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PlataformaController.php';

        $sendData =false;
        $plataformaCreada = false;

        if(isset($_POST['botonCrear']))
        {
            $sendData = true;
        }
        if($sendData)
        {
            if(isset($_POST['nombrePlataforma']))
            {
                $plataformaCreada = crearPlataforma($_POST['nombrePlataforma']);
            }

            if ($plataformaCreada)
            {
                echo "Plataforma creada correctamente.";
            }
            else
            {
                echo "Error en la creacion de la plataforma. Intentalo de nuevo.";
            }
        }
    ?>
    <div class="table_container">
        <ul class="items_table">
            <li class="table-title">
                <div class="item_column">
                    <a class="btn btn-success" href="index.php">
                        Volver
                    </a>
                </div>
                <div class="item_column">NUEVA PLATAFORMA</div>
                <div class="item_column"></div>
            </li>
            <form name="nueva_plataforma" action="" method="POST">
                <li class="table-row">
                    <div class="item_column">
                        <label for="nombrePlataforma" class="form-label">Nombre</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="nombrePlataforma" name="nombrePlataforma" type="text" placeholder="Introduce el nombre de la plataforma" class="form-control" required />
                    </div>
                    <div class="item_column"></div>
                </li>
                <input style="float: right;" type="submit" value="Crear" class="btn btn-primary" name="botonCrear" />
            </form>
        </ul>
</div>