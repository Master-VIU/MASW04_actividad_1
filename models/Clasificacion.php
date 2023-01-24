<?php

    include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/utils/Database.php';
    class Clasificacion
    {

        private $id;
        private $tipo;
        private $database;


    public function constructor($idClasificacion, $tipoClasificacion)
    {
        $this->id = $idClasificacion;
        $this->tipo = $tipoClasificacion;
        $this->database = new Database();
    }

    public function constructorVacio()
    {
        $this->database = new Database();
    }

    public function __construct()
    {
        $params = func_get_args();
        $num_params = func_num_args();

        if ($num_params == 0)
        {
            call_user_func_array(array($this,'constructorVacio'),$params);
        }
        else
        {
            call_user_func_array(array($this,'constructor'),$params);
        }
    }


    public function getAll()
    {
        $connection = $this->database->getConnection();

        $query = "SELECT * FROM filmaviu.clasificaciones";
        $result = $connection->query($query);
        $listData = [];

        foreach ($result as $item)
        {
            $clasificacion = new Clasificacion($item['ID'], $item['TIPO']);
            array_push($listData, $clasificacion);
        }

        $this->database->closeConnection();
        return $listData;
    }

     /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getTipo()
        {
            return $this->tipo;
        }

        /**
         * @param mixed $nombre
         */
        public function setTipo($tipo)
        {
            $this->tipo = $tipo;
        }

    }
?>