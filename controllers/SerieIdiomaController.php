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

    function eliminarSerieIdioma($idSerieIdioma, $idIdioma, $idiomaTipo)
    {
        $serieIdioma = new SerieIdioma($idSerieIdioma, $idIdioma, $idiomaTipo);
        $serieIdiomaEliminada = $serieIdioma->remove();
        return $serieIdiomaEliminada;
    }

    function eliminarSerieIdiomaAll($idSerieIdioma)
    {
        $serieIdioma = new SerieIdioma($idSerieIdioma, null, null);
        $serieIdiomaEliminada = $serieIdioma->removeAll();
        return $serieIdiomaEliminada;
    }

    function listarSerieIdiomasTipo($idSerie, $tipo)
    {
        $model = new SerieIdioma($idSerie, null, $tipo);
        $listaIdiomasPorTipo = $model->getAllIdiomasTipo();
        return $listaIdiomasPorTipo;
    }

    function listarSerieIdiomasAll($idSerie)
    {
        $model = new SerieIdioma($idSerie, null, null);
        $listaIdiomasPorTipo = $model->getAllIdiomas();
        return $listaIdiomasPorTipo;
    }

    function listarSeriesDeIdioma($idIdioma)
    {
        $model = new SerieIdioma(null, $idIdioma, null);
        $listaSeriesDeIdioma = $model->getAllSeries();
        return $listaSeriesDeIdioma;
    }

?>