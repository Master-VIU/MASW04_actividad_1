<?php
    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/utils/Database.php');
    class Plataforma
    {
        private $id;
        private $nombre;
        private $database;

        public function constructor($idPlataforma, $nombrePlataforma)
        {
            $this->id = $idPlataforma;
            $this->nombre = $nombrePlataforma;
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

            $query = "SELECT * FROM filmaviu.plataformas";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item)
            {
                $plataforma = new Plataforma($item['ID'], $item['NOMBRE']);
                array_push($listData, $plataforma);
            }

            $this->database->closeConnection();
            return $listData;
        }

        public function get()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filmaviu.plataformas WHERE ID = '$this->id'";
            $result = $connection->query($query);

            $plataforma = null;
            foreach ($result as $item)
            {
                $plataforma = new Plataforma($item['ID'], $item['NOMBRE']);
            }

            $this->database->closeConnection();
            return $plataforma;
        }

        public function create()
        {
            $plataformaCreada = false;
            if(!$this->existsNombre())
            {
                $connection = $this->database->getConnection();

                if ($resultInsert = $connection->query(
                    "INSERT INTO filmaviu.plataformas (nombre) VALUES ('$this->nombre')"
                ))
                {
                    $plataformaCreada = true;
                }
            }
            $this->database->closeConnection();
            return $plataformaCreada;
        }

        public function update()
        {
            $plataformaActualizada = false;
            $query = "UPDATE filmaviu.plataformas set nombre = '$this->nombre' WHERE id = ".$this->id;

            if ($this->exists())
            {
                $connection = $this->database->getConnection();
                if ($resultInsert = $connection->query($query))
                {
                    $plataformaActualizada = true;
                }
            }

            $this->database->closeConnection();
            return $plataformaActualizada;
        }

        public function remove()
        {
            $plataformaBorrada = false;            
            $query = "DELETE FROM filmaviu.plataformas WHERE id = '$this->id'";

            if ($this->exists())
            {
                $connection = $this->database->getConnection();
                if ($resultRemove = $connection->query($query))
                {
                    $plataformaBorrada = true;
                }
            }

            $this->database->closeConnection();
            return $plataformaBorrada;
        }

        public function exists()
        {
            $existePlataforma = false;
            $plataforma = $this->get();
            if ($plataforma != null)
            {
                $existePlataforma = true;
            }
            return $existePlataforma;
        }

        public function existsNombre()
        {
            $connection = $this->database->getConnection();
            $existePlataforma = false;

            if($this->nombre != null)
            {
                $query = "SELECT ID FROM filmaviu.plataformas WHERE NOMBRE = '$this->nombre'";
                $result = $connection->query($query);
                $plataforma = null;
                foreach ($result as $item)
                {
                    $plataforma = new Plataforma(
                        $item['ID'], null
                    );
                }
                if ($plataforma != null)
                {
                    $existePlataforma = true;
                }
            }
            $this->database->closeConnection();
            return $existePlataforma;
        }

        // GETTERS Y SETTERS

        // ID
        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }
        // NOMBRE
        public function getNombre()
        {
            return $this->nombre;
        }

        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }


    }

?>