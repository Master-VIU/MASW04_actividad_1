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
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PeliculaIdiomaController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/IdiomaController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PeliculaController.php');
        //require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/Serieontroller.php');

        $sendData =false;
        $peliculaIdiomaCreado = false;

        if(isset($_POST['botonCrear']))
        {
            $sendData = true;
        }
        if($sendData)
        {
            if(isset($_POST['pelicula']) && isset($_POST['idioma']) && isset($_POST['tipo']))
            {
                $peliculaIdiomaCreado = crearPeliculaIdioma($_POST['pelicula'], $_POST['idioma'], $_POST['tipo']);
            }

            if ($peliculaIdiomaCreado)
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
            <form name="nuevo_peliculaActor" action="" method="POST">
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
                        <label for="idioma" class="form-label">Idioma</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="idioma" name="idioma" required>
                            <?php
                            $listaIdiomas = listarIdiomas();
                            foreach ($listaIdiomas as $idioma)
                            {
                                ?>
                                <option value="<?php echo $idioma->getId(); ?>"><?php echo $idioma->getNombre(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row">
                    <div class="item_column">
                        <label for="tipo" class="form-label">Tipo</label>
                    </div>
                    <div class="item_column_wide">
                    <select id="tipo" name="tipo" required>                       
                         <option value="AUDIO">AUDIO</option>
                         <option value="SUBTITULO">SUBTITULO</option>
                    </select>
                        </div>
                    <div class="item_column"></div>                    
                </li>
                <input style="float: right;" type="submit" value="Crear" class="btn btn-primary" name="botonCrear" />
            </form>
        </ul>
</div>