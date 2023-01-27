<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/Serie.php');

function listarSeries()
{
    $model = new Serie();
    $listaSeries = $model->getAll();
    return $listaSeries;
}

function obtenerSerie($idSerie)
{
    $model = new Serie($idSerie, null, null, null, null, null, null);
    $serieObjeto = $model->get();
    return $serieObjeto;
}
function crearSerie($tituloSerie,
                       $plataformaIdSerie,
                       $directorIdSerie,
                       $clasificacionIdSerie,
                       $generoIdSerie,
                       $portadaIdSerie)
{
    $nuevaSerie = new Serie(null,
        $tituloSerie,
        $plataformaIdSerie,
        $directorIdSerie,
        $clasificacionIdSerie,
        $generoIdSerie,
        $portadaIdSerie);
    $serieCreada = $nuevaSerie->create();
    return $serieCreada;
}

function actualizarSerie($idSerie,
                            $tituloSerie,
                            $plataformaIdSerie,
                            $directorIdSerie,
                            $clasificacionIdSerie,
                            $generoIdSerie,
                            $portadaIdSerie)
{
    $serie = new Serie($idSerie,
        $tituloSerie,
        $plataformaIdSerie,
        $directorIdSerie,
        $clasificacionIdSerie,
        $generoIdSerie,
        $portadaIdSerie);
    $serieActualizada = $serie->update();
    return $serieActualizada;
}

function eliminarSerie($idSerie)
{
    $serie = new Serie($idSerie, null);
    $serieEliminada = $serie->remove();
    return $serieEliminada;
}

?>