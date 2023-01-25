<div>
<link rel="stylesheet" href="../styles/main.css" type="text/css">
    <?php
    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PortadaController.php');
    ?>
    <body>
        <div>
            <?php
                $idportada = $_GET['id'];
                $portadaObjeto = obtenerportada($idportada);

                $sendData = false;
                $PortadaEditada =false;
                if(isset($_POST['botonEditar']))
                {
                    $sendData = true;
                }
                if($sendData)
                {
                    if(isset($_POST['editarportada']) && isset($_POST['editartamaño']))
                    {                        
                        $PortadaEditad = actualizarPortada($_POST['idportada'], $_POST['editarportada'], $_POST['editartamaño']);
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
                <div class="item_column">EDITAR PORTADA</div>
                <div class="item_column"></div>
            </li>
            <form name="editar_portada" action="" method="POST">
            <li class="table-row">
                    <div class="item_column">
                        <label for="editarIdioma" class="form-label">Tamaño</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="editarportada" name="editarportada" type="text" placeholder="Introduce el tamaño" class="form-control"
                        required value="<?php if(isset($portadaObjeto)) echo $portadaObjeto->getTamanio();?>" />
                    </div>
                    <div class="item_column_wide">
                    <label for="editarIso" class="form-label">Imagen</label>
                    </div>
                    <div>
                    <input id="editarIso" name="editarImagen" type="text" placeholder="Introduce la imagen" class="form-control"
                    required value="<?php if(isset($portadaObjeto)) echo $portadaObjeto->getImagen();?>" />
                    <input type="hidden" name="portadaID" value="<?php echo $idportada;?>"/>
                    </div>
                    </li>
                <input style="float: right;" type="submit" value="Editar" class="btn btn-primary" name="botonEditar" />
            </form>
        </ul>
     </div>
     <?php
        }
        else
        {
            if($PortadaEditada)
                 {
                    ?>
                    <div class="row">
                        <div class="alerta alerta-success" role="alert">
                            Portada Editada correctamente. <br><br>
                            <a href="index.php">Volver al listado de Portadas</a>
                        </div>
                    </div>
                <?php
                    }
                    else
                    {
                 ?>
                 <div class="row">
                    <div class="alerta alerta-danger" role="alert">
                        La portada no se ha editado correctamente. <br><br>
                        <a href="edit.php?id=<?php echo $idportada;?>"> Volver a intentarlo.</a>
                    </div>
                 </div>
                 <?php
                    }
                }
            ?>
        </div>
    </body>
</div>