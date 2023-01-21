<div>
<link rel="stylesheet" href="../styles/main.css" type="text/css">          
    <?php
        include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/IdiomaController.php';     
    ?>
        <div class="table_container">
                <ul class="items_table">
                    <li class="table-title">
                        <div class="item_column">
                            <a class="btn btn-success" href="../">
                                Volver
                            </a>
                        </div>
                        <div class="item_column">IDIOMAS</div>
                        <div class="item_column">
                            <a class="btn btn-success" href="new.php">
                                Crear
                            </a>
                        </div>
                    </li>            
                    <li class="table-header">
                        <div class="item_column">Id</div>
                        <div class="item_column">Idioma</div>
                        <div class="item_column">Iso code</div>
                        <div class="item_column">Acciones</div>
                    </li>
    <?php
        $listaIdiomas = listarIdiomas();
        if (count($listaIdiomas) > 0)
        {  
                foreach($listaIdiomas as $idioma)
                    {
                ?>
                <li class="table-row">                        
                        <div class="item_column" data-label="Id"><?php echo $idioma->getId(); ?></div>
                        <div class="item_column" data-label="Nombre"><?php echo $idioma->getNombre(); ?></div>
                        <div class="item_column" data-label="Iso"><?php echo $idioma->getIsoCode(); ?></div>
                        <div class="item_column" data-label="Acciones">
                             <div class="btn-group" role="group">
                                    <a class="btn btn-success" href="edit.php?id=<?php echo $idioma->getId(); ?>">
                                        Editar
                                    </a>
                                    <form name="delete-idioma" action="delete.php" method="POST" style="...">
                                        <input type="hidden" name="idiformId" value="<?php echo $idioma->getId();?>"/>
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
                Aun no existen idiomas.
            </div>
    <?php
        }
    ?>
</div>