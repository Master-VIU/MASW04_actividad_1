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
                <div class="item_column">EDITAR REGISTRO</div>
                <div class="item_column"></div>
            </li>
            <?php
            require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PeliculaIdiomaController.php');
            require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/IdiomaController.php');
            require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PeliculaController.php');
           // require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/Serieontroller.php');
                $idPeliculaIdioma = $_GET['id'];
                $peliculaIdiomaObjeto = obtenerPeliculaIdioma($idPeliculaIdioma);

                $sendData = false;
                $peliculaIdiomaEditada = false;
                if(isset($_POST['botonEditar']))
                {
                    $sendData = true;
                }
                if($sendData)
                {
                    if(isset($_POST['editarPelicula']) && isset($_POST['editarIdioma']) && isset($_POST['tipo']))
                    {
                        $peliculaIdiomaEditada = actualizarPeliculaIdioma($_POST['editarPelicula'], $_POST['editarIdioma'], $_POST['tipo']);
                    }

                    if($peliculaIdiomaEditada)
                    {
                    ?>
                        <li class="table-success">
                            <div class="item_column">Registro editado correctamente.</div>
                        </li>
                    <?php
                    }
                    else
                    {
                    ?>
                        <li class="table-wrong">
                            <div class="item_column">
                                El registro no se ha editado correctamente.
                                <a href="edit.php?id=<?php echo $idPeliculaIdioma;?>"> Volver a intentarlo.</a>
                            </div>
                        </li>
                    <?php
                    }
                }
                else
                {
                ?>
            <form name="editar_peliculaIdioma" action="" method="POST">
            <li class="table-row">
                    <div class="item_column">
                        <label for="editarPelicula" class="form-label">Serie</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="editarPelicula" name="editarPelicula" required>
                            <?php
                            $listaPeliculas = listarPeliculas();
                            foreach ($listaPeliculas as $pelicula)
                            {
                                ?>
                                <option value="<?php echo $pelicula->getId(); ?>"
                                        <?php
                                        if(isset($peliculaIdiomaObjeto))
                                        {
                                            $peliculaSeleccionada = $peliculaIdiomaObjeto->getIdPelicula();
                                            if ($pelicula->getId() == $peliculaSeleccionada)
                                            {
                                                echo "selected";
                                            }
                                        }
                                        ?>>
                                    <?php echo $pelicula->getTitulo(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row">
                    <div class="item_column">
                        <label for="editarIdioma" class="form-label">Actor</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="editarIdioma" name="editarIdioma" required>
                            <?php
                            $listaIdiomas = listarIdiomas();
                            foreach ($listaIdiomas as $idioma)
                            {
                                ?>
                                <option value="<?php echo $idioma->getId(); ?>"
                                        <?php
                                        if(isset($peliculaIdiomaObjeto))
                                        {
                                            $idiomaSeleccionado = $peliculaIdiomaObjeto->getIdIdioma();
                                            if ($idioma->getId() == $idiomaSeleccionado)
                                            {
                                                echo "selected";
                                            }
                                        }
                                        ?>>
                                    <?php echo $idioma->getNombre(); ?></option>
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
                <input style="float: right;" type="submit" value="Editar" class="btn btn-primary" name="botonEditar" />
            </form>

                    <?php
                }
            ?>
        </ul>
    </div>
</div>