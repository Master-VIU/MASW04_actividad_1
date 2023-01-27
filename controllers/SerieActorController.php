<?php
    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/SerieActor.php');

    function listarSerieActores()
    {
        $model = new SerieActor();
        $listaSerieActores = $model->getAll();
        return $listaSerieActores;
    }

    function obtenerSerieActor($idSerieActor)
    {
        $model = new SerieActor($idSerieActor, null);
        $serieActorObjeto = $model->get();
        return $serieActorObjeto;
    }
    function crearSerieActor($serie, $actor)
    {
        $nuevaSerieActor = new SerieActor($serie, $actor);
        $serieActorCreada = $nuevaSerieActor->create();
        return $serieActorCreada;
    }

    function actualizarSerieActor($idSerieActor, $nombreSerieActor)
    {
        $serieActor = new SerieActor($idSerieActor, $nombreSerieActor);
        $serieActorActualizada = $serieActor->update();
        return $serieActorActualizada;
    }

    function eliminarSerieActor($idSerie, $idActor)
    {
        $serieActor = new SerieActor($idSerie, $idActor);
        $serieActorEliminada = $serieActor->remove();
        return $serieActorEliminada;
    }

    function eliminarSerieActorAll($idSerie)
    {
        $serieActor = new SerieActor($idSerie, null);
        $serieActorEliminada = $serieActor->removeAll();
        return $serieActorEliminada;
    }

    function listarActoresDeSerie($idSerie)
    {
        $model = new SerieActor($idSerie, null);
        $listaActoresDeSerie = $model->getAllActores();
        return $listaActoresDeSerie;
    }

    function listarSeriesDeActor($idActor)
    {
        $model = new SerieActor(null, $idActor);
        $listaSeriesDeActor = $model->getAllSeries();
        return $listaSeriesDeActor;
    }

?>