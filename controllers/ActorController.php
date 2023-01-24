<?php
include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/Actor.php';

function listarActores()
{
    $model = new Actor();
    $listarActores = $model->getAll();
    return $listarActores;
}

function obtenerActor($idActor)
{
    $model = new Actor($idActor);
    $actorObjeto = $model->get();
    return $actorObjeto;
}

function crearActor($nombre, $apellidos, $fechaNacimiento, $nacionalidad)
{
        $nuevoActor = new Actor(null, $nombre, $apellidos, $fechaNacimiento, $nacionalidad);
        $actorCreado = $nuevoActor->create();
        return $actorCreado;
}

function actualizarActor($idActor, $nombreActor, $apellidoActor, $fechaNacimiento, $nacionalidad)
{
    $actor = new Actor($idActor, $nombreActor, $apellidoActor, $fechaNacimiento, $nacionalidad);
    $actorActualizado = $actor->update();
    return $actorActualizado;
}

function eliminarActor($idActor)
{
    $actor = new Actor($idActor);
    $actorEliminado = $actor->remove();
    return $actorEliminado;
}
?>