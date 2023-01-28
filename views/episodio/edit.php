<div>
<link rel="stylesheet" href="../styles/biblioteca.css" type="text/css">
    <link rel="stylesheet" href="../styles/bootstrap.css" type="text/css">
    <div class="table_container">
        <ul class="items_table">
            <li class="table-title">
                <div class="item_column">
                    <a class="btn btn-success" href="index.php">
                        Volver
                    </a>
                </div>
                <div class="item_column">EDITAR EPISODIO</div>
                <div class="item_column"></div>
            </li>
            <?php
            require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/EpisodioController.php');
            require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/TemporadaController.php');
                $idEpisodio = $_GET['id'];
                $episodioObjeto = obtenerEpisodio($idEpisodio);

                $sendData = false;
                $episodioEditada = false;
                if(isset($_POST['botonEditar']))
                {
                    $sendData = true;
                }
                if($sendData)
                {
                    if(isset($_POST['temporada']) && isset($_POST['numero']) && isset($_POST['titulo']) && isset($_POST['duracion']))
                    {
                        $episodioEditada = actualizarEpisodio($_POST['episodioId'], $_POST['temporada'], $_POST['numero'], $_POST['titulo'], $_POST['duracion']);
                    }

                    if($episodioEditada)
                    {
                    ?>
                        <li class="table-success">
                            <div class="item_column">Episodio editado correctamente.</div>
                        </li>
                    <?php
                    }
                    else
                    {
                    ?>
                        <li class="table-wrong">
                            <div class="item_column">
                                El episodio no se ha editado correctamente.
                                <a href="edit.php?id=<?php echo $idEpisodio;?>"> Volver a intentarlo.</a>
                            </div>
                        </li>
                    <?php
                    }
                }
                else
                {
                    ?>
            <form name="editar_episodio" action="" method="POST">    
            <li class="table-row-form">            
                    <div class="item_column">
                        <label for="numero" class="form-label">Número</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="numero" name="numero" type="number" min="0" placeholder="Introduce el número de episodio" class="form-control"
                               required value="<?php if(isset($episodioObjeto)) echo $episodioObjeto->getNumero();?>" />
                    </div>
                    <div class="item_column"></div>
                </li>   

                <li class="table-row-form">
                    <div class="item_column">
                        <label for="temporada" class="form-label">Temporada</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="temporada" name="temporada" required>
                            <?php
                            $listaTemporada = listarTemporadas();
                            foreach ($listaTemporada as $temporada)
                            {
                                ?>
                                <option value="<?php echo $temporada->getId(); ?>"
                                        <?php
                                    if(isset($temporadaObjeto))
                                        {
                                            $temporadaSeleccionada = $temporadaObjeto->getId();
                                            if ($temporada->getId() == $temporadaSeleccionada)
                                            {
                                                echo "selected";
                                            }
                                        }
                                        ?>>
                                    <?php echo $temporada->getId(); ?></option>
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
                        <label for="titulo" class="form-label">Titulo</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="titulo" name="titulo" type="text" placeholder="Introduce el titulo" class="form-control" 
                        required value="<?php if(isset($episodioObjeto)) echo $episodioObjeto->getTitulo();?>" />
                    </div>        
                    <input type="hidden" name="episodioId" value="<?php echo $idEpisodio;?>"/>          
                    <div class="item_column"></div>
                </li>
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="duracion" class="form-label">Duración</label>
                </div>
                <div class="item_column">
                    <?php if(isset($episodioObjeto)) {
                        $duracionTotal = $episodioObjeto->getDuracion();
                        $duracionHoras = floor($duracionTotal/3600);
                        $duracionMinutos = floor(($duracionTotal-$duracionHoras*3600)/60);
                        $duracionSegundos = floor(($duracionTotal-($duracionHoras*3600)-($duracionMinutos*60)));
                    } ?></div>
                    
                    <div class="item_column_wide">
                        <input id="horas" name="horas" type="number" value="<?php echo $duracionHoras; ?>" placeholder="Introduce horas" min="0" class="form-control" required/>
                        <input id="minutos" name="minutos" type="number" value="<?php echo $duracionMinutos; ?>" placeholder="Introduce minutos" min="0" max="59" class="form-control" required/>
                        <input id="segundos" name="segundos" type="number" value="<?php echo $duracionSegundos; ?>" placeholder="Introduce segundos" min="0" max="59" class="form-control" required/>
                    </div>
                    <li class="table-row-form">
                </li>
                <input style="float: right;" type="submit" value="Editar" class="btn btn-primary" name="botonEditar" />
            </form>

                    <?php
                }
            ?>
        </ul>
    </div>
            </div>