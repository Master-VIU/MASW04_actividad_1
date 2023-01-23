<div>
<link rel="stylesheet" href="styles/main.css" type="text/css">          
    <?php
        include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/ActorController.php';     
    ?>
        <div class="table_container">
                <ul class="items_table">
                    <li class="table-title">
                        <div class="item_column">
                            <a class="btn btn-success" href="../">
                                Volver
                            </a>
                        </div>
                        <div class="item_column">ACTORES</div>
                        <div class="item_column">
                            <a class="btn btn-success" href="new.php">
                                Crear
                            </a>
                        </div>
                    </li>            
                    <li class="table-header">
                        <div class="item_column">Id</div>
                        <div class="item_column">Nombre</div>
                        <div class="item_column">Apellidos</div>
                        <div class="item_column">Fecha de nacimiento</div>
                        <div class="item_column">Nacionalidad</div>
                        <div class="item_column">Acciones</div>
                    </li>
    <?php
        $listaActores = listarActores();
        if (count($listaActores) > 0)
        {  
                foreach($listaActores as $actor)
                    {
                ?>
                <li class="table-row">                        
                        <div class="item_column" data-label="Id"><?php echo $actor->getId(); ?></div>
                        <div class="item_column" data-label="Nombre"><?php echo $actor->getNombre(); ?></div>
                        <div class="item_column" data-label="Apellidos"><?php echo $actor->getApellidos(); ?></div>
                        <div class="item_column" data-label="Fecha-Nacimiento"><?php echo $actor->getFechaNacimiento(); ?></div>
                        <div class="item_column" data-label="Nacionalidad"><?php echo $actor->getNacionalidad(); ?></div>
                        <div class="item_column" data-label="Acciones">
                             <div class="btn-group" role="group">
                                    <a class="btn btn-success" href="edit.php?id=<?php echo $actor->getId(); ?>">
                                        Editar
                                    </a>
                                    <form name="delete-actor" action="delete.php" method="POST" style="...">
                                        <input type="hidden" name="idiformId" value="<?php echo $actor->getId();?>"/>
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
                Aun no existen actores.
            </div>
    <?php
        }
    ?>
</div>