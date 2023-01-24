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
                <div class="item_column">BORRADO</div>
                <div class="item_column"></div>
            </li>
    <?php
include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/controllers/IdiomaController.php';

$idioma = $_POST['idiformId'];
$idiomaEliminado = eliminarIdioma($idioma);
if($idiomaEliminado)
{    
    ?>
    <li class="table-success">
        <div class="item_column">Idioma eliminado con éxito!</div>
    </li>
<?php
}
else{
        ?>
        <li class="table-wrong">
            <div class="item_column">El idioma no se ha borrado correctamente. Inténtalo de nuevo.</div>
        </li>
    <?php
}
?>


</div>