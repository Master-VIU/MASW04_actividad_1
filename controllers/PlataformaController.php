<?php
    include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/Plataforma.php';

    function listarPlataformas()
    {
        $model = new Plataforma();
        $listaPlataformas = $model->getAll();
        return $listaPlataformas;
    }

    function crearPlataforma($nombrePlataforma)
    {
        $nuevaPlataforma = new Plataforma(null, $nombrePlataforma);
        $plataformaCreada = $nuevaPlataforma->create();
        return $plataformaCreada;
    }
