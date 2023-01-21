<div>
    <link rel="stylesheet" href="../styles/main.css" type="text/css">
    <?php
        include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PlataformaController.php';
        $listaPlataformas = listarPlataformas();

        if (count($listaPlataformas) > 0)
        {
    ?>
            <div class="table_container">
                <ul class="items_table">
                    <li class="table-header">
                        <div class="item_column">Id</div>
                        <div class="item_column">Nombre</div>
                        <div class="item_column">Acciones</div>
                    </li>
                    <?php
                    foreach($listaPlataformas as $plataforma)
                        {
                        ?>
                            <li class="table-row">
                                <div class="item_column" data-label="Id"><?php echo $plataforma->getId(); ?></div>
                                <div class="item_column" data-label="Nombre"><?php echo $plataforma->getNombre(); ?></div>
                                <div class="item_column" data-label="Acciones">
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