<?php
include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/Pelicula.php';

function listarPeliculas()
{
    $model = new Pelicula();
    $listaPeliculas = $model->getAll();
    return $listaPeliculas;
}

function obtenerPelicula($idPelicula)
{
    $model = new Pelicula($idPelicula, null);
    $peliculaObjeto = $model->get();
    return $peliculaObjeto;
}
function crearPelicula($nombrePelicula)
{
    $nuevaPelicula = new Pelicula(null, $nombrePelicula);
    $peliculaCreada = $nuevaPelicula->create();
    return $peliculaCreada;
}

function actualizarPelicula($idPelicula, $nombrePelicula)
{
    $pelicula = new Pelicula($idPelicula, $nombrePelicula);
    $peliculaActualizada = $pelicula->update();
    return $peliculaActualizada;
}

function eliminarPelicula($idPelicula)
{
    $pelicula = new Pelicula($idPelicula, null);
    $peliculaEliminada = $pelicula->remove();
    return $peliculaEliminada;
}

?>