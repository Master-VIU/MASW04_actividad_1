<div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/IdiomaController.php';
    ?>
    <body>
        <?php
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
            }

            if(!$sendData)
            {
        ?>    
        <div class="row">   
            <div class="col-12">
                <h1>Crear idioma</h1>
            </div>
            <div>
                <form name="nuevo_idioma" action="" method="POST">
                    <div class="mb-3">
                        <label for="nuevoIdioma" class="form-label">Nombre idioma</label>
                        <input id="nuevoIdioma" name="nuevoIdioma" type="text" placeholder="Introduce el idioma" class="form-control" required />
                        
                        <label for="nuevoIso" class="form-label">Iso code</label>
                        <input id="nuevoIso" name="nuevoIso" type="text" placeholder="Introduce el iso code" class="form-control" required />
                        
                        </div>
                        <input type="submit" value="Crear" class="btn btn-primary" name="botonCrear" />            
                    </form>
                </div>
        </div>
        <?php
            }
            else{
                if($idiomaCreado)
                {
        ?>
             <div class="alert alert-success" role="alert">
                Idioma creado con éxito! <br>
                <a href="index.php"> Volver al listado de idiomas.</a>
            </div>
        <?php
            }
            else
            {
        ?>
             <div class="alert alert-danger" role="alert">
                 No se ha creado el idioma. <br>
                <a href="index.php"> Volver a intentarlo</a>
            </div>
         <?php
            }
        }
        ?>
    </body>
</div>