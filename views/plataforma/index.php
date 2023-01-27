<div>
    <link rel="stylesheet" href="../styles/biblioteca.css" type="text/css">
    <?php
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PlataformaController.php');
    ?>
            <div class="table_container">
                <ul class="items_table">
                    <li class="table-title">
                        <div class="item_column">
                            <a class="btn btn-success" href="../">
                                Volver
                            </a>
                        </div>
                        <div class="item_column">PLATAFORMAS</div>
                        <div class="item_column">
                            <a class="btn btn-success" href="new.php">
                                Crear
                            </a>
                        </div>
                    </li>
                    <li class="table-header">
                        <div class="item_column">Id</div>
                        <div class="item_column">Nombre</div>
                        <div class="item_column_wide">Acciones</div>
                    </li>
                    <?php
                    $listaPlataformas = listarPlataformas();

                    if (count($listaPlataformas) > 0)
                    {
                    foreach($listaPlataformas as $plataforma)
                        {
                        ?>
                            <li class="table-row">
                                <div class="item_column" data-label="Id"><?php echo $plataforma->getId(); ?></div>
                                <div class="item_column" data-label="Nombre"><?php echo $plataforma->getNombre(); ?></div>
                                <div class="item_column_wide" data-label="Acciones">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-success" href="edit.php?id=<?php echo $plataforma->getId(); ?>">
                                            Editar
                                        </a>
                                        <form name="delete-plataforma" action="delete.php" method="POST" style="...">
                                            <input type="hidden" name="platformId" value="<?php echo $plataforma->getId();?>"/>
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
                Aun no existen plataformas.
            </div>
    <?php
        }
    ?>
</div>