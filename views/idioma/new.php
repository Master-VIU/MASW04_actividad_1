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
                <div class="item_column">NUEVO IDIOMA</div>
                <div class="item_column"></div>
            </li>            
    <?php
    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/IdiomaController.php');  
            
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

        if($idiomaCreado)
        {
            
            ?>
            <li class="table-success">
                <div class="item_column">Idioma creado correctamente.</div>
                </li>
            <?php
        }
        else
        {
            ?>
            <li class="table-wrong">
                <div class="item_column">No se ha podido crear el idioma. Inténtalo de nuevo.</div>
            </li>
            <?php
        }
    }
?>            
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