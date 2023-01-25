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
                <div class="item_column">NUEVO REGISTRO</div>
                <div class="item_column"></div>
        </li>

    <?php
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PeliculaActorController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/ActorController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PeliculaController.php');

        $sendData =false;
        $peliculaActorCreada = false;

        if(isset($_POST['botonCrear']))
        {
            $sendData = true;
        }
        if($sendData)
        {
            if(isset($_POST['pelicula']) && isset($_POST['actor']))
            {
                $peliculaActorCreada = crearPeliculaActor($_POST['pelicula'], $_POST['actor']);
            }

            if ($peliculaActorCreada)
            {
                ?>
                <li class="table-success">
                    <div class="item_column">Registro creado correctamente.</div>
                </li>
                <?php
            }
            else
            {
                ?>
                <li class="table-wrong">
                    <div class="item_column">No se ha podido crear el registro. Intentalo de nuevo.</div>
                </li>
                <?php
            }
        }
    ?>
            <form name="nuevO_peliculaActor" action="" method="POST">
            <li class="table-row">
                    <div class="item_column">
                        <label for="pelicula" class="form-label">Pelicula</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="pelicula" name="pelicula" required>
                            <?php
                            $listaPeliculas = listarPeliculas();
                            foreach ($listaPeliculas as $pelicula)
                            {
                                ?>
                                <option value="<?php echo $pelicula->getId(); ?>"><?php echo $pelicula->getTitulo(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row">
                    <div class="item_column">
                        <label for="actor" class="form-label">Actor</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="actor" name="actor" required>
                            <?php
                            $listaActores = listarActores();
                            foreach ($listaActores as $actor)
                            {
                                ?>
                                <option value="<?php echo $actor->getId(); ?>"><?php echo $actor->getNombre(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="item_column"></div>
                </li>
                <input style="float: right;" type="submit" value="Crear" class="btn btn-primary" name="botonCrear" />
            </form>
        </ul>
</div>