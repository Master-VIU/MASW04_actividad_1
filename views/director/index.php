<div>
<link rel="stylesheet" href="../styles/main.css" type="text/css">          
    <?php
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/DirectorController.php');
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
                        <div class="item_column">DIRECTORES</div>
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
                        <div class="item_column">Dni</div>
                        <div class="item_column">Fecha de nacimiento</div>
                        <div class="item_column">Nacionalidad</div>
                        <div class="item_column">Acciones</div>
                    </li>
    <?php
        $listaDirector = listarDirector();
        if (count($listaDirector) > 0)
        {  
                foreach($listaDirector as $director)
                    {
                        $date = $director->getFechaNacimiento();
                        $mDate = DateTime::createFromFormat('Y-m-d', $date);
                        $dateFormat = $mDate->format('d/m/Y');
                ?>
                <li class="table-row">                        
                        <div class="item_column" data-label="Id"><?php echo $director->getId(); ?></div>
                        <div class="item_column" data-label="Nombre"><?php echo $director->getNombre(); ?></div>
                        <div class="item_column" data-label="Apellidos"><?php echo $director->getApellidos(); ?></div>
                        <div class="item_column" data-label="Dni"><?php echo $director->getDni(); ?></div>
                        <div class="item_column" data-label="Fecha-Nacimiento"><?php echo $dateFormat; ?></div>
                        <div class="item_column" data-label="Nacionalidad">
                            <?php
                            echo obtenerNacionalidad($director->getNacionalidad())->getPais();
                            ?>
                        </div>
                        <div class="item_column" data-label="Acciones">
                             <div class="btn-group" role="group">
                                    <a class="btn btn-success" href="edit.php?id=<?php echo $director->getId(); ?>">
                                        Editar
                                    </a>
                                    <form name="delete-director" action="delete.php" method="POST" style="...">
                                        <input type="hidden" name="dirformId" value="<?php echo $director->getId();?>"/>
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
                Aun no existen directores.
            </div>
    <?php
        }
    ?>
</div>