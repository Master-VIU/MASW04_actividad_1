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
                <div class="item_column">NUEVO EPISODIO</div>
                <div class="item_column"></div>
            </li>            
    <?php
    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/EpisodioController.php');  
            
    $sendData =false;
    $episodioCreado = false;
            
    if(isset($_POST['botonCrear']))
    {
        $sendData = true;
    }
    if($sendData)
    {
        if(isset($_POST['nuevaTemporada']) && isset($_POST['nuevoNumero'])&&isset($_POST['nuevoTitulo'])&&isset($_POST['nuevaDuracion']))
        {
            $episodioCreado = crearEpisodio($_POST['nuevaTemporada'], $_POST['nuevoNumero'], $_POST['nuevoTitulo'], $_POST['nuevaduracion']);
        }

        if($episodioCreado)
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
                    <label for="nuevaTemporada" class="form-label">Temporada</label>
                </div>
                <div class="item_column_wide">
                    <input id="nuevaTemporada" name="nuevaTemporada" type="text" placeholder="Introduce la Temporada" class="form-control" required />
                </div>
                <div class="item_column_wide">
                    <label for="nuevoNumero" class="form-label">Numero</label>
                </div>
                <div>
                    <input id="nuevoNumero" name="nuevoNumero" type="text" placeholder="Introduce el # episodio" class="form-control" required />
                </div>
                <div class="item_column_wide">
                    <label for="nuevoTitulo" class="form-label">Titulo</label>
                </div>
                <div>
                    <input id="nuevoTitulo" name="nuevoTitulo" type="text" placeholder="Introduce el Titulo" class="form-control" required />
                </div>
                <div class="item_column_wide">
                    <label for="nuevaDuracion" class="form-label">Duracion</label>
                </div>
                <div>
                    <input id="nuevaDuracion" name="nuevaDuracion" type="text" placeholder="Introduce La duracion" class="form-control" required />
                </div>
                
            </li>
            <input style="float: right;" type="submit" value="Crear" class="btn btn-primary" name="botonCrear" />
            </form>        
        </ul>
    </div>