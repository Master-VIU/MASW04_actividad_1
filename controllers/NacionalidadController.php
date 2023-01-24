<?php
include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/Nacionalidad.php';

function listarNacionalidades()
{
    $model = new Nacionalidad();
    $listarNacionalidades = $model->getAll();
    return $listarNacionalidades;
}

function obtenerNacionalidad($idNacionalidad)
{
    $model = new Nacionalidad($idNacionalidad);
    $nacionalidadObjeto = $model->get();
    return $nacionalidadObjeto;
}

function crearNacionalidad($nacionalidad)
{
    $nuevaNacionalidad = new Nacionalidad(null, $nacionalidad);
    $nacionalidadCreada = $nuevaNacionalidad->create();
    return $nacionalidadCreada;
}

function actualizarNacionalidad($idNacionalidad, $pais)
{
    $nacionalidad = new Nacionalidad($idNacionalidad, $pais);
    $nacionalidadActualizado = $nacionalidad->update();
    return $nacionalidadActualizado;
}

function eliminarNacionalidad($idNacionalidad)
{
    $nacionalidad = new Nacionalidad($idNacionalidad);
    $nacionalidadEliminada = $nacionalidad->remove();
    return $nacionalidadEliminada;
}
?>