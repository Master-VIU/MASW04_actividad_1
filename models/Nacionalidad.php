<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/utils/Database.php');

    class Nacionalidad
    {

        private $id;
        private $pais;
        private $database;


        function constructor($idNacionalidad, $paisNacionalidad)
        {
            $this->id = $idNacionalidad;
            $this->pais = $paisNacionalidad;
            $this->database = Database::getInstance();
        }

        public function constructorVacio()
        {
            $this->database = Database::getInstance();
        }

        public function constructorUnParametro($idNacionalidad)
        {
        $this->id = $idNacionalidad;
        $this->database = Database::getInstance();
         }

        public function __construct()
        {
            $params = func_get_args();
            $num_params = func_num_args();

            if ($num_params == 0) {
                call_user_func_array(array($this,'constructorVacio'),$params);
            } elseif($num_params == 1)
            {
                call_user_func_array(array($this,'constructorUnParametro'),$params);
            }
            else {
                call_user_func_array(array($this,'constructor'),$params);
            }
        }


        public function getAll()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.nacionalidades";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item)
            {
                $nacionalidad =  new Nacionalidad($item['ID'], $item['PAIS']);
                array_push($listData, $nacionalidad);
            }

            $this->database->closeConnection();

            return $listData;
        }

        public function get()
        {
           
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.nacionalidades WHERE ID = " .$this->id;
            $result = $connection->query($query);

            $nacionalidad = null;
            foreach ($result as $item)
            {
                $nacionalidad = new Nacionalidad($item['ID'], $item['PAIS']);
            }

            $this->database->closeConnection();
            return $nacionalidad;
        }


        public function create()
        {
            $nacionalidadCreada = false;
            if(!$this->existsName())
            {
                $connection = $this->database->getConnection();

                if ($resultInsert = $connection->query(
                    "INSERT INTO filmaviu.nacionalidades (PAIS) VALUES ('$this->pais')"
                ))
                {
                    $nacionalidadCreada = true;
                }
            }
            $this->database->closeConnection();
            return $nacionalidadCreada;
        }

        public function update()
        {
          $nacionalidadActualizada = false;
           if(!$this->existsName())
            {            
            $query = "UPDATE filmaviu.nacionalidades set PAIS = '$this->pais' WHERE id = ".$this->id;

            if ($this->exists())
            {
                $connection = $this->database->getConnection();
                if ($resultInsert = $connection->query($query))
                {
                    $nacionalidadActualizada = true;
                }
            }
        }
            $this->database->closeConnection();
            return $nacionalidadActualizada;
        }

        public function remove()
        {
            $nacionalidadBorrada = false;            
            $query = "DELETE FROM filmaviu.nacionalidades WHERE id = ".$this->id;
            if ($this->exists())
            {
                $connection = $this->database->getConnection();                
                if ($connection->query($query))
                {                 
                    $nacionalidadBorrada = true;
                }
            }

            $this->database->closeConnection();
            return $nacionalidadBorrada;
        }


        public function exists()
        {
            $existeNacionalidad = false;
            $nacionalidad = $this->get();
            if ($nacionalidad != null)
            {
                $existeNacionalidad = true;
            }
            return $existeNacionalidad;
        }

        public function existsName()
        {
            $connection = $this->database->getConnection();
            $existeNacionalidad = false;

            if($this->pais != null)
            {
                $query = "SELECT ID FROM filmaviu.nacionalidades WHERE PAIS = '$this->pais'";
                $result = $connection->query($query);
                $nacionalidad = null;
                foreach ($result as $item)
                {
                    $nacionalidad = new Nacionalidad(
                        $item['ID'], null
                    );
                }
                if ($nacionalidad != null)
                {
                    $existeNacionalidad = true;
                }
            }
            $this->database->closeConnection();
            return $existeNacionalidad;
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
        public function getPais()
        {
            return $this->pais;
        }

        /**
         * @param mixed $pais
         */
        public function setPais($pais)
        {
            $this->pais = $pais;
        }
    }
?>