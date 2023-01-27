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
                <div class="item_column">NUEVO ACTOR</div>
                <div class="item_column"></div>
            </li> 
    <?php
    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/ActorController.php');
    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/NacionalidadController.php');
    ?>
        <?php
            $sendData =false;
            $actorCreado = false;
            
            if(isset($_POST['botonCrear']))
            {
                $sendData = true;
            }
            if($sendData)
            {
                if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['dni']) && isset($_POST['fechaNacimiento']) && isset($_POST['nacionalidad']))
                {
                    $actorCreado = crearActor($_POST['nombre'], $_POST['apellido'], $_POST['dni'], $_POST['fechaNacimiento'], $_POST['nacionalidad']);
                }

            if($actorCreado)
            {
        ?>
             <li class="table-success">
             <div class="item_column">Actor creado con éxito! </div>
            </li>
        <?php
            }
            else
            {
        ?>
             <li class="table-wrong">
             <div class="item_column">Error al crear el director. Inténtalo de nuevo</div>
            </li>

        <?php
            }
        }
        ?>
    <form name="nueva_actor" action="" method="POST">
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="nombre" class="form-label">Nombre</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="nombre" name="nombre" type="text" placeholder="Introduce el nombre" class="form-control" required />
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="apellido" class="form-label">Apellidos</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="apellido" name="apellido" type="text" placeholder="Introduce los apellidos" class="form-control" required />
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="dni" class="form-label">Dni</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="dni" name="dni" type="text" maxlength="9" placeholder="Introduce dni max 9 caracteres" class="form-control" required />
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="fechaNacimiento" class="form-label">Fecha de nacimiento</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="fechaNacimiento" name="fechaNacimiento" type="date" min="1940-01-01" max="2013-12-31" placeholder="Introduce la fecha de nacimiento" class="form-control" required />
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row-form">
                    <div class="item_column">
                        <label for="nacionalidad" class="form-label">Nacionalidad</label>
                    </div>
                    <div class="item_column_wide">
                        <select id="nacionalidad" name="nacionalidad" required>
                            <?php
                            $listaNacionalidades = listarNacionalidades();
                            foreach ($listaNacionalidades as $nacionalidad)
                            {
                                ?>
                                <option value="<?php echo $nacionalidad->getId(); ?>"><?php echo $nacionalidad->getPais(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="item_column"></div>
                </li>
                <input style="float: right;" type="submit" value="Crear" class="btn btn-primary" name="botonCrear" />
            </form>
        </ul>
</div>