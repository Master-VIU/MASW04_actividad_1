<?php
//require_once('../models/Idioma.php');
include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/Idioma.php';

function listarIdiomas()
{
    $model = new Idioma();
    $listarIdiomas = $model->getAll();
    return $listarIdiomas;
}

function crearIdioma($idioma, $isoCode)
{
    $nuevoIdioma = new Idioma(null, $idioma, $isoCode);
    $idiomaCreado = $nuevoIdioma->create();
    return $idiomaCreado;
}

function actualizarIdioma($nombreIdioma, $isoCode)
{
    $idioma = new Idioma(null, $nombreIdioma, $isoCode);
    $idiomaActualizado = $idioma->update();
    return $idiomaActualizado;
}

function eliminarIdioma($idIdioma)
{
    $idioma = new Idioma($idIdioma);
    $idiomaEliminado = $idioma->remove();
    return $idiomaEliminado;
}
?>