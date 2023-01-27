<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/episodio.php');

function listarEpisodios()
{
    $model = new Episodio();
    $listarEpisodios = $model->getAll();
    return $listarEpisodios;
}

function obtenerEpisodio($idEpisodio)
{
    $model = new Episodio($idEpisodio, null, null, null, null);
    $episodioObjeto = $model->get();
    return $episodioObjeto;
}

function crearEpisodio($temporadaId, $nuevoNumero, $nuevoTitulo, $nuevaDuracion)
{
    $nuevoEpisodio = new Episodio(null, $temporadaId, $nuevoNumero, $nuevoTitulo, $nuevaDuracion);
    $episodioCreado = $nuevoEpisodio->create();
    return $episodioCreado;
}

function actualizarEpisodio($idEpisodio, $temporada, $numero, $titulo, $duracion)
{
    $episodio = new Episodio($idEpisodio, $temporada, $numero, $titulo, $duracion);
    $episodioActualizado = $episodio->update();
    return $episodioActualizado;
}

function eliminarEpisodio($idEpisodio)
{
    $episodio = new Episodio($idEpisodio, null, null, null, null);
    $episodioEliminado = $episodio->remove();
    return $episodioEliminado;
}
?>