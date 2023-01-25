<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/Temporada.php');

function listarTemporadas()
{
    $model = new Temporada();
    $listarTemporadas = $model->getAll();
    return $listarTemporadas;
}

function obtenerTemporada($idTemporada)
{
    $model = new Temporada($idTemporada);
    $temporadaObjeto = $model->get();
    return $temporadaObjeto;
}

function crearTemporada($nombre, $apellidos, $dni, $fechaNacimiento, $nacionalidad)
{
        $nuevoTemporada = new Temporada(null, $nombre, $apellidos, $dni, $fechaNacimiento, $nacionalidad);
        $temporadaCreado = $nuevoTemporada->create();
        return $temporadaCreado;
}

function actualizarTemporada($idTemporada, $nombreTemporada, $apellidoTemporada, $dni, $fechaNacimiento, $nacionalidad)
{
    $temporada = new Temporada($idTemporada, $nombreTemporada, $apellidoTemporada, $dni, $fechaNacimiento, $nacionalidad);
    $temporadaActualizado = $temporada->update();
    return $temporadaActualizado;
}

function eliminarTemporada($idTemporada)
{
    $temporada = new Temporada($idTemporada);
    $temporadaEliminado = $temporada->remove();
    return $temporadaEliminado;
}
?>