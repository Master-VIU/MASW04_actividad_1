<div>
    <link rel="stylesheet" href="../styles/main.css" type="text/css">
    <?php
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/SerieController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PlataformaController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/ClasificacionController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/DirectorController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/GeneroController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PortadaController.php');
    ?>
            <div class="table_container">
                <ul class="items_table">
                    <li class="table-title">
                        <div class="item_column">
                            <a class="btn btn-success" href="../">
                                Volver
                            </a>
                        </div>
                        <div class="item_column">SERIES</div>
                        <div class="item_column">
                            <a class="btn btn-success" href="new.php">
                                Crear
                            </a>
                        </div>
                    </li>
                    <li class="table-header">
                        <div class="item_column">Id</div>
                        <div class="item_column">Titulo</div>
                        <div class="item_column">Plataforma Id</div>
                        <div class="item_column">Director Id</div>
                        <div class="item_column">Clasificacion Id</div>
                        <div class="item_column">Genero Id</div>
                        <div class="item_column">Portada Id</div>
                        <div class="item_column">Acciones</div>
                    </li>
                    <?php
                    $listaSeries = listarSeries();

                    if (count($listaSeries) > 0)
                    {
                    foreach($listaSeries as $serie)
                        {
                        ?>
                            <li class="table-row">
                                <div class="item_column" data-label="Id"><?php echo $serie->getId(); ?></div>
                                <div class="item_column" data-label="Titulo"><?php echo $serie->getTitulo(); ?></div>
                                <div class="item_column" data-label="PlataformaId">
                                    <?php echo obtenerPlataforma($serie->getPlataformaId())->getNombre(); ?>
                                </div>
                                <div class="item_column" data-label="DirectorId">
                                    <?php $director = obtenerDirector($serie->getDirectorId());
                                    echo $director->getNombre()." ".$director->getApellidos(); ?>
                                </div>
                                <div class="item_column" data-label="ClasificacionId">
                                    <?php echo obtenerClasificacion($serie->getClasificacionId())->getTipo(); ?>
                                </div>
                                <div class="item_column" data-label="GeneroId">
                                    <?php echo obtenerGenero($serie->getGeneroId())->getNombre(); ?>
                                </div>
                                <div class="item_column" data-label="PortadaId">
                                    <?php $portada = obtenerPortada($serie->getPortadaId()); ?>
                                    <img src="http://localhost:8888/MASW04_actividad_1<?php echo $portada->getImagen(); ?>"
                                    width="150" height="150"/>
                                </div>
                                <div class="item_column" data-label="Acciones">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-success" href="edit.php?id=<?php echo $serie->getId(); ?>">
                                            Editar
                                        </a>
                                        <form name="delete-serie" action="delete.php" method="POST" style="...">
                                            <input type="hidden" name="serieId" value="<?php echo $serie->getId();?>"/>
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <li class="table-wrong">
                        <div class="item_column">Aun no existen series.</div>
                    </li>
                    <?php
                }
                ?>
                </ul>
            </div>
</div>