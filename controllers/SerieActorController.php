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
    function crearSerieActor($pelicula, $idioma, $tipo)
    {
        $nuevaSerieActor = new SerieActor($pelicula, $idioma, $tipo);
        $serieActorCreada = $nuevaSerieActor->create();
        return $serieActorCreada;
    }

    function actualizarSerieActor($pelicula, $idioma)
    {
        $serieActor = new SerieActor($pelicula, $idioma);
        $serieActorActualizada = $serieActor->update();
        return $serieActorActualizada;
    }

    function eliminarSerieActor($idSerieActor)
    {
        $serieActor = new SerieActor($idSerieActor, null);
        $serieActorEliminada = $serieActor->remove();
        return $serieActorEliminada;
    }

?>