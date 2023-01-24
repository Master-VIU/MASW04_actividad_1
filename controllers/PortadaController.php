<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/Portada.php');

function listarportada()
{
   $model =new Portada(null,null,null);
   $listarportada = $model -> getAll();
return $listarportada;
}


function  crearportada($tamanio, $imagen)
{
   $nuevaportada = new Portada(null, $tamanio, $imagen);
   $portadaCreada = $nuevaportada->create();
   return $portadaCreada;
}


function obtenerportada($idportada)
{
    $model = new Portada($idportada,null,null);
    $PortadaObjeto = $model->get();
    return $PortadaObjeto;
}

function actualizarPortada($id, $tamanio, $imagen)
{
    $portada = new Portada($id, $tamanio, $imagen);
    $PortadaActualizada = $portada->update();
    return $PortadaActualizada;
}

function eliminarPortada($id)
{
    $portada = new Portada($id,null,null);
    $PortadaEliminada = $portada->remove();
    return $PortadaEliminada;
}
?>


?>