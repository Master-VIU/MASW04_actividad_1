<div>
<link rel="stylesheet" href="../styles/biblioteca.css" type="text/css">
<div class="table_container">
        <ul class="items_table">
            <li class="table-title">
                <div class="item_column">
                    <a class="btn btn-success" href="index.php">
                        Volver
                    </a>
                </div>
                <div class="item_column">NUEVA NACIONALIDAD</div>
                <div class="item_column"></div>
            </li>          
    <?php
    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/NacionalidadController.php');  
            
    $sendData =false;
    $nacionalidadCreada = false;
            
    if(isset($_POST['botonCrear']))
    {
        $sendData = true;
    }
    if($sendData)
    {
        if(isset($_POST['nacionalidad']))
        {
            $nacionalidadCreada = crearNacionalidad($_POST['nacionalidad']);
        }

        if($nacionalidadCreada)
        {
            
            ?>
            <li class="table-success">
                <div class="item_column">Nacionalidad creada correctamente.</div>
                </li>
            <?php
        }
        else
        {
            ?>
            <li class="table-wrong">
                <div class="item_column">No se ha podido crear la nacionalidad. Inténtalo de nuevo.</div>
            </li>
            <?php
        }
    }
 ?>            
         <form name="nueva_nacionalidad" action="" method="POST">
            <li class="table-row">
                <div class="item_column">
                    <label for="nacionalidad" class="form-label">País</label>
                </div>
                <div class="item_column_wide">
                    <input id="nacionalidad" name="nacionalidad" type="text" placeholder="Introduce el país" class="form-control" required />
                </div>
            </li>
            <input style="float: right;" type="submit" value="Crear" class="btn btn-primary" name="botonCrear" />
            </form>
        
    </ul>
</div>