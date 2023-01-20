<div>
    <?php

    $listarIdiomas = listarIdiomas();

    if(count($listarIdiomas) > 0)
    {
    ?>
    }

    <table class="tabla">
            <thead>
                <th>Id</th>
                <th>Idioma</th>
                <th>IsoCode</th>
                <th>Acciones</th>
            </thead>
            <tbody>
            <?php
            foreach($listarIdiomas as $idioma)
            {
            ?>
            <tr>
                <td><?php echo $idioma->getId() ?></td>
                <td><?php echo $idioma->getNombre() ?></td>
                <td><?php echo $idioma->getIsoCode() ?></td>
                <td>
                     Acciones
                </td>
            </tr>
            <?php
            }
            ?>
            </body>
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