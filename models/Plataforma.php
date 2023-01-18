<?php
    include $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/utils/Database.php';
    class Plataforma
    {
        private $id;
        private $nombre;
        private $database;

        public function constructor($idPlataforma, $nombrePlataforma)
        {
            $this->id = $idPlataforma;
            $this->nombre = $nombrePlataforma;
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

            if ($num_params == 0) {
                call_user_func_array(array($this,'constructorVacio'),$params);
            } else {
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

            $query = "SELECT * FROM filmaviu.plataformas WHERE ID = ".$this->id;
            $result = $connection->query($query);

            $plataforma = null;
            foreach ($result as $item)
            {
                $plataforma = new Plataforma($item['id'], $item['nombre']);
            }

            $this->database->closeConnection();
            return $plataforma;
        }

        public function create()
        {
            $plataformaCreada = false;
            $connection = $this->database->getConnection();

            if ($resultInsert = $connection->query(
                "INSERT INTO filmaviu.plataformas (nombre) VALUES (' $this->nombre ')"
            ))
            {
                $plataformaCreada = true;
            }

            $this->database->closeConnection();
            return $plataformaCreada;
        }

        public function update()
        {
            $plataformaActualizada = false;
            $connection = $this->database->getConnection();
            $query = "UPDATE filmaviu.plataformas set nombre = ' $this->nombre ' WHERE id = ".$this->id;

            if ($this->exists())
            {
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
            $connection = $this->database->getConnection();
            $query = "DELETE FROM filmaviu.plataformas WHERE id = ".$this->id;

            if ($this->exists())
            {
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