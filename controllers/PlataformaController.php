<?php
    require_once ('../models/Plataforma.php');

    function listarPlataformas()
    {
        $model = new Plataforma();
        $listaPlataformas = $model->getAll();
        return $listaPlataformas;
    }
