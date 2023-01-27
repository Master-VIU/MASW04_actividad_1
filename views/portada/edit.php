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
                <div class="item_column">EDITAR PORTADA</div>
                <div class="item_column"></div>
            </li>
    <?php
    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PortadaController.php');
   
        $idPortada = $_GET['id'];
        $portadaObjeto = obtenerPortada($idPortada);

        $sendData = false;
        $PortadaEditada =false;
        if(isset($_POST['botonEditar']))
         {
            $sendData = true;
        }
        if($sendData)
        {
            if( isset($_POST['editarIamgen']))
            {                        
                $PortadaEditada = actualizarPortada($_POST['idPortada'], $_POST['editarIamgen']);
            }
        if($PortadaEditada)
        {
        ?>                
        <li class="table-success">
             <div class="item_column">Portada editada correctamente.</div>
        </li>
        <?php
        }
        else
        {
        ?>
        <li class="table-wrong">
            <div class="item_column">
                La portada no se ha editado correctamente.
                <a href="edit.php?id=<?php echo $idPortada;?>"> Volver a intentarlo.</a>
            </div>
        </li>
        <?php
            }
        }
        else
        {
        ?>
        <form name="editar_idioma" action="" method="POST">
            <li class="table-row">
                    
                    <div class="item_column_wide">
                    <label for="editarIamgen" class="form-label">Imagen de Portada</label>
                    </div>
                    <div>
                    <input id="editarIamgen" name="editarIamgen" type="text" placeholder="Introduce la imagen" class="form-control"
                    required value="<?php if(isset($portadaObjeto)) echo $portadaObjeto->getImagen();?>" />
                    <input type="hidden" name="idPortada" value="<?php echo $idPortada;?>"/>
                    </div>
                    </li>
                <input style="float: right;" type="submit" value="Editar" class="btn btn-primary" name="botonEditar" />
            </form>
            <?php
           }
         ?>
    </ul>
   </div>
</div> 