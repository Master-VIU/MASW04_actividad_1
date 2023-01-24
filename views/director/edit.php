<div>
    <link rel="stylesheet" href="../styles/main.css" type="text/css">
    <div class="table_container">
        <ul class="items_table">
            <li class="table-title">
                <div class="item_column">
                    <a class="btn btn-success" href="index.php">
                        Volver
                    </a>
                </div>
                <div class="item_column">EDITAR DIRECTOR</div>
                <div class="item_column"></div>
            </li>
            <?php
            include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/DirectorController.php';
                $idDirector = $_GET['id'];
                $directorObjeto = obtenerDirector($idDirector);

                $sendData = false;
                $directorEditado = false;
                if(isset($_POST['botonEditar']))
                {
                    $sendData = true;
                }
                if($sendData)
                {
                    if(isset($_POST['nombre']) && isset($_POST['apellido']) 
                        && isset($_POST['fechaNacimiento']) && isset($_POST['nacionalidad']))
                    {
                        $directorEditado = actualizarDirector($_POST['dirformId'], $_POST['nombre'], $_POST['apellido'], $_POST['fechaNacimiento'], $_POST['nacionalidad']);
                    }

                    if($directorEditado)
                    {
                    ?>
                        <li class="table-success">
                            <div class="item_column">Director editado correctamente.</div>
                        </li>
                    <?php
                    }
                    else
                    {
                    ?>
                        <li class="table-wrong">
                            <div class="item_column">
                                El director no se ha editado correctamente.
                                <a href="edit.php?id=<?php echo $idDirector;?>"> Volver a intentarlo.</a>
                            </div>
                        </li>
                    <?php
                    }
                }
                else
                {
                    ?>
            <form name="editar_director" action="" method="POST">
            <li class="table-row">
                    <div class="item_column">
                        <label for="nombre" class="form-label">Nombre</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="nombre" name="nombre" type="text" placeholder="Introduce el nombre" class="form-control" 
                        required value="<?php if(isset($directorObjeto)) echo $directorObjeto->getNombre();?>" />
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row">
                    <div class="item_column">
                        <label for="apellido" class="form-label">Apellidos</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="apellido" name="apellido" type="text" placeholder="Introduce los apellidos" class="form-control" 
                        required value="<?php if(isset($directorObjeto)) echo $directorObjeto->getApellidos();?>" />
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row">
                    <div class="item_column">
                        <label for="fechaNacimiento" class="form-label">Fecha de nacimiento</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="fechaNacimiento" name="fechaNacimiento" type="date" min="1940-01-01" max="2013-12-31" placeholder="Introduce la fecha de nacimiento" class="form-control" 
                        required value="<?php if(isset($directorObjeto)) echo $directorObjeto->getFechaNacimiento();?>" />
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row">
                    <div class="item_column">
                        <label for="nacionalidad" class="form-label">Nacionalidad</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="nacionalidad" name="nacionalidad" type="text" placeholder="Introduce la nacionalidad" class="form-control"
                        required value="<?php if(isset($directorObjeto)) echo $directorObjeto->getNacionalidad();?>" />
                    </div>
                    <input type="hidden" name="dirformId" value="<?php echo $idDirector;?>"/>
                    <div class="item_column"></div>
                </li>
                <input style="float: right;" type="submit" value="Editar" class="btn btn-primary" name="botonEditar" />
            </form>

                    <?php
                }
            ?>
        </ul>
    </div>
</div>