<div>
<link rel="stylesheet" href="../styles/biblioteca.css" type="text/css">          
    <?php
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/NacionalidadController.php');     
    ?>
        <div class="table_container">
                <ul class="items_table">
                    <li class="table-title">
                        <div class="item_column">
                            <a class="btn btn-success" href="../">
                                Volver
                            </a>
                        </div>
                        <div class="item_column">NACIONALIDAD</div>
                        <div class="item_column">
                            <a class="btn btn-success" href="new.php">
                                Crear
                            </a>
                        </div>
                    </li>            
                    <li class="table-header">
                        <div class="item_column">Id</div>
                        <div class="item_column">Pais</div>
                    </li>
    <?php
        $listaNacionalidades = listarNacionalidades();
        if (count($listaNacionalidades) > 0)
        {  
                foreach($listaNacionalidades as $nacionalidad)
                    {
                ?>
                <li class="table-row">                        
                        <div class="item_column" data-label="Id"><?php echo $nacionalidad->getId(); ?></div>
                        <div class="item_column" data-label="Nombre"><?php echo $nacionalidad->getPais(); ?></div>
                        <div class="item_column" data-label="Acciones">
                             <div class="btn-group" role="group">
                                    <a class="btn btn-success" href="edit.php?id=<?php echo $nacionalidad->getId(); ?>">
                                        Editar
                                    </a>
                                    <form name="delete-nacionalidad" action="delete.php" method="POST" style="...">
                                        <input type="hidden" name="nacionalidadId" value="<?php echo $nacionalidad->getId();?>"/>
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
                Aun no existen nacionalidades.
            </div>
    <?php
        }
    ?>
</div>