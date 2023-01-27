<div>
<link rel="stylesheet" href="../styles/biblioteca.css" type="text/css">          
    <?php
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
                        <div class="item_column">PORTADAS</div>
                        <div class="item_column">
                            <a class="btn btn-success" href="new.php">
                                Crear
                            </a>
                        </div>
                    </li>            
                    <li class="table-header">
                        <div class="item_column">Id</div>
                        <div class="item_column">imagen</div>
                        <div class="item_column">Acciones</div>
                    </li>
    <?php
        $listaPortadas = listarportada();
        if (count($listaPortadas) > 0)
        {  
                foreach($listaPortadas as $portada)
                    {
                ?>
                <li class="table-row">                        
                        <div class="item_column" data-label="Id"><?php echo $portada->getId(); ?></div>
                        <div class="item_column" data-label="ruta"><img src="http://localhost:8888/MASW04_actividad_1<?php echo $portada->getImagen(); ?>"
                                    width="150" height="150"/></div>
                        
                        <div class="item_column" data-label="Acciones">
                             <div class="btn-group" role="group">
                                    <a class="btn btn-success" href="edit.php?id=<?php echo $portada->getId(); ?>">
                                        Editar
                                    </a>
                                    <form name="delete-portada" action="delete.php" method="POST" style="...">
                                        <input type="hidden" name="idiomaId" value="<?php echo $portada->getId();?>"/>
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
                Aun no existen Portadas.
            </div>
    <?php
        }
    ?>
</div>