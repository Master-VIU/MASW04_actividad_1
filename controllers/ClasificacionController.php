<?php
    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/models/Clasificacion.php');

    function listarClasificaciones()
    {
        $model = new Clasificacion();
        $listaClasificaciones = $model->getAll();
        return $listaClasificaciones;
    }

    function obtenerClasificacion($idClasificacion)
    {
        $model = new Clasificacion($idClasificacion, null);
        $clasificacionObjeto = $model->get();
        return $clasificacionObjeto;
    }
    function crearClasificacion($tipo)
    {
        $nuevaClasificacion = new Clasificacion(null, $tipo);
        $clasificacionCreada = $nuevaClasificacion->create();
        return $clasificacionCreada;
    }

    function actualizarClasificacion($idClasificacion, $tipo)
    {
        $clasificacion = new Clasificacion($idClasificacion, $tipo);
        $clasificacionActualizada = $clasificacion->update();
        return $clasificacionActualizada;
    }

    function eliminarClasificacion($idClasificacion)
    {
        $clasificacion = new Clasificacion($idClasificacion, null);
        $clasificacionEliminada = $clasificacion->remove();
        return $clasificacionEliminada;
    }

?>