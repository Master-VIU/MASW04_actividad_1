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

?>