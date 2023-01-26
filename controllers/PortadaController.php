<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/Portada.php');

function listarportada()
{
   $model =new Portada();
   $listarPortada = $model -> getAll();
   return $listarPortada;
}


function  crearPortada($tamanio, $imagen)
{
   $nuevaPortada = new Portada(null, $tamanio, $imagen);
   $portadaCreada = $nuevaPortada->create();
   return $portadaCreada;
}


function obtenerPortada($id)
{
    $model = new Portada($id,null,null);
    $portadaObjeto= $model->get();
    return $portadaObjeto;
}

function actualizarPortada($idPortada, $tamanioPortada, $imagenPortada)
{
     $portadaActualizada = false;    
    $portada = new Portada($idPortada, $tamanioPortada, $imagenPortada);
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