<div>
<link rel="stylesheet" href="../styles/main.css" type="text/css">
    <?php
    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PortadaController.php');
    ?>
    <body>
        <?php
            $sendData =false;
            $PortadaCreado = false;
            
            if(isset($_POST['botonCrear']))
            {
                $sendData = true;
            }
            if($sendData)
            {
                if(isset($_POST['nuevoTamanio']) && isset($_POST['nuevaImagen']))
                {
                    $PortadaCreada = crearportada($_POST['nuevoTamanio'], $_POST['nuevaImagen']);
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
                <div class="item_column">NUEVA PORTADA</div>
                <div class="item_column"></div>
            </li>
            <form name="nueva_portada" action="" method="POST">
                <li class="table-row">
                    <div class="item_column">
                        <label for="nuevaPortada" class="form-label">Tamaño</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="nuevaPortada" name="nuevaPortada" type="text" placeholder="Introduce el tamaño de la imagen" class="form-control" required />
                    </div>
                    <div class="item_column_wide">
                    <label for="nuevaImagen" class="form-label">Imagen</label>
                    </div>
                    <div>
                    <input id="nuevaImagen" name="nuevaImagen" type="text" placeholder="Introduce la imagen" class="form-control" required />
                    </div>
                </li>
                <input style="float: right;" type="submit" value="Crear" class="btn btn-primary" name="botonCrear" />
            </form>
        </ul>
         </div>
        <?php
            }
            else{
                if($PortadaCreada)
                {
        ?>
             <div class="alert alert-success" role="alert">
                Portada creada con éxito! <br><br>
                <a href="index.php"> Volver al listado de portadas.</a>
            </div>
        <?php
            }
            else
            {
        ?>
             <div class="alert alert-danger" role="alert">
                 No se ha creado la portada. <br><br>
                <a href="index.php"> Volver a intentarlo</a>
            </div>
         <?php
            }
        }
        ?>
    </body>
</div>