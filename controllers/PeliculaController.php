<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/Pelicula.php');

function listarPeliculas()
{
    $model = new Pelicula();
    $listaPeliculas = $model->getAll();
    return $listaPeliculas;
}

function obtenerPelicula($idPelicula)
{
    $model = new Pelicula($idPelicula, null, null, null, null, null, null, null, null);
    $peliculaObjeto = $model->get();
    return $peliculaObjeto;
}
function crearPelicula($tituloPelilcula,
                       $plataformaIdPelilcula,
                       $directorIdPelilcula,
                       $puntuacionPelilcula,
                       $clasificacionIdPelilcula,
                       $generoIdPelilcula,
                       $portadaIdPelilcula,
                       $duracionPelilcula)
{
    $nuevaPelicula = new Pelicula(null,
        $tituloPelilcula,
        $plataformaIdPelilcula,
        $directorIdPelilcula,
        $puntuacionPelilcula,
        $clasificacionIdPelilcula,
        $generoIdPelilcula,
        $portadaIdPelilcula,
        $duracionPelilcula);
    $peliculaCreada = $nuevaPelicula->create();
    return $peliculaCreada;
}

function actualizarPelicula($idPelicula,
                            $tituloPelilcula,
                            $plataformaIdPelilcula,
                            $directorIdPelilcula,
                            $puntuacionPelilcula,
                            $clasificacionIdPelilcula,
                            $generoIdPelilcula,
                            $portadaIdPelilcula,
                            $duracionPelilcula)
{
    $pelicula = new Pelicula($idPelicula,
        $tituloPelilcula,
        $plataformaIdPelilcula,
        $directorIdPelilcula,
        $puntuacionPelilcula,
        $clasificacionIdPelilcula,
        $generoIdPelilcula,
        $portadaIdPelilcula,
        $duracionPelilcula);
    $peliculaActualizada = $pelicula->update();
    return $peliculaActualizada;
}

function eliminarPelicula($idPelicula)
{
    $pelicula = new Pelicula($idPelicula, null, null, null, null, null, null, null, null );
    $peliculaEliminada = $pelicula->remove();
    return $peliculaEliminada;
}

function obtenerPeliculasPorPortada($portadaId)
{
    $peliculaBase = new Pelicula(null, null, null, null, null, null, null, $portadaId, null);
    $peliculas = $peliculaBase->getPeliculasPorPortada();
    return $peliculas;
}

function obtenerPeliculasPorClasificacion($clasificacionId)
{
    $peliculaBase = new Pelicula(null, null, null, null, null, $clasificacionId, null, null, null);
    $peliculas = $peliculaBase->getPeliculasPorClasificacion();
    return $peliculas;
}

function obtenerPeliculasPorGenero($generoId)
{
    $peliculaBase = new Pelicula(null, null, null, null, null, null, $generoId, null, null);
    $peliculas = $peliculaBase->getPeliculasPorGenero();
    return $peliculas;
}

function obtenerPeliculasPorPlataforma($plataformaId)
{
    $peliculaBase = new Pelicula(null, null, $plataformaId, null, null, null, null, null, null);
    $peliculas = $peliculaBase->getPeliculasPorPlataforma();
    return $peliculas;
}

?>