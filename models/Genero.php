<?php
    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/utils/Database.php');
    class Genero
    {

        private $id;
        private $nombre;
        private $database;

        public function constructor($idGenero, $nombreGenero)
        {
            $this->id = $idGenero;
            $this->nombre = $nombreGenero;
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

            $query = "SELECT * FROM filmaviu.generos";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item)
            {
                $genero = new Genero($item['ID'], $item['NOMBRE']);
                array_push($listData, $genero);
            }

            $this->database->closeConnection();
            return $listData;
        }

        public function get()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.generos WHERE ID = '$this->id'";
            $result = $connection->query($query);

            $genero = null;
            foreach ($result as $item)
            {
                $genero = new Genero($item['ID'], $item['NOMBRE']);
            }

            $this->database->closeConnection();
            return $genero;
        }

        public function create()
        {
            $generoCreado = false;
            if(!$this->existsGenero())
            {
                $connection = $this->database->getConnection();

                if ($resultInsert = $connection->query(
                    "INSERT INTO filmaviu.generos (nombre) VALUES ('$this->nombre')"
                ))
                {
                    $generoCreado = true;
                }
            }
            $this->database->closeConnection();
            return $generoCreado;
        }

        public function update()
        {
            $generoActualizado = false;
            if(!$this->existsGenero())
            {
                $query = "UPDATE filmaviu.generos set nombre = '$this->nombre' WHERE id = ".$this->id;

                if ($this->exists())
                {
                    $connection = $this->database->getConnection();
                    if ($resultInsert = $connection->query($query))
                    {
                        $generoActualizado = true;
                    }
                }
            }
            $this->database->closeConnection();
            return $generoActualizado;
        }

        public function remove()
        {
            $generoBorrado = false;            
            $query = "DELETE FROM filmaviu.generos WHERE id = '$this->id'";

            if ($this->exists())
            {
                $connection = $this->database->getConnection();
                if ($resultRemove = $connection->query($query))
                {
                    $generoBorrado = true;
                }
            }

            $this->database->closeConnection();
            return $generoBorrado;
        }

        public function exists()
        {
            $existeGenero = false;
            $genero = $this->get();
            if ($genero != null)
            {
                $existeGenero = true;
            }
            return $existeGenero;
        }


        public function existsGenero()
        {
            $connection = $this->database->getConnection();
            $existeGenero = false;

            if($this->nombre != null)
            {
                $query = "SELECT ID FROM filmaviu.generos WHERE nombre = '$this->nombre'";
                $result = $connection->query($query);
                $genero = null;
                foreach ($result as $item)
                {
                    $genero = new Genero(
                        $item['ID'], null
                    );
                }
                if ($genero != null)
                {
                    $existeGenero = true;
                }
            }
            $this->database->closeConnection();
            return $existeGenero;
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
        public function getNombre()
        {
            return $this->nombre;
        }

        /**
         * @param mixed $nombre
         */
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }
    }
?>