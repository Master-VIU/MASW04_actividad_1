<?php
require_once('../models/Idioma.php');

function listarIdiomas()
{
    $model = new Idioma();
    $listarIdiomas = $model->getAll();
    return $listarIdiomas;
}

function crearIdioma($idioma, $isoCode)
{
    $nuevoIdioma = new (null, $idioma, $isoCode);
    $idiomaCreado = $nuevoIdioma->create();
    return $idiomaCreado;
}

function actualizarIdioma($nombreIdioma, $isoCode)
{
    $idioma = new Idioma(null, $nombreIdioma, $isoCode);
    $idiomaActualizado = $idioma->update();
    return $idiomaActualizado;
}

function eliminarIdioma($nombreIdioma)
{
    $idioma = new Idioma(null, $nombreIdioma);
    $idiomaEliminado = $idioma->remove();
    return $idiomaEliminado;
}
?>