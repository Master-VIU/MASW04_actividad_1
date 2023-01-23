<?php
include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/episodio.php';

function listarEpisodios()
{
    $model = new Episodio();
    $listarEpisodios = $model->getAll();
    return $listarEpisodios;
}

function obtenerEpisodio($idEpisodio)
{
    $model = new Episodio($idEpisodio);
    $episodioObjeto = $model->get();
    return $episodioObjeto;
}

function crearEpisodio($episodio, $isoCode)
{
    $nuevoEpisodio = new Episodio(null, $episodio, $isoCode);
    $episodioCreado = $nuevoEpisodio->create();
    return $episodioCreado;
}

function actualizarEpisodio($idEpisodio, $nombreEpisodio, $isoCode)
{
    $episodio = new Episodio($idEpisodio, $nombreEpisodio, $isoCode);
    $episodioActualizado = $episodio->update();
    return $episodioActualizado;
}

function eliminarEpisodio($idEpisodio)
{
    $episodio = new Episodio($idEpisodio);
    $episodioEliminado = $episodio->remove();
    return $episodioEliminado;
}
?>