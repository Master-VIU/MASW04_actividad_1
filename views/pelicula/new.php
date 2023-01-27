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
                <div class="item_column">NUEVA PELICULA</div>
                <div class="item_column"></div>
        </li>

    <?php
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PlataformaController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PeliculaController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/ClasificacionController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/DirectorController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/GeneroController.php');
        require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PortadaController.php');
        $sendData =false;
        $peliculaCreada = false;

        if(isset($_POST['botonCrear']))
        {
            $sendData = true;
        }
        if($sendData)
        {
            if(isset($_POST['titulo']) &&
                    isset($_POST['plataforma']) &&
                    isset($_POST['director']) &&
                    isset($_POST['puntuacion']) &&
                    isset($_POST['clasificacion']) &&
                    isset($_POST['genero']) &&
                    isset($_POST['portada']) &&
                    isset($_POST['horas']) &&
                    isset($_POST['minutos']) &&
                    isset($_POST['segundos']))
            {
                $duracion = intval($_POST['segundos']) + intval($_POST['minutos'])*60 + intval($_POST['horas']*3600);
                $peliculaCreada = crearPelicula(
                    $_POST['titulo'],
                    $_POST['plataforma'],
                    $_POST['director'],
                    intval($_POST['puntuacion']),
                    $_POST['clasificacion'],
                    $_POST['genero'],
                    $_POST['portada'],
                    $duracion
                );
            }

            if ($peliculaCreada)
            {
                ?>
                <li class="table-success">
                    <div class="item_column">Película creada correctamente.</div>
                </li>
                <?php
            }
            else
            {
                ?>
                <li class="table-wrong">
                    <div class="item_column">No se ha podido crear la película. Inténtalo de nuevo.</div>
                </li>
                <?php
            }
        }
    ?>
            <form name="nueva_pelicula" action="" method="POST">
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="titulo" class="form-label">Título</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="titulo" name="titulo" type="text" placeholder="Introduce el título de la pelicula" class="form-control" required />
                    </div>
                </li>
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="plataforma" class="form-label">Plataforma</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="plataforma" name="plataforma" required>
                            <?php
                            $listaPlataformas = listarPlataformas();
                            foreach ($listaPlataformas as $plataforma)
                            {
                                ?>
                                <option value="<?php echo $plataforma->getId(); ?>"><?php echo $plataforma->getNombre(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                </li>
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="director" class="form-label">Director</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="director" name="director" required>
                            <?php
                            $listaDirectores = listarDirectores();
                            foreach ($listaDirectores as $director)
                            {
                                ?>
                                <option value="<?php echo $director->getId(); ?>"><?php echo $director->getNombre()." ".$director->getApellidos(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                </li>
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="puntuacion" class="form-label">Puntuacion</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="puntuacion" name="puntuacion" type="number" value="0" min="0" max="10" placeholder="Introduce la puntuación de la pelicula" class="form-control" required />
                    </div>

                </li>
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="clasificacion" class="form-label">Clasificación</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="clasificacion" name="clasificacion" required>
                            <?php
                            $listaClasificaciones = listarClasificaciones();
                            foreach ($listaClasificaciones as $clasificacion)
                            {
                                ?>
                                <option value="<?php echo $clasificacion->getId(); ?>"><?php echo $clasificacion->getTipo(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                </li>
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="genero" class="form-label">Género</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="genero" name="genero" required>
                            <?php
                            $listaGeneros = listarGeneros();
                            foreach ($listaGeneros as $genero)
                            {
                                ?>
                                <option value="<?php echo $genero->getId(); ?>"><?php echo $genero->getNombre(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                </li>
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="portada" class="form-label">Portada</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="portada" name="portada" required>
                            <?php
                            $listaPortadas = listarPortada();
                            foreach ($listaPortadas as $portada)
                            {
                                ?>
                                <option value="<?php echo $portada->getId(); ?>"><?php echo $portada->getId(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                </li>
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="duracion" class="form-label">Duración</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="horas" name="horas" type="number" value="0" placeholder="Introduce horas" min="0" class="form-control" required/>
                        <input id="minutos" name="minutos" type="number" value="0" placeholder="Introduce minutos" min="0" max="59" class="form-control" required/>
                        <input id="segundos" name="segundos" type="number" value="0" placeholder="Introduce segundos" min="0" max="59" class="form-control" required/>
                    </div>

                </li>
                <input style="float: right;" type="submit" value="Crear" class="btn btn-primary" name="botonCrear" />
            </form>
        </ul>
</div>