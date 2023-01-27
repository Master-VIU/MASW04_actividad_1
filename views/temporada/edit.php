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
                <div class="item_column">EDITAR TEMPORADA</div>
                <div class="item_column"></div>
            </li>
            <?php
            require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/TemporadaController.php');
            require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/SerieController.php');
                $idTemporada = $_GET['id'];
                $temporadaObjeto = obtenerTemporada($idTemporada);

                $sendData = false;
                $temporadaEditada = false;
                if(isset($_POST['botonEditar']))
                {
                    $sendData = true;
                }
                if($sendData)
                {
                    if(isset($_POST['numero']) && isset($_POST['serie']) && isset($_POST['fechaLanzamiento']))
                    {
                        $temporadaEditada = actualizarTemporada($_POST['numero'], $_POST['serie'], $_POST['temporadaId'], $_POST['fechaLanzamiento']);
                    }

                    if($temporadaEditada)
                    {
                    ?>
                        <li class="table-success">
                            <div class="item_column">Temporada editada correctamente.</div>
                        </li>
                    <?php
                    }
                    else
                    {
                    ?>
                        <li class="table-wrong">
                            <div class="item_column">
                                La temporada no se ha editado correctamente.
                                <a href="edit.php?id=<?php echo $idTemporada;?>"> Volver a intentarlo.</a>
                            </div>
                        </li>
                    <?php
                    }
                }
                else
                {
                    ?>
            <form name="editar_temporada" action="" method="POST">
                <input id="id" hidden name="id" type="text" placeholder="Introduce el id" class="form-control"
                       required value="<?php if(isset($temporadaObjeto)) echo $temporadaObjeto->getId();?>" />
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="numero" class="form-label">Número</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="numero" name="numero" type="number" min="0" placeholder="Introduce el número de la temporada" class="form-control"
                               required value="<?php if(isset($temporadaObjeto)) echo $temporadaObjeto->getNumero();?>" />
                    </div>
                    <div class="item_column"></div>
                </li>

                <li class="table-row-form">
                    <div class="item_column">
                        <label for="serie" class="form-label">Serie</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="serie" name="serie" required>
                            <?php
                            $listaSeries = listarSeries();
                            foreach ($listaSeries as $serie)
                            {
                                ?>
                                <option value="<?php echo $serie->getId(); ?>"
                                        <?php
                                    if(isset($serieObjeto))
                                        {
                                            $serieSeleccionada = $serieObjeto->getId();
                                            if ($serie->getId() == $serieSeleccionada)
                                            {
                                                echo "selected";
                                            }
                                        }
                                        ?>>
                                    <?php echo $serie->getTitulo(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="item_column"></div>
                    </li>


                <div class="item_column"></div>
                </li>
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="fechaLanzamiento" class="form-label">Fecha de lanzamiento</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="fechaLanzamiento" name="fechaLanzamiento" type="date" placeholder="Introduce la fecha de lanzamiento" class="form-control" 
                        required value="<?php if(isset($temporadaObjeto)) echo $temporadaObjeto->getFechaLanzamiento();?>" />
                    </div>        
                    <input type="hidden" name="temporadaId" value="<?php echo $idTemporada;?>"/>          
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