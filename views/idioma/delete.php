<div>
    <?php
include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/IdiomaController.php';

$idioma = $_POST['idiformId'];

if($idioma != null)
{
    eliminarIdioma($idioma);
            
}
?>

<div class="alert alert-success" role="alert">
    Idioma eliminado con éxito!
            </div>
</div>