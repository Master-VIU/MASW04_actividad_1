<div>
<link rel="stylesheet" href="../styles/biblioteca.css" type="text/css">
    <link rel="stylesheet" href="../styles/bootstrap.css" type="text/css">          
    <?php
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/GeneroController.php');     
    ?>
        <div class="table_container">
                <ul class="items_table">
                    <li class="table-title">
                        <div class="item_column">
                            <a class="btn btn-success" href="../">
                                Volver
                            </a>
                        </div>
                        <div class="item_column">GENERO</div>
                        <div class="item_column">
                            <a class="btn btn-success" href="new.php">
                                Crear
                            </a>
                        </div>
                    </li>            
                    <li class="table-header">
                        <div class="item_column">Id</div>
                        <div class="item_column">Nombre</div>
                        <div class="item_column">Acciones</div>
                    </li>
    <?php
        $listaGeneros = listarGeneros();
        if (count($listaGeneros) > 0)
        {  
                foreach($listaGeneros as $genero)
                    {
                        
                ?>
                <li class="table-row">                        
                        <div class="item_column" data-label="Id"><?php echo $genero->getId(); ?></div>
                        <div class="item_column" data-label="Genero"><?php echo $genero->getNombre(); ?></div>
                        <div class="item_column" data-label="Acciones">
                             <div class="btn-group" role="group">
                                    <a class="btn btn-success" href="edit.php?id=<?php echo $genero->getId(); ?>">
                                        Editar
                                    </a>
                                    <form name="delete-genero" action="delete.php" method="POST" style="...">
                                        <input type="hidden" name="genformId" value="<?php echo $genero->getId();?>"/>
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
                Aun no existen generos.
            </div>
    <?php
        }
    ?>
</div>