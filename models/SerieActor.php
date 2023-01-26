<?php
    require_once( $_SERVER['DOCUMENT_ROOT'].'/MASW04_actividad_1/utils/Database.php');
    class SerieActor
    {
        private $idSerie;
        private $idActor;
        private $database;

        function constructor($idSerieActor, $idActorSerie)
        {
            $this->idSerie = $idSerieActor;
            $this->idActor = $idActorSerie;
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
            $query = "SELECT * FROM filmaviu.serie_actores";
            $result = $connection->query($query);
            $listData = [];

            foreach ($result as $item)
            {
                $serieActor = new SerieActor($item['ID_SERIE'], $item['ID_ACTOR']);
                array_push($listData, $serieActor);
            }

            $this->database->closeConnection();
            return $listData;
        }


        public function get()
        {
            $connection = $this->database->getConnection();
            $query = "SELECT * FROM filmaviu.serie_actores WHERE ID_SERIE = ".$this->idSerie;
            $result = $connection->query($query);
            $serieActor = null;
            foreach($result as $item)
            {
                $serieActor = new SerieActor($item['ID_SERIE'], $item['ID_ACTOR']);
            }

            $this->database->closeConnection();
            return $serieActor;
        }

        private function create()
        {
            $serieActorCreada = false;
            $connection = $this->database->getConnection();

            if($resultInsert = $connection->query(
                "INSERT INTO filmaviu.serie_actores (ID_SERIE,ID_ACTOR) VALUES ('$this->idSerie')"
            ))
            {
                $serieActorCreada = true;
            }

            $this->database->closeConnection();
            return $serieActorCreada;
        }

        public function update()
        {
            $serieActorActualizado = false;
            $connection = $this->database->getConnection();
            $query = "UPDATE filmaviu.serie_actores set ID_SERIE = '$this->idSerie', ID_ACTOR = '$this->idActor' WHERE ID_SERIE = ".$this->idSerie;

            if($this->exists())
            {
                $connection = $this->database->getConnection();
                if($resultInsert = $connection->query($query))
                {
                    $serieActorActualizado = true;
                }
            }
            $this->database->closeConnection();
            return $serieActorActualizado;
        }

        
        public function remove()
        {
            $serieActorBorrado = false;
            $query = "DELETE FROM filmaviu.serie_actores WHERE ID_SERIE = ".$this->idSerie;

            if($this->exists())
            {
                $connection = $this->database->getConnection();
                if($resultRemove = $connection->query($query))
                {
                    $serieActorBorrado = true;
                }
            }
            $this->database->closeConnection();
            return $serieActorBorrado;
        }

        public function exists()
        {
            $existeSerieActor = false;
            $serieActor = $this->get();
            if($serieActor != null)
            {
                $existeSerieActor = true;
            }

            return $existeSerieActor;
        }
        
        
        /**
         * @return mixed
         */
        public function getIdSerie()
        {
            return $this->idSerie;
        }

        /**
         * @param mixed $idSerie
         */
        public function setIdSerie($idSerie)
        {
            $this->idSerie = $idSerie;
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