<div>
<link rel="stylesheet" href="../styles/main.css" type="text/css">
    <?php
    include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/IdiomaController.php';
    ?>
    <body>
        <?php
            $sendData =false;
            $idiomaCreado = false;
            
            if(isset($_POST['botonCrear']))
            {
                $sendData = true;
            }
            if($sendData)
            {
                if(isset($_POST['nuevoIdioma']) && isset($_POST['nuevoIso']))
                {
                    $idiomaCreado = crearIdioma($_POST['nuevoIdioma'], $_POST['nuevoIso']);
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
                <div class="item_column">NUEVO IDIOMA</div>
                <div class="item_column"></div>
            </li>
            <form name="nuevo_idioma" action="" method="POST">
                <li class="table-row">
                    <div class="item_column">
                        <label for="nuevoIdioma" class="form-label">Nombre</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="nuevoIdioma" name="nuevoIdioma" type="text" placeholder="Introduce el idioma" class="form-control" required />
                    </div>
                    <div class="item_column_wide">
                    <label for="nuevoIso" class="form-label">Iso code</label>
                    </div>
                    <div>
                    <input id="nuevoIso" name="nuevoIso" type="text" placeholder="Introduce el iso code" class="form-control" required />
                    </div>
                </li>
                <input style="float: right;" type="submit" value="Crear" class="btn btn-primary" name="botonCrear" />
            </form>
        </ul>
         </div>
        <?php
            }
            else{
                if($idiomaCreado)
                {
        ?>
             <div class="alert alert-success" role="alert">
                Idioma creado con éxito! <br><br>
                <a href="index.php"> Volver al listado de idiomas.</a>
            </div>
        <?php
            }
            else
            {
        ?>
             <div class="alert alert-danger" role="alert">
                 Error al crear el idioma. <br><br>
                <a href="index.php"> Volver a intentarlo</a>
            </div>
         <?php
            }
        }
        ?>
    </body>
</div>