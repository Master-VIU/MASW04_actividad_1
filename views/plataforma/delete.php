<div>
    <?php
        include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/PlataformaController.php';
        $plataforma = $_POST['platformId'];
        $plataformaEliminada = eliminarPlataforma($plataforma);
        if($plataformaEliminada)
        {    
            ?>
            <div class="alert alert-success" role="alert">
                Plataforma eliminada con éxito! <br><br>
                <a href="index.php"> Volver al listado de plataformas.</a>
            </div>
        <?php
        }
        else{
                ?>
                <div class="alert alert-danger" role="alert">
                    El plataforma no se ha borrado correctamente. <br><br>
                    <a href="index.php"> Volver a intentarlo</a>
                </div>
            <?php
        }
    ?>
</div>