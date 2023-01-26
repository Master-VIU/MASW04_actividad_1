<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/Director.php');

function listarDirectores()
{
    $model = new Director();
    $listarDirector = $model->getAll();
    return $listarDirector;
}

function obtenerDirector($idDirector)
{
    $model = new Director($idDirector, null, null, null, null, null);
    $directorObjeto = $model->get();
    return $directorObjeto;
}

function crearDirector($nombre, $apellidos, $dni, $fechaNacimiento, $nacionalidad)
{
        $nuevoDirector = new Director(null, $nombre, $apellidos, $dni, $fechaNacimiento, $nacionalidad);
        $directorCreado = $nuevoDirector->create();
        return $directorCreado;
}

function actualizarDirector($idDirector, $nombreDirector, $apellidoDirector,$dni, $fechaNacimiento, $nacionalidad)
{
    $director = new Director($idDirector, $nombreDirector, $apellidoDirector, $dni, $fechaNacimiento, $nacionalidad);
    $directorActualizado = $director->update();
    return $directorActualizado;
}

function eliminarDirector($idDirector)
{
    $director = new Director($idDirector, null, null, null, null, null);
    $directorEliminado = $director->remove();
    return $directorEliminado;
}
?>