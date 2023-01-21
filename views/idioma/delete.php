<div>
    <?php
include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/IdiomaController.php';

$idioma = $_POST['idiformId'];
$idiomaEliminado = eliminarIdioma($idioma);
if($idiomaEliminado)
{    
    ?>
    <div class="alert alert-success" role="alert">
        Idioma eliminado con éxito! <br><br>
        <a href="index.php"> Volver al listado de idiomas.</a>
    </div>
<?php
}
else{
        ?>
        <div class="alert alert-danger" role="alert">
            El idioma no se ha borrado correctamente. <br><br>
            <a href="index.php"> Volver a intentarlo</a>
        </div>
    <?php
}
?>


</div>