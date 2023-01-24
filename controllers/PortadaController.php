<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/Portada.php');

function listarPortadas()
{
   $model =new Portada(null,null);
   $listarPortada = $model -> getAll();
return $listarPortada;
}


function  crearPortada($imagen)
{
   $nuevaPortada = new Portada(null, $imagen);
   $portadaCreada = $nuevaPortada->create();
   return $portadaCreada;
}


function obtenerPortada($idPortada)
{
    $model = new Portada($idPortada,null);
    $portadaObjeto = $model->get();
    return $portadaObjeto;
}

function actualizarPortada($id, $imagen)
{
    $portada = new Portada($id, $imagen);
    $portadaActualizada = $portada->update();
    return $portadaActualizada;
}

function eliminarPortada($id)
{
    $portada = new Portada($id,null);
    $portadaEliminada = $portada->remove();
    return $portadaEliminada;
}
?>


?>