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

function crearTemporada($numero, $serieId, $id, $fechaLanzamiento)
{
        $nuevoTemporada = new Temporada($numero, $serieId, $id, $fechaLanzamiento);
        $temporadaCreado = $nuevoTemporada->create();
        return $temporadaCreado;
}

function actualizarTemporada($numero, $serieId, $id, $fechaLanzamiento)
{
    $temporada = new Temporada($numero, $serieId, $id, $fechaLanzamiento);
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