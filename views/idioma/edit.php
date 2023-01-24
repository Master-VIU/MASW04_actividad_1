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
                <div class="item_column">EDITAR IDIOMA</div>
                <div class="item_column"></div>
            </li>
    <?php
    include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/IdiomaController.php';
   
        $idIdioma = $_GET['id'];
        $idiomaObjeto = obtenerIdioma($idIdioma);

        $sendData = false;
        $idiomaEditado =false;
        if(isset($_POST['botonEditar']))
         {
            $sendData = true;
        }
        if($sendData)
        {
            if(isset($_POST['editarIdioma']) && isset($_POST['editarIso']))
            {                        
                $idiomaEditado = actualizarIdioma($_POST['idiomaId'], $_POST['editarIdioma'], $_POST['editarIso']);
            }
        if($idiomaEditado)
        {
        ?>                
        <li class="table-success">
             <div class="item_column">Idioma editado correctamente.</div>
        </li>
        <?php
        }
        else
        {
        ?>
        <li class="table-wrong">
            <div class="item_column">
                El idioma no se ha editado correctamente.
                <a href="edit.php?id=<?php echo $idIdioma;?>"> Volver a intentarlo.</a>
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
                    <div class="item_column">
                        <label for="editarIdioma" class="form-label">Nombre</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="editarIdioma" name="editarIdioma" type="text" placeholder="Introduce el idioma" class="form-control"
                        required value="<?php if(isset($idiomaObjeto)) echo $idiomaObjeto->getNombre();?>" />
                    </div>
                    <div class="item_column_wide">
                    <label for="editarIso" class="form-label">Iso code</label>
                    </div>
                    <div>
                    <input id="editarIso" name="editarIso" type="text" placeholder="Introduce el iso code" class="form-control"
                    required value="<?php if(isset($idiomaObjeto)) echo $idiomaObjeto->getIsoCode();?>" />
                    <input type="hidden" name="idiomaId" value="<?php echo $idIdioma;?>"/>
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