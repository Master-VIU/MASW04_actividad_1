<div>
    <?php
include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/portadacontroller.php';

$portada_eliminar = $_POST['idiformId'];
$PortadaEliminada = eliminarPortada($portada_eliminar);
if($PortadaEliminada)
{    
    ?>
    <div class="alert alert-success" role="alert">
        Portada eliminada con éxito! <br><br>
        <a href="index.php"> Volver al listado de Portadas.</a>
    </div>
<?php
}
else{
        ?>
        <div class="alert alert-danger" role="alert">
            La Portada no se ha borrado correctamente. <br><br>
            <a href="index.php"> Volver a intentarlo</a>
        </div>
    <?php
}
?>


</div>