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
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/SerieActorController.php');
        // require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/SerieController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/ActorController.php');

        $sendData =false;
        $serieActorCreado = false;

        if(isset($_POST['botonCrear']))
        {
            $sendData = true;
        }
        if($sendData)
        {
            if(isset($_POST['serie']) && isset($_POST['actor']))
            {
                $serieActorCreado = crearSerieActor($_POST['serie'], $_POST['actor']);
            }

            if ($serieActorCreado)
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
            <form name="nuevo_serieActor" action="" method="POST">
            <li class="table-row">
                    <div class="item_column">
                        <label for="serie" class="form-label">Serie</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="serie" name="serie" required>
                            <?php
                           // $listaSeries = listarSeries();
                           // foreach ($listaSeries as $serie)
                           // {
                                ?>
                              <!--  <option value="<!?php echo $serie->getId(); ?>"><!?php echo $serie->getTitulo(); ?></option>-->
                                <?php
                           // }
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
                                <option value="<?php echo $actor->getId(); ?>"><?php echo $actor->getNombre() ." ".$actor->getApellidos(); ?></option>
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