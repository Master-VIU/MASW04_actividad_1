<div>
    <link rel="stylesheet" href="../styles/biblioteca.css" type="text/css">
    <link rel="stylesheet" href="../styles/bootstrap.css" type="text/css">
    <div class="table_container">
        <ul class="items_table">
            <li class="table-title">
                <div class="item_column">
                    <a class="btn btn-success" href="index.php">
                        Volver
                    </a>
                </div>
                <div class="item_column_wide">NUEVA TEMPORADA</div>
                <div class="item_column"></div>
            </li>
            <?php
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/TemporadaController.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/MASW04_actividad_1/controllers/SerieController.php');
            ?>
            <?php
            $sendData = false;
            $temporadaCreada = false;

            if (isset($_POST['botonCrear'])) {
                $sendData = true;
            }
            if ($sendData) {
                if (isset($_POST['numero']) && isset($_POST['serie']) && isset($_POST['id']) && isset($_POST['fechaLanzamiento'])) {
                    $temporadaCreada = crearTemporada($_POST['numero'], $_POST['serie'], $_POST['id'], $_POST['fechaLanzamiento']);
                }

                if ($temporadaCreada) {
                    ?>
                    <li class="table-success">
                        <div class="item_column">Temporada creada con éxito!</div>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="table-wrong">
                        <div class="item_column">Error al crear la temporada. Inténtalo de nuevo</div>
                    </li>

                    <?php
                }
            }
            ?>
            <form name="nueva_temporada" action="" method="POST">
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="id" class="form-label">ID (uuid)</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="id" name="id" type="text" placeholder="Introduce el id" class="form-control"
                               required/>
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="numero" class="form-label">Número</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="numero" name="numero" type="number" min="0" placeholder="Introduce el numero"
                               class="form-control" required/>
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="serie" class="form-label">Serie</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="serie" name="serie" required>
                            <?php
                            $listaSeries = listarSeries();
                            foreach ($listaSeries as $serie)
                            {
                            ?>
                            <option value="<?php echo $serie->getId(); ?>"><?php echo $serie->getTitulo(); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="fechaLanzamiento" class="form-label">Fecha de lanzamiento</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="fechaLanzamiento" name="fechaLanzamiento" type="date"
                               placeholder="Introduce la fecha de lanzamiento" class="form-control" required/>
                    </div>
                    <div class="item_column"></div>
                </li>
                <input style="float: right;" type="submit" value="Crear" class="btn btn-primary" name="botonCrear"/>
            </form>
        </ul>
    </div>