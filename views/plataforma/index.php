<div>
    <?php
        include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PlataformaController.php';
        $listaPlataformas = listarPlataformas();

        if (count($listaPlataformas) > 0)
        {
    ?>
            <table class="tabla">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                <?php
                    foreach($listaPlataformas as $plataforma)
                    {
                ?>
                        <tr>
                            <td><?php echo $plataforma->getId(); ?></td>
                            <td><?php echo $plataforma->getNombre(); ?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-success" href="edit.php?id=<?php echo $plataforma->getId(); ?>">
                                        Editar
                                    </a>
                                    <form name="delete-plataforma" action="delete.php" method="POST" style="...">
                                        <input type="hidden" name="platformId" value="<?php echo $plataforma->getId();?>"/>
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
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