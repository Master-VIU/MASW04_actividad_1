<div>
    <link rel="stylesheet" href="../styles/main.css" type="text/css">
    <?php
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PeliculaIdiomaController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PeliculaController.php');
        //require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/SerieController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/IdiomaController.php');
    ?>
            <div class="table_container">
                <ul class="items_table">
                    <li class="table-title">
                        <div class="item_column">
                            <a class="btn btn-success" href="../">
                                Volver
                            </a>
                        </div>
                        <div class="item_column">SERIE IDIOMAS</div>
                        <div class="item_column">
                            <a class="btn btn-success" href="new.php">
                                Crear
                            </a>
                        </div>
                    </li>
                    <li class="table-header">
                        <div class="item_column">SERIE</div>
                        <div class="item_column">IDIOMA</div>
                        <div class="item_column">TIPO</div>
                        <div class="item_column_wide">Acciones</div>
                    </li>
                    <?php
                    $listaPeliculaIdiomas = listarPeliculaIdiomas();

                    if (count($listaPeliculaIdiomas) > 0)
                    {
                    foreach($listaPeliculaIdiomas as $peliculaIdiomas)
                        {
                        ?>
                            <li class="table-row">
                                <div class="item_column" data-label="Pelicula">
                                <?php
                                echo obtenerPelicula($peliculaIdiomas->getIdPelicula())->getTitulo();
                                ?></div>                                
                                <div class="item_column" data-label="Idioma">
                                    <?php 
                                    echo obtenerIdioma($peliculaIdiomas->getIdIdioma())->getNombre(); 
                                    ?></div>
                                <div class="item_column" data-label="Tipo"><?php echo $peliculaIdiomas->getTipo(); ?></div>
                                <div class="item_column_wide" data-label="Acciones">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-success" href="edit.php?id=<?php echo $peliculaIdiomas->getIdPelicula(); ?>">
                                            Editar
                                        </a>
                                        <form name="delete-peliculaIdiomas" action="delete.php" method="POST" style="...">
                                            <input type="hidden" name="serIdiomaformId" value="<?php echo $peliculaIdiomas->getIdPelicula();?>"/>
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                        </form>
                                    </div>
                                </div>
                            </li>                   
                        <?php
                    }
                    ?>
                </ul>
            </div>
    <?php
        }
        else
        {
    ?>
            <div class="alerta alerta-warning" role="alert">
                Aun no existen registros.
            </div>
    <?php
        }
    ?>
</div>