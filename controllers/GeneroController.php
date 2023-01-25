<?php
    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/Genero.php');

    function listarGeneros()
    {
        $model = new Genero();
        $listaGenero = $model->getAll();
        return $listaGenero;
    }

    function obtenerGenero($idGenero)
    {
        $model = new Genero($idGenero, null);
        $generoObjeto = $model->get();
        return $generoObjeto;
    }
    function crearGenero($genero)
    {
        $nuevaGenero = new Genero(null, $genero);
        $generoCreado = $nuevaGenero->create();
        return $generoCreado;
    }

    function actualizarGenero($idGenero, $genero)
    {
        $genero = new Genero($idGenero, $genero);
        $generoActualizado = $genero->update();
        return $generoActualizado;
    }

    function eliminarGenero($idGenero)
    {
        $genero = new Genero($idGenero, null);
        $generoEliminado = $genero->remove();
        return $generoEliminado;
    }

?>