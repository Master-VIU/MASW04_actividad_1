<?php
   require_once('../utils/Database.php');

    class PeliculaActor
    {
        private $idPelicula;
        private $idActor;
        private $database;

        function constructor($idPelicula, $idActor)
        {

            $this->idPelicula = $idPelicula;
            $this->idActor = $idActor;
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

            if ($num_params == 0) {
                call_user_func_array(array($this,'constructorVacio'),$params);
            } else {
                call_user_func_array(array($this,'constructor'),$params);
            }
        }

        public function getAll()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filaviu.pelicula_actores";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item) 
            {
             $peliculaActor = new PeliculaActor($item['ID_PELICULA'], $item['ID_ACTOR']);
             array_push($listData, $peliculaActor);
            }

            $this->database->closeConnection();
            return $listData;
        }

        public function get()
        {
            $connection = $this->database->getConnection();

            $query = "SELECT * FROM filaviu.pelicula_actores WHERE ID_PELICULA = ".$this->idPelicula;
            $result = $connection->query($query);

            $peliculaActor = null;
            foreach ($result as $item) 
            {
             $peliculaActor = new PeliculaActor($item['ID_PELICULA'], $item['ID_ACTOR']);
            }

            $this->database->closeConnection();
            return $peliculaActor;
        }

        private function create()
        {
            $peliculaActorCreada = false;
            $connection = $this->database->getConnection();

            if($resultInsert = $connection->query(
                "INSERT INTO filaviu.pelicula_actores (ID_PELICULA, ID_ACTOR) VALUES ('$this->idPelicula, $this->idActor')"
            ))
            {
                $peliculaActorCreada = true;
            }

            $this->database->closeConnection();
            return $peliculaActorCreada;
        }

        public function update()
        {
            $peliculaActorActualizada = false;
            $connection = $this->database->getConnection();
            $query = "UPDATE filaviu.pelicula_actoreS set ID_PELICULA = '$this->idPelicula', ID_ACTOR = '$this->idActor' WHERE ID_PELICULA = ".$this->idPelicula;

            if($this->exists())
            {
                if($resultInsert = $connection->query($query))
                {
                    $peliculaActorActualizada = true;
                }
            }

            $this->database->closeConnection();
            return $peliculaActorActualizada;
            
        }

        public function remove()
        {
            $peliculaActorBorrada = false;
            $connection = $this->database->getConnection();
            $query = "DELETE FROM filaviu.pelicula_actores WHERE ID_PELICULA = ".$this->idPelicula;

            if($this->exists())
            {
                if($resultRemove = $connection->query($query))
                {
                    $peliculaActorBorrada = true;
                }
            }
            $this->database->closeConnection();
            return $peliculaActorBorrada;
        }

        public function exists()
        {
            $existePeliculaActor = false;
            $peliculaActor = $this->get();
            if($peliculaActor != null)
            {
                $existePeliculaActor = true;
            }

            return $existePeliculaActor;
        }

        /**
         * @return mixed
         */
        public function getIdPelicula()
        {
            return $this->idPelicula;
        }

        /**
         * @param mixed $idPelicula
         */
        public function setIdPelicula($idPelicula)
        {
            $this->idPelicula = $idPelicula;
        }

        /**
         * @return mixed
         */
        public function getIdActor()
        {
            return $this->idActor;
        }

        /**
         * @param mixed $idActor
         */
        public function setIdActor($idActor)
        {
            $this->idActor = $idActor;
        }

    }
?>