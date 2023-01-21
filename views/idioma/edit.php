<div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/IdiomaController.php';
        $listaIdiomas = listarIdiomas();

        if (count($listaIdiomas) > 0)
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
                    foreach($listaIdiomas as $idioma)
                    {
                ?>
                        <tr>
                            <td><?php echo $idioma->getId(); ?></td>
                            <td><?php echo $idioma->getNombre(); ?></td>
                            <td><?php echo $idioma->getIsoCode(); ?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-success" href="edit.php?id=<?php echo $idioma->getId(); ?>">
                                        Editar
                                    </a>
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
                Aun no existen idiomas.
            </div>
    <?php
        }
    ?>
</div>