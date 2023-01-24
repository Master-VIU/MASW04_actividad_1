<div>
<link rel="stylesheet" href="../styles/main.css" type="text/css">          
    <?php
        include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/ClasificacionController.php';     
    ?>
        <div class="table_container">
                <ul class="items_table">
                    <li class="table-title">
                        <div class="item_column">
                            <a class="btn btn-success" href="../">
                                Volver
                            </a>
                        </div>
                        <div class="item_column">CLASIFICACIONES</div>
                        <div class="item_column">
                            <a class="btn btn-success" href="new.php">
                                Crear
                            </a>
                        </div>
                    </li>            
                    <li class="table-header">
                        <div class="item_column">Id</div>
                        <div class="item_column">Tipo</div>
                        <div class="item_column">Acciones</div>
                    </li>
    <?php
        $listaClasificaciones = listarClasificaciones();
        if (count($listaClasificaciones) > 0)
        {  
                foreach($listaClasificaciones as $clasificacion)
                    {
                        
                ?>
                <li class="table-row">                        
                        <div class="item_column" data-label="Id"><?php echo $clasificacion->getId(); ?></div>
                        <div class="item_column" data-label="Clasificaciones"><?php echo $clasificacion->getTipo(); ?></div>
                        <div class="item_column" data-label="Acciones">
                             <div class="btn-group" role="group">
                                    <a class="btn btn-success" href="edit.php?id=<?php echo $clasificacion->getId(); ?>">
                                        Editar
                                    </a>
                                    <form name="delete-clasificacion" action="delete.php" method="POST" style="...">
                                        <input type="hidden" name="actformId" value="<?php echo $clasificacion->getId();?>"/>
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
                Aun no existen clasificaciones.
            </div>
    <?php
        }
    ?>
</div>