<?php
require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/Idioma.php');

function listarIdiomas()
{
    $model = new Idioma();
    $listarIdiomas = $model->getAll();
    return $listarIdiomas;
}

function obtenerIdioma($idIdioma)
{
    $model = new Idioma($idIdioma, null, null);
    $idiomaObjeto = $model->get();
    return $idiomaObjeto;
}

function crearIdioma($idioma, $isoCode)
{
    $nuevoIdioma = new Idioma(null, $idioma, $isoCode);
    $idiomaCreado = $nuevoIdioma->create();
    return $idiomaCreado;
}

function actualizarIdioma($idIdioma, $nombreIdioma, $isoCode)
{
    $idioma = new Idioma($idIdioma, $nombreIdioma, $isoCode);
    $idiomaActualizado = $idioma->update();
    return $idiomaActualizado;
}

function eliminarIdioma($idIdioma)
{
    $idioma = new Idioma($idIdioma, null, null);
    $idiomaEliminado = $idioma->remove();
    return $idiomaEliminado;
}
?>