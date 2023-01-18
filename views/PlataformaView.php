<div>
    <?php
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
                            <td><?php echo $plataforma->getId() ?></td>
                            <td><?php echo $plataforma->getName() ?></td>
                            <td>
                                Acciones
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