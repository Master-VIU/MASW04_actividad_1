<?php

    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/utils/Database.php');
    class Clasificacion
    {

        private $id;
        private $tipo;
        private $database;


    public function constructor($idClasificacion, $tipoClasificacion)
    {
        $this->id = $idClasificacion;
        $this->tipo = $tipoClasificacion;
        $this->database = Database::getInstance();
    }

    public function constructorVacio()
    {
        $this->database = Database::getInstance();
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

    public function get()
    {
        $connection = $this->database->getConnection();

        $query = "SELECT * FROM filmaviu.clasificaciones WHERE ID = '$this->id'";
        $result = $connection->query($query);

        $clasificacion = null;
        foreach ($result as $item)
        {
            $clasificacion = new Clasificacion($item['ID'], $item['TIPO']);
        }

        $this->database->closeConnection();
        return $clasificacion;
    }

    public function create()
        {
            $clasificacionCreada = false;
            if(!$this->existsTipo())
            {
                $connection = $this->database->getConnection();

                if ($resultInsert = $connection->query(
                    "INSERT INTO filmaviu.clasificaciones (tipo) VALUES ('$this->tipo')"
                ))
                {
                    $clasificacionCreada = true;
                }
            }
            $this->database->closeConnection();
            return $clasificacionCreada;
        }


        public function update()
        {
            $clasificacionActualizada = false;
            if(!$this->existsTipo())
            {
                $query = "UPDATE filmaviu.clasificaciones set tipo = '$this->tipo' WHERE id = ".$this->id;

                if ($this->exists())
                {
                    $connection = $this->database->getConnection();
                    if ($resultInsert = $connection->query($query))
                    {
                        $clasificacionActualizada = true;
                    }
                }
            }
            $this->database->closeConnection();
            return $clasificacionActualizada;
        }

        public function remove()
        {
            $clasificacionBorrada = false;            
            $query = "DELETE FROM filmaviu.clasificaciones WHERE id = '$this->id'";

            if ($this->exists())
            {
                $connection = $this->database->getConnection();
                if ($resultRemove = $connection->query($query))
                {
                    $clasificacionBorrada = true;
                }
            }

            $this->database->closeConnection();
            return $clasificacionBorrada;
        }

        public function exists()
        {
            $existeClasificacion = false;
            $clasificacion = $this->get();
            if ($clasificacion != null)
            {
                $existeClasificacion = true;
            }
            return $existeClasificacion;
        }

        public function existsTipo()
        {
            $connection = $this->database->getConnection();
            $existeClasificacion = false;

            if($this->tipo != null)
            {
                $query = "SELECT ID FROM filmaviu.clasificaciones WHERE tipo = '$this->tipo'";
                $result = $connection->query($query);
                $clasificacion = null;
                foreach ($result as $item)
                {
                    $clasificacion = new Clasificacion(
                        $item['ID'], null
                    );
                }
                if ($clasificacion != null)
                {
                    $existeClasificacion = true;
                }
            }
            $this->database->closeConnection();
            return $existeClasificacion;
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