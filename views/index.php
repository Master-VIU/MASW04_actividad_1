<div>
    <link rel="stylesheet" href="styles/main.css" type="text/css">
    <div class="table_container">
        <ul class="items_table">
            <li class="table-title">
                <div class="item_column"></div>
                <div class="item_column">INDICE GENERAL</div>
                <div class="item_column"></div>
            </li>
            <li class="table-header">
                <div class="item_column">Entidad</div>
                <div class="item_column_wide">Acciones</div>
            </li>
            <?php
            $listaEntidades = [
                "ACTORES" => "./actor/",
                "DIRECTORES" => "./director/",
                "PELICULAS" => "./pelicula/",
                "SERIES" => "./serie/",
                "PLATAFORMAS" => "./plataforma/",
                "IDIOMAS" => "./idioma/",
                "NACIONALIDADES" => "./nacionalidad/",
                "CLASIFICACIONES" => "./clasificacion/"
            ];
            foreach ($listaEntidades as $entidad => $ruta)
            {
                ?>
                <li class="table-row">
                    <div class="item_column" data-label="Entidad"><?php echo $entidad; ?></div>
                    <div class="item_column_wide" data-label="Acciones">
                        <a class="btn btn-success" href="<?php echo $ruta; ?>">
                            Acceder a la lista
                        </a>
                    </div>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>