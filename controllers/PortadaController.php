<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/Portada.php');

function listarPortadas()
{
   $model =new Portada(null,null,null);
   $listarPortada = $model -> getAll();
return $listarPortada;
}


function  crearPortada($tamanio, $imagen)
{
   $nuevaPortada = new Portada(null, $tamanio, $imagen);
   $portadaCreada = $nuevaPortada->create();
   return $portadaCreada;
}


function obtenerPortada($idPortada)
{
    $model = new Portada($idPortada,null,null);
    $portadaObjeto = $model->get();
    return $portadaObjeto;
}

function actualizarPortada($id, $tamanio, $imagen)
{
    $portada = new Portada($id, $tamanio, $imagen);
    $portadaActualizada = $portada->update();
    return $portadaActualizada;
}

function eliminarPortada($id)
{
    $portada = new Portada($id,null,null);
    $portadaEliminada = $portada->remove();
    return $portadaEliminada;
}
?>


?>