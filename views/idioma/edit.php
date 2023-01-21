<div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/IdiomaController.php';
    ?>
    <body>
        <div>
            <?php
                $idIdioma = $_GET['id'];
                $idiomaObjeto = obtenerIdioma($idIdioma);

                $sendData = false;
                $idiomaEditado =false;
                if(isset($_POST['botonEditar']))
                {
                    $sendData = true;
                }
                /*if($sendData)
                {
                    if(isset($_POST['nuevoIdioma']) && isset($_POST['nuevoIso']))
                    {
                        $idiomaEditado = actualizarIdioma($_POST['nuevoIdioma'], $_POST['nuevoIso']);
                    }
                }*/
                if(!$sendData)
                {                    
            ?>
            <div class="row">   
                <div class="col-12">
                <h1>Editar idioma</h1>
                </div>
                <div>
                    <form name="nuevo_idioma" action="" method="POST">
                        <div class="mb-3">
                            <label for="nuevoIdioma" class="form-label">Nombre idioma</label>
                            <input id="nuevoIdioma" name="nuevoIdioma" type="text" placeholder="Introduce el nombre del idioma" class="form-control"
                             required value="<?php if(isset($idiomaObjeto)) echo $idiomaObjeto->getNombre();?>" />
                            
                            <label for="nuevoIso" class="form-label">Iso code</label>
                            <input id="nuevoIso" name="nuevoIso" type="text" placeholder="Introduce el iso code" class="form-control" 
                                required value="<?php if(isset($idiomaObjeto)) echo $idiomaObjeto->getIsoCode();?>" />
                            <input type="hidden" name="idIdioma" value=<?php echo $idIdioma; ?>/>
                            </div>
                            <input type="submit" value="Editar" class="btn btn-primary" name="botonEditar" />            
                        </form>
                </div>
            </div>
            <?php
                }
                else
                {
                    if($idiomaEditado)
                    {
                    ?>
                    <div class="row">
                        <div class="alerta alerta-success" role="alert">
                            Idioma editado correctamente.
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
                        El idioma no se ha editado correctamente.
                        <a href="edit.php?id=<?php echo $idIdioma;?>"> Volver a intentarlo.</a>
                    </div>
                 </div>
                 <?php
                    }
                }
            ?>
        </div>
    </body>
</div>