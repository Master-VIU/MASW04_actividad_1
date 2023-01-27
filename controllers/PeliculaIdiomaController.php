<?php
    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/PeliculaIdioma.php');

    function listarPeliculaIdiomas()
    {
        $model = new PeliculaIdioma();
        $listaPeliculaIdiomas = $model->getAll();
        return $listaPeliculaIdiomas;
    }

    function obtenerPeliculaIdioma($idPelicula)
    {
        $model = new PeliculaIdioma($idPelicula, null, null);
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

    function eliminarPeliculaIdioma($idPelicula, $idIdioma, $tipoIdioma)
    {
        $peliculaIdioma = new PeliculaIdioma($idPelicula, $idIdioma, $tipoIdioma);
        $peliculaIdiomaEliminada = $peliculaIdioma->remove();
        return $peliculaIdiomaEliminada;
    }
    function eliminarPeliculaIdiomaAll($idPelicula)
    {
        $peliculaIdioma = new PeliculaIdioma($idPelicula, null, null);
        $peliculaIdiomaEliminada = $peliculaIdioma->removeAll();
        return $peliculaIdiomaEliminada;
    }

    function listarIdiomasTipo($idPelicula, $tipo)
    {
        $model = new PeliculaIdioma($idPelicula, null, $tipo);
        $listaIdiomasPorTipo = $model->getAllIdiomasTipo();
        return $listaIdiomasPorTipo;
    }

    function listarIdiomasAll($idPelicula)
    {
        $model = new PeliculaIdioma($idPelicula, null, null);
        $listaIdiomasPorTipo = $model->getAllIdiomas();
        return $listaIdiomasPorTipo;
    }

?>