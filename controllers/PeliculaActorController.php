<?php
    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/PeliculaActor.php');

    function listarPeliculaActores()
    {
        $model = new PeliculaActor();
        $listaPeliculaActores = $model->getAll();
        return $listaPeliculaActores;
    }

    function obtenerPeliculaActor($idPeliculaActor)
    {
        $model = new PeliculaActor($idPeliculaActor, null);
        $peliculaActorObjeto = $model->get();
        return $peliculaActorObjeto;
    }
    function crearPeliculaActor($pelicula, $actor)
    {
        $nuevaPeliculaActor = new PeliculaActor($pelicula, $actor);
        $peliculaActorCreada = $nuevaPeliculaActor->create();
        return $peliculaActorCreada;
    }

    function actualizarPeliculaActor($idPeliculaActor, $nombrePeliculaActor)
    {
        $peliculaActor = new PeliculaActor($idPeliculaActor, $nombrePeliculaActor);
        $peliculaActorActualizada = $peliculaActor->update();
        return $peliculaActorActualizada;
    }

    function eliminarPeliculaActor($idPeliculaActor)
    {
        $peliculaActor = new PeliculaActor($idPeliculaActor, null);
        $peliculaActorEliminada = $peliculaActor->remove();
        return $peliculaActorEliminada;
    }

    function listarActoresDePelicula($idPelicula)
    {
        $model = new PeliculaActor($idPelicula, null, null);
        $listaActoresDePelicula = $model->getAllActores();
        return $listaActoresDePelicula;
    }

?>