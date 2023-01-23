<div>
    <link rel="stylesheet" href="../styles/main.css" type="text/css">
    <?php
    include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PlataformaController.php';
    ?>
    <body>
        <div>
            <?php
                $idIPlataforma = $_GET['id'];
                $plataformaObjeto = obtenerPlataforma($idIPlataforma);

                $sendData = false;
                $plataformaEditada = false;
                if(isset($_POST['botonEditar']))
                {
                    $sendData = true;
                }
                if($sendData)
                {
                    if(isset($_POST['editarPlataforma']))
                    {                        
                        $plataformaEditada = actualizarPlataforma($_POST['platafromaId'], $_POST['editarPlataforma']);
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
                <div class="item_column">EDITAR PLATAFORMA</div>
                <div class="item_column"></div>
            </li>
            <form name="editar_plataforma" action="" method="POST">
            <li class="table-row">
                    <div class="item_column">
                        <label for="editarPlataforma" class="form-label">Nombre</label>
                    </div>
                    <div class="item_column_wide">
                        <input id="editarPlataforma" name="editarPlataforma" type="text" placeholder="Introduce el nombre d ela plataforma" class="form-control"
                        required value="<?php if(isset($plataformaObjeto)) echo $plataformaObjeto->getNombre();?>" />
                        <input type="hidden" name="platafromaId" value="<?php echo $idIPlataforma;?>"/>
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
            if($plataformaEditada)
                 {
                    ?>
                    <div class="row">
                        <div class="alerta alerta-success" role="alert">
                            Plataforma editada correctamente. <br><br>
                            <a href="index.php">Volver al listado de idiomas</a>
                        </div>
                    </div>
                <?php
                    }
                    else
                    {
                 ?>
                 <div class="row">
                    <div class="alerta alerta-danger" role="alert">
                       La plataforma no se ha editado correctamente. <br><br>
                        <a href="edit.php?id=<?php echo $idIPlataforma;?>"> Volver a intentarlo.</a>
                    </div>
                 </div>
                 <?php
                    }
                }
            ?>
        </div>
    </body>
</div>