<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/Portada.php');

function listarportada()
{
   $model =new Portada();
   $listarPortada = $model -> getAll();
   return $listarPortada;
}


function  crearPortada( $imagen)
{
   $nuevaPortada = new Portada(null, $imagen);
   $portadaCreada = $nuevaPortada->create();
   return $portadaCreada;
}


function obtenerPortada($id)
{
    $model = new Portada($id,null);
    $portadaObjeto= $model->get();
    return $portadaObjeto;
}

function actualizarPortada($idPortada, $imagenPortada)
{
     $portadaActualizada = false;    
    $portada = new Portada($idPortada, $imagenPortada);
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
