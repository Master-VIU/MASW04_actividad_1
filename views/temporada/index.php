<div>
<link rel="stylesheet" href="../styles/main.css" type="text/css">          
    <?php
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/TemporadaController.php');
      //  require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/SerieController.php');

    ?>
    <div class="table_container">
                <ul class="items_table">
                    <li class="table-title">
                        <div class="item_column">
                            <a class="btn btn-success" href="../">
                                Volver
                            </a>
                        </div>
                        <div class="item_column">TEMPORADAS</div>
                        <div class="item_column">
                            <a class="btn btn-success" href="new.php">
                                Crear
                            </a>
                        </div>
                    </li>            
                    <li class="table-header">                        
                        <div class="item_column">Número</div>
                        <div class="item_column">Serie</div> 
                        <div class="item_column">Id</div>                       
                        <div class="item_column">Fecha de lanzamiento</div>
                        <div class="item_column">Acciones</div>
                    </li>
    <?php
        $listaTemporadas = listarTemporadas();
        if (count($listaTemporadas) > 0)
        {  
                foreach($listaTemporadas as $temporada)
                    {
                        $date = $temporada->getFechaLanzamiento();
                        $mDate = DateTime::createFromFormat('Y-m-d', $date);
                        $dateFormat = $mDate->format('d/m/Y');
                ?>
                <li class="table-row">
                                <div class="item_column" data-label="Numero"><?php echo $temporada->getNumero(); ?></div>
                                <div class="item_column" data-label="idSerie"><?php echo $temporada->getSerieId(); ?></div>
                                <div class="item_column" data-label="Id"><?php echo $temporada->getId(); ?></div>
                                <div class="item_column" data-label="Fecha-Lanzamiento"><?php echo $dateFormat; ?></div>
                                <div class="item_column" data-label="Acciones">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-success" href="edit.php?id=<?php echo $temporada->getId(); ?>">
                                            Editar
                                        </a>
                                        <form name="delete-temporada" action="delete.php" method="POST" style="...">
                                            <input type="hidden" name="temformId" value="<?php echo $temporada->getId();?>"/>
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
                Aun no existen temporadaes.
            </div>
    <?php
        }
    ?>
</div>