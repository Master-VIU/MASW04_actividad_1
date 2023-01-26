<?php
    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/SerieIdioma.php');

    function listarSerieIdiomas()
    {
        $model = new SerieIdioma();
        $listaSerieIdiomas = $model->getAll();
        return $listaSerieIdiomas;
    }

    function obtenerSerieIdioma($idSerieIdioma)
    {
        $model = new SerieIdioma($idSerieIdioma, null, null);
        $serieIdiomaObjeto = $model->get();
        return $serieIdiomaObjeto;
    }
    function crearSerieIdioma($serie, $idioma, $tipo)
    {
        $nuevaSerieIdioma = new SerieIdioma($serie, $idioma, $tipo);
        $serieIdiomaCreada = $nuevaSerieIdioma->create();
        return $serieIdiomaCreada;
    }

    function actualizarSerieIdioma($serie, $idioma, $tipo)
    {
        $serieIdioma = new SerieIdioma($serie, $idioma, $tipo);
        $serieIdiomaActualizada = $serieIdioma->update();
        return $serieIdiomaActualizada;
    }

    function eliminarSerieIdioma($idSerieIdioma)
    {
        $serieIdioma = new SerieIdioma($idSerieIdioma, null, null);
        $serieIdiomaEliminada = $serieIdioma->remove();
        return $serieIdiomaEliminada;
    }

?>