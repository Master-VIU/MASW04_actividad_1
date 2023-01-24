<?php
include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/Director.php';

function listarDirector()
{
    $model = new Director();
    $listarDirector = $model->getAll();
    return $listarDirector;
}

function obtenerDirector($idDirector)
{
    $model = new Director($idDirector);
    $directorObjeto = $model->get();
    return $directorObjeto;
}

function crearDirector($nombre, $apellidos, $fechaNacimiento, $nacionalidad)
{
        $nuevoDirector = new Director(null, $nombre, $apellidos, $fechaNacimiento, $nacionalidad);
        $directorCreado = $nuevoDirector->create();
        return $directorCreado;
}

function actualizarDirector($idDirector, $nombreDirector, $apellidoDirector, $fechaNacimiento, $nacionalidad)
{
    $director = new Director($idDirector, $nombreDirector, $apellidoDirector, $fechaNacimiento, $nacionalidad);
    $directorActualizado = $director->update();
    return $directorActualizado;
}

function eliminarDirector($idDirector)
{
    $director = new Director($idDirector);
    $directorEliminado = $director->remove();
    return $directorEliminado;
}
?>