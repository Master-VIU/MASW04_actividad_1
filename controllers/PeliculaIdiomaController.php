<?php
    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/PeliculaIdioma.php');

    function listarPeliculaIdiomas()
    {
        $model = new PeliculaIdioma();
        $listaPeliculaIdiomas = $model->getAll();
        return $listaPeliculaIdiomas;
    }

    function obtenerPeliculaIdioma($idPeliculaIdioma)
    {
        $model = new PeliculaIdioma($idPeliculaIdioma, null, null);
        $peliculaIdiomaObjeto = $model->get();
        return $peliculaIdiomaObjeto;
    }
    function crearPeliculaIdioma($pelicula, $idioma, $tipo)
    {
        $nuevaPeliculaIdioma = new PeliculaIdioma($pelicula, $idioma, $tipo);
        $peliculaIdiomaCreada = $nuevaPeliculaIdioma->create();
        return $peliculaIdiomaCreada;
    }

    function actualizarPeliculaIdioma($pelicula, $idioma, $tipo)
    {
        $peliculaIdioma = new PeliculaIdioma($pelicula, $idioma, $tipo);
        $peliculaIdiomaActualizada = $peliculaIdioma->update();
        return $peliculaIdiomaActualizada;
    }

    function eliminarPeliculaIdioma($idPeliculaIdioma)
    {
        $peliculaIdioma = new PeliculaIdioma($idPeliculaIdioma, null, null);
        $peliculaIdiomaEliminada = $peliculaIdioma->remove();
        return $peliculaIdiomaEliminada;
    }

?>