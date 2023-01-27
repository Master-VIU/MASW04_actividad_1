<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/Actor.php');

function listarActores()
{
    $model = new Actor();
    $listarActores = $model->getAll();
    return $listarActores;
}

function obtenerActor($idActor)
{
    $model = new Actor($idActor, null, null, null, null, null);
    $actorObjeto = $model->get();
    return $actorObjeto;
}

function crearActor($nombre, $apellidos, $dni, $fechaNacimiento, $nacionalidad)
{
        $nuevoActor = new Actor(null, $nombre, $apellidos, $dni, $fechaNacimiento, $nacionalidad);
        $actorCreado = $nuevoActor->create();
        return $actorCreado;
}

function actualizarActor($idActor, $nombreActor, $apellidoActor, $dni, $fechaNacimiento, $nacionalidad)
{
    $actor = new Actor($idActor, $nombreActor, $apellidoActor, $dni, $fechaNacimiento, $nacionalidad);
    $actorActualizado = $actor->update();
    return $actorActualizado;
}

function eliminarActor($idActor)
{
    $actor = new Actor($idActor, null, null, null, null, null);
    $actorEliminado = $actor->remove();
    return $actorEliminado;
}

function obtenerActoresPorNacionalidad($nacionalidadId)
{
    $actorBase = new Actor(null, null, null, null, null, $nacionalidadId);
    $actores = $actorBase->getActoresPorNacionalidad();
    return $actores;
}
?>