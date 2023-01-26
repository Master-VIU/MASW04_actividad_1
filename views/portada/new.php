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
                <div class="item_column">NUEVA PORTADA</div>
                <div class="item_column"></div>
            </li>            
    <?php
    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PortadaController.php');  
            
    $sendData =false;
    $portadaCreada = false;
            
    if(isset($_POST['botonCrear']))
    {
        $sendData = true;
    }
    if($sendData)
    {
        if(isset($_POST['nuevoTamanio']) && isset($_POST['nuevaImagen']))
        {
            $portadaCreada = crearPortada($_POST['nuevoTamanio'], $_POST['nuevaImagen']);
        }

        if($portadaCreada)
        {
            
            ?>
            <li class="table-success">
                <div class="item_column">Portda creada Correctamente.</div>
                </li>
            <?php
        }
        else
        {
            ?>
            <li class="table-wrong">
                <div class="item_column">No se ha podido crear la portada. Inténtalo de nuevo.</div>
            </li>
            <?php
        }
    }
?>            
       <form name="nuevo_idioma" action="" method="POST">
            <li class="table-row">
                <div class="item_column">
                    <label for="nuevoTamanio" class="form-label">Nombre</label>
                </div>
                <div class="item_column_wide">
                    <input id="nuevoTamanio" name="nuevoTamanio" type="text" placeholder="Introduce el Tamanio" class="form-control" required />
                </div>
                <div class="item_column_wide">
                    <label for="nuevaImagen" class="form-label">Iso code</label>
                </div>
                <div>
                    <input id="nuevaImagen" name="nuevaImagen" type="text" placeholder="Introduce la imagen" class="form-control" required />
                </div>
            </li>
            <input style="float: right;" type="submit" value="Crear" class="btn btn-primary" name="botonCrear" />
            </form>        
        </ul>
    </div>