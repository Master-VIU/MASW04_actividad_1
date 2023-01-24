<div>
<link rel="stylesheet" href="../styles/main.css" type="text/css">
    <?php
    include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/ActorController.php';
    ?>
    <body>
        <?php
            $sendData =false;
            $actorCreado = false;
            
            if(isset($_POST['botonCrear']))
            {
                $sendData = true;
            }
            if($sendData)
            {
                if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['fechaNacimiento']) && isset($_POST['nacionalidad']))
                {
                    $actorCreado = crearActor($_POST['nombre'], $_POST['apellido'], $_POST['fechaNacimiento'], $_POST['nacionalidad']);
                }
            }

            if(!$sendData)
            {
        ?>            

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
            <form name="nueva_actor" action="" method="POST">
                <li class="table-row">
                    <div class="item_column">
                        <label for="nombre" class="form-label">Nombre</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="nombre" name="nombre" type="text" placeholder="Introduce el nombre" class="form-control" required />
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row">
                    <div class="item_column">
                        <label for="apellido" class="form-label">Apellido</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="apellido" name="apellido" type="text" placeholder="Introduce los apellidos" class="form-control" required />
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row">
                    <div class="item_column">
                        <label for="fechaNacimiento" class="form-label">Fecha de nacimiento</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="fechaNacimiento" name="fechaNacimiento" type="date" min="1940-01-01" max="2013-12-31" placeholder="Introduce la fecha de nacimiento" class="form-control" required />
                    </div>
                    <div class="item_column"></div>
                </li>
                <li class="table-row">
                    <div class="item_column">
                        <label for="nacionalidad" class="form-label">Nacionalidad</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="nacionalidad" name="nacionalidad" type="text" placeholder="Introduce la nacionalidad" class="form-control" required />
                    </div>
                    <div class="item_column"></div>
                </li>
                <input style="float: right;" type="submit" value="Crear" class="btn btn-primary" name="botonCrear" />
            </form>
        </ul>
         </div>
        <?php
            }
            else{
                if($actorCreado)
                {
        ?>
             <div class="alert alert-success" role="alert">
                Actor creado con éxito! <br><br>
                <a href="index.php"> Volver al listado de actores.</a>
            </div>
        <?php
            }
            else
            {
        ?>
             <div class="alert alert-danger" role="alert">
                 Error al crear el actor. <br><br>
                <a href="index.php"> Volver a intentarlo</a>
            </div>
         <?php
            }
        }
        ?>
    </body>
</div>