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

    function eliminarPeliculaActor($idPelicula, $idActor)
    {
        $peliculaActor = new PeliculaActor($idPelicula, $idActor);
        $peliculaActorEliminada = $peliculaActor->remove();
        return $peliculaActorEliminada;
    }

    function eliminarPeliculaActorAll($idPelicula)
    {
        $peliculaActor = new PeliculaActor($idPelicula, null);
        $peliculaActorEliminada = $peliculaActor->removeAll();
        return $peliculaActorEliminada;
    }

    function listarActoresDePelicula($idPelicula)
    {
        $model = new PeliculaActor($idPelicula, null);
        $listaActoresDePelicula = $model->getAllActores();
        return $listaActoresDePelicula;
    }

    function listarPeliculasDeActor($idActor)
    {
        $model = new PeliculaActor(null, $idActor);
        $listaPeliculasDeActor = $model->getAllPeliculas();
        return $listaPeliculasDeActor;
    }

?>