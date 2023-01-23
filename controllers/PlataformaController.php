<?php
    include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/Plataforma.php';

    function listarPlataformas()
    {
        $model = new Plataforma();
        $listaPlataformas = $model->getAll();
        return $listaPlataformas;
    }

    function obtenerPlataforma($idPlataforma)
    {
        $model = new Plataforma($idPlataforma);
        $plataformaObjeto = $model->get();
        return $plataformaObjeto;
    }
    function crearPlataforma($nombrePlataforma)
    {
        $nuevaPlataforma = new Plataforma(null, $nombrePlataforma);
        $plataformaCreada = $nuevaPlataforma->create();
        return $plataformaCreada;
    }

    function actualizarPlataforma($idPlataforma, $nombrePlataforma)
    {
        $plataforma = new Plataforma($idPlataforma, $nombrePlataforma);
        $plataformaActualizada = $plataforma->update();
        return $plataformaActualizada;
    }

    function eliminarPlataforma($idPlataforma)
    {
        $plataforma = new Plataforma($idPlataforma);
        $plataformaEliminada = $plataforma->remove();
        return $plataformaEliminada;
    }

?>